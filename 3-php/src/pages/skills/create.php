<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $name = $_POST['name'] ?? '';
    $image = $_POST['image'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO skills (name, image, id_me) VALUES (?, ?, ?)');
    $stmt->execute([$name, $image, 1]);
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

    <div class="content update">
        <h2>Create skill</h2>
        <form action="create.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Golang" id="name">
            <br>
            <label for="image">Image URL</label>
            <input type="text" name="image" placeholder="" id="image">
            <br>
            <br>
            <input type="submit" value="Create">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>