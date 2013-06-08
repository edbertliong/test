<?php	

	$dns = "mysql:dbname=sakila";
	$username = "root";
	$password = "";
	
	try{
		$conn = new PDO($dns,$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection fail : " . $e->getMessage();
	}
	
	$queryString = "select * from actor";
	$rows = $conn->query($queryString);
	foreach($rows as $row):
	
		echo "First Name : " . $row['first_name'] . "<br />";
	
	endforeach;
	
	$conn = null;