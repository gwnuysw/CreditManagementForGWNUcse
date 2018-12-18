<?php
	$coursecode = safety_param($_POST["coursecode"]);
	$period = safety_param($_POST["period"]);

	$sql = "SELECT * FROM `course` WHERE `coursecode` = '".$coursecode."' and `period` = '".$period."'";

	if ($db_conn->query($sql)->num_rows) {
		$sql = "DELETE FROM `course` WHERE `coursecode` = '".$coursecode."' and `period` = '".$period."'";
		if ($db_conn->query($sql)) {
			alert("정상적으로 삭제되었습니다.","/admin");
		} else {
			alert("에러가 발생하였습니다.\r\b".$db_conn->error,"/admin");
		}
	} else {
		echo $period;
		//alert("존재하지 않는 과목코드 입니다. ","/admin");
	}
