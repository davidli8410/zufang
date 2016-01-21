<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<title><?php echo $seo['title'];?></title>
<meta name="Keywords" content="<?php echo $seo['keywords'];?>">
<meta name="Description" content="<?php echo $seo['description'];?>">
<link href="templates/<?php echo $CFG['tplname'];?>/style/reset.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/help.css" type="text/css" rel="stylesheet" />
<script src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body class="home-page">
<div class="wrapper">

<?php include template(header); ?>

<!-- 主体 -->
<div id="content">
<div class="top_nav_box clearfix">
<div class="center_module">
<ul class="clearfix">
<?php if(is_array($type)) foreach($type AS $val) { ?>
<li><a href="<?php echo $val['url'];?>"><?php echo $val['typename'];?></a></li>

<?php } ?>

</ul>
</div>

</div>
<div class="line_height"></div>
<div class="list_test">
<ul class="clearfix">
<?php if(is_array($helps)) foreach($helps AS $help) { ?>
<li><a href="<?php echo $help['url'];?>" title="<?php echo $help['title'];?>"><?php echo $help['stitle'];?></a></li>

<?php } ?>

</ul>
</div>
<div>
<?php include template(page); ?>
</div>
</div>
<!-- 主体 结束 -->

<?php include template(footer); ?>

</div>
</body>
</html>