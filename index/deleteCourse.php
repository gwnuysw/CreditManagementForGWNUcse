<?php
  $coursecode=$period="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coursecode = test_input($_POST["coursecode"]);
    $period = test_input($_POST["period"]);
  }

  echo $coursecode;
  $sql = "delete from course where coursecode='".$coursecode."' and period='".$period."'";

  /****************석원*/
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
