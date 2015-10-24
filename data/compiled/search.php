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
<div class="page_cont clearfix">
<div class="col_sub">
<!-- ������Ϣ -->
<div class="searchz_box">
<div class="hd">������Ϣ</div>
<div class="bd tiexin" style="padding:8px;">
<ul>
<?php if(is_array($cat_hot)) foreach($cat_hot AS $hot) { ?>
<li><a href="<?php echo $hot['url'];?>" target=_blank><?php echo $hot['title'];?></a></li>

<?php } ?>

</ul>
</div>
</div>
</div>
<div class="col_main bg_close" id="node_box">
<div class="mainBar">
<!-- ͷ��ѡ�� -->
<div class="top_selsct">
<div>
         </div>
</div>

<!-- �����б� -->
<div class="zone clearfix" id="node_bg">
<?php if(is_array($articles)) foreach($articles AS $article) { ?>
<div class="list_module bg">
  <div class="hd clearfix">
  <span class="right_f"><b class="time"><?php echo $article['postdate'];?></b>����</span>
  <span class="title"><a href="<?php echo $article['url'];?>" target="_target" ><?php echo $article['title'];?></a></span>
  <span class="smallClass"><?php echo $article['catname'];?></span>
  </div>
  <div class="bd clearfix">
<div class="pic"></div>
<div class="cont">
  <div class="info"><?php echo $article['intro'];?></div>
  <div class="ft">
  ������<b><?php echo $article['areaname'];?></b>
  <?php if(is_array($article[custom])) foreach($article[custom] AS $cus) { ?> <?php echo $cus['cusname'];?>��<b><?php echo $cus['cusvalue'];?></b>
  
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

<script type="text/javascript">
$(document).ready(function(){
$('.list_module').hover(
function() {
$(this).addClass("orange");
}, 
function() {
$(this).removeClass("orange");
});
});
</script>

</body>
</html>
