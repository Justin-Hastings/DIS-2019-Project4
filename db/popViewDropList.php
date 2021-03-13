<?php
	//Populate view lure name list
	
	$sql = "SELECT lureId, Name FROM lure ORDER BY Name";
	$stmt = $conn->prepare($sql);
	$viewName = $conn->query($sql);

?>
