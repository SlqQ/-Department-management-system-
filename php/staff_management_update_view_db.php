<!-- 新增校验 -->

<?php 
	header("Content-type:text/html; charset=utf-8");
	include("function.php");
	session_start();
	$userId=$_POST["userId"];
	$userName=$_POST["userName"];
	// $userPassword=$_POST["userPassword"];
	// $userPassword1=$_POST["userPassword1"];
	$userSex=$_POST["userSex"];
	$userPhpne=$_POST["userPhpne"];
	$userAddress=$_POST["userAddress"];
	$userWorkdate=$_POST["user_workdate"];
	$userEmail=$_POST["userEmail"];
	//$userImage=$_POST["userImage"];
	// $isUse=1;

	include("conn.php");

	if(isset($_SESSION["userimage"]))
	{
		$image=$_SESSION["userimage"];
		$sql="update user set user_image = '".$image."' where job_number = '".$userId."'";
		$rs=mysqli_query($conn,$sql);
	}

	if(isset($_POST["userId"])||isset($_POST["userName"])||isset($_POST["userSex"])||isset($_POST["userPhpne"])||isset($_POST["userAddress"])||isset($_POST["user_workdate"])||isset($_POST["userEmail"]))
	{
		$sql="update user set  user_name = '".$userName."' , user_sex = '".$userSex."' , user_phone = '".$userPhpne."',user_address = '".$userAddress."' , user_workdate = '".$userWorkdate."' , user_emailbox = '".$userEmail."' where job_number =  '".$userId."'";

		//echo $sql;
		$rs=mysqli_query($conn,$sql);
	}

	
	if(mysqli_affected_rows($conn)>=0){
		showAlert("更新成功");
		unset($_SESSION["userimage"]);
		pageLocator("staff_management_view.php?job_number=$userId");
	}


 ?>
