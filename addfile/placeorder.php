
<?php

if(isset($_POST['placeorder']))
	
	{
		include("db.php");
		echo"<script>alert('dfsdfsd')</script>";
		$a=1;
		$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
					$get_user_item->execute();
			
					$user_getch=$get_user_item->fetch();
					$userid=$user_getch['ID'];
					$get_cart_item=$con->prepare("select * from cart where userid='$userid'");
			
					$get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cart_item->execute();
					
					
					
				while($row=$get_cart_item->fetch()):
					$pro_id=$row['pro_id'];
					$pro_qty=$row['qty'];
					$get_pro=$con->prepare("select * from products where pro_id='$pro_id'");
					$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
					$get_pro->execute();
					
					$row_pro=$get_pro->fetch();
					$placeorder=$con->prepare("insert into placeorder(pro_id,qty,userid,date)values('$pro_id','$pro_qty','$userid',Now())");
		
					$placeorder->execute();
				
				
				
		endwhile;
					$cartdelete=$con->prepare("delete from cart where userid='$userid'");
					
					$cartdelete->execute();
					
					$query=$con->prepare("select * from payment where set_online='1'");
	
			$query->execute();
			
			$row1=$query->fetch();
			
			$username=$row1['username'];
					$query1=$con->prepare("update payment set set_online='0' where username='$username'");
	
			$query1->execute();
			header("location:index.php");		
	}


?>












<html>

<head>
<style>
 img{margin-top:20px;margin-bottom:20px;margin-left:100px;}
 h2{font-weight:normal;font-size:30px;margin-left:100px;}
#box1{width:60%;height:100px;background:#fff;margin-left:100px;margin-top:-20px;border:1px solid aquamarine;}

#box2{width:60%;height:420px;background:#fff;margin-left:100px;margin-top:10px;border:1px solid aquamarine;}

#box2 table{width:100%;padding:10px;}

#box2 table tr th{padding-top:10px;text-align:left;}
#box2 table tr td{text-align:left;}

#box3{
	width:310px;
	height:70%;
	background:#fff;
	float:right;
	margin-right:100px;
margin-top:-40%;
border:1px solid aquamarine;

}

#box4{width:60%;height:auto;background:#fff;margin-left:100px;margin-top:10px;border:1px solid aquamarine;}
#box4 table{width:100%;margin-top:-1%;}

#box4 tr td{text-align:left;margin:10px;margin-top:20px;width:120px;height:auto;}
#box4 tr td img{width:100px;height:100px;margin-left:1%;}
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
			
			$username=$row1['username'];
			
			$payment_method=$row1['payment_method'];
			
