<?php

include 'dbconnect.php';
session_start();

if(!$_SESSION['email']){
	$_SESSION['login_first']="Please login first";
	header('Location:index.php'); 

}
?>




<!DOCTYPE html>
<html>
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
				<h3 class="text-center text-white pb-2 pt-2  font-weight-bold">View Teacher Detail</h3>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<table class="table table-bordered text-white table-responsive">
							<thead>
								<tr>
									<th>Serial No</th>
									<th>First name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Birth Date</th>
									<th>Address </th>
									<th>Department</th>
									<th>Teacher Id</th>
									<th>Gender</th>
									<th>Mobile</th>
									<th>Photo</th>
									<th>action</th>
								</tr>
							</thead>
							<?php
                            $sql="select * from teacher_details";
                            $run=mysqli_query($conn,$sql);
                            $i=1;
                            while ($row = mysqli_fetch_assoc($run)) {
                            	# code...
                            

							?>
							<tbody>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row['fname']; ?></td>
									<td><?php echo $row['lname']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['birthhdate']; ?></td>
									<td><?php echo $row['address']; ?></td>
									<td><?php echo $row['dept']; ?></td>
									<td><?php echo $row['sid']; ?></td>
									<td><?php echo $row['gender']; ?></td>
									<td><?php echo $row['mobile']; ?></td>
									<td>
										<a href="studentphoto/<?php echo $row['photo'];?>">
											<img src="studentphoto/<?php echo $row['photo'];?>" width="50" height="50">
										</a>
									</td>
									<td>
                                     	<a href="finalupdateteacher.php?edit_teacher=<?php echo $row['sid'];?>">Edit</a>
                                     	<a href="delete_teacher_detail.php?delete_teacher=<?php echo $row['sid'];?>">delete</a>
                                     
                                     </td>
									
								</tr>


							</tbody>
                             <?php } ?>
						</table>
						


					</div>
					
			</div>
			</div>
		</section>
	
		
	</div>
</div>
</body>
</html>