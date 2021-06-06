<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link = connect();
if(isset($vehicle)){
    $query="SELECT Vehicle_ID from vehicle where Vehicle_ID={$vehicle}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==0){
        skip($_SERVER['HTTP_REFERER'], 'error', 'The vehicle is not in the database, auto navigate to the adding page!');
    }
}

