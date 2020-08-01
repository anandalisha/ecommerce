<?php 


		function getIp()
		{
			$ip=$_SERVER['REMOTE_ADDR'];
			
			if(!empty($_SERVER['HTTP_CLIENT_IP']))
			{
				$ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			{
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			return $ip;
		}
		
		
		function cart_display()
		{
			include("db.php");
			$net_total=0;
			$ip=getIp();
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
									echo"<script>window.open('cart.php','_self');</script>";
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
							<td><i class='fa fa-inr' style='font-size:15px;color:red;'></i>. ".$row_pro['pro_price']."</td>
							
							<td><a href='saveforlater.php?save_id=".$row_pro['pro_id']."' style='text-decoration:none;color:#000;'><i class='fa fa-save' style='font-size:24px;color:red;'></i> Save For later</a></td>
							
							<td><a href='delete.php?delete_id=".$row_pro['pro_id']."' style='text-decoration:none;color:#000;'> <i class='fa fa-trash-o' style='font-size:24px;color:red;'></i> Delete</a></td>
							
							<td>";
								
								$qty=$row['qty'];
								$pro_price=$row_pro['pro_price'];
								$sub_total=$pro_price*$qty;
								
								echo "<i class='fa fa-inr' style='font-size:15px;color:red;'></i>.$sub_total";
								
								$net_total=$net_total+$sub_total;
							
							echo"</td>
						</tr>";
					
						
				
				endwhile;
				echo"<tr>
						<td></td><td></td>
						<td><button id='buy_now'><a href='index.php'>Continue Shopping</a></button></td>
						<td><button  id='buy_now'><a href='deliverydetails.php'><i class='fa fa-cc-visa' style='font-size:24px;color:red;'></i> Checkout</a></button></td>
						<td></td><td id='tdd' ><b>Net Total</b></td>
						<td id='tdd' style=''> <b><i class='fa fa-inr' style='font-size:24px'></i>. $net_total</b></td>
					
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

				
				
				
		
		
		function add_cart()
		{
			include("db.php");
					
			if(isset($_POST['cart_btn']))
			{
				$pro_id=$_POST['pro_id'];
				$ip=getIp();
				$a=1;
				$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
				$get_user_item->execute();
				
				$user_getch=$get_user_item->fetch();
				$userid=$user_getch['ID'];
			
				$check_cart=$con->prepare("select * from cart where pro_id='$pro_id' AND userid='$userid'");
				
				$check_cart->execute();
				
				$row_check=$check_cart->rowCount();
				
				if($row_check==1)
				{
					echo"<script>alert('This Product Already added in your Cart');</script>";
				
				}
				else
				{
					if($userid==0)
					{
						echo"<script>alert('This Product Can not add your cart please login');</script>";
				
					}
					else
					{
						$add_cart=$con->prepare("insert into cart(pro_id,qty,ip_add,userid)values('$pro_id','1','$ip','$userid')");
						
						if($add_cart->execute())
						{
							echo"<script>window.open('index.php','_self');</script>";
						}
						else
						{
							echo"<script>alert('Try Again!!!');</script>";
						}
					}
				}
			
			}
		}
		
		function add_whishlist()
		{
			include("db.php");
					
			if(isset($_POST['whish_btn']))
			{
				$pro_id=$_POST['pro_id'];
				$ip=getIp();
				$a=1;
				$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
				$get_user_item->execute();
				
				$user_getch=$get_user_item->fetch();
				$userid=$user_getch['ID'];
			
				$check_cart=$con->prepare("select * from whishlist where pro_id='$pro_id' AND userid='$userid'");
				
				$check_cart->execute();
				
				$row_check=$check_cart->rowCount();
				
				if($row_check==1)
				{
					echo"<script>alert('This Product Already added in your Whishlist');</script>";
				
				}
				else
				{
					if($userid==0)
					{
						echo"<script>alert('This Product Can not add your Whishlist please login');</script>";
				
					}
					else
					{
						$add_cart=$con->prepare("insert into whishlist(pro_id,date,userid)values('$pro_id',Now(),'$userid')");
						
						if($add_cart->execute())
						{
							echo"<script>window.open('index.php','_self');</script>";
						}
						else
						{
							echo"<script>alert('Try Again!!!');</script>";
						}
					}
				}
			
			}
		}

		
		function delete_cart_items()
		{
						include("db.php");
						
			if(isset($_GET['delete_id']))
			{
				$pro_id=$_GET['delete_id'];
				
				$delete_pro=$con->prepare("delete from cart where pro_id='$pro_id'");
				
				if($delete_pro->execute())
				{
					echo"<script>alert('Cart Item Deleted Successfully');</script>";
					echo"<script>window.open('cart.php','_self');</script>";
				}
				else
				{
					echo"<script>alert('Cart Item Deleted Not Successfully');</script>";
				
				}
			}
		}


		function electronics()
		{
			
			include("db.php");
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='32'");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			
			$cat_id=$row_cat['cat_id'];
			
			echo"<h3>".$row_cat['cat_name']."</h3>";
			
			
			
			$fetch_pro=$con->prepare("select * from products where cat_id='$cat_id' LIMIT 0,3");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			
			while($row_pro=$fetch_pro->fetch()):
			
			echo"
			
					<li>
						<form method='post' enctype='multipart/form-data'>
									<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
									
										<h4>".$row_pro['pro_name']."</h4>
									
										<img src='../imgs/ragava/".$row_pro['pro_img1']."' />
									
										<center>
											<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View  <i class='fa fa-eye' aria-hidden='true' style='font-size:15px;color:#000;'></i></a></button>
											<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'><i class='fa fa-shopping-cart' aria-hidden='true' style='font-size:15px;color:red;'></i>  Cart</button>
											<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
										</center>
										<b style='padding-top:10px;padding-left:10px;background:#a50200;color:#fff;border-radius:30px;width:50px;height:50px;float:left;margin-top:-115%;position:relative;margin-left:1px;'>10%<br><b style='padding-left:10px;;'>off</b></b>
									
									
									</a>
						</form>
					
					</li>
					
				";
			
			
			
		
		
			endwhile;
		
		}


	
		function dress()
		{
			include("db.php");
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='33'");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			
			$cat_id=$row_cat['cat_id'];
			
			echo"<h3>".$row_cat['cat_name']."</h3>";
			
			
			
			$fetch_pro=$con->prepare("select * from products where cat_id='$cat_id' LIMIT 0,3");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			
			while($row_pro=$fetch_pro->fetch()):
			
			echo"
			
					<li>
						<form method='post' enctype='multipart/form-data'>
									<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
									
										<h4>".$row_pro['pro_name']."</h4>
									
										<img src='../imgs/ragava/".$row_pro['pro_img1']."' />
									
										<center>
											<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View  <i class='fa fa-eye' aria-hidden='true' style='font-size:15px;color:#000;'></i></a></button>
											<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'><i class='fa fa-shopping-cart' aria-hidden='true' style='font-size:15px;color:red;'></i>  Cart</button>
											<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
										</center>
									
									<b style='padding-top:10px;padding-left:10px;background:#a50200;color:#fff;border-radius:30px;width:50px;height:50px;float:left;margin-top:-115%;position:relative;margin-left:1px;'>10%<br><b style='padding-left:10px;;'>off</b></b>
									
									
									</a>
						</form>
					
					</li>
					
				";
			
			
			
		
		
			endwhile;
		
		
		}
		
		
		function womendress()
		{
			include("db.php");
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='34'");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			
			$cat_id=$row_cat['cat_id'];
			
			echo"<h3>".$row_cat['cat_name']."</h3>";
			
			
			
			$fetch_pro=$con->prepare("select * from products where cat_id='$cat_id' LIMIT 0,3");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			
			while($row_pro=$fetch_pro->fetch()):
			
			echo"
			
					<li>
						<form method='post' enctype='multipart/form-data'>
									<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
									
										<h4>".$row_pro['pro_name']."</h4>
									
										<img src='../imgs/ragava/".$row_pro['pro_img1']."' />
									
										<center>
											<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View  <i class='fa fa-eye' aria-hidden='true' style='font-size:15px;color:#000;'></i></a></button>
											<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'><i class='fa fa-shopping-cart' aria-hidden='true' style='font-size:15px;color:red;'></i>  Cart</button>
											<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
										</center>
									
									<b style='padding-top:10px;padding-left:10px;background:#a50200;color:#fff;border-radius:30px;width:50px;height:50px;float:left;margin-top:-115%;position:relative;margin-left:1px;'>10%<br><b style='padding-left:10px;;'>off</b></b>
									
									
									</a>
						</form>
					
					</li>
					
				";
			
			
			
		
		
			endwhile;
		
		
		}
		
		
		
		function mobiles()
		{
			include("db.php");
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='35'");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			
			$cat_id=$row_cat['cat_id'];
			
			echo"<h3>".$row_cat['cat_name']."</h3>";
			
			
			
			$fetch_pro=$con->prepare("select * from products where cat_id='$cat_id' LIMIT 0,3");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			
			while($row_pro=$fetch_pro->fetch()):
			
			echo"
			
					<li>
						<form method='post' enctype='multipart/form-data'>
									<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
									
										<h4>".$row_pro['pro_name']."</h4>
									
										<img src='../imgs/ragava/".$row_pro['pro_img1']."' />
									
										<center>
											<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View  <i class='fa fa-eye' aria-hidden='true' style='font-size:15px;color:#000;'></i></a></button>
											<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'><i class='fa fa-shopping-cart' aria-hidden='true' style='font-size:15px;color:red;'></i>  Cart</button>
										<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
										</center>
									
									<b style='padding-top:10px;padding-left:10px;background:#a50200;color:#fff;border-radius:30px;width:50px;height:50px;float:left;margin-top:-115%;position:relative;margin-left:1px;'>10%<br><b style='padding-left:10px;;'>off</b></b>
									
									
									</a>
						</form>
					
					</li>
					
				";
			
			
			
		
		
			endwhile;
		
		}
		
		function pro_details()
		{
			include("db.php");
			
			if(isset($_GET['pro_id']))
			{
				$rv=1;
				$pro_id=$_GET['pro_id'];
				
				$pro_fetch1=$con->prepare("select * from recentview where pro_id='$pro_id' ");
				
			
				$pro_fetch1->execute();
				$rowc=$pro_fetch1->rowCount();
				if($rowc==0)
				{
				
					$pro_recent=$con->prepare("insert into recentview(pro_id,set_online,date)values('$pro_id','1',Now())");
					$pro_recent->execute();
				}
				else
				{
					$rv=$rv+1;
					$pro_fetch2=$con->prepare("update recentview set date=Now() where pro_id='$pro_id'");
					
					$pro_fetch2->execute();
				}
				$pro_fetch=$con->prepare("select * from products where pro_id='$pro_id' ");
				$pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
			
				$pro_fetch->execute();
				
				$row_pro=$pro_fetch->fetch();
			
				$offer=$row_pro['pro_price']/10;
				
				$selling_price=$row_pro['pro_price']-$offer;
				
						if($selling_price>=499)
						{
							$vari="(FREE Delivery)";
						}
						else
						{
							$vari="";
						}
					
					 $emi=$selling_price/10;

					
				$cat_id=$row_pro['cat_id'];
				
				echo"<div id='pro_img'>
				
					<img class='mySlides' id='myimage' src='../imgs/ragava/".$row_pro['pro_img1']."' />
					
				<ul>
				
					<li>
					
					<img class='mySlides' src='../imgs/ragava/".$row_pro['pro_img1']."' />
					
					</li>
					<li>
					
					<img class='mySlides' src='../imgs/ragava/".$row_pro['pro_img2']."' />
					
					</li>
					<li>
					
					<img class='mySlides' src='../imgs/ragava/".$row_pro['pro_img3']."' />
					
					</li>
					<li>
					
					<img class='mySlides' src='../imgs/ragava/".$row_pro['pro_img4']."' />
					
					</li>
					
				</ul>
				
				<div id='myresult' class='img-zoom-result'></div>
				</div>
				
				<div id='pro_features'>";
				
				$get_user_review11=$con->prepare("select * from comment where pro_id='$pro_id' ");
					
					
					$get_user_review11->execute();
					$noofcom1=$get_user_review11->rowCount();
					
					$liking=0;
		$disliking=0;
		$total=0;
		$percentOfLikes=0;
		$percentOfDislikes=0;
		$like=$con->prepare("select * from comment where pro_id='$pro_id'");
		
		$like->execute();
		while($row=$like->fetch()):
		
	
		$getrate=$row['rating'];
		
			if(($getrate==1)||($getrate==2))
			{
				$liking=$liking+$getrate;
			}
			if(($getrate==5)||($getrate==4)||($getrate==3))
			{
				$disliking=$disliking+$getrate;
			}
		
		endwhile;
		//echo"$liking and $disliking";
		
		$total=$liking+$disliking;
		
		//echo"<br>total: $total";
		if($total==0)
		{
			$percentOfDislikes=0;
		}
		else
		{
		
		$percentOfLikes= 5*$liking/$total;
		$percentOfDislikes=5*$disliking/$total;
		
	//	echo"<br>like:  $percentOfLikes";
		
		//echo"<br>like:  $percentOfDislikes <br><br>";
		
		//echo(round($percentOfLikes,2) . "<br>");
		}
					$a=0;$b=0;
				$c=0;$d=0;$e=0;
				$get_user_review1=$con->prepare("select * from comment where pro_id='$pro_id'");
					
					
					$get_user_review1->execute();
					$noofcom=$get_user_review1->rowCount();
					while($get_review1=$get_user_review1->fetch()):
							
						if($get_review1['rating']==1)
						{
							$a=$a+1;
						}
						if($get_review1['rating']==2)
						{
							$b=$b+1;
						}
						if($get_review1['rating']==3)
						{
							$c=$c+1;
						}
						if($get_review1['rating']==4)
						{
							$d=$d+1;
						}
						if($get_review1['rating']==5)
						{
							$e=$e+1;
						}
						endwhile;
				echo"
					
					<h3>".$row_pro['pro_name']."</h3> 
					
					<span><h5>$noofcom1 Customer Reviews</h5></span>
						<div id='showreview'><h6 style='height:20px;margin-top:-20px;font-size:13px;margin-bottom:10px;color:red;'>";echo round($percentOfDislikes,1)." out of 5 stars</h6><img src='star.jpg'>
						
						<h6 style='margin-top:-48%;color:#0066c0;margin-left:79%;font-size:13px;'>$a</h6>
						<h6 style='margin-top:1.5%;color:#0066c0;margin-left:79%;font-size:13px;'>$b</h6>
						<h6 style='margin-top:1.5%;color:#0066c0;margin-left:79%;font-size:13px;'>$c</h6>
						<h6 style='margin-top:1.5%;color:#0066c0;margin-left:79%;font-size:13px;'>$d</h6>
						<h6 style='margin-top:1.5%;color:#0066c0;margin-left:79%;font-size:13px;'>$e</h6></div>
					<ul>
					
						<li style='font-weight:bold;'>".$row_pro['pro_feature1']."</li>
						<li style='font-weight:bold;'>".$row_pro['pro_feature2']."</li>
						<li style='font-weight:bold;'>".$row_pro['pro_feature3']."</li>
						<li style='font-weight:bold;'>".$row_pro['pro_feature4']."</li>
						<li style='font-weight:bold;'>".$row_pro['pro_feature5']."</li>
					</ul>
				
					<ul>
					
						<li style='font-weight:bold;'>Model No.:".$row_pro['pro_model']."</li>
						
						<li style='font-weight:bold;'>Warranty :".$row_pro['pro_warranty']."</li>
						
					</ul><br clear='all' />
					
					<center>
					<h4 id='price'>Price: <i class='fa fa-inr' style='font-size:24px'></i>.<del style='padding-left:10px;'>".$row_pro['pro_price'].".00</del></h4>
					
						<h4 id='selling' ><b style='font-size:20px;'>Selling Price :</b><b style='font-size:40px;'> <i class='fa fa-inr' style='font-size:40px'></i>. $selling_price </b><b style='color:#112233;font-size:20px;'>$vari</b></h4>
						";
					
						
						echo "
					<h4 id='offer'>You Save: <i class='fa fa-inr' style='font-size:24px'></i>. $offer(10%)</h4>
				
					<form method='post'>
						<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
						
						
							
						<button id='buy_now' name='buy_now'>Buy Now</button>
						
						<button id='buy_now' name='cart_btn'><i class='fa fa-cart-plus' aria-hidden='true' style='font-size:15px;color:red;font-weight:bold;'></i> Add To Cart</button>
						
					</form>
				
					<div>

				 

					</center>
				<div id='prenext'>

<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
<a class='next' onclick='plusSlides(1)'>&#10095;</a>

</div>
				
				
			<div id='dont' '>
  <span class='dot' onclick='currentSlide(2)'></span> 
  <span class='dot' onclick='currentSlide(3)'></span> 
  <span class='dot' onclick='currentSlide(4)'></span> 
  <span class='dot' onclick='currentSlide(5)'></span> 
</div>
				</div><br clear='all' /> 
				<div id='botoimg'>
					<img  src='../imgs/ragava/".$row_pro['pro_img1']."' class='dot' onclick='currentSlide(2)' />
					<img  src='../imgs/ragava/".$row_pro['pro_img2']."' class='dot' onclick='currentSlide(3)' />
					<img  src='../imgs/ragava/".$row_pro['pro_img3']."'  class='dot' onclick='currentSlide(4)' />
					<img  src='../imgs/ragava/".$row_pro['pro_img4']."'  class='dot' onclick='currentSlide(5)' />
					
					
				
					</div>
					
					<div id='delvery'>
					
					<li><b>Cash on Delivery</b> eligible</li>
					";
					if($selling_price>=5000)
					{
						echo"<li><b>EMI</b> start at Rs.$emi</li>";
					}
					else
					{
						echo"<li><b>EMI</b> Not Available</li>";	
					}
						
						
						
						
				echo" <li>Inclusive of all taxes</li><li ><b style='color:green;'>In stock.</b></li>	";
				
				if($selling_price>=10000)
				{
					$exchange=$selling_price-9000;
					echo" <li id='exchange'><b style='font-size:17px;'>With Exchange</b><br><b style='padding-left:30px;font-size:15px;;'>Up to <b style='color:red;font-size:'>Rs.$exchange</b> off</b></li>	";
				}
				else
					{
						echo"<li id='exchange'><b style='font-size:17px;'>Without Exchange </b><b style='text-align:center;padding-left:25px;color:red;'>Rs. $selling_price</b><del style='padding-left:10px;'><b>MRP:".$row_pro['pro_price']."</b></del></li>";	
					}
				
					$a=1;
					$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
					
					
					$get_user_item->execute();
				
					$count_cart=$get_user_item->rowCount();
					$user_getch=$get_user_item->fetch();
					if(!empty($user_getch))
					{
						$username=$user_getch['username'];
						$city=$user_getch['city'];
						$pincode=$user_getch['pincode'];
						if($count_cart==1)
						{
						echo"
						
						 <li id='address'><b style='font-size:30px;padding-left:30px;color:#112233;'><i class='fa fa-map-marker' aria-hidden='true' style='color:#112233;'></i></b><b style='padding-right:20px;'> Deliver to $username</b><br><b style='font-size:15px;padding-left:70px;'>$city $pincode</b></li>";
						}
					}
				
				
				echo "</div>
					
					
				<div id='sim_pro'>
					
					<h3>Related Products</h3>
					
					
					<ul>";
					
					echo add_cart();
					
					$sim_pro=$con->prepare("select * from products where pro_id!=$pro_id AND cat_id='$cat_id' LIMIT 0,6");
					
					$sim_pro->setFetchMode(PDO:: FETCH_ASSOC);
					$sim_pro->execute();
					
					while($row=$sim_pro->fetch()):
					
						echo"<li>
						
								<a href='pro_detail.php?pro_id=".$row['pro_id']."'>
								
									<img src='../imgs/ragava/".$row['pro_img1']."' />
									<p id='rel_price' >".$row['pro_name']."</p>
									<p id='rel_price'>Price :".$row['pro_price']."</p>
								</a>
							
							</li>";
					
					endwhile;
					
					echo"</ul>
					
				</div>
				
				
				<div id='pro_des'>
				<h3>Product description-".$row_pro['pro_name']."</h3>
				<p style='padding-left:20px;color:#800080;font-size:30px;text-shadow:3px 3px 3px #400040;margin-top:10px;'>Product Description</p><br/> <br/><br/>
				
				<p style='padding-left:50px;margin-top:30px;'><b>".$row_pro['Sub_titile1']."    </b></p>
					
					<p style='padding-left:60px;margin-top:15px;margin-right:30px;'> ".$row_pro['Sub_titile1_details']."  </p>
				<p style='padding-left:50px;margin-top:20px;'><b>  ".$row_pro['Sub_titile2']."   </b></p>
					<p style='padding-left:60px;margin-top:15px;margin-right:30px;'>  ".$row_pro['Sub_titile2_details']."   </p>
				<p style='padding-left:50px;margin-top:20px;'><b> ".$row_pro['Sub_titile3']."   </b></p>
					<p style='padding-left:60px;margin-top:15px;margin-right:30px;'>  ".$row_pro['Sub_titile3_details']."   </p>
				<p style='padding-left:50px;margin-top:20px;'><b> ".$row_pro['Sub_titile4']."   </b></p>
					<p style='padding-left:60px;margin-top:15px;margin-right:30px;'>  ".$row_pro['Sub_titile4_details']."   </p>
		
				</div>

				<p style='padding-left:30px;margin-top:20px;font-size:30px;color:#400040;'><b>From the Manufacturer</b></p>
				
				<div id='ex'>
				

					
										<img  src='../imgs/ragava/".$row_pro['pro_img5']."' /><br>
					
					<p id='pro_ti4' style='margin-left:440px;margin-top:-250px;'><b>".$row_pro['sub_titile5']."</b></p><br>
					<p id='pro_ti5' style='margin-left:440px;margin-top:-230px;'>".$row_pro['sub_titile5_details']."</p>
					
					
										<img  src='../imgs/ragava/".$row_pro['pro_img6']."' /><br>
					
					<p id='pro_ti4' style='margin-left:440px;margin-top:-250px;'><b>".$row_pro['sub_titile6']."</b></p><br>
					<p id='pro_ti5' style='margin-left:440px;margin-top:-230px;'>".$row_pro['sub_titile6_details']."</p>
					
					
					
					
					<img  src='../imgs/ragava/".$row_pro['pro_img7']."' /><br>
					
					<p id='pro_ti4' style='margin-left:440px;margin-top:-250px;'><b>".$row_pro['sub_titile7']."</b></p><br>
					<p id='pro_ti5' style='margin-left:440px;margin-top:-230px;'>".$row_pro['sub_titile7_details']."</p>
					
										<img  src='../imgs/ragava/".$row_pro['pro_img8']."' /><br>
					
					<p id='pro_ti4' style='margin-left:440px;margin-top:-250px;'><b>".$row_pro['sub_titile8']."</b></p><br>
					<p id='pro_ti5' style='margin-left:440px;margin-top:-230px;'>".$row_pro['sub_titile8_details']."</p>
					
					<img  src='../imgs/ragava/".$row_pro['pro_img9']."' /><br>
					
					<p id='pro_ti4' style='margin-left:440px;margin-top:-250px;'><b>".$row_pro['sub_titile9']."</b></p><br>
					<p id='pro_ti5' style='margin-left:440px;margin-top:-230px;'>".$row_pro['sub_titile9_details']."</p>
					
					
					
					
					
					
					<img  src='../imgs/ragava/".$row_pro['pro_img10']."' /><br>
					
					<p id='pro_ti4' style='margin-left:440px;margin-top:-250px;'><b>".$row_pro['sub_titile10']."</b></p><br>
					<p id='pro_ti5' style='margin-left:440px;margin-top:-230px;'>".$row_pro['sub_titile10_details']."</p>
					
					
					<img  src='../imgs/ragava/".$row_pro['pro_img11']."' /><br>
					
					<p id='pro_ti4' style='margin-left:440px;margin-top:-250px;'><b>".$row_pro['sub_titile11']."</b></p><br>
					<p id='pro_ti5' style='margin-left:440px;margin-top:-230px;'>".$row_pro['sub_titile11_details']."</p>
					
					<h4>Key Features</h4>
					<li id='key'>".$row_pro['pro_feature1']."</li>
						<li id='key'>".$row_pro['pro_feature2']."</li>
						<li id='key'>".$row_pro['pro_feature3']."</li>
						<li id='key'>".$row_pro['pro_feature4']."</li>
						<li id='key'>".$row_pro['pro_feature5']."</li>
					
					
				</div>
				
				";
				
				$a=0;$b=0;
				$c=0;$d=0;$e=0;
				$get_user_review1=$con->prepare("select * from comment where pro_id='$pro_id'");
					
					
					$get_user_review1->execute();
					$noofcom=$get_user_review1->rowCount();
					while($get_review1=$get_user_review1->fetch()):
							
						if($get_review1['rating']==1)
						{
							$a=$a+1;
						}
						if($get_review1['rating']==2)
						{
							$b=$b+1;
						}
						if($get_review1['rating']==3)
						{
							$c=$c+1;
						}
						if($get_review1['rating']==4)
						{
							$d=$d+1;
						}
						if($get_review1['rating']==5)
						{
							$e=$e+1;
						}
						endwhile;
				
				$liking=0;
		$disliking=0;
		$total=0;
		$percentOfLikes=0;
		$percentOfDislikes=0;
		$like=$con->prepare("select * from comment where pro_id='$pro_id'");
		
		$like->execute();
		while($row=$like->fetch()):
		
	
		$getrate=$row['rating'];
		
			if(($getrate==1)||($getrate==2))
			{
				$liking=$liking+$getrate;
			}
			if(($getrate==5)||($getrate==4)||($getrate==3))
			{
				$disliking=$disliking+$getrate;
			}
		
		endwhile;
		//echo"$liking and $disliking";
		
		$total=$liking+$disliking;
		
		//echo"<br>total: $total";
		if($total==0)
		{
			$percentOfDislikes=0;
		}
		else
		{
		
		$percentOfLikes= 5*$liking/$total;
		$percentOfDislikes=5*$disliking/$total;
		
	//	echo"<br>like:  $percentOfLikes";
		
		//echo"<br>like:  $percentOfDislikes <br><br>";
		
		//echo(round($percentOfLikes,2) . "<br>");
				
		}		
				
				
				echo"
				
				<div id='review'>
				
					
					<h1 style='color:#fff;'>dfdsfdfdf</h1>
				
				<hr style='position:relative;'>
					
					<div id='rating'>
					<h3 style='color:#C60!important;'>Customer reviews</h3>
					";
					if($percentOfDislikes<=0.9)
					{
						echo"<img src='0off5.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if($percentOfDislikes==1)
					{
						echo"<img src='1star.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if(($percentOfDislikes>=1.1)&&($percentOfDislikes<=2))
					{
						echo"<img src='1off5.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if($percentOfDislikes==2)
					{
						echo"<img src='2star.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if(($percentOfDislikes>=2.1)&&($percentOfDislikes<=3))
					{
						echo"<img src='2off5.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if(($percentOfDislikes>=3.1)&&($percentOfDislikes<=4))
					{
						echo"<img src='3off5.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if($percentOfDislikes==3)
					{
						echo"<img src='3star.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if($percentOfDislikes==4)
					{
						echo"<img src='4star.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if(($percentOfDislikes>=4.1)&&($percentOfDislikes<=5))
					{
						echo"<img src='4off5.png' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					if($percentOfDislikes==5)
					{
						echo"<img src='5star.jpg' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>";
					}
					echo					
					"
					<p style='margin-top:-30px;margin-left:134px;'>$noofcom</p>
						<br><h3 style='height:20px;margin:0px;font-size:25px;'>";echo round($percentOfDislikes,1)." out of 5 stars</h3>
						<br><img src='star.jpg'>
						
						<h6 style='margin-top:-15.8%;color:#0066c0;margin-left:18%;font-size:15px;'>$a</h6>
						<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$b</h6>
				<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$c</h6>
				<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$d</h6>
				<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$e</h6>
				
				
				
				<h6 style='margin-top:-15%;margin-left:30%;font-size:15px;'>Share your thoughts with other customers</h6>
				<a href='pro_review.php?pro_id=".$pro_id."' style='text-decoration: none;'>	<input type='submit' name='comment' value='Write a product review' style='margin-top:2%;margin-left:30%;font-size:15px;width:200px;height:30px;border-radius:4px;border:1px solid #400040;'></a>
					<br><a href='view_all_comment.php?pro_id=".$pro_id."' style='text-decoration: none;'><h3 style='height:20px;margin-top:10%;color:#0066c0;font-size:12px;'>See all $noofcom customer reviews <b style='font-size:15px'>&#x21E8;</b></h3></a>
					
					
					
					
					
					
				
					
					</div>
				";
					$get_user_review=$con->prepare("select * from comment where pro_id='$pro_id' AND rating='5' Limit 0,10");
					
					
					$get_user_review->execute();
					echo"<h3 style='margin-left:15px;'>Top customer reviews</h3>";
					while($get_review=$get_user_review->fetch()):
					
					
						echo"<div id='reviewlist'><img src='avatar1.png' style='width:30px;height:30px;float:left;'>
						
						
				<p>".$get_review['username']."</p><br><br><br>
				
				
						";
				
				if($get_review['rating']==1)
				{
					echo"<img src='1star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Poor Hated it</p>";
				}
				if($get_review['rating']==2)
				{
					echo"<img src='2star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Below Average Disliked it</p>";
				}
				if($get_review['rating']==3)
				{
					echo"<img src='3star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Average It was Ok</p>";
				}
				if($get_review['rating']==4)
				{
					echo"<img src='4star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Above Average Liked it</p>";
				}
				if($get_review['rating']==5)
				{
					echo"<img src='5star.jpeg' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Excellent Loved it</p>";
					
				}
					
					echo"
					
					<br><p style='margin-left:10px;margin-top:-20px;'>".$get_review['date']."</p>
					
					<br><br><p style='margin-left:10px;margin-top:-20px;'>".$get_review['decc']."</p>
					
					
					<form method='post'>
					
						<br><br><b style='margin-left:10px;'> ".$get_review['helpful']." person found this helpful.  Was this review helpful to you?</b><a href='addhelful.php?id=".$get_review['com_id']."' style='width:40px;height:20px;margin-left:10px;border:1px solid #400040;background:#fff;border-radius:3px;text-decoration:none;font-size:15px;color:#000;'>yes</a>
						<input type='submit' name='no' value='no' style='width:40px;height:20px;margin-left:5px;margin-right:10px;border:1px solid #400040;background:#fff;border-radius:3px;'><b>Report abuse</b>
					
					</form>
					
					
					
					
					
					
					
					
					";

					echo"</div>";
					
					
					endwhile;
				
				
				echo"
						<div id='reviewlist1'>
						
								<h3 style='margin:20px;'>Most recent customer reviews</h3>
						";$get_user_review5=$con->prepare("select * from comment where pro_id='$pro_id' ORDER BY 1 DESC Limit 0,10");
					
					
					$get_user_review5->execute();
					
					while($get_review5=$get_user_review5->fetch()):
					
					
						echo"<div id='reviewlist3'><img src='avatar1.png' style='width:30px;height:30px;float:left;margin-left:10px;'>
						
						
				<p style='margin-top:5px;margin-left:5px;'>".$get_review5['username']."</p><br><br><br>
				
				
						";
				
						if($get_review5['rating']==1)
						{
							echo"<img src='1star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
							<br><br><p style='margin-left:120px;margin-top:-40px;'>Poor Hated it</p>";
						}
						if($get_review5['rating']==2)
						{
							echo"<img src='2star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
							<br><br><p style='margin-left:120px;margin-top:-40px;'>Below Average Disliked it</p>";
						}
						if($get_review5['rating']==3)
						{
							echo"<img src='3star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
							<br><br><p style='margin-left:120px;margin-top:-40px;'>Average It was Ok</p>";
						}
						if($get_review5['rating']==4)
						{
							echo"<img src='4star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
							<br><br><p style='margin-left:120px;margin-top:-40px;'>Above Average Liked it</p>";
						}
						if($get_review5['rating']==5)
						{
							echo"<img src='5star.jpeg' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
							<br><br><p style='margin-left:120px;margin-top:-40px;'>Excellent Loved it</p>";
							
						}
							
							echo"
					
					<br><p style='margin-left:10px;margin-top:-20px;'>".$get_review5['date']."</p>
					
					<br><br><p style='margin-left:10px;margin-top:-20px;height:auto;'>".$get_review5['decc']."</p>
					
					
						<br><br><a href='../imgs/ragava/".$get_review5['com_img']."'><img src='../imgs/ragava/".$get_review5['com_img']."' style='width:200px;height:100px;margin:10px;margin-left:50px;'></a><hr></div>";
						
						endwhile;
						echo"</div>
						
				</div>
				
				
				
				
				
				";
			}
		
			
			
		}

		function all_cat()
			{
				include("db.php");
				
				$all_cat=$con->prepare("select * from main_cat");

				$all_cat->setFetchMode(PDO:: FETCH_ASSOC);
				$all_cat->execute();

				while($row_id=$all_cat->fetch()):
					
					echo"<li><a href='#'>".$row_id['cat_name']."</a></li>";
				
				endwhile;
				
			}


		function cat_detail()
		{
			include("db.php");
			
			
			
			if(isset($_GET['cat_id']))
			{
				$cat_id=$_GET['cat_id'];
				
				$cat_pro=$con->prepare("select * from products where cat_id='$cat_id'");
				
				$cat_pro->setFetchMode(PDO:: FETCH_ASSOC);
				$cat_pro->execute();
				
				$cat_name=$con->prepare("select * from main_cat where cat_id='$cat_id'");
				
				$cat_name->setFetchMode(PDO:: FETCH_ASSOC);
				$cat_name->execute();
				
				$row=$cat_name->fetch();
				$row_main_cat=$row['cat_name'];
				echo"<h3>$row_main_cat</h3>";
				while($row_cat=$cat_pro->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_cat['pro_id']."'>
						
							<h4>".$row_cat['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_cat['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_cat['pro_id']."'>View</a></button>

								<input type='hidden' value='".$row_cat['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'>Cart</button>
								<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
				
			}
			
			
			
		}
		
		function viewall_sub_cat()
		{
			include("db.php");
			
			if(isset($_GET['cat_id']))
			{
				$cat_id=$_GET['cat_id'];
				
				$sub_cat=$con->prepare("select * from sub_cat where cat_id='$cat_id'");
				
				$sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
				$sub_cat->execute();
						echo"<h3>Sub Categories</h3>";
				while($row=$sub_cat->fetch()):
				
					echo"<li><a href='cat_detail.php?sub_cat_id=".$row['sub_cat_id']."'>".$row['sub_cat_name']."</a></li>";
					
					
				
				endwhile;
				
				
				
			}
			
			
			
			
		}
		
		
		
		
		
		function sub_cat_detail()
		{
			include("db.php");
			
			
			
			if(isset($_GET['sub_cat_id']))
			{
				$sub_cat_id=$_GET['sub_cat_id'];
				
				$sub_cat_pro=$con->prepare("select * from products where sub_cat_id='$sub_cat_id'");
				
				$sub_cat_pro->setFetchMode(PDO:: FETCH_ASSOC);
				$sub_cat_pro->execute();
				
				$sub_cat_name=$con->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id'");
				
				$sub_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
				$sub_cat_name->execute();
				
				$row=$sub_cat_name->fetch();
				$row_sub_cat=$row['sub_cat_name'];
				echo"<h3>$row_sub_cat</h3>";
				while($row_sub_cat=$sub_cat_pro->fetch()):
			
			echo"
			
					<li>
					
						<a href='pro_detail.php?pro_id=".$row_sub_cat['pro_id']."'>
						
							<h4>".$row_sub_cat['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_sub_cat['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_sub_cat['pro_id']."'>View</a></button>
								<button id='pro_btn'><a href='#'>Cart</a></button>
								<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</li>
					
				";
				
				
				endwhile;
				
			}
			
			
			
		}
		
		function viewall_cat()
		{
			include("db.php");
			
			if(isset($_GET['sub_cat_id']))
			{
				
				
				$main_cat=$con->prepare("select * from main_cat");
				
				$main_cat->setFetchMode(PDO:: FETCH_ASSOC);
				$main_cat->execute();
						echo"<h3>Categories</h3>";
				while($row=$main_cat->fetch()):
				
					echo"<li><a href='cat_detail.php?cat_id=".$row['cat_id']."'>".$row['cat_name']."</a></li>";
					
					
				
				endwhile;
				
				
				
			}
					
		}
		
		
		function bd_men()
		{
			include("db.php");
			if(isset($_GET['bd_men']))
			{
				$fetch_pro=$con->prepare("select * from products where for_whome='men'");
				$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
				$fetch_pro->execute();
				echo"<h3>Birthday Gifts For Men</h3>";
				while($row_men=$fetch_pro->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_men['pro_id']."'>
						
							<h4>".$row_men['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_men['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_men['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_men['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
				
			}
		}
		
		
		function bd_women()
		{
			include("db.php");
			if(isset($_GET['bd_women']))
			{
				$fetch_pro=$con->prepare("select * from products where for_whome='women'");
				$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
				$fetch_pro->execute();
				echo"<h3>Birthday Gifts For WoMen</h3>";
				while($row_men=$fetch_pro->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_men['pro_id']."'>
						
							<h4>".$row_men['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_men['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_men['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_men['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
				
			}
		}
		
		
		
		
		function bd_kids()
		{
			include("db.php");
			if(isset($_GET['bd_kids']))
			{
				$fetch_pro=$con->prepare("select * from products where for_whome='kids'");
				$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
				$fetch_pro->execute();
				echo"<h3>Birthday Gifts For Kids</h3>";
				while($row_men=$fetch_pro->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_men['pro_id']."'>
						
							<h4>".$row_men['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_men['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_men['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_men['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
				
			}
		}
		
		
		
		
		
		
		
	function all_about_men()
	{
		include("db.php");
		
		if(isset($_GET['men_watch']))
		{
			$men_watch="watch";
			
			$watch=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Watches for Men</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['men_belt']))
		{
			$men_belt="belt";
			
			$belt=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
		echo"<h3>Belts for Men</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		
		
		
		if(isset($_GET['men_perfumes']))
		{
			$men_perfumes="perfume";
			
			$perfumes=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_perfumes%' ");
			
			$perfumes->setFetchMode(PDO::FETCH_ASSOC);
			
			$perfumes->execute();
			
		echo"<h3>perfumes for Men</h3>";
				while($row_perfumes=$perfumes->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_perfumes['pro_id']."'>
						
							<h4>".$row_perfumes['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_perfumes['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_perfumes['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_perfumes['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		if(isset($_GET['men_wallets']))
		{
			$men_watch="wallets";
			
			$watch=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Wallets for Men</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['men_shoes']))
		{
			$men_watch="shoes";
			
			$watch=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Shoes for Men</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['men_jewellery']))
		{
			$men_watch="jewellery";
			
			$watch=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Jewellery for Men</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['men_sunglasses']))
		{
			$men_watch="sunglass";
			
			$watch=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Sunglasses for Men</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
		
		}
		
		
		if(isset($_GET['men_clothing']))
		{
			$men_watch="clothing";
			
			$watch=$con->prepare("select * from products where for_whome='men' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Clothing for Men</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
				</form>	</li>
					
				";
				
				
				endwhile;
		
		}
		
	}
		
		
		
		
	function all_about_women()
	{
		include("db.php");
		
		if(isset($_GET['women_watch']))
		{
			$men_watch="watch";
			
			$watch=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Watches for WoMen</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['women_belt']))
		{
			$men_belt="belt";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
		echo"<h3>Belts for WoMen</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		
		
		
		if(isset($_GET['women_perfumes']))
		{
			$men_perfumes="perfume";
			
			$perfumes=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_perfumes%' ");
			
			$perfumes->setFetchMode(PDO::FETCH_ASSOC);
			
			$perfumes->execute();
			
		echo"<h3>perfumes for WoMen</h3>";
				while($row_perfumes=$perfumes->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_perfumes['pro_id']."'>
						
							<h4>".$row_perfumes['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_perfumes['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_perfumes['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_perfumes['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['women_Shoes']))
		{
			$men_belt="shoes";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
		echo"<h3>Shoes for WoMen</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['women_Jewellery']))
		{
			$men_belt="Jewellery";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
		echo"<h3>Jewellery for WoMen</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['women_Handbags']))
		{
			$men_belt="handbag";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
		echo"<h3>Handbags for WoMen</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['women_sunglasses']))
		{
			$men_belt="sunglass";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
		echo"<h3>Sunglasses for WoMen</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		
		
	}
	
	
	
	
	
	
	
	
	function all_about_kids()
	{
		include("db.php");
		
		if(isset($_GET['kids_watch']))
		{
			$men_watch="watch";
			
			$watch=$con->prepare("select * from products where for_whome='kids' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Watches for Kids</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					<form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['kids_belt']))
		{
			$men_belt="belt";
			
			$belt=$con->prepare("select * from products where for_whome='kids' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
		echo"<h3>Belts for Kids</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		
		
		
		if(isset($_GET['kids_game']))
		{
			$men_perfumes="game";
			
			$perfumes=$con->prepare("select * from products where for_whome='kids' and pro_name like '%$men_perfumes%' ");
			
			$perfumes->setFetchMode(PDO::FETCH_ASSOC);
			
			$perfumes->execute();
			
		echo"<h3>Games for Kids</h3>";
				while($row_perfumes=$perfumes->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_perfumes['pro_id']."'>
						
							<h4>".$row_perfumes['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_perfumes['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_perfumes['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_perfumes['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		
		if(isset($_GET['kids_clothing']))
		{
			$men_watch="clothing";
			
			$watch=$con->prepare("select * from products where for_whome='kids' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Clothing for Kids</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					<form></li>
					
				";
				
				
				endwhile;
		
		}
		if(isset($_GET['kids_Shoes']))
		{
			$men_watch="shoes";
			
			$watch=$con->prepare("select * from products where for_whome='kids' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Shoes for Kids</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					<form></li>
					
				";
				
				
				endwhile;
		
		}
		if(isset($_GET['brand_nokia']))
		{
			$men_belt="nokia";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_keyword like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>Nokia</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		if(isset($_GET['Samsung']))
		{
			$men_belt="Samsung";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>Samsung</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['Philips']))
		{
			$men_belt="Philips";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>Philips</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['LG']))
		{
			$men_belt="LG";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>LG</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		if(isset($_GET['redmi']))
		{
			$men_belt="redmi";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>redmi</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
				if(isset($_GET['Plum_Flower']))
		{
			$men_belt="Flower";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>Plum_Flower</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
				if(isset($_GET['Go_Green']))
		{
			$men_belt="green";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>Go_Green</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}		if(isset($_GET['Fourwalls']))
		{
			$men_belt="Fourwalls";
			
			$belt=$con->prepare("select * from products where for_whome='women' and pro_name like '%$men_belt%' ");
			
			$belt->setFetchMode(PDO::FETCH_ASSOC);
			
			$belt->execute();
			
			echo"<h3>Fourwalls</h3>";
				while($row_belt=$belt->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>
						
							<h4>".$row_belt['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_belt['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_belt['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
						<button id='pro_btn' name='whish_btn'>Whishlist</button>
												
							</center>
						
						
						
						</a>
					
					</form></li>
					
				";
				
				
				endwhile;
		
		}
		
		if(isset($_GET['kids_sunglasses']))
		{
			$men_watch="sunglass";
			
			$watch=$con->prepare("select * from products where for_whome='kids' and pro_name like '%$men_watch%'");
			
			$watch->setFetchMode(PDO::FETCH_ASSOC);
			
			$watch->execute();
			
		echo"<h3>Sunglasses for Kids</h3>";
				while($row_watch=$watch->fetch()):
			
			echo"
			
					<li><form method='post' enctype='multipart/form-data'>
					
						<a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>
						
							<h4>".$row_watch['pro_name']."</h4>
						
							<img src='../imgs/ragava/".$row_watch['pro_img1']."' />
						
							<center>
								<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
								<input type='hidden' value='".$row_watch['pro_id']."' name='pro_id' />
								<button id='pro_btn1' name='cart_btn'>Cart</button>
									<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
							</center>
						
						
						
						</a>
					
					<form></li>
					
				";
				
				
				endwhile;
		
		}
		
		
	}
			
		
		
	
function search()
	{
		include("db.php");
		
		if(isset($_GET['search']))
		{
						$user_query=$_GET['user_query'];
						
						$search=$con->prepare("select * from products where pro_name like '%$user_query%' or pro_keyword like '%$user_query%'");
						
						$search->setFetchMode(PDO:: FETCH_ASSOC);
						
						$search->execute();
						
						echo"<div id='bodyleft'><ul>";
									
						
						if($search->rowCount()==0)
						{
							echo"<h2>Product Not Found with this Keyword ''$user_query''</h2>";
						}
						else
						{
							echo"<h2>Product In This Keyword ''$user_query'' </h2>";
									while($row=$search->fetch()):
									
									echo"
										<form method='post' enctype='multipart/form-data'>
												<li>
												
													<a href='pro_detail.php?pro_id=".$row['pro_id']."'>
													
														<h4>".$row['pro_name']."</h4>
													
														<img src='../imgs/ragava/".$row['pro_img1']."' />
													
														<center>
															<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row['pro_id']."'>View</a></button>
															<input type='hidden' value='".$row['pro_id']."' name='pro_id' />
															<button id='pro_btn1' name='cart_btn'>Cart</button>
											<button id='pro_btn' name='whish_btn'>Whishlist</button>
														
														</center>
													
													
													
													</a>
												
												</li>
												
										</form>	";
									endwhile;
						}			
									echo"</ul></div>";
		} 
	
	
	
	
	}	
	
		
		
		
		
		
	function recentview()
		{
			include("db.php");
			
			$fetch_cat=$con->prepare("select * from recentview ORDER BY date DESC LIMIT 0,3");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			echo"<h3>Your recently viewed items</h3>";
			while($row_cat=$fetch_cat->fetch()):
			
			$cat_id=$row_cat['pro_id'];
			
			
			
			
			
			$fetch_pro=$con->prepare("select * from products where pro_id='$cat_id' LIMIT 0,3");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			
			while($row_pro=$fetch_pro->fetch()):
			
			echo"
			
					<li>
						<form method='post' enctype='multipart/form-data'>
									<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
									
										<h4>".$row_pro['pro_name']."</h4>
									
										<img src='../imgs/ragava/".$row_pro['pro_img1']."' />
									
										<center>
											<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View  <i class='fa fa-eye' aria-hidden='true' style='font-size:15px;color:#000;'></i></a></button>
											<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'><i class='fa fa-shopping-cart' aria-hidden='true' style='font-size:15px;color:red;'></i>  Cart</button>
										<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
										</center>
									
									<b style='padding-top:10px;padding-left:10px;background:#a50200;color:#fff;border-radius:30px;width:50px;height:50px;float:left;margin-top:-115%;position:relative;margin-left:1px;'>10%<br><b style='padding-left:10px;;'>off</b></b>
									
									
									</a>
						</form>
					
					</li>
					
				";
			
			
			
		
		
			endwhile;
		endwhile;
		}	
		
		
		
		
		
	function sports()
		{
			include("db.php");
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='39'");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			
			$cat_id=$row_cat['cat_id'];
			
			echo"<h3>".$row_cat['cat_name']."</h3>";
			
			
			
			$fetch_pro=$con->prepare("select * from products where cat_id='$cat_id' LIMIT 0,3");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			
			while($row_pro=$fetch_pro->fetch()):
			
			echo"
			
					<li>
						<form method='post' enctype='multipart/form-data'>
									<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
									
										<h4>".$row_pro['pro_name']."</h4>
									
										<img src='../imgs/ragava/".$row_pro['pro_img1']."' />
									
										<center>
											<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View  <i class='fa fa-eye' aria-hidden='true' style='font-size:15px;color:#000;'></i></a></button>
											<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'><i class='fa fa-shopping-cart' aria-hidden='true' style='font-size:15px;color:red;'></i>  Cart</button>
										<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
										</center>
									
									<b style='padding-top:10px;padding-left:10px;background:#a50200;color:#fff;border-radius:30px;width:50px;height:50px;float:left;margin-top:-115%;position:relative;margin-left:1px;'>10%<br><b style='padding-left:10px;;'>off</b></b>
									
									
									</a>
						</form>
					
					</li>
					
				";
			
			
			
		
		
			endwhile;
		
		}
			
		
		function books()
		{
			include("db.php");
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='38'");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			
			$cat_id=$row_cat['cat_id'];
			
			echo"<h3>".$row_cat['cat_name']."</h3>";
			
			
			
			$fetch_pro=$con->prepare("select * from products where cat_id='$cat_id' LIMIT 0,3");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			
			while($row_pro=$fetch_pro->fetch()):
			
			echo"
			
					<li>
						<form method='post' enctype='multipart/form-data'>
									<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
									
										<h4>".$row_pro['pro_name']."</h4>
									
										<img src='../imgs/ragava/".$row_pro['pro_img1']."' />
									
										<center>
											<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View  <i class='fa fa-eye' aria-hidden='true' style='font-size:15px;color:#000;'></i></a></button>
											<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											<button id='pro_btn1' name='cart_btn'><i class='fa fa-shopping-cart' aria-hidden='true' style='font-size:15px;color:red;'></i>  Cart</button>
										<button id='pro_btn' name='whish_btn'>Whishlist</button>
										
										</center>
									
									<b style='padding-top:10px;padding-left:10px;background:#a50200;color:#fff;border-radius:30px;width:50px;height:50px;float:left;margin-top:-115%;position:relative;margin-left:1px;'>10%<br><b style='padding-left:10px;;'>off</b></b>
									
									
									</a>
						</form>
					
					</li>
					
				";
			
			
			
		
		
			endwhile;
		
		}
			
		
		
		
		
		
		
?>