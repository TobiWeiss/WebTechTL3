<?php

include_once 'db_link.php';

$Datum = mysqli_real_escape_string($db_link, $_POST['Datum']);
$Dauer = mysqli_real_escape_string($db_link, $_POST['Dauer']);
$Distanz = mysqli_real_escape_string($db_link, $_POST['Distanz']);

delete_entry($Datum, $Dauer, $Distanz);

header("Location: http://localhost/WebTechTL3-Tobi/index.php");
exit;

?>