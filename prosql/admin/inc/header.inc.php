<?php

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title><?php echo $template['title'] ?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="style/public.css" />
</head>
<body>
<div id="top">
    <div class="logo">
        Traffic Management System
    </div>
    <div class="login_info">
        <a href="../index.php" style="color:#fff;">Homepage</a>&nbsp;|&nbsp;
        <a href="../login.php"> <?php echo $template['login'] ?></a>
        <a href="../logout.php">[logout]</a>
    </div>
</div>
<div id="sidebar">
    <ul>
        <li><!--  class="current" -->
            <div class="small_title">Management</div>
            <ul class="child">
                <li><a href="fines.php" target="_blank">Fines</a></li>
                <li><a href="officer.php" target="_blank">Officer</a></li>
                <li><a href="incident.php" target="_blank">Incident</a></li>
                <li><a href="people.php" target="_blank">People</a></li>
                <li><a href="vehicle.php" target="_blank">Vehicle</a></li>
            </ul>
        </li>
    </ul>
</div>

