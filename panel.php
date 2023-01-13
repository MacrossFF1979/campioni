<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
Pagina Utente
</title>
<link rel="stylesheet" href="css/registrazione.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
		<section>
		<h2>Opzioni Utente</h2>
		<p>Benvenuto, <?php echo $_SESSION['user']; ?> </p>
		<p>
		<a href="insert.php">Inserisci articolo</a><br>
		<a href="modify.php">Modifica articolo</a><br>
		<a href="cancel.php">Cancella articolo</a><br>
		<a href="userlist.php">Lista utenti</a><br>
		<a href="buylist.php">Lista acquisti utenti</a></br>
		<a href="logout.php">Logout</a>
		</p>
		</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>