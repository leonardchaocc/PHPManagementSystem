<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tools.inc.php';
$link=connect();
//var_dump($_COOKIE);exit();
$template['title'] = 'TMS';
$template['login'] = 'login';

if(is_login($link) ==true){
    $template['login'] = $_COOKIE['TMS']['username'];
}
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>

<div id="main" style="height:1000px;">
    <div class="title">Click the corresponding item in the left to go to the page</div>
</div>