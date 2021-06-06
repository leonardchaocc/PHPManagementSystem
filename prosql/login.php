<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tools.inc.php';
$link=connect();
if(is_login($link) == true){
    skip('index.php', 'error', 'You are already logged in!');
}
if(isset($_POST['login'])){
    include 'admin/inc/check_login.inc.php';
    $_POST = escape($link,$_POST);
    $query = "select * from officer where Officer_Name='{$_POST['username']}' and Officer_Password='{$_POST['password']}'";
    $result = execute($link, $query);
    if(mysqli_num_rows($result)==0){
        skip('login.php', 'error', 'Name or password wrong!');
    }
    else{
        setcookie('TMS[username]', $_POST['username']);
        setcookie('TMS[password]', $_POST['password']);
        skip('index.php', 'ok', 'Login Successfully!');
    }
}
$template['title'] = 'Login';
$template['login'] = 'login';
?>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/footer.inc.php'?>

<div id="main" style="height:1000px;">
    <div class="title">Login</div>
    <form method="post" name="login">
        <label><input type="text" id="username" name="username" placeholder="Your Name"/></label><br>
        <label><input type="password" id="password" name="password" placeholder="password"/></label><br>
        <input type="submit" name="login" value="login" />
    </form>


</div>

