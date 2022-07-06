
<?php
include 'dbconnect.php';
session_start();

if(!$_SESSION['email']){
	$_SESSION['login_first']="Please login first";
	header('Location:index.php'); 

}
if(isset($_GET['delete_student'])){
	$delete = $_GET['delete_student'];
	$query="select * from student_details where sid = '$delete'";
	$rn =mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($rn)) {
    	$photo=$row['photo'];
    	# code...
    }
    unlink('studentphoto/'.$photo);
	$sql="delete from student_details where sid= '$delete'";
	$run =mysqli_query($conn,$sql);
	if($run){
		echo "<script>window.open('viewstudent.php?delete_msg=deleted','_self')</script>";
	}
}
?>



 