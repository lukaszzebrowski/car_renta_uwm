<?php
    require '../baza.php';
	if (isset($_POST['submit']))
	{
		//sprawdzenie unikalności podanego loginu
		$sql = 'SELECT Count(login_NEP)
				FROM users
				WHERE login_NEP = :login_NEP';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':login_NEP', $_POST['login_NEP'], PDO::PARAM_STR);
		$stmt->execute();
		$ilosc = $stmt->fetchColumn();
		
		if ($ilosc==0) 
		{
			//dodanie nowego uzytkownika
			$sql1 = 'INSERT INTO users(imie_uzytkownika, nazwisko_uzytkownika, login_NEP, haslo, stanowisko_ID) 
					VALUES (:imie_uzytkownika, :nazwisko_uzytkownika, :login_NEP, :haslo, :stanowisko_ID)';
		
			//szyfrowanie hasła podanego w formularzu
			$hash = password_hash($_POST['password1'],PASSWORD_DEFAULT);
				
			$stmt1 = $pdo->prepare($sql1);
			$stmt1->bindValue(':imie_uzytkownika', $_POST['imie_uzytkownika'], PDO::PARAM_STR);
			$stmt1->bindValue(':nazwisko_uzytkownika', $_POST['nazwisko_uzytkownika'], PDO::PARAM_STR);
			$stmt1->bindValue(':login_NEP', $_POST['login_NEP'], PDO::PARAM_STR);
			$stmt1->bindValue(':haslo', $hash, PDO::PARAM_STR);
			$stmt1->bindValue(':stanowisko_ID', $_POST['stanowisko_ID'], PDO::PARAM_STR);
			$stmt1->execute();
			echo 'Konto zostało utworzone.Dodano użytkownika: '.$_POST['login_NEP'];
		}
		else
		{
			echo 'Podany login '.'<b>'.$_POST['login_NEP'].'</b>'.' jest już zajęty. Podaj inną nazwę';
		}
	 }
	
	
	
?>