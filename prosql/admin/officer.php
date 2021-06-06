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
    <table border="1">
        <tr>
            <th>Officer_Name</th>
            <th>Administrator</th>
        </tr>
        <br>
        <?php
        if(is_login($link)==true){
            $query='select Officer_Name, Administrator from officer';
            $result=execute($link, $query);
            while ($data=mysqli_fetch_assoc($result)){
//            var_dump($data);

                $html = <<<B
            <tr>
                <td>{$data['Officer_Name']}</td>
                <td>{$data['Administrator']}</td>
            </tr>
B;
                echo $html;
            }
        }
        ?>
    </table>
    <br>
    <li>add an officer(Only Administer)</li>
    <form action="officer_add.php" method="post" name="add an officer (Only Administer)">
        <input type="text" id="Officer_Name" name="Officer_Name" placeholder="Officer_Name"/>
        <input type="text" id="Officer_Password" name="Officer_Password" placeholder="Officer_Password"/>
        <input type="text" id="Administrator" name="Administrator" placeholder="Administrator,yes or not"/><br>
        <input type="submit" value="Add" />
    </form>
</div>

