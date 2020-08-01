<?php

include("db.php");

if(isset($_POST['validate']))
{
	$cardname=$_POST['cartname'];
	
$query=$con->prepare("select * from payment where set_online='1'");
	
			$query->execute();
			
			$row1=$query->fetch();
			
			$username=$row1['username'];
			
			$balance=$row1['balance'];
	
		if($balance>=$cardname)
		{
			echo"<h1>!...balance valid...!</h1>";
			
			$balance=$balance-$cardname;
			
			$query1=$con->prepare("update payment set payment_method='Credit_cart',balance='$balance' where username='$username'");
	
			$query1->execute();
			header("location:placeorder.php");
		}
		else
		{
			echo"<h1 style='text-align:center;background:#400040;color:#fff;'>!...Your Balance is INSUFFICENT...!</h1>";
		}
	
	
	


}



?>







<html>
<head>
<style>
*{margin:0%;}
body{background:#fff;}

 img{margin-top:20px;margin-bottom:20px;margin-left:100px;}
 h2{font-weight:normal;font-size:30px;margin-left:100px;}
 
 #offerlog{width:80%;margin-left:5%;margin-top:2%;margin-right:5%;background:#fff;border:1px solid aquamarine;}
 #payment{width:65%;margin-left:5%;height:78%;background:#fff;border:1px solid aquamarine;margin-top:10px;}
 option{width:300px;height:30px;background:#400040;color:#fff;padding:10px;}
 option:hover{color:#400040;background:#fff;}
 
 
 #ragava{margin-top:-9px;}
 
 
 
 
 
 </style>
</head>
<body>


<form method="post">
<?php
			include("db.php");
			
			
			
			
			
		
			$a=1;
			$net_total=0;
			$delivery=0;
			
			$offer=0;
			$offer_amount=0;

			$ordertotal=0;
			
			$getaddress=$con->prepare("select * from newuser where set_online='$a'");
			$getaddress->execute();
			
			$row1=$getaddress->fetch();
			
			$userid=$row1['ID'];
			
				$get_cart_item=$con->prepare("select * from cart where userid='$userid'");
			
			$get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cart_item->execute();
			
			while($row=$get_cart_item->fetch()):
				
				
					$pro_id=$row['pro_id'];
					$get_pro=$con->prepare("select * from products where pro_id='$pro_id'");
					$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
					$get_pro->execute();
					
					$row_pro=$get_pro->fetch();
			
								$qty=$row['qty'];
								$pro_price=$row_pro['pro_price'];
								
								$offer=$pro_price/10;
								
								$offer_amount=$offer_amount+$offer;
								
								$sub_total=$pro_price*$qty;
								
								//echo $sub_total;
								
								$net_total=$net_total+$sub_total;
								
								
			endwhile;


				if($net_total>499)
				{
					$delivery=0;
				}
				else
				{
					$delivery=50;
				}

				$total=$net_total+$delivery;	
				
				$cc=1;
				
				if($total<600)
				{
					$promotion=50;
					
					$cc=$cc+1;
				}
				if($cc==1)
				{
						if($total<10000)
						{
							$promotion=100;
							$cc=$cc+1;
					
						}
						
				}
				if($cc==1)
				{
					if($total>20000)
					{
						$promotion=200;
						$cc=$cc+1;
			
					}
				}
						if($cc==1)
						{
							if($total<200)
							{
							$promotion=25;
							}
						}
				
				$ordertotal=$total-$promotion;
				
?>		
			
			


<img src="a.gif" />
	<h2>Credit Card method</h2>
	
		<div id="offerlog">
			<img src="mastercard.png" style="width:50px;height:50px;margin-top:10px;margin-bottom:15px;margin-left:30px;"/>
			<p style="margin-left:10%;margin-top:-4%;">Get 10% cashback* using Mastercard Debit/Credit Card at doorstep for your first cashless transaction *T&C apply<a href="term.php"><input type="submit" name="term" value="Learn More" style="border-radius:4px;margin-left:100px;width:100px;height:30px;border:1px solid aquamarine;"></a></p>
			</div>
			
			<div id="payment">
			


			<h5 style="font-size:23px;margin-top:10px;padding-left:35px;margin-bottom:20px;">Please Enter the Amount</h5>
<br><br>
			
	<form method="post">
	
		<b style="margin-left:35px;font-size:20px;font-weight:bold;margin-bottom:20px;">Enter Amount </b>
		
		
		<input type="text" name="cartname" value="<?php echo"$ordertotal";?>" style="margin-left:15px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;padding-left:15px;font-size:18px;"><b style="margin-left:30px;font-size:20px;color:#d00;">Your Order Amount is:Rs. <?php echo"$ordertotal";?></b>
		
		<br>
		
		
		
		<br><br>
		<input type="submit" value="validate" name="validate" style="margin-left:176px;width:200px;height:35px;border:1px solid #d00;border-radius:4px;">
		
	</form>
			</div>

	</body>
	</html>