<?php
include 'database.php';
?>
<!-- call the file of database connection by including php file of open connection of database-->
<?php
  if(isset($_POST["username"])
  && isset($_POST["password"])
  && isset($_POST["email"])
  && isset($_POST["firstname"])
  && isset($_POST["lastname"])
  && isset($_POST["access_level"])
  && isset($_POST["active"])){
  //put isset to handle the value and avoid error if there is no input value
  $id= $_POST["userid"];
  $UN= $_POST["username"];
  $PW= $_POST["password"];
	$EM= $_POST["email"];
	$FN= $_POST["firstname"]; //declaration only to make it short its up to you
	$LN= $_POST["lastname"];
  $AL= $_POST["access_level"];
  $AT= $_POST["active"];

	$conn = DBconnection();//make databases connection first
	$sql = "update users set
	email='".$EM."',
  username='".$UN."',
  password='".$PW."',
	firstname='".$FN."',
	lastname='".$LN."',
  access_level='".$AL."',
  active='".$AT."'
	where user_id= ".$id.""; // " " double quotation only for integer.


	if ($conn->query($sql) === TRUE) {
		echo "Updated successfully!";
    }else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();
  }
?>
<a href="data_users.php">Check Updated Profile </a>
