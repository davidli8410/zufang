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
var address = '��Ϣ���ڵ�';
function checkcomment()
{
if(document.comment.content.value==""){
alert('�������������ݣ�');
document.comment.content.focus();
return false;
}
if(document.comment.checkcode.value==""){
alert('��������֤�룡');
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
alert("��ѡ���������");
return false;
}
}
function chktype()
{
if(document.form3.password.value==""){
alert('���������룡');
document.form3.password.focus();
return false;
}
if(document.form3.act.value=="delinfo"){
return confirm('ȷ��Ҫɾ���𣿴˲������ɻָ���')
}
}
</script>
</head>
<body class="home-page">

<?php include template(header); ?>

<!-- ���� -->
<div class="container main-shadow">

<?php include template(here); ?>

<div class="clearfix">
<div class="col_main">
<div class="page_title">
<div class="clearfix"><span class="rc_bg"></span>
<span class="left"><span class="title"><?php echo $title;?></span>����Ϣ��ţ�<span class="yellow_skin"><?php echo $id;?></span></span>
</div>
<div class="clearfix" style="margin-top:8px;">
<span class="left"> &nbsp;<?php echo $postdate;?> <span class="red_skin"><?php echo $infousername;?></span>������ ��Ч�ڣ�<?php echo $lastdate;?></span>
<span class="right">
<ul class="menu clearfix">
<li class="text">�Ѿ����Ķ�<span class="yellow_skin"><?php echo $click;?></span>��</li>
<li><a href="javascript:copyToClipBoard();" class="send">ת ��</a></li>
<li><a href="#replay" class="reply">�� ��</a></li>
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
<td align="right" bgcolor="#eff1f7" width="100px"><b><?php echo $val['name'];?>��</b></td>
<td align="left"><?php echo $val['value'];?>&nbsp;&nbsp;<?php echo $val['unit'];?></td>
  </tr>
  
<?php } ?>

</table>
</div>
 
<div class="cont_main">
<b>���飺</b><?php echo $content;?><br />
<?php if($images) { ?>
<ul class="pic_list clearfix">
<?php if(is_array($images)) foreach($images AS $val) { ?>
<li><a href=<?php echo $val['path'];?> target="_blank" ><img src=<?php echo $val['path'];?> class="postinfoimg" alt="" border=0 width="100px" height="90px" /></a></li>

<?php } ?>

</ul>
<?php } ?>
</div>
<!-- ��ϵ��ʽ -->
<div class="content_box">
<table width="100%" class="table_2" border="0" cellspacing="0" cellpadding="0">
  <tr>
<td width="50%"><b>��ϵ�ˣ�</b><?php echo $linkman;?></td>
<td width="50%"><b>�绰��</b><?php echo $phone;?> &nbsp;
<?php if($phone) { ?><input type="button" onclick="window.open('http://www.ip138.com:8080/search.asp?action=mobile&mobile=<?php echo $phone_c;?>')" value="�鿴������"><?php } ?></td>
  </tr>
  <tr>
<td><b>QQ��</b><?php echo $qq;?>
<?php if($qq) { ?><?php if($CFG['visitor_view']) { ?><script language=javascript src="js.php?act=qq&qq=<?php echo $js_qq;?>"></script>
<?php } ?><?php } ?></td>
<td><b>���䣺</b><?php echo $email;?></td>
  </tr>
  <tr>
<td><b>��ϵ��ַ��</b><?php echo $address;?></td>
<td><b>���������ڵ���</b>(�����ο�)<b>��</b><span class="blue_skin"><?php echo $postarea;?></span></td>
  </tr>
