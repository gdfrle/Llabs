<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/logics/registration_logic.php');
$title = 'Регистрация';
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/header.php');
?>

<main class="main">
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="text-center">
				</br>
				<div class="h3 mb-4">
					Регистрация нового пользователя
				</div>
				<div class="mb-3">
					<a class="text-info" href="login.php">
						У вас уже есть аккаунт? Перейдите сюда :)
					</a>
				</div>
				<form action="" class="text-center" method="post">
					<div class=" d-flex justify-content-between">
						<div class=" pt-2">
							<p class="text-primary">Введите фамилию, имя и отчество</p>
						</div>
						<input type="text" name="FIO" value="<?=$FIO?>" placeholder="Введите ФИО"
							   class="form-control w-75 mb-3">
					</div>
					<?php if ($arrayerrors['errfio']) {
						echo '<p class="text-danger">' . $arrayerrors['errfio'] . '</p>';
					}
					?>

					<div class="mt-3 d-flex justify-content-between">
						<div class="mb-3 pt-2">
							<p class="text-primary">Введите вашу электронную почту - она будет логином на сайте</p>
						</div>
						<input type="email" name="Login" value="<?=$Login?>"
							   placeholder="Введите логин" class="form-control w-75 mb-3">
					</div>
					<?php if ($arrayerrors['errlogin']) {
						echo '<p class="text-danger">' . $arrayerrors['errlogin'] . '</p>';
					} ?>

					<div class=" d-flex justify-content-between">
						<div class="mb-3 pt-2">
							<p class="text-primary">Придумайте пароль</p>
						</div>
						<input type="password" name="Password1" style="width: 65%;" placeholder="Введите пароль"
							   class="form-control mb-3">
					</div>
					<?php if ($arrayerrors['errpassword']) {
						echo '<p class="text-danger">' . $arrayerrors['errpassword'] . '</p>';
					} ?>

					<div class=" d-flex justify-content-between">
						<div class="mb-3 pt-2">
							<p class="text-primary">Повторите Ваш пароль</p>
						</div>
						<input type="password" name="Password2" style="width: 65%;" placeholder="Введите пароль"
							   class="form-control mb-3">
					</div>

					<?php if ($arrayerrors['errpassword']) {
						echo '<p class="text-danger">' . $arrayerrors['errpassword'] . '</p>';
					} ?>

					<div class="mb-3 d-flex justify-content-between">
						<div class="mb-3 pt-2">
							<p class="text-primary">Выберите Вашу дату рождения</p>
						</div>
						<input type="date" value="<?=$DateBirth?>" name="DateBirth"
							   style="width: 65%;" class="form-control mb-3">
					</div>
					<?php if ($arrayerrors['errbirth']) {
						echo '<p class="text-danger">' . $arrayerrors['errbirth'] . '</p>';
					} ?>
					<div class="mb-3">
						<p class="text-primary">Выберите Ваш пол</p>
						<select name="Gender" required class="form-control">
							<?php
							foreach ($optionItem1 as $id => $item) {
								$attr = ($Gender == $id) ? 'selected' : '';
								echo '<option value="' . $id . '"' . $attr . '>' . $item . '</option>';
							} ?>
						</select>
					</div>
					<?php if ($arrayerrors['errgender']) {
						echo '<p class="text-danger">' . $arrayerrors['errgender'] . '</p>';
					} ?>

					<div class="mb-3 d-flex justify-content-between">
						<div class="mb-3 pt-3">
							<p class="text-primary">Введите Ваш адрес</p>
						</div>
						<textarea name="Adress" placeholder="Введите адрес"
								  class="form-control w-75"><?=$Adress?></textarea>
					</div>
					<?php if ($arrayerrors['erradress']) {
						echo '<p class="text-danger">' . $arrayerrors['erradress'] . '</p>';
					} ?>

					<input type="submit" value="Зарегистрироваться" name="register" class="btn btn-primary">
				</form>
				</br>
			</div>
		</div>
	</div>
</main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR3/footer.php');
?>
