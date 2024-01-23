<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	<div class="wrapper">
	<a href="widoki/wyloguj.php" class="right">Wyloguj</a>
	<a href="widoki/logowanie.php" class="right">Zaloguj</a>

	<h1>Car Rental</h1>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="widoki/wynajmij.php">Wynajmij</a></li>
			<li><a href="widoki/klienci.php">Klienci</a></li>
			<li><a href="widoki/samochody.php">Samochody</a></li>
			<li><a href="widoki/uzytkownicy.php">Użytkownicy</a></li>
		</ul>
	</nav>	
		<h2>Witaj w aplikacji szpital<h2>
		<?php
			session_start();
			if (isset($_SESSION['sesja'])) {
				echo '<h2>Jesteś zalogowany</h2>';
			}
			else {
				header("Location:widoki/logowanie.php");
			}
		?>
		</div>
</body>
</html>