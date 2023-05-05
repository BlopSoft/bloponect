<?php

	require "db.php";

	$data = $_POST;

	if( isset($_POST['do_send']))
	{
      	$messegr = R::dispense('messeg');
		$messegr->name = 'пидр';
		$messegr->msgtxt = $data['messegr'];
		R::store($messegr);
	}

?>

<!DOCTYPE html
<html lang='ru'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>BlopCTChat</title>
    <link rel="stylesheet" href="/css.css">
</head>
<body>
	<div class="header" align="left">
		<?php if ( isset($_SESSION['logged_user'])) : ?>
		BlopCTChat
		<?php else : ?>
		<a href="/blopctmes/login.php">Войти</a>
		<?php endif; ?>
	</div>
	<div class="main" align="left">
		<?php if ( isset($_SESSION['logged_user'])) : ?>
			<h1>Сообщения:</h1>
			<?php $loadLastUsers = R::findAll('messeg'); foreach ($loadLastUsers as $messeg) { echo "<h1>{$messeg['name']} Дата: {$messeg['msgdata']}</h1> <p>{$messeg['msgtxt']}</p>";  } ?>
			<hr>
		<form action="/blopctmes/index.php" method="POST">
			<p>
				<input name="messegr">
			</p>
			<p>
				<button type="submit" name="do_send">Отправить</button>
			</p>
		</form>
			<?php else : ?>
			<h1>Добро пожаловать в BlopCTMessenger!</h1>
			<p>Для того чтобы использовать BlopCTMessenger то надо войти или зарегестрировать аккаунт</p>
		<?php endif; ?>
	</div>
</body>
</html>