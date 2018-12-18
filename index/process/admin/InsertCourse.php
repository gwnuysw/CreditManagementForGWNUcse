<?php

$name = safety_param($_POST["name"]);
$item = safety_param($_POST["item"]);
$coursecode = safety_param($_POST["coursecode"]);
$period = safety_param($_POST["period"]);
$gaincredit = safety_param($_POST["gaincredit"]);
  
$sql = "INSERT INTO `course` (`coursecode`, `name`, `gaincredit`, `item`, `period`)
     VALUES ('{$coursecode}', '{$name}','{$gaincredit}','{$item}', '{$period}')"; // query문 작성

if ($name && $item && $coursecode && $period && $gaincredit) {

	$result = $db_conn->query($sql);
	if ($result) {
		alert("정상적으로 등록되었습니다.","/admin");
	} else {
		alert("에러 발생!\r\n".$db_conn->error,"/admin");
	}
} else {
	alert("입력을 확인해주세요.","/admin");
}