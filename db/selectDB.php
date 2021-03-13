
<?php
$dataRow='';
if(isset($_POST['select-btn'])) {
	// create SQL select string
	$sql = "SELECT lure.* , lurecolour.* FROM lure, lurecolour WHERE lure.colour = lurecolour.colourId ORDER BY colourName, Name";
	$stmt = $conn->prepare($sql);
	
	// run the SQL and if successful 
	if($result = $conn->query($sql)) {
		$successes['alert-class'] = "SELECT successful: returned " . $result->num_rows . " rows.";
		// should create a table for the data but just want to see what is returned

	if ($result->num_rows > 0) {
		//output data of each row
		while($row = $result->fetch_row()) {
			$dataRow = $dataRow."<tr><td>" . $row[1]. "</td> <td>" . $row[2]. "</td> <td>" . 
			$row[3]. "</td> <td>" . $row[8]. "</td> <td>" . $row[5]. "</td></tr>";

		}
	}

		/* free result set */ 
		$result->close();
		
	} else {
		// add error message to errors array
		if(mysqli_connect_errno()) {
			$errors['db_connection'] = "Failed to connect to MySQL: " . $conn->connect_error;
		}
		$errors['db_error'] = "Database error: failed to run select.  " . $conn->error;
	}
	$stmt->close();
	
}
?>
