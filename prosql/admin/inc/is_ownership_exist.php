<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link = connect();
if(isset($vehicle)&&isset($people)){
    $query="SELECT * from ownership where Vehicle_ID={$vehicle} and People_ID={$people}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==0){
        skip($_SERVER['HTTP_REFERER'], 'error', 'The person does not own the vehicle, auto navigate to the adding page!');
    }
}

