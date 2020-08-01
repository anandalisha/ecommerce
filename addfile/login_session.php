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
				
					setcookie('usernameget',$email,time()+60*60*7);
					
					
					session_start();
					
					
					
					$_SESSION['login']='Now()';
					
					$date1=date("h:i:sa");
					$time1=date("d-m-Y H:i:sa");
					
					$time_now=mktime(date('h')+4,date('i')+30,date('s'));
					$date = date('d-m-Y H:i:sa', $time_now);
					
					
					$_SESSION['logintime1']=$date;
					
					
					
					$setonline=$con->prepare("update newuser set set_online='$b' where username='$email'");
			
					$setonline->execute();
					
					$setonline1=$con->prepare("update newuser set logout=".$_SESSION['login']." where username='$email'");
			
					$setonline1->execute();

					$insert_login_time=$con->prepare("insert into checktime(arrived,setonoff,username)value(Now(),'1','$email')");
						
					$insert_login_time->execute();
					
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

<!DOCTYPE html>
<html>
	<head>
		
		
		
		
			<title>drop down menu</title>
	<style>
	
	
	.container
	{
	   
		width:500px;
		height: 450px;
		text-align: center;
		background-color:rgba(52,73,94,0.7);
		border-radius: 4px;
		margin:0 auto;
		margin-top:80px;
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
	.form-input::before
	{
		content:"\f007";
		position:absolute;
		font-family:"FontAwesome";
		color:2F4F4F;
		padding-left:3px;
		
		padding-top:1px;
		font-size:30px;
		
		
	}
	.form-input1::before
	{
		content:"\f007";
		position:absolute;
		font-family:"FontAwesome";
		color:2F4F4F;
		padding-left:3px;
		
		padding-top:1px;
		font-size:30px;
		
		
	}
	
	.form-input:nth-child(2)::before
	{
		content:"\f023";
		
	}
	
	.form-input:nth-child(3)::before
	{
		content:"\f0a9";
		color:000000;
		padding-left:100px;
		
		padding-top:6px;
		cursor:pointer;
	}
	
	.form-input1:last-child::before
	{
		content:"\f234";
		color:000000;
		padding-left:115px;
		
		padding-top:4px;
		cursor:pointer;
	}
	
	
	
	
	
	
	a
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
	body
	{
		margin:0 auto;
		background-image:url("ss.jpg");
		background-repeat:no-repeat;
		background-size: 100% 680px;
		
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
	input[type="text"],input[type="password"]
	{
		width:170px;
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
		input[type="text"]:focus
			{
				width:170px;
		height: 33px;
				border:2px solid aquamarine;
				background-color:white;
				color:#000;
			}	
			input[type="password"]:focus
			{
				width:170px;
		height: 33px;
				border:2px solid aquamarine;
				background-color:white;
				color:#000;
			}	
			
		.btn-login
		{
		width:75px;height:30px;;
		
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
	input[type="submit"]:hover
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
		
		
		
		
		margin-right:-120px;
		margin-left:430px;
		font-size:15px;
			background:aquamarine;
		
		font-weight:bold;
		width:100px;height:30px;line-height:10px;
		margin-top:-90px;
		
	}
	input[type="button"]:hover
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
	
				
	
			
				
				
	<div class="container">
		<img src="avatar.jpg">
				<form  method="post">
						<input type="text" name="email" id="email" required placeholder="&#x263A; Enter Username" ><br><br>
						<input type="password" name="password" id="pass" required placeholder="&#x263A; Enter Password" ><br><br>
						
						
						<input type="checkbox" name="remember" value="1"><b style="color:#fff;">Remember Me</b><br/>
						<input type="submit" name="login" value="LogIn &#x27A8;" class="btn-login"><br/><br/>
						<button id="clr"  name="clickk">&#x2718; Clear</button>

						<a href="forgetpassword_working.php"><U>Forget Password?</U></a><br>
						<a style="text-decoration:none;" href="newuser.php"><input   type="button"   value="&#x263B;NewUser"  class="btn-newuser" ></a>
				
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






