<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
$template['title'] = 'Vehicle';
$template['login'] = 'login';
if(is_login($link) ==true){
    $template['login'] = $_COOKIE['TMS']['username'];
}
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>
<div id="main" style="height:1000px;">
    <div class="title">Enter the vehicle's'ID to look up</div>
    <form method="post" action="vehicle_look_up.php" name="lookup">
        <input type="text" id="vehicle" name="Vehicle_ID" placeholder="Vehicle's ID"/><br>
        <input type="submit" id="submit_look" value="look up">
    </form>
    <div class="title">Add a Vehicle's detail to the database</div>
    <form method="post" action="vehicle_add.php" name="add">
        <input type="text" id="Vehicle_ID" name="Vehicle_ID" placeholder="Vehicle_ID"/>
        <input type="text" id="Vehicle_type" name="Vehicle_type" placeholder="Vehicle_type"/>
        <input type="text" id="Vehicle_colour" name="Vehicle_colour" placeholder="Vehicle_colour"/>
        <input type="text" id="Vehicle_license" name="Vehicle_license" placeholder="Vehicle_license"/>
        <input type="text" id="Vehicle_owner" name="Vehicle_owner" placeholder="Vehicle_owner"/><br>
        <input type="submit" id="submit_add" value="add" />
    </form>
</div>