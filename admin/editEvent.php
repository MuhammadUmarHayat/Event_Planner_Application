<?php
include '../config.php'; 

$result ;


$message="";

$id= $_GET['id'];

$category="";
$description="";
$title="";
$charges="";

 


$result = $con->query("SELECT * FROM `events`  where  `id`='$id'"); 
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
           
    $id=	$row['id'];
$category= $row['category'];
        $description= $row['description'];
      
 $title= $row['title'];
 
 $charges=$row['charges'];
 $remaks= $row['remaks'];     
        
}
           

}  





if(isset($_POST['save']))
{

	$id= $_GET['id'];
	 $data = $_POST;
	
	

 
   
       $category = $_POST['category'];
	
       $description = $_POST['description'];
       $title= $_POST['title'];
 
 $charges=$_POST['charges'];//remaks
 $remaks= $_POST['remaks'];

         $query="update `events` set `title`='$title',`charges`='$charges', `category`='$category',  `description`='$description',`remaks`='$remaks' where `id`='$id'";
       $insert = mysqli_query($con,$query);
        
     
        $message="Record is updated successfully";
        header('Location:http://localhost/events/admin/events.php');
    
        }
    
        
    
    
    
    



include_once "header.php"; 
include_once "navbar.php";

?>



            
            <form action="editEvent.php?id=<?php echo $id; ?>" method="post">
    <div class="center">
<table>
 
<tr><td>ID</td><td><?php echo $id; ?></td></tr>  
<tr> <td>Title </td> <td><input type="text" name="title" value="<?php echo $title; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Catgory </td> <td><input type="text" name="category" value="<?php echo $category; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description" value="<?php echo $description; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Chanrges </td> <td><input type="number" name="charges" value="<?php echo $charges; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Disscount Offer </td> <td><input type="number" name="remaks" value="<?php echo $remaks; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td> </td>
 <td> <button type="submit" name="save"> Save changes </button>  </td>   </tr>
</table>
    </form>
<?php
echo $message;
?>
</div>

<?php
     include_once "footer.php";
     ?>

            
       