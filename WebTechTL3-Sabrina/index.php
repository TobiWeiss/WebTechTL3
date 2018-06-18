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
                <ul class="navbar-nav">
                    <li class="nav-item text-center"> Lauftracking </li>
                    <li class="nav-item"><a class="nav-link active text-light" href="index.php">Home</a> </li>
                    <li class="nav-item"><a class="nav-link active text-light" <a href="statistik.php">Statistik</a> </li>
                </ul>
            </nav>
        </header>
    

    <div class="height: 75px; container-fluid text-center" style="background-color: #666666; color: white; margin-bottom: 30px;">
        <h3> <? echo $quotes[array_rand($quotes)]; ?> </h3>
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

            <!-- <h2>Hier ist später das Formular</h2>
            <form action="php/insert.php" method="post">
                <h2>Feel free to contact us about any issues or questions concerning this website.</h2><br>

                <label for="Datum">Datum</label>
                <input type="date" id="Datum" name="Datum" required autofocus><br>

                <label for="Dauer">Dauer</label>
                <input id="Dauer" name="Dauer" required><br>

                <label for="Distanz">Distanz</label>
                <input id="Distanz" name="Distanz" required><br>

                <input id="submit" type="submit" value="submit">
            </form> -->
            
    <div class="container-fluid text-center" style="margin-bottom: 30px;">
        <h2>Bisherige Läufe</h2>
    </div>

    </div>
</body>
</html>
