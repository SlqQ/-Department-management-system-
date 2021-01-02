<?php 
	include("conn.php");
	mysqli_set_charset($conn,"utf8");
    $job_number=$_GET["job_number"];
	mysqli_set_charset($conn,"utf8");
	$sql="select * from user where job_number='".$job_number."';";

	$rs=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0)
		$row=mysqli_fetch_array($rs);
	else{
		die("<h2>用户id丢失<a href='index.php'></a></h2>");
	}
 ?>

<form action="staff_management_update_view_db.php" method="post" accept-charset="utf-8" class="personal_information_form" name = "personal_information_form" id = "register_form">	
	<div class = "view_lab registerValue ">
		<div class = "registerInputForm">
			<div class = "register_lab">
				<label class="view_userIpt">
					<span class="view_t">工号</span>
					<input class="view_value" type="text" id="userId" name="userId" placeholder="" value="<?php echo $row['job_number']?>">
				</label>
				<div class="_info" id = "info1"> * 工号不可修改</div>
			</div>

			<div class = "register_lab">
				<label class="view_userIpt">
					<span class="view_t">姓名</span>
					<input class="view_value" type="text" id="userName"  name="userName" placeholder="" value="<?php echo $row['user_name']?>">
				</label>
				<div class="_info" id = "info2"></div>	
			</div>

			<div class = "register_lab">
					<label class="view_userIpt">
					<span class="view_t">性别</span>
					<select name="userSex">
						<?php 
						   if($row["user_sex"]=="1"){
						   		echo"<option value='0'>女</option>";
								echo"<option value='1' selected = 'true'>男</option>";
						   }
						   	else{
						   		echo"<option value='0' selected = 'true'>女</option>";
								echo"<option value='1'>男</option>";
						   	}
						 ?>
					</select>
					
				</label>
			</div>

			<div class = "register_lab">
				<label class="view_userIpt">
					<span class="view_t">电话</span>
					<input class="view_value" type="text" id="userPhpne"  name="userPhpne" placeholder="请输入电话号码" value="<?php echo $row['user_phone']?>">
				</label>
				<div class="_info" id = "info5"></div>	
			</div>

			<div class = "register_lab">
				<label class="view_userIpt">
					<span class="view_t">邮箱</span>
					<div class = "email_box">
						<input class="view_value" type="text" id="userEmail"  name="userEmail" placeholder="请输入邮箱" value="<?php echo $row['user_emailbox']?>">
					<span> @163.com</span>
					</div>
				</label>
				<div class="_info" id = "info8"></div>
			</div>

			<div class = "register_lab">
				<label class="view_userIpt">
					<span class="view_t">住址</span>
					<input class="view_value" type="text" id="userAddress" name="userAddress" placeholder="请输入地址" value="<?php echo $row['user_address']?>">
				</label>
				<div class="_info" id = "info6"></div>	
			</div>

			<div class = "register_lab">
				<label class="view_userIpt">
					<span class="view_t">入职时间</span>
					<input class="view_value" type="text"  id="userWorkdate" name="user_workdate" placeholder="请输入入职时间" value="<?php echo $row['user_workdate']?>">
				</label>
				<div class="_info" id = "info7"> </div>
			</div>
			
		</div>
	
		<label class="personal_img registerUserImg">
			<?php 
				if($row['user_image']=="")
				$row['user_image']="../images/default.svg";
			?>
			<img src="<?php echo $row['user_image'];?>" alt="image" id="userImage" class = "_image">
			<iframe frameborder="0" src="user_upload.php"></iframe>
		</label>

	</div>

	<div class = "Button">
		<label >
			<input class = "button registerBtn" type="button" name="" id = "button"value="确定">
		</label>
		<label class = "cancelButton"><a class="button cancelBtn" href="login.php" id="">取消</a>
	</div>

</form>