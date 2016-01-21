<?php

define('IN_PHPMPS', true);
require_once dirname(__FILE__) . '/include/common.php';

chkadmin('flash');

$_REQUEST['act'] = $_REQUEST['act'] ? trim($_REQUEST['act']) : 'list' ;

switch ($_REQUEST['act'])
{
	case 'list':
		$sql = "SELECT * FROM {$table}flash ORDER BY flaorder,id";
		$res = $db->query($sql);
		$flash = array();
		while($row = $db->fetchRow($res)) {
			$flash[]      = $row;
		}
		$action = array('name'=>'����flash', 'href'=>'flash.php?act=add');
		include tpl('list_flash');
	break;

	case 'add':
		$maxorder = $db->getOne("SELECT MAX(flaorder) FROM {$table}flash");
		$maxorder = $maxorder + 1;
		$action = array('name'=>'flash�б�', 'href'=>'flash.php?act=list');
		include tpl('add_flash');
	break;

	case 'insert':
		if(empty($_REQUEST['url']))show('���Ӳ���Ϊ��');
		if(empty($_FILES['file']['name']))
        {
			show('û���ϴ�ͼƬ');
		}
		else
		{	
			$alled = array('png','jpg','gif','jpeg');
			$exname = strtolower(trim(substr(strrchr($_FILES['file']['name'], '.'), 1)));
			if(checkupfile($_FILES['file']['name']) && ($_FILES['file']['name'] != 'none' && $_FILES['file']['name'] ) || $_FILES['file']['size']<'523298' && in_array($exname,$alled)){
				
				$name = date('Ymd');
				for($i = 0;$i < 6;$i++) {
					$name .= chr(mt_rand(97, 122));
				}
				$name .= '.' . end(explode('.', $_FILES['file']['name']));
				$to    = PHPMPS_ROOT . 'data/flashimage/' . $name;

				if (move_uploaded_file($_FILES['file']['tmp_name'], $to)){
					$image = "data/flashimage/" . $name;
				}
			} else {
				show('ͼƬ��ʽ����ȷ');
			}
        }
		$url = trim($_REQUEST['url']);
		$flaorder = intval($_REQUEST['order']);
		$sql = "INSERT INTO {$table}flash (image,url,flaorder) VALUES ('$image','$url','$flaorder');";
		$res = $db->query($sql);
		$res ? $msg = "���ӳɹ�" : $msg = "����ʧ��";
		clear_caches('phpcache', 'flash');

		admin_log("����flash $name �ɹ�");
		show($msg, 'flash.php?act=add');
	break;
	
	case 'edit':
		$id  = intval($_REQUEST['id']);
		$sql = "SELECT * FROM {$table}flash WHERE id = '$id' ";
		$flash = $db->getRow($sql);
		include tpl('edit_flash');
	break;

	case 'update':
		if(empty($_REQUEST['url']))show('���Ӳ���Ϊ��');
		if(empty($_FILES['file']['name']) && empty($_REQUEST['fileurl'])) {
			show('û���ϴ�ͼƬ');
		}
		if(!empty($_FILES['file']['name'])) {

			$alled = array('png','jpg','gif','jpeg');
			$exname = strtolower(trim(substr(strrchr($_FILES['file']['name'], '.'), 1)));
			if(checkupfile($_FILES['file']['name']) && ($_FILES['file']['name'] != 'none' && $_FILES['file']['name'] ) || $_FILES['file']['size']<'523298' && in_array($exname,$alled)){

				$name = date('Ymd');
				for($i = 0;$i < 6;$i++) {
					$name .= chr(mt_rand(97, 122));
				}
				$name .= '.' . end(explode('.', $_FILES['file']['name']));
				$to    = PHPMPS_ROOT . 'data/flashimage/' . $name;

				if (move_uploaded_file($_FILES['file']['tmp_name'], $to)){
					$image = "data/flashimage/" . $name;
				}
				if($_REQUEST['fileurl'] != '' && is_file('../'.$_REQUEST['fileurl'])) {
					@unlink('../'.$_REQUEST['fileurl']);
				}
			} else {
				show('ͼƬ��ʽ����ȷ');
			}
        }else{
			$image = $_REQUEST['fileurl'];
		}
		$url = trim($_REQUEST['url']);
		$flaorder = intval($_REQUEST['order']);
		$id  = intval($_REQUEST['id']);
		$sql = "UPDATE {$table}flash SET image='$image',url='$url',flaorder='$flaorder' WHERE id = '$id' ";
		$res = $db->query($sql);
		$res ? $msg = "�޸ĳɹ�" : $msg = "�޸�ʧ��";
		clear_caches('phpcache', 'flash');

		admin_log("flash $image $msg");
		show($msg, 'flash.php?act=list');
	break;

	case 'delete':
		$id = intval($_REQUEST['id']);
		if(empty($id))show('û��ѡ���¼');
		$sql = "SELECT image FROM {$table}flash WHERE id='$id' ";
		$image = $db->getOne($sql);
		if($image != '' && is_file(PHPMPS_ROOT.$image)) {
			@unlink(PHPMPS_ROOT.$image);
		}
		$sql = "DELETE FROM {$table}flash WHERE id='$id'";
	    $res = $db->query($sql);
		$res ? $msg = "�޸ĳɹ�" : $msg = "�޸�ʧ��";
		clear_caches('phpcache', 'flash');
		admin_log("flash $name $msg");
		show('ɾ��flash�ɹ�', 'flash.php?act=list');
	break;
}
?>