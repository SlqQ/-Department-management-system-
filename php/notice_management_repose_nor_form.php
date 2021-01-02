<link href="../assets/jquery-ui-1.8.7.custom.css" type=text/css rel=stylesheet>
<link href="../assets/css.css" type=text/css rel=stylesheet>
<script src="../js/jquery-1.4.4.min.js"></script>
<script src="../js/jquery-ui-1.8.7.custom.min.js"></script>
<script src="../js/email.min.js"> </script>

<?php 
include("conn.php");
$notice_id=$_GET["notice_id"];
$sql="select notice_name,notice_txt,notice_auther,notice_image from notice where notice_id='".$notice_id."';";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
 ?>
	<form action="notice_management_repose_nor_form_db.php" method="post" id="repose_form" name='repose_form' accept-charset="utf-8">

		<a href="" title="" class="clear"style="position: relative;top: -23px;left: 720px;">&nbsp;&nbsp;</a>
		<label class="repose_lable"><span>标题：</span><input type="text" name="write_tit"  value="<?php echo $row[0];  ?>"></label>
		<label class="repose_lable"><span>内容：</span></label><textarea name="write_content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[1]; ?></textarea>
    
	   <input type="hidden" name="notice_id" value="<?php echo  $notice_id?>">


     <lable class="notice_img">
      <!--  -->
      <img src="<?php echo $row[3];?>" alt="image" name="notice_image" id="notice_image">
      <iframe  frameborder="0" src="notice_upload_image.php"></iframe>
    </lable>

    <input type="hidden" name="enclosure_link" id="filepath">
    <iframe frameborder="0" src="notice_upload_file.php" class="write_file"></iframe><br>
    <div>
      <p id="filename"></p>
    </div>
    <br>
		<label>作者：
		<?php 
		$sql1="select user_name from user where job_number='".$row[2]."';";
  	$rs1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($rs1);

		echo $row1[0];
		mysqli_close($conn);
		?>
			
		</label><br>
		

    <input type="hidden" name='act'>

    <input type="submit" name="return" value="发布" id="send"  onclick="document.forms['repose_form'].act.value='send';"/>
    <input type="submit" name="return" value="取消编辑" onclick="document.forms['repose_form'].act.value='close';"/>

	</form>
</td>
</div>

</tbody>
</table>