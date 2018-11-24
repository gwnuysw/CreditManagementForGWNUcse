<?php
//insert tuple
  $name = $item = $coursecode = $period = $gaincredit = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = test_input($_POST["item"]);
    $credit = test_input($_POST["credit"]);
  }
  $sql = "INSERT INTO graduation (item, credit)
   VALUES ('".$item."', '".$credit."')"; // query문 작성


  /****************여기서부터 호영이가 작성한 방식*********
  $result=mysql_query($sql); // query문 실행

  if($result == false) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    echo "New record created successfully";
  }**************/

  /****************여기서부터 내가 작성한 방식*/
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
 ?>
