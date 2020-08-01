<html>
<head>

<style>

#sflbodyright{width:27%;float:right;background:#fff;height:400px;margin-top:-230px;border-left:1px solid #400040;position:relative;}

#sflbodyright img{width:200px;height:200px;}


#sflbodyright h5{color:#0066c0;margin-left:10px;}
#pricebr{float:right;margin-top:-180px;color:#B12704!important;margin-right:30px;}

#addcart{float:right;margin-top:-100px;margin-right:40px;width:100px;height:30px;background:#fff;color:#400040;border:1px solid #400040;border-radius:3px;}

#addcart:hover{color:#fff;background:#400040;}

</style>

</head>
<body>

<div id="sflbodyright">



		<?php
				include("db.php");
				$a=1;
				$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
				
				
				$get_user_item->execute();
				
				$user_getch=$get_user_item->fetch();
				$userid=$user_getch['ID'];
			
				$saveforlatercount=$con->prepare("select * from saveforlater where userid='$userid'");
				
				$saveforlatercount->execute();
				
				$countt=$saveforlatercount->rowCount();
				
				if($countt==0)
				{
					echo"";
					
				}else
				{
					$saveforlaterpro=$con->prepare("select * from products where cat_id='32' LIMIT 0,3");
					$saveforlaterpro->setFetchMode(PDO:: FETCH_ASSOC);
					$saveforlaterpro->execute();
					
					while($row=$saveforlaterpro->fetch()):
					
						
						echo"<img src='../imgs/ragava/".$row['pro_img1']."' />";
						
						echo"<h5>".$row['pro_name']."</h5>";
					
						echo"<h2 id='pricebr'>Rs.".$row['pro_price'].".00</h2>";
						echo"<input type='submit' value='Add to cart' name='cart' id='addcart'>";
						echo"<hr style='margin:10px;'>";
					
				endwhile;
				
					
						
				
					
				}
		
		?>
		

<div>
</body>
</html>