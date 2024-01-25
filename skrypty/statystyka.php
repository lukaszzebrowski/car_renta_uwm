<?php
require '../baza.php';

// Zliczanie ilości i wartości wypożyczonych samochodów po każdym dniu:
$sql0 = 'SELECT Data_wypozyczenia, COUNT(*) AS ilosc_wypozyczen, SUM(koszt) AS suma_kosztow
        FROM wypozyczenia
        GROUP BY Data_wypozyczenia;';
$zapytanie0 = $pdo->query($sql0);
$wyniki_dni = $zapytanie0->fetchAll();

// Zliczanie ilości i wartości wypożyczonych samochodów po każdym miesiącu:
$sql1 = 'SELECT DATE_FORMAT(Data_wypozyczenia, "%Y-%m") AS miesiac, COUNT(*) AS ilosc_wypozyczen, SUM(koszt) AS suma_kosztow
        FROM wypozyczenia
        GROUP BY miesiac;';
$zapytanie1 = $pdo->query($sql1);
$wyniki_miesiace = $zapytanie1->fetchAll();

// Zliczanie ilości i wartości wypożyczonych samochodów według marki po każdym dniu:
$sql2 = 'SELECT Data_wypozyczenia, marka, COUNT(*) AS ilosc_wypozyczen, SUM(koszt) AS suma_kosztow
        FROM wypozyczenia
        INNER JOIN samochody ON wypozyczenia.Samochody_ID = samochody.ID_samochodu
        GROUP BY Data_wypozyczenia, marka;';
$zapytanie2 = $pdo->query($sql2);
$wyniki_marki_dni = $zapytanie2->fetchAll();

// Zliczanie ilości i wartości wypożyczonych samochodów według koloru po każdym miesiącu:
$sql3 = 'SELECT DATE_FORMAT(Data_wypozyczenia, "%Y-%m") AS miesiac, kolor, COUNT(*) AS ilosc_wypozyczen, SUM(koszt) AS suma_kosztow
        FROM wypozyczenia
        INNER JOIN samochody ON wypozyczenia.Samochody_ID = samochody.ID_samochodu
        GROUP BY miesiac, kolor;';
$zapytanie = $pdo->query($sql3);
$wyniki_kolor_miesiace = $zapytanie->fetchAll();

// Marka samochodu najczęściej wypożyczanego w miesiącu:
$sql4 = 'SELECT DATE_FORMAT(Data_wypozyczenia, "%Y-%m") AS miesiac, marka, COUNT(*) AS ilosc_wypozyczen
        FROM wypozyczenia
        INNER JOIN samochody ON wypozyczenia.Samochody_ID = samochody.ID_samochodu
        GROUP BY miesiac
        ORDER BY ilosc_wypozyczen DESC;';
$zapytanie = $pdo->query($sql4);
$najczestsza_marka_miesiaca = $zapytanie->fetchAll();
?>
