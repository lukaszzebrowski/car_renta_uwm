<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Wynajmij</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
<header class="header">
	<a href="#" class="logo">Car rental</a>
	<h2>Wynajmij</h2>
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
	
	<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik' || $_SESSION['nazwa_stanowiska'] == 'Pracownik') {
		if(isset($_SESSION['sesja'])) {
			require '../skrypty/wczytywanie.php';
		?>
		<form name="dane" action="wynajmij.php" method="post" class="form special-form">
		<div class="form-conteiner">
		<select name="klient">
			<option value="" disabled selected hidden>wybierz klienta</option>
			<?php
			foreach ($klienci as $klient => $link) {
				$klient = $klient+1;
				?>
			  <option value=<?=$klient ?> ><?=$klient ?>-<?=$link['imie_klienta'] ?> <?=$link['nazwisko_klienta'] ?> <?=$link['PESEL'] ?></option>
			<?php
			}
			?>
			</select>

			<select name="samochody">
			<option value="" disabled selected hidden>wybierz samochód</option>
			<?php
			foreach ($samochody as $samochod => $link) {
				$samochod = $samochod+1;
				?>
			  <option value=<?=$samochod ?> ><?=$samochod ?>-<?=$link['marka'] ?> | <?=$link['kolor'] ?> | 
			  <?=$link['numer_rejestracyjny'] ?> | <?=$link['rok_produkcji'] ?> | <?=$link['cena_wynajmu_dzien'] ?></option>
			<?php
			}
			?>
			</select>

			<p>
			<label for="data">Wybierz datę wypożyczenia:</label>
    		<input type="date" id="data_wypozyczenia" name="data_wypozyczenia" required>
			<p>
			<label for="data">Wybierz datę zwrotu:</label>
    		<input type="date" id="data_zwrotu" name="data_zwrotu" required>
			<p>
			
			<input type="submit" name="wynajmij" value="Wynajmij" />
			<input type="reset" name="reset" value="Reset" />
			</div>
			<?php
			require '../skrypty/dodaj.php';
			?>
		</form>

		<?php
	}
	}
	else {
		echo '<h3 class="error-message">Nie masz uprawnień.</h3>';
	}
		?>
</div>
<footer>
            &copy; <?= date('Y') ?> Łukasz Żebrowski
            <a href="#" class="foot">Kontakt</a>
            <a href="#" class="foot">Regulamin</a>
    </footer>
</body>
</html>