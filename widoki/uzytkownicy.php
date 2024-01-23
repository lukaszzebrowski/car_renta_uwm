<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Klienci</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
	<div class="wrapper">
	<a href="wyloguj.php" class="right">Wyloguj</a>
	<a href="login.php" class="right">Zaloguj</a>

	<h1>Car rental</h1>
	<nav>
		<ul>
			<li><a href="../index.php">Home</a></li>
			<li><a href="wynajmij.php">Wynajmij</a></li>
			<li><a href="klienci.php">Klienci</a></li>
			<li><a href="samochody.php">Samochody</a></li>
			<li><a href="użytkownicy.php">Uzytkownicy</a></li>
		</ul>
	</nav>	
	<h2>Rejestracja nowego użytkownika</h2>
	<?php
		session_start();
		if(isset($_SESSION['sesja'])) {
		?>
		<div class="left" style="margin-left:150px;padding:30px 10px 0px 10px;">
		<form action="rejestruj.php" method="post"> 
			<p><input type="text" name="login" placeholder="podaj login" required /></p>
			<p><input type="password" name="password1" placeholder="podaj hasło" required /></p> 
			<p><input type="email" name="email" placeholder="podaj email" required /></p>
			<p><input type="text" name="uprawnienia" placeholder="uprawnienia" required /></p> 
			<input type="submit" name="submit" value="rejestruj" />
		</form>
		<?php
			require '../skrypty/rejestruj_u_s.php';
		}
		else {
			echo "Proszę się zalogować";
		}
		?>
		</div>
	
	</div>
</body>
</html>
