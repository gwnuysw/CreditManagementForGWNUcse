<?php

$graduation = safety_param($_POST["graduation"]);
$elective_c = safety_param($_POST["elective_c"]);
$elective_m = safety_param($_POST["elective_m"]);
$basic_m = safety_param($_POST["basic_m"]);
$essential_m = safety_param($_POST["essential_m"]);


$sql = "INSERT INTO `graduation` (`graduation`, `elective_c`, `basic_m`, `elective_m`, `essential_m`)
   VALUES ({$graduation}, {$elective_c}, {$basic_m}, {$elective_m}, {$essential_m})"; // query문 작성
$result = $db_conn->query($sql);
if ($result) {
	alert("정상적으로 등록되었습니다.","/admin");
} else {
	alert("에러 발생!".$db_conn->error,"/admin");
}