<?php
				
				if(isset($_GET['pro_id']))
				{
					include("db.php");
				$pro_id=$_GET['pro_id'];
				
				
				$a=1;
				$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
				$get_user_item->execute();
				
				$user_getch=$get_user_item->fetch();
				$userid=$user_getch['ID'];
			
				$check_cart=$con->prepare("delete from whishlist where pro_id='$pro_id' AND userid='$userid'");
				
				$check_cart->execute();
				
				header("location:your_account.php?viewall_whislist_products");
				}



?>