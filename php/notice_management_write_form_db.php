<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
session_start();
include ("conn.php");
include("function.php");
$user_id=$_SESSION["userid"];
$notice_txt=$_POST["write_content"];
$notice_name=$_POST["write_tit"];
$notice_image=$_SESSION["noticeimage"];
$enclosure_link=addslashes($_POST["enclosure_link"]);

//发送
if($_POST['act']=='send'){
	if($notice_name==''||$notice_txt==''){
		showAlert("没有填写标题或者内容");
		die("<script>window.location.href=document.referrer; </script>");
	}
	//日期
	date_default_timezone_set('PRC');
	$today=date("Y-m-d H:i:s");

	$sql1="insert into notice(notice_name,notice_auther,notice_date,notice_txt,notice_isuse,notice_image) values (";
	$sql1.="'".$notice_name."','".$user_id."','".$today."','".$notice_txt."','1','".$notice_image."')";
	$rs=mysqli_query($conn,$sql1);

	$notice_id=mysqli_insert_id($conn);

	$sql1="insert into notice_enclosure(enclosure_link,notice_id) values (";
	$sql1.="'$enclosure_link','$notice_id')";
	$rs=mysqli_query($conn,$sql1);

	if(mysqli_affected_rows($conn)>0){
		showAlert("发送成功~");
		pageLocator("notice_management.php");
	}
}	

//关闭
else {
	pageLocator("notice_management.php");
}
 ?>