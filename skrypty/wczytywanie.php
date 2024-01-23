<?php
	require '../baza.php';

//pobranie listy lekarzy
	$sql = 'SELECT ID_stanowiska, nazwa_stanowiska
			FROM stanowiska';
	$zapytanie = $pdo->query($sql);
	$stanowiska = $zapytanie->fetchAll();
?>