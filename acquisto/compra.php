<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
Negozio
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<main>
		<?php include '../menu.php' ?>
		<section>
		<h1>Pagina Acquisto</h1>
		<h2>Seleziona i prodotti da acquistare</h2>
		<p class="warning">NOTA: E' necessario essere loggati con le proprie credenziali per acquistare il prodotto</p>
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
		$sql="SELECT id,nome,esercito,tipo,costo FROM oggetti ORDER BY esercito";
		$test=(mysqli_query($conn, $sql)); 
		if (mysqli_num_rows($test) > 0) {
		echo '<form method="POST" action="compraDB.php">';	
		echo '<table class="tabella_acquisti"><tr><th>Nome</th><th>Esercito</th><th>Tipo</th><th>Costo</th><th>Quantità</th></tr>';
		while($row = mysqli_fetch_assoc($test))
			{
			$color == $color1 ? $color=$color2 : $color=$color1;
			echo "<tr style='background-color:$color; text-align:center;'>
			<td>".$row["nome"]."</td>";
			echo "<td>".$row["esercito"]."</td>";
			echo "<td>".$row["tipo"]."</td>";
			echo "<td>".$row["costo"]." \xE2\x82\xAc"."</td>";
			echo "<td>".'<input type="number"  min="0" step="1"  style="width: 3em"'."";
			echo ' name=quantity[] value=0>'."</td></tr>";
			echo '<input type="hidden" name=id[] value="'.$row["id"].'">';
			}
			echo "</table>";
			echo '<div class="bottoni">
				<button type="submit" class="tasto">Invia</button>
				<button type="reset" class="tasto">Annulla</button>
			</div></form>';
		}else
		{echo '<p class="Warning">Nessun risultato</p>';}
		$conn->close();
		?>
		<p><a href="../logout.php">Logout</a></p>
		</div>
		</section>	
	</main>
	<?php include '../footer.php' ?>	
</body>
</html>