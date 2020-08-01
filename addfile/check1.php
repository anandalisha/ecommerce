
<?php
include("db.php");
$cat_id=32;
				
				$sub_cat=$con->prepare("select * from sub_cat where cat_id='$cat_id'");
				
				$sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
				$sub_cat->execute();
						
				while($row=$sub_cat->fetch()):
				
					echo"<li><a href='#'>".$row['sub_cat_name']."</a></li>";
					
					
				
				endwhile;
				?>