?>
<a href="index.php"><img src="placeorder.gif" /></a>
	<h2>Review your order</h2>
	
	<h6 style="margin-left:100px;margin-top:-20px;font-weight:normal;font-size:15px;">By clicking on the 'Place Your Order and Pay' button, you agree to Amazon.in's<a href="#" style="color:#0066C0;text-decoration:none;"> privacy notice</a> and <a href="#" style="color:#0066C0;text-decoration:none;">conditions of use.</a></h6>
	
	<div id="box1">
		
		<b style="width:100px;height:50px;margin:25px;background:#fff;font-size:40px;">&#x27BE;<b style="margin:10px;font-size:30px;">Important message</b></b>
		<br>
	
		<input type="checkbox" name="important" style="margin-left:100px;margin-top:10px;"><b style="font-weight:normal;"> Check this box to default to these delivery and payment options in the future.</b>
	</div>
	
	<div id="box2">
	<table>
	
	<tr>
		<th>
		Shipping address <a href="deliverydetails.php" style="color:#0066C0;text-decoration:none;">Change</a>
		</th>
		<th>
		Payment method <a href="delivery_details_payments.php" style="color:#0066C0;text-decoration:none;">Change</a>
		</th>
		<th>
		Gift cards, Voucher & Promotional codes
		</th>
		
		
	</tr>
	<tr>
		<td>
		<?php echo"<b>".$row['username']."</b> <br>".$row['address']."<br>".$row['city']."<br>".$row['pincode']."<br>India";?>
		</td>
		<td>
		<?php echo"$payment_method";?> <br>
		Get 10% cashback*<br>Use Mastercard *T&C apply
		</td>
		<td>
		<input type="text" placeholder="Enter Code" name="code" style="margin-left:20px;padding-left:10px;border:1px solid #400040;width:200px;height:30px;border-radius:4px;"> 
		
		<input type="submit" value="Apply" name="aplly"style="margin-left:10px;border:1px solid #400040;width:50px;height:30px;border-radius:4px;">
		</td>
		
		
	</tr>
	<tr>
		<td>
		Phone:<?php echo"".$row['phone']."";?><br>
		<a href="#" style="color:#0066C0;text-decoration:none;">Deliver to multiple addresses</a>
		</td>
		<td>
		
		</td>
		<td>
		
		</td>
		
		
	</tr>
	
	<tr>
		<td><br>
		<b style="font-size:20px;font-weight:bold;">What if I am not in?</b><br>

		<a href="#" style="color:#0066C0;text-decoration:none;">Tell us where to leave your package</a>
		</td>
		<td>
		
		</td>
		<td>
		
		</td>
		
		
	</tr>
	
		<tr>
		<td >
		<img src="pickup.png" style="margin-left:1%;width:40px;height:40px;"><b style="color:#e47911;font-size:20px;"><br>Also Available for <br>Pickup</b>
		<br><b style="font-size:16px;">4 pickup locations</b> near <br>this address <a href="#" style="color:#0066C0;text-decoration:none;">Choose</a>
		</td>
		<td>
		
		</td>
		<td>
		
		</td>
		
		
	</tr>
	
	</table>
	</div>
	
	<div id="box3">
		
	
		
		<?php
			include("db.php");
			$a=1;
			$net_total=0;
			$delivery=0;
			
			$offer=0;
			$offer_amount=0;

			$ordertotal=0;
			
			$getaddress=$con->prepare("select * from newuser where set_online='$a'");
			$getaddress->execute();
			
			$row1=$getaddress->fetch();
			
			$userid=$row1['ID'];
			
				$get_cart_item=$con->prepare("select * from cart where userid='$userid'");
			
			$get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cart_item->execute();
			
			while($row=$get_cart_item->fetch()):
				
				
					$pro_id=$row['pro_id'];
					$get_pro=$con->prepare("select * from products where pro_id='$pro_id'");
					$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
					$get_pro->execute();
					
					$row_pro=$get_pro->fetch();
			
								$qty=$row['qty'];
								$pro_price=$row_pro['pro_price'];
								
								$offer=$pro_price/10;
								
								$offer_amount=$offer_amount+$offer;
								
								$sub_total=$pro_price*$qty;
								
								//echo $sub_total;
								
								$net_total=$net_total+$sub_total;
								
								
			endwhile;


				if($net_total>499)
				{
					$delivery=0;
				}
				else
				{
					$delivery=50;
				}

				$total=$net_total+$delivery;	
				
				$cc=1;
				
				if($total<600)
				{
					$promotion=50;
					
					$cc=$cc+1;
				}
				if($cc==1)
				{
						if($total<10000)
						{
							$promotion=100;
							$cc=$cc+1;
					
						}
						
				}
				if($cc==1)
				{
					if($total>20000)
					{
						$promotion=200;
						$cc=$cc+1;
			
					}
				}
						if($cc==1)
						{
							if($total<200)
							{
							$promotion=25;
							}
						}
				
				$ordertotal=$total-$promotion;
				