</table>
</div>
<!-- ���� -->
<div class="comment_box">
<div class="hd"><span class="title">���ѻظ�</span></div>
<div class="bd">
<div class="comment_zone" id="showcomment">
���ڼ������ݣ����Ե�......
</div>
<div class="comment_write">
<form name="comment" action="member.php?act=comment" method="post" onsubmit="return checkcomment();" style="margin:0" >
<a name="replay"></a>
<textarea name="content" cols="" class="comment_input" rows=""></textarea>
<div class="clearfix comment_login"><span class="left">��֤�룺<input name=checkcode  type=text id=checkcode size="10" maxlength="5" onfocus='get_code();this.onfocus=null;' />
&nbsp;<span id=imgid></span></span>
<span class="left"><input name="" value="�� ��" type="submit" />
<input type=hidden name=id value=<?=$id?> ><span id="checkshop"> (ע�⣺����300����)</span></span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col_sub">
<div class="category_menu">
<div class="hd">�༭��Ϣ</div>
<div class="bd">
<?php if($infouserid>0 && $infouserid==$_userid) { ?>
<span>�༭��<a href="member.php?act=editinfo&id=<?=$id?>">�޸�</a>|<a href="member.php?act=delinfo&id=<?=$id?>" onClick="if(!confirm('ȷ��Ҫɾ����\n\n�˲��������Իָ���'))return false;">ɾ��</a>|<a href="member.php?act=refer&id=<?=$id?>">һ������</a>|<a href="member.php?act=top&id=<?=$id?>">�ö�</a></span>
<?php } else { ?>
<form name=form3 action="member.php?act=editinfo" method=post>����: 
<input name=password type=password id=delpass size="10" maxLength=20>
<select name="act" id="act">
  <option value="delinfo">ɾ��</option>
  <option value="editinfo">�޸�</option>
</select>
<input onClick="return chktype();" type=submit value="�ύ" name=submit>
<input type=hidden name=id value=<?php echo $id;?> />
</form>
<?php } ?>
</div>
</div>
<!-- ��Ϣ��ͼ -->
<?php if($mappoint) { ?>
<div class="searchz_box">
<div class="hd">��Ϣ��ͼ</div>
<div class="bd">
<iframe id="map_iframe" src="do.php?act=small_map&show=1&p=<?php echo $CFG['map'];?>&width=220&height=212" frameborder="0" scrolling="no" width="220" height="212"></iframe>
</div>
</div>
<?php } ?>
<!-- �����Ϣ -->
<?php if($match_info) { ?>
<div class="searchz_box">
<div class="hd">�����Ϣ</div>
<div class="bd">
<ul>
<?php if(is_array($match_info)) foreach($match_info AS $val) { ?>
<li><a href="<?php echo $val['url'];?>" target=_blank><?php echo $val['title'];?></a></li>

<?php } ?>

</ul>
</div>
</div>
<?php } ?>
<!-- �����ʼ� -->
<?php if($CFG['sendmailtype'] && $crypt_email) { ?>
<div class="searchz_box">
<div class="hd">�����ʼ�</div>
<div class="bd">
<form name="send" method="post" action="member.php?act=send_info_mail" >
���⣺<br><input type="text" name="title" size="35" /><br>
���ݣ�<br><textarea name="content" cols='35' rows="5"></textarea><br>
<input type="hidden" name="email" value="<?php echo $crypt_email;?>" />
<input type="submit" name="submit" value="����" />
</form>
</div>
</div>
<?php } ?>
<!-- �ٱ� -->
<div class="service_box">
<span class="tp_bg"></span>
<div class="bd">
<div class="blank10"></div>
 <form name="report" method="post" action="member.php" onsubmit="return chkreport()">
   ���������������Ϣ�����⣬��ٱ���
<input type="radio" name="types" value="1">�Ƿ���Ϣ
<input type="radio" name="types" value="2">������� <br />
<input type="radio" name="types" value="3">�н���Ϣ
<input type="radio" name="types" value="4">��ϢʧЧ<br />
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="act" value="report">
<input type="submit" name="submit" value="�ύ">
  </form>
</div>
<span class="ft_bg"></span>
</div>

</div>
</div>
</div>
<!-- ���� -->
<iframe id="icomment" name="icomment" src="comment.php?infoid=<?=$id?>" frameborder="0" scrolling="no" width="0" height=0></iframe>

<?php include template(footer); ?>

</body>
</html>
