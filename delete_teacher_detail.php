
<?php
include 'dbconnect.php';
session_start();

if(!$_SESSION['email']){
	$_SESSION['login_first']="Please login first";
	header('Location:index.php'); 

}
if(isset($_GET['delete_teacher'])){
	$delete = $_GET['delete_teacher'];
	$query="select * from teacher_details where sid = '$delete'";
	$rn =mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($rn)) {
    	$photo=$row['photo'];
    	# code...
    }
    unlink('studentphoto/'.$photo);
	$sql="delete from teacher_details where sid= '$delete'";
	$run =mysqli_query($conn,$sql);
	if($run){
		echo "<script>window.open('viewteacher.php?delete_msg=deleted','_self')</script>";
	}
}
?>