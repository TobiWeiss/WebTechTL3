<?php
include_once ("php/quotes.php");
include_once ("php/db_link.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Der Lauftracker</title>
    <meta charset="utf-8">

    <!-- Logo: Silk Icons http://www.famfamfam.com/lab/icons/silk/ -->
    <link rel="icon" href="logo.png" type="image/png">

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <style>
        html {
            overflow-y: scroll;
        }
    </style>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <header class="clearfix">
            <nav class="navbar navbar-expand-sm navbar-light bg-dark my-pagination-margin text-light">
                <li class="navbar-brand text-center text-light "> Lauftracking </li>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active text-light" href="index.php">Home</a> </li>
                    <li class="nav-item"><a class="nav-link active text-light" <a href="statistik.php">Statistik</a> </li>
                </ul>
            </nav>
        </header>
    

    <div class="height: 75px; container-fluid text-center" style="background-color: #666666; color: white; margin-bottom: 30px;">
        <h3> <?php echo $quotes[array_rand($quotes)] ?> </h3>
    </div>


    <div class="container-fluid text-center" style="margin-bottom: 30px;">
        <h2>Neuen Lauf eintragen</h2>
    </div>

    <div class="container" style="margin-bottom: 30px;">    
        <form action="php/insert.php" method="post">
            <div class="form-group">
                <label for="Datum">Datum</label>
                <input type="date" name="Datum" class="form-control" id="Datum" placeholder="tt.mm.jjjj">
            </div>
            <div class="form-group">
                <label for="Dauer">Dauer</label>
                <input type="number" name="Dauer" class="form-control" id="Dauer" placeholder="Dauer">
                <small id="dauerHilfe" class="form-text text-muted">Einheit: Minuten</small>
            </div>
            <div class="form-group">
                <label for="Distanz">Distanz</label>
                <input type="number" name="Distanz" class="form-control" id="Distanz" placeholder="Distanz">
                <small id="distanzHilfe" class="form-text text-muted">Einheit: Kilometer (km)</small>
            </div>
            <!-- <button id="submit" type="submit" value="submit" class="btn btn-primary">Submit</button> -->
            <input id="submit" type="submit" value="submit">
        </form>
    </div>
            
    <div class="container-fluid text-center" style="margin-bottom: 30px;">
        <h2>Bisherige Läufe</h2>

        <?php 
        $datenbank = get_all_entries(); 
        foreach($datenbank as $run){
            echo "<div class = 'row'>";
            echo "<div class='col-sm-6'>";
            echo "<p> <strong>Datum:</strong><br> " .$run['Datum'] ."</p><br>";
            echo "<p> <strong>Dauer: </strong><br>" .$run['Dauer']. "</p><br>";
            echo "<p> <strong> Distanz: </strong><br>" .$run['Distanz'] ."</p><br></div></div>";
            echo "<form action=php/delete.php method='post'> <button name='button' value=" .$run['ID']. "> Delete </button> </form>";
            // if($run['Dauer'] != 0){
            //     $Geschwindigkeit = $run['Distanz'] / $run['Dauer']; 
            // }else{
            //     $Geschwindigkeit = 0;
            // }
            // echo "<p> Geschwindigkeit: " .$run['Geschwindigkeit'] ."</p><br></div></div>";
        }
        ?>
        
<!-- 
        $result = mysqli_query($db_link, "SELECT * FROM Runs"); 
        while($entry = mysqli_fetch_array($result){
            <form action="php/get_entries.php" method="post">
                <div class="row">
                     <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-body"> <p> Datum : $entry['Datum'] </p> </div>
                            <div class="panel-body"> <p> Distanz : $entry['Distanz'] </p> </div>
                            <div class="panel-body"> <p> Dauer : $entry['Dauer'] </p> </div>
                            <div class="panel-body"> <p> Geschwindigkeit: ($entry['Distanz'] / $entry['Dauer'] </p> </div>
                                <div class="panel-footer">  
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </form>
        }
    </div>
        <!-- for each --- access each entry in database 
            -- put in array 

        use form -- with php/delete.php (have delete button on each field) -->

    </div> 

    </div>
</body>
</html>
