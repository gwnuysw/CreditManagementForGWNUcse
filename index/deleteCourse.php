<?php
  $coursecode="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coursecode = test_input($_POST["coursecode"]);
  }

  echo $coursecode;
  $sql = "delete from course where coursecode='".$coursecode."'";

  /****************석원*/
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
