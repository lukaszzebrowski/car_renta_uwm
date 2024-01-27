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
	<h2>Moje konto</h2>
	<nav class="navibar">
			<a href="../index.php">Home</a>
			<?php
			session_start();
			if ($_SESSION['nazwa_stanowiska'] !== 'Administrator') {
				?>
			<a href="wynajmij.php">Wynajmij</a>
			<a href="klienci.php">Klienci</a>
			<a href="samochody.php">Samochody</a>
			<?php
            if ($_SESSION['nazwa_stanowiska'] == 'Kierownik') {
				?>
			<a href="statystyki.php">Statystyki</a>
			<?php
            }
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
			<a href="konto.php">Zalogowany jako: <?=$_SESSION['login_NEP'];?></b></a>
			<?php
			}
			else {
			header("Location:logowanie.php");
			}
			?>
			
			<a href="wyloguj.php">Wyloguj</a>
	</nav>	
	</header>	
	
	<table>
		<?php
		if (isset($_SESSION['sesja'])) {

		?>
		<dl>
  			<dt>Imię użytkownika:</dt>
  			<dd><span class="user"><?=$_SESSION['imie_uzytkownika'];?></span></b></dd>
  			<dt>Nazwisko użytkownia:</dt>
  			<dd><span class="user"><?=$_SESSION['nazwisko_uzytkownika'];?></span></b></dd>
			<dt>Login (NEP) użytkownika:</dt>
  			<dd><span class="user"><?=$_SESSION['login_NEP'];?></b></span></dd>
			<dt>Stanowisko:</dt>
  			<dd><span class="user"><?=$_SESSION['nazwa_stanowiska'];?></b></span></dd>
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