<!DOCTYPE html>
<?php
include ('database.php');
?>
<!-- call the file of database connection by including php file of open connection of database-->
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
.navtop div a i {
	padding: 2px 8px 0 0;
}
.navtop div a:hover {
	color: #eaebed;
}
.content > p, .content > div {
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
}
.content > p table td, .content > div table td {
	padding: 5px;
	text-align: center;
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
.login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #3274d6;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #3274d6;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
}

.btn-space {
    margin-right: 5px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}


.button {
  background-color: #dddddd; /* Green */
  border: none;
  color: black;
  padding: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
}
#theader th { <!-- theader designs and sizes-->
  height: 10px;
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: center;
  background-color: #04AA6D;
  color: white;

}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body class="loggedin">
<div class="container">
  <nav class="navtop">
  <div>
  <h1>Users Database</h1>
  <a href="admin_profile.php"><i class="fa-sharp fa-solid fa-delete-left"></i>Back</a>
  </div>
  </nav>
<div class="content">
<div class="table-responsive">
<ul class="list-group">
<table class="table table-bordered table-hover table-striped" style ="width:100%" id="theader">
<thead>
  <tr>
			<th>User ID</th>
			<th>User Name</th>
			<th>Password</th>
			<th>Email Address</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Access Level</th>
			<th>Active</th>
		    <th>Options</th>
  </tr>
 </thead>
<!--
<li class="list-group-item">First Name</li>
<li class="list-group-item">First Name</li>
<li class="list-group-item">First Name</li>
<!-- listgroup without php
-->
<tbody>
<?php
$sql = "SELECT * FROM users"; // display the table
$conn = DBconnection();
$result = $conn->query($sql); //This coming from our return value from database.php return $conn

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  echo '<tr>'.
	'<td>'.$row["user_id"].'</td>'.
	'<td>'.$row["username"].'</td>'.
	'<td>'.$row["password"].'</td>'.
	'<td>'.$row["email"].'</td>'.
  '<td>'.$row["firstname"].'</td>'.
  '<td>'.$row["lastname"].'</td>'.
  '<td>'.$row["access_level"].'</td>'.
	'<td>'.$row["active"].'</td>'.
  '<td>'."<a  type='button' class='btn btn-xs btn-primary btn-space pull-left' href='update_admin.php?id=".$row["user_id"]."'>EDIT</a>".
   "<a  type='button' class='btn btn-xs btn-danger pull-left' href='delete.php?id=".$row["user_id"]."'>DELETE</a>".'</th>';
  echo '</tr>';
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</tbody>
</table>
</ul>
</div>
</div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>
</html>
