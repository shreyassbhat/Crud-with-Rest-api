<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/dbconfig.php';
include_once '../object/user.php';

// instantiate database and user object
$database = new Database();
$db = $database->getConnection();

// initialize object
$user = new User($db);

// query User
$stmt = $user->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

	// User array
	$user_arr=array();
	$user_arr["records"]=array();

	// retrieve our table contents
	// fetch() is faster than fetchAll()
	// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		// extract row
		// this will make $row['name'] to
		// just $name only
		extract($row);

		$user_detail=array(
			"name" => $name,
			"num" => $num,
			
		);

		array_push($user_arr["records"],$user_detail);
	}

	echo json_encode($user_arr);
}

else{
    echo json_encode(
		array("message" => "No user found.")
	);
}
?>