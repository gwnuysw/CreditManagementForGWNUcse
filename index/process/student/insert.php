<?php

	$selected_period = safety_param($_POST['period']);
	$selected_subjects = $_POST['course'];

	$signuped_subjects = array();
	$test_id = $_SESSION['id'];	// session id

	$query = "DELETE FROM `signuped` WHERE `studentid` = {$test_id} AND `period` = '{$selected_period}'";
	$result = $db_conn->query($query);
	if ($result) {
		if ($selected_subjects) {
			foreach ($selected_subjects as $value) {
				$query = "INSERT INTO `signuped`(`studentid`,`coursecode`,`period`) VALUES('{$test_id}','{$value}','{$selected_period}')";
				$db_conn->query($query);
			}
		}
	}
	alert("작업 완료!", "/student/".$selected_period);
?>
