<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<title><?php echo $seo['title'];?></title>
<meta name="Keywords" content="<?php echo $seo['keywords'];?>">
<meta name="Description" content="<?php echo $seo['description'];?>">
<link href="templates/<?php echo $CFG['tplname'];?>/style/reset.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/fac.css" type="text/css" rel="stylesheet" />
<script src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<body class="home-page">
<div class="wrapper">

<?php include template(header); ?>

<!-- 主体 -->
<div id="content">
<div class="thd clearfix">
便民电话
</div>
<div class="fbd">
<div class="infophpmps">
<ul class="clearfix">
<?php if(is_array($fac_list)) foreach($fac_list AS $val) { ?>
<li><b><?php echo $val['title'];?></b>：<?php echo $val['phone'];?>&nbsp;&nbsp;&nbsp;&nbsp;</li>

<?php } ?>
		
</ul>
</div>
</div>
</div>
<!-- 主体 结束 -->

<?php include template(footer); ?>

</div><div id="mask" style="display:none"></div>
</body>
</html>
