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
			<li><a href="wynajmij.php">Wynajmij</a></li>
			<li><a href="klienci.php">Klienci</a></li>
			<li><a href="samochody.php">Samochody</a></li>
			<li><a href="uzytkownicy.php">Użytkownicy</a></li>
		</ul>
	</nav>	
	<h2>Lista samochodów</h2>
	<table>
		<tr>
			<th>Imię pacjenta</th><th>Nazwisko pacjenta</th><th>Numer PESEL</th>
			<th>Imię lekarza</th><th>Nazwisko lekarza</th><th>Oddział</th><th>Historia choroby</th>
		</tr>
		<?php
		if (isset($_SESSION['sesja'])) {
		require ('../skrypty/lista_p_s.php');
		foreach ($pacjenci as $pacjent => $link) {
		?>
		<tr>
			<td><?= $link['imie'] ?></td><td><?= $link['nazwisko'] ?></td><td><?= $link['numer_pesel'] ?></td>
			<td><?= $link['imie_l'] ?></td><td><?= $link['nazwisko_l'] ?></td>
			<td><?= $link['oddzial'] ?></td><td><?= $link['historia_choroby'] ?></td>
		</tr>
		<?php
		}
	}
	else {
echo 'Proszę się zalogować';
	}
		?>
		
	</table>
	</div>
	</body>
</html>