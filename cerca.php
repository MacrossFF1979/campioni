<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
RICERCA NEL DATABASE
</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
	<section>
	<h1>Ricerca nel Database</h1>
	<p>Pagina di ricerca per esercito, tipo, ecc ecc</p>
	<form method="POST" action="ricercaDB.php">
		<div class="elements3">
			<label class="labelsearch">Esercito:</label>
			<input type="radio" id="army" name="esercito" value="Space Marines" checked="checked">
	  		<label for="Space Marine">Space Marine</label>
	  		<input type="radio" id="army" name="esercito" value="Orks">
	  		<label for="Orks">Orks</label>
	  	</div>
		<div class="elements3">
			<label class="labelsearch">Tipo:</label>
			<input type="radio" id="type" name="tipo" value="Miniatura" checked="checked">
	  		<label for="Miniatura">Miniatura</label>
	  		<input type="radio" id="type" name="tipo" value="Veicolo">
	  		<label for="Veicolo">Veicolo</label>
			<input type="radio" id="type" name="tipo" value="Hero">
	  		<label for="Eroe">Eroe</label>
	  	</div>		
		<div class="elements3">
			<label for="nome" class="labelsearch">Nome:</label>
			<input type="text" id="nome" name="nome" value="Squadra Tattica">
		</div>		
		<div class="elements3">
			<label for="nome" class="labelsearch">Costo (maggiore di):</label>
			<input type="text" id="costo" name="costo" value=0>
		</div>	
		<div class="elements3">
			<label class="labelsearch">Ordinamento:</label>
			<input type="radio" id="type" name="ordine" value="ASC">
	  		<label for="Price">Prima economico</label>
	  		<input type="radio" id="type" name="ordine" value="same" checked="checked">
	  		<label for="Price">Nessuno</label>
			<input type="radio" id="type" name="ordine" value="DESC">
	  		<label for="Price">Prima costoso</label>
		</div>
		<div class="bottoni3">
			<button type="submit" class="tasto">Invia</button>
			<button type="reset" class="tasto">Annulla</button>
		</div>
	</form>
		<div class="extra">
			<p>Se vuoi vedere la lista completa dei prodotti, premi <a href="listacompleta.php">qui</a></p>
		</div>
	</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>