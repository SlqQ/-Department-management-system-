<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
session_start();
include ("conn.php");
include("function.php");
$user_id=$_SESSION["userid"];
$notice_id=$_POST["notice_id"];
$notice_txt=$_POST["write_content"];
$notice_name=$_POST["write_tit"];
$notice_image=$_SESSION["notice_image"];
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

	$sql="update notice set ";
	$sql.="notice_name='".$notice_name."',notice_auther='".$user_id."',notice_date='".$today."',";
	$sql.="notice_txt='".$notice_txt."',notice_isuse='1', notice_image='".$notice_image."'where notice_id='".$notice_id."' ;";
	// echo $sql;
	$rs=mysqli_query($conn,$sql);


	$sql1="update notice_enclosure set enclosure_link='".$enclosure_link."',notice_id='".$notice_id."';";
echo $sql1;
	$rs1=mysqli_query($conn,$sql1);

	if(mysqli_affected_rows($conn)>=0){
		 unset($_SESSION["noticeimage"]);
		showAlert("发布成功~");
		pageLocator("notice_management.php");
	}
}	

//关闭
else {
	pageLocator("notice_management.php");
}
 ?>