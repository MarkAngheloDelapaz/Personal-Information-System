<?php
//<!-- OPEN CONNECTION TO MYSQL-->
function DBconnection(){ //Creating function to easily call on otherphp files
$servername = "localhost";
$username = "Mainadmin";
$password = "adminpass";
$db = "citem_db";
// Create connection
$conn = new mysqli($servername,$username,$password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Still Connected!";
return $conn; //to return the value of our connection
}
?>
