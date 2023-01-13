<header >
<img src="http://localhost/e-commerce/immagini/title.png" alt="titolo" class="immagine">
<?php
if(!isset($_SESSION['user'])){
	echo '<div class="login_id"><p>Ospite</p></div>';	
}else{
	echo '<div class="login_id">
	<a href="http://localhost/e-commerce/pagina_utente.php" class="login_user">User: '.$_SESSION["user"].'</a>
	<a href="http://localhost/e-commerce/logout.php" class="login_exit">(esci)</a>
	</div>';
}
?>
</header>
<ul id="menu">
    <li><a href="http://localhost/e-commerce/index.php">Home</a></li>
    <li><a href="http://localhost/e-commerce/registrazione_user.php">Registrazione</a></li>
    <li><a href="http://localhost/e-commerce/login.php">Login</a></li>   
	<li><a href="http://localhost/e-commerce/cerca.php">Ricerca</a></li>
	<li><a href="http://localhost/e-commerce/acquisto/compra.php">Compra</a></li>
</ul>