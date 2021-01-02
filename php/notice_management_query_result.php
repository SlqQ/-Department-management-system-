<?php 
	$export=$_GET["export"];
	if(isset($_SESSION["queryWord"])&&$export==0){
		$queryWord=$_SESSION["queryWord"];
		$queryKind=$_SESSION["queryKind"];
		$export=1;
	}
	else{
		$export=-1;
		unset($_SESSION["queryWord"]);
		unset($_SESSION["queryKind"]);
		if(isset($_POST["queryWord"])&&!empty($_POST["queryWord"])){
			$export=0;
			$queryWord=$_POST["queryWord"];
			$_SESSION["queryWord"]=$queryWord;

		if(isset($_POST["queryKind"])&&!empty($_POST["queryKind"]))
			$queryKind=$_POST["queryKind"];
		else
			$queryKind="empty";
		$_SESSION["queryKind"]=$queryKind;

	  }	
	}
	if($export!=-1){

		$sql="select notice_id,notice_name,notice_auther,notice_date from notice where notice_isuse=1 ";

		switch($queryKind){
			case "notice_name":
				$sql.=" and notice_name like '%".$queryWord."%'";
				break;
			case "notice_auther":
				$sql.=" and notice_auther like '%".$queryWord."%'";
				break;
			case "notice_date":
				$sql.=" and notice_date like '%".$queryWord."%'";
				break;
			default:
				break;
		}
	  $sql.="order by notice_date desc";
	 
      $rs=mysqli_query($conn,$sql);
 ?>

 <table class="table table-bordered table-striped query_table" >
    <thead>
    <tr>
        <th>公告标题</th>
        <th>作者</th>
        <th>日期</th>       
    </tr>
    </thead>
    <tbody>
    <?php  
      $count=0;
      if(mysqli_affected_rows($conn)==0){  
        echo "<tr>";
        echo "<td colspan='4'>暂无数据</td>";
        echo "</tr>";
      }
      else
        while($row=mysqli_fetch_array($rs)){
        	$count++;
        echo "<tr>";
        for($i=1;$i<4;$i++){
        	if($i!=1){
                echo "<td>";
          		echo $row[$i];
         		echo "</td>";		
        	}
        	//未做 详情页
        	else{
        		echo "<td><a href='notice_view.php?notice_id=$row[0]' title=''>$row[$i]</a></td>";
        	}
        }
        echo "</tr>";
      }
    ?>
    </tbody>
</table>   

<?php 
	if($export==0){
		echo "<div class='query_count'>";
		echo "<span>共有".$count."条公告</span>";
		echo "</div>";
	}
}
 ?>