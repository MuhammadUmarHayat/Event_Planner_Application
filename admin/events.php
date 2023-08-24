<?php
include '../config.php'; 

$result ;
$_SESSION['userid'] ="admin";

$result = $con->query("SELECT * FROM `events` ");
include_once "header.php";
include_once "navbar.php";
?>    
 
	
 <section>
	  <div>
        <h1>Admin Panel|List of All Events</h1>
        <a style="color:blue;"href="newevents.php">New Event</a>
          
          <table border=1>
  <tr>
  <th>#</th>
  <th> Event Name</th>
  <th> Category </th>
  <th> Description</th>
  <th> Charges</th>
  <th> Disscount Offer</th>
  <th> Photo</th>
  <th> </th>
  <th> </th>
  </tr>
</section>
<?php if($result && $result->num_rows > 0){ ?> 


  
<?php while($row = $result->fetch_assoc()){ ?> 

  
      <tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['title']?></td>
<td><?php echo $row['category']?></td>

<td><?php echo $row['description']?></td>
<td><?php echo $row['charges']?></td>
<td><?php echo $row['remaks']?>%</td>
<td>  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px height=50px /> </td>

<td><?php  echo '<a style="color: #1BA098; text-decoration: none;"  href="editEvent.php?id=' . $row['id'] .'">Edit Details</a>';


?></td>
<td> <?php echo '<a style="color: #1BA098; text-decoration: none;" href="deleteEvent.php?id=' . $row['id'] .'">Delete Details</a>';
?></td>
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