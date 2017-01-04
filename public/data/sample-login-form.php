<?php
	session_start();
	include 'C:\xampp\htdocs\nairabox\fxn\fxn.php';

/*
	Sample Processing of Forgot password form via ajax
	Page: extra-register.html
*/
// connect to db
$db = 'sems';
GLOBAL $dbc;
// Set the database access information as constants:
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', $db);
// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' .mysqli_connect_error() );
# Response Data Array
$resp = array();


// Fields Submitted
$email = prepare($_POST["email"]);
$pwd = prepare($_POST["password"]);
$password = SHA1($pwd);


// This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js
$resp['submitted_data'] = $_POST;


// Login success or invalid login data [success|invalid]
// Your code will decide if username and password are correct
$login_status = 'invalid';
$active = 1;
//check for unique email and phone number
$q = "SELECT * FROM users WHERE email = '$email' AND pwooord = '$password' AND status = '$active'";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if(mysqli_num_rows($r) >0)
//if($username == 'demo' && $password == 'demo')
{
			$login_status = 'success';
}

$resp['login_status'] = $login_status;


// Login Success URL
if($login_status == 'success')
{
	// If you validate the user you may set the user cookies/sessions here
		#setcookie("logged_in", "user_id");
		#$_SESSION["logged_user"] = "user_id";
				$row = $r->fetch_assoc();
				$member = $row['user_id'];
				$_SESSION['start'] = time();
				session_regenerate_id();
				$_SESSION['user_session'] = $row['user_id']; //set session
				$_SESSION['first_name'] = $row['first_name'];
				$_SESSION['last_name'] = $row['last_name'];
				$_SESSION['role'] = $row['level'];
				$_SESSION['user_active'] = $row['status'];
				session_write_close();
	
	// update with the time of last login
				$now = time();
				$uq = "UPDATE users SET last_login='$now' WHERE user_id='$member'";
				$ur = $dbc->query($uq) or trigger_error("Query: $uq\n<br />MySQL Error: " . mysqli_error($dbc));
				
	/* send a confirmation mail
				$body = "You logged into your nairabox account at this time.\n\n";
				$body .= 'If you are not the one that logged in, \n\n';
				$body .= "Please contact support immediately.\n\n";
				$body .= "This could mean your account has been compromised.\n\n";
				$body .= "Thanks";
				 mail($user_email, 'Login Confirmation', $body, 'From: NAIRABOX');

		*/		
				
	// Set the redirect url after successful login
	$resp['redirect_url'] = '/category';
}


echo json_encode($resp);