
<fieldset class="query_condition">
	<!-- <legend>查询条件</legend> -->
	<form action="<?php echo 'notice_query.php?export=-1';?>" method="post" accept-charset="utf-8" class="query_form">
		<label class="query_userIpt">
			<input type="text" name="queryWord" placeholder="请输入查询关键字">
		</label>
		<div id='queryKind'>
			<lable class="queryKind"><input type="radio" name="queryKind" value="notice_name"><span>公告标题</span></lable>
			<lable class="queryKind"><input type="radio" name="queryKind" value="notice_auther"><span>作者</span></lable>
			<lable class="queryKind"><input type="radio" name="queryKind" value="notice_date"><span>日期</span></lable>
		</div>
		<label class="queryBtn"><input type="submit" id="queryBtn" value="查询"></label>
	</form>
</fieldset>
