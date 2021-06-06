<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link=connect();
if(is_login($link)==false){
    skip('../login.php', 'error', 'You are not logged in!');
}
if(!isset($_POST['vehicle'])||!is_numeric($_POST['vehicle'])||!isset($_POST['people'])||!is_numeric($_POST['people'])){
    skip('incident.php', 'error', 'Editing failed! Illegal input!');
}
$vehicle=$_POST['vehicle'];
$people=$_POST['people'];
$time=$_POST['time'];
$report=$_POST['report'];
$offence=$_POST['offence'];
$query="UPDATE incident set Incident_report='{$report}' where DATE(Incident_date)='{$time}' and Vehicle_ID={$vehicle} and People_ID={$people} and Offence_ID={$offence}";
execute($link, $query);
?>
<div id="main" style="height:1000px;">
    <?php
    if (mysqli_affected_rows($link)==1){
        skip('incident.php', 'ok', 'Edited successfully!');
    }
    else{
        skip('incident.php', 'error', 'Editing failed! Please check and retry!!');
    }
    ?>
</div>

