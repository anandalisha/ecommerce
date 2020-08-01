<html>
<head>
<style>


 
 
 
 #speeddel{width:550px;height:400px;background:yellow;margin-left:550px;margin-top:-10%;}
 
</style>
</head>
<body>
<?php  $getdate=date("d");
			
					$getdateadd=$getdate+2;
					$gettodate=$getdateadd+2;
			
			?>	</div>
			
			<div id="speeddel">
			<h4 style="font-size:20px;margin-top:0%;margin-left:0%;">Also Available for Pickup</h4>
			<a href="#"><h4 style="font-size:15px;margin-top:-1%;margin-left:5%;">Choose from 4 pickup locations near you</h4></a>
			
			<h4 style="font-size:20px;margin-top:0%;margin-left:5%;">Choose a delivery speed</h4>
			<input type="radio" name="fast" style="margin-left:5%;"><b style="padding-left:10px;font-weight:normal;color:green;font-size:20px;">Between</b><b style="margin-left:10px;color:green;"> <?php echo "$getdateadd";?></b> -<b style="margin-left:10px;color:green;"><?php echo"$gettodate";?></b><b style="margin-left:10px;color:green;">-Mar </b> — Free Delivery on eligible orders</b><a href="#"> (See details)</a>
			<input type="radio" name="fast" style="margin-left:5%;margin-top:20px;"><b style="padding-left:10px;font-weight:normal;">Friday  — One-Day Delivery at Rs. 100. FREE with Prime</b><a href="#"> (See details)</a>
			
			<input type="submit" name="contine" value="continue" style="margin-left:5%;margin-top:20%;width:300px;height:40px;color:#fff;background:#400040;border:1px solid #400040;border-radius:4px;">
			</div>
			
			
			
		
			
		
		
		
		
		
		</form>

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




