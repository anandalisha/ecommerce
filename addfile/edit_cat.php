<html>
<head>
<style>

#bodyright h2{height:50px;line-height:50px;background:#ff4000;color:#fff; text-align:center; text-shadow:5px 5px 5px #000; }

#bodyright form table{width:90%;margin:auto;margin-top:10px !important;}

#bodyright form table tr td{padding-left:3%;width:50%;height:35px;color:#fff;}

#bodyright form table tr td input{margin-left:-110px;border-radius:3px;border:2px solid #e6e6e6; width:100%;height:30px;padding-left:2%;box-sizzing:border-box;}

#bodyright form button{margin-top:10px;border-radius:3px;border:2px solid #ff4000;width:200px;height:40px;font-weight:bold;outline:none;background:#fff;}

#bodyright form button:hover{background:#ff4000;color:#fff;}

#bodyright form table tr th{padding:0% 2% 0% 2%;box-sizzing:border-box;font-size:20px;color:#fff; text-align:left; background:#ff4000; height:40px;}

#add_cat{margin-top:20px;border-top:2px solid #400040;}

#bodyright form table tr td a{text-decoration:none;color:#fff;}

</style>
</head>


<h2  >Edit Category Here</h2>

<?php

	include("function.php");
	
	echo edit_cat();


?>
	
	</html>