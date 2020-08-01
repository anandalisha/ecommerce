<html>
<head>
<style>
body{background:#fff;}
#details{margin-left:100px;margin-right:150px;background:#ffff;box-shadow:0px 0px 0px #eee;}
#details img{margin-top:20px;margin-bottom:20px;}
#details h2{font-weight:normal;font-size:30px;}
#details h5{font-weight:normal;font-size:15px;}
#details hr{color:#eee;}
#details h4{font-weight:normal;font-size:15px;margin-top:0px;}


#details input[type="submit"]
{
	    line-height: 29px;  
	
	width:230px;border-radius:4px;height:35px;color:#fff;background:#400040;
	border:1px solid #fff;cursor:pointer;
}
#newaddress{margin-left:100px;}

#newaddress input[type="text"]
{
	height:31px;width:380px; margin-bottom:20px;
}


#showphone{width:410px;height:auto;background:fff;color:#400040;display:none;}
.phone:hover #showphone{display:block;}

#showpin{width:410px;height:auto;background:fff;color:#400040;display:none;}
.pincode:hover #showpin{display:block;}
 #ragava{margin-top:-9px;}
</style>
</head>
<body>
<div id="details">
	<img src="a.gif" />
	<h2>Select a delivery address</h2>
	<h5>Is the address you'd like to use displayed below? If so, click the corresponding "Deliver to this address" button. Or you can enter a new delivery address. </h5>

	<hr>
	<?php
			include("db.php");
			$a=1;
			$getaddress=$con->prepare("select * from newuser where set_online='$a'");
			$getaddress->execute();
			
			$row=$getaddress->fetch();
			$getid=$row['ID'];
			echo"<h3>".$row['username']."</h3>";
			echo"<p>".$row['address']."</p>";
				echo"<p>".$row['city']."</p>";
					echo"<p>".$row['pincode']."</p>";
					echo"<p>India</p>";
					

	?>
	<a href="deliverydetails_continue.php"><input type="submit" name="deliveryaddress" value="Delivery to this address" style="margin-top:20px;"></a><br>
	
	<?php echo"<a href='edit_add.php?custid=".$row['ID']."'><input type='submit' name='editaddress' value='Edit' style='width:100px;margin-top:15px;color:#400040;background:#fff;border:1px solid #400040;'></a>";
	
	?>
	
	<input type="submit" name="deleteaddress" value="Delete" style="margin-bottom:50px;width:106px;margin-top:15px;margin-left:20px;color:#400040;background:#fff;border:1px solid #400040;">
	
	<br><br><hr>
	</div>
		<form method="post">
			<div id="newaddress">
			
				<h2>Add a new address</h2>
				<p>Be sure to click "Deliver to this address" when you've finished.</p>
				Full name: <br>
				<input type="text" name="name"><br>
				<div class="phone">Mobile number:  (Learn more)<h3 id="showphone">Please enter a valid 10-digit mobile number without any prefixes (+91 or 0), spaces and dashes. This number will be used to assist with scheduling delivery.</h3></div> <br>
				<input type="text" name="phone"><br>
				<div class="pincode">Pincode:  (Learn more) <h3 id="showpin">Please enter a valid 6 digits [0-9] zip code.</h3></div><br>
				<input type="text" name="pincode"><br>
			
				Flat, House no., Building, Company, Apartment:  <br>
				<input type="text" name="house"><br>
				Area, Colony, Street, Sector, Village:  <br>
				<input type="text" name="area"><br>
				Landmark e.g. near apollo hospital:  <br>
				<input type="text" name="landmark" placeholder="E.g. Near AIIMS Flyover, Behind Regal Cinema, etc. "><br>
				Town/City:  <br>
				<input type="text" name="tandc"><br>
				
				State:  <br>
				<input type="text" name="state"><br>
					<h2>Add a new address</h2>
					<p>Preferences are used to plan your delivery. However, shipments<br> can sometimes arrive early or later than planned.</p>
			
				Address Type:  <br>
				<select name="addtype" style="width:380px;">
				<option value="no value" name="addtype">Select Address type</option>
				<option value="Home(7AM-9PM delivery)" name="addtype">Home(7AM-9PM delivery)</option>
				<option value="Office/Commercial(10AM-5AM delivery)" name="addtype">Office/Commercial(10AM-5AM delivery)</option>

				</select><br>
			<input type="submit" name="newadd" value="Delivery to This address" style="height:45px;margin-left:17%;margin-top:30px;color:#fff;background:#400040;margin-bottom:5%;border:1px solid #fff;border-radius:4px;">
			
			</div>
		
		
		
		
		
		</form>

	<?php include("backtotop.php");?>
</body>
</html>


<?php

include("db.php");


	if(isset($_POST['newadd']))
	{
	
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$pincode=$_POST['pincode'];
		$house=$_POST['house'];
		$area=$_POST['area'];
		$tandc=$_POST['tandc'];
		$state=$_POST['state'];
		$addtype=$_POST['addtype'];


		$getnew=$con->prepare("insert into newadd(userid,name,phone,pincode,house,area,tandc,state,addtype)values('$getid','$name','$phone','$pincode','$house','$area','$tandc','$state','$addtype')");
			
			if($getnew->execute())
			{
				echo"<script>alert('new address stored...!!!')</script>";
			}
			else
				{
					echo"<script>alert('new address not stored...!!!')</script>";
				}

	}
?>




