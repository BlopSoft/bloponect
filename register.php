<?php

	require "db.php";



	$data = $_POST;

	if( isset($data['do_signup']) )

	{



		$errors = array();

		if (trim($data['username']) == '' ) 

		{

			$errors[] = 'Введите ник!';

		}



		if (trim($data['email']) == '' ) 

		{

			$errors[] = 'Введите email!';

		}



		if (trim($data['pass']) == '' ) 

		{

			$errors[] = 'Введите пароль!';

		}

		

		if (trim($data['pass2']) != $data['pass'] ) 

		{

			$errors[] = 'Повторный пароль введён неверно!';

		}



		if (R::count('user', "email =?", array($data['email'])) > 0 ) 

		{

			$errors[] = 'Такой email занят!';

		}

		

		if (R::count('user', "username = ?", array($data['username'])) > 0 ) 

		{

			$errors[] = 'Этот пользователь был зарегестрироавн!';

		}

		if (R::count('user', "ipad = ?", array($_SERVER['REMOTE_ADDR'])) > 0 ) 

		{

			$errors[] = 'Вы уже зарегестрированы!';

		}
		

		if (empty($errors)) 

		{

			$user = R::dispense('user');

			$user->username = $data['username'];

			$user->email = $data['email'];

			$user->pass = password_hash($data['pass'],

			PASSWORD_DEFAULT);

			$user->descr = $data['descr'];

			$user->ipad = $_SERVER['REMOTE_ADDR'];

			R::store($user);

			echo '<div>Вы успешно зарегестрироавны!</div>';

		} else

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

    <title>Регистрация</title>

    <link rel="stylesheet" href="css.css">

</head>

<body>

	<div class="header" align="right">

		<a href="/login.php">Войти</a>

	</div>

	<div class="main">

		<form action="/register.php" method="POST">

			<p>

				<p>Ваш ник (Максимум 16 букв):</p>

				<input type="text" name="username" value="<?php echo @$data['username']; ?>">

			</p>

			<p>

				<p>Ваша электронная почта:</p>

				<input type="email" name="email" value="<?php echo @$data['email']; ?>">

			</p>

			<p>

				<p>Ваш пароль (Максимум 20 букв):</p>

				<input type="password" name="pass" value="<?php echo @$data['pass']; ?>">

			</p>

			<p>

				<p>Повторить ваш пароль:</p>

				<input type="password" name="pass2">

			</p>

			<p>

				<p>Описание вашего аккаунта:</p>

				<textarea name="descr"></textarea>

			</p>

			<p>

				<button type="submit" name="do_signup">Зарегестрироваться</button>

			</p>

		</form>

	</div>

</body>

</html>