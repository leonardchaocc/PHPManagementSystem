<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tools.inc.php';
$link=connect();
setcookie('TMS[username]', '');
setcookie('TMS[password]', '');
setcookie('TMS[login]', '');
skip('index.php','ok','Your are logged out!');
?>