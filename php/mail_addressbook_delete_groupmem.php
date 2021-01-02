<?php 
include("conn.php");
$group_id=$_POST["group_id"];
$job_number=$_POST["job_number"];
$sql="delete from group_member where group_id=$group_id and job_number='$job_number'";
$rs=mysqli_query($conn,$sql);
echo "1";
 ?>