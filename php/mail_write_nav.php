   <style>
.tab1{margin:0;padding:0;list-style:none;width:200px;overflow:hidden;}
.tab1 li{float:left;width:80px;height:30px;background:#ccc;color:#000;border:1px solid #eee; border-radius:8px 0 8px 0px;text-align:center;line-height:30px;cursor:pointer; padding: 2px;}
.on{display:block;}
.tab1 li.cur{background:#aaa;}
.tab1 a{color: #000;}
</style>
 

<?php 
     echo "<ul class='tab1'>";
	 switch ($_SESSION["page"]){
	 	case "mail_write_nor":
	 		echo "<a href='mail_write_nor.php'><li class='cur'>普通邮件</li></a>";
	 		echo "<a href='mail_write_group.php'><li >群邮件</li></a>";
	 		break;
	 	case "mail_write_group":
	 		echo "<a href='mail_write_nor.php'><li >普通邮件</li></a>";
	 		echo "<a href='mail_write_group.php'><li class='cur'>群邮件</li></a>";
	 		break;
	 }
	 echo "</ul>";
 ?>