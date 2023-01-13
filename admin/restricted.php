<?php
if(($_SESSION['email']!="admin@localhost.it"))
{
header("Location: ../errori/error.html");
die();
}
?>