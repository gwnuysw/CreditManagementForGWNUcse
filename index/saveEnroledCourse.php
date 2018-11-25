<?php
$studentid = $coursecode = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $studentid = test_input($_POST["studentid"]);
  $coursecode = test_input($_POST["coursecode"]);
}
$sql = "INSERT INTO signuped (studentid, coursecode)
 VALUES ('".$studentid."', '".$coursecode."')"; // query문 작성


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
