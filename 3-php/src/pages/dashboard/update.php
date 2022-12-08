<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $name = $_POST['name'] ?? '';
        $quote = $_POST['quote'] ?? '';
        $languages_description = $_POST['languages_description'] ?? '';
        $certificates_description = $_POST['certificates_description'] ?? '';
        $skills_description = $_POST['skills_description'] ?? '';

        $stmt = $pdo->prepare('UPDATE me SET name = ?, quote = ?, languages_description = ?, certificates_description = ?, skills_description = ?  WHERE id = ?');
        $stmt->execute([$name, $quote, $languages_description, $certificates_description, $skills_description, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM me WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $me = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$me) {
        exit('Portfolio doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?= template_header('Read') ?>
    <div class="content update">
        <h2>Update Portfolio <?= $me['id'] ?></h2>
        <form action="update.php?id=<?= $me['id'] ?>" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="<?= $me['name'] ?>"
                   id="name">
            <label for="quote">Quote</label>
            <input type="text" name="quote" placeholder="Quote" value="<?= $me['quote'] ?>"
                   id="quote">
            <label for="languages_description">Languages Description</label>
            <input type="text" name="languages_description" placeholder="Languages Description" value="<?= $me['languages_description'] ?>"
                   id="languages_description">
            <label for="certificates_description">Certificates Description</label>
            <input type="text" name="certificates_description" placeholder="Certificates Description" value="<?= $me['certificates_description'] ?>"
                   id="certificates_description">
            <label for="skills_description">Skills Description</label>
            <input type="text" name="skills_description" placeholder="Skills Description" value="<?= $me['skills_description'] ?>"
                   id="skills_description">
            <input type="submit" value="Update">
        </form>
        <?php if ($msg): ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
    </div>
<?= template_footer() ?>