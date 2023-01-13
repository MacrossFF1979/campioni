<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
ADMIN - Inserisci Prodotto.
</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'restricted.php' ?>
	<main>
	<?php include '../menu.php' ?>
		<section>
		<h1>Opzioni ADMIN</h1>
		<h2>Inserisci il prodotto</h2>
			<form method="POST" action="insertDB.php" onsubmit = "return validation1()" name="insert">
			<div class="elements">
				<input type="radio" id="army" name="esercito" value="Space Marines" checked="checked">
		  		<label for="Space Marine">Space Marine</label>
		  		<input type="radio" id="army" name="esercito" value="Orks">
		  		<label for="Orks">Orks</label>
		  	</div>
			<div class="elements">
				<input type="radio" id="type" name="tipo" value="Miniatura" checked="checked">
		  		<label for="Miniatura">Miniatura</label>
		  		<input type="radio" id="type" name="tipo" value="Veicolo">
		  		<label for="Veicolo">Veicolo</label>
				<input type="radio" id="type" name="tipo" value="Hero">
		  		<label for="Eroe">Eroe</label>
		  	</div>
			<div class="elements">
				<label for="nome">Nome dell'oggetto</label>
				<input type="text" id="nome" name="nome" value="Squadra Tattica">
			</div>
			<div class="elements">
				<label for="costo">Costo</label>
				<input type="text" id="costo" name="costo" value=0>
			</div>
			<div class="bottoni">
				<button type="submit" class="tasto">Invia</button>
				<button type="reset" class="tasto">Annulla</button>
			</div>
			</form>
			<script>
				  function validation1()  
					{  
					var name=document.insert.nome.value;  
					var costo=document.insert.costo.value; 
					var filter = /^-?\d+\.?\d*$/;					
					if(name.length==""){
						alert("L'articolo è senza nome");  
						return false;} 
					else if (!filter.test(costo)){
						alert("Il costo deve essere un numero"); 
						return false; }  
					else if (costo<=0){
						alert("Il costo deve essere maggiore di 0"); 
						return false; }  
					}
			</script>
		</section>	
		<section>
			<a href="insert.php">Inserisci articolo</a><br>
			<a href="modify.php">Modifica articolo</a><br>
			<a href="delete.php">Cancella articolo</a><br>
			<a href="userlist.php">Lista utenti - Cancellazione utenti</a><br>
			<a href="buylist.php">Lista acquisti utenti</a></br>
			<a href="../logout.php">Logout</a>
		</section>	
	</main>
	<?php include '../footer.php' ?>	
</body>
</html>