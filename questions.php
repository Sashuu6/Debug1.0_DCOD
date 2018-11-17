<?php
ob_start();
session_start();
require('connection.php');
if(!isset($_SESSION['uname']))
{
	header("location:index.php");
}
$name = $_SESSION['uname'];
?>

<html><head>
                                <meta charset="utf-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <title>Débogueur</title>
                                <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
                                <style>*,
*:after,
*:before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.clearfix:before,
.clearfix:after {
	content: " ";
	display: table;
}

.clearfix:after {
	clear: both;
}

body {
	font-family: sans-serif;
	background: #f6f9fa;
}

h1 {
	color: #ccc;
	text-align: center;
}

a {
  color: #ccc;
  text-decoration: none;
  outline: none;
}

/*Fun begins*/
.tab_container {
	width: 90%;
	margin: 0 auto;
	padding-top: 70px;
	position: relative;
}

input, section {
  clear: both;
  padding-top: 10px;
  display: none;
}

label {
  font-weight: 700;
  font-size: 18px;
  display: block;
  float: left;
  width: 20%;
  padding: 1.5em;
  color: #757575;
  cursor: pointer;
  text-decoration: none;
  text-align: center;
  background: #f0f0f0;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4,
#tab5:checked ~ #content5 {
  display: block;
  padding: 20px;
  background: #fff;
  color: #999;
  border-bottom: 2px solid #f0f0f0;
}

.tab_container .tab-content p,
                                    .tab_container .tab-content button,
                                    .tab_container .tab-content textarea,
                                    .tab_container .tab-content h4,
                                    .tab_container .tab-content h2,
.tab_container .tab-content h3 {
  -webkit-animation: fadeInScale 0.7s ease-in-out;
  -moz-animation: fadeInScale 0.7s ease-in-out;
  animation: fadeInScale 0.7s ease-in-out;
}
.tab_container .tab-content h3  {
  text-align: center;
}

.tab_container [id^="tab"]:checked + label {
  background: #fff;
  box-shadow: inset 0 3px #0CE;
}

.tab_container [id^="tab"]:checked + label .fa {
  color: #0CE;
}

label .fa {
  font-size: 1.3em;
  margin: 0 0.4em 0 0;
}

/*Media query*/
@media only screen and (max-width: 930px) {
  label span {
    font-size: 14px;
  }
  label .fa {
    font-size: 14px;
  }
}

@media only screen and (max-width: 768px) {
  label span {
    display: none;
  }

  label .fa {
    font-size: 16px;
  }

  .tab_container {
    width: 98%;
  }
}

/*Content Animation*/
@keyframes fadeInScale {
  0% {
  	transform: scale(0.9);
  	opacity: 0;
  }
  
  100% {
  	transform: scale(1);
  	opacity: 1;
  }
}
</style>




                                <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                                <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
                                <script type="text/javascript">
															
								
				
								function logout()
								{
									
				                   $.ajax
               ({
         type:'post',
            url:'deblogout.php',
            data:{
              logout:"logout"
              },
     success:function(response) 
           {
        window.location="index.php";
          }
         });
									
								}
		/*	function checkFirstVisit() {
  if(document.cookie.indexOf('mycookie')==-1) {
    // cookie doesn't exist, create it now
    document.cookie = 'mycookie=1';
  }
  else {
    // not first visit, so alert
    alert('You refreshed!');
	
  }
}	*/				
//								window.onload=checkFirstVisit;


  var minutes = 0;
  var seconds = 0;
  function startTimer(duration, display) {
    var timer = duration,
        minutes, seconds;
    setInterval(function() {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.textContent = minutes + ":" + seconds;

      setCookie("minutes", minutes.toString(), 1);
      setCookie("seconds", seconds.toString(), 1);

      if (--timer < 0) {
        timer = 0;
		$.ajax
               ({
         type:'post',
            url:'deblogout.php',
            data:{
              logout:"logout"
              },
     success:function(response) 
           {
        window.location="index.php";
          }
         });
      }
    }, 1000);
  }


  window.onload = function() {
     var minutes_data = getCookie("minutes");
     var seconds_data = getCookie("seconds");
     var timer_amount = (45*60); //default
      if (!minutes_data || !seconds_data){
        //no cookie found use default
      }
      else{
        timer_amount = parseInt(minutes_data*60)+parseInt(seconds_data)
      }

    var fiveMinutes = timer_amount,
        display = document.querySelector('#countdown');
    startTimer(fiveMinutes, display); //`enter code here`
  };

   function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
   } 

   function getCookie(cname) {
   var name = cname + "=";
   var ca = document.cookie.split(';');
   for(var i=0; i<ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1);
      if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
   }
   return "";
  } 

  

								/*
								var seconds = 600;
             function secondPassed() {
              var minutes = Math.round((seconds - 30)/60);
             var remainingSeconds = seconds % 60;
               if (remainingSeconds < 10) {
               remainingSeconds = "0" + remainingSeconds;  
                 }
             document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
            if (seconds == 0) {
               clearInterval(countdownTimer);
			  $.ajax
               ({
         type:'post',
            url:'deblogout.php',
            data:{
              logout:"logout"
              },
     success:function(response) 
           {
        window.location="index.php";
          }
         });
	
   

            // document.getElementById('countdown').innerHTML = "Buzz Buzz";
               else {
             seconds--;
              }
}*/
 

