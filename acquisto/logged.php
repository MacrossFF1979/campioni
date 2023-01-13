<?php
if(!isset($_SESSION['user']))
{
header("Location: ../errori/mustlogin.html");
die();
}
?>