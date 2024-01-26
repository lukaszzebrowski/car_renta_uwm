<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Użytkownicy</title>
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
	<h2>Rejestracja nowego użytkownika</h2>
	<?php
		require '../skrypty/wczytywanie.php';
		if ($_SESSION['nazwa_stanowiska'] == 'Administrator' || $_SESSION['nazwa_stanowiska'] == 'GOD') {
			?>
		<div>
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
            &copy; <?= date('Y') ?> Łukasz Żebrowski
            <a href="#" class="foot">Kontakt</a>
            <a href="#" class="foot">Regulamin</a>
    </footer>
</body>
</html>
