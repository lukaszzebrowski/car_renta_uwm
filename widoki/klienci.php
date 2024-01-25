<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Klienci</title>
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