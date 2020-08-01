
 <html>
 <head>
 <style>
 #bodyright{width:25%;margin-top:10px; margin-left:10px; float:left;}


#bodyright h2{font-size:20px;text-shadow:5px 5px 5px #000; border-top-right-radius:3px;border-top-left-radius:3px;text-align:center; background:#400040;color:#fff;height:40px;line-height:40px;}


#bodyright ul{list-style-type:none;}


#bodyright ul li{width:100%;height:120px; margin-top:5px;}
#bodyright ul li img{width:100%;height:120px; border-radius:3px;}

#bodyright img{width:100%;height:120px; border-radius:3px;}

</style>
</head>
<body>


	<div id="bodyright">
				
				
				<h2><i class="fa fa-venus-double" style="font-size:35px;color:aquamarine;"></i> Great Deals <i class="fa fa-venus-double" style="font-size:35px;color:aquamarine;"></i></h2>
					<img class="mySlides1" src="../imgs/Spring-season-discount-background-with-circle-label-vector-04.jpg" />
					<img class="mySlides1" src="../imgs/cyber-monday-big-sale-stickers-set-advertisement-special-offer-concept-holiday-shopping-discount-smartphone-screens-collection-online-mobile-app-horizontal_48369-23983.jpg" />
					<img class="mySlides1" src="../imgs1/slider/w5.jpg" />
					<img class="mySlides1" src="../imgs1/slider/w6.jpg" />
					<img class="mySlides1" src="../imgs/Facebook-Ad-Examples-14-Amazing-Examples-Of-Brands-Killing-It.jpg" />
					<img class="mySlides1" src="../imgs/ragava/one1.jpg" />
					<img class="mySlides1" src="../addfile/c.jpg" />
					<img class="mySlides1" src="../imgs1/slider/w.jpg" />
					<img class="mySlides1" src="../imgs1/slider/w4.jpg" />
					<ul>
						 
						<li id="leftimg"><a href="#"><img src="../imgs1/slider/w4.jpg" /></a></li>
						<li id="leftimg"><a href="#"><img src="../imgs1/slider/w6.jpg" /></a></li>
						
					</ul>
					<?php
		
			include("db.php");
			
			$query=$con->prepare("select * from products LIMIT 0,12");
			
			$query->execute();
			
			while($row=$query->fetch()):
				echo"<div id='get' style='border:1px solid #400040;margin-top:20px;border-radius:5px;'><a href='pro_detail.php?pro_id=".$row['pro_id']."' style='text-decoration:none;'>";
			
				echo"<img src='../imgs/ragava/".$row['pro_img4']."' style='width:250px;height:200px;margin:20px;margin-left:50px;'/>";
				echo"<h4 style='text-align:center;color:red;'>".$row['pro_name']."</h4>";
				echo"<h4 style='text-align:center;color:#000;margin:10px;font-weight:bold;'>Rs.".$row['pro_price']."</h4>";
				echo"</a></div>";
			endwhile;
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
		
		?>
				</div><!--end of the bodyright--><br clear="all" />
		<script>
var myIndex1 = 0;
carousel1();

function carousel1() {
    var i;
    var x = document.getElementsByClassName("mySlides1");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex1++;
    if (myIndex1 > x.length) {myIndex1 = 1}    
    x[myIndex1-1].style.display = "block";  
    setTimeout(carousel1, 2000); // Change image every 2 seconds
}
</script>
	
		
	</body>
</html>	