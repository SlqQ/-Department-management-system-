<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
include ("conn.php");
include("function.php");
$notice_id=$_GET["notice_id"];
$user_id=$_SESSION["userid"];
$sql="update notice set notice_isuse='0' where notice_id='".$notice_id."';";
$rs=mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)>0){
		showAlert("删除成功");
		pageLocator("notice_management.php");
	 }
?>