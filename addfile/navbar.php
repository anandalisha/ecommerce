<html>
<head>
	<title>online.store.com</title>
	
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>

<style>
#navbar{overflow:hidden; width:100%;height:40px;background:#400040;}


#navbar ul{list-style-type:none;margin-left:1%;}

#navbar ul li{ float:left;width:13%;text-align:center;line-height:40px;}

#navbar ul li a{text-decoration:none;color:#fff;font-size:14px; text-shadow:5px 5px 5px #000;}


#navbar ul li:hover{background:#800080; border-top:3px solid #fff;}




#navbar ul{padding-left:2%;}
#navbar li ul{display:none !important;}

#navbar li:hover ul{box-shadow:5px 5px 5px #2e2e2e;margin-top:-3px;margin-left:0px;padding-left:0%;background:#400040;display:block !important;width:200px;z-index:999;position:absolute;}

#navbar li ul li{float:none;height:35px;width:190px;line-height:35px;padding-left:5%;margin-left:0%;text-align:left;}

#navbar li ul li a{display:block;}
#navbar li:hover li{display:block;animation:navmenu 500ms forwards;}
#navbar li:hover{display:block;animation:navmenu 500ms forwards;}
@keyframes navmenu
{
	0%
	{
		opacity:0;
		top:5px;
	}
	100%
	{
		opacity:1;
		top:0px;
	}
}



</style>

<body>
<div id="navbar">
				
					<ul>
					
						
							
							<li><a href="#">CATEGORIES <i class="fa fa-amazon" style="font-size:20px;color:red;"></i></a>
							
								<ul>
									<?php
										include("db.php");
							
											$all_cat=$con->prepare("select * from main_cat");

											$all_cat->setFetchMode(PDO:: FETCH_ASSOC);
											$all_cat->execute();

											while($row_id=$all_cat->fetch()):
												
												echo"<li><a href='cat_detail.php?cat_id=".$row_id['cat_id']."'>".$row_id['cat_name']."</a></li>";
											
											endwhile;
										
										
										?>

								</ul>
							</li>
						
						
						
						
								
								<li><a href="#">Birthday <i class="fa fa-birthday-cake" aria-hidden="true" style="font-size:20px;color:red;"></i></a>
								
								<ul>
								
									<li><a href="cat_detail.php?bd_men">Men</a></li>
									<li><a href="cat_detail.php?bd_women">Women</a></li>
									<li><a href="cat_detail.php?bd_kids">kids</a></li>
								
								
								</ul>
								
								
								
								
								</li>
								
								
								<li><a href="#">Gift For Him  <i class="fa fa-gift" style="font-size:20px;color:red;"></i></a>
								
								<ul>
								
									<li><a href="cat_detail.php?men_clothing">Clothing</a></li>
									<li><a href="cat_detail.php?men_watch">Watches</a></li>
									<li><a href="cat_detail.php?men_belt">Belts</a></li>
									<li><a href="cat_detail.php?men_wallets">Wallets</a></li>
										<li><a href="cat_detail.php?men_shoes">Shoes</a></li>
									
									<li><a href="cat_detail.php?men_jewellery">Jewellery</a></li>
									
										<li><a href="cat_detail.php?men_sunglasses">sunglasses</a></li>
								
								
								</ul>
								
								
								</li>
								
								
								
								<li><a href="#">Gift For Her  <i class="fa fa-heartbeat" style="font-size:20px;color:red;"></i></a>
								
								<ul>
								
									<li><a href="cat_detail.php?women_watch">Watch</a></li>
									<li><a href="cat_detail.php?women_belt">Clothing</a></li>
									<li><a href="cat_detail.php?women_perfumes">Perfumes</a></li>
									
									<li><a href="cat_detail.php?women_Shoes">Shoes</a></li>
									
									<li><a href="cat_detail.php?women_Jewellery">Jewellery</a></li>
									
									<li><a href="cat_detail.php?women_Handbags">Handbags</a></li>
										<li><a href="cat_detail.php?women_sunglasses">Sunglasses</a></li>
								
								
								
								</ul>
								
								</li>
								<li><a href="#">Flowers <i class="fa fa-pagelines" style="font-size:20px;color:red;"></i></a>
								<ul>
								
									<li><a href="cat_detail.php?Plum_Flower">Plum Flower</a></li>
									<li><a href="cat_detail.php?Go_Green">Go Green</a></li>
									<li><a href="cat_detail.php?Fourwalls">Fourwalls</a></li>
								
								
								</ul>
								
								
								</li>
								
								<li><a href="#">Gift For Kids <i class="fa fa-child" style="font-size:20px;color:red;"></i></a>
							
								<ul>
								
									<li><a href="cat_detail.php?kids_watch">Watch</a></li>
									<li><a href="cat_detail.php?kids_belt">Belt</a></li>
									<li><a href="cat_detail.php?kids_game">Games</a></li>
									
									
									<li><a href="cat_detail.php?kids_clothing">Clothing</a></li>
									
									<li><a href="cat_detail.php?kids_Shoes">Shoes</a></li>
									
									
										<li><a href="cat_detail.php?kids_sunglasses">Sunglasses</a></li>
								
								
								</ul>
								
								
								
								</li>
								<li><a href="#">Brand <i class="fa fa-bitcoin" style="font-size:20px;color:red;"></i></a>
								<ul>
								
									<li><a href="cat_detail.php?brand_nokia">Nokia</a></li>
									<li><a href="cat_detail.php?Samsung">Samsung</a></li>
									<li><a href="cat_detail.php?Philips">Philips</a></li>
									<li><a href="cat_detail.php?LG">LG</a></li>
									<li><a href="cat_detail.php?redmi">Red Mi</a></li>
									
								
								
								</ul>
								
								
								
								</li>
						
					</ul>
				
			</div><!--end of navbar-->
</body>
</html>