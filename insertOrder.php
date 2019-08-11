<?php

	include 'databaseConnection.php';
	
	function getOrderNumber()
	{
		$conn=databaseConnect();	
	
		$sql = "SELECT distinct(orderNo) FROM CustomerOrder";
		$result = $conn->query($sql);
		$count=$result->num_rows;
		$conn->close();		
		if($count>0)
		{
			return $count;
		}
		else
		{
			return 0;
		}	
	}	

			
	
	
	$postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
	$c=getOrderNumber();
	 foreach($request as $x) {
		            	
		$name = $x->name;
	    	$category=$x->category;
		$price=$x->price;
		$size=$x->size;
		
		$orderNo="ORD:".((string)$c);
		$subTotal=$x->subTotal;
		$grandTotal=$x-grandTotal;
		$quantity=$x->quantity;

		$conn=databaseConnect();				

		$sql = "INSERT INTO CustomerOrder(orderNo,productName,productCategory,productPrice,productSize,subTotal,grandTotal,productQuantity) VALUES('$orderNo','$name','$category','$price','$size','$subTotal','$grandTotal','$quantity')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}        
		$conn->close();	
	}    		
	
	
	
	

	

?>

