<?php
	require '../baza.php';
	if (isset($_POST['submit'])) {
		//zapytanie SQL o dane użytkownika
		$sql = 'SELECT login_NEP, haslo, stanowiska.nazwa_stanowiska
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
				echo "Jesteś zalogowany jako: "."<b>".$user['login_NEP']."</b>";
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