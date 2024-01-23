<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Wyloguj</title>
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
	<h3>
	<?php
		require '../skrypty/wyloguj_u_s.php';
	?>
	<h3>
	</div>
</body>
</html>
