<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
Login Amministrazione
</title>
<link rel="stylesheet" href="css/registrazione.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
		<section>
		<h2>Amministratore</h2>
		<?php 
		session_unset();	
		session_destroy();
		?>
		<p>Effettuare il login</p>
		<form method="POST" action="adminDB.php" onsubmit = "return validation1()" name="log">
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
				<script>
				  function validation1()  
					{  
					var lg=document.log.login.value;  
					var pw=document.log.password.value;
					if(lg.length=="" || pw.length==""){
					alert("Completare tutti i campi");  return false; }  
					}
				</script>
		</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>