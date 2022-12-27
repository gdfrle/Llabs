<!
<DOCTYPE html>
	<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--    <link rel="shortcut icon" href="/assets/template/images/favicon.ico">-->
		<link href="style.css" rel="stylesheet" type="text/css">
		<title><?php echo $title; ?></title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
			  integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			  crossorigin="anonymous">
		<!--    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">-->
		<style id="fit-vids-style">.fluid-width-video-wrapper {
				width: 100%;
				position: relative;
				padding: 0;
			}

			.fluid-width-video-wrapper iframe, .fluid-width-video-wrapper object, .fluid-width-video-wrapper embed {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
			}</style>

	</head>
	<body>
	<div class="header-middle p-0 bg-light xs-text-center">
		<div class="container pt-10 pb-10">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="widget text-left logo">
						<a class="" href="/"><img src="https://rtst.ru/assets/template/images/logo-240.png" alt=""></a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="widget sm-text-center">
						<img src="https://png.pngtree.com/png-vector/20191011/ourlarge/pngtree-phone-icon-png-image_1817554.jpg"
							 width="30" height="30">
						<a href="tel:88005500562" class=" mt-5 mr-10 sm-display-block pull-left flip sm-pull-none"><i
									class="fa fa-phone-square text-theme-colored2 font-32"></i></a>
						<div class="h5 font-13 text-black m-0"><span
									class="font-12 text-gray text-uppercase">Телефоны:</span> <a
									href="tel:+78442430007">+7
								(8442) 43-00-07</a></div>
						<div class="h5 font-13 text-black m-0"><a href="tel:88005500562">8 (800) 550-05-62</a>, <a
									href="tel:+79275101100">+7 927-510-11-00</a></div>
					</div>
					<div class="widget">
						<i class="fa fa-clock-o text-theme-colored2"></i> Время работы: пн-пт: 8.00- 17.00, сб: 8.00-
						15.00
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="widget sm-text-center">
						<img src="https://abrakadabra.fun/uploads/posts/2022-02/1644403887_1-abrakadabra-fun-p-ikonka-geometka-4.png"
							 width="30" height="30">
						<i class="fa fa-building-o text-theme-colored2 font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
						<a href="https://rtst.ru/#map" class="font-12 text-gray text-uppercase">Адрес</a>
						<a href="https://rtst.ru/#map" class="font-13 text-black m-0"> г. Волгоград, ул. Вокзальная, д.
							63</a>
						<div clsas=""><a href="https://rtst.ru/callback.html" class="ajaxload-popup text-black"><i
										class="fa fa-phone-o mr-5 text-theme-colored2"></i> Заказать звонок</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header-nav">
		<div class="header-nav-wrapper navbar-scrolltofixed">
			<div class="container text-center">
				<div class="row row-cols-auto">
					<div class="col">
						<div class="home"><img src="https://cdn-icons-png.flaticon.com/512/70/70083.png" width="30"
											   height="30"></div>
					</div>
					<div class="col">
						Продукция для РЖД
					</div>
					<div class="col">
						Трубошпунт
					</div>
					<div class="col">
						Продукция
					</div>
					<div class="col">
						Фото продукции
					</div>
					<div class="col">
						Контакты
					</div>
					<div class="col">
						Карта сайта
					</div>
					<div class="col">
						<div class="header-tel">
							<a href="tel:88005500562"><b>8(800)550-05-62</b></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="main-content">

		<section class="inner-header divider parallax layer-overlay overlay-dark-5"
				 style="background-position: 50% 78px;">
			<div class="container pt-70 pb-20">
				<div class="section-content">
					<div class="row">
						<nav class="col-md-12" aria-label="breadcrumb">
							<ol class="breadcrumb text-left text-white mt-10">
								<li class="breadcrumb-item"><a class="nav-link"
															   href="/lena/LR3/"><br>Главная</a></li>
								<?php if (isset($_SESSION['user'])): ?>
									<li class="breadcrumb-item"><a class="nav-link disabled">
											Вы уже авторизованы как <?=$_SESSION['user']?></a></li>
									<li class='breadcrumb-item'><a class='nav-link' href='/lena/LR3/table.php'>Секретная база данных</a></li>
									<li class="breadcrumb-item"><a href="/lena/LR3/logics/logout.php" class="nav-link"><p class="text-info">Выйти</p></a></li>
								<?php endif; ?>
								<?php if (!(isset($_SESSION['user']))): ?>
									<li class="breadcrumb-item"><a href="/lena/LR3/login.php"
																   class="nav-link"><p class="text-info">Войти</p></a></li>
									<li class="breadcrumb-item"><a href="/lena/LR3/registration.php"
																   class="nav-link"><p class="text-primary">Зарегистрироваться</p></a>
									</li>
								<?php endif; ?>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section>