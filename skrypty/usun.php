<?php
	require '../baza.php';
	//sprawdzenie czy pacjent o podanym numerze pesel istnieje
	if (isset($_POST['usun_auto'])) {
		$sql = 'SELECT Count(numer_rejestracyjny)
				FROM samochody
				WHERE numer_rejestracyjny = :numer_rejestracyjny';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':numer_rejestracyjny', $_POST['numer_rejestracyjny'], PDO::PARAM_STR);
		$stmt->execute();
		$ilosc_numer_rejestracyjny = $stmt->fetchColumn();
		
		if ($ilosc_numer_rejestracyjny != 0) {
			$sql1 = 'DELETE FROM samochody
					WHERE numer_rejestracyjny LIKE :numer_rejestracyjny';
			$stmt1 = $pdo -> prepare($sql1);
			$stmt1->bindValue(':numer_rejestracyjny', $_POST['numer_rejestracyjny'], PDO::PARAM_STR);
			$stmt1->execute();
			$numer_rejestracyjny_del = $_POST['numer_rejestracyjny'];
	
			if ($_POST['numer_rejestracyjny'] != null) {
				
				echo 'Usunięto samochód o numerze rejestracyjnym: '.$numer_rejestracyjny_del;
			}
			else {
				echo '<h4 style="color:red;">Nie podano numeru rejestracyjnego!</h4>';
			}
		}
		else {
			echo 'Podany samochód w bazie nie istnieje.';
		}
	}
?>

<?php
	require '../baza.php';
	//sprawdzenie czy pacjent o podanym numerze pesel istnieje
	if (isset($_POST['usun_klienta'])) {
		$sql2 = 'SELECT Count(PESEL)
				FROM klienci
				WHERE PESEL = :PESEL';
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->bindValue(':PESEL', $_POST['PESEL'], PDO::PARAM_STR);
		$stmt2->execute();
		$ilosc_PESEL = $stmt2->fetchColumn();
		
		if ($ilosc_PESEL != 0) {
			$sql3 = 'DELETE FROM klienci
					WHERE PESEL LIKE :PESEL';
			$stmt3 = $pdo -> prepare($sql3);
			$stmt3->bindValue(':PESEL', $_POST['PESEL'], PDO::PARAM_STR);
			$stmt3->execute();
			$numer_PESEL_del = $_POST['PESEL'];
	
			if ($_POST['PESEL'] != null) {
				
				echo 'Usunięto klienta o numerze PESEL: '.$numer_PESEL_del;
			}
			else {
				echo '<h4 style="color:red;">Nie podano numeru PESEL!</h4>';
			}
		}
		else {
			echo 'Podany klient w bazie nie istnieje.';
		}
	}
?>
