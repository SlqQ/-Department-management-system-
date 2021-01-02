<?php 
header("Content-type:text/html; charset=utf-8");
include ("conn.php");
include("function.php");
session_start();
$user_id=$_SESSION["userid"];


if($_POST['act']=='delete'){
   $checkbox=$_POST["checkbox"];
	if(count($checkbox)==0){
		showAlert("$checkbox");
		die("<script>window.location.href=document.referrer; </script>");
	}
	for($i=0;$i<count($checkbox);$i++){
	$sql="update email set is_use_ad=0 where email_id='".$checkbox[$i]."'";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0){
		showAlert("删除成功");
		pageLocator("mail_receive.php");
		}
	else{
		showAlert("没有可删除的邮件");
		pageLocator("mail_receive.php");
	}
	}
}
	
else if($_POST['act']=="checked"){
	$checkbox=$_POST["checkbox"];
	if(count($checkbox)==0){
		showAlert("$checkbox");
		die("<script>window.location.href=document.referrer; </script>");
	}
for($i=0;$i<count($checkbox);$i++){
		
	$sql="update email set email_state=1 where email_id='".$checkbox[$i]."'";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0){
		showAlert("设为已读成功");
		pageLocator("mail_receive.php");
	}
	else{
		showAlert("已经全部设为已读了");
		pageLocator("mail_receive.php");
	}

	}

}
else if($_POST['act']=="alldelete"){
 	$sql="update email set is_use_ad=0 where email_addressee='".$user_id."'";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0){
		showAlert("全部删除成功");
		pageLocator("mail_receive.php");
	}
	else{
		showAlert("没有可删除的邮件了");
		pageLocator("mail_receive.php");
	}
	
}
else{
	$sql="update email set email_state=1 where email_addressee='".$user_id."'";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0){
		showAlert("全部标为已读成功");
		pageLocator("mail_receive.php");
	}
	else{
		showAlert("已经全部设为已读了");
		pageLocator("mail_receive.php");
	}
}
 ?>}
