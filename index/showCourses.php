<?php

  echo "
  <form action = './adminselect.html' accept-charset='utf-8' name = 'admin_sub' method = 'post' id='CourseInsertion'>
    <fieldset style='width:800'>
    <legend><font size = 6>과목 삭제</font></legend>


      <fieldset style='750'>
      <legend><fontsize = 5>전공 필수</font></legend>
          <font size = 4>
        ";

  $sql = "Select * from course where item='전공필수'";
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


  echo "
  </font>
</fieldset><br>


<fieldset style='750'>
<legend><fontsize = 5>전공 선택</font></legend>
<font size = 4>

  ";


  $sql = "Select * from course where item='전공선택'";
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

  echo "
  </font>
</fieldset><br>


<fieldset style='750'>
<legend><fontsize = 5>전공 기초</font></legend>
  <font size = 4>

  ";


  $sql = "Select * from course where item='전공기초'";
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


  echo "
  </font>
</fieldset><br>


<fieldset style='750'>
<legend><fontsize = 5>공학 인증</font></legend>
  <font size = 4>

  ";


  $sql = "Select * from course where item='교양'";
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
  echo "
      </font>
    </fieldset>
    <br>
    <label>과목코드</label>
    <input type = 'text' name = 'coursecode' placeholder = '과목코드' size = 30/>
        <input type = 'submit' value = '과목삭제' name = 'button'>
      </fieldset>
    </form>";
?>
