<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Logowanie</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
	<div class="wrapper">

	<h1>Car rental</h1>
	
	<h2>Logowanie do serwisu</h2>
	<div class="left" style="margin-left:150px;padding:30px 10px 0px 10px;">
		<form action="logowanie.php" method="post"> 
		<input type="text" name="login_NEP" placeholder="podaj login" /> 
		<br/> 
		<input type="password" name="haslo" placeholder="podaj hasło" /> 
		<br/>
		<input type="submit" name="submit" value="Zaloguj" />
		<?php
		require '../skrypty/loguj.php';
		require '../baza.php';
		?>
		</form>
	</div>
	<footer>
        <div>
            &copy; <?= date('Y') ?> Łukasz Żebrowski
        </div>
        <div>
            <a href="#">Kontakt</a>
            <a href="#">Regulamin</a>
            <!-- Dodaj inne linki, jeśli są potrzebne -->
        </div>
    </footer>
</body>
</html>
