<?php
	require '../baza.php';
	if (isset($_POST['submit'])) {
		//zapytanie SQL o dane użytkownika
		$sql = 'SELECT login_NEP, haslo, imie_uzytkownika, nazwisko_uzytkownika, stanowiska.nazwa_stanowiska
				FROM users
				INNER JOIN stanowiska ON users.stanowisko_ID = stanowiska.ID_stanowiska
				WHERE login_NEP = :login_NEP';
		$haslo = $_POST['haslo'];
		$login = $_POST['login_NEP'];
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':login_NEP', $login, PDO::PARAM_STR);
		//$stmt->bindValue(':haslo', $haslo, PDO::PARAM_STR);
		//wykonanie zapytania SQL
		$stmt->execute();
		$user = $stmt->fetch();
		
		//sprawdzenie czy wpisany login istnieje w bazie danych
		if ($user) {
			//jeżeli istnieje to sprawdzamy zgodność haseł.
			$autoryzacja = password_verify($haslo, $user['haslo']);
			if ($autoryzacja) {
				session_start();
				$_SESSION['sesja'] = true;
				$_SESSION['nazwa_stanowiska'] = $user['nazwa_stanowiska'];
				$_SESSION['login_NEP'] = $user['login_NEP'];
				$_SESSION['imie_uzytkownika'] = $user['imie_uzytkownika'];
				$_SESSION['nazwisko_uzytkownika'] = $user['nazwisko_uzytkownika'];
				header("Location:../index.php");
			}
			else {
				echo "Błędne login lub hasło.";
			}
		} 
		else {
			echo "Błędne login lub hasło.";
		}
						
	}
?>