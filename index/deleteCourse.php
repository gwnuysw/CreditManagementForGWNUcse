<?php
  $coursecode"";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coursecode = test_input($_POST["coursecode"]);
  }

  $sql = "INSERT INTO course (coursecode, name, gaincredit, item, period)
   VALUES ('".$coursecode."', '".$name."','".$gaincredit."','".$item."', '".$period."')"; // query문 작성

  /****************석원*/
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
