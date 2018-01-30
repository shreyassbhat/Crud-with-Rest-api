<?php
include("db_config.php");

function insertData($name,$age,$mobile,$email){
	global $db;
	$result=mysqli_query($db , "INSERT INTO personal_detail(name,age,mobile,email) VALUES('$name','$age','$mobile','$email')")or die(mysqli_error($db));
	return $result;
}

function displayAll(){
	global $db;
	$result=mysqli_query($db , "SELECT * FROM personal_detail")or die(mysqli_error($db));
	return $result;
}

function deleteData($id){
	global $db;
	$result=mysqli_query($db , "DELETE FROM personal_detail WHERE id = '$id'")or die(mysqli_error($db));
	return $result;
}

function updateData($id,$name,$age,$mobile,$email){
	global $db;
	$result=mysqli_query($db , "UPDATE `personal_detail` SET `name`='$name',
	`age`='$age', `mobile`='$mobile', `email`='$email' WHERE id = '$id'")or die(mysqli_error($db));
	return $result;
}
?>