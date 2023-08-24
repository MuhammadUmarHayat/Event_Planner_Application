<?php
include '../config.php'; 
$message="";
if(isset($_POST['save']))
{

	
	 $data = $_POST;
	
	if (empty($data['category']) ||
    empty($data['description']) )
{
    
    die('Please fill all required fields!');
}

if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
        $category = $_POST['category'];
	
        $description = $_POST['description'];
        $query="INSERT INTO `categories`( `category`, `photo`, `description`) VALUES ('$category','$imgContent','$description')";
        $insert = mysqli_query($con,$query);
        
     
        $message="Record is added successfully";
        header('Location:http://localhost/events/admin/category.php');
        }
    }
        
    }
    






include_once "header.php";
include_once "navbar.php";
?>    
 
	  <section>
	  <div>
        <h1>Admin Panel|Add a new category</h1>
        
</div>
<form method="post" action="newCategory.php" enctype="multipart/form-data">
    <div >
<table>

<tr> <td>Title </td> <td><input type="text" name="category" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description" required>   <span class="error" >*</span > </td>   </tr>

<tr> <td>   
<label>Select Image File:</label></td>
<td> <input type="file" name="image">
     </td>
</tr>
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