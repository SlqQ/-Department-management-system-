<?php 
include("conn.php");
include("function.php");
$group_id=$_POST["group_id"]; 
if($_POST['act']=='add_groupmem'){
	$names=$_POST["write_receiver_name"]; 
	$names=str_replace("<",",",$names);
	$names=str_replace(">;"," ",$names);
	$name_arrayR=explode(" ",$names);
    
    if($_POST["write_receiver_name"]==''){
    	showAlert("没有添加成员！");
		die("<script>window.location.href=document.referrer; </script>");
    }


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
if(count($name_array1)==0){
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

	$sql1="insert into group_member(group_id,job_number) values (";
	$sql1.="'".$group_id."','".$user_emailbox."')";
	$rs=mysqli_query($conn,$sql1);
	if(mysqli_affected_rows($conn)>0){
		showAlert("添加成功~");
		pageLocator("mail_addressbook.php");
	 }
	
}


}

 ?>