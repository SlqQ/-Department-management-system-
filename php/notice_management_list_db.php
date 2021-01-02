<?php 
header("Content-type:text/html; charset=utf-8");
include ("conn.php");
include("function.php");
$user_id=$_SESSION["userid"];


if($_POST['act']=='delete'){
	$checkbox=$_POST["checkbox"];
	if(count($checkbox)==0){
		showAlert("$checkbox");
		die("<script>window.location.href=document.referrer; </script>");
	}
	for($i=0;$i<count($checkbox);$i++){

	$sql="update notice set notice_isuse=0 where notice_id='".$checkbox[$i]."'";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0){
		showAlert("删除成功");
		pageLocator("notice_management.php");
		}
	else{
		showAlert("没有可删除的公告");
		pageLocator("notice_management.php");
	}
	}
}
	
else{
 	$sql="update notice set notice_isuse=0";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0){
		showAlert("全部删除成功");
		pageLocator("notice_management.php");
	}
	else{
		showAlert("没有可删除的公告了");
		pageLocator("notice_management.php");
	}
	
}

 ?>}
