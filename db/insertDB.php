<?php

// if sign-up button pressed add record to user table
if(isset($_POST['insert-btn'])) {
	// get data sent from html page in browser
    $lureName = $_POST['lureName']; // quoted parts are ids in html 
    $lureDepth = $_POST['lureDepth'];
    $lureType = $_POST['lureType'];
    $lureColour = $_POST['insertLureColour'];
	$hookNum = $_POST['hookNum'];
	$lureImage = $_POST['lureImage'];

    // some basic validation
    if (empty($lureName)) {
        $errors['lureName'] = "Lure name required";
    }
    if (empty($lureDepth)) {
        $errors['lureDepth'] = "Lure depth required";
    }
	if (empty($lureType)) {
        $errors['lureType'] = "Lure type required";
    }
	if (empty($lureColour)) {
        $errors['insertLureColour'] = "Lure colour required";
    }
	if (empty($hookNum)) {
        $errors['hookNum'] = "Amount of hooks required";
    }
	if (empty($lureImage)) {
       $errors['lureImage'] = "Lure image required";
   }
	
	//only process if there are not errors
	if( count($errors) === 0 ) {

		// create SQL insert string
		$sql = "INSERT INTO lure (Name, Depth, Type, colour, hooks, image) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sssiss', 
			$lureName, $lureDepth, $lureType, $lureColour, $hookNum, $lureImage);
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