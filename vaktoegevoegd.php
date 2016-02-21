<?php
require_once("connection.php");
require_once("vaktoevoegen.php");
$sql = "INSERT INTO vakken(vakcode, naam, EC, periode) VALUES ('$code', '$naam', '$EC', '$periode')";
        $stmt = $con->prepare($sql);
        $stmt->execute();
?>

<html>
    <head>
        <title>Just me, myself and I</title>
        <LINK HREF="dropmaak.css" REL="stylesheet" TYPE="text/css">
    </head>
    <body>
    	<p>Het vak is toegevoegd. Ga terug naar overzicht</p>
    </body>
</html>