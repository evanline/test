<?php
function vaktoevoegen(){
$sql = "INSERT INTO vakken(vakcode, naam, EC, periode) VALUES ('$code', '$naam', '$EC', '$periode')";
        $stmt = $con->prepare($sql);
        $stmt->execute();}

function cijfertoevoegen(){
	$sql = "INSERT INTO cijfer(vakcode, leerlingnummer, cijfer, gehaaldeEC) VALUES ('$code', '$leerlingnummer', '$cijfer', '$gehaalde_EC', )";
    $stmt = $con->prepare($sql);
    $stmt->execute();
}


?>