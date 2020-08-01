<?php
if(isset($_GET['id']))
				{
					include("db.php");
					$getid=$_GET['id'];
					$get_user_review4=$con->prepare("select * from comment where com_id='$getid'");
					
					
					$get_user_review4->execute();
					$getvalue=$get_user_review4->fetch();
					
					$helfulvalue=$getvalue['helpful'];
					
					
					$helfulvalue=$helfulvalue+1;
					
					$getpro_id=$getvalue['pro_id'];
					
					$get_user_review2=$con->prepare("update comment set helpful='$helfulvalue' where com_id='$getid' ");
					
					
					$get_user_review2->execute();
					
					header("location:pro_detail.php?pro_id=$getpro_id");
					
				}
				?>