
<?php 
include '../config.php'; 
 $customerID=$_SESSION['userid'];
 $couponNo=rand(123456,999999);
 
 if(isset($_POST['book']))
 {
    $date1=date('d/m/y');

    $email = $_POST['email'];
   

$status="subscribed";


try{
    $to_email =$email;
    $subject = "you have subscribed to Event Planner website";
    $body = "You are successfully subscribe to our website. Your Coupon Number is: ".$couponNo;
    $headers = "From: sender email";
    
    if (mail($to_email, $subject, $body, $headers)) {
        $message2= "Email successfully sent to $to_email...";
    } else {
        $message2= "Email sending failed...";
    }


}
catch(Exception $e){
    $message2="mail has been sent";  
}




 $query="INSERT INTO `subscribers`( `email`, `subscription_date`, `status`, `customerid`, `couponNo`) VALUES ('$email','$date1','$status','$customerID','$couponNo')";

$insert = mysqli_query($con,$query);
echo "Coupon is generated and sent to your email.Check email.";
//header('Location:http://localhost/events/user/payments.php');
}
include_once "header.php";
include_once "navbar.php";
?>
<form method="POST" action="subscribe.php">
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