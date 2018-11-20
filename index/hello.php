<?php

//$servername = "127.0.0.1"; 맥에서 이렇게 하고 브라우저창의 url 에 "localhost"대신 "127.0.0.1"로 접속해야 접속이 된다.
$servername = "localhost"; //우분투에서 이렇게 하고 "localhost"로 그냥 들어가도 된다.
$username = "root";
$password = "mysql1q2w3e";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
