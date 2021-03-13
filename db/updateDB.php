<?php

if(isset($_POST['update-btn'])) {
	// get data sent from html page in browser
    $oldLureName = $_POST['updateLureName']; // quoted parts are ids in html 
    $newLureName = $_POST['newLureName'];
    $lureDepth = $_POST['lureDepth'];
    $lureType = $_POST['lureType'];
	$lureColour = $_POST['updateLureColour'];
	$hookNum = $_POST['hookNum'];
	$lureImage = $_POST['lureImage'];


    // some basic validation
    if (empty($oldLureName)) {
        $errors['updateLureName'] = "Old lure name required";
    }
    if (empty($newLureName)) {
        $errors['newLureName'] = "New lure name required";
    }
	    if (empty($lureDepth)) {
        $errors['lureDepth'] = "Lure depth required";
    }
	if (empty($lureType)) {
        $errors['lureType'] = "Lure type required";
    }
	if (empty($lureColour)) {
        $errors['updateLureColour'] = "Lure colour required";
    }
	if (empty($hookNum)) {
        $errors['hookNum'] = "Amount of hooks required";
    }
	if (empty($lureImage)) {
        $errors['lureImage'] = "Lure image required";
    }
	
	//only process if there are not errors
	if( count($errors) === 0 ) {

		$sql ="UPDATE lure SET Name='$newLureName', Depth='$lureDepth',
		Type='$lureType', colour='$lureColour', hooks='$hookNum', image='$lureImage'
		WHERE Name='$oldLureName'";
		$stmt = $conn->prepare($sql);
		// run the SQL and if successful 
		if($stmt->execute()) {
			$successes['alert-class'] = "UPDATE successful " . $stmt->affected_rows . " records updated.";
		} else {
			// add error message to errors array
            if(mysqli_connect_errno()) {
                $errors['db_connection'] = "Failed to connect to MySQL: " . $conn->connect_error;
            }
            $errors['db_error'] = "Database error: failed to UPDATE lure.  " . $conn->error;
        }
        $stmt->close();
    }
}