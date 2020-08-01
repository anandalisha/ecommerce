<html>
<head>
	<title>online.store.com</title>
	<link rel="stylesheet" href="index_style.css" />

</head>
<style>
#bodyleft{box-sizzing:border-box;width:72%;margin-top:10px; margin-left:10px; float:left;background:#fff;}


#bodyleft h2{box-shadow:5px 5px 5px #ccc;text-shadow:5px 5px 5px #000; border-top-right-radius:3px;border-top-left-radius:3px;text-align:center; background:#400040;color:#fff;height:40px;line-height:40px;}

#bodyleft ul{list-style-type:none;padding-bottom:1.5%;}

#bodyleft ul li{border-radius:3px;margin-top:10px;margin-left:1%;float:left;width:31%;min-height:350px;border:2px solid #e6e6e6;border-bottom:4px solid #e6e6e6;}
#bodyleft ul li:hover{border:2px solid #400040;border-bottom:4px solid #400040;}
#bodyleft h3{text-shadow:5px 5px 5px #000; box-shadow:3px 3px 3px #000;line-height:40px;border-radius:3px;height:40px;margin-top:10px;background:#400040;color:#fff;padding-left:5%;}

#bodyleft ul li a{text-decoration:none;color:#2e2e2e;display:block;}
#bodyleft ul li a h4:hover{text-decoration:underline;}
#bodyleft ul li a h4{overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin-top:5px;text-align:center;font-size:12px;}

#bodyleft ul li a img{width:100%;height:300px;margin-bottom:4px;}

#pro_btn{width:30%;height:30px;background:#fff;border-radius:3px; border:1px solid #400040;margin-bottom:2px;}

#pro_btn:hover{background:#400040;}

#pro_btn:hover a{color:#fff;}
#pro_btn1{width:30%;height:30px;background:#fff;border-radius:3px; border:1px solid #400040;margin-bottom:2px;}
#pro_btn1:hover{background:#400040;}

#pro_btn1:hover{color:#fff;}

#pro_btn:hover{background:#400040;}

#pro_btn:hover{color:#fff;}
</style>

		<body>
		
				
				
				
				
				
				<?php 
				include("header_index.php");
				include("navbar.php");
				include("function_user.php");
				
				echo search();
				echo add_cart();
					echo add_whishlist();
				include("bodyright_index.php");
				include("footer.php");
				
				
				?>
				
			
				
				
				
				
				
		</body>

</html>
<?php


?>