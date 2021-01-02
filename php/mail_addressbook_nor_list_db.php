<?php 

include("conn.php");
include("function.php");
session_start();

 if($_POST['act']=='send_nor'){
	$checkbox=$_POST["checkbox1"];
	if(count($checkbox)==0){
		showAlert("$checkbox");
		die("<script>window.location.href=document.referrer; </script>");
	}
	$str="";
	for($i=0;$i<count($checkbox);$i++){

	$str.=$checkbox[$i]." ";
    

	}
	if($str==''){
	showAlert("没有选择联系人");
	die(pageLocator("mail_addressbook.php"));
  }
	$_SESSION["jobNumArr"]=$str;
	echo $_SESSION["jobNumArr"];
	// if(mysqli_affected_rows($conn)>0){
	pageLocator("mail_addressbook_send_normem.php");
	// }
}

 ?>