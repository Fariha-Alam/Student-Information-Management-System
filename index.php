<?php
session_start();
include 'dbconnect.php';
$email_err=$pwd_err=$success=$error='';
if(isset($_POST['submit'])){
   $fname =$_POST['fname'];
   $fid =$_POST['fid'];
   $email =$_POST['email'];
   $password =$_POST['password'];
   $cpassword =$_POST['cpassword'];
   $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
 
 $query="select * from register2 where email = '$email'";
 $run=mysqli_query($conn,$query);
 $row=mysqli_num_rows($run);
 if($row>0){
 	$email_err="Email is already  exists.Please try another";
 }
 else if($password !==$cpassword) {
 	$pwd_err="wrong password";
 }
 else{
 	$sql="insert into register2 (fname,fid,email,password,cpassword) values ('$fname',
 	'$fid','$email','$pass','$cpass')";
 	$run = mysqli_query($conn,$sql);
 	if($run){
 		$success ="Registered successfully";
 	}
 	else{
 		$error="Try again";
 	}
 }
}

?>
<!DOCTYPE html>
<html>
<head>
	  <title>Student Information Management System</title> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<script >
	function content1(){
		document.getElementById("div1").style.display="block";
		document.getElementById("div2").style.display="none";
	}
function content2(){
		document.getElementById("div1").style.display="none";
		document.getElementById("div2").style.display="block";
	}

</script>
</head>
<body>

<section class="">
    <h2 class="text-center text-warning font-weight-bold"> <?php echo @$_SESSION['login_first']; ?></h2>
	<div class="container bg-success" id="formsetting">
		
			
		<h2 class="text-center text-danger pt-5 py-3 font-weight-bold">Student Information Management System</h2>
        

		<h3 class ="text-white text-center pt-3 pb-4 ">Admin Login | Register Panel</h3>
		<div class="row">
			<div class="col-md-7 col-sm-7 col-12">
				
           

			<!--here-->	
			</div>
			<div  class="col-md-5 col-sm-5 col-12">

				<button class="btn btn-primary px-4" onclick="content1()">Register</button>
				<button class="btn btn-primary px-4" onclick="content2()">Login</button>

                
				<div id="div1" style="display: block;" class="mt-4">

				<form  method="post" action="">
                 
					<div class="form-group">

						<label class="text-white">Full Name</label>
						<input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">
						
					</div>
				    <form method="post" action="">

					<div class="form-group">
						<label class="text-white">Id</label>
						<input type="text" name="fid" placeholder="Enter your id" class="form-control"required="required">
						
					</div>
					<div class="form-group">
						<label class="text-white">Email</label>
						<span class="float-right text-danger font-weight-bold"><?php echo $email_err;?></span>

						<input type="email" name="email" placeholder="Enter your email" class="form-control"required="required">
					</div>
					<div class="form-group">
						<label class="text-white">Password</label>
						<input type="text" name="password" placeholder="Enter your password" class="form-control"required="required">
					</div>
					<div class="form-group">
						<label class="text-white">Confirm password</label>
						<span class="float-right text-danger font-weight-bold"><?php echo $pwd_err;?></span>
						<input type="text" name="cpassword" placeholder="Re-enter your password" class="form-control"required="required">
					</div>	
					<input type="submit" name="submit" value="Register" class="btn btn-danger px-4 mb-3">
					<span class="float-right text-danger font-weight-bold"><?php echo $success;
					echo $error;?></span>
				</form>
                </div>
                
                	
                 <div id="div2" style="display: none;" class="mt-4">

                	
                <form method="post" action="">

					<div class="form-group pb-3 ">
						<label class="text-white ">Id</label>
						<input type="text" name="fid" placeholder="Enter your id" class="form-control ">
					</div>
					<div class="form-group">
						<label class="text-white">Email</label>
						<input type="email" name="email" placeholder="Enter your email" class="form-control">
					</div>
					<div class="form-group">
						<label class="text-white">Password</label>
						<input type="text" name="password" placeholder="Enter your password" class="form-control">
					</div>
                   
					<input type="submit" name="submit1" value="Login" class="btn btn-danger  px-4">
						<h6 class="text-center font-weight-bold text-success"><?php echo @$_GET['error'] ?></h6>
									
                </div>
				
			</div>
                   

		</div>
        
	</div>

</section>	
</body>
</html>
<?php
if(isset($_POST['submit1'])){
     $id_no = $_SESSION['fid']= $_POST['fid'];
	 $email =$_SESSION['email']=$_POST['email'];
	 $pwd =$_POST['password'];
	 $sql="select * from register2 where fid='$id_no' and email ='$email'" ;
	

	 $run=mysqli_query($conn,$sql) or die (mysqli_error($conn));
	 
	 $row=mysqli_fetch_assoc($run);
	 
	 $pwd_fetch=$row['password'];
	
	 $pwd_decode=password_verify($pwd,$pwd_fetch );
	 
	 if($pwd_decode){
	 	echo "<script>window.open('main.php?success=Loggedin successfully','_self')</script>";
	 }
	 else{
	 	echo "<script>window.open('index.php?error=Email or password incorrect','_self')</script>";
	 } 
    
      
}
?>