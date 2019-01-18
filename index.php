<?php
   ob_start();
   require_once("connection.php");
   ?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex">
      <title>Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         /* Credit to bootsnipp.com for the css for the color graph */
         .colorgraph {
         height: 5px;
         border-top: 0;
         background: #c4e17f;
         border-radius: 5px;
         background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
         background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
         background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
         background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
         }
      </style>
      <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         window.alert = function(){};
         var defaultCSS = document.getElementById('bootstrap-css');
         function changeCSS(css){
             if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
             else $('head > link').filter(':first').replaceWith(defaultCSS); 
         }
         $( document ).ready(function() {
           var iframe_height = parseInt($('html').height()); 
           window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
         });
      </script>
      <script>
         function reg_user()
         {
         	var name = document.getElementById('email').value;
         	var pass = document.getElementById('password').value
         	$.ajax
                       ({
                 type:'post',
                    url:'reg_ajx.php',
                    data:{
                      name1:name,pass1:pass
                      },
             success:function(response) 
                   {
                window.location="index.php";
                //document.getElementById('hai').text=success;
                   }
                 });
         
         }
      </script>
   </head>
   <body>
      <div class="container">
         <div class="row" style="margin-top:20px">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
               <form role="form" method="post">
                  <fieldset>
                     <h2>Please Sign In</h2>
                     <hr class="colorgraph">
                     <div class="form-group">
                        <input type="text" name="user" id="email" class="form-control input-lg" placeholder="Username/Id">
                     </div>
                     <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
                     </div>
                     <span class="button-checkbox">
                     <button type="button" class="btn btn-info active" data-color="info"><i class="state-icon glyphicon glyphicon-check"></i>&nbsp;Remember Me</button>
                     <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                     <a href="" class="btn btn-link pull-right">Forgot Password?</a>
                     </span>
                     <hr class="colorgraph">
                     <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                           <input type="submit" class="btn btn-lg btn-success btn-block" name="log" value="Sign In"/>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                           <!--<a href="" class="btn btn-lg btn-primary btn-block">Register</a>-->
                           <input type="button" class="btn btn-lg btn-primary btn-block" name="reg" value="Register" onclick="reg_user()"/>
                           <label id="hai" ></label> 
                        </div>
                     </div>
                     <?php
                        if(isset($_POST['log']))
                        {
                        $user=$_POST['user'];
                        $pass=$_POST['password'];
                        if($user!="" && $pass!="")
                         {
                        $ch=mysqli_query($con1,"select * from users where UserName='$user' and Password='$pass'");
                        $chk=mysqli_fetch_row($ch);
                        if($chk[1]!="" && $chk[2]!="")
                        {
                           	session_start();
                        	$_SESSION['uname']=$chk[1];
                        	echo "success";
                        	//echo"<script>alert('welcome $chk1')</script>";
                        	header("location:instructions.php");
                        }
                        else
                        {
                         echo"<script>alert('Logging in unsuccessful')</script>";	
                         echo "failed";
                         header("refresh:1;url=index.php");
                        }
                        }
                        else
                         {
                        	echo "Invalid username and password";   
                            }
                          
                        
                        }
                        
                        
                        ?>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         $(function(){
            $('.button-checkbox').each(function(){
         	var $widget = $(this),
         		$button = $widget.find('button'),
         		$checkbox = $widget.find('input:checkbox'),
         		color = $button.data('color'),
         		settings = {
         				on: {
         					icon: 'glyphicon glyphicon-check'
         				},
         				off: {
         					icon: 'glyphicon glyphicon-unchecked'
         				}
         		};
         
         	$button.on('click', function () {
         		$checkbox.prop('checked', !$checkbox.is(':checked'));
         		$checkbox.triggerHandler('change');
         		updateDisplay();
         	});
         
         	$checkbox.on('change', function () {
         		updateDisplay();
         	});
         
         	function updateDisplay() {
         		var isChecked = $checkbox.is(':checked');
         		// Set the button's state
         		$button.data('state', (isChecked) ? "on" : "off");
         
         		// Set the button's icon
         		$button.find('.state-icon')
         			.removeClass()
         			.addClass('state-icon ' + settings[$button.data('state')].icon);
         
         		// Update the button's color
         		if (isChecked) {
         			$button
         				.removeClass('btn-default')
         				.addClass('btn-' + color + ' active');
         		}
         		else
         		{
         			$button
         				.removeClass('btn-' + color + ' active')
         				.addClass('btn-default');
         		}
         	}
         	function init() {
         		updateDisplay();
         		// Inject the icon if applicable
         		if ($button.find('.state-icon').length == 0) {
         			$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
         		}
         	}
         	init();
         });
         });
      </script>
   </body>
</html>
