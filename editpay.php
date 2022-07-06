<?php
include 'dbconnect.php';
session_start();

if(!$_SESSION['email']){
	$_SESSION['login_first']="Please login first";
	header('Location:index.php'); 

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
         
			<h2 class="text-center text-danger pt-2 font-weight-bold">Student Information Management System</h2>
			<div class="container bg-danger" id="formsetting1">
			  <h3 class="text-center text-white pb-2 pt-2  font-weight-bold"> Payment Detail</h3>

               
               
					
                    
                   
							
									


		<section id="main-form">
			<h2 class="text-center text-danger pt-2 font-weight-bold">Student Information Management System</h2>
			<div class="container bg-danger" id="formsetting1">
				<h3 class="text-center text-white pb-2 pt-2  font-weight-bold">View Student Detail</h3>
				<div class="row">
					<div class="col-md-13 col-sm-12 col-12">
						<table class="table table-bordered text-white table-responsive">
							<thead>
								<tr>
									<th>Serial No</th>
									<th>First name</th>
									<th>Department</th>
									<th>Email</th>
									<th>Section</th>
									<th>Student Id </th>
									<th>Due</th>
									<th>Mobile NO</th>
									<th>paid</th>
									<th>Last Name</th>
									<th>payment Date</th>
									<th>action</th>
									
								</tr>
							</thead>
							<?php
                            $sql="select * from pay";
                            $run=mysqli_query($conn,$sql);
                            $i=1;
                            while ($row = mysqli_fetch_assoc($run)) {
                            	# code...
                            

							?>
							<tbody>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row['fname']; ?></td>
									<td><?php echo $row['dept']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['section']; ?></td>
									<td><?php echo $row['sid']; ?></td>
									<td><?php echo $row['due']; ?></td>
									<td><?php echo $row['mobile']; ?></td>
									<td><?php echo $row['paid']; ?></td>
									<td><?php echo $row['lname']; ?></td>
									<td><?php echo $row['date']; ?></td>
								
										
							
										
                                     <td>
                                     	<a href="updatedstudent.php">Edit</a>
                                     	<a href="deletepay.php?delete_student=<?php echo $row['sid'];?>">delete</a>
                                     	<a href="searchpay.php?search_record=<?php echo $row['sid'];?>">search</a>
                                     
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
