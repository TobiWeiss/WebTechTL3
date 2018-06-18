<?php
include_once ("php/db_link.php");
include_once ("php/get.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Der Lauftracker</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  
    <!-- Logo: Silk Icons http://www.famfamfam.com/lab/icons/silk/ -->
    <link rel="icon" href="logo.png" type="image/png">

    <style>
        html {
            overflow-y: scroll;
        }
    </style>

    <script>
        var all_data = JSON.parse('<?php echo json_encode($data)?>');
    </script>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/d3.v4.js"></script>
    <script type="text/javascript" src="js/mychart.js"></script>
</head>

<body>
<div class="container">
        <header class="clearfix">
            <nav class="navbar navbar-expand-sm navbar-light bg-dark my-pagination-margin text-light" style="margin-bottom: 30px;">
                <ul class="navbar-nav">
                    <li class="nav-item"> Lauftracking </li> <br></br>
                    <li class="nav-item"><a class="nav-link active text-light" href="index.php">Home</a> </li>
                    <li class="nav-item"><a class="nav-link active text-light" href="statistik.php">Statistik</a> </li>
                </ul>
            </nav>
        </header>

<div class="container-fluid text-center" style="margin-bottom: 30px;">
        <h2>Scatterplot</h2>
</div>

<div class="container">
    <div class="row  justify-content-around">
        <div class="col-sm-12 col-md-8">
            
            <div id="chart_container">
                <svg class="border border-danger" preserveAspectRatio="xMinYMin" viewBox="0 0 500 500" id="chart"></svg>
            <div>
        </div>
    </div>
</div>
</body>
</html>