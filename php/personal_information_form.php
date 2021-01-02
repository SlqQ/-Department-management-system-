<!-- 个人信息查看表单 -->

<?php 

    include("conn.php");

	mysqli_set_charset($conn,"utf8");
	$sql="select * from user where job_number ='".$_SESSION["userid"]."'";
	$rs=mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)>0)
		$row=mysqli_fetch_array($rs);
	else{
		die("<h2>用户id丢失<a href='index.php'></a></h2>");
	}
	
	//echo $row["user_sex"];
 ?>
 <form action="personal_information_update_db.php" method="post" accept-charset="utf-8" class="personal_information" name = "personal_information_form" id = "personal_information_form">
	<label class="personal_img">
		<?php 
			if($row['user_image']=="")
			$row['user_image']="../images/default.svg";
		?>
		<div class = "information_img">
			<img src="<?php echo $row['user_image'];?>" alt="image" id="userImage">
			<!-- <img class = "editImg" id = "editImg4" src="../images/edit.png"> -->
		</div>
		
		<iframe frameborder="0" src="user_upload.php" id = "information_iframe"></iframe>
		<div class = "imageBtn">
			<button class = "button" type="button" name="" id = "button4">确定</button>
			<a href="personal_information.php" class = "cancel" id = "cancel4">取消</a>
		</div>
		
	</label>

	<div class = "view_lab">	
		<label class="view_userIpt">
			<span class="view_t">姓名</span>
			<span class="view_value"><?php echo $row['user_name']?></span>
			<!-- <input class = "updateInf" type="" name="updateInf"> -->
		</label>

		<label class="view_userIpt">
			<span class="view_t">工号</span>
			<span class="view_value"><?php echo $row['job_number']?></span>
			<!-- <input class = "updateInf" type="" name=""> -->
		</label>

		<label class="view_userIpt">
			<span class="view_t">性别</span>
				<?php 
				   	if($row["user_sex"]=="1")
				   		echo "男";
				   	else
				   		echo "女";
				   
				?>
		</label>

		<label class="view_userIpt">
			<span class="view_t" id = "view_phone">电话</span>
			<?php if($row['user_phone']=='')
					$row['user_phone']="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			?>
			<span class="view_value" id = "view_phValue"><?php echo $row['user_phone']?></span>
			<input class = "updateInf" type="" name="updatePh" id = "view_phIpt">
			<img class = "editImg" id = "editImg1" src="../images/edit.png">
			<button class = "button updateBtn" type="button" name="" id = "button1">确定</button>
			<a href="personal_information.php" class = "cancel cancelBtn" id = "cancel1">取消</a>
		</label>

		<label class="view_userIpt">
			<span class="view_t" id = "view_email">邮箱</span>
			<?php if($row['user_emailbox']=='')
					$row['user_emailbox']="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				?>
			<span class="view_value" id = "view_emValue"><?php echo $row['user_emailbox']?> @163.com</span>
			<input class = "updateInf"  id = "view_emIpt" type="" name="updateEm">
			<img class = "editImg" id = "editImg2" src="../images/edit.png">
			<button class = "button updateBtn" type="button" name="" id = "button2">确定</button>
			<a href="personal_information.php" class = "cancel cancelBtn" id = "cancel2">取消</a>
		</label>

		<label class="view_userIpt">
			<span class="view_t" id = "view_address">住址</span>
			<?php if($row['user_address']=='')
					$row['user_address']="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				?>
			<span class="view_value" id = "view_addValue"><?php echo $row['user_address']?></span>
			<input class = "updateInf" id = "view_addIpt" type="" name="updateAdd">
			<img class = "editImg" id = "editImg3" src="../images/edit.png">
			<button class = "button updateBtn" type="button" name="" id = "button3">确定</button>
			<!-- <label >
				<input class = "button updateBtn" type="button" name="" id = "button3"value="确定">
			</label> -->
			<a href="personal_information.php" class = "cancel cancelBtn" id = "cancel3">取消</a>
		</label>

		<label class="view_userIpt">
			<span class="view_t">入职时间</span>
			<span class="view_value"><?php echo $row['user_workdate']?></span>
			<!-- <input class = "updateInf" type="" name=""> -->
		</label>
		
	</div>
</form>



