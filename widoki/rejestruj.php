<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Szpital powiatowy w Zakolu Dolnym</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
	<div class="wrapper">
	<a href="rejestruj.php" class="right">Rejestracja</a>
	<a href="wyloguj.php" class="right">Wyloguj</a>
	<a href="login.php" class="right">Zaloguj</a>

	<h1>SZPITAL POWIATOWY W ZAKOLU DOLNYM</h1>
	<nav>
		<ul>
			<li><a href="../index.php">Home</a></li>
			<li><a href="lista_p.php">Lista pacjentów</a></li>
			<li><a href="wyszukaj_p.php">Wyszukaj pacjenta</a></li>
			<li><a href="dodaj_p.php">Dodaj pacjenta</a></li>
			<li><a href="edytuj_p.php">Edytuj dane</a></li>
			<li><a href="usun_p.php">Wyrejestruj pacjenta</a></li>
		</ul>
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
