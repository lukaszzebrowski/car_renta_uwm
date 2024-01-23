<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Logowanie</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
	<div class="wrapper">
	<a href="wyloguj.php" class="right">Wyloguj</a>
	<a href="logowanie.php" class="right">Zaloguj</a>

	<h1>Car rental</h1>
	<nav>
		<ul>
			<li><a href="../index.php">Home</a></li>
			<li><a href="wynajmij.php">Wynajmij</a></li>
			<li><a href="klienci.php">Klienci</a></li>
			<li><a href="samochody.php">Samochody</a></li>
			<li><a href="uzytkownicy.php">Użytkownicy</a></li>
		</ul>
	</nav>	
	
	<h2>Logowanie do serwisu</h2>
	<div class="left" style="margin-left:150px;padding:30px 10px 0px 10px;">
		<form action="logowanie.php" method="post"> 
		<input type="text" name="login_NEP" placeholder="podaj login" /> 
		<br/> 
		<input type="password" name="haslo" placeholder="podaj hasło" /> 
		<br/>
		<input type="submit" name="submit" value="Zaloguj" />
		<?php
		require '../skrypty/loguj_u_s.php';
		require '../baza.php';
		?>
		</form>
	</div>
	</div>
</body>
</html>
