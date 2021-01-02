<?php 

include ("conn.php");
include("function.php");
session_start();
$user_id=$_SESSION["userid"];
$write_content=addslashes($_POST["write_content"]);
$write_tit=addslashes($_POST["write_tit"]);
$enclosure_link=addslashes($_POST["enclosure_link"]);

if($_POST['act']=='send'){

	if($write_content==''||$write_tit==''){
	showAlert("没有填写正文或者内容");
	die("<script>window.location.href=document.referrer; </script>");
}
	date_default_timezone_set('PRC');
	$today=date("Y-m-d H:i:s");
	$names=$_POST["write_receiver_name"]; 
	$name_arrayR=explode(" ",$names);

	$name_array=[];
	foreach ($name_arrayR as $value){
		if(!in_array($value,$name_array))
			array_push($name_array, $value);
	}
$name_array1=[];	
for($i=0;$i<count($name_array);$i++){
	$sql="select group_id from emailgroup where user_id='".$user_id."' and group_name='".$name_array[$i]."'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);

	array_push($name_array1, $row[0]);
}


foreach ($name_array1 as $value){
	
	$sql="select job_number from group_member where  group_id='".$value."'";
	$rs1=mysqli_query($conn,$sql);
	while($row1=mysqli_fetch_array($rs1)){

	$user_emailbox=$row1[0];

	$sql1="insert into email(email_sender,email_addressee,email_date,email_name,email_txt,email_state,email_type,is_use_ad,is_use_se) values (";
	$sql1.="'".$user_id."','".$user_emailbox."','".$today."','".$write_tit."','".$write_content."','0','1','1','1')";
	$rs=mysqli_query($conn,$sql1);

	$email_id=mysqli_insert_id($conn);
	$sql1="insert into email_enclosure(enclosure_link,email_id) values (";
	$sql1.="'$enclosure_link','$email_id')";
	$rs=mysqli_query($conn,$sql1);
	}
	if(mysqli_affected_rows($conn)>0){
		showAlert("发送成功~");
		pageLocator("mail_addressbook.php");
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
	$names=$_POST["write_receiver_name"]; 
	$name_arrayR=explode(" ",$names);

	$name_array=[];
	foreach ($name_arrayR as $value){
		if(!in_array($value,$name_array))
			array_push($name_array, $value);
	}
$name_array1=[];	
for($i=0;$i<count($name_array);$i++){
	$sql="select group_id from emailgroup where user_id='".$user_id."' and group_name='".$name_array[$i]."'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);

	array_push($name_array1, $row[0]);
}


foreach ($name_array1 as $value){
	
	$sql="select job_number from group_member where  group_id='".$value."'";
	$rs1=mysqli_query($conn,$sql);
	while($row1=mysqli_fetch_array($rs1)){

	$user_emailbox=$row1[0];

	$sql1="insert into email(email_sender,email_addressee,email_date,email_name,email_txt,email_state,email_type,is_use_ad,is_use_se) values (";
	$sql1.="'".$user_id."','".$user_emailbox."','".$today."','".$write_tit."','".$write_content."','0','0','1','1')";
	$rs=mysqli_query($conn,$sql1);

	$email_id=mysqli_insert_id($conn);
	$sql1="insert into email_enclosure(enclosure_link,email_id) values (";
	$sql1.="'$enclosure_link','$email_id')";
	$rs=mysqli_query($conn,$sql1);
	}
	if(mysqli_affected_rows($conn)>0){
		showAlert("保存成功~");
		pageLocator("mail_addressbook.php");
	 }
  }
}
else {
 
	pageLocator("mail_addressbook.php");
}

unset($_SESSION["groupArr"]);
 ?>