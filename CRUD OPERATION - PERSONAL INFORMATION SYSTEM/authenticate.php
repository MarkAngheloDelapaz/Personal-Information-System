<?php
include 'database.php';
session_start();
$conn = DBconnection();
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'] , $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
/* okay
	$id= "11";
	$AT= "1";
	$sql = "update users set
	active ='".$AT."'
	where user_id= ".$id.""; // " " double quotation only for integer.
	if ($con->query($sql) === TRUE) {
		echo "Active!";
    }else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	*//*ok
	$id= "11";
	$AT= "1";
	$con->query("update users set active ='".$AT."' where user_id= ".$id.""); 
	*//*ok
    $con->query("update users set active ='1' where user_id= '11'"); 
	*/
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT user_id, password FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

 if ($stmt->num_rows > 0) {
	$stmt->bind_result($user_id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	//if (password_verify($_POST['password'], $password)) {
		if ($_POST['password'] === $password) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $user_id;
		$conn->query("update users set active ='1' where user_id= ".$user_id."");//set 1 as active status
		header('Location: profile.php');
	} else {
		// Incorrect password
		echo 'Incorrect username and/or password!';
	}
} else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
}
	$stmt->close();

}


?>
