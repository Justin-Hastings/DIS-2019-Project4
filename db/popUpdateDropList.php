<?php
//Retrieve data for dropdowns for updating lure colour
	$sql = "SELECT colourId, colourName FROM lurecolour";
	$stmt = $conn->prepare($sql);
	$results = $conn->query($sql);

?>

<?php
	//Populate old lure name list
	
	$sql = "SELECT lureId, Name FROM lure ORDER BY Name";
	$stmt = $conn->prepare($sql);
	$oldName = $conn->query($sql);

?>
