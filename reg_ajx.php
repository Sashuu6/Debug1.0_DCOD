<?php
   require('connection.php');
   $user= $_POST['name1'];
   $pass=$_POST['pass1'];
   if($user!="" && $pass!="")
   {
   $ch=mysqli_query($con1,"select * from users where UserName='$user'");
   $chk=mysqli_fetch_row($ch);
   if($chk[1]=="" && $chk[2]=="")
   {
   mysqli_query($con1,"insert into users values ('0','$user','$pass')");
   mysqli_query($con1,"insert into track_users values (0,'$user',0,0,0,0,0,0,0,0,0,0)");
   echo "success";
   }
   else
   {
   echo "Not Valid ";
   }
   }
?>