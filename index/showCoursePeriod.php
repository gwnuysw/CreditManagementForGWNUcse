<?php
  $period = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $period = test_input($_POST["period"]);
  }

  $sql = "Select * from course where period='".$period."'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "과목코드 : " . $row["coursecode"]. ", 과목명 : " . $row["name"]. ", 학점 : " . $row["gaincredit"].", 개설학기 : " . $row["period"]."<br>";
    }
  }
  else {
      echo "0 results";
  }
?>
