<?php


header('content-type:text/xml');

$xmlout ="<?xml version=\"1.0\" ?>\n";


	$con=new PDO("mysql:host=localhost;dbname=ragava","root","");


$stmt=$con->prepare("select * from newuser where set_online='1'");

$stmt->execute();

	while($row=$stmt->fetch())
	{
		
		
		
		$xmlout .="<b>".$row['password']."<b/>";
	

		
		
	}



echo $xmlout;

?>

