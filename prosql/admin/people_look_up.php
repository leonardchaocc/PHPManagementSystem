<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
if(is_login($link)==false){
    skip('../login.php', 'error', 'You are not logged in!');
}
if(!isset($_POST['People'])||!isset($_POST['type'])){
    skip('people.php', 'error', 'Look up failed! Please give full input and retry!');
}
$template['title'] = 'People';
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
        $param = $_POST['People'];
        $type = $_POST['type'];
//        var_dump($param);
//        var_dump($type);
        $query1="select * from people where People_licence='{$param}'";
        $query2="select * from people where People_name like '%{$param}%'";
        if($type=='Name'){
            $query = $query2;
        }
        else{
            $query = $query1;
        }
        $result = execute($link,$query);
        if(mysqli_affected_rows($link)==0){
            skip('people.php','error','Look up failed! No such person in database!');
        }
        ?>
<table border="1">
        <tr>
            <th>People_ID</th>
            <th>People_name</th>
            <th>People_address</th>
            <th>People_license</th>
        </tr>
        <br>
        <?php
        while($data = mysqli_fetch_assoc($result)){
            $html = <<<B
<tr>
    <td>{$data['People_ID']}</td>
    <td>{$data['People_name']}</td>
    <td>{$data['People_address']}</td>
    <td>{$data['People_licence']}</td>
</tr>
B;
            echo $html;
        }
        ?>
    </table>
    <a href="people.php">Back</a>
</div>


