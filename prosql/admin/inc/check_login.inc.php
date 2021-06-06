<?php
$link = connect();
if(empty($_POST['username'])){
    skip('login.php', 'error', 'The name could not be empty!');
}
if(empty($_POST['password'])){
    skip('login.php', 'error', 'The password could not be empty!');
}


?>