//var countdownTimer = setInterval('secondPassed()', 1000);
								
								
								
								
								</script>
                                <script>
								
					
								
function loadDoc(id) {
	
	//alert(id);
	var t = id.split("p");
	var i = t[1];
	//alert(i);
	var k = document.getElementById('text'+i).value;
	//alert(k);
	var times = document.getElementById('te'+i).value;
	var times1 = parseInt(times);
	 times1=times1+1;
	//alert(times1);
	document.getElementById('te'+i).value=times1;
	var xhttp;
	if(window.ActiveXobject)
						{
							xhttp= new ActiveXobject("Microsft.XMLHTTP");
							
						}
						else
						{
							xhttp= new XMLHttpRequest();
						}
	 
 
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //document.getElementById('text'+i).value = this.responseText;
    if(this.responseText=='')
    {
      document.getElementById('comp'+i).style.backgroundColor="#138d75 ";
      alert("Compilation Successful");
    }
    else
    {
	 document.getElementById('comp'+i).style.backgroundColor="red";	
     alert("Compilation Not Successful");
    }
	 
    }
 };
  xhttp.open("GET", "ajax_info.php?data="+encodeURIComponent(k)+"&comnum="+times1+"&qnum="+i, true);
  xhttp.send();
 
 
  }
  
  
  

</script>

                            
                            </head>

<body>
<h1>Débogueur <?php echo ucfirst ( $name ); ?></h1>


<input type="button" class="btn btn-danger btn-block" name="lo" id="lo" value="Logout" onclick="logout()" style="float:right;width:100px;"/>
<p>
<label id="countdown" style="float:right; width:500px;height:0px;margin:0px;padding:0px" ></label></p>

<!--<p><input type = "text" value='0' id="hid"/></p> -->
		<div class="tab_container">
         
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1"><i class="fa fa-code"></i><span>Question 1</span></label>

			<input id="tab2" type="radio" name="tabs">
			<label for="tab2"><i class="fa fa-pencil-square-o"></i><span>Question 2</span></label>

			<input id="tab3" type="radio" name="tabs">
			<label for="tab3"><i class="fa fa-bar-chart-o"></i><span>Question 3</span></label>

			<input id="tab4" type="radio" name="tabs">
			<label for="tab4"><i class="fa fa-folder-open-o"></i><span>Question 4</span></label>

			<input id="tab5" type="radio" name="tabs">
			<label for="tab5"><i class="fa fa-envelope-o"></i><span>Question 5</span></label>
           
			<section id="content1" class="tab-content">
            <form method="post" name="frm1">
				<h3>Question 1</h3>
                
		      	<p>C program to find the binary difference between two binary numbers and also to find the bit at a particular index.</p>
                
                <div class="row">
  <div class="col-sm-8"><div class="form-group">
  <h2 style="     margin-top: 21px; ">Edit your code:</h2>
  <?php
   
   $file="binary.c";
	if(file_exists($file))
	{
	/* echo "<script> alert('File Found')</script>";*/
	 $fo = fopen($file,"r");
	 $contents = fread($fo,filesize($file));
	 echo "<script> alert('$contents');</script>";
	} 
	
   
	 
