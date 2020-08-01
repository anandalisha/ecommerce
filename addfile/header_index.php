
<style>


#header
{
	width:100%;
	height:110px;
	background:#800080;
	
	
}
#logo img{width:260px;height:110px;border:0.75px solid #400040;border-radius:4px;}
#logo img:hover{width:260px;height:110px;border:0.75px solid aquamarine;border-radius:4px;}
#link{width:80%;height:30px; float:left;}

#link ul{list-style-type:none; float:right;margin-right:20px;}

#link ul li{margin-left:30px;float:left;line-height:30px;}

#link ul li a{text-decoration:none;color:#fff;}
#link ul li a:hover{color:aquamarine;}
#search form input{padding-left:2%; border-top-left-radius:3px; border-bottom-left-radius:3px; width:58%;height:35px;outline:none;border-width:0px;margin-top:20px;}


#search_btn {border-top-right-radius:3px; border-bottom-right-radius:3px; margin-left:-10px;color:#fff; font-weight:bold;  width:10%;height:37px;outline:none;border-width:0px; background:#400040;}

#cart_btn{border-radius:4px;color:#fff; font-weight:bold;  width:10%;height:37px;outline:none;border-width:0px; background:#400040;}

#cart_btn a{text-decoration:none;}

#cart_btn a{text-decoration:none;color:#fff;display:block !important;}
	p{color:#000000;margin-right:40px;font-weight:bold;font-size:15px;margin-top:-80px;float:left;}
	#username{color:#F5F5F5;font-size:25px;}
	#username:hover{color:#00FA9A;cursor:pointer}
</style>

<div id="header">
					<div id="logo">
					
					<a href="index.php"><img src="../imgs/parallax.png" /></a>
					
					</div><!--end of logo-->
					
						<div id="link">
						
							<ul>
								<li><a href="logout.php" title="!...Thank you for shopping visit again...!">LogOut <i class="fa fa-sign-out" aria-hidden="true" style="color:red;"></i></a></li>
								<li><a href="newuser.php" title="!...To create new Account...!">Sign Up <i class="fa fa-user-plus" style="color:lightgreen;"></i></a></li>
								<li><a href="login_session.php" title="!...To enjoy shopping...!"><i class="fa fa-sign-in" aria-hidden="true" style="color:red;"></i> LogIn</a></li>
								<li><a href="about.php" title="!...To All About the website...!">About us <i class="fa fa-check" aria-hidden="true" style="color:aquamarine;"></i></a></li>
							</ul>
						
						</div><!--end of link-->
						
						<div id="search">
						
							<form method="get" action="search.php" >
							
								<input type="text" name="user_query" placeholder="search products here..." required />
								
								<button name='search' id="search_btn" >search <i class="fa fa-search-plus" aria-hidden="true" style="font-size:15px;color:yellow;"></i></button>
								
								<button id="cart_btn"><a href='cart.php' ><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:15px;color:red;"></i> cart <?php   echo cart_caount();   ?></a></button><br>
								
								
								
							
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
			if(!empty($user_getch))
			{
					$userid=$user_getch['ID'];
			
						$ipp=getIpp();
						
						$get_cart_item=$con->prepare("select * from cart where userid='$userid'");
						
						$get_cart_item->execute();
						
						$count_cart=$get_cart_item->rowCount();
						
						echo $count_cart;
			}
		
				}
			
			function show_name()
			{
						include("db.php");
								$a=1;
					$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
					
					
					$get_user_item->execute();
					$count_cart=$get_user_item->rowCount();
					
					$user_getch=$get_user_item->fetch();
					if(!empty($user_getch))
					{
						$username=$user_getch['username'];
					}
					if($count_cart==0)
					{
						echo"";
					}
					else{
						
					
						
					
					
					echo"<a href='your_account.php' style='text-decoration:none;color:white;display:block;'><b style='color:red;font-size:20px;'><i class='fa fa-amazon' aria-hidden='true' style='color:aquamarine;font-size:25px;'></i> Welcome</b>   ".$_COOKIE["usernameget"]."  <i class='fa fa-amazon' aria-hidden='true' style='color:aquamarine;font-size:25px;'></i></a>";
					
					
							//echo"<b style='color:red;font-size:20px;'>Welcome</b>   ".$_SESSION['email'];					
							//echo "Welcome ".$_SESSION['email'];
							// echo"<b style='color:red;font-size:20px;'>Welcome</b> $username ".$_COOKIE["user"]."";
					}	
			}
			?>	