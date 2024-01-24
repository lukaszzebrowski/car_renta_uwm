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
			$sql3 = 'SELECT imie_klienta, nazwisko_klienta, PESEL 
					FROM klienci
					WHERE nazwisko_klienta like :nazwisko_klienta or imie_klienta like :imie_klienta or PESEL = :PESEL
					ORDER BY nazwisko_klienta';
			$stmt3 = $pdo -> prepare($sql3);
			$stmt3->bindValue(':imie_klienta', $_POST['imie_klienta'], PDO::PARAM_STR);
			$stmt3->bindValue(':nazwisko_klienta', $_POST['nazwisko_klienta'], PDO::PARAM_STR);
			$stmt3->bindValue(':PESEL', $_POST['PESEL'], PDO::PARAM_INT);
			$stmt3->execute();
			$klienci = $stmt3->fetchAll();
		}
		else {
			echo 'Podany klienci w bazie nie istnieje.';
		}
	}
?>