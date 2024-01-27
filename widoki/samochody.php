<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Samochody</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
<header class="header">
	<a href="#" class="logo">Car rental</a>
	<h2>Samochody</h2>
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
		?>	
	<div class="form-conteiner">
	<form name="dane" action="samochody.php" method="post" class="form special-form">
		<input type="text" name="marka" placeholder="marka" />
		<input type="text" name="kolor" placeholder="kolor" />
		<input type="text" name="numer_rejestracyjny" placeholder="numer rejestracyjny"/>
		<input type="number" name="rok_produkcji" placeholder="rok produkcji"/>
		<input type="number" name="cena_wynajmu_dzien" placeholder="cena najmu za dzień"/><br>
		<input type="submit" name="wyszukaj_auta" value="Wyszukaj samochód"/> 
		<input type="submit" name="wyswietl_auta" value="Wyświetl wszystkie"/>
		</form>
		<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik') {
		?>
		<form name="dane" action="samochody.php" method="post" class="form special-form">
		<input type="text" name="marka" placeholder="marka" " />
		<input type="text" name="kolor" placeholder="kolor" " />
		<input type="text" name="numer_rejestracyjny" placeholder="numer rejestracyjny"/>
		<input type="number" name="rok_produkcji" placeholder="rok produkcji"/>
		<input type="number" name="cena_wynajmu_dzien" placeholder="cena najmu za dzień"/><br>
		<input type="submit" name="dodaj_auto" value="Dodaj samochód"/><br>
		</form>
		<form name="dane" action="samochody.php" method="post" class="form special-form">
		<input type="text" name="numer_rejestracyjny" placeholder="numer rejestracyjny"/><br>
		<input type="submit" name="usun_auto" value="Usuń samochód"/><br>
		</form>
		<?php
			require ('../skrypty/usun.php');
			require ('../skrypty/dodaj.php');
	}	
		?>

	</form>
	<?php
		require ('../skrypty/wyszukaj.php');
		if (isset($_POST['wyszukaj_auta'])) {
			if (!empty($samochody)) {
			?>
			<table>
			<tr>
				<th>Marka</th>
				<th>Kolor</th>
				<th>Numer rejestracyjny</th>
				<th>Rok produkcji</th>
				<th>Cena wynajmu za dzień</th>			
			</tr>
	<?php
	}
}
		?>
		<?php
		
		foreach ($samochody as $samochod => $link) {
		?>

		<tr>
		<td><?= $link['marka'] ?></td>
		<td><?= $link['kolor'] ?></td>
		<td><?= $link['numer_rejestracyjny'] ?></td>
		<td><?= $link['rok_produkcji']?></td>
		<td><?= $link['cena_wynajmu_dzien']?></td>
		</tr>
		<?php
		}
		?>
		
	</table>

	<?php
		require ('../skrypty/lista.php');
		if (isset($_POST['wyswietl_auta'])) {
			?>
			<table>
			<tr>
				<th>Marka</th>
				<th>Kolor</th>
				<th>Numer rejestracyjny</th>
				<th>Rok produkcji</th>
				<th>Cena wynajmu za dzień</th>		
			</tr>
	<?php
	}
		?>
		<?php		
		foreach ($samo_wszystkie as $sam_wszystkie => $link2) {
		?>

<tr>
		<td><?= $link2['marka'] ?></td>
		<td><?= $link2['kolor'] ?></td>
		<td><?= $link2['numer_rejestracyjny'] ?></td>
		<td><?= $link2['rok_produkcji']?></td>
		<td><?= $link2['cena_wynajmu_dzien']?></td>
		</tr>
		<?php
		}
	}
	else {
		echo '<h3 class="error-message">Nie masz uprawnień.</h3>';
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