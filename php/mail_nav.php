

<?php 
// if($_SESSION["userid"]==1){
   echo "<link rel='stylesheet' href='../assets/mail_nav.css'>

	    <div class='htmleaf-container'>

	     <div class='htmleaf-content bgcolor-3'>";
    echo "<ul class='mail_con idTabs tab'>";
    switch ($_SESSION["page"]){
        case "mail_receive":
            echo "<a href='mail_receive.php'><li class='mail_item cur'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item'>已发送</li></a>";
        break;
        //slq
        case "mail_draft":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item  cur'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item'>已发送</li></a>";
        break;
        case "mail_draft_view":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item  cur'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item'>已发送</li></a>";
        break;
        case "mail_draft_repose_nor":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item  cur'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item'>已发送</li></a>";
        break;

        
        case "mail_sent":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item cur'>已发送</li></a>";
        break;
        case "mail_sent_view":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item cur'>已发送</li></a>";
        break;



      case "mail_write_nor":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item  cur'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item'>已发送</li></a>";
        break;
     case "mail_write_group":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item  cur'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item '>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item'>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item'>已发送</li></a>";
        break;
     case "mail_addressbook":
            echo "<a href='mail_receive.php'><li class='mail_item'>收信</li></a>";
            echo "<a href='mail_write_nor.php'><li class='mail_item'>写信</li></a>";
            echo "<a href='mail_addressbook.php'><li class='mail_item cur'>通讯录</li></a>";
            echo "<a href='mail_draft.php'><li class='mail_item '>草稿箱</li></a>";
            echo "<a href='mail_sent.php'><li class='mail_item'>已发送</li></a>";
        break;
    }
        echo "</ul>";
    echo "</div>";

 ?>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>