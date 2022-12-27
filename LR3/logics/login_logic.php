<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/logics/dbconnect.php');

// соль для хеширования
$Salt = "1afa148eb41f2e7103f21410bf48346c";

$Login = '';
$Password = '';

$arrayerrors = [
	'errlogin' => '',
	'errpass' => '',
	'errattempt' => '',
];

$error = 0;

if ($_POST){
	if(isset($_POST['Login']) && isset($_POST['Password'])){
		$Login = htmlspecialchars($_POST["Login"]);
		$Password = htmlspecialchars($_POST["Password"]);
		$PasswordHash = md5($Salt . $Password);
	}

	if($Login == '') {
		$arrayerrors['errlogin'] = 'Введите логин';
		$error++;
	}
	if($Password == ''){
		$arrayerrors['errpass'] = 'Введите пароль';
		$error++;
	}

	if ($error == 0){
		$users = $mysql->prepare("SELECT id FROM users WHERE login=:Login AND password=:passwordHash");
		$users->execute([
			':Login' => $Login,
			':passwordHash' => $PasswordHash
		]);

		$ids = $users->fetchColumn();
		if($ids < 1){
			$error = 'Неверный логин или пароль ';
		}
		else {
			$id = $ids[0];
			$_SESSION["user"] = $Login;
			$_SESSION["id"] = $id;

			header("Location: /lena/LR3/");
		}
	}
}