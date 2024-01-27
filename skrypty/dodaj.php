<?php
	require '../baza.php';
	if (isset($_POST['dodaj_auto'])) {	
		$sql = 'SELECT Count(numer_rejestracyjny)
				FROM samochody
				WHERE numer_rejestracyjny LIKE :numer_rejestracyjny';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':numer_rejestracyjny', $_POST['numer_rejestracyjny'], PDO::PARAM_STR);
		$stmt->execute();
		$ilosc_numer_rejestracyjny = $stmt->fetchColumn();

		if ($ilosc_numer_rejestracyjny == 0) {	
			$sql1 = 'INSERT INTO samochody(marka, kolor, numer_rejestracyjny, rok_produkcji, cena_wynajmu_dzien)
					VALUES (:marka, :kolor, :numer_rejestracyjny, :rok_produkcji, :cena_wynajmu_dzien)';
			$stmt1 = $pdo->prepare($sql1);
			$stmt1->bindValue(':marka', $_POST['marka'], PDO::PARAM_STR);
			$stmt1->bindValue(':kolor', $_POST['kolor'], PDO::PARAM_STR);
			$stmt1->bindValue(':numer_rejestracyjny', $_POST['numer_rejestracyjny'], PDO::PARAM_STR);
			$stmt1->bindValue(':rok_produkcji', $_POST['rok_produkcji'], PDO::PARAM_INT);
			$stmt1->bindValue(':cena_wynajmu_dzien', $_POST['cena_wynajmu_dzien'], PDO::PARAM_INT);
			$stmt1->execute();
			$dodany = $stmt1->fetch();
			//pobranie numeru ostatniego pacjenta w bazie (czyli tego, który został dodany)
			$nowy = $pdo->lastInsertId();
			// budowa zapytania w celu pobrania danych nowo dodanego pacjenta
			$sql2 = 'SELECT marka, kolor, numer_rejestracyjny, rok_produkcji, cena_wynajmu_dzien
					FROM samochody
					WHERE ID_samochodu LIKE :ID_samochodu';
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->bindValue(':ID_samochodu', $nowy, PDO::PARAM_INT);
			$stmt2->execute();
			$ostatni = $stmt2->fetch();
			if ($nowy>1) {
				echo '<h3 class="success-message">Dodano samochod: '.$ostatni['marka'].' '.$ostatni['kolor'].' '.$ostatni['numer_rejestracyjny'].'</h3>';
			}
		}
		else {
			echo '<h3 class="error-message">Samochód u numerze rejestracyjnym: '.$_POST['numer_rejestracyjny'].' już istnieje</h3>';
		}
	}
?>

<?php
	require '../baza.php';
	if (isset($_POST['dodaj_klienta'])) {	
		$sql3 = 'SELECT Count(PESEL)
				FROM klienci
				WHERE PESEL = :PESEL';
		$stmt3 = $pdo->prepare($sql3);
		$stmt3->bindValue(':PESEL', $_POST['PESEL'], PDO::PARAM_STR);
		$stmt3->execute();
		$ilosc_PESEL = $stmt3->fetchColumn();

		if ($ilosc_PESEL == 0) {	
			$sql4 = 'INSERT INTO klienci (imie_klienta, nazwisko_klienta, PESEL)
					VALUES (:imie_klienta, :nazwisko_klienta, :PESEL)';
			$stmt4 = $pdo->prepare($sql4);
			$stmt4->bindValue(':imie_klienta', $_POST['imie_klienta'], PDO::PARAM_STR);
			$stmt4->bindValue(':nazwisko_klienta', $_POST['nazwisko_klienta'], PDO::PARAM_STR);
			$stmt4->bindValue(':PESEL', $_POST['PESEL'], PDO::PARAM_STR);
			$stmt4->execute();
			$dodany4 = $stmt4->fetch();
			//pobranie numeru ostatniego pacjenta w bazie (czyli tego, który został dodany)
			$nowy4 = $pdo->lastInsertId();
			// budowa zapytania w celu pobrania danych nowo dodanego pacjenta
			$sql5 = 'SELECT imie_klienta ,nazwisko_klienta ,PESEL
					FROM klienci
					WHERE ID_klienta LIKE :ID_klienta';
			$stmt5 = $pdo->prepare($sql5);
			$stmt5->bindValue(':ID_klienta', $nowy4, PDO::PARAM_INT);
			$stmt5->execute();
			$ostatni5 = $stmt5->fetch();
			if ($nowy4>1) {
				echo '<h3 class="success-message">Dodano klineta:<br> Imię: '.$ostatni5['imie_klienta'].'<br>Nazwisko: '.$ostatni5['nazwisko_klienta'].'<br>Pesel: '.$ostatni5['PESEL'].'</h3>';
			}
		}
		else {
			echo '<h3 class="error-message">Klient o numerze PESEL: '.$_POST['PESEL'].' już istnieje</h3>';
		}
	}
