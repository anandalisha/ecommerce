
<html>
<head>

<style>
#bodyright{padding:20px;box-sizing:border-box;border-radius:3px;width:80%;height:auto;background:#fff;float:right;

margin-top:-37.7%;

}
#box1{width:100%;height:240px;background:#fff;border:1px solid aquamarine;margin-top:20px;}
#box1 table{width:100%;height:100px;text-align:left;}

#box1 table th{padding:30px;border-bottom:1px solid #000;}
#box1 table td{text-align:center;}
</style>
</head>
<body>
<div id="bodyright">
<?php

	include("db.php");
	
	$a=1;
	$orderdetails=$con->prepare("select * from newuser where set_online='$a'");
	
	$orderdetails->execute();
	
	$row=$orderdetails->fetch();
	
	$userid=$row['ID'];
	
		$orderdetails1=$con->prepare("select * from whishlist where userid='$userid' ORDER BY 1 DESC");
	
	$orderdetails1->execute();
	echo"<h1>Your Whish Lists</h1>";
	while($row1=$orderdetails1->fetch()):
	
		$proid=$row1['pro_id'];
		
		$orderdetails11=$con->prepare("select * from products where pro_id='$proid'");
	
		$orderdetails11->execute();
		
		$row11=$orderdetails11->fetch();
		echo"
		<form method='post'>
		<div id='box1'>
		
		
		
		<table>
		
		<tr>
		
			<th>
			
			Added Lists<br><br><b padding-left:10px;>".$row1['date']."</b>
			</th>
			
			<th>
			TOTAL<br>Rs.  ".$row11['pro_price']."
  
			
			</th>
			
			<th>
			<br><b><a href='#' style='text-decoration:none;'>".$row['username']."</a></b>
			
			</th>
			
			<th>
				<br>
				<input type='hidden' value='".$row11['pro_id']."' name='pro_id' />
											
				<input type='submit' name='cart_btn' value='Add to cart' style='width:150px;height:35px;border:1px solid #400040;border-radius:4px;color:#fff;background:#400040;'>
			
			</th>
		</tr>
		<tr>
		
		<td><img src='../imgs/ragava/".$row11['pro_img1']."' style='width:100px;height:100px;margin:5%;'/></td>
		
		<td colspan='2'><b><a href='#' style='text-decoration:none;'>".$row11['pro_name']."</a><br><br>Rs.".$row11['pro_price']."</b></td>
		
		<td><a href='delete_whishlist.php?pro_id=".$row11['pro_id']."' style='text-decoration:none;width:100px;height:15px;line-height:15px;color:#fff;background:#400040;padding:10px;border:1px solid aquamarine;border-radius:4px;padding-left:30px;padding-right:20px;float:left;margin-left:30px;'>delete</a>
			
			</td>
		
		</tr>
		
		</table>
		
		
		
		
		
		</div>
		
		</form>";
	
	
	endwhile;
	
	
	include("function_user.php");
	echo add_cart();
		
?>
</div>
</body>
</html>
