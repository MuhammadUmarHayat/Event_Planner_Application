
<?php 
include '../config.php'; 
 $customerID=$_SESSION['userid'];
 
 
 if(isset($_POST['book']))
 {
    $date1=date('d/m/y');

    $email = $_POST['email'];
   

$status="subscribed";






 $query="update `subscribers` set `email`='$email' where  `customerid`='$customerID'";

$insert = mysqli_query($con,$query);
echo "Coupon is generated and sent to your email.Check email.";
//header('Location:http://localhost/events/user/payments.php');
}
include_once "header.php";
include_once "navbar.php";
?>
<form method="POST" action="updateSubscription.php">
<center>
<table>
			
				
				
				
				
				
				
				
				
				
				<tr><td>Customer:</td><td> <?php  echo $customerID; ?></td></tr>
				
		<tr><td> Enter  your valid email address</td><td> <input type="email" name="email" Required></td></tr>		
        		
				
				<tr><td> </td><td> <button class="btn btn-info" type="submit" name="book" >Submit</button></td></tr>			


                    
					</table>
                </form>
</center>      

</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>