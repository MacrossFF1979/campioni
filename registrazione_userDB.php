<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
REGISTRAZIONE UTENTE
</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
		<section>
		<h1>Registrazione Utente</h1>
		<p>Pagina di accettazione della nuova utenza</p>
		<?php
	//Funzione per l'eccezione mail
	function checkMail($mail1, $mail2) {
		if($mail1===$mail2) {
		throw new Exception('<p class="warning">Mail già inserita nel database</p>');
		}
		return $mail1;
		}
	
	//Sanificazione input;
	
	$nome=filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$cognome=filter_var($_POST['cognome'], FILTER_SANITIZE_STRING);
	$login=filter_var($_POST['login'], FILTER_SANITIZE_STRING);
	$mail=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$pass_chiaro=$_POST['password'];
	$password = hash('sha256', $pass_chiaro);//password criptata
	$acquisto="";

	//Parametri di connessione al database

	$servername = "localhost";
	$username = "root";
	$password_db = "";
	$dbname="Negozio";

	// Crea la connessione al server
	$conn = new mysqli($servername, $username, $password_db, $dbname="Negozio");

	// Controllo connessione al database
	if ($conn->connect_error) {
	die('<p class="warning">Connection failed:</p>' . $conn->connect_error);
	}
	echo '<p class="OK">Connected successfully</p>';
	
	//Controllo Email

	$query1 = "SELECT `email` FROM `User` WHERE `email` = '$mail' LIMIT 1";
	$result = mysqli_query($conn,$query1);
	if (mysqli_num_rows($result)==1)
	{echo '<p class="warning">Mail già registrata. Ripetere la registrazione.</p>';
	$conn->close();
	}
	else
	{
	echo '<p class="OK">Nuova mail</p>';

	//Inserimento dati di registrazione nel database

	$stmt = $conn->prepare("INSERT INTO User (nome, cognome,
	login, email, password, codeacquisto) VALUES ( ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssi", $nome, $cognome, $login, $mail, $password, $acquisto);
	$stmt->execute();
	

	$stmt->close();
	$conn->close();
	
	
		echo '<p class="ok">Registrazione Avvenuta Correttamente</p>';
		echo '<p class="accedi">Procedi alla pagina di login: 
		<a class="pagelink" href="login.php">Accedi al sito</a></p>';}
	;?>
		</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>