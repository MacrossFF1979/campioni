<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Inserisci Prodotto.
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'restricted.php' ?>
	<main>
	<?php include '../menu.php' ?>
		<section>
		<h1>Opzioni ADMIN</h1>
		<h2>Inserimento prodotto</h2>
		<section>
<?php	
	//Sanificazione input;
	
	$esercito=$_POST['esercito'];
	$tipo=$_POST['tipo'];
	$nome=filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$costo=$_POST['costo'];
	
	//Parametri di connessione al database

	$servername = "localhost";
	$username = "root";
	$password_db = "";
	$dbname="Negozio";
	
	//Connessione al database
	$conn = mysqli_connect($servername, $username, $password_db, $dbname);
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}	
	$stmt = $conn->prepare("INSERT INTO Oggetti 
	(nome, esercito, tipo, costo) VALUES ( ?, ?, ?, ?)");
	$stmt->bind_param("ssss", $nome, $esercito, $tipo, $costo);
	$stmt->execute();
	

	$stmt->close();
	$conn->close();
	echo '<p class="OK">Inserimento avvenuto correttamente</p>';
	echo '<p class="OK">Torna al <a href="panel.php">Pannello di Controllo</a></p>';
	
	
	
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