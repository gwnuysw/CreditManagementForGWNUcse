<?php
  $id = $_POST['id'];
  $pw = $_POST['password'];
  $connet=mysql_connect("localhost","id","password");
 
  //db스키마에 맞게 수정해야됨
  mysql_select_db("",$connet);
  $sqlrec="select * from member where id='$id' and pw='password'";
   
$info=mysql_query($sqlrec,$connet);
if(!info)
{
   echo"<script>alert('id 또는 password가 일치하지 않습니다.');history.back();</script>";
   eixt();
}
<<<<<<< HEAD
//
=======
>>>>>>> 97f67db3a86b02267de6347980a80cce2e2406ee
  if($id == "admin" && $pw == 1234){
    header("Location:http://localhost/admin.html", true, 301);
    exit();
  }

  session_start();
?>
<meta http-equiv='refresh' content='0';url=>
