<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link=connect();
if(is_login($link)==false){
    skip('../login.php', 'error', 'You are not logged in!');
}
if(!isset($_POST['Vehicle_ID'])||!is_numeric($_POST['Vehicle_ID'])){
    skip('vehicle.php', 'error', 'Adding failed! Illegal input!');
}
$id=$_POST['Vehicle_ID'];
$type=$_POST['Vehicle_type'];
$colour=$_POST['Vehicle_colour'];
$license=$_POST['Vehicle_license'];
$people=$_POST['Vehicle_owner'];
include 'inc/is_people_exist.php';
$query="INSERT INTO vehicle (Vehicle_ID, Vehicle_type, Vehicle_colour, Vehicle_licence, Vehicle_owner) VALUES ({$id}, '{$type}', '{$colour}', '{$license}', {$people})";
execute($link, $query);
include 'ownership_add.php';
?>
<div id="main" style="height:1000px;">
    <?php
    if (mysqli_affected_rows($link)==1){
        skip('vehicle.php', 'ok', 'Added to the database successfully!');
    }
    else{
        skip('vehicle.php', 'error', 'Adding failed! Please check and retry!!');
    }
    ?>
</div>

