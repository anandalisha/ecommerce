<style>
#bodyleft{background:#fff;margin-top:50px;}
</style>

<div id="bodyleft">
			
			
			<h3>Content Management</h3>
			<ul>
			
				<li> <a href="admin_index.php">Home</a></li>
				<li> <a href="admin_index.php?viewall_cat">view All Categories</a></li>
				<li> <a href="admin_index.php?viewall_sub_cat">view All sub categories</a></li>
				
				<li> <a href="admin_index.php?add_produts">Add New products</a></li>
				
				<li> <a href="admin_index.php?viewall_produts">View All products</a></li>
				
				<li> <a href="admin_index.php?search_produts">Search products</a></li>
				
				<li> <a href="admin_index.php?viewall_order">View All Orders</a></li>
				
				
				<li> <a href="admin_index.php?Cancel_order">View All Cancelled Orders</a></li>
				<li> <a href="logout.php">LogOut</a></li>
				
				
			</ul>
			
			</div><!--end of --bodyleft-->
			
			<?php
			
				if(isset($_GET['viewall_cat']))
				{
					include("cat.php");
				}
			
				
				if(isset($_GET['viewall_sub_cat']))
				{
					include("sub_cat.php");
				}
				
				if(isset($_GET['add_produts']))
				{
					include("add_products.php");
				}
				
				
				if(isset($_GET['viewall_produts']))
				{
					include("viewall_products.php");
				}
				
				
				if(isset($_GET['search_produts']))
				{
					include("search_produts.php");
				}
				
				if(isset($_GET['viewall_order']))
				{
					include("viewall_order_admin.php");
				}
				
				if(isset($_GET['Cancel_order']))
				{
					include("viewall_cancel_order_admin.php");
				}
						
			
			?>
			