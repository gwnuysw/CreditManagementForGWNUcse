<?php

  /****************이건 호영

  $mysql_hostname = "localhost";
  $mysql_user = "root";
  $mysql_password = "apmsetup";
  $mysql_database = "gwnu";


  $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");
  mysql_select_db($mysql_database, $bd) or die("db connect error");
  **********/



  /***************석원**********************/
  //make connection
  $servername = "127.0.0.1"; //맥에서 이렇게 하고 브라우저창의 url 에 "localhost"대신 "127.0.0.1"로 접속해야 접속이 된다.
  //$servername = "localhost"; 우분투에서 이렇게 하고 "localhost"로 그냥 들어가도 된다.
  $username = "root";
  $password = "mysql1q2w3e";

  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  //select database
  $conn->select_db('Creditmanage');
  // return name of current default database
  if ($result = $conn->query("SELECT DATABASE()")) {
  	$row = $result->fetch_row();
  	printf("Default database is %s.\n", $row[0]);
  	$result->close();
  }
?>
