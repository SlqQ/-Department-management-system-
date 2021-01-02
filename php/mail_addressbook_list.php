<form action="mail_addressbook_group_list_db.php" method="post" id="addressbook_group_form" name='addressbook_group_form' accept-charset="utf-8">
<h4>群组>>>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' id='addemailgroup' value='新建组' onClick="show_lay(2)"><img src='../images/addemailgroup.png'></a></h4>

<table class="table table-bordered table-striped">

    <thead>
    <tr>
        <th style="width: 20px;"><input type="checkbox" name="checkall" /></th>
        <th style="width: 660px;">组名</th>
        
    </tr>
    </thead> 
    <tbody>
<?php 

include("conn.php");
 $user_id=$_SESSION["userid"];
    echo "<div class='fade_layer'></div>
        <div class='detail_layer select_peo'>
        <h3>新建群组</h3>
     <input type='text' name='group_name' placeholder='请输入组名'>
        <input type='hidden' name='phone' id='area_btn_y2' onClick='show_lay(2)'  lay-verify='phone' autocomplete='off' class='layui-input'>
        <div class='select_peo_con'>
            <div class='left'>
             <div class='areas_list'>
                <ul class='yiji'>";
 $sql="select group_id,group_name from emailgroup where  user_id='".$user_id."';";
 $rs=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($rs)){
    echo "<li class='areas_list_one'><a>$row[1]</a></li>";
    echo " <ul class='areas_list_two'>";
    $sql1="select user_name,user.job_number from user,(select job_number from group_member where group_id=$row[0]) t where user.job_number=t.job_number;";
    $rs1=mysqli_query($conn,$sql1);
    while($row1=mysqli_fetch_array($rs1)){
        echo "<li><span id='$row1[1]'>$row1[0]</span></li>";
    }
    echo "</ul>";
 }
  echo "<li class='areas_list_one'><a>全部联系人</a></li>";
  echo " <ul class='areas_list_two'>";
 $sql="select job_number,user_name,user_emailbox,user_phone from user where not job_number='".$user_id."'";
        $rs=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($rs)){
            echo "<li><span id='$row[0]'>$row[1]</span></li>";
    }
echo "</ul>";


    echo "     </ul>
            </div>
        </div>";
     echo "  <div class='center'>
            <a id='list_add'><img src='../images/addicon.jpg'></a>
        </div>
        <div class='right'>
            <ul class='send_to'>
            </ul>
        </div>
        <div class='clear'></div>
        <div class='bot_btn'>
            <a onClick='do_add(this)' class='a_con do_add'>确定</a><a class='a_con close_btn'>取消</a> 
        </div>
    </div>
</div>";   

 ?>
  <?php 
        
        $sql="select group_id,group_name from emailgroup where  user_id='".$user_id."';";
        $rs=mysqli_query($conn,$sql);

        if(mysqli_affected_rows($conn)<=0){
            echo "<tr>";
            echo "<td colspan='2'>暂无分组</td>";
            echo "</tr>";
        }
        while($row=mysqli_fetch_array($rs)){
            echo "<tr>";
            echo "<td><input type='checkbox' name='checkbox[]' value='$row[0]' /></td>";
            echo "<td class='group_name'>
            <a href='#' class='group_fold'>$row[1]</a><a href='mail_addressbook_add_groupmem.php?group_id=$row[0]' title=''>&nbsp;&nbsp;&nbsp;<img src='../images/addgroupmemeber.png'></a>
            <ul style='display:none'>";
            $sql1="select user_name,user.job_number from user,(select job_number from group_member where group_id=$row[0]) t where user.job_number=t.job_number;";
            $rs1=mysqli_query($conn,$sql1);
            while($row1=mysqli_fetch_array($rs1)){
                echo "<li class='group_fold_chil'>$row1[0]<a href='#' title='' data-toggle='modal' data-target='#$row[0]$row1[0]'>&nbsp;&nbsp;&nbsp;<img src='../images/delete.png'></a></li>";

             echo "<div class='modal fade' id='$row[0]$row1[0]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                   <div class='modal-dialog' role='document'>
                   <div class='modal-content'>
                   <div class='modal-header'>
                   <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                     <h4 class='modal-title' id='myModalLabel'>Modal title</h4>
                 </div>
                <div class='modal-body'>
                    你确定要从 $row[1] 中删除 $row1[0] 这位组成员吗？
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
                <button type='button' data-dismiss='modal' class='btn btn-primary delete_group_member'   id='$row[0]_$row1[1]'>确定</button>
             </div>
            </div>
            </div>
        </div>";
            }
       

            echo "  </ul>
                 </td>";
            }
        echo "</tr>";
      
    ?>
    </tbody>
</table>
<input type="hidden" name='act'>

    <input type="submit" name="return" value="删除组" onclick="document.forms['addressbook_group_form'].act.value='delete_group';"/>
    <input type="submit" name="return" value="发邮件" onclick="document.forms['addressbook_group_form'].act.value='send_group';"/>
