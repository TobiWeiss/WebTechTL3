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
<nav>
    <p>Startseite</p>23
    <p><a href="statistik.php">Statistik</a></p>
</nav>

<h2>Hier ist später das Formular</h2>
<form action="php/insert.php" method="post">
    <h2>Feel free to contact us about any issues or questions concerning this website.</h2><br>

    <label for="Datum">Datum</label>
    <input type="date" id="Datum" name="Datum" required autofocus><br>

    <label for="Dauer">Dauer</label>
    <input id="Dauer" name="Dauer" required><br>

    <label for="Distanz">Distanz</label>
    <input id="Distanz" name="Distanz" required><br>

    <input id="submit" type="submit" value="submit">
</form>
<h2>Darunter die bisher eingetragenen Läufe</h2>

</body>
</html>
