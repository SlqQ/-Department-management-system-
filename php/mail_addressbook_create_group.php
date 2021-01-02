<?php
include("conn.php");
session_start();
$user_id=$_SESSION["userid"];
$group_name=$_POST["group_name"];
if($group_name==''){
	echo "2";
	die();
}
$assmem=explode(",",$_POST["assmem"]);
if($_POST["assmem"]==''){
	echo "3";
	die();
}
$sql="insert into emailgroup(group_name,user_id) values('$group_name','$user_id')";
$rs=mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)!=0){
	$group_id=mysqli_insert_id($conn);
}
foreach ($assmem as $value){
	$sql="insert into group_member(group_id,job_number) values('$group_id','$value')";
	$rs=mysqli_query($conn,$sql);
}
if(mysqli_affected_rows($conn)!=0){
	echo "1";
}
 ?>