<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Lista Utenti.
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'restricted.php' ?>
	<main>
	<?php include '../menu.php' ?>
	<section>
	<h1>Lista completa</h1>
	<p>Tutti i risultati</p>
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
	$sql="SELECT id,nome,cognome,login,email  FROM user ";
	$test=(mysqli_query($conn, $sql)); 
	if (mysqli_num_rows($test) > 0) {
	while($row = mysqli_fetch_assoc($test))
		{
		echo '<p class="OK">';	
		echo "ID: ".$row["id"]."<br>";
		echo "Nome: ".$row["nome"]."<br>";
		echo "Cognome: ".$row["cognome"]."<br>";
		echo "Login: ".$row["login"]."<br>";
		echo "Email:". $row["email"]."<br>";
		echo '</p>';
		}
	}else
	{echo '<p class="Warning">Nessun risultato</p>';}
	$conn->close();
	?>
	</section>	
	<section>
	<h2>Cancella un utente:</h2>
	<div class="elements">	
		<form form method="POST" action="cancellauserDB.php" onsubmit = "return validation1()" name="canc">
		<label for="login">Inserisci l'email dell'utente da cancellare:</label><br>
		<input type="text" id="email" name="email"><br><br>
	</div>
	<div class="bottoni">
		<button type="submit" class="tasto">Invia</button>
		<button type="reset" class="tasto">Annulla</button>
	</div>
		<script>
			function validation1()  
				{  
				var em=document.canc.email.value;  
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; //filtro per la mail 				
				if(em.length==""){
					alert("Mail vuota");  
					return false; }  
				else if(!filter.test(em)){
					alert("Mail inserita in maniera NON corretta"); 
					return false; }
				}	
		</script>
		</section>
	</main>
	<section>
			<a href="insert.php">Inserisci articolo</a><br>
			<a href="modify.php">Modifica articolo</a><br>
			<a href="delete.php">Cancella articolo</a><br>
			<a href="userlist.php">Lista utenti - Cancellazione utenti</a><br>
			<a href="buylist.php">Lista acquisti utenti</a></br>
			<a href="../logout.php">Logout</a>
	</section>	
	<?php include '../footer.php' ?>	
</body>
</html>