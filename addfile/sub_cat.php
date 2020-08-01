<html>
<head>
<style>
#bodyright{background:#400040;}
#bodyright h2{border-radius:3px;height:50px;line-height:50px;background:#ff4000;color:#fff; text-align:center; text-shadow:5px 5px 5px #000; }

#bodyright form table{width:100%;margin:auto;margin-top:10px !important;}

#bodyright form table tr td{padding-left:2%;width:50%;height:35px;color:#fff;}

#bodyright form table tr td input{margin-left:-110px;border-radius:3px;border:2px solid #e6e6e6; width:100%;height:30px;padding-left:2%;box-sizzing:border-box;}

#bodyright form table tr td select{margin-left:-110px;border-radius:3px;border:2px solid #e6e6e6; width:100%;height:30px;padding-left:2%;box-sizzing:border-box;}


#bodyright form button{margin-top:10px;border-radius:3px;border:2px solid #ff4000;width:200px;height:40px;font-weight:bold;outline:none;background:#fff;}

#bodyright form button:hover{background:#ff4000;color:#fff;}

#bodyright form table tr th{padding:0% 3% 0% 2%;box-sizzing:border-box;font-size:20px;color:#fff; text-align:left; background:#ff4000; height:40px;text-shadow:5px 5px 5px #000;}

#add_cat{margin-top:20px;border-top:2px solid #400040;}

#bodyright form table tr td a{text-decoration:none;color:#fff;}

</style>
</head>

<div id="bodyright">

<h2 id="add_cat" >View All Sub Category Here</h2>
<form method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<th>Sr No.</th>
			
			<th>Sub category Name</th>
			<th >Category Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
			
		<?php include("db.php");
		
		
						
		$fetch_cat=$con->prepare("select * from sub_cat ORDER BY sub_cat_name  ");
						
						$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
					
						$fetch_cat->execute();
		
						$i=1;
						
						
						
						
						while($row=$fetch_cat->fetch()):
						
						
						$cat_id=$row['cat_id'];
						$fetch_main_cat=$con->prepare("select * from main_cat where cat_id='$cat_id'");
						
						$fetch_main_cat->setFetchMode(PDO:: FETCH_ASSOC);
					
						$fetch_main_cat->execute();
						$row_main=$fetch_main_cat->fetch();
						
					
						
						
						echo "
						<tr>
								<td>".$i++."</td>
									
								<td>".$row['sub_cat_name']."</td>
								<td>".$row_main['cat_name']."</td>
								<td><a href='admin_index.php?edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>
								<td><a href='delete_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td>
							</tr>	";   
						
						
						endwhile;
						?>
		
	
	
	</table>


</form>


	<form method="post">
	
		<h2  >Add New Sub Category Here</h2>
	
		<table>
		
		<tr>
			
				<td>Select Category Name:</td>
				<td><select name="main_cat">
				
					<?php
						
						include("function.php");
						echo viewall_cat();
						
					?>
					
				
				
				</td>
			
			</tr>
		
			<tr>
			
				<td>Enter Sub Category Name:</td>
				<td><input type="text" name="sub_cat_name" required /></td>
			
			</tr>
		
		</table>
		
		<center><button name="add_sub_cat">Add Sub Category </button></center>
	
	</form>


</div>

<?php
		
		echo add_sub_cat();
	
?>