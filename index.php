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
	<?php
		session_start();
		if (isset($_SESSION['sesja'])) {
		?>
	<a href="widoki/konto.php" class="right">Zalogowany jako: <b><?=$_SESSION['login_NEP'];?></b></a>
	<?php
		}
		?>
	<h1>Car Rental</h1>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<?php
			if ($_SESSION['nazwa_stanowiska'] !== 'Administrator') {
				?>
			<li><a href="widoki/wynajmij.php">Wynajmij</a></li>
			<li><a href="widoki/klienci.php">Klienci</a></li>
			<li><a href="widoki/samochody.php">Samochody</a></li>
			<?php
			}
			else {
			?>
			<li><a href="widoki/uzytkownicy.php">Użytkownicy</a></li>
			<?php
			}
			?>
		</ul>
	</nav>	
		<h2>Witaj w aplikacji<h2>
		<?php
			if (isset($_SESSION['sesja'])) {
				?>
				<h2>Witaj <b><?=$_SESSION['imie_uzytkownika'];?> <?=$_SESSION['nazwisko_uzytkownika'];?></b></h2>
				<?php
			}
			else {
				header("Location:widoki/logowanie.php");
			}
		?>
		</div>
</body>
</html>