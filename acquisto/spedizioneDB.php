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

		//Sanificazione input
		$credname=filter_var($_POST['creditnome'],FILTER_SANITIZE_STRING);
		$address=filter_var($_POST['address'],FILTER_SANITIZE_STRING);
		$cap=filter_var($_POST['cap'],FILTER_SANITIZE_NUMBER_INT);
		$cardN=filter_var($_POST['cardNumber'],FILTER_SANITIZE_NUMBER_INT);
		$cardCV=filter_var($_POST['cardNumberCVV2'],FILTER_SANITIZE_NUMBER_INT);
		$check=$_POST['saveData'];
		$data_acquisto=$_POST['acquisti'];
		$email=$_SESSION['email'];


		if ($check==1)
		{

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
			
			//Aggiunta codici di acquisto nuovi a quelli già presenti, per lo storico vendite
			
			$oldcodeacquisto=0;
			$sql="SELECT codeacquisto FROM user WHERE email='$email'";
			$test=(mysqli_query($conn, $sql));
			while($row = mysqli_fetch_assoc($test)){
			$oldcodeacquisto=$row["codeacquisto"];
			}

			if ($oldcodeacquisto!=NULL){
			$a1=unserialize($oldcodeacquisto);
			$a2=unserialize($data_acquisto);
		
			$sums = array();
			foreach (array_keys($a1 + $a2) as $key) {
			$sums[$key] = (isset($a1[$key]) ? $a1[$key] : 0) + (isset($a2[$key]) ? $a2[$key] : 0);
			}
			$data_acquisto=serialize($sums);
						
			}
			$sql="UPDATE user SET codeacquisto='$data_acquisto', 
			indirizzo='$address',
			cap='$cap',	
			cartadicredito='$cardN',
			cvv2='$cardCV'
			WHERE email='$email'";
			mysqli_query($conn, $sql);  
			echo '<p class="OK">Acquisto Effettuato</p>';
			$conn->close();
		}
		else{
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
			$sql="UPDATE user SET codeacquisto='$data_acquisto' WHERE email='$email'";
			mysqli_query($conn, $sql);  
			echo '<p class="OK">Acquisto Effettuato</p>';
			echo '<p class="warnimg">Indirizzo e Carta di Credito non registrati</p>';	
			$conn->close();			
		}
		?>
		</section>
	</main>
	
	<?php include '../footer.php' ?>	
</body>
</html>