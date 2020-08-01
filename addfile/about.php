<html>
<head>
<style>
body{background-image:url("avatar2.jpg");
background-repeat:no-repeat;
background-size:100% 100%;
}
tr{border:1px solid #400040;}


table{color:#000;width:60%;height:80%;background:transparent;border-radius:1px;border-collapse:collapse;margin-top:3%;margin-left:20%;}

th{border:1px solid #000;font-size:25px;}
td{margin:5%;border:1px solid #000;text-align:center;border-radius:1px;font-size:20px;}
#row{width:90px;text-align:center;}
#row1{width:220px;text-align:center;}
</style>
</head>
<body>
<div id="box">

	<?php

$a=1;



	$xml=simplexml_load_file("about.xml");


			foreach($xml->children() as $book)
			{
				
		
			echo"<table>
			
			<tr>
			<th>S.No:</th>
			<th>About</th>
			<th>Details</th>
			
			</tr>
			
			
			
			<tr><td id='row'>".$a++."</td><td id='row1'>Trading name</td><td>";echo $book->Tradingname;echo" </td></tr>";
			
			
			echo"<tr><td>".$a++."</td><td>Customer service</td><td>";echo $book->Customerservice;echo" </td></tr>";
			
			echo"<tr><td>".$a++."</td><td>Area served</td><td>";echo $book->Areaserved;echo" </td></tr>";
			echo"<tr><td>".$a++."</td><td>Products</td><td>";echo $book->Products;echo" </td></tr>";
			echo"<tr><td>".$a++."</td><td>Founder</td><td>";echo $book->Founder;echo" </td></tr>";
			echo"<tr><td>".$a++."</td><td>Founded</td><td>";echo $book->Founded;echo" </td></tr>";
			echo"<tr><td>".$a++."</td><td>Industry</td><td>";echo $book->Industry;echo" </td></tr>";
			echo"<tr><td>".$a++."</td><td>Website</td><td>";echo $book->Website;echo" </td></tr></table>";
			
			
			}

	?>
</div>
<p style="color:#fff;font-size:20px;">Parallax is the online-only retailer shop. This site deals with almost every goods. Provides you with best deals and best offers. So gets started and redefine your personality with our elegant and ethnic looks.
</p>

</body>


</html>
