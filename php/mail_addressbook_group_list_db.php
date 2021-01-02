<?php 
include("conn.php");
include("function.php");
session_start();
if($_POST['act']=='delete_group'){
	$checkbox=$_POST["checkbox"];
	if(count($checkbox)==0){
		showAlert("没有选择群组");
		die("<script>window.location.href=document.referrer; </script>");
	}

	for($i=0;$i<count($checkbox);$i++){

	$sql="delete from emailgroup where group_id='".$checkbox[$i]."'";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0){
		pageLocator("mail_addressbook.php");
	}

	}
}
else if($_POST['act']=='send_group'){
	$checkbox=$_POST["checkbox"];
	if(count($checkbox)==0){
		showAlert("$checkbox");
		die("<script>window.location.href=document.referrer; </script>");
	}
	$str="";
	for($i=0;$i<count($checkbox);$i++){

	$str.=$checkbox[$i]." ";
    

	}
	if($str==''){
	showAlert("没有选择群组");
	die(pageLocator("mail_addressbook.php"));
}
	$_SESSION["groupArr"]=$str;
	echo $_SESSION["groupArr"];
	pageLocator("mail_addressbook_send_groupmem.php");

}
 ?>