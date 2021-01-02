<link href="../assets/jquery-ui-1.8.7.custom.css" type=text/css rel=stylesheet>
<link href="../assets/css.css" type=text/css rel=stylesheet>
<script src="../js/jquery-1.4.4.min.js"></script>
<script src="../js/jquery-ui-1.8.7.custom.min.js"></script>
<script src="../js/email.min.js"> </script>

	<form action="mail_write_nor_form_db.php" method="post" class="write_form" name='write_form' class="on" accept-charset="utf-8">
		<input id="emailaddr" name='write_receiver_name' type="hidden">
		<!-- <label class="write_lable"><span>收件人：</span><input type="text" class="rece" name="write_receiver_name"  placeholder ="点击右边联系人的名字  /  或者按照格式：xx(姓名),(英文逗号)xxx(工号)填写联系人,空格分隔" style="color:#555;width: 90%"></label> -->
	<table class="email" style="position:relative;left:13px;width: 700px;">
        <tbody>
        <tr>
          <td width="45"><a ><span style="padding: 0px;font-weight: bold;font-size: 13px;font-family: Arial;">收件人:</span></a></td>
          <td>
            <div class="divtxt" id="divtxt"></div></td>
        </tr>
    </tbody>
   </table>		
		<a href="" title="" class="clear"style="position: relative;top: -23px;left: 720px;">&nbsp;&nbsp;</a>
		<label class="write_lable"><span>主题：</span><input type="text" name="write_tit"  value=""></label>
		<label class="write_lable"><span>正文：</span></label><textarea name="write_content"></textarea>
    <div>
      <p id="filename"></p>
    </div>
    <input type="hidden" name="enclosure_link" id="filepath">
		<iframe src="upload.php" class="write_file"></iframe><br>
		<label>发件人：<?php 
    $user_id=$_SESSION["userid"];
		$sql1="select user_name from user where job_number='".$user_id."';";
  		$rs1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($rs1);

		echo $row1[0];
		mysqli_close($conn);
		?></label><br>
		

    <input type="hidden" name='act'>

    <input type="submit" name="return" value="发送" id="send" onclick="document.forms['write_form'].act.value='send';"/>
    <input type="submit" name="return" value="保存" id="send1" onclick="document.forms['write_form'].act.value='baocun';"/>
    <input type="submit" name="return" value="关闭" onclick="document.forms['write_form'].act.value='close';"/>
	</form>
<?php 
echo "<table width='16%' style='position: absolute;top: 26%;left: 80%;'>
 <tbody>
  <tr>

    <td vAlign='top' width='120'>
      <div class='lxr' id='lxr'>
      	<div class='tt'>联系人</div>
      </div>
  	</td>
  </tr>
  </tbody>
</table>
<div id='dialog' title='Dialog title'>
<table>
  <tbody>
  <tr>
    <td>联系人</td>
  </tr>
    <td>
      <div class='left' style='width: 80px;'>";
      
include("conn.php");
$user_id=$_SESSION["userid"];
$sql="select emailgroup.group_id,group_name,user_id,job_number from emailgroup,group_member where emailgroup.group_id=group_member.group_id and user_id=".$user_id.";";
$rs=mysqli_query($conn,$sql);
$groupid=[];
while($row=mysqli_fetch_array($rs))
{   $flag=0;
	foreach ($groupid as $value)
	    if($row[0]==$value){
	    	$flag=1;
	    	break;
	    }
  	if($flag==0){
  		array_push($groupid,$row[0]);
  		

  		$sql2="select emailgroup.group_id,group_name,user_id,job_number from emailgroup,group_member where emailgroup.group_id=group_member.group_id and user_id=".$user_id." and emailgroup.group_id=".$row[0].";";
  		$rs2=mysqli_query($conn,$sql2);
  		$count=mysqli_affected_rows($conn);
  		echo "<div class='groupclose'><input class='groupcloselm_ico' type='button'>$row[1]($count)</div> ";
  		echo "<div class='groupSub' >";
  		while($row2=mysqli_fetch_array($rs2)){
  			$sql1="select user_name,job_number from user where job_number='".$row2[3]."' and is_use=1;";
        	$rs1=mysqli_query($conn,$sql1);
        	$row1=mysqli_fetch_array($rs1);
       // echo  $row1[0];
  			echo "<div class='info' title=".$row1[1]." >".$row1[0]."</div>";
  		
  		}
     echo " </div>";

  	}
  	
}

$sql="select user_name,job_number from user;";
$rs=mysqli_query($conn,$sql);
$count=mysqli_affected_rows($conn);
$sql1="select user_name from user where job_number='".$user_id."'";
$rs1=mysqli_query($conn,$sql1);
$rw=mysqli_fetch_array($rs1);

echo "<div class='groupclose'><input class='groupcloselm_ico' type='button'>全部联系人($count)</div> ";
echo "<div class='groupSub' >";
while($row=mysqli_fetch_array($rs)){
   if($rw[0]!=$row[0])
   	echo "<div class='info' title=".$row[1]." >".$row[0]."</div>";
   else
   		echo "<div class='info' title=".$row[1]." >".$row[0]."</div>";

 }
   echo "</div></td>"; 

   
?>
</td>
</div>

</tbody>
</table>
<script>
  $("#send1").click(function(){
  $("#emailaddr").val($("#divtxt").text());
/**/});
</script>