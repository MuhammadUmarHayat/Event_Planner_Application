<?php
include '../config.php'; 

$result ;
$customerID=$_SESSION['userid'];
$id;
if(isset($_GET['id']))
{
  $id=$_GET['id'];
$_SESSION['id']=$id;
$result = $con->query("SELECT * FROM `events` where  `id`='$id'");
}
if(isset($_POST['book']))
{
  $opinion = $_POST['opinion'];
$eventid= $_SESSION['id'];
$date1=date('d/m/y');
  $query="INSERT INTO `customer_opinions`( `customer_id`, `event_id`, `opinion`, `date`) VALUES ('$customerID','$eventid','$opinion','$date1')";
  $insert = mysqli_query($con,$query);
  header('Location:http://localhost/events/user/booknow.php');
}
include_once "header.php";
include_once "navbar.php";
?>    
 
	
 <section>
	  <div>
        <h1>Event Details</h1>
        
   <form action="eventDetail.php" method="post">       
         
<?php if($result && $result->num_rows > 0){ ?> 


  
<?php while($row = $result->fetch_assoc()){ ?> 

  
  <div class="col-12 col-md-12 col-lg-4" >

<div class="card  text-center bg-white pb-2 ">
<div style="float:left;display: inline-block;">
  <div class="card-body text-dark">
  
    <div class="img-area mb-4">
     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" alt="" class="img-fluid">
   
    </div>
    <h3 class="card-title"><?php echo $row['title'] ?></h3>
    <p class="lead"><?php echo $row['description'] ?></p>
        <p class="lead">Starts from <?php echo $row['starting_date'] ?></p>

        <p class="lead">To <?php echo $row['ending_date'] ?></p>
    <p class="lead">Venue <?php echo $row['location'] ?></p>
    <p class="lead">City <?php echo $row['city'] ?></p>
    <p class="lead">Actual Fee <?php echo $row['charges'] ?>$</p>
    <p class="price">Discount <?php echo $row['remaks'] ?>%</p>

<p><label for="opinion">Choose your opinion:</label>

<select name="opinion" id="opinion">
  <option value="Interested">Interested</option>
  <option value="Going">Going</option>
  <option value="Attended">Attended</option>
</select>
</p>

    <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">

    <button class="btn btn-warning btn-lg btn-block mt-3" type="submit" name="book">Book Now</button>
    

</div>
</div>
</div>
</div>
<?php



} ?> 

<?php }else{ ?> 
<p class="status error">Record not found...</p> 
<?php } ?>
</form> 
<h2>Customer Reviews</h2>
<?php
$result = $con->query("SELECT * FROM `reviews`  where  `eventid`='$id'");

?>
<table>
  <tr>
    <th>Customer</th>
    <th>Message</th>
    <th>Date</th>
    <th>Status</th>
    
</tr>
<?php if($result && $result->num_rows > 0){ ?> 


  
<?php while($row = $result->fetch_assoc()){ ?> 
  <tr>
  <td><?php  echo $row['customer']  ?></td>
  <td><?php  echo $row['message']  ?></td>
  <td><?php  echo $row['message_date']  ?></td>
  <td><?php  echo $row['status']  ?></td>
  
</tr>
<?php
  
}
}?>
</table>

<?php
//total likes
 $counLikes="SELECT sum(`likes`) AS total_likes FROM `reviews` ";
$result = mysqli_query($con, $counLikes); 
$row = mysqli_fetch_assoc($result); 
 $totalLikes=$row['total_likes'];
 echo '<h2> Total Likes '.$totalLikes.' </h2>'
 ?>  
        
</div>
	  
	  
	 <section> 
	  
     <?php
     include_once "footer.php";
     ?>