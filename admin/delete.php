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
		<h2>Seleziona il prodotto da cancellare</h2>
		<?php
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
	
	//ricerca nella tabella
	$sql="SELECT id,nome,esercito,tipo,costo  FROM oggetti ORDER BY esercito";
	$test=(mysqli_query($conn, $sql)); 
	if (mysqli_num_rows($test) > 0) {
	echo '<form method="POST" action="deleteDB.php">';	
	while($row = mysqli_fetch_assoc($test))
		{
		echo '<div class="elements1"><input type="checkbox"';
		echo ' name=id[] value="'.$row["id"].'">';
		echo "Nome: ".$row["nome"]."<br>";
		echo "Esercito: ".$row["esercito"]."<br>";
		echo "Tipo: ".$row["tipo"]."<br>";
		echo "Costo in euro: ". $row["costo"]." \xE2\x82\xAc<br>";
		echo "</div>";
		}
	echo '<div class="bottoni">
			<button type="submit" class="tasto">Invia</button>
			<button type="reset" class="tasto">Annulla</button>
		</div></form>';
	}else
	{echo '<p class="Warning">Nessun risultato</p>';}
	$conn->close();
	?>


		</section>	
		<section>
			<a href="insert.php">Inserisci articolo</a><br>
			<a href="modify.php">Modifica articolo</a><br>
			<a href="delete.php">Cancella articolo</a><br>
			<a href="userlist.php">Lista utenti - Cancellazione utenti</a><br>
			<a href="buylist.php">Lista acquisti utenti</a></br>
			<a href="logout.php">Logout</a>
		</section>	
	</main>
	<?php include '../footer.php' ?>	
</body>
</html>