<?php
include 'database.php';
session_start();
$conn = DBconnection();
$conn->query("update users set active ='0' where user_id= '".$_GET["id"]."'"); //set 0 as in active status of user
session_destroy();
// Redirect to the login page:
header('Location: index.php');
?>