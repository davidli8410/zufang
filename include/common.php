<?php

if (!defined('IN_PHPMPS'))
{
    die('Access Denied');
}

define('DEBUG', 1);
if(DEBUG) {
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
} else {
	error_reporting(0);
}

define('PHPMPS_ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -7)));
$PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
if ('/' == substr($php_self, -1))$PHP_SELF .= 'index.php';
$PHP_QUERYSTRING = $_SERVER['QUERY_STRING'];
$PHP_DOMAIN = $_SERVER['SERVER_NAME'];
$PHP_SCHEME = $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
$PHP_PORT = $_SERVER['SERVER_PORT'] == '80' ? '' : ':'.$_SERVER['SERVER_PORT'];
$PHP_URL = $PHP_SCHEME.$PHP_DOMAIN.$PHP_PORT.$PHP_SELF.($PHP_QUERYSTRING ? '?'.$PHP_QUERYSTRING : '');

if (!file_exists(PHPMPS_ROOT . 'data/install.lock')) {
	header("Location:./install/index.php");
	exit;
}
require PHPMPS_ROOT . 'data/config.php';
require PHPMPS_ROOT . 'include/global.fun.php';

@set_magic_quotes_runtime(0);
@ini_set('session.auto_start', 0);
session_start();
header('Content-type: text/html; charset='.$charset);

if(!get_magic_quotes_gpc()) {
	if (!empty($_GET))$_GET  = addslashes_deep($_GET);
    if (!empty($_POST))$_POST = addslashes_deep($_POST);
    $_COOKIE   = addslashes_deep($_COOKIE);
    $_REQUEST  = addslashes_deep($_REQUEST);
}
if (!empty($_REQUEST)){
	$_REQUEST  = sql_replace($_REQUEST);key_replace($_REQUEST);
}
if (!empty($_POST)){
	$_POST  = sql_replace($_POST);key_replace($_POST);
}
if (!empty($_GET)){
	$_GET  = sql_replace($_GET);key_replace($_GET);
}
unset($_REQUEST['table']);
if(function_exists('date_default_timezone_set')){
    date_default_timezone_set('Etc/GMT-8');
}

require PHPMPS_ROOT . 'include/mysql.class.php';
$db = new mysql($db_host, $db_user, $db_pass, $db_name, '1');
$db_host = $db_user = $db_pass = $db_name = NULL;

$CFG = get_config();
if($CFG['closesystem']) showmsg($CFG['close_tips']);

$_userid = 0;
$_username = '';
$uid = $_SESSION['userid'] ? $_SESSION['userid'] : '';
$password = $_SESSION['password'] ? $_SESSION['password'] : '';
if(!empty($uid)) {
	$user_info = $db->getRow("select userid,username,lastposttime,status from {$table}member where userid='$uid' and password='$password' ");
	if($user_info) {
		$_userid = $user_info['userid'];
		$_username = $user_info['username'];
		$_username = htmlspecialchars($_username,ENT_QUOTES);
		$_lastposttime = $user_info['lastposttime'];
		$_status = $user_info['status'];
	}
}

define('DEBUG_MODE', 0);
define('PHPMPS_PATH', $CFG['weburl'].'/');//��ַ
define('CSS_PATH', $CFG['weburl'].'/templates/'.$CFG['tplname'].'/style/');//css��ַ
define('IMG_PATH', $CFG['weburl'].'/templates/'.$CFG['tplname'].'/images/');//ͼƬ��ַ
require PHPMPS_ROOT . 'include/header.php';
?>