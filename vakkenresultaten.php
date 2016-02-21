<html>
    <head>
        <title>Just me, myself and I</title>
        <LINK HREF="dropmaak.css" REL="stylesheet" TYPE="text/css">
    </head>
    <body>
    	<h2 class= "titel">Mijn studentgegevens zijn:</h2>
    	<p class="gegevens">	
    		Amanda Pongers<br>
    		Studentnummer:S1092821<br>
            Startjaar HBO-ICT: 2015<br>
            <a href = "vaktoevoegen.php">Vak toevoegen</a><br>
            <a href = "cijferinvoeren.php">Cijfer invoeren</a><br>
        </p>
        <div class= "wrapper">
        	<div id= "periode1">
        		
        		<?php
        			require_once("connection.php");
        			if (isset($_GET['gb'])){
                                    //invullen informatie
                                    echo"
                                    <form action = '' method = 'POST'>
                                    Code:<br>
                                    <input type= 'text' name = 'code'><br>
                                    Naam vak:<br>
                                    <input type= 'text' name = 'naam'><br>
                                    Aantal EC:<br>
                                    <input type= 'text' name = 'EC'><br>
                                    Periode:<br>
                                    <input type= 'text' name = 'periode'><br>
                                    <input type= 'submit' name= 'Toevoegen'>
                                    </form>
                                    ";

                                    	if(isset($_POST['Toevoegen'])){
                                        	//variabelen definieren
                                        	$code = $_POST['code'];
                                        	$naam = $_POST['naam'];
                                        	$EC   = $_POST['EC'];
                                        	$periode = $_POST['periode'];
                                        
                                        	//sql voor plaatsen
                                        	$sql = "INSERT INTO vakken(vakcode, naam, EC, periode) VALUES ('$code', '$naam', '$EC', '$periode')";
                                        	$stmt = $con->prepare($sql);
                                        	$stmt->execute();
                                        	echo "Het vak is toegevoegd. <a href= 'vakkenresultaten.php'>Terug</a>";
                                    	}
                                    }else{
                                        //SQL voor ophalen informatie
                                        
                                            # code...
                                        
                                        $sql = "SELECT 'v.code', naam, EC, cijfer, gehaaldeEC  FROM vakken v  INNER JOIN cijfer c ON 'v.code'='c.code' WHERE periode = 'een' ORDER BY naam DESC";
                        				$stmt = $con->prepare ($sql);
                        				$stmt->Execute();
                        				$stmt->setFetchMode(PDO::FETCH_ASSOC);


                                        	if($stmt->rowCount() > 0){
                        						while($row = $stmt->fetch()){
                        						echo '
                        						<ul>
                        							<li><b>Vak: </b>' . $row['naam'] . '</li>
                            						<li><b>Code: </b>' . $row['v.code'] . '</li>
                            						<li><b>Te behalen EC: </b>' . $row['EC'] . '</li>
                            						<li><b>Cijfer: </b>' . $row['cijfer'] . '</li>
                            						<li><b>Behaalde EC: </b>'.$row['gehaaldeEC'].'</li>
                            					</ul>
                                                ';
                                            }
                                        }
                                    };
                                ?>
        	</div> <!--einde periode1-->
        	<div id= "periode2">
        	</div><!--einde periode2-->
        </div><!--einde wrapper-->
        <div class= "wrapper">
        	<div id= "periode3">
        	</div> <!--einde periode3-->
        	<div id= "periode4">
        	</div><!--einde periode4-->
        </div><!--einde wrapper2-->
    </body>
</html>

<!--$sql = "SELECT v.code, naam, EC, cijfer, gehaaldeEC  FROM vakken v, cijfer c INNER JOIN ON v.code=c.code WHERE periode = 1 ORDER BY naam DESC";
                        $stmt = $con->prepare ($sql);
                        $stmt->Execute();
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        if($stmt->rowCount() > 0){
                        while($row = $stmt->fetch()){
                        	echo "
                        	<ul>
                        		<li><b>Vak: </b>".$row['naam']."</li>
                            	<li><b>Code: </b>".$row['v.code']."</li>
                            	<li><b>Te behalen EC: </b>".$row['EC']."</li>
                            	<li><b>Cijfer: </b>".$row['cijfer']."</li>
                            	<li><b>Behaalde EC: </b>".$row['gehaaldeEC']."</li>
                            </ul>
