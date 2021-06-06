<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link=connect();
if(is_login($link)==false){
    skip('../login.php', 'error', 'You are not logged in!');
}
if(!isset($_POST['vehicle'])||!is_numeric($_POST['vehicle'])||!isset($_POST['people'])||!is_numeric($_POST['people'])){
    skip('incident.php', 'error', 'Adding failed! Illegal input!');
}
$vehicle=$_POST['vehicle'];
$people=$_POST['people'];
$time=$_POST['time'];
$report=$_POST['report'];
$offence=$_POST['offence'];
include 'inc/is_people_exist.php';
include 'inc/is_vehicle_exist.php';
include 'inc/is_ownership_exist.php';
$query="INSERT INTO incident (Vehicle_ID, People_ID, Incident_date, Incident_report, Offence_ID) VALUES ({$vehicle}, {$people}, '{$time}', '{$report}', {$offence})";
execute($link, $query);
?>
<div id="main" style="height:1000px;">
    <?php
    if (mysqli_affected_rows($link)==1){
        skip('incident.php', 'ok', 'Added to the database successfully!');
    }
    else{
        skip('incident.php', 'error', 'Adding failed! Please check and retry!!');
    }
    ?>
</div>

