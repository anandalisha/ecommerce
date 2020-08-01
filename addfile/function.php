<?php

	function add_cat()
	{
		include("db.php");
		
		
		
		
		if(isset($_POST['add_cat']))
		{
			$cat=$_POST['cat_name'];
			
			$add_cat=$con->prepare("insert into main_cat(cat_name) values('$cat')");
			
			if($add_cat->execute())
			{
				echo "<script>alert('$cat category Added successfully')</script>";
				echo "<script>window.open('admin_index.php?viewall_cat','_self')</script>";
			
			
			}
			else
			{
				echo "<script>alert('$cat category Not Added successfully')</script>";
			}
			
			
		}
	}
	
	function add_sub_cat()
	{
		include("db.php");
		
		
		
		
		if(isset($_POST['add_sub_cat']))
		{
			$cat_id=$_POST['main_cat'];
			
			
			
			
			
			$sub_cat_name=$_POST['sub_cat_name'];
			
			
			$add_sub_cat=$con->prepare("insert into sub_cat(sub_cat_name,cat_id) values('$sub_cat_name','$cat_id')");
			
			if($add_sub_cat->execute())
			{
				echo "<script>alert('$sub_cat_name category Added successfully')</script>";
				
				echo "<script>window.open('admin_index.php?viewall_sub_cat','_self')</script>";
	
			}
			else
			{
				echo "<script>alert('$sub_cat_name category Not Added successfully')</script>";
			}
			
			
		}

	}
	
	function viewall_cat()
	{
		include("db.php");
						
						$fetch_cat=$con->prepare("select * from main_cat");
						
						$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
					
						$fetch_cat->execute();
						
						while($row=$fetch_cat->fetch()):
						
						echo "<option value='".$row[cat_id]."'>".$row['cat_name']."</option>";
						
						endwhile;
	}
	
	function viewall_sub_cat()
	{
		include("db.php");
						
						$fetch_sub_cat=$con->prepare("select * from sub_cat");
						
						$fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
					
						$fetch_sub_cat->execute();
						
						while($row=$fetch_sub_cat->fetch()):
						
						echo "<option value='".$row['sub_cat_id']."'>".$row['sub_cat_name']."</option>";
						
						endwhile;
	}
	function viewall_for_whome()
	{
		include("db.php");
						
						$fetch_sub_cat=$con->prepare("select * from products LIMIT 0,3");
						
						$fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
					
						$fetch_sub_cat->execute();
						
						while($row=$fetch_sub_cat->fetch()):
						
						echo "<option value='".$row['for_whome']."'>".$row['for_whome']."</option>";
						
						endwhile;
	}
	
	function add_pro()
	{
		include("db.php");
		
		
		
		
		if(isset($_POST['add_product']))
		{
			
			$pro_name=$_POST['pro_name'];
			
			$cat_id=$_POST['cat_name'];
			
			
			
			$sub_cat_id=$_POST['sub_cat_name'];
			
			$pro_img1=$_FILES['pro_img1']['name'];
			$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];
			
			$pro_img2=$_FILES['pro_img2']['name'];
			$pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];
			
			$pro_img3=$_FILES['pro_img3']['name'];
			$pro_img3_tmp=$_FILES['pro_img3']['tmp_name'];
			
			$pro_img4=$_FILES['pro_img4']['name'];
			$pro_img4_tmp=$_FILES['pro_img4']['tmp_name'];
			
			$pro_img5=$_FILES['pro_img5']['name'];
			$pro_img5_tmp=$_FILES['pro_img5']['tmp_name'];
			
			$pro_img6=$_FILES['pro_img6']['name'];
			$pro_img6_tmp=$_FILES['pro_img6']['tmp_name'];
			
			$pro_img7=$_FILES['pro_img7']['name'];
			$pro_img7_tmp=$_FILES['pro_img7']['tmp_name'];
			
			$pro_img8=$_FILES['pro_img8']['name'];
			$pro_img8_tmp=$_FILES['pro_img8']['tmp_name'];
			
			$pro_img9=$_FILES['pro_img9']['name'];
			$pro_img9_tmp=$_FILES['pro_img9']['tmp_name'];
			
			$pro_img10=$_FILES['pro_img10']['name'];
			$pro_img10_tmp=$_FILES['pro_img10']['tmp_name'];
			
			$pro_img11=$_FILES['pro_img11']['name'];
			$pro_img11_tmp=$_FILES['pro_img11']['tmp_name'];
			
			
			
			
			move_uploaded_file($pro_img1_tmp,"../imgs/ragava/$pro_img1");	
				
			move_uploaded_file($pro_img2_tmp,"../imgs/ragava/$pro_img2"); 
			
			move_uploaded_file($pro_img3_tmp,"../imgs/ragava/$pro_img3");
			
			move_uploaded_file($pro_img4_tmp,"../imgs/ragava/$pro_img4");	
			
			move_uploaded_file($pro_img5_tmp,"../imgs/ragava/$pro_img5");	
			
			move_uploaded_file($pro_img6_tmp,"../imgs/ragava/$pro_img6");	
			move_uploaded_file($pro_img7_tmp,"../imgs/ragava/$pro_img7");	
			move_uploaded_file($pro_img8_tmp,"../imgs/ragava/$pro_img8");	
			move_uploaded_file($pro_img9_tmp,"../imgs/ragava/$pro_img9");	
			move_uploaded_file($pro_img10_tmp,"../imgs/ragava/$pro_img10");	
			move_uploaded_file($pro_img11_tmp,"../imgs/ragava/$pro_img11");	
				
			
			$pro_feature1=$_POST['pro_Feature1'];
			$pro_feature2=$_POST['pro_Feature2'];
			$pro_feature3=$_POST['pro_Feature3'];
			$pro_feature4=$_POST['pro_Feature4'];
			$pro_feature5=$_POST['pro_Feature5'];
			
			$pro_price=$_POST['pro_price'];
			$pro_model=$_POST['pro_model'];
			
			$pro_warranty=$_POST['pro_warranty'];
			
			$pro_keyword=$_POST['pro_keyword'];
			
			$pro_for_whome=$_POST['for_whome'];
			
			
			$pro_title1=$_POST['pro_title1'];						
			$pro_title1_details=$_POST['pro_title1_details'];
			
			$pro_title2=$_POST['pro_title2'];
			$pro_title2_details=$_POST['pro_title2_details'];
			
			$pro_title3=$_POST['pro_title3'];
			$pro_title3_details=$_POST['pro_title3_details'];
			
			$pro_title4=$_POST['pro_title4'];
			$pro_title4_details=$_POST['pro_title4_details'];
			
			$pro_title5=$_POST['pro_title5'];
			$pro_title5_details=$_POST['pro_title5_details'];
			
			$pro_title6=$_POST['pro_title6'];
			$pro_title6_details=$_POST['pro_title6_details'];
			
			$pro_title7=$_POST['pro_title7'];
			$pro_title7_details=$_POST['pro_title7_details'];
			
			$pro_title8=$_POST['pro_title8'];
			$pro_title8_details=$_POST['pro_title8_details'];
			
			$pro_title9=$_POST['pro_title9'];
			$pro_title9_details=$_POST['pro_title9_details'];
			
			$pro_title10=$_POST['pro_title10'];
			$pro_title10_details=$_POST['pro_title10_details'];
			
			$pro_title11=$_POST['pro_title11'];
			$pro_title11_details=$_POST['pro_title11_details'];
			
			
			
			
			$add_cat=$con->prepare("insert into products
			(pro_name,cat_id,sub_cat_id,pro_img1,pro_img2,pro_img3,pro_img4,pro_feature1,pro_feature2,pro_feature3,pro_feature4,pro_feature5,pro_price,pro_model,pro_warranty,pro_keyword,pro_added_date,for_whome,sub_titile1,sub_titile1_details,sub_titile2,sub_titile2_details,sub_titile3,sub_titile3_details,sub_titile4,sub_titile4_details,sub_titile5,sub_titile5_details,sub_titile6,sub_titile6_details,sub_titile7,sub_titile7_details,sub_titile8,sub_titile8_details,sub_titile9,sub_titile9_details,sub_titile10,sub_titile10_details,sub_titile11,sub_titile11_details,pro_img5,pro_img6,pro_img7,pro_img8,pro_img9,pro_img10,pro_img11)
			values
			('$pro_name','$cat_id','$sub_cat_id','$pro_img1','$pro_img2','$pro_img3','$pro_img4','$pro_feature1','$pro_feature2','$pro_feature3','$pro_feature4','$pro_feature5','$pro_price','$pro_model','$pro_warranty','$pro_keyword',NOW(),'$pro_for_whome','$pro_title1','$pro_title1_details','$pro_title2','$pro_title2_details','$pro_title3','$pro_title3_details','$pro_title4','$pro_title4_details','$pro_title5','$pro_title5_details','$pro_title6','$pro_title6_details','$pro_title7','$pro_title7_details','$pro_title8','$pro_title8_details','$pro_title9','$pro_title9_details','$pro_title10','$pro_title10_details','$pro_title11','$pro_title11_details','$pro_img5','$pro_img6','$pro_img7','$pro_img8','$pro_img9','$pro_img10','$pro_img11')");
			
			if($add_cat->execute())
			{
				echo "<script>alert('product Added successfully')</script>";
			}
			else
			{
				echo "<script>alert('product category Not Added successfully')</script>";
			}
			
			
		}
	}
	
	function viewall_products()
	{
		include("db.php");
		
		$fetch_pro=$con->prepare("select * from products ORDER BY 1 DESC");
		
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
	
	
	function edit_cat()
	{
		include("db.php");
		 
		if(isset($_GET['edit_cat']))
		{
			$cat_id=$_GET['edit_cat'];
			
			$fetch_cat_name=$con->prepare("select * from main_cat where cat_id='$cat_id'");

			$fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat_name->execute();
			
			
			
			$row=$fetch_cat_name->fetch();
			
			
			
			echo "
	<form  method='post'>
	
	
	
		
	
		<table>
		
			<tr>
			
				<td>Update Category Name:</td>
				<td><input type='text' name='up_cat_name' value='".$row['cat_name']."' /></td>
			
			</tr>
		
		</table>
		
		<center><button name='update_cat'>Update Category </button></center>
	
	</form>";
	
	
	if(isset($_POST['update_cat']))
	{
		$up_cat_name=$_POST['up_cat_name'];
		
		$update_cat=$con->prepare("update main_cat set cat_name='$up_cat_name' where cat_id='$cat_id'");
	
		if($update_cat->execute())
		{
			echo "<script>alert('$up_cat_name category updated successfully');</script>";
		
			echo "<script>window.open('admin_index.php?viewall_cat','_self')</script>";
		
		}
	
	
	}
			
			}	
		
	}
	
	
	function edit_sub_cat()
	{
		include("db.php");
		
		if(isset($_GET['edit_sub_cat']))
		{
			$sub_cat_id=$_GET['edit_sub_cat'];
			
			$fetch_sub_cat=$con->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id' ");
			
			$fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			
			$fetch_sub_cat->execute();
			
			$row=$fetch_sub_cat->fetch();
			
			$cat_id=$row['cat_id'];
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='$cat_id'");
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			echo "<form method='post'>
				
				<table>
					<tr>
						<td> Select Main Category Name:</td>
						<td>
						<select name='main_cat'>
						<option value='".$row_cat['cat_id']."'>
						".$row_cat['cat_name']."
						</option> ";
						
						echo viewall_cat();
						
						echo "</select>
					</td>
					</tr>
					<tr>
						
							<td>Update Sub Category Name:</td>
							<td><input type='text' name='up_sub_cat' value='".$row['sub_cat_name']."'/></td>
						
					</tr>
				</table>
			
			<center><button name='update_Sub_cat'>Update Sub Category </button></center>
	
			</form>";
			
			if(isset($_POST['update_Sub_cat']))
			{
				$cat_name=$_POST['main_cat'];
				$sub_cat_name=$_POST['up_sub_cat'];
				
				$update_cat=$con->prepare("update sub_cat set sub_cat_name='$sub_cat_name',cat_id='$cat_name' where sub_cat_id='$sub_cat_id'");
				
				if($update_cat->execute())
				{
				
				echo "<script> alert('$sub_cat_name Sub Category Updated Successfully...')</script>";
									
				echo "<script>window.open('admin_index.php?viewall_sub_cat','_self')</script>";
									
				}
			}
			
		}
	}
	
	
	
	function edit_pro()
	{
		include("db.php");
		
		if(isset($_GET['edit_pro']))
		{
			$pro_id=$_GET['edit_pro'];
			$fetch_pro=$con->prepare("select * from products where pro_id='$pro_id'");
			
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_pro->execute();
			
			$row=$fetch_pro->fetch();
			
			 
			$cat_id=$row['cat_id'];
			$for_whome_cat=$row['for_whome'];
			
			
			$sub_cat_id=$row['sub_cat_id'];
			
			
			$fetch_cat=$con->prepare("select * from main_cat where cat_id='$cat_id' ");
			
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_cat->execute();
			
			$row_cat=$fetch_cat->fetch();
			
			
			$cat_name=$row_cat['cat_name'];
			
			
			
			$fetch_sub_cat=$con->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id' ");
			
			$fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
			
			$fetch_sub_cat->execute();
			
			$row_sub_cat=$fetch_sub_cat->fetch();
			
			
			$sub_cat_name=$row_sub_cat['sub_cat_name'];
			
			echo "<form method='post' enctype='multipart/form-data'>
	
						<h2  >Edit Product From Here</h2>
					
						<table>
						
							<tr>
							
								<td>Update Product Name:</td>
								<td><input type='text' name='pro_name'  value='".$row['pro_name']."' /></td>
							
							</tr>
						
						<tr>
							
								<td>Update Category Name:</td>
								<td>
								<select name='cat_name'>
								
								
								<option value='".$row['cat_id']."'>".$cat_name."</option>
								
								";
								

								
								echo viewall_cat();

								echo"
								</select>
								</td>
							
							</tr>
							
							<tr>
							
								<td>Update Subcategory Name:</td>
								<td><select name='sub_cat_name'>
								
								
								
								<option value='".$row['sub_cat_id']."'>".$sub_cat_name."</option>
								
								
								";
								

								 
								echo viewall_sub_cat();
								
								echo"
								
								</select></td>
							
							</tr>
							
							
							<tr>
							
								<td>Update Product Image 1:</td>
								<td><input type='file' name='pro_img1'  />
								
								<img src='../imgs/ragava/".$row['pro_img1']."' style='width:60px; height:60px;padding-left:100px;'/>
								
								</td>
							
							</tr>
							<tr>
							
								<td>Update Product Image 2:</td>
								<td><input type='file' name='pro_img2'  />
								<img src='../imgs/ragava/".$row['pro_img2']."' style='width:60px; height:60px;padding-left:100px;' />
								
								</td>
							
							</tr>
							
							<tr>
							
								<td>Update Product Image 3:</td>
								<td><input type='file' name='pro_img3'  />
								
								<img src='../imgs/ragava/".$row['pro_img3']."' style='width:60px; height:60px;padding-left:100px;' />
								
								</td>
							
							
							
							</tr>
							<tr>
							
								<td>Update Product Image 4:</td>
								<td><input type='file' name='pro_img4'   />
								
								<img src='../imgs/ragava/".$row['pro_img4']."' style='width:60px; height:60px;padding-left:100px;' />
								
								
								</td>
							
							</tr>
							
							
							<tr>
							
								<td>Update Feature1:</td>
								<td><input type='text' name='pro_Feature1' value='".$row['pro_feature1']."'  /></td>
							
							</tr>
							
							<tr>
							
								<td>Update Feature2:</td>
								<td><input type='text' name='pro_Feature2' value='".$row['pro_feature2']."' /></td>
							
							</tr>
							
							<tr>
							
								<td>Update Feature3:</td>
								<td><input type='text' name='pro_Feature3' value='".$row['pro_feature3']."' /></td>
							
							</tr>
							
							<tr>
							
								<td>Update Feature4:</td>
								<td><input type='text' name='pro_Feature4' value='".$row['pro_feature4']."' /></td>
							
							</tr>
							
							
							<tr>
							
								<td>Update Feature5:</td>
								<td><input type='text' name='pro_Feature5' value='".$row['pro_feature5']."' /></td>
							
							</tr>
							
							<tr>
							
								<td>Update Price:</td>
								<td><input type='text' name='pro_price' value='".$row['pro_price']."' /></td>
							
							</tr>
							
							<tr>
							
								<td>Update Model No:</td>
								<td><input type='text' name='pro_model' value='".$row['pro_model']."' /></td>
							
							</tr>
							
							<tr>
							
								<td>Update warranty:</td>
								<td><input type='text' name='pro_warranty' value='".$row['pro_warranty']."' /></td>
							
							</tr>
							
							
							
							<tr>
							
								<td>Update keyword:</td>
								<td><input type='text' name='pro_keyword' value='".$row['pro_keyword']."' /></td>
							
							</tr>";
							echo "
							<tr>
							
								<td>For Whome:</td>
								<td><select name='for_whome'>
								
								
								
							
									<option value='".$row['for_whome']."'>".$for_whome_cat."</option> 
									
						
									
								
								
								";
								

								 
								echo viewall_for_whome();
								
								echo"
								
								</select></td>
							
							</tr>
						</table>
						
						<center><button name='up_product'>Update Product </button></center>
					
					</form>
							";
							
							
							if(isset($_POST['up_product']))
							{
								$pro_name=$_POST['pro_name'];
			
			$cat_id=$_POST['cat_name'];
			
			
			
			$sub_cat_id=$_POST['sub_cat_name'];
			
			if($_FILES['pro_img1']['tmp_name']=="")
			{
				
			}
			else
			{
				$pro_img1=$_FILES['pro_img1']['name'];
				$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];
				move_uploaded_file($pro_img1_tmp,"../imgs/ragava/$pro_img1");	
			
				$up_img1=$con->prepare("update products set pro_img1='$pro_img1' where pro_id='$pro_id'");
			
				$up_img1->execute();
			
			}
			
			if($_FILES['pro_img2']['tmp_name']=="")
			{
				
			}
			else
			{
				$pro_img2=$_FILES['pro_img2']['name'];
				$pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];
				move_uploaded_file($pro_img2_tmp,"../imgs/ragava/$pro_img2");	
			
				$up_img2=$con->prepare("update products set pro_img2='$pro_img2' where pro_id='$pro_id'");
			
				$up_img2->execute();
			
			}
			
			if($_FILES['pro_img3']['tmp_name']=="")
			{
				
			}
			else
			{
				$pro_img3=$_FILES['pro_img3']['name'];
				$pro_img3_tmp=$_FILES['pro_img3']['tmp_name'];
				move_uploaded_file($pro_img3_tmp,"../imgs/ragava/$pro_img3");	
			
				$up_img3=$con->prepare("update products set pro_img3='$pro_img3' where pro_id='$pro_id'");
			
				$up_img3->execute();
			
			}
			
			if($_FILES['pro_img4']['tmp_name']=="")
			{
				
			}
			else
			{
				$pro_img4=$_FILES['pro_img4']['name'];
				$pro_img4_tmp=$_FILES['pro_img4']['tmp_name'];
				move_uploaded_file($pro_img4_tmp,"../imgs/ragava/$pro_img4");	
			
				$up_img4=$con->prepare("update products set pro_img4='$pro_img4' where pro_id='$pro_id'");
			
				$up_img4->execute();
			
			}
			
			
			
				
			
			$pro_feature1=$_POST['pro_Feature1'];
			$pro_feature2=$_POST['pro_Feature2'];
			$pro_feature3=$_POST['pro_Feature3'];
			$pro_feature4=$_POST['pro_Feature4'];
			$pro_feature5=$_POST['pro_Feature5'];
			
			$pro_price=$_POST['pro_price'];
			$pro_model=$_POST['pro_model'];
			
			$pro_warranty=$_POST['pro_warranty'];
			
			$pro_keyword=$_POST['pro_keyword'];
			
			$pro_for_whome=$_POST['for_whome'];
			
			$up_pro=$con->prepare("update products set pro_name='$pro_name',cat_id='$cat_id',sub_cat_id='$sub_cat_id',


			

			pro_Feature1='$pro_feature1',pro_Feature2='$pro_feature2',pro_Feature3='$pro_feature3',pro_Feature4='$pro_feature4',pro_Feature5='$pro_feature5',
			
			pro_price='$pro_price',pro_model='$pro_model',pro_warranty='$pro_warranty',
			pro_keyword='$pro_keyword',for_whome='$pro_for_whome' where pro_id='$pro_id'");
			
			
			if($up_pro->execute())
			{
				echo "<script>alert('product updated successfully!!!');</script>";
			
				echo "<script>window.open('admin_index.php?viewall_produts','_self')</script>";
			
			}
			
			
							}
			
		}
	}
	
	
	
	function delete_cat()
	{
		
			include("db.php");
			
			$delete_cat_id=$_GET['delete_cat'];
			
			$delete_cat=$con->prepare("delete from main_cat where cat_id='$delete_cat_id'");
			
			if($delete_cat->execute())
			{
				echo "<script>alert('category deleted successfully!!!')</script>";
				
				echo "<script>window.open('admin_index.php?viewall_cat','_self')</script>";
			
			
			
			}
			
			
	
	}
	
	
	function delete_sub_cat()
	{
		
		include("db.php");
		
		$delete_sub_cat_id=$_GET['delete_sub_cat'];
		
		$delete_sub_cat=$con->prepare("delete from sub_cat where sub_cat_id='$delete_sub_cat_id'");
		
		if($delete_sub_cat->execute())
		{
			echo "<script>alert('Sub category deleted successfully!!!')</script>";
				
				echo "<script>window.open('admin_index.php?viewall_sub_cat','_self')</script>";
		}
		
	}
	
	function delete_product()
	{
		include("db.php");
		
		$delete_product_id=$_GET['delete_pro'];
		
		$delete_pro=$con->prepare("delete from products where pro_id='$delete_product_id'");
		
		if($delete_pro->execute())
		{
			echo "<script>alert('product deleted successfully!!!')</script>";
				
				echo "<script>window.open('admin_index.php?viewall_produts','_self')</script>";
		}
	}
	
	
?>