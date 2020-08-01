<html>
<head>
<style>
body{background:#fff;}
#details{margin-left:100px;margin-right:150px;background:#fff;box-shadow:0px 0px 0px #eee;width:100%;height:auto;}
 img{margin-top:20px;margin-bottom:20px;margin-left:10px;}
 h2{font-weight:normal;font-size:30px;margin-left:100px;}
 
  #ragava{margin-top:-9px;}
 
#details table{width:100%;margin-left:0%;}

td{text-align:left;margin:0%;}
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
	<h2>Choose your delivery options</h2><hr>
<div id="details">
	<?php $getdate=date("d");
			
					$getdateadd=$getdate+2;
					$gettodate=$getdateadd+2;
			
			?>
	<table><tr>
		<td><h4 style="font-size:30px;margin-top:10px;">Shipment 1 of 1</h4></td><td><h4 style="font-size:20px;margin-top:0%;margin-left:35%;">Also Available for Pickup</h4></td>
		</tr>
		<tr><td><h3 style="font-size:20px;margin-top:-20px;">Shipping from online store</h3><img src="alogo.png" style="margin-left:21%;margin-top:-3.5%;"></td>
		<td>	<a href="#"><h4 style="font-size:15px;margin-top:-2%;margin-left:37%;">Choose from 4 pickup locations near you</h4></a></td>
		
		</tr><tr><td><?php echo"<br><b style='margin-top:-20%;color:green;'>".$row['address']."</b><br>".$row['city']." ,".$row['pincode']." ,India";
			?></td>
			
			<td><h4 style="font-size:20px;margin-top:0%;margin-left:37%;">Choose a delivery speed</h4>
			<input type="radio" name="fast" style="margin-left:39%;"><b style="padding-left:10px;font-weight:normal;color:green;font-size:20px;">Between</b><b style="margin-left:10px;color:green;"> <?php echo "$getdateadd";?></b> -<b style="margin-left:10px;color:green;"><?php echo"$gettodate";?></b><b style="margin-left:10px;color:green;">-Mar </b> — Free Delivery on eligible orders</b><a href="#"> (See details)</a>
			<input type="radio" name="fast1" style="margin-left:39%;margin-top:20px;"><b style="padding-left:10px;font-weight:normal;">Friday  — One-Day Delivery at Rs. 100. FREE with Prime</b><a href="#"> (See details)</a></td>
			
			</tr>
			
			<?php
			
			
			$gett=$row['ID'];
			
			$getaddress1=$con->prepare("select * from cart where userid='$gett'");
			$getaddress1->execute();
			
			while($row1=$getaddress1->fetch()):
			
			$getproid=$row1['pro_id'];
			
			$getpro=$con->prepare("select * from products where pro_id='$getproid'");
			$getpro->execute();
			
			$row2=$getpro->fetch();
			$getprice=$row2['pro_price'];
			$getoffer=$getprice/10;
			$saleoffer=$getprice-$getoffer;
			
			echo"<tr><td><li style='margin:20px;'>".$row2['pro_name']."<br><br><del>RS.".$row2['pro_price']."</del><b style='margin-left:10px;'> Rs.$saleoffer </b><b style='margin-left:30px;'>Quantity:".$row1['qty']."</b></li></td><td></td><tr>";
			

			endwhile;
				
			
				
			?><tr><td></td><td><input type="submit" name="contine" value="continue" style="margin-left:40%;margin-top:0%;width:300px;height:40px;color:#fff;background:#400040;border:1px solid #400040;border-radius:4px;">
			</td></tr></table>	</div>
			
			
			<hr style="margin-top:60px;color:#EEE;">
			
			
		
			
		
		
		
		
		
		</form>

	
</body>
</html>


<?php

include("db.php");


	if(isset($_POST['contine']))
	{
		$a=1;
	
		if(isset($_POST['fast1']))
		{
			
					echo"<script>alert('friday delivery...!!!')</script>";
					$a=$a+1;
					
		}
		

			
			if(isset($_POST['fast']))
			{
				echo"<script>alert('two days delivery...!!!')</script>";
				$a=$a+1;
			}
			if($a==1)
				{
					echo"<script>alert('normal delivery...!!!')</script>";
					header("location:delivery_details_payments.php");

				}
				
				
	}
?>




