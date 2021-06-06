<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
if(is_login($link)==false){
    skip('../login.php', 'error', 'You are not logged in!');
}
if(!isset($_POST['Vehicle_ID'])){
    skip('vehicle.php', 'error', 'Look up failed! Please give full input and retry!');
}
$template['title'] = 'Vehicle';
$template['login'] = 'login';
if(is_login($link) ==true){
    $template['login'] = $_COOKIE['TMS']['username'];
}
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>
<div id="main" style="height:1000px;">
    <div class="title">Look up result</div>
    <?php
    $param = $_POST['Vehicle_ID'];
    $query="select * from vehicle where Vehicle_ID='{$param}'";
    $result = execute($link,$query);
    if(mysqli_affected_rows($link)==0){
        skip('vehicle.php','error','Look up failed! No such vehicle in database!');
    }
    $htmlt = <<<A
<table border="1">
        <tr>
            <th>Vehicle_ID</th>
            <th>Vehicle_type</th>
            <th>Vehicle_colour</th>
            <th>Vehicle_license</th>
            <th>Vehicle_owner</th>
        </tr>
        <br>
A;
    echo $htmlt;
    while($data = mysqli_fetch_assoc($result)){
        $html = <<<B
<tr>
    <td>{$data['Vehicle_ID']}</td>
    <td>{$data['Vehicle_type']}</td>
    <td>{$data['Vehicle_colour']}</td>
    <td>{$data['Vehicle_licence']}</td>
    <td>{$data['Vehicle_owner']}</td>
</tr>
</table>
B;
        echo $html;
    }
    ?>
    <a href="vehicle.php">Back</a>
</div>


