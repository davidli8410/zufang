<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<title><?php echo $seo['title'];?></title>
<meta name="Keywords" content="<?php echo $seo['keywords'];?>">
<meta name="Description" content="<?php echo $seo['description'];?>">
<link href="templates/<?php echo $CFG['tplname'];?>/style/reset.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/post.css" type="text/css" rel="stylesheet" />
<script src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<body class="home-page">
<div class="wrapper">

<?php include template(header); ?>

<!-- ���� -->
<div id="content">
<div class="thd clearfix"><b>�������裺</b><span class="current">1.ѡ�����</span><span>2.��д����</span><span>3.�������</span></div>
<div class="fbd">
<div class="tips">
1��ֻ������<b class="red_skin"><?php echo $city;?></b>���������Ϣ<br />
2���벻Ҫ���ⷢ��������Ϣ�������Ϣ���ظ���Ϣ<br />
3��������Ϣ���������ϸ������л����񹲺͹����з��ɷ��漰���ء�����ҵ��ع涨���Ͻ����������κ�Υ����Υ��ɫ�ʵ���Ϣ<br />
4����Ϣ�����߱������ж���Ϣ����Ч�ԡ���ʵ�Գе�һ������
</div>
<div class="infophpmps">
<?php if(is_array($cats)) foreach($cats AS $cat) { ?>
<ul class="clearfix">
<div class="infobt"><?php echo $cat['catname'];?>��</div>
<?php if(!empty($cat[children])) { ?>
<?php if(is_array($cat[children])) foreach($cat[children] AS $chi) { ?>
<li><a href="<?php echo $CFG['postfile'];?>?act=post&id=<?=$chi['id']?>" ><?php echo $chi['name'];?></a></li>

<?php } ?>

<?php } ?>
</ul>

<?php } ?>

</div>
</div>
</div>
<!-- ���� ���� -->

<?php include template(footer); ?>

</div><div id="mask" style="display:none"></div>

</body>
</html>
