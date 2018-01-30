<?php

include ('db_function.php');
$response = array();

//Getting post data 
$id = $_REQUEST["id"];

if(isset($id)){
	
	$result = deleteData($id);	
	
	if($result){
		$response["success"] = 1;
		$response["message"] = "Successfully Deleted";
		echo json_encode($response);
	}
	else{
		$response["success"] = 0;
		$response["message"] = "Try Again";
		echo json_encode($response);
	}
}
else {
	// no results found
    $response["success"] = 0;
    $response["message"] = "Required Fields are Missing";
    echo json_encode($response);
}

if($db == true){
	mysqli_close($db);
}

?>