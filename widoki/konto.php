<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Moje konto</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
<header class="header">
	<a href="#" class="logo">Car rental</a>
	<nav class="navibar">
			<a href="../index.php">Home</a>
			<?php
			session_start();
			if ($_SESSION['nazwa_stanowiska'] !== 'Administrator') {
				?>
			<a href="wynajmij.php">Wynajmij</a>
			<a href="klienci.php">Klienci</a>
			<a href="samochody.php">Samochody</a>
			<a href="statystyki.php">Statystyki</a>
			<?php
			}
			else {
			?>
			<a href="uzytkownicy.php">Użytkownicy</a>
			<?php
			}
			?>
			<?php
			if (isset($_SESSION['sesja'])) {
			?>
			<a href="konto.php">Zalogowany jako: <b><?=$_SESSION['login_NEP'];?></b></a>
			<?php
			}
			else {
			header("Location:logowanie.php");
			}
			?>
			
			<a href="wyloguj.php">Wyloguj</a>
	</nav>	
	</header>	
	<h2>Moje konto</h2>
	<table>
		<?php
		if (isset($_SESSION['sesja'])) {

		?>
		<dl>
  			<dt>Imię użytkownika:</dt>
  			<dd><b><?=$_SESSION['imie_uzytkownika'];?></b></dd>
  			<dt>Nazwisko użytkownia:</dt>
  			<dd><b><?=$_SESSION['nazwisko_uzytkownika'];?></b></dd>
			<dt>Login (NEP) użytkownika:</dt>
  			<dd><b><?=$_SESSION['login_NEP'];?></b></dd>
			<dt>Stanowisko:</dt>
  			<dd><b><?=$_SESSION['nazwa_stanowiska'];?></b></dd>
		</dl>
		<?php	
	}
		?>
		
	</table>
	</div>
	<footer>
            &copy; <?= date('Y') ?> Łukasz Żebrowski
            <a href="#" class="foot">Kontakt</a>
            <a href="#" class="foot">Regulamin</a>
    </footer>
	</body>
</html>