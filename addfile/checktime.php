<!DOCTYPE html>
<html>
<body>

<?php

		include("db.php");
		
		$a=date("Y-m-d h:i:s");
		
					$setonline1=$con->prepare("update newuser set login='$a' where username='b'");
			
					$setonline1->execute();

$a=date("Y-m-d h:i:s");
		
					$setonline1=$con->prepare("update newuser set logout='$a' where username='$email'");
			
					$setonline1->execute();
					
					
					$aa=date("Y-m-d h:i:s");
		
					$setonline1=$con->prepare("update newuser set login='$aa' where username='ragadevan'");
			
					$setonline1->execute();	
?>

</body>
</html>


