<?php
require "../../utils/functions.php";
require "../../db/connection.php";

// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Prepare the SQL statement and get records from our abouts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM me WHERE id = 1');
$stmt->execute();
// Fetch the records, so we can display them in our template.
$me = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>
    <div class="content read">
        <h2>Portfolio</h2>
        <table>
            <thead>
            <tr>
                <td>Name</td>
                <td>Quote</td>
                <td>Languages Description</td>
                <td>Certificates Description</td>
                <td>Skills Description</td>
                <td>Deleted</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($me as $m): ?>
                <tr>
                    <td><?=$m['name']?></td>
                    <td><?=$m['quote']?></td>
                    <td><?=$m['languages_description']?></td>
                    <td><?=$m['certificates_description']?></td>
                    <td><?=$m['skills_description']?></td>
                    <td><?=$m['is_deleted']?></td>
                    <td class="actions">
                        <a href="update.php?id=<?=$m['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?=template_footer()?>