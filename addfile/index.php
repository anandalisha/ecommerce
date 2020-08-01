<html>
<head>
	<title>online.store.com</title>
	<link rel="stylesheet" href="index_style.css" />
<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
</head>

		<body>
		
				
			
				
				
				
				<?php 
				include("header_index.php");
				include("navbar.php");
				include("function_user.php");
				include("index_bodyleft.php");
				include("bodyright_index.php");
				
				include("backtotop.php");
				
				
				
				echo add_cart();
				
				echo add_whishlist();
				
				?>
				
			
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
				
				
				<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;

}
</script>

				
		</body>

</html>

