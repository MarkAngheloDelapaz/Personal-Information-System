<!DOCTYPE html>
<?php
include 'database.php';
?>
<!-- call the file of database connection by including php file of open connection of database-->
<?php
$UNupdate= "";
$PWupdate= "";
$EMupdate= "";
$FNupdate= "";//used as a temp storage of our table column name
$LNupdate= "";

if(isset($_GET["id"])){
$conn = DBconnection();
$result = $conn->query("SELECT username,password,email,firstname,lastname FROM users where user_id=".$_GET["id"]); //This coming from our return value from database.php return $conn
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $UNupdate= $row["username"];
  $PWupdate= $row["password"];
  $EMupdate= $row["email"];
  $FNupdate= $row["firstname"];//$row["table column name"]
  $LNupdate= $row["lastname"];
  }
} else{
  echo "0 results";
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
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
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
  <h1>Edit Personal info</h1>
  <a href="profile.php"><i class="fa-sharp fa-solid fa-delete-left"></i>Back</a>
  </div>
  </nav>
  <form   action="updateprocess.php" method="post">
	<br><!--break line-->
	<input type="hidden" name="userid"
	value="<?Php echo $_GET["id"];?>">
	<!-- type = hidden to secure our unique id -->
  <br>
  <label>User Name</label>
  <br>
  <input type="text" name="username" style="width: 300px" value="<?Php echo $UNupdate;?>" required>
  <br>
  <label>Password</label>
  <br>
  <input type="text" name="password" style="width: 300px" value="<?Php echo $PWupdate;?>" required>
	<br>
	<label>Email</label><!-- Its just a label only-->
	<br><!--break line-->
	<input type="text" name="email" style="width: 300px" value="<?Php echo $EMupdate;?>" required> <!--set specific value to call the specific name or data in the personal_id -->
	<br>
	<label>First Name</label><!-- Its just a label only-->
	<br><!--break line-->
	<input type="text" name="firstname" style="width: 300px" value="<?Php echo $FNupdate;?>" required> <!--set specific value to call the specific name or data in the personal_id -->
	<br>
	<label>Last Name</label>
	<br>
	<input type="text" name="lastname" style="width: 300px" value="<?Php echo $LNupdate;?>" required>
	<br><br><!-- double breakline to had additional space-->
	<input type="submit" class="btn btn-primary" value="Submit"> <!--input button type that = submit then put btn btn-primary as button design then Submit value to had a text label in the button-->
	<a href="profile.php" class="btn btn-danger">Cancel</a>
  </form>
</div>
</body>
</html>
