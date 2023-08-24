
<?php 
include '../config.php'; 
 $customerID=$_SESSION['userid'];

 $eventid= $_SESSION['id'];
 if(isset($_SESSION['id']))
{
  
$_SESSION['id']=$eventid;
}
 $amount="";

 $result = $con->query("SELECT * FROM `events` where  `id`='$eventid'");
 if($result && $result->num_rows > 0)
 {
    $row = $result->fetch_assoc();
   $charges= $row['charges'];
  $discount= $row['remaks'];
  $total= $charges-(($charges*$discount)/100);
  $amount=$total;


 }
 if(isset($_POST['book']))
 {
    $date1=date('d/m/y');

    $days = $_POST['days'];
    $persons = $_POST['persons'];
    $totalCharges=$days*$persons*$amount;

$status="confirmed";

 $query="INSERT INTO `event_bookings`( `customer_id`, `event`, `booking_date`, `amount`, `person`, `total`, `no_of_days`, `status`, `requested_date`, `remarks`) VALUES ('$customerID','$eventid','$date1','$total','$persons','$totalCharges','$days','$status','$date1','$status')";

$insert = mysqli_query($con,$query);
header('Location:http://localhost/events/user/payments.php');
}
include_once "header.php";
include_once "navbar.php";
?>
<form method="POST" action="booknow.php">
<center>
<table>
			
				
				
				
				
				
				
				
				
				
				<tr><td>Customer:</td><td> <?php  echo $customerID; ?></td></tr>
				
		<tr><td> Enter  number of days</td><td> <input type="number" name="days"></td></tr>		
        <tr><td> Enter  number of persons</td><td> <input type="number" name="persons"></td></tr>
				
				
					
				<tr><td> Enter  payment amount:</td><td> <?php  echo $amount;?></td></tr>
				
				<tr><td> </td><td> <button class="btn btn-info" type="submit" name="book" >Submit</button></td></tr>			


                    
					</table>
                </form>
</center>      

</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>