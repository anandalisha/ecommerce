<html>
	<head>
		<title>Your Account</title>
	<style>
				body{background:#400040;}
				
#bodyleft
{
	
		width:250px;height:500px;background:#fff;		
		margin-left:10px;border:1px solid aquamarine;
		border-radius:4px;margin-top:5%;		
				
}


#bodyleft h3{background:#400040;color:#fff;border:1px solid aquamarine;border-radius:4px;text-align:center;height:40px;line-height:40px;}			
#bodyleft ul li{list-style-type:none;margin:15px;border-bottom:1px solid aquamarine;margin-left:-30px;font-size:15px;}
	#bodyleft ul li a{text-decoration:none;color:#000000;}			
	</style>
	</head>
	
	
	<body>
			
			
			<div id="bodyleft">
			
			
			<h3>Your Account</h3>
			<ul>
			
				<li> <a href="your_account.php">Home</a></li>
				<li> <a href="your_account.php?viewall_orders">Your Orders</a></li>
				<li> <a href="your_account.php?view_address">Your Address</a></li>
				
				<li> <a href="your_account.php?cancel_produts">Cancelled Orders</a></li>
				
				<li> <a href="your_account.php?viewall_whislist_products">Your Whish list</a></li>
				
				
			</ul>
			
			</div>
			
			
			<?php
			
					if(isset($_GET['viewall_orders']))
					{
						include("viewall_orders.php");
					}
				if(isset($_GET['view_address']))
					{
						include("view_address.php");
					}
					
					if(isset($_GET['viewall_whislist_products']))
					{
						include("viewall_whislist_products.php");
					}
					if(isset($_GET['cancel_produts']))
					{
						include("cancel_produts.php");
					}
			?>
			
			
			
			
			
			
	</body>
	
</html>