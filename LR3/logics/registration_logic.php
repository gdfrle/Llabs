<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/logics/dbconnect.php');

// соль для хеширования
$Salt = "1afa148eb41f2e7103f21410bf48346c";

// заменяем теги html, просто экранинурем их вдальнейшем
$Login = htmlspecialchars($_POST['Login']);
$FIO = htmlspecialchars($_POST["FIO"]);
$Password1 = htmlspecialchars($_POST['Password1']);
$Password2 = htmlspecialchars($_POST['Password2']);
$DateBirth = htmlspecialchars($_POST["DateBirth"]);
$Gender = htmlspecialchars($_POST["Gender"]);
$Adress = htmlspecialchars($_POST["Adress"]);

$optionItem1 = [
	"Не определился (лась)",
	"Мужской",
	"Женский"
];

$arrayerrors = [
	"errlogin" => "",
	"errfio" => "",
	"errpassword" => "",
	"errbirth" => "",
	"errgender" => "",
	"erradress" => ""
];

if (isset($_POST['register'])) {
	$users = $mysql->prepare("SELECT * FROM users WHERE login=:Login");
	$users->execute([
		':Login' => $Login,
	]);

	$usernum = $users->fetchColumn();
	$errors = 0;

	if ($usernum) {
		$arrayerrors['errlogin'] = 'Пользователь с таким логином уже существует';
		$errors++;
	}

	if (!(filter_var($Login, FILTER_VALIDATE_EMAIL))) {
		$arrayerrors['errlogin'] = 'Невалидный email';
		$errors++;
	}

	if ($Login == "") {
		$arrayerrors['errlogin'] = 'Заполните поле';
		$errors++;
	}

	if ($FIO == "") {
		$arrayerrors['errfio'] = 'Заполните поле c ФИО';
		$errors++;
	}

	if ($DateBirth == "") {
		$arrayerrors['errbirth'] = 'Выберите дату рождения';
		$errors++;
	}

	if ($Gender == "") {
		$arrayerrors['errbirth'] = 'Выберите пол';
		$errors++;
	}

	if ($Adress == "") {
		$arrayerrors['erradress'] = 'Введите адрес';
		$errors++;
	}

	if ($Password1 == "") {
		$arrayerrors['errpassword'] = 'Введите пароль';
		$errors++;
	}

	if ($Password2 == "") {
		$arrayerrors['errpassword'] = 'Введите пароль';
		$errors++;
	}

	if (strlen($Password1)<=5 || !preg_match('#^(?=.*[A-Z])(?=.*[a-z])#s', $Password1) || preg_match('#^(?=.*[А-Я])(?=.*[а-я])#s', $Password1)) {
		$arrayerrors['errpassword'] = "Пароль должен содержать большие и маленькие латинские буквы и быть не короче 5 символов";
		$errors++;
	}

	if ($Password1 != $Password2) {
		$arrayerrors['errpassword'] = 'Пароли не совпадают';
		$errors++;
	}

	if ($errors == 0) {
		$PasswordHash = md5($Salt . $Password1);
		$id = uniqid();
		$query = "INSERT INTO users (login, password, FIO, bdate, gender, adress) VALUES 
                                                        (:Login, :PasswordHash, :FIO, :DateBirth, :Gender, :Adress)";
		$resultQuery = $mysql->prepare($query);
		$resultQuery->execute([
			':Login' => $Login,
			':PasswordHash' => $PasswordHash,
			':FIO' => $FIO,
			':DateBirth' => $DateBirth,
			':Gender' => $Gender,
			':Adress' => $Adress
		]);

		session_start();
		$_SESSION["user"] = $Login;
		$_SESSION["id"] = $id;

		header("Location: /lena/LR3/");
	}

}