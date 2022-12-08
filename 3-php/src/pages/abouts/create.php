<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $description = $_POST['description'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO abouts (description, id_me) VALUES (?, ?)');
    $stmt->execute([$description, 1]);
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Create about</h2>
    <form action="create.php" method="post">
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Student" id="description">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>