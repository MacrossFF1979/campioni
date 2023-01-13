<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>VERIFICA LOGIN
</title>
<link rel="stylesheet" href="css/style.css">
<meta http-equiv="refresh" content="3; URL=index.php">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
	<section>
	<h1>Pagina utente</h1>
	<p>Verifica il risultato del login</p>
	<?php
	//Sanificazione input
	$login=filter_var($_POST['login'], FILTER_SANITIZE_STRING);
	$pass_chiaro=$_POST['password'];
	$password = hash('sha256', $pass_chiaro);//password criptata
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
	if ($login=="admin") {
	die('<p class="warning">Usa il pannello di amministrazione</p>');
	}	
	//ricerca nella tabella
	$sql="SELECT nome,cognome,login,password,email,codeacquisto FROM User WHERE login = '".$login."' and password = '".$password."'";
	$test=(mysqli_query($conn, $sql)); 
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
	if($count == 1){  
        echo '<p class="OK">Login Effettuato</p>'; 
		echo '<p class="OK">Benvenuto <strong>';
		echo $row['login'];		
		echo '</strong></p>';
			$actual_nome=$row['nome'];
			$actual_cognome=$row['cognome'];
			$actual_login=$row['login'];
			$actual_email=$row['email'];	
			$actual_acquisto=$row['codeacquisto'];	
			//variabili di sessione (compreso il numero di acquisti)
			$_SESSION['user']=$actual_login;
			$_SESSION['nome']=$actual_nome;
			$_SESSION['cognome']=$actual_cognome;
			$_SESSION['email']=$actual_email;	
			$_SESSION['codeacquisto']=$actual_acquisto;		
        }  
    else{  
        echo '<p class="warning">Login Fallito</p>';  
    }  
	$conn->close();//chiusura sessione
	?>
	</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>