<link href="../assets/jquery-ui-1.8.7.custom.css" type=text/css rel=stylesheet>
<link href="../assets/css.css" type=text/css rel=stylesheet>
<script src="../js/jquery-1.4.4.min.js"></script>
<script src="../js/jquery-ui-1.8.7.custom.min.js"></script>
<script src="../js/email.min.js"> </script>


	<form action="notice_management_write_form_db.php" method="post" class="notice_management_write_form" name='notice_management_write_form' class="on" accept-charset="utf-8">

<div class='notice_management_write_form_c'>
		<label class="write_lable"><span>标题：</span><input type="text" name="write_tit"  value=""></label>
		<label class="write_lable"><span>内容：</span></label><textarea name="write_content"></textarea>

</div>
    <!-- 附件 -->
  <label class="notice_img">
      <img src="#" alt="image" name="noticeImage" id="noticeImage">
      <iframe frameborder="0" src="uploadImage.php"></iframe>
    </label>

    <input type="hidden" name="enclosure_link" id="filepath">
		<iframe frameborder="0" src="upload.php" class="write_file"></iframe><br>
    <div>
      <p id="filename"></p>
    </div>
		<label>作者：<?php 
    $user_id=$_SESSION["userid"];
		$sql1="select user_name from user where job_number='".$user_id."';";
  	$rs1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($rs1);

		echo $row1[0];
		mysqli_close($conn);
		?></label><br>
		

    <input type="hidden" name='act'>

    <input type="submit" name="return" value="发送" id="send" onclick="document.forms['notice_management_write_form'].act.value='send';"/>
    <input type="submit" name="return" value="关闭" onclick="document.forms['notice_management_write_form'].act.value='close';"/>
	</form>
<?php 
  	 
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