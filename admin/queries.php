<?php
include '../config.php'; 

$result ;
$_SESSION['userid'] ="admin";

$result = $con->query("SELECT * FROM `contactus` ");
include_once "header.php";
include_once "navbar.php";
?>    
 
	
 <section>
	  <div>
        <h1>Admin Panel|User Queries</h1>
        
       
          <table border=1>
  <tr>
  <th>#</th>
  <th>  Name</th>
  <th> Email </th>
  <th> Message</th>
  <th> Date</th>
  <th>Reply </th>
  <th> </th>
  <th> </th>
  <th> </th>
  <th> </th>
  </tr>
</section>
<?php if($result && $result->num_rows > 0){ ?> 


  
<?php while($row = $result->fetch_assoc()){
    //  //`id`, `name`, `email`, `message`, `message_date` 
    ?> 

  
      <tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['name']?></td>
<td><?php echo $row['email']?></td>

<td><?php echo $row['message']?></td>
<td><?php echo $row['message_date']?></td>
<td><?php echo $row['reply']?></td>
<td><?php echo $row['reply_date']?></td>
<td>  </td>

<td><?php  echo '<a style="color: #1BA098; text-decoration: none;"  href="sendReply.php?id=' . $row['id'] .'">Send Reply</a>';


?></td>
<td> 
</td>
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