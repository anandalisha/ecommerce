<?php
if(isset($_POST['clickk']))
{
	 
	$_COOKIE["email"]="";
	$_COOKIE["pass"]="";
	

	
}
	if(isset($_POST['login']))
	{
		include("db.php");
		$a=1;
		$b=1;
		$email=$_POST['email'];
		$pass=$_POST['password'];
		
		if($email=="admin" and $pass=="admin")	
		{
			header("location:admin_index.php");
			$a=$a+1;
		}
		
		if($a==1)
		{
			$userlogin=$con->prepare("select * from newuser where username='$email' and password='$pass' ");
			
			$userlogin->execute();
			
			$row_check=$userlogin->rowCount();
			
			if($row_check==1)
				
			{
			
				if(isset($_POST['remember']))
				{
					setcookie('email',$email,time()+60*60*7);
					setcookie('pass',$pass,time()+60*60*7);
					
					
				}
					$setonline=$con->prepare("update newuser set set_online='$b' where username='$email'");
			
					$setonline->execute();
					
					session_start();
					
					$_SESSION['email']=$email;
			
					header("location:index.php");
				
				
			}
		}

		if($a==1)
		{
			echo "<h1>username and password incorrect</h1>";
		}
	}








?>

<html>
<head>

<style>
*
{
		margin:0;
		padding:0;
		font-family:verdana,geneva,sans-serif;
}


#header
{
	width:100%;
	height:110px;
	background:#800080;
}


#logo{width:20%;height:110px;float:left;}

#logo img{width:260px;height:110px;}

#link{width:80%;height:30px; float:left;}

#link ul{list-style-type:none; float:right;margin-right:20px;}

#link ul li{margin-left:30px;float:left;line-height:30px;}

#link ul li a{text-decoration:none;color:#fff;}

#search form input{padding-left:2%; border-top-left-radius:3px; border-bottom-left-radius:3px; width:58%;height:35px;outline:none;border-width:0px;margin-top:20px;}


#search_btn {border-top-right-radius:3px; border-bottom-right-radius:3px; margin-left:-10px;color:#fff; font-weight:bold;  width:10%;height:37px;outline:none;border-width:0px; background:#400040;}

#cart_btn {border-radius:4px;color:#fff; font-weight:bold;  width:10%;height:37px;outline:none;border-width:0px; background:#400040;}

#cart_btn a{text-decoration:none;}
#cart_btn a{text-decoration:none;color:#fff;display:block !important;}
	p{color:#000000;margin-right:40px;font-weight:bold;font-size:15px;margin-top:-80px;float:left;}
	#username{color:#F5F5F5;font-size:25px;}
	#username:hover{color:#00FA9A;cursor:pointer}
	.container
	{
	   
		width:500px;
		height: 450px;
		text-align: center;
		background-color:rgba(52,73,94,0.7);
		border-radius: 4px;
		margin:0 auto;
		margin-top:40px;
		opacity:0.9;
		
		
		
	}
	
	
	
	
	

	input[type="password"]:focus
			{
				width:50%;
				border:2px solid aquamarine;
				background-color:white;
			}	
			
			input[type="button"]:focus
			{
				width:20%;
				border:2px solid aquamarine;
				background-color:#0000CD;
			}	
	
	
	
	
	
	
	#fpass
	{
		color:#40E0D0;
		cursor:pointer;
		margin-left:-230px;
		
	}
	
	.text-danger
	{
		align:center;
		margin-top:110px;
	}

	.container img
	{
	border-radius:60px;
		border:none;
		width:120px;
		height: 120px;
		margin-top:20px;
		margin-bottom:20px;
		opacity:1.5;
		
	}
	#textt
	{
		width:180px;
		height: 33px;
		box-sizing:border-box;
		border:2px solid #34495e;
		border-radius:4px;
		font-size:18px;
		margin-bottom:15px;
		background-color:#112233;
		padding-left:5px;
		
		color:#fff;
		font-weight:bold;
		transition:width 0.4s ease-in-out;
		
		
	}
			#textt:focus
			{
				width:170px;
		height: 33px;
				border:2px solid aquamarine;
				background-color:white;
				color:#000;
			}	
				#textt:focus
			{
				width:170px;
		height: 33px;
				border:2px solid aquamarine;
				background-color:white;
				color:#000;
			}	
			
		.btn-login
		{
		width:85px;height:30px;;
		
		cursor:pointer;
		color:#112233;
		
		border-radius:4px;
		border:1px solid #112233;
		background-color:#2ECC71;
		background-bottom: 4px solid #27AE60;
		margin-bottom:20px;
		font-weight:bold;
		background:aquamarine;
		font-size:15px;
		
		
	}
	.btn-login:hover
			{
					color:aquamarine;
				border:1px solid aquamarine;
				background-color:#112233;
			}
			
	.btn-newuser
	{
		padding:10px;
		cursor:pointer;
		color:#112233;
		border-radius:4px;
			border:1px solid #112233;
		
		
		margin-top:-30px;
		
		margin-right:-120px;
		margin-left:200px;
		font-size:15px;
			background:aquamarine;
		
		font-weight:bold;
		width:110px;height:30px;line-height:10px;
		
	}
	.btn-newuser:hover
			{
					color:aquamarine;
				border:1px solid aquamarine;
				background-color:#112233;
			}
	#clr:hover
			{
					color:aquamarine;
				border:1px solid aquamarine;
				background-color:#112233;
			}
	#clr{cursor:pointer;margin-top:-235px;color:#fff;float:right;margin-right:80px;text-decoration:none;font-weight:bold;font-size:20px;background:transparent;border:none;}
	
	input[type="checkbox"]
	{
		margin-bottom:20px;
		cursor:pointer;
		
		
	}

	h1{color:#fff;background:#400040;text-align:center;}
</style>
</head>
<body>

<?php 
					
			include("header_index.php");
				include("navbar.php");

			?>
			<div class="container">
		<img src="avatar.jpg">
				<form  method="post">
						<input id="textt" type="text" name="email" id="email" required placeholder="&#x263A; Enter Username" ><br><br>
						<input id="textt" type="password" name="password" id="pass" required placeholder="&#x263A; Enter Password" ><br><br>
						
						
						<input type="checkbox" name="remember" value="1"><b style="color:#fff;">Remember Me</b><br/>
						<input type="submit" name="login" value="LogIn &#x27A8;" class="btn-login"><br/><br/>
						<button id="clr"  name="clickk">&#x2718; Clear</button>

						<a id="fpass" href="forgetpassword_working.php"><U>Forget Password?</U></a><br>
						<a style="text-decoration:none;" href="newuser_pdo_code.php"><input   type="button"   value="&#x263B;NewUser"  class="btn-newuser" ></a>
				
				</form>
	</div>
			</body>
			</html>
			
			
			
			
			
			<?php
if(isset($_COOKIE['email'])and isset($_COOKIE['pass']))
{
	$email=$_COOKIE['email'];
	$pass=$_COOKIE['pass'];
	
	echo $email;
	
	echo"<script>
	
	
	document.getElementById('email').value='$email';
		document.getElementById('pass').value='$pass';
	
	
	</script>";
	
	
}


?>