//insert tuple
<?php
  $name = $item = $coursecode = $period = $gaincredit = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $item = test_input($_POST["item"]);
    $coursecode = test_input($_POST["coursecode"]);
    $period = test_input($_POST["period"]);
    $gaincredit = test_input($_POST["gaincredit"]);
  }

  $sql = "INSERT INTO course (coursecode, name, gaincredit, item, period)
   VALUES ('".$coursecode."', '".$name."','".$gaincredit."','".$item."', '".$period."')"; // query문 작성

  /****************여기서부터 호영
  $result=mysql_query($sql); // query문 실행

  if($result == false) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  else {
    echo "New record created successfully";
  }
  *************************/

  /****************석원*/
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
