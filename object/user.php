<?php
class User{

	// database connection and table name
	private $conn;
	private $table_name = "account";

	// object properties
	public $name;
	public $num;
	public $password;
	public $data;
	
	// constructor with $db as database connection
	public function __construct($db){
		$this->conn = $db;
	}

// Get the username and Number
function read(){

	// select all query
	$query = "SELECT
				 p.name, p.num
			FROM
				" . $this->table_name . " p";

	// prepare query statement
	$stmt = $this->conn->prepare($query);

	// execute query
	$stmt->execute();

	return $stmt;
}
// create User
function create(){

	// query to insert record
	$query = "INSERT INTO
				" . $this->table_name . "
			SET
				name=:name, num=:num, password=:password";

	// prepare query
	$stmt = $this->conn->prepare($query);

	// sanitize
	$this->name=htmlspecialchars(strip_tags($this->name));
	$this->num=htmlspecialchars(strip_tags($this->num));
	$this->password=htmlspecialchars(strip_tags($this->password));

	// bind values
	$stmt->bindParam(":name", $this->name);
	$stmt->bindParam(":num", $this->num);
	$stmt->bindParam(":password", $this->password);
	

	// execute query
	if($stmt->execute()){
		return true;
	}

	return false;
	
}
// update the User
function update(){

	// update query
	$query = "UPDATE
				" . $this->table_name . "
			SET
				num = :num,
				password = :password,
				
			WHERE
				name = :name";

	// prepare query statement
	$stmt = $this->conn->prepare($query);

	// sanitize
	$this->num=htmlspecialchars(strip_tags($this->num));
	$this->password=htmlspecialchars(strip_tags($this->password));
	$this->name=htmlspecialchars(strip_tags($this->name));

	// bind new values
	$stmt->bindParam(':num', $this->num);
	$stmt->bindParam(':password', $this->password);
	$stmt->bindParam(':name', $this->name);

	// execute the query
	if($stmt->execute()){
		return true;
	}

	return false;
}
// delete the User
function delete(){

	// delete query
	$query = "DELETE FROM " . $this->table_name . " WHERE name = ?";

	// prepare query
	$stmt = $this->conn->prepare($query);

	// sanitize
	$this->name=htmlspecialchars(strip_tags($this->name));

	// bind Name of record to delete
	$stmt->bindParam(1, $this->name);

	// execute query
	if($stmt->execute()){
		return true;
	}

	return false;
	
}
}
?>
