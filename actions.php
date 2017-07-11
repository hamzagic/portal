<?php
session_start();
include "dbcon.php";

if (isset($_GET['action'])) {
	
	if ($_GET['action'] == "loginSignup") {

	//check if the email field is empty

	$error = "";

	if ($_POST['mail'] == "") {

		$error = "Email field is required";
	} else if ($_POST['pass'] == "") {

		$error =  "Password field is required";

	} else if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false) {

        $error = "Your email is invalid. Please try again.";
		
	}

		if ($error != "") {
			echo $error;
			return false;

		}

		//sign up process
	if ($_POST['active'] == "0") {
		//Verify if the email already exists

		$email = mysqli_real_escape_string($con, $_POST['mail']);
		$pass = mysqli_real_escape_string($con, $_POST['pass']);

		
		$query = "SELECT * FROM tb_super WHERE email = '$email'";

		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0 ) {
			echo "This email already exists.";
				

				} else {

					$pass2 = password_hash($pass, PASSWORD_DEFAULT);

					$query = "INSERT INTO tb_super (email, pass) VALUES ('$email', '$pass2')";

					

					if(mysqli_query($con, $query)) {

						echo 1;
						$_SESSION['logged'] = true;
						$_SESSION['id'] = mysqli_insert_id($con);
						

					} else {

						echo "Could not create user. Please try again later.";


					}
				}


	
	
	//Login process 
} else {

	$email = mysqli_real_escape_string($con, $_POST['mail']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);
	

	$query = "SELECT * FROM tb_super WHERE email = '$email'";

		
		$result = mysqli_query($con, $query);
		
		$row = mysqli_fetch_assoc($result);

		$hash = $row['pass'];

		//if ($row['pass'] == $pass) {//for not hashed passwords

		if(password_verify($pass, $hash)) {

			echo 1;
			$_SESSION['id'] = $row['uid'];
			$_SESSION['logged'] = true;


		} else {

			echo "Your email or password is invalid. Please try again.";
		}

			
	}

	
	
	
}

		
} 

if ($_GET['action'] == 'logout') {
		unset($_COOKIES);
		session_destroy();
		//header("Location: index.php");

	} 
?>