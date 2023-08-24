<?php
include '../config.php'; 

$result ;
$_SESSION['userid'] ="admin";

$result = $con->query("SELECT * FROM `users` ");
include_once "header.php";
include_once "navbar.php";
?>    
 
	  <section>
	  <div>
        <h1>Admin Panel|List of All Customers</h1>
        <a style="color:blue;"href="newCategory.php">New Category</a>
          
          <table border=1>
  <tr>
  <th>Name</th>
  <th> User ID</th>
  <th> Email</th>
  <th> Address</th>
  <th> </th>
  <th> </th>
  </tr>
</section>
<?php if($result && $result->num_rows > 0){ ?> 


  
<?php while($row = $result->fetch_assoc()){ ?> 

  
      <tr>
<td><?php echo $row['name']?></td>
<td><?php echo $row['userid']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['address']?></td>
<td>  </td>

<td> <?php echo '<a style="color: #1BA098; text-decoration: none;" href="deleteCustomer.php?id=' . $row['userid'] .'">Remove Customer Details</a>';
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