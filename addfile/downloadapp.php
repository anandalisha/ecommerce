<html>
<head>
<style>
h1{color:#400040;text-align:center;margin-top:50px;}
h2{color:#400040;text-align:center;margin-top:20px;}
h3{color:#400040;margin-top:20px;margin-left:10px;}
#login{color:#fff;background:#400040;border:1px solid #400040;margin-left:21px;width:260px;list-style-type:none;border-radius:3px;}

#logout{color:#fff;background:#400040;border:1px solid #400040;margin-left:20px;width:260px;list-style-type:none;border-radius:3px;}
//#show{background:#fff;width:400px;height:400px;margin-left:300px;margin-top:-235px;}
h4{color:#400040;font-size:20px;margin-left:20px;margin-top:10px;}
</style>
</head>
<body>


<?php
		
		include("header_demo.php");
		

		
		
	echo"<h1>". $_COOKIE["usernameget"]."</h1><br>";
	session_start();
	$getid=session_id();


	echo "<h2>Last LogIn time: ".$_SESSION['logintime1']."</h2><br>";

	echo "<h2>Last LogOut time: ".$_SESSION['loginout1']."</h2><br>";
	
	echo "<h2>Session id: <b style='color:red;'> $getid</b></h2><br>";


				include("db.php");
		$a=1;$b=1;
				$fetch_pro=$con->prepare("select * from checktime where  username='".$_COOKIE["usernameget"]."'and setonoff='1' ORDER BY 1 DESC");
				$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
				$fetch_pro->execute();
				
				$crow=$fetch_pro->rowCount();
				
				echo"<h2>Number of Visit:  $crow</h2>";
				
				echo"<h3>previous login and logout time</h3>";
				
				echo"
				
				
				<h4>LogIn Time</h4>												
				";
				while($row_men=$fetch_pro->fetch()):
			
				echo"
				
				<li id='login'><b style='margin-right:10px;color:yellow;'>".$a++.".</b>".$row_men['arrived']."</li><br>
				
				";
				endwhile;
				
				$fetch_pro1=$con->prepare("select * from checktime where username='".$_COOKIE["usernameget"]."'and setonoff='0' ORDER BY 1 DESC");
				$fetch_pro1->setFetchMode(PDO:: FETCH_ASSOC);
				$fetch_pro1->execute();
				
				echo"
				
				<div id='show'>
				<h4>LogOut Time</h4>												
				";
				while($row_men1=$fetch_pro1->fetch()):
			
				echo"
				
				<li id='logout'><b style='margin-right:10px;color:yellow;'>".$b++.".</b>".$row_men1['arrived']."</li><br>
				
				";
			
			
			
				endwhile;
				echo"</div>";

?>
</body>
</html>