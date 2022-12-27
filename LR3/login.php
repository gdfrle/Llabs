<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/logics/login_logic.php');
$title = 'Авторизация';
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/header.php');
?>

<main class="main" >
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="text-center">
				<br>
				<div class="h3 mb-4">
					Авторизация
				</div>
				<div class="mb-3">
					<a class="text-info" href="registration.php">
						У вас еще нет аккаунта? Создайте его :)
					</a>
				</div>
				<form action="" class="text-center" method="post">
					<div class=" d-flex justify-content-between">
						<div class="mb-3 pt-2">
							<p class="text-primary">E-mail</p>
						</div>
						<input type="text" name="Login" placeholder="Введите логин" class="form-control w-75 mb-3">
					</div>
					<?php if($arrayerrors['errlogin']){
						echo '<p class="text-danger">'.$arrayerrors['errlogin'] . '</p>';}
					?>
					<div class=" d-flex justify-content-between">
						<div class="mb-3 pt-2">
							<p class="text-primary">Пароль</p>
						</div>
						<input type="password" name="Password" placeholder="Введите пароль" class="form-control w-75 mb-3">
					</div>
					<?php if($arrayerrors['errpass']){
						echo '<p class="text-danger">'.$arrayerrors['errpass'] . '</p>';}
					if (($error) and ($error == 'Неверный логин или пароль '))  {
						echo '<p class="text-danger">'. $error . '</p>';
					}
					?>

					<input type="submit" name="login" value="Войти в аккаунт" class="btn btn-primary">
				</form>
				</br>
			</div>
		</div>
	</div>
</main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/footer.php');
?>