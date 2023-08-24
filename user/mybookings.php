<?php
include '../config.php'; 

$result ;
$customerid=$_SESSION['userid'] ;

$result = $con->query("SELECT * FROM `event_bookings` where `customer_id`='$customerid'");



    
   
 ?>
<?php
include_once "header.php";
include_once "navbar.php";
//`event`, `booking_date`, `amount`, `person`, `total`, `no_of_days`,
?>    
 
	  <section>
	  <div>
        <h1>Customer Bookings</h1>
        
          
          <table border=1>
  <tr>
  <th>#</th>
  <th> Booking Date</th>
  <th> Persons</th>
  <th> Number of Days</th>
  <th> Total Amount</th>
  <th> </th>
  <th> </th>
  </tr>
</section>
<?php if($result && $result->num_rows > 0){ ?> 


  
<?php while($row = $result->fetch_assoc()){ ?> 

   

      <tr>
<td><?php echo $row['event']?></td>
<td><?php echo  $row['booking_date']?></td>
<td><?php echo  $row['person']?></td>

<td><?php echo $row['no_of_days']?></td>
<td><?php echo  $row['total']?></td>


</tr>
<?php



} ?> 

<?php }else{ ?> 
<p class="status error">Record not found...</p> 
<?php } ?>

</table>


        
</div>
	  
	  
	 <section> 
	  
     <?php
     include_once "footer.php";
     ?>