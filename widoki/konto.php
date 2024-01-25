<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Moje konto</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
	<div class="wrapper">
	<a href="wyloguj.php" class="right">Wyloguj</a>
	<?php
		session_start();
		if (isset($_SESSION['sesja'])) {
		?>
	<a href="konto.php" class="right">Zalogowany jako: <b><?=$_SESSION['login_NEP'];?></b></a>
	<?php
		}
		else {
			header("Location:logowanie.php");
		}
		?>
	<h1>Car rental</h1>
	<nav>
	<ul>

			<li><a href="../index.php">Home</a></li>
			<?php
			if ($_SESSION['nazwa_stanowiska'] !== 'Administrator') {
				?>
			<li><a href="wynajmij.php">Wynajmij</a></li>
			<li><a href="klienci.php">Klienci</a></li>
			<li><a href="samochody.php">Samochody</a></li>
			<li><a href="statystyki.php">Statystyki</a></li>
			<?php
			}
			else {
			?>
			<li><a href="uzytkownicy.php">Użytkownicy</a></li>
			<?php
			}
			?>
		</ul>
	</nav>	
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