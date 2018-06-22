<?php
include_once ("php/quotes.php");
include_once ("php/get.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Der Lauftracker</title>
    <meta charset="utf-8">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <!-- Logo: Silk Icons http://www.famfamfam.com/lab/icons/silk/ -->
    <link rel="icon" href="logo.png" type="image/png">

    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <style>
        html {
            overflow-y: scroll;
        }
    </style>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Lauftracking</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Start</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="statistik.php">Statistik</a>
      </li> 
    </ul>
  </div> 
</nav>


    

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
                <input type="number" step="0.1" name="Dauer" class="form-control" id="Dauer" placeholder="Dauer">
                <small id="dauerHilfe" class="form-text text-muted">Einheit: Minuten</small>
            </div>
            <div class="form-group">
                <label for="Distanz">Distanz</label>
                <input type="number" step="0.01" name="Distanz" class="form-control" id="Distanz" placeholder="Distanz">
                <small id="distanzHilfe" class="form-text text-muted">Einheit: Kilometer (km)</small>
            </div>
            <!-- <button id="submit" type="submit" value="submit" class="btn btn-primary">Submit</button> -->
            <input id="submit" type="submit" value="Bestätigen" class="btn btn-primary">
        </form>
    </div>


            
    <div class="container-fluid text-center" style="margin-bottom: 30px;">
        <h2>Bisherige Läufe</h2>
    </div>

        <?php 
        $counter = 0; 
        $datenbank = $data;
        function sortFunction( $a, $b ) {
            return strtotime($b["Datum"]) - strtotime($a["Datum"]);
        }
        usort($datenbank, "sortFunction");
        foreach($datenbank as $zeile){
            if($counter % 2 == 0){
                echo "<div class='row'>";
            }  
            echo "<div class='col-sm-1'> </div>" ;
            echo "<div class='col-sm-4 border border-dark rounded bg-light'>" ;
            echo "<strong>Datum:</strong><br> " .$zeile['Datum'] ."<br>";
            echo "<strong>Dauer: </strong><br>" .$zeile['Dauer']. " Minuten<br>";
            echo "<strong> Distanz: </strong><br>" .$zeile['Distanz'] ." Kilometer<br>";
             if($zeile['Dauer'] != 0){
                 $Tempo = round(($zeile['Distanz']) / ($zeile['Dauer'] / 60), 2);
             }else{
                 $Tempo = 1;
             }
             
            $Geschwindigkeit = round($zeile['Dauer']/$zeile['Distanz'], 2);

            echo "<strong> Geschwindigkeit: </strong><br>" .$Tempo. " km/h - " .$Geschwindigkeit ." Min/km <br>";
            echo "<br>"."<form action=php/delete.php method='post'> <button name='button' value=" .$zeile['ID']. ">  Löschen </button> </form>";
            echo " </div> ";
            echo "<div class='col-sm-1'> </div>" ;

            if($counter % 2 == 1){
                echo "</div> <br>";
            }
            $counter++; 
        }
        ?>

        
<!-- 
        $result = mysqli_query($db_link, "SELECT * FROM Runs"); 
        while($entry = mysqli_fetch_array($result){
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
