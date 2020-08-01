<?php
include("db.php");
		if(isset($_GET['pro_id']))
			{
				$pro_id=$_GET['pro_id'];
				
				$a=1;
				$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
				$get_user_item->execute();
				
				
				$user_getch=$get_user_item->fetch();
				$userid=$user_getch['ID'];
			
			
				$delete_pro=$con->prepare("delete from saveforlater where pro_id='$pro_id' and userid='$userid'");
				
				$delete_pro->execute();
			
			
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
							echo"<script>window.open('cart.php','_self');</script>";
						}
						else
						{
							echo"<script>alert('Try Again!!!');</script>";
						}
					}
				}
			
				
			
			
			
			}
			
			?>