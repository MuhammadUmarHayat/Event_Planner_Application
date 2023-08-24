<?php
include_once "header.php";
include_once "navbar.php";
?>    
 <?php
 include '../config.php'; 
  $countOrders="SELECT count(`id`) AS total_bookings FROM `event_bookings`";
$result = mysqli_query($con, $countOrders); 
$row = mysqli_fetch_assoc($result); 
 $total_bookings=$row['total_bookings'];?>

 <?php $countevents="SELECT count(`id`) AS total_events FROM `events`";
$result = mysqli_query($con, $countevents); 
$row = mysqli_fetch_assoc($result); 
 $total_events=$row['total_events'];?>  

 <?php $countusers="SELECT count(`userid`) AS total_users FROM `users`";
$result = mysqli_query($con, $countusers); 
$row = mysqli_fetch_assoc($result); 
 $total_users=$row['total_users'];?>  


	  <section>
	  <div>
        <h1>Admin Panel</h1>
        
</div>

<center>

<table border=1>
<tr><td><h4>Total Events</h4></td><td><h4><?php echo $total_events?></h4></td><td></td><tr>
<tr><td><h4>Total Suscribers</h4></td><td><h4><?php echo $total_users?></h4></td><td></td><tr>
<tr><td><h4>Total Orders</h4></td><td><h4><?php echo $total_bookings?></h4></td><td></td><tr>
<tr><td><h4>total Registered Users</h4></td><td><h4><?php echo $total_users?></h4></td><td></td><tr>
</table>
</center>  
	 <section> 
	  
     <?php
     include_once "footer.php";
     ?>