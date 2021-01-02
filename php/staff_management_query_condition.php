
<fieldset class="query_condition">
	<legend>查询条件</legend>
	<form action="<?php  echo 'staff_management_query.php?export=-1'; ?>" method="post" accept-charset="utf-8" class="query_form">
		<label class="query_userIpt">
			<input type="text" name="queryWord" placeholder="请输入查询关键字">
		</label>
		<div id='queryKind'>
			<lable class="queryKind"><input type="radio" name="queryKind" value="staff_id"><span>工号</span></lable>
			<lable class="queryKind"><input type="radio" name="queryKind" value="staff_name"><span>姓名</span></lable>
			<lable class="queryKind"><input type="radio" name="queryKind" value="work_date"><span>工作日期</span></lable>
		</div>
		<label class="queryBtn"><input type="submit" id="queryBtn" value="查询"></label>
	</form>
</fieldset>
