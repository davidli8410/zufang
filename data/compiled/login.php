<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<title>��Ա��½</title>
<meta http-equiv="Content-Type" content="text/html"></meta>
<link href="templates/<?php echo $CFG['tplname'];?>/style/reset.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/reg.css" type="text/css" rel="stylesheet" />
<link href="templates/<?php echo $CFG['tplname'];?>/style/category.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/validator/validator.min.js"></script>
<link href="js/validator/validator.css" type="text/css" rel="stylesheet" />
</head>
<div class="wrapper">

<?php include template(header); ?>

<!-- ���� -->
<div id="content">
<div id="regk">
<form name="form1" method="post" action="member.php?act=act_login" >
<div id="regz"> �û���½��</div>
<div class="regc">
<div class="regc_1 clearfix"><span class="left"><span class="red">*</span>�û�����</span><input class="input0" type="text" id="username" name="username" /></div>
<div class="regc_1 clearfix"><span class="left"><span class="red">*</span>���룺</span><input class="input0" type="password" id="password" name="password" /></div>
<div class="regc_1 clearfix"><span class="left"><span class="red">*</span>������֤</span>
                <input type="text" name="answer" id="answer" size="20" class="textInt"/>
<input type="hidden" id="vid" name="vid" value=<?php echo $verf['vid'];?> />
���⣺<?php echo $verf['question'];?>��&nbsp;<span id=imgid></span><span id=c_checkver></span>
</div>
<div class="regc_1 clearfix">
<input type="hidden" name="refer" value="<?php echo $refer;?>" />
<input type="submit" id="submit" name="submit" value="��¼" />&nbsp;&nbsp;��û���˺ţ��� <a href="member.php?act=register" >ע��</a>&nbsp;&nbsp;&nbsp;&nbsp;�������룿<a href="member.php?act=get_password">��˴�</a>�һ�
</div>
</div>
</form>
</div>
</div>

<!-- //  -->
<div class="phpmpslogin">
<?php include template(footer); ?>
</div>
<script type="text/javascript">
$.validator("username")
.setRequired("����д�û�����")
.setServerCharset("GBK")
.setStrlenType("byte")

$.validator("password")
.setRequired("����д���롣")
.setServerCharset("gbk")
.setStrlenType("symbol")

$.validator("answer")
.setRequired("����д������֤��")
.setAjax("do.php?act=ver&vid="+$('#vid').val(), "�ش���ȷ��");
</script>
</body>
</html>