?>

  <textarea class="form-control" rows="20" id="text1" name="text1" style="font-size-adjust: 0.45;"  ><?php echo $contents ;?></textarea>
  
      </div></div>
  <div class="col-sm-4">
      <h2>Option:</h2>
      
      <input type="button" class="btn btn-success btn-block" name="comp1" id="comp1" value="Compile" onClick="loadDoc(this.id)"/>
      <!--<br><h4>Number of attempts: 1</h4>-->
      <?php
       $ret2 = mysqli_query($con1,"select `qst1atm` from track_users where username= '$name'");
	   $retv1 = mysqli_fetch_row($ret2);
	   ?>
      <input type="text" name="te1" id="te1" value="<?php if(isset($retv1[0])){ echo $retv1[0]; } else { echo 0; } ?>" style="display:hidden"/>
     <!-- <br><input type="button" class="btn btn-danger btn-block" name="reld1" value="Reload Original"/>
      
      <br><button type="button" class="btn btn-primary btn-block"  >Next</button>-->
      
                    </div>
        
</div>
		      	</form>
			</section>
            
			<section id="content2" class="tab-content">
            <form method="post" name="frm2" > 
				<h3>Question 2</h3>
                
		      	<p>C Program for Non recursive creation, prefix, postfix, infix traversal of a binary tree and finding its max depth.</p>
                
                <div class="row">
  <div class="col-sm-8"><div class="form-group">
  <h2 style="margin-top: 21px; ">Edit your code:</h2>
   <?php

	 
	 $file="binarytree_nonrec.c";
	if(file_exists($file))
	{
	/*echo "<script> alert('File Found')</script>";*/
	 $fo = fopen($file,"r");
	 $contents = fread($fo,filesize($file));
	}
	
	  if(isset($_POST['reld2']))
		{
		 $fo = fopen($file,"r");
	     $contents = fread($fo,filesize($file));	
			
		}

?>
  <textarea class="form-control" rows="20"  name="text2" id="text2" style="font-size-adjust: 0.45;"><?php echo $contents; ?></textarea>
 
      </div></div>
  <div class="col-sm-4">
      <h2>Option:</h2>
      
      <input type="button" class="btn btn-success btn-block" name="comp2"  id="comp2" value="Compile" onClick="loadDoc(this.id)"/>
      <!--<br><h4>Number of attempts: 1</h4>-->
      <?php
	   $ret1 = mysqli_query($con1,"select `qst2atm` from track_users where username= '$name'");
	   $retv = mysqli_fetch_row($ret1);
	   
	  ?>
      <input type="text" name="te2" id="te2" value="<?php if(isset($retv[0])){ echo $retv[0]; } else { echo 0; } ?>" style="display:hidden;"/>
     <!-- <br><input type="button" class="btn btn-danger btn-block" name="reld2" value="Reload Original">
      <br><button type="button" class="btn btn-primary btn-block">Next</button> -->
                    </div>
        
</div>
            </form>
            
 			</section>

			<section id="content3" class="tab-content">
            <form method="post" name="frm3">
				<h3>Question 3</h3>
                
		      	<p>C Program to find sum or product of two matrices.</p>
                
                <div class="row">
  <div class="col-sm-8"><div class="form-group">
  <h2 style="     margin-top: 21px; ">Edit your code:</h2>
  <?php

	 
	$file="matrixmul.c";
	 
	if(file_exists($file))
	{
	/* echo "<script> alert('File Found')</script>";*/
	 $fo = fopen($file,"r");
	 $contents = fread($fo,filesize($file));
	}
	else
	{
	 echo"<script>alert('not found');</script>";
	}
	
	  if(isset($_POST['reld3']))
		{
		 $fo = fopen($file,"r");
	     $contents = fread($fo,filesize($file));	
			
		}


