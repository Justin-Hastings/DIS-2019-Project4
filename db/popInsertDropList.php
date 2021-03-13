<?php
//Retrieve data for dropdowns for inserting lure colour
	$sql = "SELECT colourId, colourName FROM lurecolour";
	$stmt = $conn->prepare($sql);
	$insResult = $conn->query($sql);
