<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $name = $_POST['name'] ?? '';
        $duration = $_POST['duration'] ?? '';
        $description = $_POST['description'] ?? '';
        $stmt = $pdo->prepare('UPDATE educations SET name = ?, duration = ?, description = ? WHERE id = ?');
        $stmt->execute([$name, $duration,$description, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM educations WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $education = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$education) {
        exit('Education doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

    <div class="content update">
        <h2>Update Education #<?=$education['id']?></h2>
        <form action="update.php?id=<?=$education['id']?>" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="<?=$education['name']?>" id="name">
            <br>
            <label for="duration">Description</label>
            <input type="text" name="duration" placeholder="Name" value="<?=$education['duration']?>" id="duration">
            <br>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="Name" value="<?=$education['description']?>" id="description">
            <br>
            <br>
            <input type="submit" value="Update">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>