<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Użytkownicy</title>
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
	<h2>Rejestracja nowego użytkownika</h2>
	<?php
		require '../skrypty/wczytywanie.php';
		if ($_SESSION['nazwa_stanowiska'] == 'Administrator' || $_SESSION['nazwa_stanowiska'] == 'GOD') {
			?>
		<div class="left" style="margin-left:150px;padding:30px 10px 0px 10px;">
		<form action="uzytkownicy.php" method="post">
			<p><input type="text" name="imie_uzytkownika" placeholder="podaj imie" required /></p>
			<p><input type="text" name="nazwisko_uzytkownika" placeholder="podaj nazwisko" required /></p>
			<p><input type="text" name="login_NEP" placeholder="podaj login" required /></p>
			<p><input type="password" name="password1" placeholder="podaj hasło" required /></p> 
			<p>
			<select name="stanowisko_ID">
			<option value="" disabled selected hidden>wybierz stanowisko</option>
			<?php
			foreach ($stanowiska as $stanowisko => $link) {
				$stanowisko = $stanowisko + 1;
				?>
			  <option value=<?=$stanowisko ?> ><?=$stanowisko ?>-<?=$link['nazwa_stanowiska'] ?> </option>
			<?php
			}
			?>
			</select>

			<input type="submit" name="submit" value="rejestruj" />
		</form>
		<?php
			require '../skrypty/rejestruj.php';
		}
		else {
			echo "Nie masz uprawnień.";
		}
		?>
		</div>
	
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
