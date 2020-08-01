
<style>

	*
{
		margin:0;
		padding:0;
		font-family:verdana,geneva,sans-serif;
}


#header
{
	width:100%;
	height:110px;
	background:#800080;
}


#logo{width:20%;height:110px;float:left;}

#logo img{width:260px;height:110px;}

#link{width:80%;height:30px; float:left;}

#link ul{list-style-type:none; float:right;margin-right:20px;}

#link ul li{margin-left:30px;float:left;line-height:30px;}

#link ul li a{text-decoration:none;color:#fff;}

#search form input{padding-left:2%; border-top-left-radius:3px; border-bottom-left-radius:3px; width:58%;height:35px;outline:none;border-width:0px;margin-top:20px;}


#search_btn {border-top-right-radius:3px; border-bottom-right-radius:3px; margin-left:-10px;color:#fff; font-weight:bold;  width:10%;height:37px;outline:none;border-width:0px; background:#400040;}

#cart_btn {border-radius:4px;color:#fff; font-weight:bold;  width:10%;height:37px;outline:none;border-width:0px; background:#400040;}

#cart_btn a{text-decoration:none;}

</style>

<div id="header">
					<div id="logo">
					
					<a href="index.php"><img src="../imgs/logo.jpg" /></a>
					
					</div><!--end of logo-->
					
						<div id="link">
						
							<ul>
								<li><a href="logout.php">LogOut</a></li>
								<li><a href="#">Sign Up</a></li>
								<li><a href="c_loginpage.php">Login</a></li>
							</ul>
						
						</div><!--end of link-->
						
						<div id="search">
						
							<form method="get" action="search.php" >
							
								<input type="text" name="user_query" placeholder="search products here..." required />
								
								<button name='search' id="search_btn" >search</button>
								
								<button id="cart_btn" ><a href='cart.php'>cart <?php   echo cart_caount();   ?></a></button><br>
								
								<p><b id="username" ><?php echo show_name(); ?></b></p>
								
							
							</form>
						
						
						</div><!--end of search-->
						
						
					
				</div><!--end of header-->
				
				
			<?php
			
			function getIpp()
		{
			$ipp=$_SERVER['REMOTE_ADDR'];
			
			if(!empty($_SERVER['HTTP_CLIENT_IP']))
			{
				$ipp=$_SERVER['HTTP_CLIENT_IP'];
			}
			else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			{
				$ipp=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			return $ipp;
		}
		
		
				

				
				
				function cart_caount()
				{
			
						include("db.php");
						$a=1;
			$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
			$get_user_item->execute();
			
			$user_getch=$get_user_item->fetch();
			$userid=$user_getch['ID'];
			
						$ipp=getIpp();
						
						$get_cart_item=$con->prepare("select * from cart where userid='$userid'");
						
						$get_cart_item->execute();
						
						$count_cart=$get_cart_item->rowCount();
						
						echo $count_cart;
		
				}
			
			function show_name()
			{
						include("db.php");
								$a=1;
					$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
					
					
					$get_user_item->execute();
					$count_cart=$get_user_item->rowCount();
					
					$user_getch=$get_user_item->fetch();
					$username=$user_getch['username'];
					if($count_cart==0)
					{
						echo"";
					}
					else{
					echo"<b style='color:red;font-size:20px;'>Welcome</b>  ".$_COOKIE["user"]."";
				
					// echo"<b style='color:red;font-size:20px;'>Welcome</b> $username ".$_COOKIE["user"]."";
					}	
			}
			?>	