<?php

$id = safety_param($_POST['id']);
$pass = safety_param($_POST['password']);

$query = "SELECT `id` FROM `user_info` WHERE `id`='$id' and `pw`='$pass'";
$result = $db_conn->query($query);

if ($result) {
	if ($result->num_rows > 0) {
		$_SESSION['id'] = array();
		if($id == "admin"){
					$_SESSION['id'] = $id;
					alert("","/admin");//로그인 성공시 해당  html페이지를 불러온다.
		}
		else{
			$_SESSION['id'] = $id;
			alert("","/student"); //학생 페이지 불러온다.
		}
	} else {
		alert("로그인 실패","/login");
	}
}
