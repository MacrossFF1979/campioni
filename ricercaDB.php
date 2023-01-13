<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
RICERCA NEL DATABASE - RISULTATI
</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
	<section>
	<h1>Risultati Ricerca</h1>
	<p>Pagina dei risultati della ricerca</p>
	<?php
	//Sanificazione stringhe di ricerca per nome e per costo
	$nome1=$_POST['nome'];
	$costo1=$_POST['costo'];
	$esercito=$_POST['esercito'];
	$tipo=$_POST['tipo'];
	$ordine=$_POST['ordine'];
	$nome=filter_var($nome1, FILTER_SANITIZE_STRING);
	$costo=filter_var($costo1, FILTER_SANITIZE_NUMBER_FLOAT);
	
	//valore della ricerca se nome e costo non sono stati riempiti
	if (empty($costo)){$costo=0;}
	if (empty($nome)){$nome="%";}
	
	//Test Passaggio dati
	echo '<p class="ok">Hai cercato:<br>';
	if ($nome=="%"){ echo "";}
	echo $esercito."; ";
	echo $tipo."; ";
	echo $costo.".";
	echo '</p>';
	

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
	if ($ordine=="ASC"||$ordine=="DESC"){
	$sql="SELECT id,nome,esercito,tipo,costo 
	FROM oggetti 
	WHERE nome LIKE '".$nome."' AND esercito = '".$esercito."' AND tipo = '".$tipo."' ORDER BY costo $ordine";
	$test=(mysqli_query($conn, $sql)); 
	if (mysqli_num_rows($test) > 0) {
	while($row = mysqli_fetch_assoc($test))
		{
		echo '<p class="OK">';	
		echo "ID: ".$row["id"]."<br>";
		echo "Nome: ".$row["nome"]."<br>";
		echo "Esercito: ".$row["esercito"]."<br>";
		echo "Tipo: ".$row["tipo"]."<br>";
		echo "Costo in euro: ". $row["costo"]." \xE2\x82\xAc<br>";
		echo '</p>';
		}
	}else
	{echo '<p class="Warning">Nessun risultato</p>';}
	$conn->close();
	}else{ 
	//ricerca nella tabella
	$sql="SELECT id,nome,esercito,tipo,costo 
	FROM oggetti 
	WHERE nome LIKE '".$nome."' AND esercito = '".$esercito."' AND tipo = '".$tipo."' AND costo > '".$costo."' ";
	$test=(mysqli_query($conn, $sql)); 
	if (mysqli_num_rows($test) > 0) {
	while($row = mysqli_fetch_assoc($test))
		{
		echo '<p class="OK">';	
		echo "ID: ".$row["id"]."<br>";
		echo "Nome: ".$row["nome"]."<br>";
		echo "Esercito: ".$row["esercito"]."<br>";
		echo "Tipo: ".$row["tipo"]."<br>";
		echo "Costo in euro: ". $row["costo"]." \xE2\x82\xAc<br>";
		echo '</p>';
		}
	}else
	{echo '<p class="Warning">Nessun risultato</p>';}
	$conn->close();}
	?>
	</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>