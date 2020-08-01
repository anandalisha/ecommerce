<html>
<head>
<style>
#sfl{width:70%;height:auto;background:#fff;}
</style>
<body>
<?php
echo"<div id='sfl'>";

			$a=1;
			$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
			$get_user_item->execute();
			
			$user_getch=$get_user_item->fetch();
			$userid=$user_getch['ID'];

				$readsavf=$con->prepare("select * from saveforlater where userid='$userid'");
			
			
				if($readsavf->execute())
				{
					$save_empty=$readsavf->rowCount();
				}
				
				if($save_empty==0)
				{
					
				}
				else{
					
					
						echo"<hr style='margin-top:20px;'>
						<h2>Saved for later ($save_empty items)</h2>
						<br><hr>";
						
						$show_sfl=$con->prepare("select * from saveforlater where userid='$userid'");
			
						$show_sfl->setFetchMode(PDO:: FETCH_ASSOC);
						$show_sfl->execute();
						
						while($row_sfl=$show_sfl->fetch()):
				
				
						$pro_id1=$row_sfl['pro_id'];
						$get_pro1=$con->prepare("select * from products where pro_id='$pro_id1'");
						$get_pro1->setFetchMode(PDO:: FETCH_ASSOC);
						$get_pro1->execute();
					
						$row_pro1=$get_pro1->fetch();
						
						echo"<div id='sflshow'>
						";
						$proname=$row_pro1['pro_name'];
						if(strlen($proname)>=1)
						{
						echo"
							<img src='../imgs/ragava/".$row_pro1['pro_img1']."' />
						
							<li><a href='pro_detail.php?pro_id=".$row_pro1['pro_id']."'>".$row_pro1['pro_name']."</a></li>
						
							<li style='margin-top:-70px;color:green;font-size:13px;font-weight:normal;'>In stock</li>
							<img src='alogo.png' style='margin-left:150px;margin-top:-70px;width:100px;height:18px;'/>
							<li style='float:right;;color:#B12704!important;margin-right:50px;'>Rs.".$row_pro1['pro_price'].".00</a></li>
							
							<li style='margin-top:-40px;color:green;font-size:13px;margin-bottom:30px;font-weight:normal;'><a href='delete_saveforlater.php?pro_id=".$row_pro1['pro_id']."' style='padding-right:10px;'>Delete</a>|<a href='movetocart.php?pro_id=".$row_pro1['pro_id']."' style='padding-right:10px;padding-left:10px;'>Move to Cart</a>|<a href='#' style='padding-right:10px;padding-left:10px;'>Move to Whishlist</a></li>
							
						<hr>";
						}
						echo"</div>";
						
						
						endwhile;
						
				}
				
			
			echo"</div>";
			
			?>
			
</body>

</html>