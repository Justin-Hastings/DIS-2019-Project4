<?php

if(isset($_POST['view-btn'])) {
	$lureName = $_POST['viewLureName'];
	
	 if (empty($lureName)) {
        $errors['viewLureName'] = "Lure name required";
    }
	$sql = "SELECT image FROM lure WHERE Name='$lureName'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){ 
			//header('content-type: image/jpeg');
			//header('content-type: image/png');
			//echo $a = $row['image'];
			//echo base64_decode($a);
			//Display image in html tags
			
			echo '<img src="data:image;base64, '.base64_encode($row['image']).'"width="30%"  "/><br></br>';
			echo $_POST['viewLureName'];
		}
	}
}