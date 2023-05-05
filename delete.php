<?php

	require "db.php";

	$data = $_POST;

	$id = $_SESSION['logged_user']->id;

	if( isset($_POST['do_change']))
	{
		$user = R::load('user', $id);

		R::trash($user);

		unset($_SESSION['logged_user']);

		header("Location:/index.php");
	}

	if( isset($_POST['do_delete']))
	{
		header("Location:/index.php");
	}

?>

<!DOCTYPE html
<html lang="ru">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Удаление аккаунта</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
	<div class="header" align="right">
		<a href="/allusers.php">Все пользователи</a>
		<a href="/index.php">Домой</a>
	</div>
	<div class="main" align="left">
		<form action="/delete.php" method="POST">
			<p>
				<h1>ВЫ ТОЧНО ХОТИТЕ УДАЛИТЬ АККАУНТ?</h1>
			</p>
			<p>
				<button type="submit" name="do_change">Да</button>
				<button type="submit" name="do_delete">Нет</button>
			</p>
		</form>
	</div>
</body>
</html>