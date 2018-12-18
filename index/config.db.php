<?php


$db_host = "127.0.0.1"; //수정 by 석원
$db_name = "creditmanage";
$db_user = "root";
$db_pass = "mysql1q2w3e"; //내 데이터 베이스 비번

$db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db_conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 세션 charset 변경
$db_conn->query("set session character_set_connection=utf8;");
$db_conn->query("set session character_set_results=utf8;");
$db_conn->query("set session character_set_client=utf8;");
