<?php

	include 'databaseConnection.php';
	
	$postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
    	$name = $request->productName;	
	fetchData($name);
	
	function fetchData($name)
	{
		$conn=databaseConnect();	
	

		$sql = "SELECT * FROM Product where name='".$name."'";
		$result = $conn->query($sql);
		$stack = array();
	

		if ($result->num_rows > 0) {
	
			while($row = $result->fetch_assoc()) {
				$data=$row["name"]."+"."+".$row["description"]."+".$row["category"]."+".$row["size"]."+".$row["price"]."+".$row["imagePath"];
				array_push($stack,$data);		
			}
		
			$conn->close();	
			return $stack;
		} 
		else {
			echo "0+results";
		}	
	}


?>

