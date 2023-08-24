

<?php include '../config.php';


$result ;
$sum ;
$customerID=$_SESSION['userid'] ;

if(isset($_POST['buy']))
{
    $productid=$_POST['id'];
    $_SESSION["productid"]= $productid;
    header('Location:http://localhost/events/user/eventDetails.php?id='.$productid);
}



$_SESSION["cartid"]="";
	$cartID="";
 $query="SELECT count(`id`) AS value_sum FROM `event_bookings` where `customer_id`='$customerID'";
	$result1 = mysqli_query($con,$query ); 
$row = mysqli_fetch_assoc($result1); 
$sum = $row['value_sum'];
if(empty($sum))
{
$sum=0;
}
 
if(isset($_POST['search']))
{
   // echo "cliked";
   $location=$_POST['location'];
    $starting_date=$_POST['starting_date'];
    $total_days=$_POST['total_days'];
    $charges=$_POST['charges'];
  
   
 $query = "SELECT * FROM events  WHERE location='$location' and starting_date='$starting_date' and total_days='$total_days'and charges='$charges'";
 
 
    $result =$con->query($query);
   
  // var_dump($result);
   
}
else if(isset($_POST['searchLocation']))
{
  ////search by location
  $location=$_POST['location'];
   
   
 $query = "SELECT * FROM events  WHERE location='$location'";
 
 
    $result =$con->query($query);

}
else if(isset($_POST['searchDate']))
{
  ////,search by date
 
    $starting_date=$_POST['starting_date'];
    
   
 $query = "SELECT * FROM events  WHERE  starting_date='$starting_date' ";
 
 
    $result =$con->query($query);

}
else if(isset($_POST['searchDays']))
{
  ////search by days
  
    $total_days=$_POST['total_days'];
   
  
   
 $query = "SELECT * FROM events  WHERE  total_days='$total_days'";
 
 
    $result =$con->query($query);

}
else if(isset($_POST['searchCharges']))
{
 //search by charges
 
 $charges=$_POST['charges'];


$query = "SELECT * FROM events  WHERE  charges='$charges'";


 $result =$con->query($query);

}
else 
{
// Get all data from table 
$query = "SELECT * FROM events";
 $result = $con->query($query);
 
}

?>




<?php include_once "header.php"; ?>



<main>
<section>
    <?php include_once "navbar.php"; ?>
    </section>
  
  
    <section>
    <!-- main content here -->

   
    <?php 
    


     
    if($_SESSION['userid']==null)
    {
    }
    else
    {
       $userid=$_SESSION['userid'];
      // "<h2> Welcome ". $userid."</h2>";
    }
    //echo "<h3>ToTal Bookings You have =".$sum."</h3>";


   

    ?>
<secion>
<br>
<a class="btn btn-danger btn-sm btn-block ml-2" href="subscribe.php">subcribe</a>
<br>
<form action="index.php" method="post">
<div class="col-12 col-md-12 " >

<div class="card  text-center bg-white pb-2 mt-2">
<div style="float:left;display: inline-block;">
<table border=1>
  <tr>
    <td>

    <select name="location">
    <option disabled selected>-- Select  City--</option>
    <?php
	
    include 'config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT `location` From `events`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['location'] ."'>" .$data['location'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>

    </td>
    <td >

    
<select name="starting_date">
    <option disabled selected>-- Select  Date--</option>
    <?php
	
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT `starting_date` From events");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['starting_date'] ."'>" .$data['starting_date'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>
    <td>
      
<select name="total_days">
    <option disabled selected>-- Select  No of Days--</option>
    <?php
	
    include 'config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT total_days From events");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['total_days'] ."'>" .$data['total_days'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>
    <td>
<select name="charges">
    <option disabled selected>-- Select  Per Person Charges--</option>
    <?php
	
    include 'config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT charges From events");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['charges'] ."'>" .$data['charges'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td>
    <td>
      <button class="btn btn-warning btn-sm btn-block" name="search" id="search" >Search</button>
    </td>
    <td>
      <button class="btn btn-info btn-sm btn-block" name="searchLocation"  >Search by Location</button>
    </td>
    <td>
      <button class="btn btn-secondary btn-sm btn-block" name="searchDate" id="search" >Search By Date</button>
    </td>
    <td>
      <button class="btn btn-primary btn-sm btn-block" name="searchDays" id="search" >Search BY Days</button>
    </td>
    <td>
      <button class="btn btn-dark btn-sm btn-block" name="searchCharges" id="search" >Search By Charges</button>
    </td>
        </tr>
</table>
</div></div></div>
      </form>
  <section>
<?php
  if ($result->num_rows > 0) 
    {
       while ($row = $result->fetch_assoc())
        {?>
<div class="col-12 col-md-12 col-lg-4" >

                <div class="card  text-center bg-white pb-2 ">
                <div style="float:left;display: inline-block;">
                  <div class="card-body text-dark">
                  
                    <div class="img-area mb-4">
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" alt="" class="img-fluid">
                   
                    </div>
                    <h3 class="card-title"><?php echo $row['title'] ?></h3>
                    <p class="lead"><?php echo $row['description'] ?></p>
                    <p class="lead">Actual Fee <?php echo $row['charges'] ?>$</p>
                    <p class="price">Discount <?php echo $row['remaks'] ?>%</p>
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">

                    
                    <a class="btn btn-success btn-lg btn-block mt-3" href="eventDetail.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">View Details</a> 
               
              </div>
                </div>
                </div>
        </div>
              <?php
                    }
                }
                else{
                  echo "No Product is found";
                }
                
            ?>

              
             

              

            </div>

            </div>
          </div>
          







</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>