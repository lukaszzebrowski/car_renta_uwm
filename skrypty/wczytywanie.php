<?php
	require '../baza.php';

//pobranie listy lekarzy
	$sql = 'SELECT ID_stanowiska, nazwa_stanowiska
			FROM stanowiska';
	$zapytanie = $pdo->query($sql);
	$stanowiska = $zapytanie->fetchAll();

		//pobranie listy miejscowości
	$sql1 = 'SELECT ID_klienta, imie_klienta, nazwisko_klienta, PESEL
			 FROM klienci';
	$zapytanie = $pdo->query($sql1);
	$klienci = $zapytanie->fetchAll();

//pobranie listy wieku
	$sql2 = 'SELECT ID_samochodu, marka, kolor, numer_rejestracyjny, rok_produkcji, cena_wynajmu_dzien
			 FROM samochody';
	$zapytanie = $pdo->query($sql2);
	$samochody = $zapytanie->fetchAll();
?>