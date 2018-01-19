<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/dbconfig.php';
include_once '../object/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare User to update
$user = new User($db);

// get name to be edited
$data = json_decode(file_get_contents("php://input"));

// set name of user to be edited
$user->name = $data->name;

// set user details 
$user->num = $data->num;
$user->password = $data->password;


// update the user
if($user->update()){
	echo '{';
		echo '"message": "user was updated."';
	echo '}';
}

// if unable to update the user
else{
	echo '{';
		echo '"message": "Unable to update user."';
	echo '}';
}
?>