<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Wynajmij</title>
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
	<h2>Wynajmij</h2>
	<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik' || $_SESSION['nazwa_stanowiska'] == 'Pracownik' || $_SESSION['nazwa_stanowiska'] == 'GOD') {
		if(isset($_SESSION['sesja'])) {
			require '../skrypty/wczytywanie.php';
		?>
		<form name="dane" action="wynajmij.php" method="post">
		<div class="left" style="margin-left:150px;padding:30px 10px 0px 10px;">
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
		else {
			echo "Proszę się zalogować";
		}
	}
	else {
		echo "Nie masz uprawnień.";
	}
		?>
</div>
</body>
</html>