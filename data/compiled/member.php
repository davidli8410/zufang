<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<title><?php echo $seo['title'];?></title>
<meta name="Keywords" content="<?php echo $seo['keywords'];?>">
<meta name="Description" content="<?php echo $seo['description'];?>">
<link href="templates/<?php echo $CFG['tplname'];?>/style/reset.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/user.css" type="text/css" rel="stylesheet" />
<script src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body class="home-page">
<div class="wrapper">

<?php include template(header); ?>

<!-- ���� -->
<div id="content" class="clearfix">
<div class="col_main">
<!-- ��Ա���� ��ʼ -->
<div class="user_info clearfix">
<div class="pic"></div>
<div class="info_cont">
<p><span class="blue_skin"><?php echo $_username;?></span>������</p>
<p>ע��ʱ�䣺<?php echo date('Y-m-d H:i:s',$userinfo['registertime']);?>����<span style="color:#999;">����½��<?php echo date('Y-m-d H:i:s',$userinfo['lastlogintime']);?></span></p>
<p><a href="member.php?act=modify" class="green_menu menu_info">��������</a><a href="member.php?act=edit_password" class="green_menu menu_info">�޸�����</a></p>
</div>

</div>
<!-- ��Ա���� ���� -->
<!-- ������Ϣ ��ʼ -->
<div class="count_box">
<div class="hd">������Ϣ</div>
<div class="bd">
<p>���ƣ�<b><?php echo $userinfo['username'];?></b></p>
<p>���֣�<b><?php echo $userinfo['credit'];?></b> �� ��<a href="member.php?act=credit_rule">�˽���ֹ���</a>��</p>
<p>��Ϣ�ң�<b><?php echo $userinfo['gold'];?></b> ö ��<a href="member.php?act=gold">����/�һ�</a>��</p>
<p>�ʽ�<b><?php echo $userinfo['money'];?></b> Ԫ ��<a href="member.php?act=payonline">��ֵ</a>��</p>
<p>
���䣺<b><?php echo $userinfo['email'];?></b> <?php if(!$status) { ?><a href='member.php?act=send_check_email'>����֤���䡿</a><?php } ?>&nbsp;&nbsp;
�绰��<b><?php echo $userinfo['phone'];?></b> &nbsp;&nbsp;
QQ��<b><?php echo $userinfo['qq'];?></b>
</p>
<p>��ַ��<b><?php echo $userinfo['address'];?></b></p>
<?php if($notice) { ?>
<p>��ȫ���ϣ�������Ϣ�����㡣<a href="member.php?act=modify"><font color=red>[��˲�ȫ����]</font></a></p>
<?php } ?>

</div>
</div>
<!-- �ҵ�ͳ�� ���� -->

</div>
<div class="col_sub">
<!-- ������˵� ��ʼ -->
<div class="side_bar">
<ul>

<?php include template(member_left); ?>

</ul>
</div>
<!-- ������˵� ���� -->
</div>
</div>
<!-- ���� ���� -->

<?php include template(footer); ?>

</div>
</body>
</html>
