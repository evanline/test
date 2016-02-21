
<!DOCTYPE html>
<html>
    <head>
     <?php include 'head.php';?>
    </head>

    <body> 
        <header>
            <?php include 'header.php'; ?>
        </header>

        <div class="info">
                            <div id="central" name= "Nieuws">
                                <a href = "Nieuws.php?gb=true">Nieuw bericht</a>
                                <hr>
                                <?php
                                //connectie aanroepen
                                require_once("connection.php");
                                if (isset($_GET['gb'])){
                                    //invullen informatie
                                    echo"
                                    <form action = '' method = 'POST'>
                                    Titel:<br>
                                    <input type= 'text' name = 'titel'><br>
                                    Bericht:<br>
                                    <textarea cols= '40' rows= '3' name= 'bericht'></textarea><br>
                                    <input type= 'submit' name= 'submitBtn'>
                                    </form>
                                    ";
                                    if(isset($_POST['submitBtn'])){
                                        //variabelen definieren
                                        $titel = $_POST['titel'];
                                        $bericht = $_POST['bericht'];
                                        //sql voor plaatsen
                                        $sql = "INSERT INTO nieuws(titel, bericht) VALUES ('$titel', '$bericht')";
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute();
                                        echo "Uw nieuwsbericht is geplaatst.";
                                    }
                                    }else{
                                        //SQL voor ophalen nieuws
                                        $sql = "SELECT * FROM nieuws ORDER BY datum DESC";
                                        $stmt = $con->prepare ($sql);
                                        $stmt->Execute();
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        if($stmt->rowCount() > 0){
                                            while($row = $stmt->fetch()){
                                                //hieronder volgt het bericht en poging tot verwijderknop
                                                    echo '<tr>
                                                    <td><b>Titel: </b>' . $row['titel'] . '<br></td>
                                                    <td><b>Date: </b>' . $row['datum'] . '<br></td>
                                                    <td><b>Bericht:</b><br>' . $row['bericht'] . '</td>
                                                    <td class="" id=""></td>
                                                    <td class="delete">
                                                        <form action="delete.php?name=' .  $row['datum'] . '" method="post">
                                                        <input type="hidden" name="datum" value="' . $row['datum'] . '">
                                                            <button type="submit" name="submit">
                                                                <i class="fa fa-trash fa-lg"></i>
                                                            </button>
                                                            <hr>
                                                        </form>
                                                    </td>

                                                    </tr>';
                                                
                                            }
                                        }
                                    };

                                    
                                    function get_paging_info($tot_rows,$pp,$curr_page)
                                        {
                                            $pages = ceil($tot_rows / $pp); // calc pages

                                            $data = array(); // start out array
                                            $data['si']        = ($curr_page * $pp) - $pp; // what row to start at
                                            $data['pages']     = $pages;                   // add the pages
                                            $data['curr_page'] = $curr_page;               // Whats the current page

                                            return $data; //return the paging data

                                        }
                                       // include 'paginanummering.php';
                                    ?>


                            </div><!--Closing "central"/Div 3-->
        </div>
    </body>
</html>
