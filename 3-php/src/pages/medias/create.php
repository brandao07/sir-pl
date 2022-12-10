<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $name = $_POST['name'] ?? '';
    $url = $_POST['url'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO social_medias (name, url, id_me) VALUES (?, ?, ?)');
    $stmt->execute([$name, $url, 1]);
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

    <div class="content update">
        <h2>Create media</h2>
        <form action="create.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Twitter" id="name">
            <br>
            <label for="url">URL</label>
            <input type="text" name="url" placeholder="twitter.com/user" id="url">
            <br>
            <br>
            <input type="submit" value="Create">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>