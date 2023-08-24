
<!-- php script  -->

<?php include 'config.php';?>
<?php 


if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['userid'])&& !empty($_POST['password']))
	{
          $userid = $_POST['userid'];
            $name = $_POST['name'];
			 $password = $_POST['password'];
			          $email = $_POST['email'];
           
			          $mobile = $_POST['mobile'];
            $address = $_POST['address'];
			$usertype="Customer";
			
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
  echo "Invalid email format"; 
}
else
{


			
			
			$q1="INSERT INTO `users`(`userid`, `name`, `password`, `email`, `mobile`, `address`, `usertype`) VALUES ('$userid', '$name', '$password', '$email', '$mobile', '$address', '$usertype')";
			$query = mysqli_query($con,$q1);
 
 
 echo 'User is registered successfully';
}
		
	}
	else
	{
		
		echo "Please enter user name and password";
		
	}
}
else{
	
	
	
	echo "Please fill the form first";
}
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    
    <!-- All CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .imgDiv {
      background-image: url('img/e2.bmp');
      background-size: cover;
      background-position: center;
      height: 120vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#"><span class="text-warning">Event</span>Planer</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " href="index.php">Home
                   
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="about.php">About</a>
               
              </li> 
                          
               <li class="nav-item">
                <a class="nav-link " href="contact.php">Contact</a>
               
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li> 
               
<li class="nav-item">
                <a class="nav-link active" href="customer_signup.php">Customer Registration</a>
                <span class="visually-hidden">(current)</span>  
            </li>			  
            </ul>
            <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
          </div>
        </div>
      </nav>
         
         
 <!-- Contact starts -->
 <section id="contact" class="contact section-padding  mt-5 mb-5">
  <div class="imgDiv">
        <div class="container mt-5 mb-5">
           
           
			<div class="row m-0">
     
      <div class="col-md-12">
      <div class="row">
								<div class="mb-3">
									<h2 style="color:white;">Customer Registration</h2>
								</div>
							</div>
            </div>
				<div class="col-md-12 p-0 pt-4 pb-4">
        
					<form action="customer_signup.php" method="post" class="bg-light p-4 m-auto">
						<div class="row">
							<div class="col-md-12">
                            <div class="mb-3">
									Enter  full name
								</div>
								<div class="mb-3">
									<input type="text" class="form-control" placeholder="Full Name" name="name" id="name" required="" >
								</div>
							</div>


                            <div class="col-md-12">
                            <div class="mb-3">
									Enter User id
								</div>
								<div class="mb-3">
									<input type="text" class="form-control" placeholder="User id" name="userid" id="userid" required="" >
								</div>
							</div>



							<div class="col-md-12">
                            <div class="mb-3">
									Enter Enter Password
								</div>
								<div class="mb-3">
									<input type="password" name="password" class="form-control" placeholder="Password" required="" >
								</div>
							</div>
                            <div class="col-md-12">
                            <div class="mb-3">
									Enter Email
								</div>
								<div class="mb-3">
									<input class="form-control" placeholder="Email" name="email" id="email" required="" type="email">
								</div>
							</div>
							
                            <div class="col-md-12">
                            <div class="mb-3">
									Enter Your Mobile Nummber
								</div>
								<div class="mb-3">
									<input class="form-control" placeholder="Mobile Number"  name="mobile" required="" type="text">
								</div>
							</div>
                            
                            <div class="mb-3">
									Enter Your address
								</div>
								<div class="mb-3">
									<input class="form-control" placeholder="Address" type="text" name="address" required="" >
								</div>
							</div>
                                                    
                            <button class="btn btn-success btn-lg btn-block mt-3" type="submit" name="done">Send Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
  </div>
      </section>
     
      
     
	  
	  
	  
	  
	  
	  
	  
	  
	  
     
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
<div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

        

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>&copy; 2021 Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</div>

</div>





    
    
    <!-- All Js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>