?>
		
		
	
		
		
		
		
		
		
		<input type="submit" name="placeorder" value="Place your order" style="width:240px;height:40px;margin:30px;margin-top:20px;color:#000000;background:#ff9900;font-size:15px;border:1px solid red;border-radius:4px;margin-bottom:-10px;">
	<h4 style="margin-left:30px;">Order Summary</h4>
	
	<h5 style="margin-left:30px;font-weight:normal;margin-top:-10px;font-size:17px;">Items:<b style="float:right;margin-right:14%;font-size:17px;font-weight:normal;">Rs.<?php echo"$net_total";?>.00</b></h5>
	<h5 style="margin-left:30px;font-weight:normal;margin-top:-15px;font-size:17px;">Delivery:<b style="float:right;margin-right:14%;font-size:17px;font-weight:normal;">Rs.<?php echo"$delivery";?>.00</b></h5>
	<h5 style="margin-left:30px;font-weight:normal;margin-top:-15px;font-size:17px;">Total:<b style="float:right;margin-right:14%;font-size:17px;font-weight:normal;">Rs.<?php echo"$total";?>.00</b></h5>
	<h5 style="margin-left:30px;font-weight:normal;margin-top:-15px;font-size:17px;">Promotion Applied:<b style="float:right;margin-right:14%;font-size:17px;font-weight:normal;">- Rs.<?php echo"$promotion";?>.00</b></h5>
	
	<hr style="margin-left:20px;margin-right:20px;margin-top:-10px;margin-bottom:10px;">
	<h3 style="margin-left:30px;font-weight:bold;margin-top:10px;font-size:20px;">Order Total:<b style="float:right;margin-right:14%;font-size:20px;">Rs.<?php echo"$ordertotal";?>.00</b></h3>
	<hr>
	
	<h3 style="margin-left:30px;font-weight:bold;margin-top:10px;font-size:15px;">
Your Total Savings:<b style="float:right;margin-right:14%;font-size:15px;">Rs.<?php echo"$offer_amount";?>.00</b></h3>
	
	<h3 style="margin-left:30px;font-size:15px;font-weight:normal;margin-top:-10px;">Promotions applied:<br>
<li style="margin-left:20px;font-weight:normal;font-size:15px;padding-left:-10px;">FREE Delivery</li></h3>
	<a href="#" style="text-decoration:none;color:#0066C0;font-size:15px;font-weight:normal;margin-left:30px;margin-bottom:10px;">How are delivery costs calculated?</a><br>
	
		<a href="#" style="text-decoration:none;color:#0066C0;font-size:15px;font-weight:normal;margin-left:30px;padding-top:20px;">Why didn't I qualify for FREE Delivery?</a>

	</div>
	
	
	<?php
	include("db.php");
	$getdate=date('d');
			
					$getdateadd=$getdate+2;
					$gettodate=$getdateadd+2;
					$a=1;
					$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
					$get_user_item->execute();
			
					$user_getch=$get_user_item->fetch();
					$userid=$user_getch['ID'];
					$get_cart_item=$con->prepare("select * from cart where userid='$userid'");
			
					$get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cart_item->execute();
				
				while($row=$get_cart_item->fetch()):
					$pro_id=$row['pro_id'];
					$get_pro=$con->prepare("select * from products where pro_id='$pro_id'");
					$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
					$get_pro->execute();
					
					$row_pro=$get_pro->fetch();
					
					$getten=$row_pro['pro_price']/10;
					
					$getten1=$row_pro['pro_price']-$getten;
										echo"<div id='box4'>
											 
												
										<h3 style='color:#e47911;margin-left:15px;font-size:20px;';>Estimated delivery:  ".$getdateadd." Mar 2018 - ".$gettodate." Mar 2018</h3>
										<table>
										
										<tr>
										<td style='width:60px;'>
										<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'><img src='../imgs/ragava/".$row_pro['pro_img1']."' />
										
										
										</td>
										<td>
												<b>".$row_pro['pro_name']."</b><br><br>
												<del>Rs.".$row_pro['pro_price']."</del><b style='margin-left:20px;'>Rs.".$getten1."</b><br>
												
												<br><b>You Save: ".$getten."(10%)</b><br><br>
												
												<b>Offer: Rs.50 back with Amazon Pay balance</b>
										
										
										</td>
										<td>
										
										
										<b>Choose a delivery speed:<b><br>
												<input type='radio' name='delivery'><b>Between ".$getdateadd." - ".$gettodate." Mar  — Free Delivery on eligible orders</b>
										</td>
										</tr>
										<tr>
										<td>
										</td>
										
										<td>
									<b>	quantity:".$row['qty']."</b>
										</td>
										
										<td>
										<a href='cart_placeorder.php' style='color:#0066C0;text-decoration:none;'>Change Quantity and Delete</a>
										</td>
										</tr>
										</table>
										
										
										
										</div>";
										
										
				endwhile;
	
	
	
	include("backtotop.php");
	?>
	</form>
</body>
</html>





