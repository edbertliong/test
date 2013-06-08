<?php

	$mysqli =  new mysqli("localhost","root","","test");
	if($mysqli->connect_errno){
		echo "Fail to connect mysql" . $mysqli->connect_errno;
	}
	
	$query = $mysqli->query("select 'A world full of choice' as _msg from dual");
	$row  = $query->fetch_assoc();
	echo $row['_msg'];