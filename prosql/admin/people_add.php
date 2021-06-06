<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
$template['title'] = 'Officer';
$template['login'] = 'login';
if(is_login($link) ==true){
    $template['login'] = $_COOKIE['TMS']['username'];
}
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>
<div id="main" style="height:1000px;">
    <div class="title">Type the detail of the person  to add below</div>
    <form action="people_add_execute.php" method="post" name="add a person">
        <input type="text" id="People_ID" name="People_ID" placeholder="People_ID"/>
        <input type="text" id="People_name" name="People_name" placeholder="People_name"/>
        <input type="text" id="People_address" name="People_address" placeholder="People_address"/>
        <input type="text" id="People_license" name="People_license" placeholder="People_license"/><br>
        <input type="submit" value="submit" />
    </form>
</div>
