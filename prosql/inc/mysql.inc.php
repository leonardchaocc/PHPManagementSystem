<?php
function connect($host=DB_HOST,$user=DB_USER,$password=DB_PASSWORD,$database=DB_DATABASE,$port=DB_PORT){
	$link=@mysqli_connect($host, $user, $password, $database, $port);
	if(mysqli_connect_errno()){
		exit(mysqli_connect_error());
	}
	mysqli_set_charset($link,'utf8');
	return $link;
}
function execute($link,$query){
	$result=mysqli_query($link,$query);
	if(mysqli_errno($link)){
		$result = 'Execution Failed!';
	}
	return $result;
}
function escape($link,$data){
	if(is_string($data)){
		return mysqli_real_escape_string($link,$data);
	}
	if(is_array($data)){
		foreach ($data as $key=>$val){
			$data[$key]=escape($link,$val);
		}
	}
	return $data;
	//mysqli_real_escape_string($link,$data);
}
function close($link){
	mysqli_close($link);
}
?>