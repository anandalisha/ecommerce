<html>
<head>
	<title>online.store.com</title>
	<link rel="stylesheet" href="index_style.css" />

</head>
<style>
body{background:#fff;}
.cart{width:100%;padding:1%;box-sizing:border-box;background:#fff;min-height:460px;}
.cart form table{width:100%;}
.cart form table tr th{font-size:14px;background:#e6e6e6;height:40px;color:#666;text-align:left;padding-left:1%;}
.cart form table tr td{font-size:14px;height:60px;padding-left:1.2%;}
.cart form table tr td img{width:100px;height:100px;}
.cart form table tr td img:hover{transform:scale(5,5);transition:1.40s;cursor:pointer;margin-left:55px;}
.cart form table tr td input[type="text"]{padding-left:1%;width:12%;height:30px;}
.cart form table tr td input[type="submit"]{background:#fff;color:#000;width:20%;height:30px;border:1px solid #400040;}

.cart form table tr td input[type="submit"]:hover{background:#400040;color:#fff;cursor:pointer;}
#buy_now{border-radius:3px;width:180px;height:35px;background:#fff;border:1px solid #400040; }

#buy_now:hover{background:#400040;color:#fff;}

#buy_now a{text-decoration:none;color:#000;display:block;}
#buy_now a:hover{background:#400040;color:#fff;display:block;}

#tdd{color:#008080;font-size:14px;border-top:1px solid #400040;border-bottom:1px solid #400040;width:10px;padding-right:20px;}

#tdd:hover{color:#fff;background:#400040;}


.cart form table tr td h2{border:1px solid #400040;border-radius:4px;margin-left:40px;color:red;text-align:center;margin-top:40px;background:#fff;color:#400040;height:40px;line-height:40px;width:100%;}

.cart form table tr td h2:hover{animation:navmenu 1000ms forwards;margin-left:40px;color:red;text-align:center;margin-top:40px;background:#400040;color:#fff;height:40px;line-height:40px;width:100%;}




@keyframes navmenu
{
	0%
	{
		opacity:0;
		top:5px;
	}
	100%
	{
		opacity:1;
		top:0px;
	}
}
#cart_p{margin-top:50px;font-size:15px;margin-left:15px;}

#sfl h2{margin-top:30px;}

#sflshow img{width:100px;height:100px;margin:20px;}

#sflshow li{margin-left:150px;margin-top:-120px;margin-bottom:80px;list-style-type:none;font-size:2opx;font-weight:bold;color:#0066c0;}
#sflshow li a{text-decoration:none; color:#0066c0;}
#nameoftable{}
</style>

		<body>
		
				
				
				
				
				
				<?php 
				
				include("header_index.php");
				include("navbar.php");
				
				
				
			
				
				
				?>
				
				<div class="cart">
				<form method="post" enctype="multipart/form-data">
					
					<table   cellpadding="0" cellspacing="0">
						
						<?php echo cart_display(); 
						
						include("saveforlatershow.php");
						
						
						
						?>
					
				
				
				
				</form>
				</div>
				
				
			
				
				
				
				
				
		</body>

</html>
<?php

function cart_display()
		{
			include("db.php");
			$net_total=0;
		
			$a=1;
			$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
			$get_user_item->execute();
			
			$user_getch=$get_user_item->fetch();
			$userid=$user_getch['ID'];
			
			$readsavf=$con->prepare("select * from saveforlater where userid='$userid'");
			
			
				if($readsavf->execute())
				{
					$save_empty=$readsavf->rowCount();
				}
			
			
			$get_cart_item=$con->prepare("select * from cart where userid='$userid'");
			
			$get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
			if($get_cart_item->execute())
			{
			$cart_empty=$get_cart_item->rowCount();
			}
			
			if($cart_empty==0)
			{
				
				if($save_empty!=0)
				{
							echo"
							<h2>Shopping Cart</h2><br>
							<h2>Your Shopping Cart is empty.</h2><br>
							<h6>You have items saved to buy later. To buy one or more now, click <strong>Move to cart</Strong> next to the item.</h6>";
					
				}
				else
				{
						echo"<center><h2>Your Shopping Cart is empty.<a href='index.php' style='margin-left:10px;'>Continue Shoping</a></h2></center>";
						echo"<br><p id='cart_p'>Your Shopping Cart lives to serve. Give it purpose--fill it with books, CDs, videos, DVDs, electronics, and more. If you already have an account, <a href='login_session.php' style='margin:10px;font-size:30px;'>Sign In </a>to see your Cart. 
						<br>Continue shopping on the <a href='index.php' style='margin:10px;font-size:30px;'> OnlieStore.in homepage,</a> learn about today's deals, or visit your Wish List.</p>
							<p id='cart_p'>The price and availability of items at Amazon.in are subject to change. The shopping cart is a temporary place to store a list of your items and reflects each item's most recent price.

								<br>Do you have a promotional code? We'll ask you to enter your claim code when it's time to pay.</p>
							
							";
				}
			}
			else
			{
				if(isset($_POST['up_qty']))
				{
					$quatity=$_POST['qty'];
					
					foreach($quatity as $key=>$value)
					{
						if($value>10)
						{
							echo"<script>alert('Maximum You Buy The Product 10 Only');</script>";
						}
						else
						{
								$update_qty=$con->prepare("update cart set qty='$value' where cart_id='$key'");
							
								if($update_qty->execute())
								{
									echo"<script>window.open('placeorder.php','_self');</script>";
								}
						}
					}
				}
				echo"<tr>
							<th>Images</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Save for Later</th>
							<th>Remove</th>
							<th>Sub Total</th>
						</tr>";
				while($row=$get_cart_item->fetch()):
				
				
					$pro_id=$row['pro_id'];
					$get_pro=$con->prepare("select * from products where pro_id='$pro_id'");
					$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
					$get_pro->execute();
					
					$row_pro=$get_pro->fetch();
					echo"<tr>
					
							<td><img src='../imgs/ragava/".$row_pro['pro_img1']."' /></td>
							<td id='nameoftable'>".$row_pro['pro_name']."</td>
							<td><input type='text' name='qty[".$row['cart_id']."]' value='".$row['qty']."'/><input type='submit' name='up_qty' value='save'></td>
							<td>".$row_pro['pro_price']."</td>
							
							<td><a href='saveforlater.php?save_id=".$row_pro['pro_id']."'>Save For later</a></td>
							
							<td><a href='delete_placeorder.php?delete_id=".$row_pro['pro_id']."'>Delete</a></td>
							
							<td>";
								
								$qty=$row['qty'];
								$pro_price=$row_pro['pro_price'];
								$sub_total=$pro_price*$qty;
								
								echo $sub_total;
								
								$net_total=$net_total+$sub_total;
							
							echo"</td>
						</tr>";
					
						
				
				endwhile;
				echo"<tr>
						<td></td><td></td>
						<td><button id='buy_now'><a href='index.php'>Continue Shopping</a></button></td>
						<td><button  id='buy_now'><a href='deliverydetails.php'>Checkout</a></button></td>
						<td></td><td id='tdd' ><b>Net Total(Rs.)=</b></td>
						<td id='tdd' style=''> <b>$net_total</b></td>
					
					</tr>";
					if($net_total>499)
					{
						echo"<tr>
						<td colspan='6'><h2>Cart Subtotal($cart_empty items):Rs.$net_total.00  Your order Eligible for <span style='color:#ADFF2F;background:#000;'>FREE</span> Delivery </h2></td>
					
					</tr>";
					}
					else
					{
						$net=499-$net_total;
						echo"<tr>
						
						<td colspan='6'><h2>Cart Subtotal($cart_empty items):Rs.$net_total.00 Add Rs.$net of eligible items to your order for FREE Delivery.</h2></td>
						</tr> </table>";
					}
					
			
			}
			
			
			
			
		}		

		



?>