<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Pannello di Controllo.
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'restricted.php' ?>
	<main>
	<?php include '../menu.php' ?>
		<section>
		<h2>Opzioni Admin</h2>
		<p>Benvenuto, <?php echo $_SESSION['user']; ?> </p>
		<p>
		<a href="insert.php">Inserisci articolo</a><br>
		<a href="modify.php">Modifica articolo</a><br>
		<a href="delete.php">Cancella articolo</a><br>
		<a href="userlist.php">Lista utenti - Cancellazione utenti</a><br>
		<a href="buylist.php">Lista acquisti utenti</a></br>
		<a href="../logout.php">Logout</a>
		</p>
		</section>	
	</main>
	<?php include '../footer.php' ?>	
</body>
</html>