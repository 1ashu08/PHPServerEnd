<?php

	include 'databaseConnection.php';
	
	$conn=databaseConnect();	
	
	$sql = "SELECT distinct(orderNo) FROM CustomerOrder";
	$result = $conn->query($sql);
	$count=$result->num_rows;
	$conn->close();		
	if($count>0)
	{
		echo $count;
	}
	else
	{
		echo 0;
	}	

?>

