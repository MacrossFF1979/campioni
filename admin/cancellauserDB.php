<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Cancella utente.
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include '../restricted.php' ?>
	<main>
	<?php include '../menu.php' ?>
	<section>
	<h1>Lista completa</h1>
	<p>Tutti i risultati</p>
	<?php
		//Parametri di Login
		$mail=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		if ($mail=="admin@localhost.it")
		{
		echo '<p class="warning">Non è possibile cancellare la mail admin@localhost.it</p>';
		echo '<p class="OK">Torna al <a href="panel.php">Pannello di Controllo</a></p>';
		}
		else{
		$servername = "localhost";
		$username = "root";
		$password_db = "";
		$dbname="Negozio";

		//Connessione al Database
		$conn = mysqli_connect($servername, $username, $password_db, $dbname);

		// Controllo connessione al database
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());	
		}	
		// Cancellazione
		$sql="DELETE FROM user WHERE email='".$mail."' ";
		echo $sql;
		mysqli_query($conn, $sql);
		echo '<p class="OK">Cancellazione Utente Eseguita</p>';
		echo '<p class="OK">Torna al <a href="panel.php">Pannello di Controllo</a></p>';
		$conn->close();
	}
	?>
		</script>
		</section>
	</main>
	<?php include '../footer.php' ?>	
</body>
</html>