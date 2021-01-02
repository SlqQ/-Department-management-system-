<?php 
	include("function.php");

	session_start();
	
	$userPhpne=$_POST["updatePh"];
	$userAddress=$_POST["updateAdd"];
	$userEmail=$_POST["updateEm"];

	include("conn.php");

	if(isset($_SESSION["userimage"]))
	{
		$image=$_SESSION["userimage"];
		$sql="update user set user_image = '".$image."' where job_number = '".$_SESSION["userid"]."' ";
		$rs=mysqli_query($conn,$sql);
	}
	// echo $sql;


	if(isset($_POST["updatePh"])&&!empty($_POST["updatePh"])){
		$sql="update user set user_phone = '".$userPhpne."' where job_number = '".$_SESSION["userid"]."' ";
		$rs=mysqli_query($conn,$sql);
	}
	//echo $sql;
	

	if(isset($_POST["updateAdd"])&&!empty($_POST["updateAdd"])){
		$sql="update user set user_address = '".$userAddress."' where job_number = '".$_SESSION["userid"]."' ";
		$rs=mysqli_query($conn,$sql);
	}

	if(isset($_POST["updateEm"])&&!empty($_POST["updateEm"])){
		$sql="update user set user_emailbox = '".$userEmail."' where job_number = '".$_SESSION["userid"]."' ";
		$rs=mysqli_query($conn,$sql);
	}
	// echo $sql;

	if(mysqli_affected_rows($conn)>=0){
		showAlert("更新成功");
		unset($_SESSION["userimage"]);
		pageLocator("personal_information.php");
	}
 ?>