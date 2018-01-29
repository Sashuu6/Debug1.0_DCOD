<?php
session_start();
$name =$_SESSION['uname']; 
require('connection.php');

 if(isset($_GET['data']) && isset($_GET['comnum']) && isset($_GET['qnum']))
{
	$num = $_GET['qnum'];
	$k=$_GET['data'];
	$j=$_GET['comnum'];
	
$filenew="qst".$num.$name.".c";
$fout="qst".$num.$name;
	         $file1 = fopen($filenew,"w")or die("Unable to open the file");
			 fwrite($file1,$k);
	$output=system("sh -c 'gcc /var/www/html/debug/'".$filenew."' -lm -o /var/www/html/debug/'".$fout."' 2>&1'");
 echo $output;		 
 if($output=="")
  {
	  $out = 1;
  }
  else
  {
	 $out = 0;  
  }
			 // echo $_GET['qnum'];
 $sel=mysqli_query($con1,"select * from track_users where username='$name'");
 $sel1=mysqli_fetch_row($sel);			
 if($sel1[0]!="")
 {
	mysqli_query($con1,"update track_users set qst".$num."atm='$j',qst".$num."cmp='$out' where username='$name'");
 }
 else
 {
	mysqli_query($con1,"insert into track_users(id,username,qst".$num."atm,qst".$num."cmp) values('0','$name','$j','$echo')");
 }
}


				 
?>
