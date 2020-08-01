<html>
<head>
<style>



#bodyright{overflow-x:scroll;padding:2%;padding-bottom:0%;box-sizing:border-box;border-radius:3px;margin-top:1%;width:74%;height:50px;background:#400040;float:left;}

#bodyright h2{border:1px solid aquamarine;border-radius:3px;height:50px;line-height:50px;background:#ff4000;color:#fff; text-align:center; text-shadow:5px 5px 5px #000; }

#bodyright form table{width:90%;margin:auto;margin-top:10px !important;}

#bodyright form table tr td{padding-left:3%;width:50%;height:35px;color:#fff;}

#bodyright form table tr td input{margin-left:-110px;border-radius:3px;border:2px solid #e6e6e6; width:100%;height:30px;padding-left:2%;box-sizzing:border-box;}

#bodyright form table tr td select{margin-left:-110px;border-radius:3px;border:2px solid #e6e6e6; width:100%;height:30px;padding-left:2%;box-sizzing:border-box;}


#bodyright form button{margin-top:10px;border-radius:3px;border:2px solid #ff4000;width:200px;height:40px;font-weight:bold;outline:none;background:#fff;}

#bodyright form button:hover{background:#ff4000;color:#fff;}

#bodyright form table tr th{padding-right:2%;box-sizzing:border-box;font-size:20px;color:#fff; text-align:center; background:#400040; height:40px;text-shadow:5px 5px 5px #000;border:1px solid aquamarine;}

#add_cat{margin-top:20px;border-top:2px solid #400040;}

#bodyright form table tr td a{text-decoration:none;color:#fff;}

.scroll{min-height:590px;}
.scroll form table tr th{text-align:center !important;padding:0% !important;background:#400040 !important;font-size:15px !important;height:30px !important;width:60px !important;}

.scroll form table tr td img{height:30px;width:30px;}

.scroll form table tr td{padding-left:2% !important;min-width:150px;height:35px;font-size:14px;}
</style>
</head>

<div class="scroll" id="bodyright">



	<form method="post" enctype="multipart/form-data">
	
		<h2>Search Products Results</h2>
	<input type="text" name="query" required placeholder="!...Search product here...!" style="width:700px;height:30px;border:1px solid aquamarine;border-radius:4px;margin:20px;">


	<input style="margin:10px;width:80px;height:30px;border:1px solid aquamarine;border-radius:4px;background:transparent;color:#fff;font-size:16px;" type="submit" name="search" value="search">
		
	
		<table>
		
			<tr>
				<th>Sr No.</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Product name</th>
				<th>Product Images</th>
				<th>Feature1</th>
				<th>Feature2</th>
				<th>Feature3</th>
				<th>Feature4</th>
				<th>Feature5</th>
				<th>Price</th>
				<th>Model No.</th>
				<th>Warranty</th>
				<th>Keyword</th>
				<th>Added Date</th>
			</tr>	
		
		<?php
		
		
		
		
	if(isset($_POST['search']))
	{
	
		$query=$_POST['query'];
	
		include("db.php");
		
		$fetch_pro=$con->prepare("select * from products where pro_name like '%$query%' or pro_keyword like '%$query%'");
		
		$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
		 
		$fetch_pro->execute();
		$i=1;
		while($row=$fetch_pro->fetch()):
		
			echo "<tr>
				<td>".$i++."</td>
				<td><a href='admin_index.php?edit_pro=".$row['pro_id']."'>Edit</a></td>
				<td><a href='delete_cat.php?delete_pro=".$row['pro_id']."'>Delete</a></td>
				
				<td style='min-width:200px'>".$row['pro_name']."</td>
				<td style='min-width:200px'>
				
					<img src='../imgs/ragava/".$row['pro_img1']."' />
					<img src='../imgs/ragava/".$row['pro_img2']."' />
					<img src='../imgs/ragava/".$row['pro_img3']."' />
					<img src='../imgs/ragava/".$row['pro_img4']."' />
				
				
				
				</td>
				<td >".$row['pro_feature1']."</td>
				<td>".$row['pro_feature2']."</td>
				<td>".$row['pro_feature3']."</td>
				<td>".$row['pro_feature4']."</td>
				<td>".$row['pro_feature5']."</td>
				<td>".$row['pro_price']."</td>
				<td>".$row['pro_model']."</td>
				<td>".$row['pro_warranty']."</td>
				<td>".$row['pro_keyword']."</td>
				<td>".$row['pro_added_date']."</td>
			</tr>";
			
		endwhile;
	}
		?>
		
		</table>
		
	
	</form>


</div>
