<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
CREAZIONE DATABASE
</title>
<link rel="stylesheet" href="css/registrazione.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
	<section>
	<h1>ATTENZIONE</h1>
	<p>Questa pagina serve solamente per creare un database con delle offerte pre/impostate, in modo da avere già dei dati con cui lavorare.
	<br><br>La pagina va caricata una sola volta all'inizio.</p>
	<p>La pagina crea il database Negozio con le sue tabelle Oggetti e User. Crea inoltre l'utente Admin in User</p>

<?php
//variabili di connessione al database
$servername = "localhost";
$username = "root";
$password_db = "";
// Crea la connessione al server
	$conn = new mysqli($servername, $username, $password_db);
	// Controllo connessione al database
	if ($conn->connect_error) {
	die('<p class="warning">Connection failed:</p>' . $conn->connect_error);
	}
	echo '<p class="OK">Connected successfully</p>';
	// Controllo connessione al database
	if (!$conn) {
	  die('<p class="warning"> Connection failed: </p>' . mysqli_connect_error());
	}
	//Crea il database se non esiste
	$sql = "CREATE DATABASE IF NOT EXISTS Negozio";
	if (mysqli_query($conn, $sql)){
	  echo '<p class="OK">Database Negozio created successfully</p>';
	} else {
	  echo '<p class="warning">Error creating database:</p>' . mysqli_error($conn);
	}
	//Nome del database
	$dbname="Negozio";
	$conn = mysqli_connect($servername, $username, $password_db, $dbname);
	// Controllo connessione al database
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}		
	//Creazione della tabella User nel database
	$sql = "CREATE TABLE IF NOT EXISTS Oggetti(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL UNIQUE,
    esercito VARCHAR(30) NOT NULL,
    tipo VARCHAR(30) NOT NULL,
	costo FLOAT(20) NOT NULL
	)";
	//Controllo creazione tabella
	if (mysqli_query($conn, $sql)) {
	echo '<p class="OK">Table Oggetti created successfully</p>';
	} else {
	echo '<p class="warning">Error creating table: </p>' .  mysqli_error($conn);
	}
	$sql="INSERT INTO Oggetti (nome, esercito, tipo, costo)
	VALUES ('Squadra Tattica', 'Space Marines', 'Miniatura', 25.00),
	('Squadra Assalto', 'Space Marines', 'Miniatura', 35.00),
	('Squadra Devastator', 'Space Marines', 'Miniatura', 35.00),
	('Rhino', 'Space Marines', 'Veicolo', 55.00),
	('Land Raider ', 'Space Marines', 'Veicolo', 85.00),
	('Boyz', 'Orks', 'Miniatura', 25.00),
	('Nobz', 'Orks', 'Miniatura', 45.00),
	('Killa Kan', 'Orks', 'Veicolo', 35.00),
	('Ozdakka ', 'Orks', 'Hero', 25.00);";
	if (mysqli_query($conn, $sql)) {
	echo '<p class="OK">Dati Inseriti</p>';
	} else {
	echo '<p class="warning">Errore inserimento dati</p>' .  mysqli_error($conn);
	}
	
		// Controllo connessione al database
	if (!$conn) {
	  die('<p class="warning"> Connection failed: </p>' . mysqli_connect_error());
	}

		
	//Creazione della tabella User nel database
	$sql = "CREATE TABLE IF NOT EXISTS User(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
	cognome VARCHAR(30) NOT NULL,
    login VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
	password VARCHAR(30) NOT NULL,
	acquisto SMALLINT UNSIGNED NOT NULL
	)";
	
	if (mysqli_query($conn, $sql)) {
	echo '<p class="OK">Table User	created successfully</p>';
	} else {
	echo '<p class="warning">Error creating table: </p>' .  mysqli_error($conn);
	}
	$sql="INSERT INTO User (nome, cognome, login, email, password,acquisto) 
	VALUES ('admin', 'admin', 'admin', 'admin@localhost.it','admin',0);";
	if (mysqli_query($conn, $sql)) {
	echo '<p class="OK">Dati Inseriti</p>';
	} else {
	echo '<p class="warning">Errore inserimento dati</p>' .  mysqli_error($conn);
	}

	$conn->close();
?>	
	</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>