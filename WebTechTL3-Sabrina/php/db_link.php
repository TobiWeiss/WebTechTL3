<?php
// database connection information
$db_host = "localhost";
$db_name = "BornToRun";
$db_user = "root";
$db_password = "";

$db_table = "Runs";

// establish database connection
$db_link = mysqli_connect($db_host, $db_user, $db_password) or die('Verbindung nicht möglich : ' . mysqli_connect_error());

// create database
$create_database_sql = "CREATE DATABASE IF NOT EXISTS " . $db_name;
mysqli_query($db_link, $create_database_sql) or die('Erstellen der Datenbank nicht möglich : ' . mysqli_error($db_link));
mysqli_select_db($db_link, $db_name) or die('Benutzung der Datenbank '. $db_name . ' nicht möglich: ' . mysqli_error($db_link));

function get_all_entries() {
    global $db_link;
    $result = array();
    $sql = "SELECT * FROM Runs;";
    $stmt = mysqli_stmt_init($db_link);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    } else {
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
    }
    return $result;
}

function add_entry($input_date, $input_duration, $input_distance) {
    global $db_link;
    $sql = "INSERT INTO Runs (Datum, Dauer, Distanz) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($db_link);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    } else {
        mysqli_stmt_bind_param($stmt, "sid", $input_date, $input_duration, $input_distance);
        mysqli_stmt_execute($stmt);
    }
}

function delete_entry($entry_id) {
    global $db_link; 

    $sql = "DELETE FROM Runs WHERE ID = ?";
    $stmt = mysqli_stmt_init($db_link); 
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    } else {
        mysqli_stmt_execute($stmt);
    }

}

function ensure_table_exists() {
    global $db_link, $db_table;

    $create_run_table = "CREATE TABLE IF NOT EXISTS `" . $db_table . "`
    (ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Datum DATE NOT NULL,
    Dauer INT NOT NULL,    
    Distanz FLOAT NOT NULL
    )";
  
    mysqli_query($db_link, $create_run_table) or die('Erstellen der Datenbanktabelle nicht möglich : ' . mysqli_error($db_link));
}

function reset_table() {

}

