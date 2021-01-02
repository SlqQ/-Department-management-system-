//提示信息
var arrInfos = [
	" * 输入工号",
	" * 输入用户名",
	" * 输入6-18位英文字符、下划线或数字",
	" * 如 2019-05-24",
];

//错误信息
var arrErrorInfos=[
	" * 请输入工号",
	" * 该工号不存在",
	" * 请输入用户名",
	" * 请输入密码",
	" * 密码长度应为 6~18 个字符",
	" * 密码需由字母、数字或下划线组成且字母开头",
	" * 密码不一致",
	"电话应为11位数字",
	"邮箱需由字母、数字或下划线组成"];

//导入对象
var register_form=document.getElementById("register_form");
//input框
var objUserId=document.getElementById("userId");
var objUserName=document.getElementById("userName");
var objUserPassword=document.getElementById("userPassword");
var objUserPassword1=document.getElementById("userPassword1");
var objUserSex=document.getElementById("userSex");
var objUserPhpne=document.getElementById("userPhpne");
var objUserAddress=document.getElementById("userAddress");
var objUserWorkdate=document.getElementById("userWorkdate");
var objUserEmail=document.getElementById("userEmail");

//info框
var objInfo1=document.getElementById("info1");
var objInfo2=document.getElementById("info2");
var objInfo3=document.getElementById("info3");
var objInfo4=document.getElementById("info4");
var objInfo5=document.getElementById("info5");
var objInfo6=document.getElementById("info6");
var objInfo7=document.getElementById("info7");
var objInfo8=document.getElementById("info8");
var objInfo9=document.getElementById("info9");

//按钮
var btnClk=document.getElementById("button");

//functions
//判断工号
function isCorrectId(s){
	if(s.length==0)
		return 0;
	return 1;
	// --------------------------------------
}

//判断用户名
function isCorrectName(s){
	if(s.length==0)
		return 0;
	else
		return 1;
}

//判断密码规范
function isCorrectPwd(s){
	var pwd=/^[a-zA-Z]{1}[\w,\-]*$/;
	count = s.length;
	if(count==0)
		return 0;
	else if(count<6||count>18) 
		return 1;
	else if(!pwd.test(s)) 
		return 2;
	else return 3;
}

//判断第二次密码是否正确
function isCorrectPwd1(s){
	var pwd1=objUserPassword.value;
	if(s.length==0)
		return 0;
	else if(s != pwd1) 
		return 1;
	else  
		return 2;
}

//判断手机号规范
function isCorrectPhnum(s){
	var sPh = /^[0-9]*$/
	var phone=s.length;
	// console.log(s);
	if((phone!=11||!sPh.test(s))&&phone!='') 
		return 0;
	else 
		return 1;
}

//判断邮件地址规范
function isCorrectEml(s){
	//------------6~18 个字符，可使用字母、数字、下划线，需以字母开头
	var email=/^[a-zA-Z]{1}[\w,\-]*$/;
	if(!email.test(s)&&s!='') 
		return 0;
	else 
		return 1;
}

// 工号是否符合规范提示
objUserId.onblur=function(){
	// console.log(isCorrectId(objUserId.value));
	
	var sId=objUserId.value;
	//没有输入
	if(isCorrectId(sId)==0){
		objInfo1.style.color = "red";
		objInfo1.innerHTML=arrErrorInfos[0];
		// objUserId.focus();
		// objUserId.select();
	}
	else
		objInfo1.innerHTML="";
}

//用户名是否符合规范提示
objUserName.onblur=function(){
	// console.log(isCorrectName(objUserName.value));
	
	var sName=objUserName.value;
	//没有输入
	if(isCorrectName(sName)==0){
		objInfo2.style.color = "red";
		objInfo2.innerHTML=arrErrorInfos[2];
		// objUserName.focus();
		// objUserName.select();
	}
	else
		objInfo2.innerHTML="";
}

//密码是否符合规范提示
objUserPassword.onblur=function(){
	// console.log(isCorrectPwd(objUserPassword.value));
	
	var sPwd=objUserPassword.value;
	//没有输入
	if(isCorrectPwd(sPwd)==0){
		objInfo3.style.color = "red";
		objInfo3.innerHTML=arrErrorInfos[3];
		// objUserPassword.focus();
		// objUserPassword.select();
	}
	//长度错
	else if(isCorrectPwd(sPwd)==1){
		objInfo3.style.color = "red";
		objInfo3.innerHTML=arrErrorInfos[4];
		// objUserPassword.focus();
		// objUserPassword.select();
	}
	//字符错
	else if(isCorrectPwd(sPwd)==2){
		objInfo3.style.color = "red";
		objInfo3.innerHTML=arrErrorInfos[5];
		// objUserPassword.focus();
		// objUserPassword.select();
	}	
	else
		objInfo3.innerHTML="";
}

//再次确认密码提示
objUserPassword1.onblur=function(){
	// console.log(isCorrectPwd1(objUserPassword1.value));
	
	var sPwd1=objUserPassword1.value;
	//没有输入
	if(isCorrectPwd1(sPwd1)==0){
		objInfo9.style.color = "red";
		objInfo9.innerHTML=arrErrorInfos[3];
		// objUserPassword1.focus();
		// objUserPassword1.select();
	}
	//不一致
	else if(isCorrectPwd1(sPwd1)==1){
		objInfo9.style.color = "red";
		objInfo9.innerHTML=arrErrorInfos[6];
		// objUserPassword1.focus();
		// objUserPassword1.select();
	}	
	else
		objInfo9.innerHTML="";
}


//手机号码是否符合规范提示
objUserPhpne.onblur=function(){
	// console.log(isCorrectPhnum(objUserPhpne.value));
	
	sPhone = objUserPhpne.value;
	//长度错
	if(isCorrectPhnum(sPhone)==0){
		objInfo5.style.color = "red";
		objInfo5.innerHTML=arrErrorInfos[7];
		// objUserPhpne.focus();
		// objUserPhpne.select();
	}
	else
		objInfo5.innerHTML="";
}

//邮件地址是否符合规范提示
objUserEmail.onblur=function(){
	// console.log(isCorrectEml(objUserEmail.value));
	var sEmail=objUserEmail.value;
	//字符错
	if(isCorrectEml(sEmail)==0){
		objInfo8.style.color = "red";
		objInfo8.innerHTML=arrErrorInfos[8];
		// objUserEmail.focus();
		// objUserEmail.select();
	}
	else
		objInfo8.innerHTML="";
}

function onLoginJudge(){
	// event.preventDefault();
	//表单有误
	

	if(isCorrectId(objUserId.value)!=1
		||isCorrectName(objUserName.value)!=1
		||isCorrectPwd(objUserPassword.value)!=3
		||isCorrectPwd1(objUserPassword1.value)!=2
		||isCorrectPhnum(objUserPhpne.value)!=1
		||isCorrectEml(objUserEmail.value)!=1)
    {
		alert("表单项有误");
	}
	else{
		register_form.submit();
	}
}

btnClk.onclick=onLoginJudge;
