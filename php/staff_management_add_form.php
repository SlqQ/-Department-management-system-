<!-- 新增人员表单 -->

	<form action="staff_management_add_form_db.php" method="post" accept-charset="utf-8" class="register_form" name = "register_form" id = "register_form">
		<div class = "registerValue">
			<div class = "registerInputForm">
				<div class = "register_lab">
					<label class="register_userIpt">
					<span>工号</span>
					<input type="text" id="userId" name="userId">
					</label>
					<div class="register_info" id = "info1"> * 输入工号</div>
				</div>

				<div class = "register_lab">
					<label class="register_userIpt">
					<span>用户名</span>
					<input type="text" id="userName" name="userName">
					</label>
					<div class="register_info" id = "info2"> * 输入用户名</div>
				</div>

				<!-- <div class = "register_lab">
					<label class="register_userIpt">
					<span>密码</span>
					<input type="password" id="userPassword" name="userPassword">
					</label>
					<div class="register_info" id = "info3"> * 输入字母开头的6-18位英文字符、下划线或数字</div>
				</div>

				<div class = "register_lab">
					<label class="register_userIpt">
					<span>确认密码</span>
					<input type="password" id="userPassword1" name="userPassword1">
					</label>
					<div class="register_info" id = "info9"> * 	请再次输入密码</div>
				</div> -->

				<div class = "register_lab">
					<label class="register_userIpt">
					<span>性别</span>
					<select name="userSex">
						<option value='0' selected = "true">女</option>";
						<option value='1'>男</option>";
					</select>
					</label>
					<div class="register_info" id = "info4"> * 选择性别</div>
				</div>

				<div class = "register_lab">
					<label class="register_userIpt">
					<span>电话</span>
					<input type="text" id="userPhpne" name="userPhpne">
					</label>
			   		<div class="register_info" id = "info5"></div>
				</div>

				<div class = "register_lab">
					<label class="register_userIpt">
					<span>住址</span>
					<input type="text" id="userAddress" name="userAddress">
					</label>
					<div class="register_info" id = "info6"></div>
				</div>

				<div class = "register_lab">
					
				<label class="register_userIpt">
					<span>入职时间</span>
					<input type="text" id="userWorkdate" name="userWorkdate">
					</label>
					<div class="register_info" id = "info7"> </div>
				</div>

				<div class = "register_lab">
					<label class="register_userIpt">
					<span>邮箱</span>
					<div class = "email_box">
					<input type="text" id="userEmail" name="userEmail">
					<span>  @163.com</span>
					</div>
					</label>
					<div class="register_info" id = "info8"></div>
				</div>
			</div>

			<label class="registerUserImg">
				<img src="../images/default.svg" alt="image" style="width: 250px;" id="userImage">
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


	