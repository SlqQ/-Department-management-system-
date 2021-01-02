<link href="../assets/jquery-ui-1.8.7.custom.css" type=text/css rel=stylesheet>
<link href="../assets/css.css" type=text/css rel=stylesheet>
<script src="../js/jquery-1.4.4.min.js"></script>

<script src="../js/jquery-ui-1.8.7.custom.min.js"></script>

<script src="../js/email.min.js"> </script>

	<form action="mail_write_group_form_db.php" method="post" class="write_form" name='write1_form' accept-charset="utf-8" >
		<input id="emailaddr" type="hidden" name='write_groureceiver_name'> 
	<table class="email" style="position:relative;left:13px;width: 700px;">
        <tbody>
        <tr>
          <td width="45"><a ><span style="padding: 0px;font-weight: bold;font-size: 13px;font-family: Arial;">收件组:</span></a></td>
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
        include("conn.php");
		$sql1="select user_name from user where job_number='".$user_id."';";
  		$rs1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($rs1);

		echo $row1[0];
		mysqli_close($conn);
		?></label><br>
		

    <input type="hidden" name='act'>

    <input type="submit" name="return" id=send value="发送" onclick="document.forms['write1_form'].act.value='send';"/>
    <input type="submit" name="return" id=send1 value="保存" onclick="document.forms['write1_form'].act.value='baocun';"/>
    <input type="submit" name="return" value="关闭" onclick="document.forms['write1_form'].act.value='close';"/>

	</form>

<?php 
echo "<table width='16%' style='position: absolute;top: 26%;left: 80%;'>
 <tbody>
  <tr>

    <td vAlign='top' width='120'>
      <div class='lxr' id='lxr'>
      	<div class='tt'>联系组</div>
      </div>
  	</td>
  </tr>
  </tbody>
</table>
<div id='dialog' title='Dialog title'>
<table>
  <tbody>
  <tr>
    <td>联系组</td>
  </tr>
    <td>
      <div class='left' style='width: 80px;'>";
      
include("conn.php");
$user_id=$_SESSION["userid"];
$sql="select group_id,group_name from emailgroup where  user_id='".$user_id."';";
$rs=mysqli_query($conn,$sql);
$count=mysqli_affected_rows($conn)+1;
echo "<div class='groupclose'><input class='groupcloselm_ico' type='button'>分组($count)</div> ";
  		echo "<div class='groupSub' >";
while($row=mysqli_fetch_array($rs))
{   
  		echo "<div class='info' title=".$row[0]." >".$row[1]."</div>";
  		
}
echo "<div class='info' title='-1' >全部联系人</div>";
echo " </div>";
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


