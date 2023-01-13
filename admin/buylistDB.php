<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Buylist
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'restricted.php' ?>
	<main>
	<?php include '../menu.php' ?>
		
		<section>
		<?php
			//Parametri di Login
			$servername = "localhost";
			$username = "root";
			$password_db = "";
			$dbname="Negozio";
			
			//variabili passate da buylist
			$nome=$_POST["nome"];
			$cognome=$_POST["cognome"];
			$email=$_POST["email"];

			//inizializzazione variabili
			$totale=0;
			$ca=[];

			//Connessione al Database
			$conn = mysqli_connect($servername, $username, $password_db, $dbname);
			
			// Controllo connessione al database
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}	
			
			//ricerca nella tabella
			$sql="SELECT nome,cognome,email,codeacquisto FROM user WHERE email='$email'";
			$test=(mysqli_query($conn, $sql)); 
			if (mysqli_num_rows($test) > 0) {
				while($row = mysqli_fetch_assoc($test)){
					echo '<p class="OK">';
					echo "Nome: ".$row["nome"]."<br>";
					echo "Cognome: ".$row["cognome"]."<br>";
					echo "Email: ".$row["email"]."<br>";
					echo "</p>";
					$ca=unserialize($row["codeacquisto"]);
					}
				}
					
		foreach ($ca as $key => $value){//così si stampano solo gli oggetti che si vogliono acquistare.
			if ($value>0){
			$sql="SELECT id,nome,esercito,tipo,costo FROM oggetti WHERE id=$key";
			$test=(mysqli_query($conn, $sql));
			while($row = mysqli_fetch_assoc($test)){
				echo "<p>";				
				echo "Nome: ".$row["nome"]."<br>";
				echo "Esercito: ".$row["esercito"]."<br>";
				echo "Tipo: ".$row["tipo"]."<br>";
				echo "Costo singolo pezzo: ". $row["costo"]." \xE2\x82\xAc<br>";
				echo "Costo totale: ". $row["costo"]*$value." \xE2\x82\xAc<br>";//il valore viene moltiplicato per la quantità
				echo "Quantità: ".$value."<br>";	
				echo "</p>";
				$totale+=$row["costo"]*$value;
				}				
			}
		}
		echo "<br><p><strong>TOT: ".$totale." \xE2\x82\xAc</strong></p><br>";
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