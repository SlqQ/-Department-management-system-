<?php 
include("conn.php");
	$email_id=$_GET["email_id"];
	$sql="select email_name,email_txt,email_addressee,email_date from email where email_id='".$email_id."';";
	// echo $sql;
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	$email_name=$row["email_name"];
	$email_txt=$row["email_txt"];
	$email_addressee=$row["email_addressee"];
	$email_date=$row["email_date"];
    $sql="select user_name from user where job_number='".$email_addressee."';";
    $rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	$addresee_name=$row["user_name"];

	$sql1="select enclosure_link from email_enclosure where email_id='".$email_id."';";
	$rs=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($rs);
	if($row[0]!=''){
	$enclosure_link=$row[0];
	$enclosure_name_Arr=explode("/",$enclosure_link);
	$enclosure_name=$enclosure_name_Arr[count($enclosure_link)+1];
	$enclosure_etc=explode(".",$enclosure_name);
}
	echo "<div class='mail_container'>
			    <div class='mail_t'>
					<h1>".$email_name."</h1>
					<p>收件人：".$addresee_name."</p>
					<p>发件时间：".$email_date."</p>
			    </div>
				 <div class='mail_content'>
					<p>&nbsp;&nbsp;".$email_txt."</p>
			    </div>";
			     if($row[0]!='')
		
			   echo " <div>附件：
						<a href='http://localhost/dept_manage/upload/$enclosure_name' >$enclosure_name</a>
			   		</div>";

			   	
			 echo " <a href='mail_sent_view_delete.php?email_id=".$email_id."' class='oper_eml'>删除</a>
	     </div>";
    $rs=mysqli_query($conn,$sql);
 ?>
