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
		$sql="select job_number,user_name,user_phone,user_address,user_workdate from user where is_use=1 ";

		switch($queryKind){
			case "staff_id":
				$sql.=" and job_number like '%".$queryWord."%' order by job_number asc";
				break;
			case "staff_name":
				$sql.=" and user_name like '%".$queryWord."%' order by user_name asc";
				break;
			case "work_date":
				$sql.=" and user_workdate like '%".$queryWord."%' order by user_workdate asc";
				break;
			default:
				break;
		}
	 
      $rs=mysqli_query($conn,$sql);
 ?>

 <table class="table table-bordered table-striped query_table">
    <thead>
    <tr>
        <th>工号</th>
        <th>姓名</th>
        <th>电话</th>
        <th>住址</th>
        <th>工作日期</th>
    </tr>
    </thead>
    <tbody>
    <?php  
      $count=0;
      if(mysqli_affected_rows($conn)==0){  
        echo "<tr>";
        echo "<td colspan='5'>暂无数据</td>";
        echo "</tr>";
      }
      else
        while($row=mysqli_fetch_array($rs)){
        	$count++;
        echo "<tr>";
        for($i=0;$i<5;$i++){
        	if($i!=0){
                echo "<td>";
          		echo $row[$i];
         		echo "</td>";		
        	}
        	else{
        		echo "<td><a href='staff_manegement_view.php?job_number=$row[0]' title=''>$row[$i]</a></td>";
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