<?php

	require "db.php";



	$data = $_POST;

	if( isset($data['do_login']) )

	{

		$user = R::findOne('user', 'email = ?', array($data['email']));

		if($user)

		{

			if (password_verify($data['pass'], $user->pass)) 

			{

				$_SESSION['logged_user'] = $user;

				header('Location: /blopctmes/index.php');

			} else

			{

				$errors[] = 'Пароль не верный!';

			}

		} else

		{

			$errors[] = 'Пользователь не найден!';

		}



		if ( ! empty($errors)) 

		{

			echo '<div>'.array_shift($errors).'</div>';

		}

	}

?>



<!DOCTYPE html

<html lang='ru'>

<head>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <title>Вход</title>

    <link rel="stylesheet" href="css.css">

</head>

<body>

	<div class="header" align="right">

		<a href="/register.php">Регестрироваться</a>

	</div>

	<div class="main">

		<form action="/blopctmes/login.php" method="POST">

			<p>

				<p>Логин:</p>

				<input type="email" name="email">

			</p>

			<p>

				<p>Пароль:</p>

				<input type="password" name="pass">

			</p>

			<p>

				<button type="submit" name="do_login">Войти</button>

			</p>

	</div>

</body>

</html>