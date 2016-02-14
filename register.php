<?php

define('IN_PHPMPS', true);
require dirname(__FILE__) . '/include/common.php';
if($CFG['uc'])require PHPMPS_ROOT . 'include/uc.inc.php';
require PHPMPS_ROOT . 'include/json.class.php';
require PHPMPS_ROOT . 'include/pay.fun.php';
$act = $_REQUEST['act'] ? trim($_REQUEST['act']) : 'index';

$not_login = array('login','act_login','register','act_register','logout',  'ajax', 'get_password', 'reset_password', 'send_pwd_email', 'email_edit_password','credit_rule','receive', 'check_info_gold', 'delinfo', 'editinfo', 'updateinfo', 'report', 'comment');

$must_login = array('index','modify','act_modify', 'edit_password', 'act_edit_password', 'info','info_comment', 'payonline', 'confirm', 'send', 'exchange', 'gold', 'act_gold', 'com_comment', 'com_list', 'editcom', 'updatecom', 'delcom','refer', 'top', 'send_info_mail' );

if(empty($_userid)) {
    if (!in_array($act, $not_login)) {
        if (in_array($act, $must_login)) {
            showmsg('请先登录', 'member.php?act=login&refer='.$PHP_URL);
        } else {
			showmsg('请不要提交非法请求！');
		}
    }
}

switch($act)
{
	case 'act_register':
		$ip = get_ip();
		$postarea = getPostArea($ip);
		onlyarea($postarea);
		
		$username   = $_POST['username'] ? htmlspecialchars_deep(trim($_POST['username'])) : '';
		$password   = $_POST['password'] ? trim($_POST['password']) : '';
		$email      = $_POST['email']?trim($_POST['email']):'';
		$md5_password = MD5($password);
		
		if (check_user($username) > 0) {
			echo "SCMD_REG_ERROR_USERNAME_EXIST";
			exit();
		}else if(check_email($email) > 0){
			echo "SCMD_REG_ERROR_EMAIL_EXIST";
			exit();
		}
		if(register($username,$md5_password,$email)) {
			if(!empty($CFG['register_credit']))credit_add($_SESSION['username'], $CFG['register_credit'],'register');
		} else {
			echo "SCMD_UNEXPECT_ERROR";
			exit();
		}
		login($username,$md5_password);
		echo "SCMD_REG_SUCCEED";
	break;
}
?>