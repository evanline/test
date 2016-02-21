<?php
// zet de connectie met de database in een variabele $con
$con = new PDO("mysql:host=localhost; dbname=mydb; port=3307", "root", "usbw");

// zet de error mode naar uitonderingen
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>