<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<title><?php echo $seo['title'];?></title>
<meta name="Keywords" content="<?php echo $seo['keywords'];?>">
<meta name="Description" content="<?php echo $seo['description'];?>">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/css/fang.css" type="text/css">

<script src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<!-- phpmps -->
<script>
var lng = '<?php echo $mappoint['0'];?>';
var lat = '<?php echo $mappoint['1'];?>';
var address = '信息所在地';
function checkcomment()
{
if(document.comment.content.value==""){
alert('请输入评论内容！');
document.comment.content.focus();
return false;
}
if(document.comment.checkcode.value==""){
alert('请输入验证码！');
document.comment.checkcode.focus();
return false;
}
}
function chkreport()
{
var radios = document.getElementsByName("types"); 
var resualt = false;
for(i=0;i<radios.length;i++)
{
if(radios[i].checked)
{
    resualt = true;
}
}
if(!resualt)
{   
alert("请选择错误类型");
return false;
}
}
function chktype()
{
if(document.form3.password.value==""){
alert('请输入密码！');
document.form3.password.focus();
return false;
}
if(document.form3.act.value=="delinfo"){
return confirm('确认要删除吗？此操作不可恢复！')
}
}
</script>
</head>
<body class="home-page">

<?php include template(header); ?>

<!-- 主体 -->
<div class="container main-shadow">

<?php include template(here); ?>

<div class="clearfix">
<div class="col_main">
<div class="page_title">
<div class="clearfix"><span class="rc_bg"></span>
<span class="left"><span class="title"><?php echo $title;?></span>　信息编号：<span class="yellow_skin"><?php echo $id;?></span></span>
</div>
<div class="clearfix" style="margin-top:8px;">
<span class="left"> &nbsp;<?php echo $postdate;?> <span class="red_skin"><?php echo $infousername;?></span>发布， 有效期：<?php echo $lastdate;?></span>
<span class="right">
<ul class="menu clearfix">
<li class="text">已经被阅读<span class="yellow_skin"><?php echo $click;?></span>次</li>
<li><a href="javascript:copyToClipBoard();" class="send">转 发</a></li>
<li><a href="#replay" class="reply">回 复</a></li>
</ul>
</span>
</div>
</div>
<!---->
<div class="page_cont">
<div class="top_table">
<table width="100%" class="table_1" border="0" cellspacing="0">
  <?php if(is_array($custom)) foreach($custom AS $val) { ?>
  <tr>
<td align="right" bgcolor="#eff1f7" width="100px"><b><?php echo $val['name'];?>：</b></td>
<td align="left"><?php echo $val['value'];?>&nbsp;&nbsp;<?php echo $val['unit'];?></td>
  </tr>
  
<?php } ?>

</table>
</div>
 
<div class="cont_main">
<b>详情：</b><?php echo $content;?><br />
<?php if($images) { ?>
<ul class="pic_list clearfix">
<?php if(is_array($images)) foreach($images AS $val) { ?>
<li><a href=<?php echo $val['path'];?> target="_blank" ><img src=<?php echo $val['path'];?> class="postinfoimg" alt="" border=0 width="100px" height="90px" /></a></li>

<?php } ?>

</ul>
<?php } ?>
</div>
<!-- 联系方式 -->
<div class="content_box">
<table width="100%" class="table_2" border="0" cellspacing="0" cellpadding="0">
  <tr>
<td width="50%"><b>联系人：</b><?php echo $linkman;?></td>
<td width="50%"><b>电话：</b><?php echo $phone;?> &nbsp;
<?php if($phone) { ?><input type="button" onclick="window.open('http://www.ip138.com:8080/search.asp?action=mobile&mobile=<?php echo $phone_c;?>')" value="查看归属地"><?php } ?></td>
  </tr>
  <tr>
<td><b>QQ：</b><?php echo $qq;?>
<?php if($qq) { ?><?php if($CFG['visitor_view']) { ?><script language=javascript src="js.php?act=qq&qq=<?php echo $js_qq;?>"></script>
<?php } ?><?php } ?></td>
<td><b>邮箱：</b><?php echo $email;?></td>
  </tr>
  <tr>
<td><b>联系地址：</b><?php echo $address;?></td>
<td><b>发布者所在地区</b>(仅供参考)<b>：</b><span class="blue_skin"><?php echo $postarea;?></span></td>
  </tr>
