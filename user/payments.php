<?php 
include '../config.php'; 
  $customerID=$_SESSION['userid'];

  $eventid= $_SESSION['id'];
  $amount;

 $result = $con->query("SELECT * FROM `event_bookings` where   `customer_id`='$customerID' and `event`='$eventid'");
 if($result && $result->num_rows > 0)
 {
    $row = $result->fetch_assoc();
    $amount= $row['total'];
   
 }
 if(isset($_POST['done']))
{
    $date1=date('d/m/y');
    $query="INSERT INTO `payments`( `customerid`, `eventid`, `amount`, `paymentDate`) VALUES ('$customerID','$eventid','$amount','$date1')";
    $query12 = mysqli_query($con,$query);
    header('Location:http://localhost/events/user/Receipet.php');
}



 include_once "header.php";
 include_once "navbar.php";
 ?>
<form method="POST" action="payments.php">
<center>
<table>
				
				<input type="radio" name="methods"
<?php if (isset($methods) && $methods=="cod") echo "checked";?>
 value="cod">Cash on Delivery<br>
  <input type="radio" name="methods"
  <?php if (isset($methods) && $methods=="online") echo "checked";?> value="online">Online Banking<br>
  <br>
				
				
				
				
				
				
				
				
				
				<tr><td> Enter cusID:</td><td> <?php  echo $customerID; //$amount?></td></tr>
				
		<tr><td> Enter  Bank Name(for online banking):</td><td> <input type="text" name="bankname"></td></tr>		
				
				 <tr><td> Enter  Account Number (for online banking):</td><td> <input type="text" name="accountNumber"></td></tr>
				
					
				<tr><td> Enter  payment amount:</td><td> <?php  echo $amount;?></td></tr>
				
				<tr><td> </td><td> <button type="submit" name="done" >Submit</button></td></tr>			


                    
					</table>
                </form>
</center>      

       


</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>