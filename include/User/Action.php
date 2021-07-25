<?php

	include_once('../../config/conect.php');
    
?>
<?php
if(isset($_POST["action"])){
    if($_POST["action"]=="adduser"){
        $mssv = $_POST['mssv'];
        $name = $_POST['username'];
	 	$phone = $_POST['phone'];
	 	$email = $_POST['email'];
	 	$password = md5($_POST['pass']);
	 	$address = $_POST['address'];
        $type = $_POST['isAdmin'];
 		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_user(MSSV,Name,Phone,Address,Email,Passwork,Type) values ('$mssv','$name','$phone','$address','$email','$password',$type)");
 		
    }
	elseif($_POST["action"]=="edituser"){
        $mssv = $_POST['mssv'];
		$id = $_POST['id'];
        $name = $_POST['username'];
	 	$phone = $_POST['phone'];
	 	$email = $_POST['email'];
	 	$address = $_POST['address'];
        $type = $_POST['isAdmin'];
		$sql_update = mysqli_query($con,"UPDATE tbl_user SET Name='$name', MSSV='$mssv'  , Phone='$phone' , Email='$email',Address='$address', Type=$type  WHERE ID='$id'");
 		
    }
	elseif($_POST["action"]=="removeuser"){
		$id = $_POST['id'];
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_user WHERE ID='$id' ");
 		echo 'hii';
    }
	elseif($_POST["action"]=="resetpassuser"){
		$id = $_POST['id'];
        $password = md5($_POST['pass']);
		$sql_update = mysqli_query($con,"UPDATE tbl_user SET Passwork='$password' WHERE ID='$id'");
 		echo $id;
    }
}

?>