<html>
<head>

<style>
#bodyright{padding:20px;box-sizing:border-box;border-radius:3px;width:80%;height:500px;background-image:url("s2.png");float:right;

margin-top:-37.0%;

}
#box1{width:350px;hieght:auto;background:transparent;border:1px solid aquamarine;}
h1{color:#fff;}
h2{text-align:left;color:#fff;margin:20px;}
input[type="submit"]
{
	width:100px;height:30px;background:transparent;border:1px solid #fff;color:#fff;margin-left:30px;margin-bottom:10px;
}
</style>
</head>
<body>
<div id="bodyright">
<?php

	include("db.php");
	
	$a=1;
	$orderdetails=$con->prepare("select * from newuser where set_online='$a'");
	
	$orderdetails->execute();
	
	$row=$orderdetails->fetch();
	
	$userid=$row['ID'];
	
		
	echo"<h1>Your Address</h1>";
		echo"<div id='box1'>";
		echo"<h2>".$row['username']."</h2>";
		
		echo"<h2>".$row['address'].",</h2>";
		echo"<h2>".$row['city'].",</h2>";
		echo"<h2>".$row['pincode'].".</h2>";
		echo"<h2>".$row['email']."</h2>";
					
		echo"<h2>".$row['phone']."</h2><br><a href='edit_address.php?userid=".$row['ID']."'><input type='submit' value='Edit' ></a>";
	
		echo"</div>";
		
		echo"<img src='../imgs/ragava/".$row['user_img']."' style='width:400px;height:360px;float:right;margin-top:-360px;margin-right:200px;border-radius:4px;border:1px solid aquamarine;'/>";
?>
</div>
</body>
</html>