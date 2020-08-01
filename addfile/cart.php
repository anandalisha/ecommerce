<html>
<head>
	<title>online.store.com</title>
	<link rel="stylesheet" href="index_style.css" />

</head>
<style>
body{background:#fff;}
.cart{width:100%;padding:1%;box-sizing:border-box;background:#fff;min-height:460px;}
.cart form table{width:100%;}
.cart form table tr th{font-size:14px;background:#e6e6e6;height:40px;color:#666;text-align:left;padding-left:1%;}
.cart form table tr td{font-size:14px;height:60px;padding-left:1.2%;}
.cart form table tr td img{width:100px;height:100px;}
.cart form table tr td img:hover{transform:scale(5,5);transition:1.40s;cursor:pointer;margin-left:55px;}
.cart form table tr td input[type="text"]{padding-left:1%;width:12%;height:30px;}
.cart form table tr td input[type="submit"]{background:#fff;color:#000;width:20%;height:30px;border:1px solid #400040;}

.cart form table tr td input[type="submit"]:hover{background:#400040;color:#fff;cursor:pointer;}
#buy_now{border-radius:3px;width:180px;height:35px;background:#fff;border:1px solid #400040; }

#buy_now:hover{background:#400040;color:#fff;}

#buy_now a{text-decoration:none;color:#000;display:block;}
#buy_now a:hover{background:#400040;color:#fff;display:block;}

#tdd{color:#008080;font-size:14px;border-top:1px solid #400040;border-bottom:1px solid #400040;width:10px;padding-right:20px;}

#tdd:hover{color:#fff;background:#400040;}


.cart form table tr td h2{border:1px solid #400040;border-radius:4px;margin-left:40px;color:red;text-align:center;margin-top:40px;background:#fff;color:#400040;height:40px;line-height:40px;width:100%;}

.cart form table tr td h2:hover{animation:navmenu 1000ms forwards;margin-left:40px;color:red;text-align:center;margin-top:40px;background:#400040;color:#fff;height:40px;line-height:40px;width:100%;}




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
#cart_p{margin-top:50px;font-size:15px;margin-left:15px;}

#sfl h2{margin-top:30px;}

#sflshow img{width:100px;height:100px;margin:20px;}

#sflshow li{margin-left:150px;margin-top:-120px;margin-bottom:80px;list-style-type:none;font-size:2opx;font-weight:bold;color:#0066c0;}
#sflshow li a{text-decoration:none; color:#0066c0;}
#nameoftable{}
</style>

		<body>
		
				
				
				
				
				
				<?php 
				include("function_user.php");
				include("header_index.php");
				include("navbar.php");
				
				
				
			
				
				
				?>
				
				<div class="cart">
				<form method="post" enctype="multipart/form-data">
					
					<table   cellpadding="0" cellspacing="0">
						
						<?php echo cart_display(); 
						
						include("saveforlatershow.php");
						
						
						
						?>
					
				
				
				
				</form>
				</div>
				
				
			
				
				
				
				
				
		</body>

</html>
