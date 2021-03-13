<?php

if(isset($_POST['delete-btn'])) {
	// get data sent from html page in browser
    $lureName = $_POST['lureName']; // quoted parts are ids in html 

    // some basic validation
    if (empty($lureName)) {
        $errors['lureName'] = "Lure name required";
    }
	
	//only process if there are not errors
	if( count($errors) === 0 ) {

		// create SQL insert string
		$sql = "DELETE FROM lure WHERE Name = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $lureName);
		
		// run the SQL and if successful 
		if($stmt->execute()) {
			$successes['alert-class'] = "DELETE successful: " . $stmt->affected_rows . " records removed.";
		} else {
			// add error message to errors array
            if(mysqli_connect_errno()) {
                $errors['db_connection'] = "Failed to connect to MySQL: " . $conn->connect_error;
            }
            $errors['db_error'] = "Database error: failed to DELETE lure.  " . $conn->error;
        }
        $stmt->close();
    }
}