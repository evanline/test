<html>
    <head>
        <title>Just me, myself and I</title>
        <LINK HREF="dropmaak.css" REL="stylesheet" TYPE="text/css">
    </head>
<?php
    if (isset($_POST['verwijder_definitief'])){
        $verwijderende_vakken = $_POST['te_verwijderen_vak'];
        
        foreach ($verwijderende_vakken as $vak) {
        $sql = "DELETE from vakken where naam = ?";
        $stmt = $con->prepare ($sql);
        $stmt->bind_param('s', $vak);
        $stmt->Execute();
        }
    }

    if (isset($_POST['verwijder_vakken'])){
        $sql = "SELECT distinct naam from vakken";
        $stmt = $con->prepare ($sql);
        $stmt->Execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $vaknamen = $stmt->fetch();

        ?>
        <form method='post' action='vakkenoverzicht.php'>
            <?php foreach ($vaknamen as $naam){?>
                <input type='checkbox' name='te_verwijderen_vak' value='<php $naam ?>'> <?php echo"$naam" ?> </input>
            <?php } ?>
            <input type='submit' name='verwijder_definitief' value='verwijder definitief'>
        </form>
    }


?>
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
        		<H2 class= "titel"> Periode 1</H2>
        		<?php
        			require_once("connection.php");
        			
                                        //SQL voor ophalen informatie
                                        $sql = "SELECT v.vakcode AS v_vakcode, naam, EC, cijfer, gehaaldeEC  FROM vakken AS v  LEFT JOIN cijfer AS c ON 'v.vakcode'='c.vakcode' WHERE periode = 'een' ORDER BY naam DESC";
                        				$stmt = $con->prepare ($sql);
                        				$stmt->Execute();
                        				$stmt->setFetchMode(PDO::FETCH_ASSOC);
                                            
                                            if($stmt->rowCount() > 0){
                        						while($row = $stmt->fetch()){
                        						echo '
                        						<tr>
                        							<td><b>Vak: </b>' . $row['naam'] . '<br></td>
                            						<td><b>Code: </b>' . $row['v_vakcode'] . '<br></td>
                            						<td><b>Te behalen EC: </b>' . $row['EC'] . '<br></td>
                            						<td><b>Cijfer: </b>' . $row['cijfer'] . '<br></td>
                            						<td><b>Behaalde EC: </b>'.$row['gehaaldeEC'].'<br></td>
                            					</td>
                                                <br>
                                                ';
                                            }
                                        }
                                ?>
                                <hr>
        	</div> <!--einde periode1-->
        	<div id= "periode2">
                <H2 class= "titel"> Periode 2</H2>
                <?php
                    require_once("connection.php");
                    
                                        //SQL voor ophalen informatie
                                        $sql = "SELECT v.vakcode AS v_vakcode, naam, EC, cijfer, gehaaldeEC  FROM vakken AS v  LEFT JOIN cijfer AS c ON 'v.code'='c.code' WHERE periode = 'twee' ORDER BY naam DESC";
                                        $stmt = $con->prepare ($sql);
                                        $stmt->Execute();
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                            
                                            if($stmt->rowCount() > 0){
                                                while($row = $stmt->fetch()){
                                                echo '
                                                <tr>
                                                    <td><b>Vak: </b>' . $row['naam'] . '<br></td>
                                                    <td><b>Code: </b>' . $row['v_vakcode'] . '<br></td>
                                                    <td><b>Te behalen EC: </b>' . $row['EC'] . '<br></td>
                                                    <td><b>Cijfer: </b>' . $row['cijfer'] . '<br></td>
                                                    <td><b>Behaalde EC: </b>'.$row['gehaaldeEC'].'<br></td>
                                                </td>
                                                <hr>
                                                ';
                                            }
                                        }
                                ?>
        	</div><!--einde periode2-->
        </div><!--einde wrapper-->
        <div class= "wrapper">
        	<div id= "periode3">
                <?php
                    require_once("connection.php");
                    
                                        //SQL voor ophalen informatie
                                        $sql = "SELECT v.vakcode AS v_vakcode, naam, EC, cijfer, gehaaldeEC  FROM vakken AS v  LEFT JOIN cijfer AS c ON 'v.code'='c.code' WHERE periode = 'drie' ORDER BY naam DESC";
                                        $stmt = $con->prepare ($sql);
                                        $stmt->Execute();
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                            
                                            if($stmt->rowCount() > 0){
                                                while($row = $stmt->fetch()){
                                                echo '
                                                <tr>
                                                    <td><b>Vak: </b>' . $row['naam'] . '<br></td>
                                                    <td><b>Code: </b>' . $row['v_vakcode'] . '<br></td>
                                                    <td><b>Te behalen EC: </b>' . $row['EC'] . '<br></td>
                                                    <td><b>Cijfer: </b>' . $row['cijfer'] . '<br></td>
                                                    <td><b>Behaalde EC: </b>'.$row['gehaaldeEC'].'<br></td>
                                                </td>
                                                <hr>
                                                ';
                                            }
                                        }
                                ?>
        	</div> <!--einde periode3-->
        	<div id= "periode4">
                <?php
                    require_once("connection.php");
                    
                                        //SQL voor ophalen informatie
                                        $sql = "SELECT v.vakcode AS v_vakcode, naam, EC, cijfer, gehaaldeEC  FROM vakken AS v  LEFT JOIN cijfer AS c ON 'v.code'='c.code' WHERE periode = 'vier' ORDER BY naam DESC";
                                        $stmt = $con->prepare ($sql);
                                        $stmt->Execute();
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                            
                                            if($stmt->rowCount() > 0){
                                                while($row = $stmt->fetch()){
                                                echo '
                                                <tr>
                                                    <td><b>Vak: </b>' . $row['naam'] . '<br></td>
                                                    <td><b>Code: </b>' . $row['v_vakcode'] . '<br></td>
                                                    <td><b>Te behalen EC: </b>' . $row['EC'] . '<br></td>
                                                    <td><b>Cijfer: </b>' . $row['cijfer'] . '<br></td>
                                                    <td><b>Behaalde EC: </b>'.$row['gehaaldeEC'].'<br></td>
                                                </td>
                                                <hr>
                                                ';
                                            }
                                        }
                                ?>
        	</div><!--einde periode4-->
        </div><!--einde wrapper2-->
        <input type='submit' name='verwijder_vakken' value='verwijder vakken'>

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
