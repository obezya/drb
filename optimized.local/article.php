<?php
	require "../config.php";
?>

<!DOCTYPE html>
<html lang="ru">
 <head>
	<title>Don't respect bitches</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="css/style.min.css">
	<link rel="shortcut icon" href="favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="wrapper">
		<header class="header">
	<div class="header__wrapper">
		<div class="header__top">
			<div class="header__container top_container">
				<a href="/" class="header__logo">
					<div class="header__logo-top">Don't RB</div>
					<div class="header__logo-bottom">Обучение верстке</div>
				</a>
				<nav class="header__menu">
					<ul class="menu__list">
						<li class="menu__link"><picture><source srcset="img/icons/kurs.webp" type="image/webp"><img src="img/icons/kurs.png" alt=""></picture><a href="#">Курсы по верстке</a></li>
						<li class="menu__link"><picture><source srcset="img/icons/domen.webp" type="image/webp"><img src="img/icons/domen.png" alt=""></picture><a target="_blank" href="https://xmldatafeed.com/13-luchshih-registratorov-domenov-2021-goda-obzor-i-sravnenie/">Лучшие домены</a></li>
						<li class="menu__link"><picture><source srcset="img/icons/rules.webp" type="image/webp"><img src="img/icons/rules.png" alt=""></picture><a target="_blank" href="https://netology-university.bitbucket.io/codestyle/html/">Правила</a></li>
					</ul>
				</nav>
				<div data-da=".bottom_container,992,0" class="header__social social-header">
					<div class="social-header__title">Связь со мной:</div>
					<ul class="social-header__list">
						<li class="social-header__item"><a target="_blank" href="https://vk.com/fucking_slaveee"><picture><source srcset="img/social/vk.webp" type="image/webp"><img src="img/social/vk.png" alt=""></picture></a></li>
						<li class="social-header__item"><a target="_blank" href="https://www.tiktok.com/@lilpeepgovno?lang=ru-RU"><picture><source srcset="img/social/tiktok.webp" type="image/webp"><img src="img/social/tiktok.png" alt=""></picture></a></li>
						<li class="social-header__item"><a target="_blank" href="https://www.instagram.com/lil_sperma_/"><picture><source srcset="img/social/instagram.webp" type="image/webp"><img src="img/social/instagram.png" alt=""></picture></a></li>
					</ul>
				</div>
				<div class="icon__menu">
					<span></span>
				</div>
			</div>
		</div>
		<div class="header__bottom bottom-header">
			<div class="header__container bottom_container">
				
			</div>
		</div>
	</div>
</header>
		<main class="page">
			<div class="page__container _container">
				<div class="page__main">
					<div class="page__content">
						<div class="page__header"></div>
						<?php
							$articles = mysqli_query($connection, "SELECT * FROM `rate`");
							$art = mysqli_fetch_assoc($articles);
							$article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
							if(mysqli_num_rows($article) <= 0){
								?>
								<div class="page__article article-page">
									<div class="article-page__header">
									</div>
									<div class="article-page__body">
										<div class="article-page__title">Статья не найдена</div>
										</div>
									</div>
								</div>
								<?php
							}else{
								$art = mysqli_fetch_assoc($article);
								mysqli_query($connection, "UPDATE `articles` SET `view` = `view` + 1 WHERE `id` = " . (int) $art['id']);
								?>
								<div class="page__article article-page">
									<div class="article-page__header">
										<div class="article-page__categories">Категория: <div class="article-page__categorie">Программирование</div></div>
										<div class="article-page__views"><picture><source srcset="img/eye.webp" type="image/webp"><img class="article-page__eye" src="img/eye.png" alt=""></picture><?php echo $art['view'] ?></div>
									</div>
									<div class="article-page__body">
										<div class="articles-page__title"><?php echo $art['title'] ?></div>
										<div class="article-page__img _ibg"><picture><source srcset="img/html.webp" type="image/webp"><img src="img/html.jpg" alt=""></picture></div>
										<div class="article-page__text">
										<?php echo $art['text'] ?>
										</div>
									</div>
									
								</div>
							<?php }
						?>
					</div>
					<aside class="page__side">
						<div data-da=".page__header,660,0" class="side__body">
							<div class="side__body-title">Навигация по статье</div>
							<div class="side__navigation">
								<?php echo $art['Navigation'] ?>
							</div>
						</div>
						<div class="side__body-down down-side">
							<div class="down-side__maintitle">
								Следующие уроки
							</div>
							<?php
								$article = mysqli_query($connection, "SELECT * FROM `articles`");
							?>
							<?php
							while($artic = mysqli_fetch_assoc($article)){
							?>
								<div class="down-side__section">
									<a href="/article.php?id=<?php echo $artic['id']; ?>" class="down-side__img _ibg"><picture><source srcset="img/brig.webp" type="image/webp"><img src="img/brig.png" alt="sadasd"></picture></a>
									<a href="/article.php?id=<?php echo $artic['id']; ?>" class="down-side__title"><?php echo $artic['title']; ?></a>
									<a href="/article.php?id=<?php echo $artic['id']; ?>" class="down-side__text"><?php echo mb_substr(strip_tags($artic['text']), 0, 100, 'utf-8') . '...'; ?></a>
								</div>
							<?php
							}
							?>
						</div>
					</aside>
				</div>
			</div>
		</main>
		<footer class="footer">
	<div class="footer__content _container">
		<div class="footer__body">
			<a href="#" class="footer__logo header__logo">
				<div class="header__logo-top">Don't RB</div>
				<div class="header__logo-bottom">Обучение верстке</div>
			</a>
			<nav class="footer__social social-footer">
				<ul class="social-footer__list">
					<a class="social-footer__item" href="https://vk.com/fucking_slaveee"><picture><source srcset="img/social/vk.webp" type="image/webp"><img src="img/social/vk.png" alt=""></picture></a>
					<a class="social-footer__item" href="https://www.tiktok.com/@lilpeepgovno?lang=ru-RU"><picture><source srcset="img/social/tiktok.webp" type="image/webp"><img src="img/social/tiktok.png" alt=""></picture></a>
					<a class="social-footer__item" href="https://www.instagram.com/lil_sperma_/"><picture><source srcset="img/social/instagram.webp" type="image/webp"><img src="img/social/instagram.png" alt=""></picture></a>
				</ul>
			</nav>
		</div>
		<div class="footer__bottom">
			<div class="footer__copy">©2021 Все права защищены.</div>
		</div>
	</div>
</footer>
	</div>
	<div class="popup popup_callback">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__close"></div>
		</div>
	</div>
</div>

<div class="popup popup_video">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__close popup__close_video"></div>
			<div class="popup__video _video"></div>
		</div>
	</div>
</div>

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
<script src="js/vendors.min.js"></script>
<script src="js/app.min.js"></script>
</body>

</html>
