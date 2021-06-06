<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link=connect();
if(is_login($link)==false){
    skip('../login.php', 'error', 'You are not logged in!');
}
if($_COOKIE['TMS']['admin']!='yes'){
    skip('fines.php', 'error', 'You are not authorized!');
}
if(!isset($_POST['Officer_Name'])||!isset($_POST['Officer_Password'])){
    skip('officer.php', 'error', 'Adding failed! Please give full input and retry!!');
}
$name=$_POST['Officer_Name'];
$password=$_POST['Officer_Password'];
$admin=$_POST['Administrator'];
$query="INSERT INTO officer (Officer_Name, Officer_Password, Administrator) VALUES ($name, $password, $admin)";
execute($link,$query);
?>
<div id="main" style="height:1000px;">
    <?php
    if (mysqli_affected_rows($link)==1){
        skip('officer.php', 'ok', 'Added to the database successfully!');
    }
    else{
        skip('officer.php', 'error', 'Adding failed! Please check your input and retry!!');
    }
    ?>
</div>

