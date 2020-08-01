<?php

	if(isset($_POST['cominsert']))
	{
		include("db.php");
		$a=1;
			$getaddress=$con->prepare("select * from newuser where set_online='$a'");
			$getaddress->execute();
			
			$row=$getaddress->fetch();
		$pro_id=$_GET['pro_id'];
		
		$rating=$_POST['rating'];
		$dec=$_POST['dec'];
		$username=$row['username'];
		
		$reviewimg=$_FILES['reviewimg']['name'];
			$pro_img1_tmp=$_FILES['reviewimg']['tmp_name'];
	
			move_uploaded_file($pro_img1_tmp,"../imgs/ragava/$reviewimg");	
		
		$pro_fetch=$con->prepare("insert into comment(pro_id,rating,decc,username,date,com_img)values('$pro_id','$rating','$dec','$username',Now(),'$reviewimg')");
				
			
				$pro_fetch->execute();
				
				echo"<script>alert('comment stored')</script>";
				header("location:pro_detail.php?pro_id=$pro_id");
	}


?>

<html>

<head>
<style>
#cont{width:80%;height:600px;background:#fff;margin-left:10%;}
#img1{width:160px;height:160px;margin-left:10px;margin-top:10px;margin-bottom:10px;}
input[type="submit"]{margin-top:10px;margin-left:530px;width:100px;height:30px;border:1px solid #400040;border-radius:4px;background:#fff;}
input[type="submit"]:hover
{
	color:#fff;
	background:#000;
}

</style>
</head>
<body>
<?php
			if(isset($_GET['pro_id']))
			{
				include("db.php");
				$pro_id=$_GET['pro_id'];
				
				
				$pro_fetch=$con->prepare("select * from products where pro_id='$pro_id' ");
				$pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
			
				$pro_fetch->execute();
				
				$row_pro=$pro_fetch->fetch();
				
				$a=1;
			$getaddress=$con->prepare("select * from newuser where set_online='$a'");
			$getaddress->execute();
			
			$row=$getaddress->fetch();
				
			}
		include("header_demo.php");
		include("navbar.php");

		
?><form method="post" enctype="multipart/form-data">
	<div id="cont">
	<h1 style="font-weight:bold;margin-top:30px;color:#0066c0;">Your reviews</h1>
	<h1 style="font-weight:bold;float:right;margin-top:-40px;color:#0066c0;"><?php echo"".$row['username']."";?></h1>
	<hr style="margin-top:20px;margin-bottom:20px;">
	
	<?php echo"<img id='img1' src='../imgs/ragava/".$row_pro['pro_img1']."' />";


		echo"<h1 style='font-weight:normal;margin-top:-150px;margin-left:230px;font-size:16px;color:#0066c0;'>".$row_pro['pro_name']."</h1>";



	?>
	<br><input type="text" name="rating" placeholder="Rating eg:1,2,3,4,5 only number" pattern="[1-5]{1}" required style="margin-top:-100px;margin-left:230px;width:240px;height:35px;border:1px solid #400040;border-radius:4px;">
	<br><input type="text" name="dec" placeholder="write your review here" required style="margin-top:10px;margin-left:230px;width:400px;height:55px;border:1px solid #400040;border-radius:4px;">
	<br>
	<input type="file" name="reviewimg" style="margin-top:10px;margin-left:230px;width:240px;height:35px;"><br>
	
	<input type="submit" value="Submit" name="cominsert">
	 	<hr style="margin-top:20px;margin-bottom:20px;">
	
	</div></form>
	<?php include("backtotop.php");?>
</body>
</html>