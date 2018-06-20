<?php

include_once 'db_link.php';

        $result = mysqli_query($db_link, "SELECT * FROM Runs"); 
        foreach($entry = mysqli_fetch_array($result){
            echo "<form action="php/delete.php" method="post">
                <div class="row">
                     <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-body"> <p> Datum :' $entry['Datum'] '</p> </div>'
                            '<div class="panel-body"> <p> Distanz :' $entry['Distanz'] '</p> </div>'
                            '<div class="panel-body"> <p> Dauer :' $entry['Dauer'] '</p> </div>'
                            '<div class="panel-body"> <p> Geschwindigkeit:' ($entry['Distanz'] / $entry['Dauer']' </p> </div>
                                <div class="panel-footer">  
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </form>'
        }

header("Location: http://localhost/WebTechTL3-Tobi/index.php");
exit;

?>
