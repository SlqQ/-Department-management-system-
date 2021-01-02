<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
include ("conn.php");
include("function.php");
session_start();
$user_id=$_SESSION["userid"];
$write_content=addslashes($_POST["write_content"]);
$write_tit=addslashes($_POST["write_tit"]);
if($_POST["enclosure_link"]=='')
  $enclosure_link='';
else
  $enclosure_link=addslashes($_POST["enclosure_link"]);

if($_POST['act']=='send'){

	if($write_content==''||$write_tit==''){
		showAlert("没有填写正文或者内容");
		die("<script>window.location.href=document.referrer; </script>");
	}
	date_default_timezone_set('PRC');
	$today=date("Y-m-d H:i:s");
	$names=$_POST["repose_receiver_name"]; 
	$names=str_replace("<",",",$names);
	$names=str_replace(">;"," ",$names);
	$name_arrayR=explode(" ",$names);
    
	$name_array=[];
	foreach ($name_arrayR as $value){
		if(!in_array($value,$name_array))
			array_push($name_array, $value);
	}
	$name_array1=[];
	$name_array2=[];
	foreach ($name_array as $value){
	$email_arrayR=explode(",",$value);
	$flag=0;
	foreach ($email_arrayR as $value1){
		if($flag==1){
	     array_push($name_array1,$value1);
	     $flag=0;

		}
	 else{
	 	array_push($name_array2,$value1);
	 	$flag=1;
	 }
  }
}

if(count($name_array1)==0||count($name_array2)==0){
	showAlert("请按照格式：姓名<工号>; 填写联系人");
	echo "<script> window.history.go(-1);</script>";  
}
for($i=0;$i<count($name_array1);$i++){
	$sql="select user_name from user where job_number='".$name_array1[$i]."'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	if($name_array2[$i]!=$row[0]){
		showAlert("".$name_array2[$i]."与".$name_array1[$i]."不匹配");
		die("<script>window.location.href=document.referrer; </script>");

	}
}


foreach ($name_array1 as $value){
	
	$sql="select job_number from user where job_number='".$value."'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	if(mysqli_affected_rows($conn)<0){
		showAlert($value."没有在通讯录中");
	}

	$user_emailbox=$row["job_number"];

	$sql1="insert into email(email_sender,email_addressee,email_date,email_name,email_txt,email_state,email_type,is_use_ad,is_use_se) values (";
	$sql1.="'".$user_id."','".$user_emailbox."','".$today."','".$write_tit."','".$write_content."','0','1','1','1')";
	$rs=mysqli_query($conn,$sql1);

	$email_id=mysqli_insert_id($conn);
	$sql1="insert into email_enclosure(enclosure_link,email_id) values (";
	$sql1.="'$enclosure_link','$email_id')";
	$rs=mysqli_query($conn,$sql1);


	if(mysqli_affected_rows($conn)>0){
		showAlert("发送成功~");
		pageLocator("mail_receive.php");
	 }
	}
}	
else if($_POST['act']=="baocun"){
	if($write_content==''||$write_tit==''){
		showAlert("没有填写正文或者内容");
		die("<script>window.location.href=document.referrer; </script>");
	}
	date_default_timezone_set('PRC');
	$today=date("Y-m-d H:i:s");
	$names=$_POST["repose_receiver_name"]; 
	$names=str_replace("<",",",$names);
	$names=str_replace(">;"," ",$names);
	$name_arrayR=explode(" ",$names);
    
	$name_array=[];
	foreach ($name_arrayR as $value){
		if(!in_array($value,$name_array))
			array_push($name_array, $value);
	}
	$name_array1=[];
	$name_array2=[];
	foreach ($name_array as $value){
	$email_arrayR=explode(",",$value);
	$flag=0;
	foreach ($email_arrayR as $value1){
		if($flag==1){
	     array_push($name_array1,$value1);
	     $flag=0;

		}
	 else{
	 	array_push($name_array2,$value1);
	 	$flag=1;
	 }
  }
}

if(count($name_array1)==0||count($name_array2)==0){
	showAlert("请按照格式：姓名<工号>; 填写联系人");
	echo "<script> window.history.go(-1);</script>";  
}
for($i=0;$i<count($name_array1);$i++){
	$sql="select user_name from user where job_number='".$name_array1[$i]."'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	if($name_array2[$i]!=$row[0]){
		showAlert("".$name_array2[$i]."与".$name_array1[$i]."不匹配");
		die("<script>window.location.href=document.referrer; </script>");

	}
}


foreach ($name_array1 as $value){
	
	$sql="select job_number from user where job_number='".$value."'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	if(mysqli_affected_rows($conn)<0){
		showAlert($value."没有在通讯录中");
	}

	$user_emailbox=$row["job_number"];

	$sql1="insert into email(email_sender,email_addressee,email_date,email_name,email_txt,email_state,email_type,is_use_ad,is_use_se) values (";
	$sql1.="'".$user_id."','".$user_emailbox."','".$today."','".$write_tit."','".$write_content."','0','0','1','1')";
	$rs=mysqli_query($conn,$sql1);

	$email_id=mysqli_insert_id($conn);
	$sql1="insert into email_enclosure(enclosure_link,email_id) values (";
	$sql1.="'$enclosure_link','$email_id')";
	$rs=mysqli_query($conn,$sql1);

	if(mysqli_affected_rows($conn)>0){
		showAlert("已经成功保存到草稿箱啦~");
		pageLocator("mail_receive.php");
	 }
	}
	
}
else {
 
	echo "<script> window.history.go(-2);</script>";
}
 ?>