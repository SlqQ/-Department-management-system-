<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
include ("conn.php");
include("function.php");
$email_id=$_GET["email_id"];
$user_id=$_SESSION["userid"];
$sql="update email set email_type='1' where email_id='".$email_id."';";
$rs=mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)>0){
		showAlert("发送成功");
		pageLocator("mail_draft.php");
	 }
?>