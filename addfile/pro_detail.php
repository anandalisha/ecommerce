
<?php
	if(isset($_POST['buy_now']))
	{
		include("db.php");
					
		
				$pro_id=$_POST['pro_id'];
				$ip="::1";
				$a=1;
				$get_user_item=$con->prepare("select * from newuser where set_online='$a'");
			
			
				$get_user_item->execute();
				
				$user_getch=$get_user_item->fetch();
        if(!empty($user_getch))
        {
    				$userid=$user_getch['ID'];
    			
    				$check_cart=$con->prepare("select * from cart where pro_id='$pro_id' AND userid='$userid'");
    				
    				$check_cart->execute();
    				
    				$row_check=$check_cart->rowCount();
    				
    				if($row_check==1)
    				{
    					echo"<script>alert('This Product Already added in your Cart');</script>";
    				
    				} 
          }
				else
				{
          $userid=0;
					if($userid==0)
					{
						echo"<script>alert('This Product Can not add your cart please login');</script>";
				
					}
					else
					{
						$add_cart=$con->prepare("insert into cart(pro_id,qty,ip_add,userid)values('$pro_id','1','$ip','$userid')");
						
						if($add_cart->execute())
						{
							echo"<script>window.open('deliverydetails.php','_self');</script>";
						}
						else
						{
							echo"<script>alert('Try Again!!!');</script>";
						}
					}
				}
			
			}
		
		
			
	




?>






<html>
<head>
	<title>onlie.store.com</title>
	<link rel="stylesheet" href="index_style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<style>

#pro_img{width:40%;padding:1%;box-sizing:border-box;background:#fff;float:left;overflow:hidden;}
#pro_img img{width:300px; height:200px;transition:6.40s;cursor:pointer;overflow:hidden;margin-top:-10%;}
#pro_img img:hover{cursor:pointer;}
#pro_img ul{list-style-type:none;}
#pro_img ul li{float:left;}

#pro_img ul li img{width:100%;height:450px;margin-left:10px;}

#pro_features{padding:1%;box-sizing:border-box;width:60%;height:550px;background:#fff;float:left;}			

#pro_features h3{text-shadow: 10px 12px 14px #000;color:#fff;margin-top:0px;text-align:center;height:40px;border-bottom:2px solid #000;background:#400040;border-radius:4px;line-height:40px;}
#pro_features ul{margin-top:15px;width:50%;float:left;}
#pro_features ul li{margin-left:10px;list-style-type:circle;height:25px;margin-left:30px;font-size:17px;}

#pro_features h4{margin-top:40px;margin-bottom:20px;}


#buy_now{border-radius:3px;width:180px;height:35px;background:#fff;border:1px solid #400040; }

#buy_now:hover{background:#400040;color:#fff;}

#sim_pro{padding-top:70px;background:#fff;width:100%;height:350px;}

#sim_pro h3{background:#400040;color:#fff;height:40px;line-height:40px;padding-left:2%;}

#sim_pro ul{list-style-type:none;}

#sim_pro ul li{padding:0.5%;border:1px solid #fff;margin-top:10px;width:180px;float:left;margin-left:20px;}

#sim_pro ul li:hover{border:1px solid #400040;border-radius:3px;}

#sim_pro ul li a img{width:180px;height:230px;margin-bottom:10px;}
#sim_pro ul li a img:hover{}
#sim_pro ul li a p{text-align:center;}
#sim_pro ul li a{text-decoration:none;color:#000;}
#botoimg{width:500px;height:100px;background:#fff;margin-top:-70px;}
#botoimg img{width:80px;height:80px;margin-top:-10px;margin-left:20px;margin-bottom:50px;}

#rel_price{color:#112233;width:175px;background:#fff;margin-top:0px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;border:1px solid #fff;}
#rel_price:hover{color:#112233;border:1px solid #400040;}
#price{color:#C71585;text-shadow:10px 12px 14px #DB7093;font-size:20px;}
#selling{text-shadow:10px 12px 14px #DB7093;color:red;font-size:30px;}

#offer{color:#400040;text-shadow:10px 12px 14px #DB7093;font-size:20px;}





