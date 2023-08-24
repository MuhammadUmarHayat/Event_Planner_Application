<?php
include '../config.php'; 
$message="";
$customerID=$_SESSION['userid'];

$eventid= $_SESSION['id'];

$eventName;
$result = $con->query("SELECT * FROM `events`  where  `id`='$eventid'");
 if($result && $result->num_rows > 0)
 {
    $row = $result->fetch_assoc();
    $eventName= $row['title'];
    
   

 }
//`customer`, `email`, `message`, `totalStars`,
// `message_date`, `likes`, `status`, `eventid`
if(isset($_POST['save']))
{

	
	 $data = $_POST;
     $email="";
	    $messages = $_POST['message'];
        $status = $_POST['status'];
        $stars=0;
	    $likes = $_POST['likes'];
        $date1=date('d/m/y');

        $query="INSERT INTO `reviews`(`customer`, `email`, `message`, `totalStars`, `message_date`, `likes`, `status`, `eventid`) VALUES ('$customerID','$email','$messages','$stars','$date1','$likes','$status','$eventid')";
        $insert = mysqli_query($con,$query);
        
     
        $message="Your review is saved successfully";

       // header('Location:http://localhost/events/admin/category.php');
        
    }
    
        
    
    






include_once "header.php";
include_once "navbar.php";
?>    
 
	  <section>
	  <div>
        <h1>Add your opinion</h1>
        
</div>
<form method="post" action="review.php" enctype="multipart/form-data">
    <div >
<table>
<tr> <td>Customer ID </td>
 <td>
   <?php
   echo $customerID
   ?> 

</td>   </tr>
<tr> <td>Event Number </td> <td>
<?php
   echo $eventName;
   ?>     
</td>   </tr>
<tr> <td>Message</td> <td><textarea  name="message" rows="4" cols="50" required >  </textarea> <span class="error" >*</span > </td>   </tr>
<tr> <td>Do you like this event</td> <td>

<select name="likes" id="likes">
  <option value=1>Yes</option>
  <option value=0>No</option>
  
</select>
 </td>   </tr>

 <tr> <td>Your status</td> 
 <td> <select name="status" id="status">
  <option value="Interested">Interested</option>
  <option value="Going">Going</option>
  <option value="Attended">Attended</option>
</select></td></tr>
<tr> <td> </td>
 <td> <button type="submit" name="save"> save </button>  </td>   </tr>
</table>
</form>
<?php
echo $message;
?>
</div>
	  
	 <section> 
	  
     <?php
     include_once "footer.php";
     ?>