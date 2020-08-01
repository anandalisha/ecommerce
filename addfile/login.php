<?php

	if(isset($_POST['btn_login']))
	{
		$s=0;
		try
		{
			$pdoconnect=new PDO("mysql:host=localhost;dbname=anusuya","root","");
			
		}
		
		catch(PDOException $exc)
		{
			echo $exc->getMessage();
			exit();
		}
		
		$dd=$_POST['username'];
		$ds=$_POST['password'];
		

		$pdoResult=$pdoconnect->query("SELECT * FROM login where username='$dd' AND password='$ds'");
		
		foreach($pdoResult as $row)
		{
			
			header("location:first.php");
			$s=$s+1;
			
			
		}
		if($s==0)
		{
			
			echo "<h1>username and password incorrect</h1>";
			
			
		}
	}	
		
?>



<!DOCTYPE html>
<html>
	<head>
		
		
		<link rel="stylesheet" type="text/css" href="style.css"></link>
				<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		
			<title>drop down menu</title>
	
	</head>
	
	<body>
	
	
	<div class="container">
		<img src="monkey.png">
				<form  method="post">
						<input type="text" name="username" required placeholder="Enter Username"><br><br>
						<input type="password" name="password" required placeholder="Enter Password"><br><br>
						<button name="btn_login"> submitttt</button>
						<a href="forgetpassword_working.php"><U>Forget Password?</U></a><br>
						<a style="text-decoration:none;" href="newuser_pdo_code.php"><input   type="button"   value="New User"  class="btn-newuser" ></a>
				</form>
	</div>
	
	
	
	</body>
</html>
