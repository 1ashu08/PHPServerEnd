<?php

	include 'databaseConnection.php';
	
	$conn=databaseConnect();	
	
	$sql = "SELECT * FROM CustomerOrder";
	$result = $conn->query($sql);
	$stack = array();
	
	
	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {
			$data=$row["orderNo"]."+".$row["productName"]."+".$row["productCategory"]."+".$row["productSize"]."+".$row["productPrice"]."+".$row["subTotal"]."+".$row["grandTotal"]."+".$row["productQuantity"];
			array_push($stack,$data);		
		}
		
		$conn->close();	
		echo $stack;
	} 
	else 
	{
		echo "0+results";
        }
	
	

?>

