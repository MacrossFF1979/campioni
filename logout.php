<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
Logout
</title>
<meta http-equiv="refresh" content="2; URL=index.php">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
	<?php include 'menu.php' ?>
		<section>
		<?php 
		session_unset();	
		session_destroy();?>
		<p>Arrivederci a presto!</p>
		</section>	
	</main>
	<?php include 'footer.php' ?>	
</body>
</html>