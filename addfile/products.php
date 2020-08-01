<html>
<head>
<style>


#bodyright{padding:2%;box-sizing:border-box;border-radius:3px;margin-top:1%;width:74%;min-height:750px;background:#fff;float:left;}

#bodyright h2{border-radius:3px;height:50px;line-height:50px;background:#ff4000;color:#fff; text-align:center; text-shadow:5px 5px 5px #000; }

#bodyright form table{width:90%;margin:auto;margin-top:10px !important;}

#bodyright form table tr td{width:50%;height:35px;}

#bodyright form table tr td input{margin-left:-110px;border-radius:3px;border:2px solid #e6e6e6; width:100%;height:30px;padding-left:2%;box-sizzing:border-box;}

#bodyright form table tr td select{margin-left:-110px;border-radius:3px;border:2px solid #e6e6e6; width:100%;height:30px;padding-left:2%;box-sizzing:border-box;}

#bodyright form button{margin-top:10px;border-radius:3px;border:2px solid #ff4000;width:200px;height:40px;font-weight:bold;outline:none;background:#fff;}

#bodyright form button:hover{background:#ff4000;color:#fff;}


</style>
</head>

<div id="bodyright">


	<form method="post" enctype="multipart/form-data">
	
		<h2  >Add New Product From Here</h2>
	
		<table>
		
			<tr>
			
				<td>Enter Product Name:</td>
				<td><input type="text" name="pro_name"  /></td>
			
			</tr>
		
		<tr>
			
				<td>Select Category Name:</td>
				<td>
				<select name="cat_name">
				<?php

				include("function.php"); 
				echo viewall_cat();

				?>
				</select>
				</td>
			
			</tr>
			
			<tr>
			
				<td>Select Subcategory Name:</td>
				<td><select name="sub_cat_name">
				<?php

				 
				echo viewall_sub_cat();

				?>
				</select></td>
			
			</tr>
			
			
			<tr>
			
				<td>Select Product Image 1:</td>
				<td><input type="file" name="pro_img1"  /></td>
			
			</tr>
			<tr>
			
				<td>Select Product Image 2:</td>
				<td><input type="file" name="pro_img2"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Select Product Image 3:</td>
				<td><input type="file" name="pro_img3"  /></td>
			
			</tr>
			<tr>
			
				<td>Select Product Image 4:</td>
				<td><input type="file" name="pro_img4"  /></td>
			
			</tr>
			
			
			<tr>
			
				<td>Enter Feature1:</td>
				<td><input type="text" name="pro_Feature1"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Feature2:</td>
				<td><input type="text" name="pro_Feature2"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Feature3:</td>
				<td><input type="text" name="pro_Feature3"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Feature4:</td>
				<td><input type="text" name="pro_Feature4"  /></td>
			
			</tr>
			
			
			<tr>
			
				<td>Enter Feature5:</td>
				<td><input type="text" name="pro_Feature5"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Price:</td>
				<td><input type="text" name="pro_price"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Model No:</td>
				<td><input type="text" name="pro_model"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter warranty:</td>
				<td><input type="text" name="pro_warranty"  /></td>
			
			</tr>
			
			
			
			<tr>
			
				<td>Enter keyword:</td>
				<td><input type="text" name="pro_keyword"  /></td>
			
			</tr>
			
		</table>
		
		<center><button name="add_product">Add Product </button></center>
	
	</form>


</div>

<?php

	
	echo add_pro();

?>