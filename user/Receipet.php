<?php
include '../config.php'; 
$customerID=$_SESSION['userid'];

$eventid= $_SESSION['id'];

  $customer_id;
    $event;
    $eventName;
    $amount;
    $booking_date;
    $person;
    $no_of_days;
    $city;
    $location;
    $starting_date;
    $ending_date;
   
$result = $con->query("SELECT * FROM `event_bookings` where   `customer_id`='$customerID' and `event`='$eventid'");
 if($result && $result->num_rows > 0)
 {
    $row = $result->fetch_assoc();
    
    $customer_id= $row['customer_id'];
    $event= $row['event'];
    $amount= $row['total'];
    $booking_date= $row['booking_date'];
    $person= $row['person'];
    $no_of_days= $row['no_of_days'];
   
 }
 $result = $con->query("SELECT * FROM `events`  where  `id`='$eventid'");
 if($result && $result->num_rows > 0)
 {
    $row = $result->fetch_assoc();
    $eventName= $row['title'];
    $city= $row['city'];
    $location= $row['location'];
    $starting_date= $row['starting_date'];
    $ending_date= $row['ending_date'];
   

 }


include_once "header.php";
 include_once "navbar.php";

 

?>
<script>
    function doPrint() {
        var prtContent = document.getElementById('div1');
        prtContent.border = 0; //set no border here
        var WinPrint = window.open('', '', 'left=100,top=100,width=1000,height=1000,toolbar=0,scrollbars=1,status=0,resizable=1');
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
<br><br>
<div class="nav-item">
                <a class="nav-link" href="review.php">Add Review</a>
</div> 
<br><br>
<button type="submit" name="print" onclick="doPrint()" >Print Receipet</button>
<br>

<div id="div1">
<center>
<br><br>
<h2>Event Pass</h2><br><br>
    <table border=1>
    <tr><td><b>Customer</b> </td><td><?php echo $customer_id ?> </td><td><b>Event Name</b></td><td><?php echo $eventName?></td></tr>
    <tr><td><b>From </b></td><td><?php echo $starting_date?></td><td><b>To</b></td><td><?php echo $ending_date ?></td></tr>
    <tr><td><b>No of Persons</b></td><td><?php echo $person ?></td><td><b>No Of Days</b></td><td><?php echo $no_of_days ?></td></tr>
    <tr><td><b>City</b></td><td><?php echo $city ?></td><td><b>Location</b></td><td><?php echo $location ?></td></tr>
    <tr><td><b>Total Pament</b></td><td><?php $amount?></td><td><b>Status</b></td><td>Paid</td></tr>
</table>
</center>
</div>