<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><div id="login_modal" class="modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×</button>
<h4>用户登录</h4>
</div>
<div class="col-sm-10 col-sm-offset-1">
<div class="form-title">
<span class="text" id="login_modal_msg">请输入您的账号和密码</span>
</div>
</div>
<form class="form-horizontal form-in-modal" onsubmit="return false">
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="text" class="form-control" id="login_email"
placeholder="账号">
</div>
</div>
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="password" class="form-control" id="login_password"
placeholder="密码">
</div>
<div class="col-sm-10 col-sm-offset-1">
<label class="control-label" for="inputError"></label>
</div>
</div>
<div class="modal-message">
<img src="templates/<?php echo $CFG['tplname'];?>/images/indicator_small.gif" id="login_indicator"
class="modal-indicator"><span id="login_result_msg"></span>
<ul id="login-error-msg-list" style="color: red;">
<ul>
</ul>
</ul>
</div>
<div class="modal-footer">
<span class="forgot_password pull-left"><a
class="trigger_forgot_password" href="javascript:void(0)">忘记密码？</a></span>
<span class="forgot_password pull-left">&nbsp;&nbsp;没有账户？&nbsp;&nbsp;<a
class="trigger_register" href="javascript:void(0)">注册</a></span> <input
type="submit" name="submit" value="登录" class="btn btn-primary"
id="login_button_id">
</div>
</form>
</div>
</div>
</div>


<div id="forgot_password_modal" class="modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×</button>
<h4>找回密码</h4>
</div>
<div class="col-sm-10 col-sm-offset-1">
<div class="form-title">
<span class="text">请输入邮箱</span>
</div>
</div>
<form class="form-horizontal form-in-modal" onsubmit="return false">
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="email" class="form-control" id="forgot_email"
placeholder="邮箱">
</div>
<div class="col-sm-10 col-sm-offset-1">
<label class="control-label" for="inputError"></label>
</div>
</div>
<div class="modal-message">
<img src="templates/<?php echo $CFG['tplname'];?>/images/indicator_small.gif" id="forgot_indicator"
class="modal-indicator"> <span id="forgot_result_msg"></span>
<ul id="forgot-error-msg-list" style="color: red;">
<ul>
</ul>
</ul>
</div>
<div class="modal-footer">
<input type="submit" name="submit" value="提交"
class="btn btn-primary" id="forgot_password_button_id">
</div>
</form>
</div>
</div>
</div>


<div id="register_modal" class="modal" aria-hidden="true">
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
<div class="col-sm-10 col-sm-offset-1 modal-row-title-div">
<span class="modal-row-title-text">账户类型</span>
</div>
<div class="col-sm-4 col-sm-offset-1">
<input type="radio" name="usertype_radios" id="r" value="r"
style="margin: 0 10px;" checked="">个人
</div>
<div class="col-sm-6">
<input type="radio" name="usertype_radios" id="a" value="a"
style="margin: 0 10px;">中介（可以同时发布更多广告）
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