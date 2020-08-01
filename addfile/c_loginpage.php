<?php
if(isset($_POST['clickk']))
{
	 
	$_COOKIE["user"]="";
	$_COOKIE["userpass"]="";
	echo $_COOKIE["user"];

	
}
$message="";
	if(isset($_POST['delete']))
	{
		  
		  
			include("db.php");
		$s=0;$a=1;
		
		
		$dd=$_POST['uname'];
		$ds=$_POST['pass'];
		

		$pdoResult=$con->query("SELECT * FROM newuser where username='$dd' AND password='$ds'");
		
		foreach($pdoResult as $row)
		{
			setcookie("user",$_POST['uname'],time()+60*60*24*30);
			setcookie("userpass",$_POST['pass'],time()+60*60*24*30);
		 
			$up_img4=$con->prepare("update newuser set set_online='$a' where username='$dd'");
			
				$up_img4->execute();
			header("location:index.php");
			$s=$s+1;
			
			
		}
		if($s==0)
		{
			
			echo "<h1>username and password incorrect</h1>";
			$message='<label>wrong data</label>';
			
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
		height: 420px;
		text-align: center;
		background-color:rgba(52,73,94,0.7);
		border-radius: 4px;
		margin:0 auto;
		margin-top:110px;
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
		width:100px;
		height: 100px;
		margin-top:30px;
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
		
	}
	input[type="button"]:hover
			{
					color:aquamarine;
				border:1px solid aquamarine;
				background-color:#112233;
			}
	#clr{cursor:pointer;margin-top:-199px;color:#fff;float:right;margin-right:80px;text-decoration:none;font-weight:bold;font-size:20px;background:transparent;border:none;}
	
	
	
	</style>
	</head>
	
	<body>
	
				
	
			
				
				
	<div class="container">
		<img src="avatar.jpg">
				<form  method="post">
						<input type="text" name="uname" required placeholder="&#x263A;&#x263B; Enter Username" value="<?php echo $_COOKIE["user"]; ?>"><br><br>
						<input type="password" name="pass" required placeholder="&#x263A; Enter Password" value="<?php echo $_COOKIE["userpass"]; ?>"><br><br>
						<input type="submit" name="delete" value="LogIn &#x27A8;" class="btn-login"><br/><br/>
						<button id="clr"  name="clickk">&#x2718; Clear</button>

						<a href="forgetpassword_working.php"><U>Forget Password?</U></a><br>
						<a style="text-decoration:none;" href="newuser_pdo_code.php"><input   type="button"   value="&#x263B;NewUser"  class="btn-newuser" ></a>
				
				</form>
	</div>
	
	
	
	</body>
</html>
