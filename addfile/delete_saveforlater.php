<?php

			include("db.php");
						
			if(isset($_GET['pro_id']))
			{
				$pro_id=$_GET['pro_id'];
				
				
				
				
				$delete_pro=$con->prepare("delete from saveforlater where pro_id='$pro_id'");
				
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






?>