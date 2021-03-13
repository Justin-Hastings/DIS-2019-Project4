<?php require_once 'config/db.php'; 
	require_once 'db/insertDB.php';
	require_once 'db/deleteDB.php';
	require_once 'db/selectDB.php';
	require_once 'db/updateDB.php';
	require_once 'db/viewDB.php';
	require_once 'db/popInsertDropList.php';
	require_once 'db/popDeleteDropList.php';
	require_once 'db/popUpdateDropList.php';
	require_once 'db/selectColourDB.php';
	require_once 'db/insertColourDB.php';
	require_once 'db/popViewDropList.php';
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
		<link href="css/styles.css" rel="stylesheet" />
		<title>Fishing Lures</title>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 offset-me-4">
					<table>
						<tr>
							<th>Lure Name</th>
							<th>Depth</th>
							<th>Type</th>
							<th>Colour</th>
							<th>Hooks</th>
						</tr>
						<?php echo $dataRow;?>
					</table>	<br></br>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 col-xs-12 offset-me-4">
					<table>
						<tr>
							<th>Lure Colour</th>
						</tr>
						<?php echo $colourRow;?>
					</table>
				</div>
			</div>
				
			<div class="row">
				<div class="space1"></div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-xs-12 offset-me-4 form-div">
				
					<?php
					if(isset($errors)):
						if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div>
						<?php
						endif;
					endif; ?>
					
					<?php
					if(isset($successes)):
						if(count($successes) > 0): ?>
						<div class="alert alert-success">
							<?php foreach($successes as $success): ?>
								<li><?php echo $success; ?></li>
							<?php endforeach; ?>
						</div>
						<?php
						endif;
					endif; ?>
						
				
					<form action ="index.php" method="post">
					
						<h3 class="text-centre">Insert New Lure</h3>
						
						<div class="form-group">
							<label for="lureName">Name:</label>
							<input type="text" name="lureName" class="form-control 
							form-control-lg" />
						</div>
						
						<div class="form-group">
							<label for="lureDepth">Depth</label>
							<input name="lureDepth" type="text" class="form-control
							form-control-lg"/>
						</div>
						
						<div class="form-group">
							<label for="lureType">Type</label>
							<input name="lureType" type="text" class="form-control
							form-control-lg"/>
						</div>
						
						<div class="form-group">		
							<label for="lureColour">Colour</label>	<br></br>
							<select name="insertLureColour">
								<?php while($row = mysqli_fetch_row($insResult)){ ?>
								<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
								<?php } ?>
							</select>
						</div>
						
						<div class="form-group">		
							<label for="hookNum">Number of Hooks</label>
							<input name="hookNum" type="text" class="form-control
							form-control-lg"/>
						</div>
						
						<div class="form-group">
							<label for="lureImage" >Image of Lure</label>
							<input type="file" name="lureImage" class="form-control form-control-lg" accept="image/png, image/jpeg">
						</div>
						
						<div class="form-group">
							<button id="insertBtn" type="submit" name="insert-btn" class="btn
							btn-primary btn-block btn-lg">Insert Lure</button>
						</div>
					</form>
				</div>
				
				<div class="col-md-4 col-xs-12 offset-me-4"></div>
				
				<div class="col-md-4 col-xs-12 offset-me-4 form-div">
				<form action="index.php" method="post">

					<h3 class="text-centre">Update Lure</h3>

					<div class="form-group">
						<label for="oldLureName" >Old Name</label>	<br></br>
						
						<select name="updateLureName">
								<?php while($row = mysqli_fetch_row($oldName)){ ?>
								<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
								<?php } ?>
						</select>
						
					</div>
					
					<div class="form-group">
						<label for="newLureName" >New Name</label>
						<input type="text" name="newLureName" class="form-control form-control-lg">
					</div>

					<div class="form-group">
						<label for="lureDepth" >Depth</label>
						<input type="text" name="lureDepth" class="form-control form-control-lg">
					</div>

					<div class="form-group">
						<label for="lureType" >Type</label>
						<input type="text" name="lureType" class="form-control form-control-lg">
					</div>
					
					<div class="form-group">
						<label for="lureColour" >Colour</label>	<br></br>
						
						<select name="updateLureColour">
								<?php while($row = mysqli_fetch_row($results)){ ?>
								<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
								<?php } ?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="hookNum" >Number of Hooks</label>
						<input type="text" name="hookNum" class="form-control form-control-lg">
					</div>
					
					<div class="form-group">
						<label for="lureImage" >Image of Lure</label>
						<input type="file" name="lureImage" class="form-control form-control-lg" accept="image/png, image/jpeg">
					</div>

					<div class="form-group">
						<button type="submit" name="update-btn" class="btn btn-primary btn-block btn-lg">Update Lure</button>
					</div>
				</form>
				</div>
			</div>
		
			<div class="row">
				<div class="space1"></div>
			</div>
			
			<div class="row">
				<div class="col-md-4 offset-me-4 form-div">
				<form action="index.php" method="post">

					<h3 class="text-centre">Delete Lure</h3>
					
					<div class="form-group">
						<label for="lureName" >Lure Name</label>	<br></br>
						<select name="deleteLureName">
								<?php while($row = mysqli_fetch_row($deleteName)){ ?>
								<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
								<?php } ?>
						</select>
						
					</div>

					<div class="form-group">
						<button type="submit" name="delete-btn" class="btn btn-primary btn-block btn-lg">Delete Lure</button>
					</div>
				</form>
				</div>
				
				<div class="col-md-4 offset-me-4"></div>
				
				<div class="col-md-4 offset-me-4 form-div">
				<form action="index.php" method="post">
					
					<h3 class="text-centre">Select Lure</h3>
					<div class="form-group">
						<button type="submit" name="select-btn" class="btn
						btn-primary btn-block btn-lg">Select Lure</button>
					</div>
				</form>
				
				<div class="space1"></div>
				
				<form action="index.php" method="post">

					<h3 class="text-centre">View Image of Lure</h3>
					
					<div class="form-group">
						<label for="viewLureName" >Lure Name</label>	<br></br>
						
						<select name="viewLureName">
								<?php while($row = mysqli_fetch_row($viewName)){ ?>
								<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
								<?php } ?>
						</select>
						
					</div>

					<div class="form-group">
						<button type="submit" name="view-btn" class="btn btn-primary btn-block btn-lg">View Image of Lure</button>
					</div>
				</form>
				
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 offset-me-4 form-div">
					<form action="index.php" method="post">
						
						<h3 class="text-centre">Select Lure Colours</h3>
						<div class="form-group">
							<button type="submit" name="selectColours-btn" class="btn
							btn-primary btn-block btn-lg">Select Lure Colours</button>
						</div>
					</form>
				</div>

				<div class="col-md-4 offset-me-4"></div>
				
				<div class="col-md-4 offset-me-4">
					<form action ="index.php" method="post">
					
						<h3 class="text-centre">Insert New Colour</h3>
						
						<div class="form-group">
							<label for="colourName">Colour:</label>
							<input type="text" name="colourName" class="form-control 
							form-control-lg" />
						</div>
						
						<div class="form-group">
							<button id="insertBtn" type="submit" name="insertColour-btn" class="btn
							btn-primary btn-block btn-lg">Insert Colour</button>
						</div>
					</form>
				</div>
			</div>
			

		</div>	
		
	</body>
</html>