<?php
require_once("connection.php");

function vaknamen_ophalen(){
    $stmt = "SELECT 'code' from vakken";
    $stmt = $con->prepare($sql);
    $stmt->execute();

}

if (!isset($_POST['submit'])){
$_SESSION["code"] = NULL;
$_SESSION["cijfer"] = NULL;
$_SESSION["gehaalde EC"] = NULL;
$_SESSION["leerlingnummer"] = NULL;

$code ="";
$cijfer ="";
$gehaalde_EC ="";
$leerlingnummer ="";
}
if(isset($_POST['submit'])){

        $code = filter_input(INPUT_POST, "code", FILTER_SANITIZE_STRING);
        $cijfer = filter_input(INPUT_POST, "cijfer", FILTER_SANITIZE_NUMBER_INT);
        $gehaalde_EC = filter_input(INPUT_POST, "gehaalde EC", FILTER_SANITIZE_NUMBER_INT);
        $leerlingnummer = filter_input(INPUT_POST, "leerlingnummer", FILTER_SANITIZE_STRING);

        $_SESSION["code"] = $code;
        $_SESSION["cijfer"] = $cijfer;
        $_SESSION["gehaalde EC"] = $gehaalde_EC;
        $_SESSION["leerlingnummer"] = $leerlingnummer;

        //errors definieren
        if (empty($code)){
            $error = array('Vul een vakcode in:');
        }
        if (empty($cijfer)){
            $error[1] = "Vul een vakcijfer in:";
        }
        if (empty($gehaalde_EC)){
            $error[2] = "Vul het aantal gehaalde EC's in:";
        }
        if (empty($leerlingnummer)){
            $error[3] = "Vul een leerlingnummer in:";
        }
        if (empty($error)){
             header("location: congrats.php");
        }
        //sql voor plaatsen
        //$sql = "INSERT INTO vakken(vakcode, cijfer, EC, leerlingnummer) VALUES ('$code', '$cijfer', '$EC', '$leerlingnummer')";
        //$stmt = $con->prepare($sql);
        //$stmt->execute();
    }


?>
<html>
    <head>
        <title>Just me, myself and I</title>
        <LINK HREF="dropmaak.css" REL="stylesheet" TYPE="text/css">
    </head>
    <body>
        <div class= "toevoeging">
            <form method="post" action="cijferinvoeren.php">
        <h3 class="titel">cijfer invoeren</h3>

            <p class='gegevens'>Code:</p>
            <p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[0])){echo $error[0];} 
            ?>

            $result = vaknamen_ophalen();
            ?> 
            <select>
                <?php foreach ($result as $vak){
                 ?>   <option value= <?php echo "$vak" ?> > <?php echo "$vak" ?> </option>";
            <?php    }  ?>
            </select>
            
            <p class='gegevens'>Vakcijfer:</p>
            <p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[1])){echo $error[1];} 
            ?>
            <input type="text" name="cijfer" placeholder="Vakcijfer" value="<?php echo $code; ?>"></p>
            
            <p class='gegevens'>gehaalde EC:</p>
            <p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[2])){echo $error[2];} 
            ?>
            <input type="text" name="gehaalde_EC" placeholder="EC" value="<?php echo $code; ?>"></p>
            
            <p class='gegevens'>leerlingnummer:</p>
            <p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[3])){echo $error[3];} 
            ?>
            <input type="text" name="leerlingnummer" placeholder="leerlingnummer (woord)" value="<?php echo $code; ?>"></p><br>

            <input type="submit" value="verstuur" name="submit">
        </form>

        </div>
    </body>
</html>