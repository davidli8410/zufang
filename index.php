<?php
define('IN_PHPMPS', true);
require dirname(__FILE__) . '/include/common.php';

//$count = $db->getOne("select count(*) from {$table}info where is_check=1");
//$today_count = $db->getOne("select count(*) from {$table}info where is_check=1 and postdate>".mktime(0,0,0));
$sql = "select catid,count(*) as num from {$table}info where is_check=1 group by catid ";
$counts = $db->getAll($sql);
$info_count = array();
foreach($counts as $k=>$v) { $info_count[$v['catid']] = $v['num']; }

$flash = get_flash();//����ͼ
$fac   = get_fac('20');//������Ϣ
$links = get_link_list();//��������
$helps = get_index_help('5');//��ҳ����
$coms  = get_index_com('7');//��ҳ��Ҷ

$articles   = get_index_article('7');//����
$comments   = get_new_comment('6');//����������Ϣ
$new_info   = get_info('','','10','','date','10');//������Ϣ
$pro_info   = get_info('','','10','pro','','10');//�Ƽ���Ϣ
$hot_info   = get_info('','','10','','click', '10', '','m-d');//������Ϣ
$thumb_info = get_info('','','7','','date','9','1');//ͼƬ��Ϣ

$seo['title'] = $CFG['webname'] . ' - Powered by Phpmps';
$seo['keywords'] = $CFG['keywords'];
$seo['description'] = $CFG['description'];

include template('index');
?>