<form action="mail_receive_list_db.php" method="post" id="view_form" name='view_form' accept-charset="utf-8">
<table class="table table-bordered table-striped">

    <thead>
    <tr>
        <th style="width: 30px;"><input type="checkbox" name="checkall" /></th>
        <th style="width: 60px;"><img src='../images/mail_draft.PNG' alt='' style='width: 30px;height: 25px;'></th>
        <th style="width: 160px;">收件人</th>
        <th style="width: 660px;">主题</th>
        <th>时间</th>
    </tr>
    </thead>
    <tbody>
	  <?php  
	     include("conn.php");
      $user_id=$_SESSION["userid"];
   		 $sql="select email_id,email_state,email_sender,email_name,email_date from email where email_sender='".$user_id."' and email_type=0 and is_use_ad=1 order by email_date desc";
        $pageSize = 9; 
        $pageNum = 4;

        
        $sql1 = "select * from email where email_sender='".$user_id."'  and email_type=0 and is_use_ad=1"; 


        $rs1 = mysqli_query($conn, $sql1); 
        $allNum = mysqli_num_rows($rs1); 
        $endPage = ceil($allNum/$pageSize); 
        $pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"]; 
        $count = ceil(mysqli_affected_rows($conn)/$pageSize);
        // echo $count;
       $sql="select email_id,email_state,email_addressee,email_name,email_date from email where email_sender='".$user_id."' and email_type=0 and is_use_ad=1 order by email_date desc limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize; //
      
  		$rs=mysqli_query($conn,$sql);
  		if(mysqli_affected_rows($conn)==0){
  			echo "<tr>";
  			echo "<td colspan='5' style=' text-align: center'>暂无邮件</td>";
  			echo "</tr>";
  		}
  		while($row=mysqli_fetch_array($rs)){
  			echo "<tr>";
  			echo "<td><input type='checkbox' name='checkbox[]' value='$row[0]' /></td>";
  			echo "<td><a href='mail_view.php?email_id=$row[0]' title=''><img src='../images/mail_draft.PNG' alt='' style='width: 30px;height: 25px;'></a></td>";
  			  	

		  $sql1="select user_name from user where job_number='".$row[2]."'";
			$rs1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_array($rs1);
			echo "<td>$row1[0]</td>";
  			   
  			for($i=3;$i<5;$i++){
  				if($i!=3){
  				echo "<td>";
  				echo $row[$i];
  				echo "</td>";
  			   }

  			   else{
  			   	echo "<td><a href='mail_draft_view.php?email_id=$row[0]' title=''>$row[$i]</a></td>";
  			   }
  			}
  			echo "</tr>";
  		}

  	   mysqli_close($conn);
	
    ?>  

  </tbody>
</table> 

 <div id='mail_receivepagination' class="pagination">   
      <?php
         if($pageNum==1){
           echo "<span class='current'> 首页 </span>";
           echo "<span  class='current''> 上一页 </span>";
         }
          else{
            $pageNum1=$pageNum;
            $pageNum1-=1;
            echo "<a href='?pageNum=1' class='notcurrent' > 首页 </a>";
            echo "<a href='?pageNum=$pageNum1' class='notcurrent' > 上一页 </a>";
          }
       echo  "<span> < </span>";
   
        for($i=1;$i<=$count;$i++){
          if($pageNum==$i)
            echo "<span href='?pageNum=$i?' class='current'> $i </span>";
          else
            echo "<a href='?pageNum=$i?' class='notcurrent' > $i </a>";
        }

         echo  "<span> > </span>";
        if($pageNum==$endPage){
           
           echo "<span href='?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>' class='current''> 下一页 </span>";
           echo "<span class='current'> 尾页 </span>";
         }
          else{
            $pageNum1=$pageNum;
            $pageNum1+=1;
            echo "<a href='?pageNum=$pageNum1' class='notcurrent' > 下一页 </a>";
            echo "<a href='?pageNum=$endPage' class='notcurrent'> 尾页 </a>";
          }

       ?> 
</div>  

<input type="hidden" name='act'>

    <input type="submit" name="return" value="删除" onclick="document.forms['view_form'].act.value='delete';"/>
    <input type="submit" name="return" value="全部删除" onclick="document.forms['view_form'].act.value='alldelete';"/>

   
</form>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

		<!-- start 全选/全不选 -->

		<script type="text/javascript">

			$('input[name="checkall"]').on("click",function(){

				if($(this).is(':checked')){

					$('input[name="checkbox[]"]').each(function(){

						$(this).prop("checked",true);

					});

				}else{

					$('input[name="checkbox[]"]').each(function(){

						$(this).prop("checked",false);

					});

				}

			});

</script>