.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  
  background-color: #400040;
  color: #400040;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
  float:left;
  margin-right:2.5px;
   margin-left:5px;
   background-color: #bbb;
  border:1px solid green;
}
.dot:hover{background:#400040;color:#fff;}
#dont{width:105px;background:#fff;color:#fff;height:30px;float:left;margin-left:-350px;margin-top:140px;}
.prev{}
#prenext{margin-top:-200px;height:80px;background:#fff;width:50px;}
#prenext a{transition: background-color 0.6s ease;padding-right:15px;margin-right:500px;  cursor: pointer;padding-left:15px;color:#400040;margin-bottom:-100px;border:2px solid green;border-radius:15px;}

#prenext a:hover{background:#400040;color:#fff;}


#pro_features h5{float:right;color:#00FF7F;font-size:16px;font-weight:bold;margin-right:10px;margin-top:-20px;text-shadow: 10px 12px 14px #000;color:#fff;}

#delvery{width:800px;height:170px;background:#fff;float:right;margin-top:-110px;border-top:0.5px solid #808080;}
#delvery li{padding:1%;font-size:20px;}
#exchange{float:right;margin-top:-160px;margin-right:80px;width:230px;height:40px;background:#fff;}
#address{float:right;margin-top:-105px;margin-right:28px;background:#fff;list-style-type:none;height:10px;width:320px;color:#008080;}
#pro_des{width:98%;height:100%;background:#fff;}
#pro_des h3{width:100%;height:40px;background:#400040;color:#fff;margin-top:1px;line-height:40px;padding-left:2%;}
#pro_des p{margin-top:1px;}





#ex{box-sizzing:border-box;width:97%;margin-top:10px; float:left;background:#fff;height:auto;padding-left:20px;margin-left:8px;}
#ex img{border:1px solid aquamarine;transition:0.40s;width:300px;height:300px;margin-bottom:10px;margin-top:10px;margin-left:60px;border-radius:4px;}

#ex img:hover{border:1px solid aquamarine;}

#ex p{margin-top:10px;margin-left:130px;margin-right:50px;}



#pro_ti1{width:350px;height:auto;background:#fff;margin-bottom:20px;}

#pro_ti2{width:350px;height:auto;background:#fff;margin-bottom:20px;}

#pro_ti3{width:350px;height:auto;background:#fff;margin-bottom:20px;}

#pro_ti4{width:550px;height:auto;background:#fff;margin-bottom:20px;}

#pro_ti5{width:800px;height:auto;background:#fff;margin-bottom:20px;}


h4{margin-left:30px;}

#key{margin-left:40px;margin-top:20px;}

#footer{width:100%;height:40px;background:#fff;margin-top:20px;}

#footer h3{line-height:40px;color:#fff;text-align:center;font-size:14px;text-shadow:5px 5px 5px #fff;margin-top:130%;background:#fff;} 

.img-zoom-container {
  position: relative;
}
.img-zoom-lens {
  position: relative;
  border: 1px solid #d4d4d4;
  /*set the size of the lens:*/
  width: 50px;
  height: 50px;
  overflow:hidden;
}
.img-zoom-result {
  border: 1px solid #d4d4d4;
  /*set the size of the result div:*/
  width: 300px;
  height: 270px;
  
}

 
#review{margin-top:207%;position:relative;width:100%;height:800px;background:#fff;}
#rating{width:75%;height:330px;background:#fff;margin-left:15px;margin-top:10px;}

#rating img{width:170px;height:170px;}
#reviewlist{width:60%;height:300px;background:#fff;margin-top:1px;margin-left:15px;border:1px solid aquamarine;}

#reviewlist img{margin:10px;}
#reviewlist p{margin-top:15px;}

#reviewlist1{width:37%;float:right;margin-top:-250.2%;background:#fff;height:300px;margin-right:15px;border-top:1px solid aquamarine;}
#reviewlist3{margin:10px;border:1px solid aquamarine;}


#showreview{
    background-color:yellow;
    padding:20px;
    display:none;
	margin-left:550px;width:200px;height:80px;
}
  #showreview img{width:150px;height:100px;margin-top:-15px;}  
span:hover + #showreview{
    display:block;
}

</style>

<script>
function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
</head>
		<body>
		
				
				
				
				
				
				<?php 
			
				include("header_index.php");
				include("navbar.php");
				include("function_user.php");
				
				
				
				
				echo  pro_details();
				
				
				
				include("footer.php");
			
				
				?>
			
				
<script>
// Initiate zoom effect:
imageZoom("myimage", "myresult");
</script>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
				
				
				
		<div id="bottom" style="width:100%;height:300px;background:red;margin-top:79%;">	
<?php include("backtotop.php");?>		
		</div>		
		</body>

</html>
