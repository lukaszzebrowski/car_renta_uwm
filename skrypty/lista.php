<?php
if (isset($_POST['wyswietl'])) {
	require '../baza.php';
	$sql = 'SELECT imie_klienta, nazwisko_klienta, PESEL 
	FROM klienci
	ORDER BY nazwisko_klienta';
	
	$zapytanie = $pdo->query($sql); //wywołanie zapytanie sql zbudowanego wyżej
	$klienci_wszyscy = $zapytanie->fetchAll(); //przypisanie pobranych danych do zmiennej pacjenci w formie tablicy.
}
?>

<?php
if (isset($_POST['wyswietl_auta'])) {
	require '../baza.php';
	$sql1 = 'SELECT marka, numer_rejestracyjny, rok_produkcji, cena_wynajmu_dzien 
	FROM samochody
	ORDER BY cena_wynajmu_dzien';
	
	$zapytanie1 = $pdo->query($sql1); //wywołanie zapytanie sql zbudowanego wyżej
	$samo_wszystkie = $zapytanie1->fetchAll(); //przypisanie pobranych danych do zmiennej pacjenci w formie tablicy.
}
?>