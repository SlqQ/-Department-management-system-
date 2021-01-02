
<?php 
if($_SESSION["userKind"]==1){
    echo "<div class='col-sm-3 col-md-2 sidebar'>";
    echo "<ul class='nav nav-sidebar'>";
    switch ($_SESSION["page"]){
        case "index":
            echo "<li class='active'><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;

        // 公告
       	case "notice":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li class='active'><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;
        case "notice_query":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li class='active'><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;
        case "notice_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li class='active'><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;

        //基本信息
      	case "information":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li class='active'><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;

      case "mail_receive":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;
     case "mail_repose_nor":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
    case "mail_repose_group":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
     case "mail_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
    case "mail_write_nor":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
    case "mail_write_group":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
    case "mail_addressbook":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
    case "mail_addressbook_add_groupmem":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
    case "mail_addressbook_send_normem":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
    case "mail_addressbook_send_groupmem":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;

        //slq 公告管理
      case "notice_management":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li class='active'><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;
        case "notice_management_repose_nor":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li class='active'><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;
        case "notice_management_write":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li class='active'><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;
        case "notice_management_query":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li class='active'><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;
        case "notice_management_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li class='active'><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;


     	//人员管理
     case "staff_management":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li class='active'><a href='staff_management.php'>人员管理</a></li>";
            break;
        case "staff_management_add":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li class='active'><a href='staff_management.php'>人员管理</a></li>";
        break;

        case "staff_management_query":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li class='active'><a href='staff_management.php'>人员管理</a></li>";
        break;

        case "satff_management_update_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li class='active'><a href='staff_management.php'>人员管理</a></li>";
        break;

        case "staff_management_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li class='active'><a href='staff_management.php'>人员管理</a></li>";
        break;



        //slq
            case "mail_draft":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
            case "mail_draft_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;
            case "mail_draft_repose_nor":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;

            case "mail_sent":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;

            case "mail_sent_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            break;

    }
        echo "</ul>";
    echo "</div>";
   }
else{
	echo "<div class='col-sm-3 col-md-2 sidebar'>";
    echo "<ul class='nav nav-sidebar'>";
    switch ($_SESSION["page"]){
        case "index":
            echo "<li class='active'><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;

        // 公告
       	case "notice":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li class='active'><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;
        case "notice_query":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li class='active'><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;
        case "notice_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li class='active'><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;

        //基本信息
      	case "information":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li class='active'><a href='personal_information.php'>基本信息</a></li>";
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;

      case "mail_receive":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
        break;
     case "mail_repose_nor":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
    case "mail_repose_group":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
     case "mail_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
    case "mail_write_nor":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
    case "mail_write_group":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
    case "mail_addressbook":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
    case "mail_addressbook_add_groupmem":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
    case "mail_addressbook_send_normem":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
    case "mail_addressbook_send_groupmem":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;

      case "mail_draft":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
            case "mail_draft_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;
            case "mail_draft_repose_nor":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;

            case "mail_sent":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;

            case "mail_sent_view":
            echo "<li><a href='index.php'>首页</a></li>";
            echo "<li><a href='notice.php'>公告</a></li>";
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
            echo "<li class='active'><a href='mail_receive.php'>站内邮件</a></li>";
            break;  
            }
       echo "</ul>";
    echo "</div>";
}
 ?>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>