<?php

// if sign-up button pressed add record to user table
if(isset($_POST['insertColour-btn'])) {
	// get data sent from html page in browser
    $colourName = $_POST['colourName']; // quoted parts are ids in html 

    // some basic validation
    if (empty($colourName)) {
        $errors['colourName'] = "Colour name required";
    }
	
	//only process if there are not errors
	if( count($errors) === 0 ) {

		// create SQL insert string
		$sql = "INSERT INTO lurecolour (colourName) VALUES (?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', 
			$colourName);
		// ssiss because it is string, string, integer, string, string
		
		// run the SQL and if successful 
		if( $stmt->execute()) {
			$successes['alert-class'] = "INSERT successful: " . $stmt->affected_rows . " rows added";
		} else {
			// add error message to errors array
            if(mysqli_connect_errno()) {
                $errors['db_connection'] = "Failed to connect to MySQL: " . $conn->connect_error;
            }
            $errors['db_error'] = "Database error: failed to insert lure.  " . $conn->error;
        }
		
        $stmt->close();
    }
}