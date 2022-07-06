<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script>
	jQuery(document).ready(function($){
		$('#toggler').click(function(event){
			{
				event.preventDefault();
				$('#wrap').toggleClass('toggled');
			}
		});
	});
</script>
</head>
<body>

<div class="d-flex" id="wrap">
	<div class="sidebar bg-light border-light">
		<div class="sidebar-heading">
			<p class="text-center">Manage Students</p>
		</div>
		<ul class="list-group list-group-flush">
		<a href="main.php" class="list-group-item list-group-item-action">
			<i class="fa fa-vcard-o"></i>Dashboard</a>
			<a href="addstudent.php" class="list-group-item list-group-item-action">
			<i class="fa fa-user"></i>Add Student</a>
			<a href="viewstudent.php" class="list-group-item list-group-item-action">
			<i class="fa fa-eye"></i>View Student</a>
			<a href="edit_student.php" class="list-group-item list-group-item-action">
			<i class="fa fa-pencil"></i>Edit Student</a>
			<a href="addteacher.php" class="list-group-item list-group-item-action">
			<i class="fa fa-user"></i>Add Teacher</a>
			<a href="viewteacher.php" class="list-group-item list-group-item-action">
			<i class="fa fa-eye"></i>View Teacher</a>
			<a href="editteacher.php" class="list-group-item list-group-item-action">
			<i class="fa fa-pencil"></i>Edit Teacher</a>
			<a href="viewcourse.php" class="list-group-item list-group-item-action">
			<i class="fa fa-book"></i>View Course</a>
			<a href="updatecourse.php" class="list-group-item list-group-item-action">
			<i class="fa fa-book"></i>Update Course</a>
			<a href="viewpayment.php" class="list-group-item list-group-item-action">
			<i class="fa fa-credit-card"></i>View Payment Details</a>
			<a href="logout.php" class="list-group-item  list-group-item-action">
			<i class="fa fa-sign-out"></i>Logout</a>
		</ul>
	</div>
	<div class="main-body">
		<button class="btn btn-outline-light bg-danger mt-3 " id="toggler">
			<i class="fa fa-bars"></i>
		</button>
		<section id="main-form">
         
                
			<h2 class="text-center text-danger pt-2 font-weight-bold">Student Information Management System</h2>
			<div class="container bg-danger" id="formsetting1">
				<h3 class="text-center text-white pb-2 pt-2  font-weight-bold">Edit Student Detail</h3>
  
				<?php
                  if (isset($_GET['edit_student'])){
                  	$edit_st_id=$_GET['edit_student'];
                  	$query="select * from student_details where sid='$edit_st_id'";
                  	$run=mysqli_query($conn,$query) or die (mysqli_error($conn));
                  	while ($row = mysqli_fetch_assoc($run)) 
                  	{
                  		

                  
				?>






				   <form method="GET"  action="" enctype="multipart/form-data">
				  <div class="row">
					<div class="col-md-5 col-sm-5 col-12 m-auto">
					<div class="form-group">
						<label class="text-white">First Name</label>
						<input type="text" name="fname" placeholder="Enter Your First Name" class="form-control" value ="<?php echo $row['fname'];  ?>">

					</div>
					<div class="form-group">
						<label class="text-white">Email </label>
						<input type="email" name="email" placeholder="Enter Your Email" class="form-control" value ="<?php echo $row['email'];  ?>"/>

						
					</div>
					<div class="form-group">
						<label class="text-white">Address </label>
						<input type="text" name="address" placeholder="Enter Your Address " class="form-control" value ="<?php echo $row['address']; ?>"/>

						
					</div>	
					<div class="form-group">
						<label class="text-white">Student Id </label>
						<input type="text" name="sid" placeholder="Enter Your Student Id" class="form-control" value ="<?php echo $row['sid'];  ?>"/>

					</div>	
					<div class="form-group">
						<label class="text-white">Mobile NO</label>
						<input type="text" name="mobile" placeholder="Enter Your Mobile NO" class="form-control" value ="<?php echo $row['mobile'];  ?>"/>

					</div>
					</div>
					<div class="col-md-5 col-sm-5 col-12 m-auto">
						<div class="form-group">
						<label class="text-white">Last Name</label>
						<input type="text" name="lname" placeholder="Enter Your Last Name" class="form-control" value ="<?php echo $row['lname'];  ?>"/>

					</div>

						<div class="form-group">
						<label class="text-white">Birth Date </label>
						<input type="date" name="birthhdate" placeholder="Enter Your Birth Date" class="form-control" value ="<?php echo $row['birthhdate'];  ?>"/>

					</div>
					<div class="form-group">
						<label class="text-white">Department </label>
						<input type="text" name="dept" placeholder="Enter Your Department" class="form-control" value ="<?php echo $row['dept'];  ?>" />

					</div>
					<div class="form-group">
						<label class="text-white">Gender</label>
						<input type="radio" name="gender" value="male" class="form-check-input ml-2" <?php if($row['gender']=='male') echo "checked"; ?>/>
						<label class="form-check-label text-white pl-4">Male</label>
						<input type="radio" name="gender" value="female" class="form-check-input ml-2" <?php if($row['gender']=='female') echo "checked"; ?>/>
						<label class="form-check-label text-white pl-4">Female</label>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupFileAddon01">Update</span>

						
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="photo">
							<label class="custom-file-label" for="inputGroupFile01">Choose  File</label>
							
                           
						</div>
                      
                        
                   <?php } } ?>

                
                      
                  
                    
                
                
					</div>
                      
					<input type="submit" name="update" value="add" class="btn btn-success px-5 mt-2">
                    
                    	
                   <?php
if(isset($_POST['update1'])){
  $edit_st_id=$_GET['edit_student'];
   $fname = mysqli_real_escape_string($conn,$_POST['fname']);
   $lname = mysqli_real_escape_string($conn,$_POST['lname']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $birthhdate = mysqli_real_escape_string($conn,$_POST['birthhdate']);
   $address = mysqli_real_escape_string($conn,$_POST['address']);
   $dept = mysqli_real_escape_string($conn,$_POST['dept']);
   $sid = mysqli_real_escape_string($conn,$_POST['sid']);
   $gender = mysqli_real_escape_string($conn,$_POST['gender']);
   $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
   $photo =$_FILES['photo']['name'];
   $photo_type = $_FILES['photo']['type'];
   $photo_size = $_FILES['photo']['size'];
   $photo_tmp=$_FILES['photo']['tmp_name'];

    if(!$photo_type == 'photo/jpeg' or !$photo_type == 'photo/png' ){
	  $match_error="Invalid Image Format";
      }
	else if ($photo_size <= 2000) {
		# code...
	$size_error="Image Size is too big";
	}
	else
	move_uploaded_file($photo_tmp,"studentphoto/$photo");

	$sql = "UPDATE  'student_details' SET 'fname'='$fname','lname'='$lname','email'='$email','birthhdate'='$birthhdate','address'='$address','dept'=
	'$dept','sid'='$sid','gender'='$gender','mobile'='$mobile','photo'='$photo' WHERE sid='$edit_st_id'";
	   $run=mysqli_query($conn,$sql);
		if($run){
			echo "<script>alert('Successfully Edit The Account!'); window.location='viewstudent.php'</script>";
		}
		else{
           echo "<script>window.location('viewstudent.php?update_error=not updated')</script>";
		}
	$conn->exec($sql);
}

?>
                     


					</div>
             
			</form>
		
		
	
			
			</div>
		</section>
	
		
	</div>
</div>

</body>
</html> 

