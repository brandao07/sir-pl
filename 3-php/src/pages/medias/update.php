<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $name = $_POST['name'] ?? '';
        $url = $_POST['url'] ?? '';
        $stmt = $pdo->prepare('UPDATE social_medias SET name = ?, url = ? WHERE id = ?');
        $stmt->execute([$name, $url, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM social_medias WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $media = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$media) {
        exit('Media doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

    <div class="content update">
        <h2>Update Media #<?=$media['id']?></h2>
        <form action="update.php?id=<?=$media['id']?>" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="<?=$media['name']?>" id="name">
            <br>
            <label for="url">URL</label>
            <input type="text" name="url" placeholder="Name" value="<?=$media['url']?>" id="url">
            <br>
            <br>
            <input type="submit" value="Update">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>