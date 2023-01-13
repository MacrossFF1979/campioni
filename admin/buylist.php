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

			//Connessione al Database
			$conn = mysqli_connect($servername, $username, $password_db, $dbname);
			
			// Controllo connessione al database
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}	
			
			//ricerca nella tabella
			$sql="SELECT id,nome,cognome,email  FROM user ORDER BY nome";
			$test=(mysqli_query($conn, $sql)); 
			if (mysqli_num_rows($test) > 0) {
			echo '<form method="POST" action="buylistDB.php">';	
			while($row = mysqli_fetch_assoc($test)){
				if($row["email"]!="admin@localhost.it"){
					echo '<div class="elements1"><input type="radio"><br>';
					echo "Nome: ".$row["nome"]."<br>";
					echo "Cognome: ".$row["cognome"]."<br>";
					echo "Email: ".$row["email"]."<br>";
					
					echo '<input type="hidden" name="nome" value='.$row["nome"].'>';
					echo '<input type="hidden" name="cognome" value='.$row["cognome"].'>';
					echo '<input type="hidden" name="email" value='.$row["email"].'>';
					echo "</div>";
					}
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