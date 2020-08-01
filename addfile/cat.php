<html>
<head>
<style>
#bodyright{background:#400040;}
#bodyright h2{border-radius:3px;height:50px;line-height:50px;background:#ff4000;color:#fff; text-align:center; text-shadow:5px 5px 5px #000; }

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

<div id="bodyright">


<h2  >View All Category Here</h2>
<form method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<th>Sr No.</th>
			<th>category Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
			
		<?php include("db.php");
		
		$fetch_cat=$con->prepare("select * from main_cat ORDER BY cat_name");
						
						$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
					
						$fetch_cat->execute();
		
						$i=1;
						
						while($row=$fetch_cat->fetch()):
						
						
						echo "
						<tr>
						<td>".$i++."</td>
								<td>".$row['cat_name']."</td>
								<td><a href='admin_index.php?edit_cat=".$row['cat_id']."'>Edit</a></td>
								<td><a href='delete_cat.php?delete_cat=".$row['cat_id']."'>Delete</a></td>
							</tr>	";   
						
						
						endwhile;
						?>
		
	
	
	</table>


</form>
<h2  id="add_cat">Add New Category Here</h2>


	<form  method="post">
	
	
	
		
	
		<table>
		
			<tr>
			
				<td>Enter Category Name:</td>
				<td><input type="text" name="cat_name" required /></td>
			
			</tr>
		
		</table>
		
		<center><button name="add_cat">Add Category </button></center>
	
	</form>


</div>

<?php

	include("function.php");
	echo add_cat();
	
	

?>