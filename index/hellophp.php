<?php
//내경우 로그인 아이디는 admin 비번은 1234
	session_start();
//header('Content-Type: text/html; charset=UTF-8');
	include("databaseInit.php");

  $id = "";
  $pw = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = test_input($_POST["id"]);
    $pw = test_input($_POST["password"]);
	}
	$sql="SELECT id FROM user_info WHERE userid='$id' and pw='$pw'";
  /*$result=mysql_query($sql);

	$count=mysql_num_rows($result);
	 if($count == 1)
    {
        $_SESSION['userid']=$id;
        header("Location:./adminselect.html", true, 301);
    }
    else
    {
        echo "<script>alert(\"아이디 또는 비밀번호를 잘못 입력하셨습니다.\");
		window.location.href='./login.html';</script>";
    }
  }*/

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
	if (mysqli_query($conn, $sql)) {
		$_SESSION['userid']=$id;
		header("Location:./adminselect.html", true, 301);
  } else {
		echo "<script>alert(\"아이디 또는 비밀번호를 잘못 입력하셨습니다.\");
window.location.href='./login.html';</script>";
  }
?>
