<?php
include '../config.php'; 
$id= $_GET['id'];
$message="";
if(isset($_POST['save']))
{

    $id= $_GET['id'];
        $message = $_POST['message'];
	
        $date = date('d/m/y');
        $query="UPDATE `contactus` SET `reply`='$message',`reply_date`='$date' WHERE `id`='$id'";
        $insert = mysqli_query($con,$query);
        
     
        $message="Record is added successfully";
        header('Location:http://localhost/events/admin/queries.php');
        }
    
    






include_once "header.php";
include_once "navbar.php";
?>    
 
	  <section>
	  <div>
        <h1>Admin Panel|Reply To user</h1>
        
</div>
<form method="post" action="sendReply.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <div >
<table>
<tr><td>ID</td><td><?php echo $id; ?></td></tr> 
<tr> <td>Message </td> <td><input type="text" name="message" required>   <span class="error" >*</span > </td>   </tr>
<input type="hidden" name="id" value="<?php echo $id;?>" />

<tr> <td> </td>
 <td> <button type="submit" name="save"> Send </button>  </td>   </tr>
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