<?php
$dzisiejsza_data_i_godzina = date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
<header class="header">
	<a href="#" class="logo">Car rental</a>
	<h2>Home<h2>
	<nav class="navibar">
			<a href="index.php">Home</a>
			<?php
			session_start();
			if ($_SESSION['nazwa_stanowiska'] !== 'Administrator') {
				?>
			<a href="widoki/wynajmij.php">Wynajmij</a>
			<a href="widoki/klienci.php">Klienci</a>
			<a href="widoki/samochody.php">Samochody</a>
			<?php
            if ($_SESSION['nazwa_stanowiska'] == 'Kierownik') {
				?>
			<a href="widoki/statystyki.php">Statystyki</a>
			<?php
            }
			}
			else {
			?>
			<a href="widoki/uzytkownicy.php">Użytkownicy</a>
			<?php
			}
			?>
			<?php
			if (isset($_SESSION['sesja'])) {
			?>
			<a href="widoki/konto.php">Zalogowany jako: <b><?=$_SESSION['login_NEP'];?></b></a>
			<?php
			}
			else {
			header("Location:logowanie.php");
			}
			?>
			
			<a href="widoki/wyloguj.php">Wyloguj</a>
	</nav>	
	</header>	
			
		<?php
			if (isset($_SESSION['sesja'])) { 
				?>
				<div class="welcome">
    			<h2 class="welcome-container">Witaj <span class="name"><?= $_SESSION['imie_uzytkownika'];?></span> <span class="surname"><?=$_SESSION['nazwisko_uzytkownika'];?></span></h2>
    			<p>Dzisiaj jest <?php echo date("d-m-Y"); ?>, zalogowałeś się o <?php echo date("H:i", strtotime($_SESSION['login_time'])); ?>.</p>
  				</div>
				<?php
			}
			else {
				header("Location:widoki/logowanie.php");
			}
		?>
		
		<footer>
            &copy; <?= date('Y') ?> Łukasz Żebrowski
            <a href="#" class="foot">Kontakt</a>
            <a href="#" class="foot">Regulamin</a>
    </footer>
</body>
</html>