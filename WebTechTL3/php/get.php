<?php
/**
 * Created by IntelliJ IDEA.
 * User: tobia
 * Date: 13.06.2018
 * Time: 14:04
 */
include_once 'db_link.php';


$datatable = array();
$datatable = get_all_entries();
$data = array();

    $i = 0;
    while ($rows = mysqli_fetch_assoc($datatable)) {
        $data[$i] = $rows;
        $i++;
}



