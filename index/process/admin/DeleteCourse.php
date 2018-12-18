<?php
	$coursecode = safety_param($_POST["coursecode"]);
	echo $coursecode;
	$sql = "SELECT * FROM `course` WHERE `coursecode` = {$coursecode}";
	echo "rows";
	echo $db_conn->query($sql)->num_rows;
//	alert("hey ", "/admin");
	if ($db_conn->query($sql)->num_rows > 0) {
		$sql = "DELETE FROM `course` WHERE `coursecode` = {$coursecode}";
		echo "delete";
		echo $db_conn->query($sql);
		if ($db_conn->query($sql)) {
			echo "if alert";
			alert("정상적으로 삭제되었습니다.","/admin");
		} else{
			echo "error alert";
			alert("에러가 발생하였습니다.".$db_conn->error,"/admin");
		}
	} else {
		alert("존재하지 않는 과목코드 입니다.","/admin");
	}
