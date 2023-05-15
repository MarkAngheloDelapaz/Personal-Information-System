<!DOCTYPE html>
<?php
include 'database.php';
?>
<!-- call the file of database connection by including php file of open connection of database-->
<?php
//echo $_POST["firstname"]; //there is an error when you run it because there is no value on the first name why need to set isset
  if(isset($_POST["username_"]) && isset($_POST["password_"]) && isset($_POST["email_"]) && isset($_POST["firstname_"]) && isset($_POST["lastname_"])){ //put isset to handle the value and avoid error if there is no input value

	$UN= $_POST["username_"];
	$PW= $_POST["password_"];
	$EM= $_POST["email_"];
	$FN= $_POST["firstname_"]; //declaration only to make it short its up to you
	$LN= $_POST["lastname_"];
	$AL= "user";
	$AT= "0";

	$conn = DBconnection();//make databases connection first
	$sql = "INSERT INTO users (username, password, email, firstname, lastname, access_level, active) VALUES ('".$UN."', '".$PW."', '".$EM."','".$FN."', '".$LN."','".$AL."', '".$AT."')";

	if ($conn->query($sql) === TRUE) {
		echo "Account Created Successfully!";
    }else{
    echo "The username is already existed!";
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();
  }
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap uses HTML elements and CSS properties that require the HTML5 doctype.
	Always include the HTML5 doctype at the beginning of the page, along with the lang attribute and the correct character set -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).
	The initial-scale=1 part sets the initial zoom level when the page is first loaded by the browser. -->
	<title>Document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">


<style>
	.navtop {
	background-color: #2f3947;
	height: 60px;
	width: 100%;
	border: 0;
}
.navtop div {
	display: flex;
	margin: 0 auto;
	width: 1000px;
	height: 100%;
}
.navtop div h1, .navtop div a {
	display: inline-flex;
	align-items: center;
}
.navtop div h1 {
	flex: 1;
	font-size: 24px;
	padding: 0;
	margin: 0;
	color: #eaebed;
	font-weight: normal;
}
.navtop div a {
	padding: 0 20px;
	text-decoration: none;
	color: #c1c4c8;
	font-weight: bold;
}
* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  	font-size: 16px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {
  	background-color: #435165;
}
</style>
</head>
<body>
<div class="container">
  <nav class="navtop">
  <div>
  <h1>Create account</h1>
  <a href="index.php"><i class="fa-sharp fa-solid fa-delete-left"></i>Sign in</a>
  </div>
  </nav>
  <form action="create.php" method="post">
	<label>Username:</label><!-- Its just a label only-->
	<br><!--break line-->
	<input type="text" name="username_" style="width: 300px" required> <!-- input create input box type if int or text name as initialization to the input box name where you can call to had a function -->
	<br>
	<label>Password:</label>
	<br>
	<input type="text" name="password_" style="width: 300px" required>
	<br>
	<label>Email:</label>
	<br>
	<input type="text" name="email_" style="width: 300px" required>
	<br>
	<label>First Name:</label>
	<br>
	<input type="text" name="firstname_" style="width: 300px" required>
	<br>
	<label>Last Name:</label>
	<br>
	<input type="text" name="lastname_" style="width: 300px" required>
	<br><br><!-- double breakline to had additional space-->
	<input type="submit" class="btn btn-primary" value="Submit"> <!--input button type that = submit then put btn btn-primary as button design then Submit value to had a text label in the button-->
	<a href="index.php" class="btn btn-danger">Cancel</a>
  </form>
</div>
</body>
</html>
