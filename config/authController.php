<?php

session_start();

require 'db.php';

//global variables
$errors = array();
$success = array();
$username = "";
$email = "";

//if the user clicks on the signup button in the signup.php
if (isset($_POST['signup-btn'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordConf = $_POST['passwordConf'];
	
	//validation
	if (empty($username)) {
		$errors['username'] = "Username required";
	}
	if (empty($password)) {
		$errors['password'] = "Password required";
	}
	if (empty($password)) {
		$errors['password'] = "The two passwords do not match";
	}
	if (empty($email)) {
		$errors['email'] = "An email must be entered";
	}
	
	//if no errors create user record in database
	if( count($errors) === 0 ) {
		//encrypt password
		$password = password_hash($password, PASSWORD_DEFAULT);
		$token = bin2hex(random_bytes(50));
		$verified = false;
		
		$sql = "INSERT INTO users (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ssiss'), $username, $email, $verified, $token, $password;
		
		if($stmt->execute()) {
			//all is good so login user
			$user_id = $conn->insert_id;
			$_SESSION['id'] = $user_id;
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			
		//set flash message
		$_SESSION['message'] = "You are now logged in!";
		$_SESSION['alert-class'] = "alert-success";
		exit();
} else {
	if(mysqli_connect_errno()) {
		$errors['db_connection'] = "Failed to connect to MySQL:" . $conn->connect_error;
	}
	$errors['db_error'] = "Database error: failed to register user. " . $conn->error;
}
$stmt->close();