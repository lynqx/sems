<?php
session_start();
/*
	Sample Processing of Register form via ajax
	Page: extra-register.html
*/
// connect to db
$db = 'nairabox';
include 'C:\xampp\htdocs\nairabox\naira_connect.php'; 

# Response Data Array
$resp = array();

if($_POST["captcha"]==$_SESSION["captcha_code"]){
	
//if captcha test is successful, 	
// Fields Submitted
//clean again with prepare_to function
$username   = $_POST["username"];
$name       = $_POST["name"];
$email      = $_POST["email"];
$phone      = $_POST["phone"];
$city		= $_POST["city"];
$invite		= $_POST["invite"];

// This array of data is returned for demo purpose, see assets/js/neon-register.js
$resp['submitted_data'] = $_POST;


//check for unique email and phone number
$q = "SELECT member_id FROM nairabox_members WHERE email = '$email' LIMIT 1";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if(mysqli_num_rows($r) >0) {
		echo "<p class='Error'>Email already exists in our database.</p>";
} else {
	
	// Create a unique password:
	$pwd = rand(0, 999999);
	$pword = sha1($pwd);
	
$uq = "INSERT INTO nairabox_members(username, pwooord, fullname, email, phone, city) VALUES('$username', '$pword', '$name','$email','$phone','$city')";
$ur = $dbc->query($uq) or trigger_error("Query: $uq\n<br />MySQL Error: " . mysqli_error($dbc));

if ($ur) {
			
		//get the new user's id for use in the referaal and notification query
		//$id = LAST_INSERT_ID();
		$id = mysqli_insert_id($dbc);
	$q = "INSERT INTO referral(member_id, referral_id) VALUES('$invite', '$id')";
	$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	//status - (1-not checked/ new notification) (2-checked)
	$status = '1';
	$notification ='Welcome to Nairabox, please change your password and submit one account number';
	$datetime = strtotime(date("Y-m-d H:i:s")); // create date and time
	$nq = "INSERT INTO notifications(member_id, notification, status, date_added) VALUES('$id', '$notification', '$status', '$datetime')";
	$nr = $dbc->query($nq);
	
	

}
} // not unique email

} else {
echo "<p class='Error'>Enter Correct Captcha Code.</p>";
}


echo json_encode($resp);
