<?php

// DB 초기화 파일을 1번만 가져온다.
require_once "config.db.php";
error_reporting(E_ALL & ~E_NOTICE);


// 페이지 분기처리를 위하여 파라메터를 가져옴
$page = $_GET['page'];
if (empty($page)) {
	// 파라메터 정보가 없을경우 'home'이 기본설정 한다
	$page = "home";
}

define("PAGE",$page);
define("IDX",safety_param($_GET['idx']));
define("ACTION",safety_param($_GET['act']));

$process_page_path = "process/".PAGE."/".ACTION.".php";


/* 공통함수 모음 */
function get_value_from_array($arr, $index) {
	$i = 0;
	foreach ($arr as $value) {
		if ($index == $i) {
			return $value;
		}
		$i++;
	}
	return null;
}

function get_key_from_array($arr, $index) {
	$i = 0;
	foreach ($arr as $key => $value) {
		if ($index == $i) {
			return $key;
		}
		$i++;
	}
	return null;
}

function login_check($user,$pass) {
	global $db_conn;

	$user = safety_param($user);
	$pass = safety_param($pass);

	// 괄호안에는 변수 리터럴을 반영한다.
	$sql = "SELECT * FROM `user_info` WHERE `userid` = '[$user]' AND `pw` = '[$pass]'";
	$result = $db_conn->query($sql);

	return $result->num_rows;

}

function isLoggedIn() {
	return $_SESSION['id'];
}


// SQL 인젝션 방지를 위해 파라메터를 안전하게 가져옴.
function safety_param($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// period 파싱
function parse_period($str) {
	$list = explode('-',$str);
	return $list[0]."년도 ".$list[1]."학기";
}


function get_period_array($sort = '') {
	global $db_conn; // 함수내 전역변수 사용시 global을 선언한다.

	$arr = array();
	$sql = "SELECT DISTINCT `period` FROM `course`";
	if ($sort) {
		$sql.= "ORDER BY `period` ".$sort;
	}
	$result = $db_conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$arr[$row["period"]] = parse_period($row["period"]);
		}
	}
	return $arr;

}

function get_signuped_array($id, $period) {
	global $db_conn;

	$id = safety_param($id);
	$period = safety_param($period);

	$signupedA = array();
	$sql = "SELECT `coursecode`, `period` FROM `signuped` WHERE `studentid` = '{$id}' AND `period` = '{$period}'";
	$result = $db_conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($signupedA, $row["coursecode"]);
		}
	}

	return $signupedA;
}

function get_course_by_period($period) {
	global $db_conn;

	$period = safety_param($period);

	$arr = array();
	$sql = "SELECT * FROM `course` WHERE `period` = '{$period}' ORDER BY `item` desc";
	$result = $db_conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($arr,$row);
		}
	}
	return $arr;
}

function alert($msg='', $url = '') {

	echo "<script>"; // script start
	if($msg) {
		echo "alert('{$msg}');"; // 팝업메시지
	}
	if ($url) {
		echo "window.location.replace('{$url}');";
	}

	echo "</script>"; // script end
}

function print_var($object) {
	echo "<pre>";
	print_r($object);
	echo "</pre>";
}

function print_course_items($type) {
	global $db_conn;

	$type = safety_param($type);

	$sql = "SELECT * FROM `course` WHERE `item` = '{$type}'";
	$result = $db_conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "과목코드 : " . $row["coursecode"]. ", 과목명 : " . $row["name"]. ", 학점 : " . $row["gaincredit"].", 개설학기 : " . $row["period"]."<br>";
		}
	}
	else {
		echo "0 results";
	}
}

function get_graduation($admission) {
	global $db_conn;

	$sql = "SELECT * FROM `graduation` WHERE `graduation` = ".$admission."";
	$result = $db_conn->query($sql);

	//return $result->fetch_assoc();
	$val = $result->fetch_assoc();
	return array($val["basic_m"], $val["elective_m"], $val["essential_m"], $val["elective_c"]);
}

function get_completed_graduation($studentid) {
	global $db_conn;

	$signed = array();
	$sql = "SELECT * FROM `signuped` WHERE `studentid` = '".$studentid."'";
	$result = $db_conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$signed[$row["coursecode"]] = $row["period"];
		}
	}

	//list($basic_m, $elective_m, $essential_m,  $elective_c) = get_graduation(2016);
	$basic_m = 0;
	$elective_m = 0;
	$essential_m = 0;
	$elective_c = 0;
	foreach($signed as $c => $p) {
		$sql = "SELECT `gaincredit`, `item` FROM `course` WHERE `coursecode` = '".$c."' AND `period` = '".$p."'";
		$result = $db_conn->query($sql);
		$row = $result->fetch_assoc();


		if($row["item"] == "전공기초") {
			$basic_m += $row["gaincredit"];
		} else if($row["item"] == "전공선택") {
			$elective_m += $row["gaincredit"];
		} else if($row["item"] == "전공필수") {
			$essential_m += $row["gaincredit"];
		} else if($row["item"] == "교양") {
			$elective_c += $row["gaincredit"];
		}
	}

	return array($basic_m, $elective_m, $essential_m,  $elective_c);
}
