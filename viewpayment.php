
<?php
include 'dbconnect.php';
session_start();

if(!$_SESSION['email']){
	$_SESSION['login_first']="Please login first";
	header('Location:index.php'); 

}
if(isset($_POST['add'])){
   $fname = mysqli_real_escape_string($conn,$_POST['fname']);
   $lname = mysqli_real_escape_string($conn,$_POST['dept']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $birthhdate = mysqli_real_escape_string($conn,$_POST['section']);
   $address = mysqli_real_escape_string($conn,$_POST['sid']);
   $dept = mysqli_real_escape_string($conn,$_POST['due']);
   $sid = mysqli_real_escape_string($conn,$_POST['mobile']);
   $gender = mysqli_real_escape_string($conn,$_POST['paid']);
   $mobile = mysqli_real_escape_string($conn,$_POST['lname']);
   $photo = mysqli_real_escape_string($conn,$_POST['date']);
   


		$sql="insert into pay (fname,dept,email,section,sid,due,mobile,paid,lname,date)
		values ('$fname','$lname','$email','$birthhdate','$address','$dept','$sid ','$gender','$mobile','$photo')";
		$run=mysqli_query($conn,$sql);
		if($run){
			$success ="Data Submitted  Successfully";
		}
		else{
            $error="Unable To Submit Data ";
		}
	
}




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
         <span class="text-center text-success font-weight-bold"><?php echo @$size_error;echo @$match_error ?>
                </span>
			<h2 class="text-center text-danger pt-2 font-weight-bold">Student Information Management System</h2>
			<div class="container bg-danger" id="formsetting1">
			  <h3 class="text-center text-white pb-2 pt-2  font-weight-bold">Add Payment Detail</h3>

               <button class="btn btn-success font-weight-bold text-white px-5 mb-4 mt-2 ">
                   <a href="editpay.php">
			       View Payment Details</a>
			       </button>
			  
                <div>
				<form method="post" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-5 col-sm-4 col-12 m-auto">
					<div class="form-group">
						<label class="text-white">First Name</label>
						<input type="text" name="fname" placeholder="Enter  First Name" class="form-control"required="required">
						
					</div>
					<div class="form-group">
						<label class="text-white">Email </label>
						<input type="email" name="email" placeholder="Enter  Email" class="form-control" required="required">
						
					</div>
						
					<div class="form-group">
						<label class="text-white">Student Id </label>
						<input type="text" name="sid" placeholder="Enter  Student Id" class="form-control" required="required">
						
					</div>	
					<div class="form-group">
						<label class="text-white">Mobile NO</label>
						<input type="text" name="mobile" placeholder="Enter  Mobile NO" class="form-control" required="required">
						
					</div>
					<div class="form-group">
						<label class="text-white">Last Name</label>
						<input type="text" name="lname" placeholder="Enter  Last Name" class="form-control" required="required">
					</div>
					</div>
					<div class="col-md-5 col-sm-4 col-12 m-auto">
						
						<div class="form-group">
						<label class="text-white">Department </label>
						<input type="text" name="dept" placeholder="Enter Your Department" class="form-control" required="required">
						
					</div>
						
					
					<div class="form-group">
						<label class="text-white">Section</label>
						<input type="text" name="section" placeholder="Enter  Section" class="form-control" required="required">
						
					</div>
					<div class="form-group">
						<label class="text-white"> Due </label>
						<input type="text" name="due" placeholder="Enter Due" class="form-control" required="required">
						
					</div>
					<div class="form-group">
						<label class="text-white"> paid </label>
						<input type="text" name="paid" placeholder="Enter paid" class="form-control" required="required">
						
					</div>
					

					<div class="form-group">
						<label class="text-white">payment  Date </label>
						<input type="date" name="date" placeholder="Enter Date" class="form-control" required="required">
						
					</div>

                     

					</div>
					
					
                 
					
				    </div>

				
					<input type="submit" name="add" value="Add Detail" class="btn btn-success px-5 mb-4 mt-2 ">

                    
                    <span class="text-center text-danger font-weight-bold"><?php echo @$success;echo @$error ?>
                    	
                    </span>
                    
							
									


		
									
							
								


							

					
					
			</div>
			</div>
		</section>
	
		
	</div>
</div>
</body>
</html>
