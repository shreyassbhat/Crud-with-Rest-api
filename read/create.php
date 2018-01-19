<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/dbconfig.php';

// instantiate user object
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// get posted data
 $data = json_decode(file_get_contents("php://input"));

// set User details 
$user->name = $data->name;
$user->num = $data->num;
$user->password = $data->password;


// create the user
if($user->create()){
	echo '{';
		echo '"message": "User was created."';
	echo '}';
}

// if unable to create the User, tell the user
else{
	echo '{';
		echo '"message": "Unable to create User."';
	echo '}';
}
?>
