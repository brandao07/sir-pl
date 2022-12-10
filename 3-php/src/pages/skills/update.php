<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $name = $_POST['name'] ?? '';
        $image = $_POST['image'] ?? '';
        $stmt = $pdo->prepare('UPDATE skills SET name = ?, image = ? WHERE id = ?');
        $stmt->execute([$name, $image, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM skills WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $skill = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$skill) {
        exit('Skill doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

    <div class="content update">
        <h2>Update Certificate #<?=$skill['id']?></h2>
        <form action="update.php?id=<?=$skill['id']?>" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="<?=$skill['name']?>" id="name">
            <br>
            <label for="image">URL</label>
            <input type="text" name="image" placeholder="Name" value="<?=$skill['image']?>" id="image">
            <br>
            <br>
            <input type="submit" value="Update">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>