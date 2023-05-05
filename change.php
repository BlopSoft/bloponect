<?php



	require "db.php";



	$data = $_POST;



	$id = $_SESSION['logged_user']->id;



	if( isset($_POST['do_change']))

	{

		$user = R::findOne('user', 'id = ?', [$id]);

      		

      		$user->username = $data['username'];

            $user->descr = $data['descr'];

            $user->gifstat = $data['gifstat'];

            R::store($user);

            header("Location:/index.php");

	}

?>







<!DOCTYPE html

<html lang="ru">

<head>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <title>Изменение аккаунта</title>

    <link rel="stylesheet" href="css.css">

</head>

<body>

	<div class="header" align="right">

		<a href="/allusers.php">Все пользователи</a>

		<a href="/index.php">Домой</a>

	</div>

	<div class="main" align="left">

		<form action="/change.php" method="POST">

			<p>

				<p>Ник:</p>

				<input name="username" value="<?php echo $_SESSION['logged_user']->username; ?>">

			</p>

			<p>

				<p>Описание:</p>

				<textarea name="descr"><?php echo $_SESSION['logged_user']->descr; ?></textarea>

			</p>

			<p>

				<p>gif-статус:</p>

				<textarea name="gifstat"><?php echo $_SESSION['logged_user']->gifstat; ?></textarea>

			</p>


			<p>

				<button type="submit" name="do_change">Изменить</button>

			</p>



			<a href="/delete.php">Удаление аккаунта</a>

		</form>

	</div>

</body>

</html>