</table>
</div>
<!-- 评论 -->
<div class="comment_box">
<div class="hd"><span class="title">网友回复</span></div>
<div class="bd">
<div class="comment_zone" id="showcomment">
正在加载数据，请稍等......
</div>
<div class="comment_write">
<form name="comment" action="member.php?act=comment" method="post" onsubmit="return checkcomment();" style="margin:0" >
<a name="replay"></a>
<textarea name="content" cols="" class="comment_input" rows=""></textarea>
<div class="clearfix comment_login"><span class="left">验证码：<input name=checkcode  type=text id=checkcode size="10" maxlength="5" onfocus='get_code();this.onfocus=null;' />
&nbsp;<span id=imgid></span></span>
<span class="left"><input name="" value="提 交" type="submit" />
<input type=hidden name=id value=<?=$id?> ><span id="checkshop"> (注意：仅限300汉字)</span></span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col_sub">
<div class="category_menu">
<div class="hd">编辑信息</div>
<div class="bd">
<?php if($infouserid>0 && $infouserid==$_userid) { ?>
<span>编辑：<a href="member.php?act=editinfo&id=<?=$id?>">修改</a>|<a href="member.php?act=delinfo&id=<?=$id?>" onClick="if(!confirm('确定要删除吗？\n\n此操作不可以恢复！'))return false;">删除</a>|<a href="member.php?act=refer&id=<?=$id?>">一键更新</a>|<a href="member.php?act=top&id=<?=$id?>">置顶</a></span>
<?php } else { ?>
<form name=form3 action="member.php?act=editinfo" method=post>密码: 
<input name=password type=password id=delpass size="10" maxLength=20>
<select name="act" id="act">
  <option value="delinfo">删除</option>
  <option value="editinfo">修改</option>
</select>
<input onClick="return chktype();" type=submit value="提交" name=submit>
<input type=hidden name=id value=<?php echo $id;?> />
</form>
<?php } ?>
</div>
</div>
<!-- 信息地图 -->
<?php if($mappoint) { ?>
<div class="searchz_box">
<div class="hd">信息地图</div>
<div class="bd">
<iframe id="map_iframe" src="do.php?act=small_map&show=1&p=<?php echo $CFG['map'];?>&width=220&height=212" frameborder="0" scrolling="no" width="220" height="212"></iframe>
</div>
</div>
<?php } ?>
<!-- 相关信息 -->
<?php if($match_info) { ?>
<div class="searchz_box">
<div class="hd">相关信息</div>
<div class="bd">
<ul>
<?php if(is_array($match_info)) foreach($match_info AS $val) { ?>
<li><a href="<?php echo $val['url'];?>" target=_blank><?php echo $val['title'];?></a></li>

<?php } ?>

</ul>
</div>
</div>
<?php } ?>
<!-- 发送邮件 -->
<?php if($CFG['sendmailtype'] && $crypt_email) { ?>
<div class="searchz_box">
<div class="hd">发送邮件</div>
<div class="bd">
<form name="send" method="post" action="member.php?act=send_info_mail" >
标题：<br><input type="text" name="title" size="35" /><br>
内容：<br><textarea name="content" cols='35' rows="5"></textarea><br>
<input type="hidden" name="email" value="<?php echo $crypt_email;?>" />
<input type="submit" name="submit" value="发送" />
</form>
</div>
</div>
<?php } ?>
<!-- 举报 -->
<div class="service_box">
<span class="tp_bg"></span>
<div class="bd">
<div class="blank10"></div>
 <form name="report" method="post" action="member.php" onsubmit="return chkreport()">
   如果您发现这条信息有问题，请举报。
<input type="radio" name="types" value="1">非法信息
<input type="radio" name="types" value="2">分类错误 <br />
<input type="radio" name="types" value="3">中介信息
<input type="radio" name="types" value="4">信息失效<br />
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="act" value="report">
<input type="submit" name="submit" value="提交">
  </form>
</div>
<span class="ft_bg"></span>
</div>

</div>
</div>
</div>
<!-- 评论 -->
<iframe id="icomment" name="icomment" src="comment.php?infoid=<?=$id?>" frameborder="0" scrolling="no" width="0" height=0></iframe>

<?php include template(footer); ?>

</body>
</html>
