<link href="../assets/jquery-ui-1.8.7.custom.css" type=text/css rel=stylesheet>
<link href="../assets/css.css" type=text/css rel=stylesheet>
<script src="../js/jquery-1.4.4.min.js"></script>
<script src="../js/jquery-ui-1.8.7.custom.min.js"></script>
<script src="../js/email.min.js"> </script>

<?php 
include("conn.php");
$email_id=$_GET["email_id"];
$sql="select email_name,email_txt,email_addressee from email where email_id='".$email_id."';";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
 ?>
	<form action="mail_repose_nor_form_db.php" method="post" id="repose_form" name='repose_form' accept-charset="utf-8">
		<input id="emailaddr" name='repose_receiver_name' type="hidden">
		<!-- <label class="repose_lable"><span style="padding: 0px;font-weight: bold;font-size: 13px;font-family: Arial;">收件人：</span><input type="text" class ="rece" name="repose_receiver_name"  value="" style="width:90%;"></label> -->
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
		<label class="repose_lable"><span>主题：</span><input type="text" name="write_tit"  value="<?php echo $row[0];  ?>"></label>
		<label class="repose_lable"><span>正文：</span></label><textarea name="write_content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[1]; ?></textarea>
	   <input type="hidden" name="email_id" value="<?php echo  $email_id?>">
		<!-- <iframe src="upload.php" class="repose_file"></iframe> -->
     <label>

      <?php 
        $sql2="select enclosure_link from email_enclosure where email_id='".$email_id."';";
        $rs2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($rs2);
        if($row2[0]!=''){
          $enclosure_link=$row2[0];
          $enclosure_name_Arr=explode("/",$enclosure_link);
          $enclosure_name=$enclosure_name_Arr[count($enclosure_link)+1];
          echo "<input type=hidden name='enclosure_link' value=$enclosure_link>";
          echo $enclosure_name;
      }
      else{
        echo "<input type=hidden name='enclosure_link' value=''>";
      }

       ?>
    </label>
    <br>
		<label>发件人：
		<?php 
		$sql1="select user_name from user where job_number='".$row[2]."';";
  		$rs1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($rs1);

		echo $row1[0];
		mysqli_close($conn);
		?>
			
		</label><br>
		

    <input type="hidden" name='act'>

    <input type="submit" name="return" value="发送" id="send"  onclick="document.forms['repose_form'].act.value='send';"/>
    <input type="submit" name="return" value="保存" id="send1" onclick="document.forms['repose_form'].act.value='baocun';"/>
    <input type="submit" name="return" value="关闭" onclick="document.forms['repose_form'].act.value='close';"/>

	</form>
<?php 
echo "<table width='16%' style='position: absolute;top: 16%;left: 82%;'>
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
