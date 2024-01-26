<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Klienci</title>
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
	
	<h2>Klienci</h2>
	<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik' || $_SESSION['nazwa_stanowiska'] == 'Pracownik' || $_SESSION['nazwa_stanowiska'] == 'GOD') {
		?>	
	<div>
	<form name="dane" action="klienci.php" method="post">
		<input type="text" name="imie_klienta" placeholder="podaj imie" style="width:25%;display:inline;text-align:center;"/>
		<input type="text" name="nazwisko_klienta" placeholder="podaj nazwisko" style="width:25%;display:inline;text-align:center;"/>
		<input type="number" name="PESEL" placeholder="podaj numer pesel" style="width:25%;display:inline;text-align:center;" /><br>
		<input type="submit" name="wyszukaj" value="Wyszukaj klienta" style="width:20%;display:inline;"/> 
		<input type="submit" name="wyswietl" value="Wyświetl wszystkich" style="width:20%;display:inline;"/>		
		
	</div>
	<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik' ||  $_SESSION['nazwa_stanowiska'] == 'GOD') {
		?>
	<div>
		<input type="text" name="imie_klienta" placeholder="podaj imie" style="width:25%;display:inline;text-align:center;"/>
		<input type="text" name="nazwisko_klienta" placeholder="podaj nazwisko" style="width:25%;display:inline;text-align:center;"/>
		<input type="number" name="PESEL" placeholder="podaj numer pesel" style="width:25%;display:inline;text-align:center;" /><br>
		<input type="submit" name="dodaj_klienta" value="Dodaj klienta" style="width:20%;display:inline;"/>
	</div>
	<div>
		<input type="number" name="PESEL" placeholder="podaj numer pesel" style="width:25%;display:inline;text-align:center;" /><br>
		<input type="submit" name="usun_klienta" value="Usuń klienta" style="width:20%;display:inline;"/><br>
	</div>
		<?php
			require ('../skrypty/usun.php');
			require ('../skrypty/dodaj.php');
	}	
		?>
	</form>
	<?php
		require ('../skrypty/wyszukaj.php');
		if (isset($_POST['wyszukaj'])) {
			if (!empty($klienci)) {
			?>
			<table>
			<tr>
				<th>Imię klienta</th><th>Nazwisko nazwisko</th><th>PESEL</th>		
			</tr>
	<?php
	}
}
		?>
		<?php
		
		foreach ($klienci as $klient => $link) {
		?>

		<tr>
			<td><?= $link['imie_klienta'] ?></td>
			<td><?= $link['nazwisko_klienta'] ?></td>
			<td><?= $link['PESEL'] ?></td>

		</tr>
		<?php
		}
		?>
		
	</table>

	<?php
		require ('../skrypty/lista.php');
		if (isset($_POST['wyswietl'])) {
			?>
			<table>
			<tr>
				<th>Imię klienta</th><th>Nazwisko nazwisko</th><th>PESEL</th>		
			</tr>
	<?php
	}
		?>
		<?php
		
		foreach ($klienci_wszyscy as $klient_wszyscy => $link2) {
		?>

		<tr>
			<td><?= $link2['imie_klienta'] ?></td><td><?= $link2['nazwisko_klienta'] ?></td><td><?= $link2['PESEL'] ?></td>

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
            &copy; <?= date('Y') ?> Łukasz Żebrowski
            <a href="#" class="foot">Kontakt</a>
            <a href="#" class="foot">Regulamin</a>
    </footer>
	</body>
</html>