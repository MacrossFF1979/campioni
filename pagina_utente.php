<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
Pagina Utente
</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
		<section>
		<h2>Opzioni Utente</h2>
		<p>Benvenuto, <?php echo $_SESSION['user']; ?> </p>

		<div class="usermenu">
		<div class="intmenu"><a href="acquisto/compra.php" class="linkmenu"><img src="immagini/carrello.png" alt="carrello" class="icon">Acquisto</img></a></div>
		<div class="intmenu"><a href="anagrafica.php" class="linkmenu"><img src="immagini/anagrafica.png" alt="anagrafica" class="icon">Anagrafica</img></a></div>
		<div class="intmenu"><a href="logout.php" class="linkmenu"><img src="immagini/logout.png" alt="logout" class="icon">Logout</img></a></div>
		</div>

		</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>