<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<title><?php echo $seo['title'];?></title>
<meta name="Keywords" content="<?php echo $seo['keywords'];?>">
<meta name="Description" content="<?php echo $seo['description'];?>">
<link href="templates/<?php echo $CFG['tplname'];?>/style/reset.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/category.css" type="text/css" rel="stylesheet" />
<script src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body class="home-page">
<div class="wrapper">

<?php include template(header); ?>

<!-- ���� -->
<div id="content">

<?php include template(here); ?>

<div class="page_cont clearfix">
<div class="col_sub">
<!-- ����б� -->
<!-- ��ϸ���� -->
<div class="searchz_box">
<div class="hd">��ϸ����</div>
<div class="bd">
<form action="search.php" method="post" name="search" >
<ul>
<li>���ࣺ<?php echo $s_cat;?></li>
<li>������<?php echo $s_area;?></li>
<?php if(is_array($cat_custom)) foreach($cat_custom AS $item) { ?>
<li><?php echo $item['cusname'];?>��<?php echo $item['html'];?> <?php echo $item['unit'];?></li>

<?php } ?>

<li>�ؼ��֣�<input type="text" name="keywords" /></li>
<li style="text-align:center;">
<input type="submit" name="Submit" value=" �� �� " />
<input type="hidden" name="default_cat" value="<?php echo $catid;?>" />
<input type="hidden" name="default_area" value="<?php echo $areaid;?>" />
</li>
</ul>
</form>
</div>
</div>
<!-- ������Ϣ -->
<div class="searchz_box">
<div class="hd">������Ϣ</div>
<div class="bd tiexin" style="padding:8px;">
<ul>
<?php if(is_array($cat_hot)) foreach($cat_hot AS $hot) { ?>
<li><a href="<?php echo $hot['url'];?>" target="_blank"><?php echo $hot['title'];?></a></li>

<?php } ?>

</ul>
</div>
</div>
</div>
<div class="col_main bg_close" id="node_box">
<div class="mainBar">
<!-- ͷ��ѡ�� --> 
<div class="top_selsct">
<?php if($cat_arr || $area_arr) { ?>
<ul class="clearfix">
<?php if($cat_arr) { ?>
<div class="address">������ң�
<?php if(is_array($cat_arr)) foreach($cat_arr AS $val) { ?>
<a href=<?php echo $val['url'];?>> <?php echo $val['catname'];?></a>&nbsp;

<?php } ?>

</div>
<?php } ?>
<?php if($area_arr) { ?>
<div class="address">������ң�
<?php if(is_array($area_arr)) foreach($area_arr AS $val) { ?>
<a href=<?php echo $val['url'];?>> <?php echo $val['areaname'];?></a>&nbsp;

<?php } ?>

</div>
<?php } ?>
</ul>
<?php } ?>
<div>
         </div>
</div>

<!-- �����б� -->
<div class="zone clearfix" id="node_bg">

<?php if(is_array($top_info)) foreach($top_info AS $article) { ?>
<div class="list_module bg2">
  <div class="hd clearfix">
  <span class="right_f"><b class="time"><?php echo $article['postdate'];?></b>����</span>
  <span class="lou">�ö�</span>
  <span class="title"><a href="<?php echo $article['url'];?>" target="_blank"><?php echo $article['title'];?></a></span>
  <span class="smallClass"><?php echo $article['catname'];?></span>
  </div>
  <div class="bd clearfix">
<div class="pic"><?php if($article[thumb]) { ?><img src="<?php echo $article['thumb'];?>" width=55 height=55/><?php } ?></div>
<div class="cont">
  <div class="info"><?php echo $article['intro'];?></div>
  <div class="ft">
  ������<b><?php echo $article['areaname'];?></b>&nbsp;
  <?php if(is_array($article[custom])) foreach($article[custom] AS $cus) { ?> <?php echo $cus['cusname'];?>��<b><?php echo $cus['cusvalue'];?></b>&nbsp;
  
<?php } ?>

  </div>
</div>
  </div></div>

<?php } ?>

<?php if(is_array($info)) foreach($info AS $val) { ?>
<div class="list_module bg">
  <div class="hd clearfix">
  <span class="right_f"><b class="time"><?php echo $val['postdate'];?></b>����</span>
  <span class="title"><a href="<?php echo $val['url'];?>" target="_blank"><?php echo $val['title'];?></a></span>
  <span class="smallClass"><?php echo $val['catname'];?></span>
  </div>
  <div class="bd clearfix">
<div class="pic"><?php if($val[thumb]) { ?><img src="<?php echo $val['thumb'];?>" width=55 height=55/><?php } ?></div>
<div class="cont">
  <div class="info"><?php echo $val['intro'];?></div>
  <div class="ft">
  ������<b><?php echo $val['areaname'];?></b>&nbsp;
  <?php if(is_array($val[custom])) foreach($val[custom] AS $cus) { ?> <?php echo $cus['cusname'];?>��<b><?php echo $cus['cusvalue'];?></b>&nbsp;
  
<?php } ?>

  </div>
</div>
  </div></div>

<?php } ?>


<div class="pagination_module clearfix" style="margin-top:7px;">
<span class="right2"><a href="#top" style="border:0; color:#36c;">���ض��� ��</a></span>
<span class="right2" style="float:left;">
<?php include template(page); ?>
</span></span>	

</div>
</div>
</div>

</div>
</div>
</div>
<!-- ���� ���� -->

<?php include template(footer); ?>

</div>
</body>
</html>
