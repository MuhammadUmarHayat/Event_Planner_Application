<?php include '../config.php';
 
$id= $_GET['id'];


$con->query("DELETE FROM `events` WHERE `id`='$id'"); 
header('Location:http://localhost/events/admin/events.php');

?>