<?php
  $id = "";
  $pw = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = test_input($_POST["id"]);
    $pw = test_input($_POST["password"]);
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if($id == "admin" && $pw == 1234){
    header("Location:http://localhost/admin.html", true, 301);
    exit();
  }
?>
