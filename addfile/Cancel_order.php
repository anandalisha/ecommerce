<?php



		if(isset($_GET['order_id']))
		{
			
			include("db.php");
	
			$a=1;
			$orderdetails=$con->prepare("select * from newuser where set_online='$a'");
	
			$orderdetails->execute();
	
			$row=$orderdetails->fetch();
	
			$userid=$row['ID'];
			
			$order_id=$_GET['order_id'];
			
			$query=$con->prepare("update placeorder set order_cancel='1',date=Now() where userid='$userid' and order_id='$order_id'");
			
			$query->execute();
			
			header("location:your_account.php?viewall_orders");
			
			
		}
















?>