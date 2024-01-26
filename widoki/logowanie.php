<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Logowanie</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<div class="wrapper">
	<div class="log">
		<form action="logowanie.php" method="post"> 
		<h1>Login</h1>
		<div class="input-box">
			<input type="text" name="login_NEP" placeholder="podaj login" />
			<i class='bx bxs-user'></i>
		</div> 
		<div class="input-box">
		<input type="password" name="haslo" placeholder="podaj hasło" />
		<i class='bx bxs-lock-alt' ></i>
		</div>
		<input type="submit" class="btn" name="submit" value="Zaloguj" />
		<?php
		require '../skrypty/loguj.php';
		require '../baza.php';
		?>
		</form>
	</div>
</div>
<footer>
            &copy; <?= date('Y') ?> Łukasz Żebrowski
            <a href="#" class="foot">Kontakt</a>
            <a href="#" class="foot">Regulamin</a>
    </footer>
</body>
</html>
