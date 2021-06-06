<?php 
function skip($url,$pic,$message){
$html=<<<A
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="3;URL={$url}" />
<title>redirecting...</title>
<link rel="stylesheet" type="text/css" href="style/remind.css" />
</head>
<body>
<div class="notice"><span class="pic {$pic}"></span> {$message} <a href="{$url}">Auto navigate after 3 seconds!</a></div>
</body>
</html>
A;
echo $html;
exit();
}
function is_login($link){
	if(isset($_COOKIE['TMS']['username']) && isset($_COOKIE['TMS']['password'])){
		$query="select * from officer where Officer_Name='{$_COOKIE['TMS']['username']}' and Officer_Password='{$_COOKIE['TMS']['password']}'";
		$result=execute($link,$query);
		if(mysqli_num_rows($result)==1){
			$data=mysqli_fetch_assoc($result);
			setcookie('TMS[admin]', $data['Administrator']);
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
?>