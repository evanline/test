<?php
require_once("connection.php");

if (!isset($_POST['submit'])){
$_SESSION["code"] = NULL;
$_SESSION["naam"] = NULL;
$_SESSION["EC"] = NULL;
$_SESSION["periode"] = NULL;

$code ="";
$naam ="";
$EC ="";
$periode ="";
}
if(isset($_POST['submit'])){

        $code = filter_input(INPUT_POST, "code", FILTER_SANITIZE_STRING);
        $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);
        $EC = filter_input(INPUT_POST, "EC", FILTER_SANITIZE_STRING);
        $periode = filter_input(INPUT_POST, "periode", FILTER_SANITIZE_STRING);

        $_SESSION["code"] = $code;
        $_SESSION["naam"] = $naam;
        $_SESSION["EC"] = $EC;
        $_SESSION["periode"] = $periode;

        //errors definieren
        if (empty($code)){
            $error = array('Vul een vakcode in:');
        }
        if (empty($naam)){
            $error[1] = "Vul een vaknaam in:";
        }
        if (empty($EC)){
            $error[2] = "Vul het aantal te behalen EC's in:";
        }
        if (empty($periode)){
            $error[3] = "Vul een periode in:";
        }
        if (empty($error)){
             header("location: congrats.php"
        		);
        }
        //sql voor plaatsen
        //$sql = "INSERT INTO vakken(vakcode, naam, EC, periode) VALUES ('$code', '$naam', '$EC', '$periode')";
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
    		<form method="post" action="vaktoevoegen.php">
		<h3 class="titel">Vak toevoegen</h3>

        	<p class='gegevens'>Code:</p>
        	<p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[0])){echo $error[0];} 
            ?>
            <input type="text" name="code" placeholder="Vakcode" value="<?php echo $code; ?>"></p>
			
			<p class='gegevens'>Vaknaam:</p>
        	<p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[1])){echo $error[1];} 
            ?>
            <input type="text" name="naam" placeholder="Vaknaam" value="<?php echo $naam; ?>"></p>
			
			<p class='gegevens'>EC:</p>
        	<p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[2])){echo $error[2];} 
            ?>
            <input type="text" name="EC" placeholder="EC" value="<?php echo $EC; ?>"></p>
			
			<p class='gegevens'>Periode:</p>
        	<p class='gegevens'><?php
            if (isset($_POST['submit']) AND isset($error[3])){echo $error[3];} 
            ?>
            <input type="text" name="periode" placeholder="Periode (woord)" value="<?php echo $periode; ?>"></p><br>

            <input type="submit" value="verstuur" name="submit">
        </form>

        </div>
    </body>
</html>