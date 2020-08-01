	<?php
	
	if(isset($_POST['term']))
	{
		header("location:term.php");
	}
	if(isset($_POST['continue']))
	{
		header("location:placeorder.php");
	}
	if(isset($_POST['fast']))
	{
		include("db.php");
		$a="credit";
		$b="debit";
		$c="netbank";
		$d="emi";
		$f="cod";
		$g=1;
		$getvalue=$_POST['fast'];
		
		
		if($getvalue==$a)
		{
		header("location:credit.php");
		}
		if($getvalue==$b)
		{
		header("location:debit.php");
		}
		if($getvalue==$c)
		{
		header("location:netbank.php");
		}
		if($getvalue==$d)
		{
		header("location:emi.php");
		}
		
			if($getvalue==$f)
		{
			$x=1;
			$getaddress=$con->prepare("select * from newuser where set_online='$x'");
			$getaddress->execute();
			
			$row=$getaddress->fetch();
			
			$username1=$row['username'];
			
			
			$query1=$con->prepare("update payment set payment_method='Cash On Delivery',set_online='1' where username='$username1'");
	
			$query1->execute();
			header("location:placeorder.php");
		}
	}
	?>

<html>
<head>
<style>
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
			$getaddress=$con->prepare("select * from newuser where set_online='$a'");
			$getaddress->execute();
			
			$row=$getaddress->fetch();
?><img src="a.gif" />
	<h2>Select a payment method</h2>
	
		<div id="offerlog">
			<img src="mastercard.png" style="width:50px;height:50px;margin-top:10px;margin-bottom:15px;margin-left:30px;"/>
			<p style="margin-left:10%;margin-top:-4%;">Get 10% cashback* using Mastercard Debit/Credit Card at doorstep for your first cashless transaction *T&C apply<a href="term.php"><input type="submit" name="term" value="Learn More" style="border-radius:4px;margin-left:100px;width:100px;height:30px;border:1px solid aquamarine;"></a></p>
			</div>
			
			<div id="payment">
			
				<h5 style="font-size:23px;margin-top:10px;padding-left:35px;">Another payment method</h5>
			<hr style="margin-left:20px;margin-right:20px;margin-top:-30px;">
			<input type="radio" name="fast" style="margin-left:5%;" value="credit"><b style="font-weight:bold;margin-left:10px;">Credit card</b><br>
			
			<img src="payment.png" style="width:220px;height:39px;margin-top:10px;margin-bottom:15px;margin-left:80px;"/>
			
		<br>
		
			
			
			
		
		
		<input type="radio" name="fast" style="margin-left:5%;" value="debit"><b style="font-weight:bold;margin-left:10px;margin-top:20px;">Debit card</b><br>
		
				
				
				<select style="margin-bottom:30px;border-radius:4px;width:170px;height:30px;border:1px solid aquamarine;margin-left:8%;margin-top:10px;">
		  <option value="volvo" >Choose an Option</option>
		  <option value="saab">All Visa/MasterCard Debit Card</option>
		  <option value="opel">All Rupay Debit Cards</option>
		  <option value="audi">All SBI Maestro Debit Cards</option>
		  
		   <option value="audi">All Citibank Maestro Debit Cards</option>
				</select>
		<br>
		<input type="radio" name="fast" style="margin-left:5%;" value="netbank"><b style="font-weight:bold;margin-left:10px;" >Net Banking</b>
				<br><select style="margin-bottom:30px;border-radius:4px;width:170px;height:30px;border:1px solid aquamarine;margin-left:8%;margin-top:10px;">
  <option value="volvo" >Choose an Option</option>
  <option value="saab">All Visa/MasterCard Debit Card</option>
  <option value="opel">All Rupay Debit Cards</option>
  <option value="audi">All SBI Maestro Debit Cards</option>
  
   <option value="audi">All Citibank Maestro Debit Cards</option>
		</select><br>
				<input type="radio" name="fast" style="margin-bottom:50px;margin-left:5%;" value="emi"><b style="font-weight:bold;margin-left:10px;margin-bottom:30px;">EMI Unavailable Why?</b>
				
				
			<hr style="margin-left:20px;margin-right:20px;margin-top:-30px;">
						<br><input type="radio" name="fast" style="margin-left:5%;" value="cod"><b style="font-weight:bold;margin-left:10px;">Cash on Delivery (COD). We also accept Credit/ Debit cards on delivery, subject to availability of the payment <b style="margin-left:71px">device. Please check with the delivery agent.</b>
</b>	
		</div>
	
	
			<h3 style="margin-left:100px;font-size:30px;font-weight:normal;">More Payment Options</h3>
			<hr style="margin-left:100px;margin-right:420px;">
			<h4 style="margin-left:100px;font-size:25px;">Gift Cards, Vouchers & Promotional Codes </h4>
			<h5 style="margin-left:100px;color:#007eb9;font-size:15px;font-weight:normal;margin-top:-10px;">&#x25BA; Enter a gift card, voucher or promotional code</h5>
			
			<input type="submit" name="continue" value="continue" style="margin-top:-70px;float:right;margin-right:150px;width:200px;height:35px;border:1px solid #400040;background:#fff;color:#400040;font-size:20px;font-weight:bold;">
	
	</form>

	</body>
	</html>
	

	