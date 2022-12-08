<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 20;

$stmt = $pdo->prepare('SELECT * FROM abouts ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$abouts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_abouts = $pdo->query('SELECT COUNT(*) FROM abouts')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Abouts</h2>
	<a href="create.php" class="create-language">Create About</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Description</td>
                <td>Deleted</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($abouts as $a): ?>
            <tr>
                <td><?=$a['id']?></td>
                <td><?=$a['description']?></td>
                <td><?=$a['is_deleted']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$a['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$a['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_abouts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>