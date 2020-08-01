<html>
<head>
<style>


#bodyright{padding:2%;box-sizing:border-box;border-radius:3px;margin-top:1%;width:74%;height:auto;background:#fff;float:left;}

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
			
			<tr>
			
				<td>For Whome:</td>
				<td>
				
				<select name="for_whome">
				
				<option></option>
				<option value="men">Men</option>
				<option value="women">Women</option>
				<option value="kids">Kids</option>
				
				</select>
				
				</td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile1:</td>
				<td><input type="text" name="pro_title1"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile1-details:</td>
				<td><input type="text" name="pro_title1_details"  /></td>
			
			</tr>
			
			
			<tr>
			
				<td>Enter Sub-titile2:</td>
				<td><input type="text" name="pro_title2"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile2-details:</td>
				<td><input type="text" name="pro_title2_details"  /></td>
			
			</tr>
			
			
			<tr>
			
				<td>Enter Sub-titile3:</td>
				<td><input type="text" name="pro_title3"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile3-details:</td>
				<td><input type="text" name="pro_title3_details"  /></td>
			
			</tr>
			
			
			<tr>
			
				<td>Enter Sub-titile4:</td>
				<td><input type="text" name="pro_title4"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile4-details:</td>
				<td><input type="text" name="pro_title4_details"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Select Product Image 5:</td>
				<td><input type="file" name="pro_img5"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Sub-titile5:</td>
				<td><input type="text" name="pro_title5"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile5-details:</td>
				<td><input type="text" name="pro_title5_details"  /></td>
			
			</tr>
			
				<tr>
			
				<td>Select Product Image 6:</td>
				<td><input type="file" name="pro_img6"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Sub-titile6:</td>
				<td><input type="text" name="pro_title6"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile6-details:</td>
				<td><input type="text" name="pro_title6_details"  /></td>
			
			</tr>
			
			
				<tr>
			
				<td>Select Product Image 7:</td>
				<td><input type="file" name="pro_img7"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Sub-titile7:</td>
				<td><input type="text" name="pro_title7"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile7-details:</td>
				<td><input type="text" name="pro_title7_details"  /></td>
			
			</tr>
			
				<tr>
			
				<td>Select Product Image 8:</td>
				<td><input type="file" name="pro_img8"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Sub-titile8:</td>
				<td><input type="text" name="pro_title8"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile8-details:</td>
				<td><input type="text" name="pro_title8_details"  /></td>
			
			</tr>
			
				<tr>
			
				<td>Select Product Image 9:</td>
				<td><input type="file" name="pro_img9"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Sub-titile9:</td>
				<td><input type="text" name="pro_title9"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile9-details:</td>
				<td><input type="text" name="pro_title9_details"  /></td>
			
			</tr>
			
				<tr>
			
				<td>Select Product Image 10:</td>
				<td><input type="file" name="pro_img10"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Sub-titile10:</td>
				<td><input type="text" name="pro_title10"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile10-details:</td>
				<td><input type="text" name="pro_title10_details"  /></td>
			
			</tr>
			
				<tr>
			
				<td>Select Product Image 11:</td>
				<td><input type="file" name="pro_img11"  /></td>
			
			</tr>
			
			<tr>
			
				<td>Enter Sub-titile11:</td>
				<td><input type="text" name="pro_title11"  /></td>
			
			</tr>
			<tr>
			
				<td>Enter Sub-titile11-details:</td>
				<td><input type="text" name="pro_title11_details"  /></td>
			
			</tr>
			
			
			
			
			
			
		</table>
		
		<center><button name="add_product">Add Product </button></center>
	
	</form>


</div>

<?php

	
	echo add_pro();

?>