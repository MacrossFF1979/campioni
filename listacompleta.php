<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
LISTA COMPLETA DEI PRODOTTI
</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
	<section>
	<h1>Lista completa</h1>
	<p class="OK">Mostra la lista completa di tutti i prodotti</p>
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
	
	//Codici colori per migliorare la leggibilità della tabella
	$color= NULL;
	$color1 = "#323232";
	$color2 = "#656565";
	

	//ricerca nella tabella
	$sql="SELECT id,nome,esercito,tipo,costo  FROM oggetti ";
	$test=(mysqli_query($conn, $sql)); 
	if (mysqli_num_rows($test) > 0) {
	echo '<table class="tabella_acquisti">
	<tr><th>Nome</th><th>Esercito</th><th>Tipo</th><th>Costo</th></tr>';	
	while($row = mysqli_fetch_assoc($test))
		{
		$color == $color1 ? $color=$color2 : $color=$color1;
		echo "<tr style='background-color:$color; text-align:center;'>";
		echo "<td>".$row["nome"]."</td>";
		echo "<td>".$row["esercito"]."</td>";
		echo "<td>".$row["tipo"]."</td>";
		echo "<td>". $row["costo"]." \xE2\x82\xAc</td></tr>";
		}
	echo "</table>";
	}else{
		echo '<p class="Warning">Nessun risultato</p>';}
	$conn->close();
	?>
	</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>