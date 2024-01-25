<!DOCTYPE html>
<html lang="pl">
<head>	
<meta charset="utf-8">
<title>Wyloguj</title>
<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
	<div class="wrapper">
	<h1>Car rental</h1>
	<h3>
	<?php
		require '../skrypty/wyloguj_u_s.php';
	?>
	<h2><a href="logowanie.php" class="right">Zaloguj ponownie</a></h2>
	<h3>
	</div>
	<footer>
        <div>
            &copy; <?= date('Y') ?> Łukasz Żebrowski
        </div>
        <div>
            <a href="#">Kontakt</a>
            <a href="#">Regulamin</a>
            <!-- Dodaj inne linki, jeśli są potrzebne -->
        </div>
    </footer>
</body>
</html>