?>

<?php
require '../baza.php';

if (isset($_POST['wynajmij'])) {

	$sql_cena = 'SELECT cena_wynajmu_dzien 
				 FROM samochody 
				 WHERE ID_samochodu = :samochody';
    $stmt_cena = $pdo->prepare($sql_cena);
    $stmt_cena->bindValue(':samochody', $_POST['samochody'], PDO::PARAM_INT);
    $stmt_cena->execute();
    $cena_wynajmu_dzien = $stmt_cena->fetchColumn();

	$data_wypozyczenia = new DateTime($_POST['data_wypozyczenia']);
    $data_zwrotu = new DateTime($_POST['data_zwrotu']);
    $roznica_dni = $data_zwrotu->diff($data_wypozyczenia)->days;
    $koszt = $roznica_dni * $cena_wynajmu_dzien;

	$sql6 = 'INSERT INTO wypozyczenia (Klienci_ID, Samochody_ID, Data_wypozyczenia, Planowany_zwrot, koszt)
			VALUES (:klient,:samochody,:data_wypozyczenia,:data_zwrotu, :koszt)';

	$stmt6 = $pdo->prepare($sql6);
	$stmt6->bindValue(':klient', $_POST['klient'], PDO::PARAM_INT);
	$stmt6->bindValue(':samochody', $_POST['samochody'], PDO::PARAM_INT);
	$stmt6->bindValue(':data_wypozyczenia', $_POST['data_wypozyczenia'], PDO::PARAM_STR);
	$stmt6->bindValue(':data_zwrotu', $_POST['data_zwrotu'], PDO::PARAM_STR);
	$stmt6->bindValue(':koszt', $koszt, PDO::PARAM_INT);
	$stmt6->execute();
	$dodany6 = $stmt6->fetch();

	$nowy6 = $pdo->lastInsertId();
	$sql7 = 'SELECT wypozyczenia.ID_wypozyczenia, klienci.ID_klienta, klienci.imie_klienta, klienci.nazwisko_klienta, samochody.ID_samochodu,
	 				samochody.marka, wypozyczenia.Data_wypozyczenia, wypozyczenia.Planowany_zwrot, wypozyczenia.koszt
        FROM wypozyczenia
        INNER JOIN klienci ON wypozyczenia.Klienci_ID = klienci.ID_klienta
        INNER JOIN samochody ON wypozyczenia.Samochody_ID = samochody.ID_samochodu
		WHERE wypozyczenia.ID_wypozyczenia = :ID_wypozyczenia';

		$stmt7 = $pdo->prepare($sql7);
		$stmt7->bindValue(':ID_wypozyczenia', $nowy6, PDO::PARAM_INT);
		$stmt7->execute();
		$ostatni7 = $stmt7->fetch(PDO::FETCH_ASSOC);
	//pobranie numeru ostatniego pacjenta w bazie (czyli tego, który został dodany)
	if ($nowy6>0) {
		echo '<h3 class="success-message">Wypożyczono: '.$ostatni7['marka'].' dla '.$ostatni7['imie_klienta'].' '.$ostatni7['nazwisko_klienta'].'. Koszt wypożyczenia: '.$ostatni7['koszt'].'zł</h3>';
	}
}

?>