<?php

include("db.php");

if(isset($_POST['validate']))
{
	$cardname=$_POST['cartname'];
	

	
	$query=$con->prepare("select * from payment where otp='$cardname'");
	
	$query->execute();
	
	$row=$query->rowCount();
	if($row==1)
	{
		
		
		header("location:credit_continue_1.php");
		
	}
	else
	{
		echo"<h1>!...OTP is incorrect...!</h1>";
	}
	
}



?>







<html>
<head>
<style>
body{background:#fff;}

 img{margin-top:20px;margin-bottom:20px;margin-left:100px;}
 h2{font-weight:normal;font-size:30px;margin-left:100px;}
 
 #offerlog{width:80%;margin-left:5%;margin-top:2%;margin-right:5%;background:#fff;border:1px solid aquamarine;}
 #payment{width:65%;margin-left:5%;height:78%;background:#fff;border:1px solid aquamarine;margin-top:10px;}
 option{width:300px;height:30px;background:#400040;color:#fff;padding:10px;}
 option:hover{color:#400040;background:#fff;}
 
 
 #ragava{margin-top:-9px;}
 
 
 
 
 
 </style>
</head>
<body>


<form method="post">
<?php
			include("db.php");
			$a=1;
			$getaddress=$con->prepare("select * from newuser where set_online='$a'");
			$getaddress->execute();
			
			$row=$getaddress->fetch();
			
			$query=$con->prepare("select * from payment where set_online='1'");
	
			$query->execute();
			
			$row1=$query->fetch();
			$opt=$row1['otp'];
		echo"<script>alert('OTP:$opt')</script>";
		echo"<h1>OTP:$opt</h1>";
					
			
			
?>

<img src="a.gif" />
	<h2>Credit Card method</h2>
	
		<div id="offerlog">
			<img src="mastercard.png" style="width:50px;height:50px;margin-top:10px;margin-bottom:15px;margin-left:30px;"/>
			<p style="margin-left:10%;margin-top:-4%;">Get 10% cashback* using Mastercard Debit/Credit Card at doorstep for your first cashless transaction *T&C apply<a href="term.php"><input type="submit" name="term" value="Learn More" style="border-radius:4px;margin-left:100px;width:100px;height:30px;border:1px solid aquamarine;"></a></p>
			</div>
			
			<div id="payment">
			


			<h5 style="font-size:23px;margin-top:10px;padding-left:35px;margin-bottom:20px;">Please Enter the OTP Password</h5>
<br><br>
			
	<form method="post">
	
		<b style="margin-left:35px;font-size:20px;font-weight:bold;margin-bottom:20px;">OTP </b>
		
		
		<input type="text" name="cartname" style="margin-left:15px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;">
		
		<br>
		
		
		
		<br><br>
		<input type="submit" value="validate" name="validate" style="margin-left:97px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;">
		
	</form>
			</div>

	</body>
	</html>