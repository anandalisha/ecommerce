
<?php
include("db.php");
						
			if(isset($_GET['save_id']))
			{
				$a=1;
				
				$pro_id=$_GET['save_id'];
				
				$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
				$get_user_item->execute();
			
				$user_getch=$get_user_item->fetch();
				$userid=$user_getch['ID'];
				
				
			
				$save_pro=$con->prepare("insert into saveforlater(pro_id,userid)values('$pro_id','$userid')");
				
				
				$save_pro->execute();
				
				$delete_pro=$con->prepare("delete from cart where pro_id='$pro_id'");
				
				if($delete_pro->execute())
				{
					echo"<script>alert('Move product Successfully');</script>";
					echo"<script>window.open('cart.php','_self');</script>";
				}
				else
				{
					echo"<script>alert('Move product Not Successfully');</script>";
				
				}
			}
?>