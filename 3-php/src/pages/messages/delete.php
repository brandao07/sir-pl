<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM contact_requests WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $message = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$message) {
        exit('Message doesn\'t exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('UPDATE contact_requests SET is_deleted = 1 WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the message!';
        } else {
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete')?>

    <div class="content delete">
        <h2>Delete message #<?=$message['id']?></h2>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php else: ?>
            <p>Are you sure you want to delete message #<?=$message['id']?>?</p>
            <div class="yesno">
                <a href="delete.php?id=<?=$message['id']?>&confirm=yes">Yes</a>
                <a href="delete.php?id=<?=$message['id']?>&confirm=no">No</a>
            </div>
        <?php endif; ?>
    </div>

<?=template_footer()?>