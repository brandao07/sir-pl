<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $name = $_POST['name'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $description = $_POST['description'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO educations (name, duration, description, id_me) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $duration,$description, 1]);
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

    <div class="content update">
        <h2>Create education</h2>
        <form action="create.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="IPVC" id="name">
            <br>
            <label for="duration">Duration</label>
            <input type="text" name="duration" placeholder="2020-Present" id="duration">
            <br>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="Learned how to martelar" id="description">
            <br>
            <br>
            <input type="submit" value="Create">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>