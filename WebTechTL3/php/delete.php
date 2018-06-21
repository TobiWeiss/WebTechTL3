<?php

include_once 'db_link.php';

$id = $_POST['button'];
delete_entry($id);

header("Location: http://localhost/WebTechTL3/index.php");
exit;

?>