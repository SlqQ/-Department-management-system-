<?php 
include("conn.php");

$sql="select emailgroup.group_id,group_name,user_id,job_number from emailgroup,group_member where emailgroup.group_id=group_member.group_id and user_id='".$user_id."';";
$rs=mysqli_query($conn,$sql);
	echo "<div class='addbook' >
	<div class='tit_addb'>
		<h4>通讯录</h4>
	</div>
	<div class='container_addb'>
	<ul class='menu'>
	<hr>
	<h5>通讯组</h5>
	<hr>";
// if(mysqli_affected_rows($conn)>0)
// 	echo $sql;
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
  		echo "<li class='list' ><a href=''>$row[1]</a> ";
  		echo "<ul class='items'  id='".$row[1]."'>";
  		$sql1="select user_name,job_number from user where job_number='".$row["job_number"]."' and is_use=1;";
        $rs1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($rs1);
       // echo  $row1[0];
  		echo "<li><a href='' class='name' style='padding:2px;'> $row1[0],<br>$row1[1]</a></li>";
  		echo "    </ul>
                </li>
                </li>";
  	}
  	else{
  		$sql1="select user_name,job_number from user where job_number='".$row["job_number"]."'and is_use=1;";
  		$rs1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($rs1);
  		echo "
		<script src='https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js'></script>
  		<script>
		 
		$('#$row[1]').append(\"<li><a href=''class='name'  style='padding:2px;'> $row1[0],<br>$row1[1]</a></li>\");
  		</script>";

  	}
}
unset($rs1);	
unset($rs);

$sql="select user_name,job_number from user;";
$rs=mysqli_query($conn,$sql);
$sql1="select user_name from user where job_number='".$user_id."'";
$rs1=mysqli_query($conn,$sql1);
$rw=mysqli_fetch_array($rs1);
 echo "
<hr>
 <h5>联系人</h5>
		<hr>";
while($row=mysqli_fetch_array($rs)){

  if($rw[0]==$row[0])     
  echo "<li ><a class='name namesin' href='' style='padding:2px;'>$row[0],<br>$row[1]</a></li> 
        ";
  else
    echo "<li ><a class='name namesin' href='' style='padding:2px;'>$row[0],<br>$row[1]</a></li> 
        ";
}
 
mysqli_close($conn);

echo "</ul>
    </div>	
    </div>";

 ?>




<script >
   var list=$('.list');
    s=[];
   function accordion(e) {
   	e.preventDefault();
      e.stopPropagation();
      if($('.rece').val()=='')
        s='';

      if($(this).hasClass('active'))
         $(this).removeClass('active');
      else{
         if($(this).parent().parent().hasClass('active'))
            $(this).addClass('active');
         else{
            $.each(list,function(index,obj){
               $(obj).removeClass('active');
            });
            $(this).addClass('active');
         }
      }
    

        
      $arr=$(this).text().split(" ");
    for(var i=2;i<$arr.length;i++){

          s+=$arr[i]+" ";
          console.log($arr[i]);
        }
        $('.rece').val(s);
        $(this).children().children().css('color','#ccc');
         $(this).unbind('click');
 

   }
  
   $.each(list,function(index,obj){
      $(obj).on('click',accordion);
 
   });
   s='';
 		$('.name').click(function(e){
 		e.preventDefault();
 		if($('.rece').val()=='')
 			s='';
 		s+=$(this).text()+' ';    
        $('.rece').val(s);
        $(this).css('color','#ccc');
        $(this).unbind('click');
 
    });

</script>


