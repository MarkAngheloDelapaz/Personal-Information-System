
<?php
include 'database.php';
?>
<!-- call the file of database connection by including php file of open connection of database-->
<?php
  //put isset to handle the value and avoid error if there is no input value
	$id= $_POST["userid"];
	$conn = DBconnection();//make databases connection first
	$sql = "DELETE FROM users where user_id=".$id."";

	if ($conn->query($sql) === TRUE) {
		echo "Deleted successfully!";
    }else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();
?>
<a href="data_users.php">Go back to home page </a>
