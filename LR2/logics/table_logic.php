<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_name', 'rostrubostal');

// подключение к БД
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_name);
if ($mysql->connect_errno) {
	exit("Произошла ошибка подключения к БД");
}
$mysql->set_charset("utf8");

// список точек
$query_store = $mysql->query('SELECT storeid, price FROM store');

// создание списка точек
$store_list = [];
while ($row = $query_store->fetch_assoc()) {
	$store_list[] = $row;
}

//защита формы от очистки
$adress = '';
if (isset($_GET['adress'])) {
	$adress = $_GET['adress'];
}
$description = '';
if (isset($_GET['description'])) {
	$description = $_GET['description'];
}
$storeid = 0;
if (isset($_GET['storeid'])) {
	$storeid = $_GET['storeid'];
}
$price_top = 0;
if (isset($_GET['price_top'])) {
	$price_top = $_GET['price_top'];
}
$price_bottom = 0;
if (isset($_GET['price_bottom'])) {
	$price_bottom = $_GET['price_bottom'];
}

// полный список объявлений до фильтрации
$query = 'SELECT img_path, adress, description, storeid, price from customer INNER JOIN store ON (fk_storeid = storeid)';

// перемнная сбора ошибок
$err = 0;

// что произойдёт если нажмут на кнопку очистки
if (isset($_GET['clear'])) {
	$adress = '';
	$description = '';
	$storeid = 0;
	$price_top = 0;
	$price_bottom = 0;
}

// Фильтрация по адресу
if (isset($_GET['adress'])) {
	$query .= " AND adress LIKE '%" . mysqli_real_escape_string($mysql, filter_var($_GET['adress'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) . "%'";
}

// Фильтрация по описанию
if (isset($_GET['description'])) {
	$query .= " AND description LIKE '%" . mysqli_real_escape_string($mysql, filter_var($_GET['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) . "%'";
}

// Фильтрация по номеру торговой точки
if (isset($_GET['storeid'])) {
	$query .= " AND storeid LIKE '%" . mysqli_real_escape_string($mysql, filter_var($_GET['storeid'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) . "%'";
}

// Фильтрация по нижней цене
if (isset($_GET["price_bottom"])) {
	if ($_GET["price_bottom"]>=0) {
		if (filter_var($_GET["price_bottom"], FILTER_VALIDATE_INT)) {
			$query .= " AND price >= " . $_GET["price_bottom"];
		}
		//$err = 0;
	} else {
		$err += 100;
	}
}

// Фильтрация по верхней цене
if (isset($_GET["price_top"])) {
	if ($_GET["price_top"]>=0) {
		if (filter_var($_GET["price_top"], FILTER_VALIDATE_INT)) {
			$query .= " AND price <= " . $_GET["price_top"];
		}
		//$err = 0;
	} else {
		$err += 100;
	}
}

// запись результата в табличку
$result = $mysql->query($query);

$tableData = [];

while ($row = $result->fetch_assoc()) {
	$tableData[] = $row;
}

