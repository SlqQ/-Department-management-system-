<!-- <form action="notice_list_db.php" method="post" id="view_form" name='view_form' accept-charset="utf-8"> -->
<table class="table table-bordered table-striped">

    <thead>
    <tr>
        <th style="width: 60px;"><img src='../images/notice.png' alt='' style='width: 30px;height: 25px;'></th>
        <th style="width: 850px;">公告标题</th>
        <th>日期</th>
    </tr>
    </thead>
    <tbody>
	  <?php  
	     include("conn.php");
      $user_id=$_SESSION["userid"];
   		 $sql1="select notice_id,notice_name,notice_date from notice where notice_isuse=1 order by notice_date desc";

        $pageSize = 9; 
        $pageNum = 4;
        $rs1 = mysqli_query($conn, $sql1); 
        $allNum = mysqli_num_rows($rs1); 
        $endPage = ceil($allNum/$pageSize); 
        $pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"]; 
        $count = ceil(mysqli_affected_rows($conn)/$pageSize);
        $sql="select notice_id,notice_name,notice_date from notice where notice_isuse=1 order by notice_date desc limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize; 

  		$rs=mysqli_query($conn,$sql);


  		if(mysqli_affected_rows($conn)==0){
  			echo "<tr>";
  			echo "<td colspan='3' style=' text-align: center'>暂无公告</td>";
  			echo "</tr>";
  		}
  		while($row=mysqli_fetch_array($rs)){
  			echo "<tr>";
        echo "<td><a href='notice_view.php?notice_id=$row[0]' title=''><img src='../images/notice.png' alt='' style='width: 30px;height: 25px;'></a></td>";


  			for($i=1;$i<3;$i++){
          if($i!=1){
          echo "<td>";
          echo $row[$i];
          echo "</td>";
           }

           else{
            echo "<td><a href='notice_view.php?notice_id=$row[0]' title=''>$row[$i]</a></td>";
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

</form>

