<?php
session_start();
// 공통적으로 사용할 변수,함수를 불러온다.
require_once "common.php";

if (!ACTION) {
	// 레이아웃을 분리하여 프론트엔드와 분리
	include "./layout.html";
} else {
	if (file_exists($process_page_path)) {
		include $process_page_path;
	} else {
		// 파일을 찾을 수 없음.
		header("HTTP/1.0 404 Not Found");
	}
}
?>
