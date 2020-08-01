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
	
		$orderdetails1=$con->prepare("select * from placeorder where userid='$userid' ORDER BY 1 DESC");
	
	$orderdetails1->execute();
	echo"<h1>Your Orders</h1>";
	while($row1=$orderdetails1->fetch()):
	
		$proid=$row1['pro_id'];
		$qyt=$row1['qty'];
		
		
		
		$orderdetails11=$con->prepare("select * from products where pro_id='$proid'");
	
		$orderdetails11->execute();
		
		$row11=$orderdetails11->fetch();
		
		$price=$row11['pro_price'];
		
		$totalamount=$qyt*$price;
		
				$order_cancel1=$row1['order_cancel'];
		echo"
		
		<div id='box1'>
		
		
		
		<table>
		
		<tr>
		";				if($order_cancel1==1)
						{
							
							echo"<th>
			
							ORDER RETURN<br><br><b padding-left:10px;>".$row1['date']."</b>
							</th>";
						}
						else
						{
							echo"<th>
			
									ORDER PLACED<br><br><b padding-left:10px;>".$row1['date']."</b>
								</th>";
						}
					echo"
			
			<th>
			TOTAL<br>Rs.  $totalamount (Quantity $qyt)
  
			
			</th>
			
			<th>
			SHIP TO<br><b><a href='#' style='text-decoration:none;'>".$row['username']."</a></b>
			
			</th>
			
			<th>
			ORDER # 403-7688180-1037959<br>
<a href='#' style='text-decoration:none;'>Order Details  Invoice </a>
			
			</th>
		</tr>
		<tr>
		
		<td><img src='../imgs/ragava/".$row11['pro_img1']."' style='width:100px;height:100px;margin:5%;'/></td>
		
		<td colspan='2'><b><a href='#' style='text-decoration:none;'>".$row11['pro_name']."</a><br><br>Rs.".$row11['pro_price']."</b></td>
		
		<td><a href='pro_review.php?pro_id=".$row11['pro_id']."'><input type='submit' value='Write a product review' name='review' style='width:200px;height:40px;color:#400040;background:#fff;border:1px solid #400040;border-radius:4px;'></a>
			
			<br><br>
			";
				$date1=date_create("".$row1['date']."");
				$date2=date_create("". date("Y/m/d")."");
				$diff=date_diff($date1,$date2);
				//echo $diff->format("%R%a");
				$t=$diff->format("%R%a");
				$i=1;
				
				$order_cancel=$row1['order_cancel'];
				
				if($i==1)
				{
					if($t<=2)
					{
						if($order_cancel==1)
						{
							echo"<a href='#' style='text-decoration:none;width:100px;height:15px;line-height:15px;color:#400040;background:#fff;padding:10px;border:1px solid #400040;border-radius:4px;padding-left:63px;padding-right:50px;'>Order Return</a>";
							$i=$i+1;
					
						}
						else
						{
							echo"<a href='Cancel_order.php?order_id=".$row1['order_id']."' style='text-decoration:none;width:100px;height:15px;line-height:15px;color:#400040;background:#fff;padding:10px;border:1px solid #400040;border-radius:4px;padding-left:63px;padding-right:50px;'>Cancel Order</a>";
							$i=$i+1;
						}
					}
				}
				if($i==1)
				{
					if(($t==3)||($t==4)||($t==5))
					{
					echo"<a href='#' style='text-decoration:none;width:100px;height:15px;line-height:15px;color:#400040;background:#fff;padding:10px;border:1px solid #400040;border-radius:4px;padding-left:44px;padding-right:30px;'>Con't Cancel Order</a>";
					$i=$i+1;
					}
			
				}
				if($i==1)
				{
					if($t>5)
					{
						echo"<a href='#' style='text-decoration:none;width:100px;height:15px;line-height:15px;color:#400040;background:#fff;padding:10px;border:1px solid #400040;border-radius:4px;padding-left:50px;padding-right:40px;'>Order Delivered</a>";			
					}
				}
		echo"
		
		</td>
		
		</tr>
		
		</table>
		
		
		
		
		
		</div>";
	
	
	endwhile;
	
	
	
		
?>
</div>
</body>
</html>