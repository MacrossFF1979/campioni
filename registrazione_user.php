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
		<p>Pagina di registrazione della nuova utenza</p>
			<form method="POST" action="registrazione_userDB.php" onsubmit = "return validation()" name="reg">
				<div class="elements">
					<label for="nome">Nome:</label><br>
					<input type="text" id="nome" name="nome"><br><br>
					<label for="cognome">Cognome:</label><br>
					<input type="text" id="cognome" name="cognome"><br><br>
					<label for="login">Login:</label><br>
					<input type="text" id="login" name="login"><br><br>
					<label for="email">Email:</label><br>
					<input type="text" id="email" name="email"><br><br>
					<label for="email2">Ripeti la mail:</label><br>
					<input type="text" id="email2" name="email2"><br><br>
					<label for="password">Password:</label><br>
					<input type="password" id="password" name="password"><br><br>
					<label for="password2">Ripeti la password:</label><br>
					<input type="password" id="password2" name="password2"><br><br>
			  	</div>
				<div class="bottoni">
					<button type="submit" class="tasto">Invia</button>
					<button type="reset" class="tasto">Annulla</button>
				</div>
     <script>  
            function validation()  
            {  
                var nm=document.reg.nome.value;  
                var cn=document.reg.cognome.value;
				var lg=document.reg.login.value;
				var em=document.reg.email.value;  
				var em2=document.reg.email2.value;  
				var ps=document.reg.password.value; 
				var ps2=document.reg.password2.value; 
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; //filtro per la mail 				
                if(nm.length=="" || cn.length=="" || lg.length=="" || em.length=="" || em2.length=="" || ps.length=="" ||
				ps2.length=="") {  alert("Completare tutti i campi");  return false; }  
				else if (em!=em2){
					alert("Le mail inserite non sono uguali"); 
					return false; 
					}
				else if(!filter.test(em)){
					alert("Mail sbagliata"); 
					return false; 
					}
				else if (ps.length<10){
					alert("La password deve essere almeno di 10 caratteri"); 
					return false; 
					}	
				else if (ps!=ps2){
					alert("Le password inserite non sono uguali"); 
					return false; 
					}
				
			}  
				</script>  
			</form>
		</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>