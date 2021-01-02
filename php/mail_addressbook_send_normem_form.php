<?php 
$user_id=$_SESSION["userid"];
include("conn.php");
include("function.php");
$groupArr=explode(" ",$_SESSION["jobNumArr"]);

$str="";
foreach($groupArr as $value){
$sql="select user_name from user where job_number='$value'";

$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if(mysqli_affected_rows($conn)!=0)
	$str.=($row[0].",".$value." ");
}

 ?>
  <style>
.tab1{margin:0;padding:0;list-style:none;width:200px;overflow:hidden;}
.tab1 li{float:left;width:80px;height:30px;background:#ccc;color:#000;border:1px solid #eee; border-radius:8px 0 8px 0px;text-align:center;line-height:30px;cursor:pointer; padding: 2px;}
.on{display:block;}
.tab1 li.cur{background:#aaa;}
</style>
 <ul class="tab1">
<li class="cur">普通邮件</li>
</ul>
	<form action="mail_addressbook_send_normem_form_db.php" method="post" class="write_form" name='write_form' class="on" accept-charset="utf-8">
		<label class="write_lable"><span>收件人：</span><input type="text" class="rece" name="write_receiver_name" readonly="readonly"  value='<?php echo $str?>' style="color:#555;width: 90%"></label>
		<label class="write_lable"><span>主题：</span><input type="text" name="write_tit"  value=""></label>
		<label class="write_lable"><span>正文：</span></label><textarea name="write_content"></textarea>
		 <div>
      		<p id="filename"></p>
        </div>
        <input type="hidden" name="enclosure_link" id="filepath">
		<iframe src="upload.php" class="write_file"></iframe><br>
		<label>发件人：<?php 
		$sql1="select user_name from user where job_number='".$user_id."';";
  		$rs1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($rs1);

		echo $row1[0];
		mysqli_close($conn);
		?></label><br>
		

    <input type="hidden" name='act'>

    <input type="submit" name="return" value="发送" onclick="document.forms['write_form'].act.value='send';"/>
    <input type="submit" name="return" value="保存" onclick="document.forms['write_form'].act.value='baocun';"/>
    <input type="submit" name="return" value="关闭" onclick="document.forms['write_form'].act.value='close';"/>

	</form>
	
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
