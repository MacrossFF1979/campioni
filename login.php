<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
LOGIN
</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
	<section>
	<h1>Pagina di Login</h1>
	<p>Se sei già registrato, inserisci le tue credenziali qui sotto.<br>
	Altrimenti <a href="registrazioneUSER.php">registrati</a>.</p>
	<form method="POST" action="loginDB.php" onsubmit = "return validation1();" name="log">
				<div class="elements">					
					<label for="login">Login:</label><br>
					<input type="text" id="login" name="login"><br><br>
					<label for="password">Password:</label><br>
					<input type="password" id="password" name="password"><br>			
			  	</div>
				<div class="bottoni">
					<button type="submit" class="tasto">Invia</button>
					<button type="reset" class="tasto">Annulla</button>
				</div>
	</form>
				<script>
				  function validation1()  
					{  
					var lg=document.log.login.value;  
					var ps=document.log.password.value;  
					if((lg.length=="")||(ps.length=="")){
					alert("Tutti i campi devono essere riempiti");  return false;}
					}
				</script>
			
	</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>