<html>
<head>
<style>
*{margin:0%;}
#review{margin-top:10px;position:relative;width:100%;height:800px;background:#fff;}
#rating{width:75%;height:330px;background:#fff;margin-left:15px;margin-top:10px;}

#rating img{width:170px;height:170px;}


#reviewlist{width:100%;height:300px;background:#fff;margin-top:1px;margin-left:15px;border:1px solid aquamarine;}

#reviewlist img{margin:10px;}
#reviewlist p{margin-top:15px;}
</style>
</head>
<body>

<?php
			include("db.php");
		
			if(isset($_GET['pro_id']))
			{
				$pro_id=$_GET['pro_id'];
				
			}	
				$pro_fetch=$con->prepare("select * from products where pro_id='$pro_id' ");
				$pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
			
				$pro_fetch->execute();
				
				$row_pro=$pro_fetch->fetch();

				$a=0;$b=0;
				$c=0;$d=0;$e=0;
				$get_user_review1=$con->prepare("select * from comment where pro_id='$pro_id'");
					
					
					$get_user_review1->execute();
					$noofcom=$get_user_review1->rowCount();
					while($get_review1=$get_user_review1->fetch()):
							
						if($get_review1['rating']==1)
						{
							$a=$a+1;
						}
						if($get_review1['rating']==2)
						{
							$b=$b+1;
						}
						if($get_review1['rating']==3)
						{
							$c=$c+1;
						}
						if($get_review1['rating']==4)
						{
							$d=$d+1;
						}
						if($get_review1['rating']==5)
						{
							$e=$e+1;
						}
						endwhile;
				
				$liking=0;
		$disliking=0;
		$total=0;
		$percentOfLikes=0;
		$percentOfDislikes=0;
		$like=$con->prepare("select * from comment where pro_id='$pro_id'");
		
		$like->execute();
		while($row=$like->fetch()):
		
	
		$getrate=$row['rating'];
		
			if(($getrate==1)||($getrate==2))
			{
				$liking=$liking+$getrate;
			}
			if(($getrate==5)||($getrate==4)||($getrate==3))
			{
				$disliking=$disliking+$getrate;
			}
		
		endwhile;
		//echo"$liking and $disliking";
		
		$total=$liking+$disliking;
			if($total==0)
		{
			$percentOfDislikes=0;
		}
		else
		{
		//echo"<br>total: $total";
		
		
		$percentOfLikes= 5*$liking/$total;
		$percentOfDislikes=5*$disliking/$total;
		
	//	echo"<br>like:  $percentOfLikes";
		
		//echo"<br>like:  $percentOfDislikes <br><br>";
		
		echo(round($percentOfLikes,2) . "<br>");
				
		}		
				
				
				echo"
				
				<div id='review'>
				
					
					<h1 style='color:#fff;'>dfdsfdfdf</h1>
				
				<hr style='position:relative;'>
					
					<div id='rating'>
					<h3 style='color:#C60!important;'>Customer reviews</h3>
					<img src='star1.jpg' style='width:130px;height:30px;margin:10px;margin-left:0px;'><br>
					<p style='margin-top:-30px;margin-left:134px;'>$noofcom</p>
						<br><h3 style='height:20px;margin:0px;font-size:20px;'>";echo round($percentOfDislikes,1)." of 5 stars</h3>
						<br><img src='star.jpg'>
						
						<h6 style='margin-top:-15.8%;color:#0066c0;margin-left:18%;font-size:15px;'>$a</h6>
						<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$b</h6>
				<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$c</h6>
				<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$d</h6>
				<h6 style='margin-top:1.5%;color:#0066c0;margin-left:18%;font-size:15px;'>$e</h6>
				<img src='../imgs/ragava/".$row_pro['pro_img1']."' style='float:right;margin-right:50%;width:200px;height:200px;margin-top:-18%;' />
				
				<p  style='float:right;margin-right:27%;width:200px;height:200px;margin-top:-18%;font-size:30px;color:#0066c0' >".$row_pro['pro_name']."</p>
				
				<p  style='float:right;margin-right:-20%;width:200px;height:200px;margin-top:-10%;font-size:30px;color:#0066c0' >Rs.  ".$row_pro['pro_price']."</p>
				<form method='post'>
				
				<input type='submit' value='Add to cart' name='cart_btn' style='float:right;width:250px;height:40px;margin-top:-20%;font-size:15px;color:#fff;margin-right:-55%;border:1px solid aquamarine;border-radius:4px;background:#400040;' >
				<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
											
				<input type='submit' name='whish_btn' value='Add to Whishlist' style='float:right;width:250px;height:40px;margin-top:-10%;font-size:15px;color:#fff;margin-right:-55%;border:1px solid aquamarine;border-radius:4px;background:#400040;' >
				</form>
				<a href='pro_review.php?pro_id=".$pro_id."' style='text-decoration: none;'>	<input type='submit' name='comment' value='Write a product review' style='margin-top:2%;margin-left:30%;font-size:15px;width:200px;height:30px;border-radius:4px;border:1px solid #400040;'></a>
						
				</div>
				";
				$get_user_review=$con->prepare("select * from comment where pro_id='$pro_id'");
					
					
					$get_user_review->execute();
					echo"<h3 style='margin-left:15px;'>Top customer reviews</h3>";
					while($get_review=$get_user_review->fetch()):
					
					
						echo"<div id='reviewlist'><img src='avatar1.png' style='width:30px;height:30px;float:left;'>
						
						
				<p>".$get_review['username']."</p><br><br><br>
				
				
						";
				
				if($get_review['rating']==1)
				{
					echo"<img src='1star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Poor Hated it</p>";
				}
				if($get_review['rating']==2)
				{
					echo"<img src='2star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Below Average Disliked it</p>";
				}
				if($get_review['rating']==3)
				{
					echo"<img src='3star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Average It was Ok</p>";
				}
				if($get_review['rating']==4)
				{
					echo"<img src='4star.png' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Above Average Liked it</p>";
				}
				if($get_review['rating']==5)
				{
					echo"<img src='5star.jpeg' id='ratimg' style='width:100px;height:30px;margin:-5px;margin-left:10px;'>
					<br><br><p style='margin-left:120px;margin-top:-40px;'>Excellent Loved it</p>";
					
				}
					
					echo"
					
					<br><p style='margin-left:10px;margin-top:10px;'>".$get_review['date']."</p>
					
					<br><br><p style='margin-left:10px;margin-top:-20px;'>".$get_review['decc']."</p>
					
					
					<form method='post'>
					
						<br><br><b style='margin-left:10px;'> ".$get_review['helpful']." person found this helpful.  Was this review helpful to you?</b><a href='addhelful.php'><input type='submit' name='yes' value='yes' style='width:40px;height:20px;margin-left:10px;border:1px solid #400040;background:#fff;border-radius:3px;'></a>
						<input type='submit' name='no' value='no' style='width:40px;height:20px;margin-left:5px;margin-right:10px;border:1px solid #400040;background:#fff;border-radius:3px;'><b>Report abuse</b>
					
					</form>
					
					
					
					
					
					
					
					
					";

					echo"</div>";
					
					
					endwhile;
				
				if(isset($_POST['yes']))
				{
					$get_user_review4=$con->prepare("select * from comment where pro_id='$pro_id' ");
					
					
					$get_user_review4->execute();
					$getvalue=$get_user_review4->fetch();
					
					$helfulvalue=$getvalue['helpful'];
					$helfulvalue=$helfulvalue+1;
					$get_user_review2=$con->prepare("update comment set helpful='$helfulvalue' where pro_id='$pro_id' ");
					
					
					$get_user_review2->execute();
					
					
				}
				include("function_user.php");
				echo add_cart();
					echo add_whishlist();
				?>
				
</body>
</html>