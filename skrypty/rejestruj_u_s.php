<?php
    require '../baza.php';
	if (isset($_POST['submit']))
	{
		//sprawdzenie unikalności podanego loginu
		$sql = 'SELECT Count(login)
				FROM users
				WHERE login = :login';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
		$stmt->execute();
		$ilosc = $stmt->fetchColumn();
		
		if ($ilosc==0) 
		{
			//dodanie nowego uzytkownika
			$sql1 = 'INSERT INTO users(login,haslo,email, uprawnienia) 
					VALUES (:login,:haslo,:email, :uprawnienia)';
		
			//szyfrowanie hasła podanego w formularzu
			$hash = password_hash($_POST['password1'],PASSWORD_DEFAULT);
				
			$stmt1 = $pdo->prepare($sql1);
			$stmt1->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
			$stmt1->bindValue(':haslo', $hash, PDO::PARAM_STR);
			$stmt1->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
			$stmt1->bindValue(':uprawnienia', $_POST['uprawnienia'], PDO::PARAM_STR);
			$stmt1->execute();
			echo 'Konto zostało utworzone.Dodano użytkownika: '.$_POST['login'];
		}
		else
		{
			echo 'Podany login '.'<b>'.$_POST['login'].'</b>'.' jest już zajęty. Podaj inną nazwę';
		}
	 }
	
	
	
?>