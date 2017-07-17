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

//logout
if (isset($_GET['action'])) {

	if ($_GET['action'] == 'logout') {
		
		session_unset();
		header("Location: index.php?page=feed");

	} 

}

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'min'),
        array(1 , 'sec')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}

function displayPosts($type) {

	global $con;
	global $whatShows;

	if ($type == 'public') {

		$whatShows = "";

	} else if ($type == 'private') {

		if (isset($_SESSION['id'])) {
					
		$whatShows = " WHERE userid = ".$_SESSION['id'];

		}
	}



	$query = "SELECT * FROM tb_posts ".$whatShows." ORDER BY postdate DESC";

	$result = mysqli_query($con, $query);

	if (mysqli_num_rows($result) == 0) {

		echo "No posts to display";

	} else {

		while ($row = mysqli_fetch_assoc($result)) {

			
			$queryUser = "SELECT * FROM tb_super WHERE uid = ".$row['userid'];
			$result2 = mysqli_query($con, $queryUser);
			$row2 = mysqli_fetch_assoc($result2);
			
			//print_r($row2);
			echo "<p><div class='posts-view'>".$row2['email']."<span class='post-sent'>"." ".time_since(time() - strtotime($row['postdate']))." ago</span></p>";
			//echo $row['userid'];
			//echo "<br>";
			echo "<p>".$row['posts']."<p>";

			echo "<a>Follow</a></div>";



		}

	}
}

function displaySearch() {

	global $con;

	if (isset($_GET['page'])) {
		if ($_GET['page'] == 'search') {
			
			$question = mysqli_real_escape_string($con, $_GET['q']);

			$query = "SELECT * FROM tb_posts WHERE posts LIKE '%".$question."%'";
			$result = mysqli_query($con, $query);

			if (mysqli_num_rows($result) == 0) {

				echo "No results for your search. Try again.";
		
			} else if ($_GET['q'] == "") {

				echo "Please type something to search.";
			}


			else {

				echo "<p class='results'>Showing results for <strong>".$question.":</strong></p>";
				while ($row = mysqli_fetch_assoc($result)) {

				$queryUser = "SELECT * FROM tb_super WHERE uid = ".$row['userid'];
				$result2 = mysqli_query($con, $queryUser);
				$row2 = mysqli_fetch_assoc($result2);
			
				
				echo "<p><div class='posts-view'>".$row2['email']."<span class='post-sent'>"." ".time_since(time() - strtotime($row['postdate']))." ago</span></p>";
				echo "<p>".$row['posts']."<p>";
     			echo "<a>View Profile</a></div>";

			}


			}

						
		}
	}

}

function writePost() {

	if (isset($_SESSION['id'])) {
		if ($_SESSION['id'] > 0) {
			echo "<div class='form><span class='posts-write'>Write a post</span>
<textarea class='form-control' rows='3' id='posted'></textarea>";
	echo" <button class='btn btn-primary' id='post-btn'>Post</button></div>";
		}
		
	}
}

if (isset($_GET['action'])) {
	
	if ($_GET['action'] == "postStory") {

	
		
		if (!$_POST['posted']) {

			echo "Your post is empty.";


		} else if (strlen($_POST['posted']) > 141 ){

		    echo "Your post is too long";

		} else {

			$posts = mysqli_real_escape_string($con, $_POST['posted']);
			$poster = $_SESSION['id'];

			$query = "INSERT INTO tb_posts (posts, userid, postdate) VALUES ('$posts', '$poster', NOW() )";
			$result = mysqli_query($con, $query);

			echo "1";

		}
	}

}


function showProfile() {

	if (isset($_SESSION['id'])) {
		
		global $con;
		$user = mysqli_real_escape_string($con, $_SESSION['id']);

		$query = "SELECT * FROM tb_super WHERE uid = '$user'";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0) {
			
			$row = mysqli_fetch_assoc($result);

			echo "<p class='results'>Email: ".$row['email']."</p>";
			//echo "<p class='results'>Email: ".$row['email']."</p>";

		}
	}
}
?>