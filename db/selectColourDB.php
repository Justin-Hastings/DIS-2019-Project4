<?php
$colourRow='';
if(isset($_POST['selectColours-btn'])) {
	// create SQL select string
	$sql = "SELECT * FROM lurecolour";
	$stmt = $conn->prepare($sql);
	
	// run the SQL and if successful 
	if($result = $conn->query($sql)) {
		$successes['alert-class'] = "SELECT successful: returned " . $result->num_rows . " rows.";

	if ($result->num_rows > 0) {
		//output data of each row
		while($row = $result->fetch_row()) {
			$colourRow = $colourRow."<tr><td>" . $row[1]. "</td></tr>";
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