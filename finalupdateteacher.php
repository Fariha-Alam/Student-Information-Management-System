
<?php

include 'dbconnect.php';
session_start();

if(!$_SESSION['email']){
  $_SESSION['login_first']="Please login first";
  header('Location:index.php'); 

}
if(isset($_POST['update']))
{
    
   
   
   
   
   // get values form input text and number
   
   
   $fname = mysqli_real_escape_string($conn,$_POST['fname']);
   $lname = mysqli_real_escape_string($conn,$_POST['lname']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $birthhdate = mysqli_real_escape_string($conn,$_POST['birthhdate']);
   $address = mysqli_real_escape_string($conn,$_POST['address']);
   $dept = mysqli_real_escape_string($conn,$_POST['dept']);
   $id  = mysqli_real_escape_string($conn,$_POST['sid']);
   
   $gender= mysqli_real_escape_string($conn,$_POST['gender']);
   $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
   
           
   // mysql query to Update data
    $query = "update  teacher_details set fname='$fname',lname='$lname',email= '$email',  birthhdate='$birthhdate',address='$address', dept='$dept', gender=
    '$gender',mobile='$mobile' where  sid = $id";
   $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($conn);
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
         <span class="text-center text-success font-weight-bold">
                </span>
      <h2 class="text-center text-danger pt-2 font-weight-bold">Student Information Management System</h2>
      <div class="container bg-danger" id="formsetting1">
        <h3 class="text-center text-white pb-2 pt-2  font-weight-bold">  update teacher  Details</h3>

               <button class="btn btn-success font-weight-bold text-white px-5 mb-4 mt-2 ">
                   <a href="viewteacher.php">
             view updated Details</a>
             </button>
        
                <div>

        <form action= "<?php $_PHP_SELF ?>" method="POST">

            
            <div class="col-md-5 col-sm-4 col-12 m-auto">
             
            New First Name:<input type="text" name="fname"  id = "fname"  class="form-control" required><br>
         
             
             lname :<input type="text" name="lname"  id = "lname" class="form-control" required>

            New email:<input type="email" name="email" id = "email" class="form-control" required>

            birthhdate: <input type="date" name="birthhdate" id = "birthhdate" class="form-control" required><br>

            address:<input type="text" name="address" id = "address"  class="form-control" required><br>
          </div>
            <div class="col-md-5 col-sm-4 col-12 m-auto">
            New dept:<input type="text" name="dept"  id = "dept" class="form-control" required><br>

            id:<input type="text" name="sid" id = "sid" class="form-control" required><br>


             gender:<label class="text-white"></label>
             <input type="radio" name="gender" value="male"  id = "gender" class="form-check-input ml-2" />
             <label class="form-check-label text-white pl-4">Male</label>
             <input type="radio" name="gender" value="Female"  id = "gender" class="form-check-input ml-2" />
             <label class="form-check-label text-white pl-4">Female</label>
                <br>      
            New mobile:<input type="text" name="mobile" id = "mobile" class="form-control" required><br>

            
           </div>
           

          

            

            <input type="submit" name="update"  id = "update" value="Update Data" class="btn btn-success px-5 mt-2 mb-4">
            
        </form>
  </div>
  </div>
    </body>


</html>