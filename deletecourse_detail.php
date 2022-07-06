
<?php
include 'dbconnect.php';
session_start();

if(!$_SESSION['email']){
	$_SESSION['login_first']="Please login first";
	header('Location:index.php'); 

}
if(isset($_GET['delete_student'])){
	$delete = $_GET['delete_student'];
	$query="select * from course where sid = '$delete'";
	$rn =mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($rn)) {
    	$photo=$row['photo'];
    	
    }
    unlink('studentphoto/'.$photo);
    
	$sql="delete from course where sid= '$delete'";
	$run =mysqli_query($conn,$sql);
	if($run){
		echo "<script>window.open('updatecourse.php?delete_msg=deleted','_self')</script>";
	}
}
?>

