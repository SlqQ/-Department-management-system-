<link href="../assets/jquery-ui-1.8.7.custom.css" type=text/css rel=stylesheet>
<link href="../assets/css.css" type=text/css rel=stylesheet>
<script src="../js/jquery-1.4.4.min.js"></script>
<script src="../js/jquery-ui-1.8.7.custom.min.js"></script>
<script src="../js/email.min.js"> </script>
<?php 
include("conn.php");
// session_start();
$group_id=$_GET["group_id"];      
$user_id=$_SESSION["userid"];

 ?>
	<form action="mail_addressbook_add_groupmem_db.php" method="post" class="write_form" name='write_form' class="on" accept-charset="utf-8">
  <input type="hidden" name="group_id" value='<?php echo $group_id ?>'>
  <input id="emailaddr" name='write_receiver_name' type="hidden">
	<table class="email" style="position:relative;left:13px;width: 700px;">
        <tbody>
        <tr>
          <td width="45"><a ><span style="padding: 0px;font-weight: bold;font-size: 13px;font-family: Arial;">增加的成员:</span></a></td>
          <td>
            <div class="divtxt" id="divtxt"></div></td>
        </tr>
    </tbody>
   </table>	
		

    <input type="hidden" name='act'>

    <input type="submit" name="return" value="添加" id="send" onclick="document.forms['write_form'].act.value='add_groupmem';"/>
	</form>
<?php 
echo "<table width='16%' style='position: absolute;top: 33%;left: 15%;'>
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

$exist_mem=[];
array_push($exist_mem,$user_id);
$sql1="select job_number from group_member where group_id=".$group_id.";";
$rs1=mysqli_query($conn,$sql1);
while($rw=mysqli_fetch_array($rs1)){
  array_push($exist_mem,$rw[0]);
}

$sql2="select user_name,job_number from user;";
$rs2=mysqli_query($conn,$sql2);
echo "<div class='groupclose'><input class='groupcloselm_ico' type='button'>能够添加的联系人</div> ";
echo "<div class='groupSub' >";
while($row=mysqli_fetch_array($rs2)){;
    if(!in_array($row[1],$exist_mem)){
        echo "<div class='info' title=".$row[1]." >".$row[0]."</div>";
      }
  
      
  
}echo "</div></td>"; 
?>
</td>
</div>

</tbody>
</table>