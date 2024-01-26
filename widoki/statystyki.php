<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Klienci</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
<header class="header">
	<a href="#" class="logo">Car rental</a><br>
    <h2>Statystyki</h2>
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

	
	<?php
	if ($_SESSION['nazwa_stanowiska'] == 'Kierownik' || $_SESSION['nazwa_stanowiska'] == 'Pracownik' || $_SESSION['nazwa_stanowiska'] == 'GOD') {
        require '../skrypty/statystyka.php';
        ?>
        <div class="table-conteiner">
        <h3 class="table-header">Ilości i wartości wypożyczonych samochodów po każdym dniu</h3>
        <table class="table1">
        
        <tr>
            <th>Data</th>
            <th>Ilość wypożyczeń</th>
            <th>Suma kosztów</th>
        </tr>
        <?php 
        foreach ($wyniki_dni as $wynik => $link) { 
        ?>
            <tr>
                <td><?= $link['Data_wypozyczenia'] ?></td>
                <td><?= $link['ilosc_wypozyczen'] ?></td>
                <td><?= $link['suma_kosztow'] ?></td>
            </tr>
        <?php
        }
    }
     ?>
     	</table>
         <h3 class="table-header">Ilości i wartości wypożyczonych samochodów po każdym miesiącu</h3>
        <table class="table2">
        <tr>
            <th>Miesiąc</th>
            <th>Ilość wypożyczeń</th>
            <th>Suma kosztów</th>
        </tr>
        <?php 
        foreach ($wyniki_miesiace as $miesiace => $link1) { 
        ?>
            <tr>
                <td><?= $link1['miesiac'] ?></td>
                <td><?= $link1['ilosc_wypozyczen'] ?></td>
                <td><?= $link1['suma_kosztow'] ?></td>
            </tr>
        <?php
        }
     ?>
     	</table>

        <h3 class="table-header">Ilości i wartości wypożyczonych samochodów według koloru po każdym miesiącu</h3>
        <table class="table3">
        <tr>
        <th>Data</th>
        <th>Marka</th>
        <th>Ilość wypożyczeń</th>
        <th>Suma kosztów</th>
        </tr>
        <?php 
        foreach ($wyniki_marki_dni as $marki_dni => $link2) { 
        ?>
        <tr>
            <td><?= $link2['Data_wypozyczenia'] ?></td>
            <td><?= $link2['marka'] ?></td>
            <td><?= $link2['ilosc_wypozyczen'] ?></td>
            <td><?= $link2['suma_kosztow'] ?></td>
        </tr>
        <?php
        }
        ?>
        </table>

        <h3 class="table-header">Ilości i wartości wypożyczonych samochodów według koloru po każdym miesiącu</h3>
        <table class="table4">
        <tr>
        <th>Miesiąc</th>
        <th>Kolor</th>
        <th>Ilość wypożyczeń</th>
        <th>Suma kosztów</th>
        </tr>
        <?php 
        foreach ($wyniki_kolor_miesiace as $kolor_miesiace => $link3) { 
        ?>
        <tr>
            <td><?= $link3['miesiac'] ?></td>
            <td><?= $link3['kolor'] ?></td>
            <td><?= $link3['ilosc_wypozyczen'] ?></td>
            <td><?= $link3['suma_kosztow'] ?></td>
        </tr>
        <?php
        }
        ?>
        </table>

        <h3 class="table-header">Marka samochodu najczęściej wypożyczanego w miesiącu</h3>
        <table class="table5">
            <thead><tr></tr><</thead>
        <tr>
        
        <th>Miesiąc</th>
        <th>Marka</th>
        <th>Ilość wypożyczeń</th>
        </tr>
        <?php 
        foreach ($najczestsza_marka_miesiaca as $marka_miesiaca => $link4) { 
        ?>
        <tr>
            <td><?= $link4['miesiac'] ?></td>
            <td><?= $link4['marka'] ?></td>
            <td><?= $link4['ilosc_wypozyczen'] ?></td>
        </tr>
        <?php
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
   