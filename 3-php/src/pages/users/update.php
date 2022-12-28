<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
if ($_SESSION["role"] != 1) {
    header("location: ../dashboard/dashboard.php");
    exit;
}

$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $name = $_POST['name'] ?? '';
        $username = $_POST['username'] ?? '';
        $id_roles = $_POST['id_roles'] ?? '';
        $stmt = $pdo->prepare('UPDATE users SET name = ?, username = ?, id_roles = ?, id_me = ? WHERE id = ?');
        $stmt->execute([$name, $username, $id_roles, 1,$_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('User doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

    <div class="content update">
        <h2>Update About #<?=$user['id']?></h2>
        <form action="update.php?id=<?=$user['id']?>" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="<?=$user['name']?>" id="name">
            <br>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Name" value="<?=$user['username']?>" id="username">
            <br>
            <label for="id_roles">Role</label>
            <input type="text" name="id_roles" placeholder="Name" value="<?=$user['id_roles']?>" id="id_roles">
            <br>
            <br>
            <input type="submit" value="Update">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>