<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link = connect();
if(isset($people)){
    $query="SELECT People_ID from people where PEOPLE_ID={$people}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==0){
        skip($_SERVER['HTTP_REFERER'], 'error', 'The person is not in the database, auto navigate to the adding page!');
    }
}

