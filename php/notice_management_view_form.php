<?php 
include("conn.php");
	$notice_id=$_GET["notice_id"];
	$sql="select notice_name,notice_auther,notice_txt,notice_image,notice_date from notice where notice_id='".$notice_id."';";

	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	$notice_name=$row["notice_name"];
	$notice_auther=$row["notice_auther"];
	$notice_txt=$row["notice_txt"];
	$notice_image=$row["notice_image"];
	$notice_date=$row["notice_date"];

	$sql2="select user_name from user where job_number='".$notice_auther."';";
  	$rs2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($rs2);

	$sql0="select  from notice where notice_id='".$notice_id."';";
	$rs1=mysqli_query($conn,$sql);
	$row1=mysqli_fetch_array($rs1);

	$sql="select notice_image from notice where notice_id='".$notice_id."';";
	$rs1=mysqli_query($conn,$sql);
	$row1=mysqli_fetch_array($rs1);

	$sql1="select enclosure_link from notice_enclosure where notice_id='".$notice_id."';";
	$rs=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($rs);


	if($row[0]!=''){
	$enclosure_link=$row[0];
	$enclosure_name_Arr=explode("/",$enclosure_link);
	$enclosure_name=$enclosure_name_Arr[count($enclosure_link)+1];
	$enclosure_etc=explode(".",$enclosure_name);

}

if($row1[0]!=''){
	echo "<div class='notice_container'>
			    <div class='notice_t'>
					<h1 style=' text-align: center'>".$notice_name."</h1>
			    </div>
					<div class='notice_state'>
						<div class='notice_auther'>
							<p>来源：".$row2[0]."</p>
						</div>

						<div class='notice_date'>	
							<p>发布时间：".$notice_date."</p>
						</div>
					</div>

				 <div class='notice_content'>
				 	<div class='notice_view_img'>
						<image src='../upload/$notice_image' ></a>
			   		</div>
					<p>&nbsp;&nbsp;".$notice_txt."</p>
			    </div>";

			    if($row[0]!=''){
			   		echo " <div>附件：
						<a href='../upload/$enclosure_name' >$enclosure_name</a>
			   			</div>";
			   	}

			   	//编辑
			   	echo" <a href='notice_management_repose_nor.php?notice_id=".$notice_id."' class='oper_eml'>编辑</a>
			    
			    <a href='notice_management_view_delete.php?notice_id=".$notice_id."' class='oper_eml'>删除</a>
	     </div>";
			   }
			   else{
			   	echo "<div class='notice_container'>
			    <div class='notice_t'>
					<h1 style=' text-align: center'>".$notice_name."</h1>
			    </div>
					<div class='notice_state'>
						<div class='notice_auther'>
							<p>来源：".$notice_auther."</p>
						</div>
						<div class='notice_date'>	
							<p>发布时间：".$notice_date."</p>
						</div>
					</div>

				 <div class='notice_content'>
				 	
					<p>&nbsp;&nbsp;".$notice_txt."</p>
			    </div>";

			    if($row[0]!=''){
			   		echo " <div>附件：
						<a href='../upload/$enclosure_name' >$enclosure_name</a>
			   			</div>";
			   	}
			   	echo" <a href='notice_management_repose_nor.php?notice_id=".$notice_id."' class='oper_eml'>编辑</a>
			    
			    <a href='notice_management_view_delete.php?notice_id=".$notice_id."' class='oper_eml'>删除</a>
	     </div>";
			   }
 ?>
