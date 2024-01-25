<?php
	require '../baza.php';
	if (isset($_POST['wyszukaj'])) {
		//zliczenie ilości klienciów o podanym numerze pesel (sprawdzenie czy klienci o podanym numerze pesel istnieje)
		$sql = 'SELECT Count(nazwisko_klienta)
				FROM klienci
				WHERE nazwisko_klienta = :nazwisko_klienta';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':nazwisko_klienta', $_POST['nazwisko_klienta'], PDO::PARAM_STR);
		$stmt->execute();
		$ilosc_nazwisko = $stmt->fetchColumn();
		//zliczenie ilości klienciów o podanym nazwisku (sprawdzenie czy klienci o podanym nazwisku istnieje)
		$sql1 = 'SELECT Count(PESEL)
				FROM klienci
				WHERE PESEL = :PESEL';
		$stmt1 = $pdo->prepare($sql1);
		$stmt1->bindValue(':PESEL', $_POST['PESEL'], PDO::PARAM_STR);
		$stmt1->execute();
		$ilosc_pesel = $stmt1->fetchColumn();

		$sql2 = 'SELECT Count(imie_klienta)
		FROM klienci
		WHERE imie_klienta = :imie_klienta';
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->bindValue(':imie_klienta', $_POST['imie_klienta'], PDO::PARAM_STR);
		$stmt2->execute();
		$ilosc_imie = $stmt2->fetchColumn();

		if ($ilosc_imie != 0 || $ilosc_nazwisko != 0 || $ilosc_pesel != 0) {
			//jeżeli ilość danego nazwiska i numeru pesel jest różna od 0, wówczas następuje wyszukiwanie danego kliencia
			$sql4 = 'SELECT imie_klienta, nazwisko_klienta, PESEL 
					FROM klienci
					WHERE nazwisko_klienta like :nazwisko_klienta or imie_klienta like :imie_klienta or PESEL = :PESEL
					ORDER BY nazwisko_klienta';
			$stmt4 = $pdo -> prepare($sql4);
			$stmt4->bindValue(':imie_klienta', $_POST['imie_klienta'], PDO::PARAM_STR);
			$stmt4->bindValue(':nazwisko_klienta', $_POST['nazwisko_klienta'], PDO::PARAM_STR);
			$stmt4->bindValue(':PESEL', $_POST['PESEL'], PDO::PARAM_INT);
			$stmt4->execute();
			$klienci = $stmt4->fetchAll();
		}
		else {
			echo 'Brak klienta o podanych danych.';
		}
	}
?>

<?php
	require '../baza.php';
	if (isset($_POST['wyszukaj_auta'])) {
		$sql = 'SELECT Count(marka)
				FROM samochody
				WHERE marka = :marka';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':marka', $_POST['marka'], PDO::PARAM_STR);
		$stmt->execute();
		$ilosc_marka = $stmt->fetchColumn();

		$sql1 = 'SELECT Count(numer_rejestracyjny)
				FROM samochody
				WHERE numer_rejestracyjny = :numer_rejestracyjny';
		$stmt1 = $pdo->prepare($sql1);
		$stmt1->bindValue(':numer_rejestracyjny', $_POST['numer_rejestracyjny'], PDO::PARAM_STR);
		$stmt1->execute();
		$ilosc_numer_rejestracyjny = $stmt1->fetchColumn();

		$sql2 = 'SELECT Count(rok_produkcji)
		FROM samochody
		WHERE rok_produkcji = :rok_produkcji';
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->bindValue(':rok_produkcji', $_POST['rok_produkcji'], PDO::PARAM_INT);
		$stmt2->execute();
		$ilosc_rok_produkcji = $stmt2->fetchColumn();

		$sql3 = 'SELECT Count(cena_wynajmu_dzien)
		FROM samochody
		WHERE cena_wynajmu_dzien = :cena_wynajmu_dzien';
		$stmt3 = $pdo->prepare($sql3);
		$stmt3->bindValue(':cena_wynajmu_dzien', $_POST['cena_wynajmu_dzien'], PDO::PARAM_INT);
		$stmt3->execute();
		$ilosc_cena_wynajmu_dzien = $stmt3->fetchColumn();

		$sql4 = 'SELECT Count(kolor)
		FROM samochody
		WHERE kolor LIKE :kolor';
		$stmt4 = $pdo->prepare($sql4);
		$stmt4->bindValue(':kolor', $_POST['kolor'], PDO::PARAM_STR);
		$stmt4->execute();
		$ilosc_kolor = $stmt4->fetchColumn();

		if ($ilosc_rok_produkcji != 0 || $ilosc_marka != 0 || $ilosc_numer_rejestracyjny != 0 || 
			$ilosc_cena_wynajmu_dzien != 0 || $ilosc_kolor != 0) {
			//jeżeli ilość danego nazwiska i numeru pesel jest różna od 0, wówczas następuje wyszukiwanie danego kliencia
			$sql5 = 'SELECT marka, kolor, numer_rejestracyjny, rok_produkcji, cena_wynajmu_dzien 
					FROM samochody
					WHERE marka LIKE :marka or kolor LIKE :kolor or 
						numer_rejestracyjny LIKE :numer_rejestracyjny or 
						rok_produkcji = :rok_produkcji or 
						cena_wynajmu_dzien = :cena_wynajmu_dzien
					ORDER BY cena_wynajmu_dzien';
			$stmt5 = $pdo -> prepare($sql5);
			$stmt5->bindValue(':marka', $_POST['marka'], PDO::PARAM_STR);
			$stmt5->bindValue(':kolor', $_POST['kolor'], PDO::PARAM_STR);
			$stmt5->bindValue(':numer_rejestracyjny', $_POST['numer_rejestracyjny'], PDO::PARAM_STR);
			$stmt5->bindValue(':rok_produkcji', $_POST['rok_produkcji'], PDO::PARAM_INT);
			$stmt5->bindValue(':cena_wynajmu_dzien', $_POST['cena_wynajmu_dzien'], PDO::PARAM_INT);
			$stmt5->execute();
			$samochody = $stmt5->fetchAll();
		}
		else {
			echo 'Brak samochodów o podanych danych.';
		}
	}
?>