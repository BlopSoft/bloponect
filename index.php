<?php

	require "db.php";

	$id = $_SESSION['logged_user']->id;
	$isverifed = $_SESSION['logged_user']->isverifed;

?>

<!DOCTYPE html
<html lang='ru'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>BlopConnect</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
	<div class="header" align="right">
		<?php if ( isset($_SESSION['logged_user'])) : ?>
		<a href="/allusers.php">Все пользователи</a>
		<a href="/logout.php">Выйти</a>
		<?php else : ?>
		<a href="/allusers.php">Все пользователи</a>
		<a href="/login.php">Войти</a>
		<a href="/register.php">Регестрироваться</a>
		<?php endif; ?>
	</div>
	<div align="center">
		<?php if ( isset($_SESSION['logged_user'])) : ?>
			<div class="main" align="right">
				<a href="/change.php">Изменить аккаунт</a>
			</div>
			<h1>Имя пользователя: <?php echo $_SESSION['logged_user']->username; ?><img src="<?php echo $_SESSION['logged_user']->gifstat; ?>" width="32px"><?php 
				if ($isverifed == 1)
				{ 
					echo('<span title="Аккаунт официальный" class="material-symbols-outlined">done</span>'); 
				} else
				{
					echo('');
				}
			?></h1>
			<h1>ID пользователя: <?php echo $_SESSION['logged_user']->id; ?></h1>
			<h1>Почта: <?php echo $_SESSION['logged_user']->email; ?></h1>
			<h1>О себе: <?php echo $_SESSION['logged_user']->descr; ?></h1>
			<h1 class="head">Активированные устройства:</h1>
			<h1>В разработке</h1>
		<?php else : ?>
			<h1>Добро пожаловать в BlopConnect!</h1>
			<p>Для того чтобы использовать BlopConnect то надо войти или зарегестрировать аккаунт</p>
		<?php endif; ?>
	</div>
</body>
</html>