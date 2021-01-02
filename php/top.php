<?php 
include("conn.php");
$sql="select * from email where email_addressee='".$_SESSION["userid"]."' and email_state=0 and is_use_ad=1;";
$rs=mysqli_query($conn,$sql);
$num=mysqli_affected_rows($conn);
 ?>

<nav class="navbar navbar-inverse navbar-fixed-top">

   
  <div class="container-fluid">
    
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
       <a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-yen"></span> 财务部门管理系统</a>
    </div>  
    
<!--     <ul class="nav navbar-nav navbar-right">
        <li><a href="personal_edit.php?" title=""><img class="nav_icon" src="../images/admin.svg" alt=""></a></li>
    </ul> -->
	<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" >
            <li><a class="navbar-brand" href="mail_receive.php"> <span class="glyphicon glyphicon-envelope" style="font-size: 23px;color: #eee;"></span>  <span class="badge" style="width: 20px;height: 15px;background: red;position: relative;top: -15px;left: -5px; font-size: 8px; padding: 3px 0 0 0;"><?php echo $num; ?></span></a></li>
            <li><a  href="exit.php">退出</a></li>
          </ul>

     </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>

