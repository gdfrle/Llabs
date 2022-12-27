<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/table.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/table_action.php');

// выбрали по перехваченному айди запись и заполнили поля
$id = $_GET['id'];
$item = Table::GetById($id);
$img_path = $item['img_path'];
if (isset($_POST['img'])) {
	$img_path = $_POST['img'];
}
$adress = $item['adress'];
if (isset($_POST['adress'])) {
	$adress = $_POST['adress'];
}
$description = $item['description'];
if (isset($_POST['description'])) {
	$description = $_POST['description'];
}
$storeid = $item['storeid'];
if (isset($_POST['storeid'])) {
	$storeid = $_POST['storeid'];
}

$title = "Редактировать запись";
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/header.php');
?>

<div class="container gy-2">
	<h3>Редактирование записи под номером <?=$id?></h3>
	<?php if (TableAction::Edit() == 1) {
		if ($img_path != '') {
			echo '<p class="text-danger">Заполните все поля!!!</p>';
		}
	}
	if (TableAction::Edit() == 0) {
		echo '<p class="text-success">Запись была изменена! Вернитесь на главную</p>';
	} ?>
	<h4>Загрузка картинки</h4>
	<form action="" enctype="multipart/form-data" method="post">
		<div class="d-flex justify-content-between">
			<div class="mb-3 pt-1">
				<p class="text-primary">Выберите картинку</p>
				<?php if ($_FILES && $_FILES["img"]["error"] == UPLOAD_ERR_OK) {
					$img_path = $_FILES["img"]["name"];
					$name = "E:/xampp/htdocs/lena/LR67/img/" . $_FILES["img"]["name"];
					move_uploaded_file($_FILES["img"]["tmp_name"], $name);
					echo '<p class="text-info">Файл ' . $img_path . ' загружен, нажмите кнопку отправки формы для записи</p>';
				} ?>
			</div>
			<input name="img" type="file" accept="image/*" class="form-control-file w-75 mb-3"
				   placeholder="Выберите картинку"
				   value="<?=$img_path?>">
		</div>
		<button name="upload" type="submit" class='btn btn-primary'>Загрузить картинку на сервер</button>
	</form>
	<h4>Изменение формы с загруженной картинкой</h4>
	<form action="" method="post">
		<input name="customid" type="hidden" class="form-control" value="<?=$id?>">
		<input name="img_path" type="hidden" class="form-control" value="<?=$img_path?>">
		<div class="d-flex justify-content-between">
			<div class="mb-3 pt-1">
				<p class="text-primary">Введите Ваш адрес</p>
			</div>
			<input name="adress" type="text" class="form-control w-75 mb-3" placeholder="Введите адрес"
				   value="<?=$adress?>">
		</div>
		<div class="d-flex justify-content-between">
			<div class="mb-3 pt-1">
				<p class="text-primary">Введите описание Вашей услуги</p>
			</div>
			<input name="description" type="text" class="form-control w-75 mb-3" placeholder="Введите описание"
				   value="<?=$description?>">
		</div>
		<div class="d-flex justify-content-between">
			<div class="mb-3 pt-1">
				<p class="text-primary">Выберите торговую точку</p>
			</div>
			<select name="storeid" class="form-select w-75 mb-3">
				<option value=0>Выберите номер торговой точки</option>
				<?php foreach (Table::Show_stores() as $item) {
					echo "<option value='" . $item['storeid'] . "'";
					if ($item['storeid'] == $storeid) {
						echo ' selected';
					}
					echo '>' . $item['storeid'] . ', цена работ ' . $item['price'] . '</option>';
				} ?>
			</select>
		</div>
		<button name="edit" type="submit" class='btn btn-success'>Редактировать</button>
	</form>
</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/footer.php');
?>