<?php

	require "db.php";

?>



<!DOCTYPE html

<html lang='ru'>

<head>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <title>Все пользователи</title>

    <link rel="stylesheet" href="css.css">

</head>

<body>

	<div class="header" align="right">

		<?php if ( isset($_SESSION['logged_user'])) : ?>

		<a href="/index.php">Домой</a>

		<?php else : ?>

		<a href="/login.php">Войти</a>

		<a href="/register.php">Регестрироваться</a>

		<?php endif; ?>

	</div>

	<div class="main" align="left">
	
		<?php $allUsers = R::count('user'); echo "<p>На сайте всего: {$allUsers} пользователей</p>"; ?>

		<?php $loadLastUsers = R::findAll('user'); foreach ($loadLastUsers as $user) { echo "<h1>{$user['username']}</h1> <p>id: {$user['id']}</p> <p>Описание: {$user['descr']}</p>";  } ?>

	</div>

</body>

</html>