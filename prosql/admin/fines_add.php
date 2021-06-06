<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
if($_COOKIE['TMS']['admin']!='yes'){
    skip('fines.php', 'error', 'You are not authorized!');
}
if(!isset($_POST['Fine_ID'])||!is_numeric($_POST['Fine_ID'])){
        skip('fines.php', 'error', 'Adding failed! Please give full input and retry!!');
}
$link=connect();
$id=$_POST['Fine_ID'];
$amount=$_POST['Fine_Amount'];
$points=$_POST['Fine_Points'];
$incident=$_POST['Incident_ID'];
$query="INSERT INTO fines (Fine_ID, Fine_Amount, Fine_Points, Incident_ID) VALUES ($id, $amount, $points, $incident)";
execute($link,$query);
?>
<div id="main" style="height:1000px;">
    <?php
    if (mysqli_affected_rows($link)==1){
        skip('fines.php', 'ok', 'Added to the database successfully!');
    }
    else{
        skip('fines.php', 'error', 'Adding failed! Please check your input and retry!!');
    }
    ?>
</div>