?>
  <textarea class="form-control" rows="20"  name="text3" id="text3" style="font-size-adjust: 0.45;"><?php echo $contents; ?></textarea>
      </div></div>
  <div class="col-sm-4">
      <h2>Option:</h2>
      
      <input type="button" class="btn btn-success btn-block" name="comp3" id="comp3" value="Compile" onClick="loadDoc(this.id)"/>
      <!--<h4>Number of attempts: 1</h4>--> <?php
       $ret3 = mysqli_query($con1,"select `qst3atm` from track_users where username= '$name'");
	   $retv2 = mysqli_fetch_row($ret3);
	   ?>
      
      <input type="text" name="te1" id="te3" value="<?php if(isset($retv2[0])){ echo $retv2[0]; } else { echo 0; } ?>" style="display:hidden"/>
      <!--<br><input type="button" class="btn btn-danger btn-block" value="Reload Original" name="reld3"/>
      <br><button type="button" class="btn btn-primary btn-block">Next</button>-->
                    </div>
        
</div>
</form>			</section>

			<section id="content4" class="tab-content">
            <form method="post" name="frm4">
				<h3>Question 4</h3>
                
		      	<p>C program to accept a date as an input and display the number of Saturdays and Sundays of the month.</p>
                
                <div class="row">
  <div class="col-sm-8"><div class="form-group">
  <h2 style="     margin-top: 21px; ">Edit your code:</h2>
  <?php
  $file="noofsatsun.c";
 /* echo "<script> alert('hello');</script>";*/
	if(file_exists($file))
	{
	/* echo "<script> alert('File Found')</script>";*/
	 $fo = fopen($file,"r");
	 $contents = fread($fo,filesize($file));
	}
	
	  if(isset($_POST['reld4']))
		{
		 $fo = fopen($file,"r");
	     $contents = fread($fo,filesize($file));	
			
		}

	  
	  ?>
  <textarea class="form-control" rows="20"  name="text4" id="text4" style="font-size-adjust: 0.45;"><?php echo $contents;?></textarea>
      </div></div>
  <div class="col-sm-4">
      <h2>Option:</h2>
      
      <input type="button" class="btn btn-success btn-block" name="comp4" id="comp4" value="Compile" onClick="loadDoc(this.id)"/>
     <!-- <br><h4>Number of attempts: 1</h4>-->
      <?php
       $ret4 = mysqli_query($con1,"select `qst4atm` from track_users where username= '$name'");
	   $retv3 = mysqli_fetch_row($ret4);
	   ?>
      <input type="text" name="te1" id="te4" value="<?php if(isset($retv3[0])){ echo $retv3[0]; } else { echo 0; } ?>" style="display:hidden"/>
      <!--<br><input type="button" class="btn btn-danger btn-block" value="Reload Original" name="reld4"/>
      <br><button type="button" class="btn btn-primary btn-block">Next</button>-->
                    </div>
        
</div>
			</section>

			<section id="content5" class="tab-content">
            <form method="post" name="frm5">
				<h3>Question 5</h3>
                
		      	<p>C Program to perform polynomial multiplication using linked list.</p>
                
                <div class="row">
  <div class="col-sm-8"><div class="form-group">
  <h2 style="     margin-top: 21px; ">Edit your code:</h2>
  <?php
 $file="Poly.c";
	if(file_exists($file))
	{
	/* echo "<script> alert('File Found')</script>";*/
	 $fo = fopen($file,"r");
	 $contents = fread($fo,filesize($file));
	}
	
	  if(isset($_POST['reld5']))
		{
		 $fo = fopen($file,"r");
	     $contents = fread($fo,filesize($file));	
			
		}

	  ?>
  <textarea class="form-control" rows="20"  name="text5" id="text5" style="font-size-adjust: 0.45;"><?php echo $contents;?></textarea>
      </div></div>
  <div class="col-sm-4">
      <h2>Option:</h2>
      
      <input type="button" class="btn btn-success btn-block" name="comp5" id="comp5" value="Compile" onClick="loadDoc(this.id)"/>
     <!-- <br><h4>Number of attempts: 1</h4>-->
      <?php
       $ret5 = mysqli_query($con1,"select `qst5atm` from track_users where username= '$name'");
	   $retv4 = mysqli_fetch_row($ret5);
	   ?>
      <input type="text" name="te1" id="te5" value="<?php if(isset($retv4[0])){ echo $retv4[0]; } else { echo 0; } ?>" style="display:hidden"/>
      <!--<br><input type="button" class="btn btn-danger btn-block" value="Reload Original" name="reld5"/>
      <br><button type="button" class="btn btn-primary btn-block">Next</button>-->
                    </div>
        
</div>
</form>
			</section>
		</div>
    </body>
</html>
