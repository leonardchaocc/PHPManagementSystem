<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link = connect();
if(isset($owner) && isset($id)){
    $query="insert into ownership (People_ID, Vehicle_ID) VALUES ({$owner}, {$id})";
    execute($link, $query);
}