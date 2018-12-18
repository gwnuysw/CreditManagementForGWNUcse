<?php

$id = safety_param($_POST['id']);
$pass = safety_param($_POST['password']);

$query = "SELECT `id` FROM `user_info` WHERE `userid`='$id' and `pw`='$pass'";
$result = $db_conn->query($query);

if ($result) {
	if ($result->num_rows > 0) {
		
		$_SESSION['id'] = $id;
		alert("","/admin");
	} else {
		alert("로그인 실패","/login");
	}
}
