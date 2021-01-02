

<?php 
// if($_SESSION["userid"]==1){
   echo "<link rel='stylesheet' href='../assets/mail_nav.css'>

	    <div class='htmleaf-container'>

	     <div class='htmleaf-content bgcolor-3'>";
    echo "<ul class='mail_con idTabs tab'>";
    switch ($_SESSION["page"]){
        case "notice":
            echo "<a href='notice.php'><li class='mail_item cur'>首页</li></a>";
            echo "<a href='notice_query.php?export=-1'><li class='mail_item '>查询</li></a>";
        break;
        case "notice_query":
            echo "<a href='notice.php'><li class='mail_item '>首页</li></a>";
            echo "<a href='notice_query.php?export=-1'><li class='mail_item cur'>查询</li></a>";
        break;

    }
        echo "</ul>";
    echo "</div>";

 ?>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>