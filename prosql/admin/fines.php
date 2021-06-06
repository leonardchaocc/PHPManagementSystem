<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
//var_dump($_COOKIE);exit();
$template['title'] = 'Fines';
$template['login'] = 'login';
if(is_login($link) ==true){
    $template['login'] = $_COOKIE['TMS']['username'];
}
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>

<div id="main" style="height:1000px;">
    <table border="1">
        <tr>
            <th>Fine_ID</th>
            <th>Fine_Amount</th>
            <th>Fine_Points</th>
            <th>Incident_ID</th>
        </tr>
        <br>
        <?php
        if(is_login($link)==true){
            $query='select * from fines';
            $result=execute($link, $query);
            while ($data=mysqli_fetch_assoc($result)){
//            var_dump($data);

                $html = <<<B
            <tr>
                <td>{$data['Fine_ID']}</td>
                <td>{$data['Fine_Amount']}</td>
                <td>{$data['Fine_Points']}</td>
                <td>{$data['Incident_ID']}</td>
            </tr>
B;
                echo $html;
            }
        }
        ?>
    </table>
    <br>
    <li>add a fine (Only Administer)</li>
    <form action="fines_add.php" method="post" name="add a fine (Only Administer)">
        <input type="text" id="Fine_ID" name="Fine_ID" placeholder="Fine_ID"/>
        <input type="text" id="Fine_Amount" name="Fine_Amount" placeholder="Fine_Amount"/>
        <input type="text" id="Fine_Points" name="Fine_Points" placeholder="Fine_Points"/>
        <input type="text" id="Incident_ID" name="Incident_ID" placeholder="Incident_ID"/><br>
        <input type="submit" value="submit" />
    </form>
</div>

