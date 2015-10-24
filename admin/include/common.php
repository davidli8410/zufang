<?php

if (!defined('IN_PHPMPS')) {
    die('Access Denied');
}

define('IN_ADMIN', true);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('PHPMPS_ROOT', str_replace('admin/include/common.php', '', str_replace('\\', '/', __FILE__)));
set_magic_quotes_runtime(0);
session_start();
if(function_exists('date_default_timezone_set')){
    date_default_timezone_set('Etc/GMT-8');
}
require PHPMPS_ROOT . 'data/config.php';
require PHPMPS_ROOT . 'admin/include/global.fun.php';
require PHPMPS_ROOT . 'include/global.fun.php';
header('Content-type: text/html; charset='.$charset);
unset($_REQUEST['table']);
if(!get_magic_quotes_gpc()) {
	$_POST   = addslashes_deep($_POST);
	$_GET    = addslashes_deep($_GET);
	$_COOKIE = addslashes_deep($_COOKIE);
}
if (!empty($_REQUEST)){
	$_REQUEST  = sql_replace($_REQUEST);key_replace($_REQUEST);
}
if (!empty($_POST)){
	$_POST  = sql_replace($_POST);key_replace($_POST);
}
if (!empty($_GET)){
	$_POST  = sql_replace($_POST);key_replace($_POST);
}
if(file_exists('../install')) show('请先删除install目录或者更改成其他名称');

require PHPMPS_ROOT . 'include/mysql.class.php';
$db = new mysql($db_host, $db_user, $db_pass, $db_name);
$db_host = $db_user = $db_pass = $db_name = NULL;

if(empty($_SESSION['adminid']) && !strstr($_SERVER['SCRIPT_FILENAME'],'login.php')){
    header("Location: ./login.php?act=login");
	exit;
} elseif($_SESSION['adminid']) {
	$adminid = $_SESSION['adminid'];
	$adminname = $_SESSION['adminname'];
	$adminpass = $_SESSION['adminpass'];
	
	$admin = $db->getone("SELECT * FROM {$table}admin WHERE username='$adminname' AND password='$adminpass' ");
	if(empty($admin))show("管理员不存在");
}
$CFG = get_config();
define('PHPMPS_PATH', $CFG['weburl'].'/');
?>