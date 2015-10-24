<?php

if (!defined('IN_PHPMPS'))
{
    die('Access Denied');
}

/*
 * �鿴����Ա��Ϣ
 * @param int id ����Ա���
 */
function chkadmin($purview)
{
	global $db,$table;
	$sql = "SELECT is_admin,purview FROM {$table}admin WHERE userid='$_SESSION[adminid]'";
	$row = $db->getRow($sql);
	if(!$row['is_admin']){
		$purviews = explode(",", $row['purview']);
		if(!in_array("$purview", $purviews)) {
			show('��û�в���Ȩ��');
		}
	}
}

/* 
 * ��ӹ�����־ 
 * @param   string  logtype  ��������
 */
function admin_log($logtype)
{
	global $db,$table;
    $sql = "INSERT INTO {$table}admin_log (adminname,logdate,logtype,logip) VALUES ('$_SESSION[adminname]','".time()."','$logtype','$_SERVER[REMOTE_ADDR]')";
    $db->query($sql);
}

/**
 * ���ɱ༭��
 * @param   string  $editor_name  �༭������
 * @param   string  $type         �༭������
 * @param   string  $value        �༭����ֵ
 */
function fck_editor($editor_name,$type,$value = '',$width='90%',$height='320')
{
    $editor = new FCKeditor($editor_name);
    $editor->BasePath   = '../include/fckeditor/';
    $editor->ToolbarSet = $type;
    $editor->Width      = $width;
    $editor->Height     = $height;
    $editor->Value      = $value;
    $FCKeditor = $editor->CreateHtml();
	return $FCKeditor;
}

/**
 * ����ģ��
 * @param   string  file  ģ������
 */
function tpl($file)
{
	global $CFG;
	$file = PHPMPS_ROOT.'admin/templates/'.$file.'.htm';
    return $file;
}

/**
 * ��ʾ��Ϣ
 * @param   string  msg  ��ʾ��Ϣ
 */
function show($msg,$url='goback')
{
    include tpl('show');
	exit;
}

/**
 * ȡ�ð���,���ŵȵķ���
 * @param string type ��������
 */
function type_select($type='help',$typeid='')
{
	global $db,$table;
	
	$res = $db->query("select * from {$table}type where module='$type'");
	$option = "<select name=\"typeid\" id=\"typeid\">";
	while($row=$db->fetchrow($res)) {
		$option .= "<option value=$row[typeid]";
		$option .= ($typeid == $row[typeid]) ? " selected='selected'" : '';
		$option .= ">$row[typename]</option>";
	}
	$option .= "</select>";
	return $option;
}

/**
 * ��ȡĳ���ֶε����ֵ
 * @param string field �ֶ�����
 * @param string tables ����
 */
function getFieldMax($field, $tables)
{
	global $db,$table;
	$data = $db->getOne("SELECT MAX(".$field.") FROM {$table}{$tables}");
	return $data;
}

?>