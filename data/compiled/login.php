<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><div id="login_modal" class="modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">��</button>
<h4>�û���¼</h4>
</div>
<div class="col-sm-10 col-sm-offset-1">
<div class="form-title">
<span class="text" id="login_modal_msg">�����������˺ź�����</span>
</div>
</div>
<form class="form-horizontal form-in-modal" onsubmit="return false">
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="text" class="form-control" id="login_email"
placeholder="�˺�">
</div>
</div>
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="password" class="form-control" id="login_password"
placeholder="����">
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
class="trigger_forgot_password" href="javascript:void(0)">�������룿</a></span>
<span class="forgot_password pull-left">&nbsp;&nbsp;û���˻���&nbsp;&nbsp;<a
class="trigger_register" href="javascript:void(0)">ע��</a></span> <input
type="submit" name="submit" value="��¼" class="btn btn-primary"
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
aria-hidden="true">��</button>
<h4>�һ�����</h4>
</div>
<div class="col-sm-10 col-sm-offset-1">
<div class="form-title">
<span class="text">����������</span>
</div>
</div>
<form class="form-horizontal form-in-modal" onsubmit="return false">
<div class="form-group">
<div class="col-sm-10 col-sm-offset-1">
<input type="email" class="form-control" id="forgot_email"
placeholder="����">
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
<input type="submit" name="submit" value="�ύ"
class="btn btn-primary" id="forgot_password_button_id">
</div>
</form>
</div>
</div>
</div>
