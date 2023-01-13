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
<?php include 'logged.php' ?>
	<main>
		<?php include '../menu.php' ?>
		<section>
		<?php
		$quantity=$_POST['quantity'];
		$id=$_POST['id'];
		$email=$_SESSION['email'];
		$vendite=array_combine($id, $quantity);
		$data = serialize($vendite);//preparo il dato per eventualmente aggiungerlo nella tabella user
		
		echo '<h2>Prodotti nel carrello</h2>';

		//Parametri di Login
		$servername = "localhost";
		$username = "root";
		$password_db = "";
		$dbname="Negozio";
		$totale=0; //inizializzazione variabile totale acquisti.
		//Connessione al Database
		$conn = mysqli_connect($servername, $username, $password_db, $dbname);
		
		// Controllo connessione al database
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}	
		foreach ($vendite as $key => $value){//così si stampano solo gli oggetti che si vogliono acquistare.
			if ($value>0){
			$sql="SELECT id,nome,esercito,tipo,costo FROM oggetti WHERE id=$key";
			$test=(mysqli_query($conn, $sql));
			while($row = mysqli_fetch_assoc($test)){
				echo "<p>";				
				echo "Nome: ".$row["nome"]."<br>";
				echo "Esercito: ".$row["esercito"]."<br>";
				echo "Tipo: ".$row["tipo"]."<br>";
				echo "Costo in euro: ". $row["costo"]*$value." \xE2\x82\xAc<br>";//il valore viene moltiplicato per la quantità
				echo "Quantità: ".$value."<br>";	
				echo "</p>";
				$totale+=$row["costo"]*$value;
				}				
			}
		}
		if ($totale == 0){
			echo '<p class="warning">Non è stato selezionato nessun prodotto.</p>';
			echo '<p class="warning">Reindirizzo alla pagina principale...</p>';
			header( "refresh:2;url=index.php" );
		}
		
		
		echo "<br><p><strong>TOT: ".$totale." \xE2\x82\xAc</strong></p><br>";
		$conn->close();//chiusura sessione
		?>
		</section>
		<section>
		<?php
		$servername = "localhost";
		$username = "root";
		$password_db = "";
		$dbname="Negozio";
		//connessione
		$conn = mysqli_connect($servername, $username, $password_db, $dbname);
		
		// Controllo connessione al database
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}	
		$sql="SELECT indirizzo,cap,cartadicredito,cvv2 FROM user WHERE email='$email'";
		$test=(mysqli_query($conn, $sql));
		while($row = mysqli_fetch_assoc($test)){

			$ind=$row["indirizzo"];
			$cap=$row["cap"];
			$car=$row["cartadicredito"];
			$cvv2=$row["cvv2"];
		}
		if ($ind==""||$cap==""||$car==""||$cvv2=="")
		{$cap="";
		$ind="";
		$car="0000000000000000";
		$cvv2="000";
		}
		//chiusura sessione
		$conn->close();
		?>
		
		
		
			<h2>Dati di Spedizione</h2>
			<form method="POST" action="spedizioneDB.php" onsubmit="return checkForm(this);" name="buy">
				<div class="elements2">
				<label for="creditnome"> Nome completo:</label><br>
				<Input type="text" size="60" id="creditnome" name="creditnome">
				</div>

				<div class="elements2">
				<label for="indirizzo"> Indirizzo:</label><br>
				<Input type="text" size="60" id="address" name="address" <?php echo 'value="'.$ind.'"';?>>
				</div>
				
				<div class="elements2">
				<label for="indirizzo"> CAP:</label><br>
				<Input type="text" size="7" id="cap" name="cap" <?php echo 'value="'.$cap.'"';?>">
				</div>
				
				
				<div class="elements2">
				<label for="cardNumber"> Numero di carta di credito:</label><br>
				<Input type="password" size="12" id="cardNumber" name = "cardNumber" <?php echo 'value="'.$car.'"';?>>
				</div>
				
				<div class="elements2">
				<label for="cardNumberCVV2">cvv2:</label><br>
				<Input type="password" size="3" id="cardNumberCVV2" name="cardNumberCVV2" <?php echo 'value="'.$cvv2.'"';?>>
				</div>
				
				<div class="elements2">
				<label for="cvv2">Scegliere se si vuole salvare i dati personali in memoria</label><br>
				<Input type="checkbox" id="saveData" name = "saveData" value=1>
				</div>
				
				<input type="hidden" id="acquisti" name="acquisti" value=<?php echo $data; ?>>

				<div class="bottoni2">
					<button type="submit" class="tasto">Invia</button>
					<button type="reset" class="tasto">Annulla</button>
				</div>
			</form>	
			<script>
			function checkForm(buy)  
			{  
				var nom=document.buy.creditnome.value;  
				var addr=document.buy.address.value; 
				var cap=document.buy.cap.value;
				var cNum=document.buy.cardNumber.value; 
				var cVV2=document.buy.cardNumberCVV2.value; 
				if(nom.length==""||addr.length==""||cNum.length==""||cVV2.length=="")
				{
					alert("Tutti i campi devono essere riempiti");  
					return false;
				}  
				else if (is_numeric($nom))
				{
					alert("Il nome non può essere un numero");  
					return false;
				}	
				else if (is_string($cap))
				{
					alert("Il CAP non può contenere delle lettere");  
					return false;
				}						
				else if (is_string($cNum))
				{
					alert("Il numero della carta di credito non può contenere lettere");  
					return false; 
				}						
				else if ($cNum.lenght<12||$cNum.lenght>16)
				{
					alert("Lunghezza numero della carta di credito errato");  
					return false; 
				}						
				else if ($cVV2!=3)
				{
					alert("Lunghezza CVV2 errata");  
					return false; 
				}	
			}
			</script>			
		</section>
	</main>
	
	<?php include '../footer.php' ?>	
</body>
</html>