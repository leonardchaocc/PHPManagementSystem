<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
include_once '../inc/config.inc.php';
$link=connect();
if(is_login($link)==false){
    skip('../login.php', 'error', 'You are not logged in!');
}
if(!isset($_POST['People_ID'])||!isset($_POST['People_name'])||!isset($_POST['People_address'])||!isset($_POST['People_license'])){
    skip('people_add.php', 'error', 'Adding failed! Please give full input and retry!!');
}
$id=$_POST['People_ID'];
$name=$_POST['People_name'];
$addr=$_POST['People_address'];
$license=$_POST['People_license'];
$query="INSERT INTO people (People_ID, People_name, People_address, People_licence) VALUES ({$id}, '{$name}', '{$addr}', '{$license}')";
execute($link,$query);
?>
<div id="main" style="height:1000px;">
    <?php
    if (mysqli_affected_rows($link)==1){
        skip('people_add.php', 'ok', 'Added to the database successfully!');
    }
    else{
        skip('people_add.php', 'error', 'Adding failed! Please check your input and retry!!');
    }
    ?>
</div>

