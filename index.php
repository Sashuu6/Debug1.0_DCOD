<?php
ob_start();
@require_once("connection.php");
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body{
        background-color: #330033;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23404' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23505'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
    }
    header {
  position: relative;
  height: 300px;
  background-image: linear-gradient(#ff9d2f, #ff6126);
}

h1 {
  padding: 100px 0;
  font: 44px "Helvetica Neue";
  text-align: center;
  color: white
}

header h1 {
  color: white;
}

svg {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 100px;
}

@media (max-width: 699px) {
  .svg--lg {
    display: none;
  }
}

@media (min-width: 700px) {
  .svg--sm {
    display: none;
  }
}
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
			   if (response == 'error') {
        		window.location="index.php?failed=1";
			   }
			   else {
                window.location="index.php?success=1";
               } 
           },
		   error:function() 
           {
        window.location="index.php?failed=1";
           }
         });
	
	}
	</script>
</head>
<body>

<div id="container">
<h1>DΞBUGGΞR</h1>    
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    
		<form role="form" method="post">
			<fieldset>
				<h2 style="color:#fff">Please Sign In.</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="text" name="user" id="email" class="form-control input-lg" placeholder="Username/Id">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>
				
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
				if(isset($_GET['success'])) {
					echo "<div style=\"font-size: 25px;padding: 5px;color: green;\">User registeration successful! Please login now!</div>";
					header("refresh:1;url=index.php");   
				}
				
				if(isset($_GET['failed'])) {
					echo "<div style=\"font-size: 25px;padding: 5px;color: red;\">User already registered! Please sign in!</div>";
					header("refresh:1;url=index.php");   
				}
				
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
		 echo "<div style=\"font-size: 25px;padding: 11px;color: red;padding-left: 76px;\">Incorrect Username or Password!</div>";
		 header("refresh:1;url=index.php");
		}
	}
		else
		 {
			echo "<div style=\"font-size: 25px;padding: 11px;color: red;padding-left: 76px;\">Incorrect Username or Password!</div>";
            header("refresh:1;url=index.php");   
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
				$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
			}
		}
		init();
	});
});
	</script>


</body></html>
