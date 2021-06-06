<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
$template['title'] = 'People';
$template['login'] = 'login';
if(is_login($link) ==true){
    $template['login'] = $_COOKIE['TMS']['username'];
}
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>
<div id="main" style="height:1000px;">
    <div class="title">Type the name or driving license number of the person you want to look up below</div>
    <form method="post" action="people_look_up.php" name="people">
        <input type="radio" id="type" name="type" value="License Number">License Number
        <input type="radio" id="type" name="type" value="Name">Name<br>
        <input type="text" id="People" name="People" "/><span>People's name or driving license</span><br>
        <input type="submit" id="submit" value="submit">
    </form>
    <br>
    <div class="title">Operations</div>
    <a href="people_add.php">Add a person</a>
</div>