</form>
<hr>
<form action="mail_addressbook_nor_list_db.php" method="post" id="addressbook_nor_form" name='addressbook_noe_form' accept-charset="utf-8">
<h4>全部联系人>>></h4>
<table class="table table-bordered table-striped">

    <thead>
    <tr>
        <th style="width: 20px;"><input type="checkbox" name="checkall1" /></th>
        <th style="width: 460px;">姓名</th>
        <th style="width: 660px;">邮箱</th>
        <th style="width: 360px;">联系电话</th>
    </tr>
    </thead>
    <tbody>
        <?php 
            $sql="select job_number,user_name,user_emailbox,user_phone from user where not job_number='".$user_id."'";
            $rs=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($rs)){
                echo "<tr>";
                echo "<td><input type='checkbox' name='checkbox1[]' value='$row[0]' /></td>";
                for($i=1;$i<4;$i++)
                echo "<td>$row[$i]</td>";
                echo "</tr>";
            }

         ?>
       
    </tbody>
</table>
         <input type="hidden" name='act'>
        <input type="submit" name="return" value="发邮件" onclick="document.forms['addressbook_nor_form'].act.value='send_nor';"/>
    
</form>

<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

        <!-- start 全选/全不选 -->

        <script type="text/javascript">

            $('input[name="checkall"]').on("click",function(){

                if($(this).is(':checked')){

                    $('input[name="checkbox[]"]').each(function(){

                        $(this).prop("checked",true);

                    });

                }else{

                    $('input[name="checkbox[]"]').each(function(){

                        $(this).prop("checked",false);

                    });

                }

            });

            $('input[name="checkall1"]').on("click",function(){

                if($(this).is(':checked')){

                    $('input[name="checkbox1[]"]').each(function(){

                        $(this).prop("checked",true);

                    });

                }else{

                    $('input[name="checkbox1[]"]').each(function(){

                        $(this).prop("checked",false);

                    });

                }

            });

             $('.group_name .group_fold').each(function(e){

                $(this).click(function(event) {
                    if($(this).next().next().css("display")=="block")
                        $(this).next().next().css("display","none");
                    else
                        $(this).next().next().css("display","block");
                   return false;
                });
            });
             $(".delete_group_member").each(function(e){
                $(this).click(function(e){
                    $(this).parent().parent().parent().css("display","none");
                    $(this).unbind();
                    id=$(this).attr('id').split("_");
                    console.log(id);
                    group_id=id[0];
                    job_number=id[1];
                    data={"group_id":group_id,
                            "job_number":job_number};

                $.post("mail_addressbook_delete_groupmem.php",data,function(data){
                  
                    if(data==1){
                        alert("删除成功");
                        window.location="mail_addressbook.php";
                    }

                    
                });
                 
                  return false;
            });
         });

    //点击下拉人员效果
