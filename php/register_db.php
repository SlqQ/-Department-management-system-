<!-- 新增校验 -->

<?php 
	header("Content-type:text/html; charset=utf-8");
	include("function.php");
	session_start();
	$userId=$_POST["userId"];
	$userName=$_POST["userName"];
	$userPassword=$_POST["userPassword"];
	$userPassword1=$_POST["userPassword1"];
	$userSex=$_POST["userSex"];
	$userPhpne=$_POST["userPhpne"];
	$userAddress=$_POST["userAddress"];
	$userWorkdate=$_POST["userWorkdate"];
	$userEmail=$_POST["userEmail"];
	//$userImage=$_POST["userImage"];
	$isUse=1;

	include("conn.php");

	$flag1 = 0;
	$flag2 = 1;
 	$sql1="select job_number from enterprise_staff";
 	$rs1=mysqli_query($conn,$sql1);
 	while($row1=mysqli_fetch_array($rs1)){
  		if($row1[0] == $userId)
  		{
  			$flag1 = 1;
  			break;
  		}
  	}
  	if($flag1 == 0){
		showAlert("该工号不存在");
		pageLocator("register.php");
  	}

  	$sql2="select job_number from user";
 	$rs2=mysqli_query($conn,$sql2);
 	while($row2=mysqli_fetch_array($rs2)){
  		if($row2[0] == $userId)
  		{
  			$flag2 = 0;
  			break;
  		}
  	}
  	if($flag2 == 0){
  		showAlert("该工号已注册");
		pageLocator("register.php");
  	}

	if(isset($_SESSION["userimage"]))
	{
		$image=$_SESSION["userimage"];
	}
	else{
		$image="../images/default.svg";
	}

	// 添加到数据库
	$sql="insert into user(job_number,user_name,user_password,user_sex,user_phone,user_address,user_workdate,user_emailbox,user_image,is_use) values(";
	$sql.="'".$userId."','".$userName."','".$userPassword."',";
	$sql.="'".$userSex."','".$userPhpne."','".$userAddress."','".$userWorkdate."','".$userEmail."','";
	$sql.="".$image."','".$isUse."');";
	
	echo $sql;
	$rs=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>=0){
		showAlert("插入成功");
		unset($_SESSION["userimage"]);
		pageLocator("login.php");
	}


 ?>
