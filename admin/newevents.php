<?php
include '../config.php';

if (isset($_POST['done'])) {
    

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            //INSERT INTO `events`( `title`,`description`, `category`, `total_days`, `starting_date`, `ending_date`, `charges`, `photo`, `location`, `remaks`, `status`) VALUES ('','','','','','','','','','')
            $title = $_POST['title'];
           $description=$_POST['description'];
             $category =$_POST['category'];

           $total_days=$_POST['total_days'];
          $starting_date=$_POST['starting_date'];
          $ending_date=$_POST['ending_date'];
          $charges=$_POST['charges'];
// `location`, `remaks`, `status`
          $location=$_POST['location'];
          $city=$_POST['city'];
$remaks="good";
            $status="ok";
            



            $query = "INSERT INTO `events`( `title`,`description`, `category`, `total_days`, `starting_date`, `ending_date`, `charges`, `photo`, `location`, `remaks`, `status`) VALUES ('$title','$description','$category','$total_days','$starting_date','$ending_date','$charges','$imgContent','$location','$remaks','$status')";

            $insert = mysqli_query($con, $query);



          
            header('Location:http://localhost/events/admin/events.php');
        }
    }
}








include_once "header.php";
include_once "navbar.php";
?>    
 
	  <section>
	  <div>
        <h1>Admin Panel|Add New Events</h1>
        
</div>
	  
	  
</section> 



<section id="contact" class="contact section-padding">
  <div class="imgDiv">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <!-- <h2>Contact Us</h2> -->
                        
                    </div>
                </div>
            </div>
			<div class="row m-0">
				<div class="col-md-12 p-0 pt-4 pb-4">
        
					<form action="newevents.php" method="post" class="bg-light p-4 m-auto" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<input class="form-control" placeholder="Title" name="title" id="title" required="" type="text">
								</div>
							</div>

                            <div class="col-md-12">
								<div class="mb-3">
									<textarea class="form-control" id="description" name="description" placeholder="Complete description of an event" required="" rows="3"></textarea>
								</div>
							</div>




							<div class="col-md-12">
								<div class="mb-3">
								<select name="category">
    <option disabled selected>-- Select Category--</option>
    <?php
	//choose category
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT `category` FROM `categories`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['category'] ."'>" .$data['category'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
                                
                                
                                </div>
							</div>

                            <div class="col-md-12">
								<div class="mb-3">
									<input class="form-control" placeholder="total days" name="total_days" id="total_days" required="" type="number">
								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">
									Starting Date <input class="form-control" placeholder="starting_date" name="starting_date" id="starting_date" required="" type="date">
								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">
									Ending Date <input class="form-control" placeholder="ending_date" name="ending_date" id="ending_date" required="" type="date">
								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">
									<input class="form-control" placeholder="Charges" name="charges" id="charges" required="" type="number">
								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">
									
                                    <label>Select Image File:</label><input type="file" name="image">
                                
                                
                                </div>
							</div>




							<div class="col-md-12">
								<div class="mb-3">
									<textarea class="form-control" id="location" name="location" placeholder="Location" required="" rows="3"></textarea>
								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">
									<textarea class="form-control" id="city" name="city" placeholder="City Name" required="" rows="3"></textarea>
								</div>
							</div>
                            <button class="btn btn-warning btn-lg btn-block mt-3" type="submit" name="done">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
  </div>
      </section>
     
 
     <?php
     include_once "footer.php";
     ?>