<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
Anagrafica
</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
		<section>
		<h2>Anagrafica Utente:</h2>
		<div class="anagrafica">
		<?php 
			echo '<ul class="listalogin"><li>Username: '.$_SESSION['user'].'</li>';
			echo '<li>Nome: '.$_SESSION['nome'].'</li>';
			echo '<li>Cognome: '.$_SESSION['cognome'].'</li>';
			echo '<li>Email: '.$_SESSION['email'].'</li></ul>';	
		?>
		</div>
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