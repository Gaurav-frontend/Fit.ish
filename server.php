<?php 
	$name = "";
	$email_2 = "";
	$mobile_no_2 = "";
	$errors = array();
	
	// connect to the database
	$db = mysqli_connect('localhost','root', '','registration');
	
	// if the signup button is clicked
	if (isset($_POST['signup'])) {
		$name = mysql_real_escape_string($_POST['name']);
		$email_2 = mysql_real_escape_string($_POST['email_2']);
		$mobile_no_2 = mysql_real_escape_string($_POST['mobile_no_2']);
		$password_2 = mysql_real_escape_string($_POST['password_2']);
		$password_3 = mysql_real_escape_string($_POST['password_3']);
		
		// ensure that form fields are filled properly
		if (empty($name)) {
			array_push($errors, "Name is required");
		}
		if (empty($email_2)) {
			array_push($errors, "Email is required");
		}
		if (empty($mobile_no_2)) {
			array_push($errors, "Mobile no. is reqiured");
		}
		if (empty($password_1)){
			array_push($errors, "Password is required");
		}
		
		if($password_2 != $password_3) {
			array_push($errors, "Password do not match");
		}
		
		// if there are no errorss, save user to database
		if (count($errors) == 0) {
			$password = md5($password_2); //encrypt password before storing in database (security)
			$sql = "INSERT INTO users (name, email, mobil number, password)
						VALUES ('$name', '$email_2', '$mobile_no_2', '$password')";
			mysqli_query($db, $sql);
		}
	}
?>
	
	
