<?php
	//Populate old lure name list
	
	$sql = "SELECT lureId, Name FROM lure ORDER BY Name";
	$stmt = $conn->prepare($sql);
	$deleteName = $conn->query($sql);

?>
