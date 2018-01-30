<?php
/**
 * Database config variables
 */
define("DB_HOST", "localhost");
define("DB_USER", "database-user");
define("DB_PASSWORD", "database-password");
define("DB_DATABASE", "database-name");

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	
	if($db == false){
		echo "No connection";
	}                        
?>
