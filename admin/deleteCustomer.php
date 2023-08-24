<?php include '../config.php';
 
$id= $_GET['id'];


$con->query("DELETE FROM `users` WHERE `userid`='$id'"); 
header('Location:http://localhost/events/admin/customerList.php');

?>