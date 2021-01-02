<!-- 登录检测 -->

<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
session_start();
header("Content-type:text/html; charset=utf-8");

$userName=$_POST["userName"];
$userPwd=$_POST["userPwd"];
$userKind=$_POST["userKind"];

if(empty($userName)||empty($userPwd))
	die("用户名或密码不能为空！<a href='login.php'>返回</a>");
include("conn.php");

if($userKind==1) //管理员
  	$sql="select job_number,user_name,user_password from user where user_name='$userName' and is_use='1' and is_admin = '1';";
 else //普通用户
 	$sql="select job_number,user_name,user_password from user where user_name='$userName' and is_use='1' and is_admin = '0';";
//echo $sql;
 $rs=mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)>0){
	while($row=mysqli_fetch_array($rs)){
	 	if($row[2]==$userPwd){
	 		$_SESSION["userid"]=$row[0]; //id
	 		$_SESSION["userKind"]=$userKind;  //用户类型
	 		if($userKind==1)
	 			echo "<script> window.location.href='index.php?';</script>";
	 		else
	 			echo "<script> window.location.href='index.php?export=-1';</script>";
	 	}
	 	else
	 		die("密码错误<a href='login.php'>返回</a>");
	}
}
else
 	die("用户名未注册！<a href='login.php'>返回</a>");

mysqli_close($conn);

	?>