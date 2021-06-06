<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
$template['title'] = 'Incident';
$template['login'] = 'login';
if(is_login($link) ==true){
    $template['login'] = $_COOKIE['TMS']['username'];
}
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>
<div id="main" style="height:1000px;">
    <div class="title">Type the incident report below</div>
    <form method="post" action="incident_add.php" name="incident_add">
        <input type="text" id="time" name="time" "/><span>Time of the incident, YY-MM-DD</span><br>
        <input type="text" id="vehicle" name="vehicle" "/><span>The vehicle's ID in the incident</span><br>
        <input type="text" id="people" name="people" "/><span>The people's ID in the incident</span><br>
        <input type="text" id="report" name="report" "/><span>The incident report</span><br>
        <input type="text" id="offence" name="offence" "/><span>The offence ID in the incident, reference as follows</span><br>
        <input type="submit" id="submit" value="submit">
    </form>
    <div class="title">Type the incident to be retrived and edited below</div>
    <form method="post" action="incident_modify.php" name="incident_modify">
        <input type="text" id="time" name="time" "/><span>Time of the incident, YY-MM-DD</span><br>
        <input type="text" id="vehicle" name="vehicle" "/><span>The vehicle's ID in the incident</span><br>
        <input type="text" id="people" name="people" "/><span>The people's ID in the incident</span><br>
        <input type="text" id="offence" name="offence" "/><span>The offence ID in the incident, reference as follows</span><br>
        <input type="text" id="report" name="report" "/><span>the new report</span><br>
        <input type="submit" id="submit" value="submit">
    </form>
    <div class="title">Reference of offence as follows</div>
    <table border="1">
        <tr>
            <th>Offence_ID</th>
            <th>Offence_Description</th>
        </tr>
        <br>
        <?php
        if(is_login($link)==true){
            $query='select Offence_ID, Offence_Description from offence';
            $result=execute($link, $query);
            while ($data=mysqli_fetch_assoc($result)){
                $html = <<<B
            <tr>
                <td>{$data['Offence_ID']}</td>
                <td>{$data['Offence_Description']}</td>
            </tr>
B;
                echo $html;
            }
        }
        ?>
    </table>
</div>
