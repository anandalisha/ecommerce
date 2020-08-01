<html>
<head>
<style>
#bodyleft{box-sizzing:border-box;width:72%;margin-top:10px; margin-left:10px; float:left;background:#fff;}


#bodyleft h2{box-shadow:5px 5px 5px #ccc;text-shadow:5px 5px 5px #000; border-top-right-radius:3px;border-top-left-radius:3px;text-align:center; background:#400040;color:#fff;height:40px;line-height:40px;}

#bodyleft ul{list-style-type:none;padding-bottom:1.5%;}

#bodyleft ul li{overflow:hidden;border-radius:3px;margin-top:10px;margin-left:1%;float:left;width:31%;min-height:350px;border:2px solid #e6e6e6;border-bottom:4px solid #e6e6e6;}
#bodyleft ul li:hover{border:2px solid #400040;border-bottom:4px solid #400040;}
#bodyleft h3{text-shadow:5px 5px 5px #000; box-shadow:3px 3px 3px #000;line-height:40px;border-radius:3px;height:40px;margin-top:10px;background:#400040;color:#fff;padding-left:5%;}

#bodyleft ul li a{text-decoration:none;color:#2e2e2e;display:block;overflow:hidden;}
#bodyleft ul li a h4:hover{text-decoration:underline;}
#bodyleft ul li a h4{overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin-top:5px;text-align:center;font-size:12px;}

#bodyleft ul li a img{transition:1.40s;width:100%;height:300px;margin-bottom:4px;}

#bodyleft ul li a img:hover{transform:scale(1.1,1.1);transition:1.40s;}


#pro_btn{width:30%;height:30px;background:#fff;border-radius:3px; border:1px solid #400040;margin-bottom:2px;}

#pro_btn:hover{background:#400040;}

#pro_btn:hover{color:#fff;}
#pro_btn:hover a{color:#fff;}
#pro_btn1{width:30%;height:30px;background:#fff;border-radius:3px; border:1px solid #400040;margin-bottom:2px;}
#pro_btn1:hover{background:#400040;}

#pro_btn1:hover{color:#fff;}
</style>
</head>


<div id="bodyleft">
				
				
				
				<h2><i class="fa fa-bullhorn" style="font-size:35px;color:aquamarine;"></i> Deals of the Day <i class="fa fa-bullhorn" style="font-size:35px;color:aquamarine;"></i></h2>
				
				<div id="slider">
					<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="g5.jpg" ></a>
				
					<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="g4.jpg" ></a>
				
					<a href="cat_detail.php?cat_id=33"> <img class="mySlides" src="ss.jpg" ></a>
				
					<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="w18.jpg" ></a>
				
					<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="w17.jpg" ></a>
				
					<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="w16.jpg" ></a>
				
					<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="1 (2).jpg" ></a>
				
				 	<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="term.jpg" ></a>
					<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="w14.jpg" ></a>
				
				<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="c.JPG" ></a>
				<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="term1.jpg" ></a>
				 	<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="b.jpg" ></a>
				<a href="pro_detail.php?pro_id=18"> <img class="mySlides" src="g4.jpg" ></a>
				
				<a href="pro_detail.php?pro_id=18"><img class="mySlides" src="ss.jpg" ></a>
				<a href="pro_detail.php?pro_id=18"><img class="mySlides" src="w17.jpg" ></a>
				<a href="pro_detail.php?pro_id=18"><img class="mySlides" src="g5.jpg" ></a>
				<a href="pro_detail.php?pro_id=18"><img class="mySlides" src="w18.jpg" ></a>
				<a href="pro_detail.php?pro_id=18"><img class="mySlides" src="v.jpg" ></a>
				<a href="pro_detail.php?pro_id=18"><img class="mySlides" src="1 (2).jpg" ></a>
				<a href="pro_detail.php?pro_id=18"><img class="mySlides" src="rr2.jpg" ></a>
				</div><!--end of slider-->
			<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 6000); // Change image every 2 seconds
}
</script>	
				
			<ul>
			<?php
			
				echo recentview();
			
			?>	
		</ul>		<br clear='all' />	
		<ul>
			<?php
			
				echo electronics();
			
			?>	
		</ul>		<br clear='all' />
				
			

		<ul>
			<?php
			
				echo dress();
			
			?>
		</ul> <br clear='all' />
					
		<ul>
			<?php
			
				echo womendress();
			
			?>
		</ul> <br clear='all' />
					
				
				<ul>
			<?php
			
				echo mobiles();
			
			?>
		</ul> <br clear='all' />
		
		<ul>
			<?php
			
				echo sports();
			
			?>
		</ul> <br clear='all' />
				<ul>
			<?php
			
				echo books();
			
			?>
		</ul> <br clear='all' />
				<ul>
			<?php
			
				echo mobiles();
			
			?>
		</ul> <br clear='all' />
				<ul>
			<?php
			
				echo mobiles();
			
			?>
		</ul> <br clear='all' />
				
				
</div><!--end of bodyleft-->

</html>