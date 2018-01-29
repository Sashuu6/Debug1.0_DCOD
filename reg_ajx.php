<?php
require('connection.php');
				   	$user=$_POST['name1'];
		            $pass=md5($_POST['pass1']);
		            if($user!="" && $pass!="")
		            {
					$ch=mysqli_query($con1,"select * from users where UserName='$user'");
					$count=mysqli_num_rows($ch);
					if($count==0)
					{
						mysqli_query($con1,"insert into users values ('0','$user','$pass')");
						echo "success";
					}
					else
					{
						echo "error";
					}
				}
				
				?>
