<?php

if(!defined('IN_PHPMPS'))
{
	die('Access Denied');
}

function gold_add($username, $number, $note = '')
{
	global $db,$table;
	$username = addslashes(stripslashes($username));
	$number = intval($number);
	if($number < 0)	showmsg('��������С��0');
	$note = addslashes($note);
	$db->query("UPDATE {$table}member SET gold=gold+$number WHERE username='$username'");
	if($db->affected_rows() == 0) showmsg('����ʧ��');
	$time = time();
	$ip = get_ip();
	$db->query("INSERT INTO {$table}pay_exchange  (`username`,`type`,`value`,`note`,`addtime`,`ip`) VALUES('$username','gold','$number','$note','$time','$ip')");
}

function gold_diff($username, $number, $note = '', $authid = '')
{
	global $db, $table;
	$username = addslashes(stripslashes($username));
	$number = intval($number);
	if($number < 0)	showmsg('��������С��0');
	$note = addslashes($note);
	$r = member_info($username,'2');
	if(!$r) showmsg('�����ڴ��û�');
	extract($r);
	$username = addslashes(stripslashes($username));
	$time = time();
	$ip = get_ip();
	if($number > $gold) showmsg('���Ľ���֧��');
	$db->query("UPDATE {$table}member SET gold=gold-$number WHERE username='$username'");
	$db->query("INSERT INTO {$table}pay_exchange  (`username`,`type`,`value`,`note`,`addtime`,`ip`) VALUES('$username','gold','-".$number."','$note','$time','$ip')");
	
	if($member['ispointdiffemail']) {
		//$data = tpl_data('member','pointmailtpl');
		sendmail($email, 'ȷ�ϻ�Ա��ұ䶯�ʼ�'.'('.$CFG['sitename'].')', stripslashes($data));
	}
	return TRUE;
}

function credit_add($username, $number, $note = '')
{
	global $db, $table;
	$username = addslashes(stripslashes($username));
	$number = intval($number);
	if($number < 0)	showmsg('��������С��0');
	$db->query("UPDATE {$table}member SET credit=credit+$number WHERE username='$username'");
	$note = addslashes($note);
	$time = time();
	$ip = get_ip();
	if($db->affected_rows() == 0) showmsg('����ʧ��');
	$db->query("INSERT INTO {$table}pay_exchange  (`username`,`type`,`value`,`note`,`addtime`,`ip`) VALUES('$username','credit','$number','$note','$time','$ip')");
}

function credit_diff($username, $number, $note = '')
{
	global $db, $table;
	$username = addslashes(stripslashes($username));
	$number = intval($number);
	if($number < 0)	showmsg($LANG['illegal_parameters']);
	$note = addslashes($note);
	$r = member_info($username,'2');
	if(!$r) showmsg('�����ڴ��û�');
	extract($r);
	$username = addslashes(stripslashes($username));
	$time = time();
	$ip = get_ip();
	if($chargetype == 0) {
		if($number > $credit) showmsg('���Ļ��ֲ�����֧��');
        $db->query("UPDATE {$table}member SET credit=credit-$number WHERE username='$username'");
	    $db->query("INSERT INTO {$table}pay_exchange  (`username`,`type`,`value`,`note`,`addtime`,`ip`) VALUES('$username','credit','-".$number."','$note','$time','$ip')");
	}
	return TRUE;
}

function money_add($username, $number, $note = '')
{
	global $db,$table;
	$username = addslashes(stripslashes($username));
	$number = round(floatval($number) ,2);
	if($number < 0) showmsg('����С��0Ԫ');
	$note = addslashes($note);
	$r = member_info($username,'2');
	if(!$r) showmsg('�����ڴ��û�');
	extract($r);
	$username = addslashes(stripslashes($username));
	$money = $money + $number;
	$db->query("UPDATE {$table}member SET money=$money WHERE username='$username'");
	if($db->affected_rows() == 0) show('����ʧ��');
	$time = time();
	$year = date('Y', $time);
	$month = date('m', $time);
	$date = date('Y-m-d', $time);
	$ip = get_ip();
	
	//�ʽ�䶯��¼
	$db->query("INSERT INTO {$table}pay (typeid,note,paytype,amount,balance,username,year,month,date,inputtime,inputer,ip) VALUES('1','$note','���','$number','$money','$username','$year','$month','$date','$time','system','$ip')");

	$db->query("INSERT INTO {$table}pay_exchange (`username`,`type`,`value`,`note`,`addtime`,`ip`) VALUES('$username','money','$number','$note','$time','$ip')");
}

function money_diff($username, $number, $note = '')
{
	global $db, $table;
	//$username = addslashes(stripslashes($username));
	$number = round(floatval($number) ,2);
	if($number == 0) return true;
	if($number < 0) showmsg('����С��0Ԫ');
	$note = addslashes($note);
$username =  htmlspecialchars($username,ENT_QUOTES) ;
	$r = member_info($username,'2');
	exit;
	if(!$r) showmsg('�����ڴ��û�');
	extract($r);
	$username = addslashes(stripslashes($username));
	if($number > $money) showmsg('�ʻ��ʽ𲻹���������');
	$money = $money - $number;
	$db->query("UPDATE {$table}member SET money=$money WHERE username='$username'");
	$time = time();
	$year = date('Y', $time);
	$month = date('m', $time);
	$date = date('Y-m-d', $time);
	$ip = get_ip();
	
	//�ʽ�䶯��¼
	$db->query("INSERT INTO {$table}pay (typeid,note,paytype,amount,balance,username,year,month,date,inputtime,inputer,ip) VALUES('2','$note','�ۿ�','$number','$money','$username','$year','$month','$date','$time','system','$ip')");

	$db->query("INSERT INTO {$table}pay_exchange (`username`,`type`,`value`,`note`,`addtime`,`ip`) VALUES('$username','money','-".$number."','$note','$time','$ip')");

	return true;
}

function dopay($orderid, $amount, $bank)
{
	global $db,$table;
	$r = $db->getRow("SELECT * FROM {$table}pay_online WHERE `orderid`='$orderid'");
	if(!$r)showmsg('������Ϣ������');
	if($r['amount']+$r['trade_fee'] != $amount) showmsg('֧��ʧ�ܣ�֧�����ԣ�');
	if($r['status'] > 0) showmsg('�벻Ҫˢ��');
	$db->query("UPDATE {$table}pay_online SET status=1, receivetime='".time()."' WHERE `orderid`='$orderid'");
	
	money_add($r['username'] , $amount, '����֧�����'.':'.$orderid);
	if($r['trade_fee']) money_diff($r['username'], $r['trade_fee'], '�۳�������'.':'.$orderid);
	return $r;
}
?>