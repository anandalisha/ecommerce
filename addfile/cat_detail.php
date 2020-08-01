<html>
<head>
	<title>onlie.store.com</title>
	<link rel="stylesheet" href="index_style.css" />


<style>
#bodyleft{box-sizzing:border-box;width:72%;margin-top:10px; margin-left:10px; float:left;background:#fff;}


#bodyleft h2{box-shadow:5px 5px 5px #ccc;text-shadow:5px 5px 5px #000; border-top-right-radius:3px;border-top-left-radius:3px;text-align:center; background:#400040;color:#fff;height:40px;line-height:40px;}

#bodyleft ul{list-style-type:none;padding-bottom:1.5%;}

#bodyleft ul li{border-radius:3px;margin-top:10px;margin-left:1%;float:left;width:31%;min-height:350px;border:3px solid #e6e6e6;}

#bodyleft h3{text-shadow:5px 5px 5px #000; box-shadow:3px 3px 3px #000;line-height:40px;border-radius:3px;height:40px;margin-top:10px;background:#400040;color:#fff;padding-left:5%;}

#bodyleft ul li a{text-decoration:none;color:#2e2e2e;display:block;}

#bodyleft ul li a h4{overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin-top:5px;text-align:center;font-size:12px;}

#bodyleft ul li a img{width:100%;height:300px;margin-bottom:4px;}

#pro_btn{width:30%;height:30px;background:#fff;border-radius:3px; border:1px solid #400040;}

#pro_btn:hover{background:#400040;}

#pro_btn:hover a{color:#fff;}


#bodyright{background:#fff;width:25%;margin-top:10px; margin-left:10px; float:left;height:auto;}


#bodyright h3{margin-top:12px;font-size:20px;text-shadow:5px 5px 5px #000; border-radius:3px;border-top-left-radius:3px;text-align:center; background:#400040;color:#fff;height:40px;line-height:40px;}


#bodyright ul{list-style-type:none;}
#bodyright ul li{list-style-type:none;margin-left:15%;height:35px;width:100%;line-height:35px;margin-top:5px;}
#bodyright ul li img{margin:0%;}
.bodyright ul{list-style-type:circle;}

#bodyright ul li a{text-decoration:none;color:#2e2e2e;font-size:14px;font-weight:bold;}
#bodyright ul li a:hover{text-decoration:underline;color:#000;}

#pro_btn1{width:30%;height:30px;background:#fff;border-radius:3px; border:1px solid #400040;margin-bottom:2px;}
#pro_btn1:hover{background:#400040;color:#fff;}

#pro_btn:hover{background:#400040;}

#pro_btn:hover{color:#fff;}
</style>

</head>

		<body bgcolor="#DCDCDC">
		
				
				
				
				
				
				<?php 
				include("header_index.php");
				include("navbar.php");
				include("function_user.php");
				
				echo "<div id='bodyleft'><ul>";  cat_detail(); sub_cat_detail(); bd_men(); bd_women(); bd_kids(); all_about_men();
				
				
				all_about_women();all_about_kids();
				
				
				
				
				echo"</ul></div>";
				if(isset($_GET['cat_id']) || isset($_GET['sub_cat_id']))
				{
				
				echo "<div class='bodyright' id='bodyright'>
				
				
						<ul>"; viewall_sub_cat(); viewall_cat();echo"</ul></div><br clear='all' />";
				
				}
				else
				{
					include("bodyright_user_sample.php");
				}
				
				
				echo add_cart();
				echo add_whishlist();
				
			include("footer.php");
				 
				?>
				
			
						
				
				
		
				
		</body>

</html>
