<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $description = $_POST['description'] ?? '';
        $stmt = $pdo->prepare('UPDATE abouts SET description = ? WHERE id = ?');
        $stmt->execute([$description, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM abouts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $about = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$about) {
        exit('About doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update About #<?=$about['id']?></h2>
    <form action="update.php?id=<?=$about['id']?>" method="post">
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Name" value="<?=$about['description']?>" id="description">
        <br>
        <br>
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>