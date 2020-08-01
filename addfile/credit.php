<?php

include("db.php");

if(isset($_POST['validate']))
{
	$cardname=$_POST['cartname'];
	
	$cardnumber=$_POST['cardnumber'];
	
	$query=$con->prepare("select * from payment where cardname='$cardname' and cardnumber='$cardnumber'");
	
	$query->execute();
	
	$row=$query->rowCount();
	if($row==1)
	{
		echo"<h1>!...card name and card number correct...!</h1>";
		$a=rand(1000,9999);
		$query1=$con->prepare("update payment set set_online='1',otp='$a' where cardname='$cardname' and cardnumber='$cardnumber'");
	
		$query1->execute();
		header("location:credit_continue.php");
	}
	else
	{
		echo"<h1>!...card name and card number incorrect...!</h1>";
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
?><img src="a.gif" />
	<h2>Credit Card method</h2>
	
		<div id="offerlog">
			<img src="mastercard.png" style="width:50px;height:50px;margin-top:10px;margin-bottom:15px;margin-left:30px;"/>
			<p style="margin-left:10%;margin-top:-4%;">Get 10% cashback* using Mastercard Debit/Credit Card at doorstep for your first cashless transaction *T&C apply<a href="term.php"><input type="submit" name="term" value="Learn More" style="border-radius:4px;margin-left:100px;width:100px;height:30px;border:1px solid aquamarine;"></a></p>
			</div>
			
			<div id="payment">
			


			<h5 style="font-size:23px;margin-top:10px;padding-left:35px;margin-bottom:20px;">Please fill name and number</h5>
<br><br>
			
	<form method="post">
	
		<b style="margin-left:35px;font-size:20px;font-weight:bold;margin-bottom:20px;">Name on card</b>
		
		
		<input type="text" name="cartname" style="margin-left:15px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;">
		
		<br><br><br>
		
		<b style="margin-left:35px;font-size:20px;font-weight:bold;margin-bottom:20px;" >Card number</b>
		
		<input type="text" name="cardnumber" style="margin-left:18px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;"><br><br>
		
		<br><b style="margin-left:35px;font-size:20px;font-weight:bold;margin-bottom:20px;">Expiration date</b>
		
		<input type="date" name="exdate" style="margin-left:1px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;"><br><br>
		
		
		
		
		<br><br>
		<input type="submit" value="Add your Card" name="validate" style="margin-left:175px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;">
		
	</form>
			</div>

	</body>
	</html>