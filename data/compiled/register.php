<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><div id="register_modal" class="modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×</button>
<h4>注册</h4>
</div>
<form class="form-horizontal form-in-modal" onsubmit="return false">
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="text" class="form-control" id="register_username"
placeholder="用户名">
</div>
<div class="col-sm-10 col-sm-offset-1">
<label class="control-label" for="inputError"></label>
</div>
</div>
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="email" class="form-control" id="register_email"
placeholder="邮箱">
</div>
<div class="col-sm-10 col-sm-offset-1">
<label class="control-label" for="inputError"></label>
</div>
</div>
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="password" class="form-control" id="register_password"
placeholder="密码">
</div>
<div class="col-sm-10 col-sm-offset-1">
<label class="control-label" for="inputError"></label>
</div>
</div>
<div class="modal-message">
<img src="templates/<?php echo $CFG['tplname'];?>/images/indicator_small.gif" id="register_indicator"
class="modal-indicator"> <span id="register_result_msg"></span>
<ul id="register-error-msg-list" style="color: red;">
<ul>
</ul>
</ul>
</div>
<div class="modal-footer">
<span class="forgot_password pull-left">已经有账户？&nbsp;&nbsp;<a
class="trigger_login" href="javascript:void(0)">登录</a></span> <input
type="submit" name="submit" value="注册" class="btn btn-primary"
id="register_button_id">
</div>
</form>
</div>
</div>
</div>