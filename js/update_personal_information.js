// var view_phone=document.getElementById("view_phone");
// var view_email=document.getElementById("view_email");
// var view_address=document.getElementById("view_address");

var view_phValue=document.getElementById("view_phValue");
var view_emValue=document.getElementById("view_emValue");
var view_addValue=document.getElementById("view_addValue");

var view_phIpt=document.getElementById("view_phIpt");
var view_emIpt=document.getElementById("view_emIpt");
var view_addIpt=document.getElementById("view_addIpt");
// var information_iframe=document.getElementById("information_iframe");

var editImg1=document.getElementById("editImg1");
var editImg2=document.getElementById("editImg2");
var editImg3=document.getElementById("editImg3");
// var uploadbotton=document.getElementById("uploadbotton");

var button1=document.getElementById("button1");
var button2=document.getElementById("button2");
var button3=document.getElementById("button3");
var button4=document.getElementById("button4");

var cancel1=document.getElementById("cancel1");
var cancel2=document.getElementById("cancel2");
var cancel3=document.getElementById("cancel3");
var cancel4=document.getElementById("cancel4");

// var personal_information=document.getElementById("personal_information");

function updatePhone()
{
	view_phValue.style.display="none";
	view_phIpt.style.display="inline";
	editImg1.style.display="none";
	button1.style.display="inline";
	cancel1.style.display="inline";
}

function updateEmail()
{
	view_emValue.style.display="none";
	view_emIpt.style.display="inline";
	editImg2.style.display="none";
	button2.style.display="inline";
	cancel2.style.display="inline";
}

function updateAddress()
{
	view_addValue.style.display="none";
	view_addIpt.style.display="inline";
	editImg3.style.display="none";
	button3.style.display="inline";
	cancel3.style.display="inline";
}

function updateInfor()
{
	personal_information_form.submit();
	
}

// function updateImg()
// {
// 	// personal_information.style.display="none";
// 	editImg4.style.display="none";
// 	button4.style.display="inline";
// 	cancel4.style.display="inline";
// }

editImg1.onclick=updatePhone;
editImg2.onclick=updateEmail;
editImg3.onclick=updateAddress;
// uploadbotton.onclick=updateImg;

button1.onclick=updateInfor;
button2.onclick=updateInfor;
button3.onclick=updateInfor;
button4.onclick=updateInfor;