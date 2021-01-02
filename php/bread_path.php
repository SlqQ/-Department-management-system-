<?php 
  echo "<ol class='breadcrumb'>";
switch ($_SESSION['page']) {
		case "index":
            echo "<li><a href='index.php'>首页</a></li>";
            break;

        case "notice":
            echo "<li><a href='notice.php'>公告</a></li>";
        break;
        case "notice_view":
            echo "<li><a href='notice.php' class='home'>公告</a></li>";
            echo "<li>公告详情</li>";
            break;
        case "notice_query":
            echo "<li><a href='notice_query.php' >公告</a></li>";
            break;


        //基本信息
        case "information":
            echo "<li><a href='personal_information.php'>基本信息</a></li>";
        break;

        case "notice":
            echo "<li><a href='notice.php'>公告</a></li>";
        break;
        case "notice_view":
            echo "<li><a href='notice.php' class='home'>公告</a></li>";
            echo "<li>公告详情</li>";
            break;
        case "notice_query":
            echo "<li><a href='notice_query.php' >公告</a></li>";
            break;

        //公告管理
        case "notice_management":
            echo "<li><a href='notice_management.php'>公告管理</a></li>";
        break;    
        case "notice_management_view":
            echo "<li><a href='notice_management.php' class='home'>公告管理</a></li>";
            echo "<li>公告详情</li>";
        break;  

        case "notice_management_repose_nor":
            echo "<li><a href='notice_management.php' class='home'>公告管理</a></li>";
            echo "<li><a href='#' onclick='javascript:history.back(-1);'>公告详情</a></li>";
            echo "<li>公告编辑</li>";
            break;
        case "notice_management_write":
            echo "<li><a href='notice_management_write.php'>公告管理</a></li>";
        break;
        case "notice_management_query":
            echo "<li><a href='notice_management_query.php'>公告管理</a></li>";
        break;


        case "mail_receive":
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;

        //slq
        case "mail_draft":
            echo "<li><a href='mail_draft.php'>站内邮件</a></li>";
        break;
        case "mail_draft_view":
            echo "<li><a href='mail_draft.php'>站内邮件</a></li>";
        break;
        case "mail_sent":
            echo "<li><a href='mail_sent.php'>站内邮件</a></li>";
        break;
        case "mail_sent_view":
            echo "<li><a href='mail_sent.php'>站内邮件</a></li>";
        break;
        case "mail_draft_repose_nor":
            echo "<li><a href='mail_draft.php'>站内邮件</a></li>";
        break;


      case "mail_write_nor":
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;
      case "mail_write_group":
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;
      case "mail_addressbook":
            echo "<li><a href='mail_receive.php'>站内邮件</a></li>";
        break;
      case "mail_view":
            echo "<li><a href='mail_receive.php' class='home'>站内邮件</a></li>";
            echo "<li>邮件详情</li>";
            break;
      case "mail_repose_nor":
            echo "<li><a href='mail_receive.php' class='home'>站内邮件</a></li>";
            echo "<li><a href='#' onclick='javascript:history.back(-1);'>邮件详情</a></li>";
            echo "<li>普通转发邮件</li>";
            break;
       case "mail_repose_group":
            echo "<li><a href='mail_receive.php' class='home'>站内邮件</a></li>";
            echo "<li><a href='#' onclick='javascript:history.back(-1);'>邮件详情</a></li>";
            echo "<li>分组转发邮件</li>";
            break;
      case "mail_addressbook_add_groupmem":
            echo "<li><a href='mail_receive.php' class='home'>站内邮件</a></li>";
            echo "<li><a  href='mail_addressbook.php'>通讯录</a></li>";
            echo "<li>添加群成员</li>";
            break;
      case "mail_addressbook_send_groupmem":
            echo "<li><a href='mail_receive.php' class='home'>站内邮件</a></li>";
            echo "<li><a  href='mail_addressbook.php'>通讯录</a></li>";
            echo "<li>发送群邮件</li>";
            break;
      case "mail_addressbook_send_normem":
            echo "<li><a href='mail_receive.php' class='home'>站内邮件</a></li>";
            echo "<li><a  href='mail_addressbook.php'>通讯录</a></li>";
            echo "<li>发送邮件</li>";
            break;
      
     	case "staff_management":
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
        break;

        case "staff_management_add":
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            echo "<li><a href='staff_management_add.php'>添加</a></li>";
        break;

        case "staff_management_query":
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            echo "<li><a href='#'>查询</a></li>";
        break;

        case "staff_management_view":
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            echo "<li><a href='staff_management_view.php'>详情</a></li>";
        break;
        case "satff_management_update_view":
            echo "<li><a href='staff_management.php'>人员管理</a></li>";
            echo "<li><a href='staff_management_update_view.php'>编辑</a></li>";
        break;
            
	}
	echo "</ol>";
 ?>