$('.detail_layer').find('.left .areas_list .areas_list_one > a').click(function(){
    if($(this).parent().hasClass('on')){
        $(this).parent().removeClass('on');
        $(this).parent().next('.areas_list_two').css('height','0');
        //隐藏下一级目录
        $(this).siblings('dl').hide();

        //初始化
        $(this).siblings('dl').find('dl').hide();
        $(this).siblings('dl').find('a').removeClass('on');
        //console.log($(this).siblings('dl').find('ul.areas_list_two').length);
        $(this).siblings('dl').find('ul.areas_list_two').css('height','0');
    }else {
        //解绑子级分类点击事件
        $(this).siblings('dl').children('dd').children('a').unbind('click');

        $(this).parent().addClass('on');
        //如果下面还有下一级
        if($(this).siblings('dl').length>0){
                //显示子类
                $(this).siblings('dl').show();
                //子级分类点击事件
                $(this).siblings('dl').children('dd').children('a').click(function(){
                    //解绑子级分类点击事件
                    $(this).siblings('dl').children('dd').children('a').unbind('click');
                    //切换隐藏
                    if($(this).hasClass('on')){
                        $(this).removeClass('on');
                        $(this).parent().next('.areas_list_two').css('height','0');
                        //隐藏下一级目录
                        $(this).siblings('dl').hide();
                    }else{

                        $(this).addClass('on');
                        $(this).parent().next('.areas_list_two').css('height','auto');
                        //如果还有下一级
                        if($(this).siblings('dl').length>0){
                            $(this).siblings('dl').show().css('padding-left','30px');
                            $(this).siblings('dl').children('dd').children('a').click(function(){
                                //解绑子级分类点击事件
                                $(this).siblings('dl').children('dd').children('a').unbind('click');
                                if($(this).hasClass('on')){
                                    $(this).removeClass('on');
                                    $(this).parent().next('.areas_list_two').css('height','0');
                                    //隐藏下一级目录
                                    $(this).siblings('dl').hide();
                                }else{
                                    $(this).addClass('on');
                                    $(this).parent().next('.areas_list_two').css('height','auto');
                                    //如果还有下一级
                                    if($(this).siblings('dl').length>0){
                                        $(this).siblings('dl').show().css('padding-left','30px');
                                        $(this).siblings('dl').children('dd').children('a').click(function(){
                                            console.log(1233);
                                            if($(this).hasClass('on')){
                                                $(this).removeClass('on');
                                                $(this).parent().next('.areas_list_two').css('height','0');
                                                //隐藏下一级目录
                                                $(this).siblings('dl').hide();
                                            }else{
                                                $(this).addClass('on');
                                                $(this).parent().next('.areas_list_two').css('height','auto');
                                            }
                                        });
                                    }else{
                                        //console.log($(this).parent().next('.areas_list_two').html());
                                        
                                        $(this).parent().next('.areas_list_two').css('height','auto');
                                    }
                                }
                            });
                        }else{
                            //console.log($(this).parent().next('.areas_list_two').html());
                            
                            $(this).parent().next('.areas_list_two').css('height','auto');
                        }
                    }
                    
                   
                    
                });
        }else{
            $(this).parent().next('.areas_list_two').css('height','auto');
        }
        
    }
    
});
//显示弹窗效果
function show_lay(id) {
    // alert(id);
    $('.detail_layer').show();
    $('.detail_layer').attr('id','y'+id);
    $('.fade_layer').fadeIn();
    
}
//插入元素
    $('.detail_layer').find('.areas_list_two li').click(function(){
        //对勾切换效果
        if(!$(this).find('span').hasClass('hover')){
            $(this).find('span').addClass('hover');
        }else{
            $(this).find('span').removeClass('hover');
        }
        //获取选中元素html
        var val_prev = $(this).find('span').attr('id');
        $message_peo = $(this).html();
        
        //获取添加后的数组
        var attrid =$(this).parents('.select_peo_con').find('.right ul.send_to li').map(function(){
            return $(this).find('span').attr('id');
        });
        //判断数字是否存在数组里
        if( jQuery.inArray(val_prev, attrid) ==-1){
            $(this).parents('.select_peo_con').find('.right ul.send_to').append("<li>"+$message_peo +"</li>");
        }else{
            // alert('已存在列表中');
            while ($(this).parents('.select_peo_con').find('.right ul.send_to').find("#" + val_prev).length > 0)  
            {  
               $(this).parents('.select_peo_con').find('.right ul.send_to').find("#" + val_prev).parent().remove();  
            }  
        }
    
    });

//选择人员插入当前点击的input里面
function do_add(elm){
        var id = $(elm).parents('div.detail_layer').attr('id');
        var temp='';
        var nruid='' ;
        var temp1='';
        var eid='' ;
        $(elm).parents('#'+id).find('ul.send_to li').each(function(i,e){
            text = $(e).find('span');
            for (var i = 0; i < text.length; i++) {
                var val=$(text[i]).attr("id");
                if(val!=''){
                    temp+=val+',';
                }
                var id = $(text[i]).attr('id');
                if(id!=''){
                    nruid+=id+',' ;
                }
            };
        });

        var temps=temp.substring(0,temp.length-1);
        $('#area_btn_'+id).val(temps);
        $('#nruid_'+id).val(nruid) ;
        $('#eid').val(eid) ;
        $(elm).parents('.detail_layer').fadeOut();
        //清空选择人员
        $('.detail_layer .right ul li').remove();
        $(elm).parents('.select_peo_con').find('ul.areas_list_two').css('height','0');
        $(elm).parents('.select_peo_con').find('.areas_list_one').removeClass('on');
        $(elm).parents('.select_peo_con').find('.areas_list_two li span').removeClass('hover');
        $('.fade_layer').fadeOut();
};    
//取消按钮关闭事件
$('a.close_btn').click(function(){
    $(this).parents('.detail_layer').fadeOut();
        //清空选择人员
        $('.detail_layer .right ul li').remove();
        $(this).parents('.select_peo_con').find('ul.areas_list_two').css('height','0');
        $(this).parents('.select_peo_con').find('.areas_list_one').removeClass('on');
        $(this).parents('.select_peo_con').find('.areas_list_two li span').removeClass('hover');
        $('.fade_layer').fadeOut();
});


$(".do_add").click(function(e){
    assmem=$('input[name="phone"]').val();
    group_name=$('input[name="group_name"]').val();
    data={"group_name":group_name,
        "assmem":assmem};
    console.log(assmem);
    $.post("mail_addressbook_create_group.php",data,function(data){
  console.log(data);
                    if(data==1){
                        alert("新建成功");
                        window.location="mail_addressbook.php";
        }
        else if(data==2){
             alert("没有填写组名");
        }
       else if(data==3){
             alert("没有选择群成员");
        }
       // console.log(data);
                    
    });
});

</script>
