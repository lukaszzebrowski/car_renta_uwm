<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Samochody</title>
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
	<h2>Samochody</h2>
	<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik' || $_SESSION['nazwa_stanowiska'] == 'Pracownik' || $_SESSION['nazwa_stanowiska'] == 'GOD') {
		?>	
	<form name="dane" action="samochody.php" method="post">
		<input type="text" name="marka" placeholder="podaj marke" style="width:15%;display:inline;text-align:center;" />
		<input type="text" name="kolor" placeholder="podaj kolor" style="width:15%;display:inline;text-align:center;" />
		<input type="text" name="numer_rejestracyjny" placeholder="podaj numer rejestracyjny" style="width:15%;display:inline;text-align:center;"/>
		<input type="number" name="rok_produkcji" placeholder="podaj rok produkcji" style="width:15%;display:inline;text-align:center;"/>
		<input type="number" name="cena_wynajmu_dzien" placeholder="podaj cenę wynajmu za dzień" style="width:15%;display:inline;text-align:center;"/><br>
		<input type="submit" name="wyszukaj_auta" value="Wyszukaj samochód" style="width:19%;display:inline;"/> 
		<input type="submit" name="wyswietl_auta" value="Wyświetl wszystkie" style="width:19%;display:inline;"/>
		<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik' ||  $_SESSION['nazwa_stanowiska'] == 'GOD') {
		?>
		<div>
		<input type="text" name="marka" placeholder="podaj marke" style="width:15%;display:inline;text-align:center;" />
		<input type="text" name="kolor" placeholder="podaj kolor" style="width:15%;display:inline;text-align:center;" />
		<input type="text" name="numer_rejestracyjny" placeholder="podaj numer rejestracyjny" style="width:15%;display:inline;text-align:center;"/>
		<input type="number" name="rok_produkcji" placeholder="podaj rok produkcji" style="width:15%;display:inline;text-align:center;"/>
		<input type="number" name="cena_wynajmu_dzien" placeholder="podaj cenę wynajmu za dzień" style="width:15%;display:inline;text-align:center;"/><br>
		<input type="submit" name="dodaj_auto" value="Dodaj samochód" style="width:19%;display:inline;"/><br>
		</div>
		<div>
		<input type="text" name="numer_rejestracyjny" placeholder="podaj numer rejestracyjny" style="width:15%;display:inline;text-align:center;"/><br>
		<input type="submit" name="usun_auto" value="Usuń samochód" style="width:19%;display:inline;"/><br>
		</div>
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
				<th>Data wypożyczenia</th>		
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
		<td><?= $link['Data_wypożyczenia']?></td>
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
				<th>Data wypożyczenia</th>		
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
		<td><?= $link['Data_wypożyczenia']?></td>
		</tr>
		<?php
		}
	}
	else {
		echo "Nie masz uprawnień.";
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
        </div>
    </footer>
	</body>
</html>