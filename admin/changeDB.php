<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Modifica Prodotto.
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'restricted.php' ?>
	<main>
	<?php include '../menu.php' ?>
	<section>
	<h1>Modifica Prodotto</h1>
	<p>Pagina dei risultati della ricerca</p>
	<?php
	//Sanificazione
	$esercito=$_POST['esercito'];
	$tipo=$_POST['tipo'];
	$nome=filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$costo=$_POST['costo'];
	$id=$_POST['id'];
	
	//Parametri di Login

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
	$sql="UPDATE oggetti SET tipo='$tipo', nome='$nome', esercito='$esercito', costo='$costo' WHERE id='$id' ";
	echo $sql;	
	mysqli_query($conn, $sql);
	echo '<p class="OK">Dati modificati con successo</p>';
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