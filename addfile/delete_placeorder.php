<?php

						include("db.php");
						
			if(isset($_GET['delete_id']))
			{
				$pro_id=$_GET['delete_id'];
				
				$delete_pro=$con->prepare("delete from cart where pro_id='$pro_id'");
				
				if($delete_pro->execute())
				{
					echo"<script>alert('Cart Item Deleted Successfully');</script>";
					echo"<script>window.open('placeorder.php','_self');</script>";
				}
				else
				{
					echo"<script>alert('Cart Item Deleted Not Successfully');</script>";
				
				}
			}
		
?>