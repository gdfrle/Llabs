<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/table.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/table_action.php');

// выбрали по перехваченному айди запись
$id = $_GET['id'];

$title = "Удалить запись";
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/header.php');
?>

<div class="container gy-2">
	<h3>Удаление записи под номером <?=$id?></h3>
	<?php if (TableAction::Delete() == 0) echo '<p class="text-success">Запись была удалена! Вернитесь на главную</p>';?>
	<form action="" method="post">
		<input name="customid" type="hidden" class="form-control" value="<?=$id?>">
		<button name="delete" type="submit" class='btn btn-danger'>Удалить</button>
	</form>
</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/footer.php');
?>
