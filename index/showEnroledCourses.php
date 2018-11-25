<?php
  $studentid = "";
  $extra = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentid = test_input($_POST["studentid"]);
    $extra = test_input($_POST["extra"]);
  }



  //********************수강 목록 출력 쿼리****************
  $sql = "select course.coursecode, course.name, course.gaincredit, course.period
          from signuped
          inner join course on signuped.coursecode = course.coursecode
          where signuped.studentid = '".$studentid."'";
  $result = mysqli_query($conn, $sql);
  echo "<h2>수강 과목 목록</h2><br>";

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "과목코드 : " . $row["coursecode"]. ", 과목명 : " . $row["name"]. ", 학점 : " . $row["gaincredit"].", 개설학기 : " . $row["period"]."<br>";
    }
  }
  else {
      echo "0 results";
  }

//*******************졸업요건 출력 쿼리문************************
  $sql = "Select *
          from graduation";
  $result = mysqli_query($conn, $sql);
  $a[4] = [0,0,0,0];
  $i = 0;
  echo "<h2>졸업 요건</h2><br>";
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $a[$i] = $row["credit"];
      $i = $i + 1;
    }
      echo "교양 : " . $a[0]. ", 전공기초 : " . $a[1]. ", 전공선택 : " . $a[2].", 전공필수 : " . $a[3]."<br>";
  }
  else {
      echo "0 results";
  }



  //**********************영역별 이수학점 조회 쿼리문*******************
  $sql = "select sum(gaincredit) as '교양'
          from course c, signuped s
          where studentid = '".$studentid."'
          and s.coursecode = c.coursecode
          and c.item='교양'";
  $result = mysqli_query($conn, $sql);
  $resultA = 0;
  echo "<h2>지금까지 이수 학점</h2><br>";
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $resultA = $row["교양"];
      echo "교양 : " . $row["교양"].", ";
    }
  }
  else {
      echo "0 results";
  }



//**********************영역별 이수학점 조회 쿼리문*******************
  $sql = "select sum(gaincredit) as '전공기초'
          from course c, signuped s
          where studentid = '".$studentid."'
          and s.coursecode = c.coursecode
          and c.item='전공기초'";
  $result = mysqli_query($conn, $sql);
  $resultB = 0;
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $resultB = $row["전공기초"];
      echo "전공기초 : " . $row["전공기초"].", ";
    }
  }
  else {
      echo "0 results";
  }

//**********************영역별 이수학점 조회 쿼리문*******************
  $sql = "select sum(gaincredit) as '전공선택'
          from course c, signuped s
          where studentid = '".$studentid."'
          and s.coursecode = c.coursecode
          and c.item='전공선택'";
  $result = mysqli_query($conn, $sql);
  $resultC = 0;
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $resultC = $row["전공선택"];
      echo "전공선택 : " . $row["전공선택"].", ";
    }
  }
  else {
      echo "0 results";
  }
//**********************영역별 이수학점 조회 쿼리문*******************
  $sql = "select sum(gaincredit) as '전공필수'
          from course c, signuped s
          where studentid = '".$studentid."'
          and s.coursecode = c.coursecode
          and c.item='전공필수'";
  $result = mysqli_query($conn, $sql);
  $resultD = 0;
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $resultD = $row["전공필수"];
      echo "전공필수 : " . $row["전공필수"]."<br>";
    }
  }
  else {
      echo "0 results";
  }

  //****************남은 학점 계산**************************
  echo "<h2>졸업까지 남은 학점</h2><br>";
  $a[0] = intval($a[0]);
  $a[1] = intval($a[1]);
  $a[2] = intval($a[2]);
  $a[3] = intval($a[3]);
  $resultA = intval($resultA);
  $resultB = intval($resultB);
  $resultC = intval($resultC);
  $resultD = intval($resultD);
  $extra = intval($extra);

  $B[0] = $a[0]-$resultA-$extra;
  $B[1] = $a[1]-$resultB;
  $B[2] = $a[2]-$resultC;
  $B[3] = $a[3]-$resultD;
  echo "교양 : " .$B[0].", 전공기초 : " .$B[1]. ", 전공선택 : " .$B[2].", 전공필수 : " .$B[2]."<br>";
?>
