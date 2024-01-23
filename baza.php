<?php
	error_reporting(0);
	$typ 	= 'mysql';			//typ bazy danych
	$server = 'localhost';			//adres serwera WWW (nazwa serwera WWW)
	$db		= 'szpital';		//nazwa bazy danych
	$port	= '3306';			//numer portu XAMPP=3306
	
	$user	= 'root';			//nazwa konta użytkownika dla bazy szpital
	$pass	= '';		//hasło dla użytkownika root do bazy szpital
	
	//tworzenie zmiennej dsn (data source name) w celu utworzenia nowego źródła danych pochodzącego z bazy szpital
	//PDO to skrót od PHP Data Objects. Jest to interfejs języka PHP przeznaczony do komunikacji z bazami danych różnego typu.
	//https://www.php.net/manual/en/book.pdo.php
	
	$dsn = "$typ:host=$server;dbname=$db;port=$port";
	try {
		$pdo = new PDO($dsn,$user,$pass);
		// echo 'ok'.'<br />';
		
 	  } catch(PDOException $e)
   	  {
     		echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
   	  }
?>