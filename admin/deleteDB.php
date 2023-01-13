<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Cancella Prodotto.
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'restricted.php' ?>
	<main>
	<h1>Cancellazione Prodotto</h1>
	<?php include '../menu.php' ?>
		<section>
		<h2>Cancellazione</h2>
		<?php
	//Parametri di Login
	foreach ($_POST['id'] as $key => $value){
	echo $value;}
	$lista = implode(', ', $_POST['id']);
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
	$sql="DELETE FROM oggetti WHERE id IN (".$lista.") ";
	//echo $sql;
	mysqli_query($conn, $sql);
	echo '<p class="OK">Cancellazione Eseguita</p>';
	echo '<p class="OK">Torna al <a href="panel.php">Pannello di Controllo</a></p>';
	$conn->close();
	?>
	</section>	
		<section>
			<a href="insert.php">Inserisci articolo</a><br>
			<a href="modify.php">Modifica articolo</a><br>
			<a href="delete.php">Cancella articolo</a><br>
			<a href="userlist.php">Lista utenti - Cancellazione utenti</a><br>
			<a href="buylist.php">Lista acquisti utenti</a></br>
			<a href="../logout.php">Logout</a>
		</section>	
	</main>
	<?php include '../footer.php' ?>	
</body>
</html>