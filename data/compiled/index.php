<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>�������ⷿ��,�¿����ⷿ��,�������ѷ���,�¿����ⷿ</title>
<meta content="�������ⷿ,����������,ʨ���ⷿ,�������,����,��Ԣ����,�����ⷿ,�¿����ⷿ,�������ⷿ��,�¿����ⷿ��"
name="keywords">
<meta content="�����������ⷿ��վ����ѷ���������������������Ϣ��house���⡢��Ԣ���⡢������⡢���׳��⡣"
name="description">
<meta content="index,follow" name="robots">
<meta content="index,follow" name="GOOGLEBOT">
<meta content="�������ⷿ" name="Author">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/css/bootstrap.min.css" type="text/css">
<!-- <link rel="shortcut icon" href="http://NZROOM.com/static/img/fav.ico"> -->
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/css/fang.css" type="text/css">

<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/e52a1e59defa.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/cf9075143b4c.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/fang.js"></script>

<script type="text/javascript">

var show_popover = false;
var rental_form_error_str = "����������";
var rental_form_correct_str = "�������/��߼۸�";

var preload = true;
</script>


</head>
<body style="padding-top: 55px;">

<?php include template(header); ?>


<?php include template(login); ?>


<?php include template(register); ?>


<div class="container main-shadow">
<div class="row search-block">
<div class="col-sm-12">

<div class="row search-tab-row">
<ul class="nav nav-tabs" id="searchTab">
<li class="active tab-ui search-tab"><a
href="http://localhost/"
data-toggle="tab"><b>�¿���</b></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane two-level-selection-block active"
id="region-selection">
<div class="two-level-selection-header">
<?php if(is_array($area_parents)) foreach($area_parents AS $val) { ?>
<div class="two-level-selection-item" id="#area_<?php echo $val['areaid'];?>"><?php echo $val['areaname'];?></div>

<?php } ?>

</div>


<?php if(is_array($area_children)) foreach($area_children AS $parent_id => $child) { ?>
<div class="two-level-selection-pane-inactive" id="area_<?php echo $parent_id;?>">
<div class="text-selection-block">
<div class="text-selection-item-selected all-selection"
id="all-region-west">ȫ��</div>
<?php if(is_array($child)) foreach($child AS $val) { ?>
<div class="text-selection-item" id="<?php echo $val['areaname'];?>"><?php echo $val['areaname'];?></div>

<?php } ?>

</div>
</div>

<?php } ?>

</div>
</div>
</div>




<div class="row search-condition-row">
<div class="col-sm-2 col-xs-2 row-title-div">
<span class="search-condition-row-title">����</span>
</div>
<div
class="col-sm-10 col-xs-10 text-selection-block term-selection selection-block">
<div class="text-selection-item-selected" id="any">��������</div>
<div class="text-selection-item" id="month">����</div>
<div class="text-selection-item" id="day">����</div>
</div>
</div>
<div class="row search-condition-row">
<div class="col-sm-2 col-xs-2 row-title-div">
<span class="search-condition-row-title">�۸�</span>
</div>
<div class="col-sm-10 col-xs-10 selection-block">
<form id="rental_form" class="form-inline" action="" role="form">
<div class="form-group price-input-item no-v-margin">
<label class="sr-only" for="min_rental">Minimum Rental</label> <input
type="text" class="form-control input-sm" name="min_rental"
id="min_rental" value="1"
onblur="if (this.value == &#39;&#39;) {this.value = &#39;1&#39;;}"
onfocus="if (this.value == &#39;1&#39;) {this.value = &#39;&#39;;}">
</div>
<div class="price-input-item">
<b style="line-height: 30px; text-align: center;">-</b>
</div>
<div class="form-group price-input-item no-v-margin">
<label class="sr-only" for="max_rental">Maximum Rental</label> <input
type="text" class="form-control input-sm" name="max_rental"
id="max_rental" value="9999"
onblur="if (this.value == &#39;&#39;) {this.value = &#39;9999&#39;;}"
onfocus="if (this.value == &#39;9999&#39;) {this.value = &#39;&#39;;}">
</div>
<div class="checkbox"
style="display: inline-block; vertical-align: top; margin: 5px;">
<label id="label-negotiable"> <input type="checkbox"
id="negotiable-checkbox" checked=""> ����
</label>
</div>
</form>
</div>
</div>
<div class="row search-condition-row">
<div class="col-sm-2 col-xs-2 row-title-div">
<span class="search-condition-row-title">����</span>
</div>
<div
class="col-sm-10 col-xs-10 text-selection-block house-type-selection selection-block">
<div class="text-selection-item-selected" id="any">���ⷿ��</div>
<div class="text-selection-item" id="share">�</div>
<div class="text-selection-item" id="common">��ͨ��</div>
<div class="text-selection-item" id="master">���˷�</div>
<div class="text-selection-item" id="unit">����</div>
<div class="text-selection-item" id="other">����</div>
</div>
</div>
</div>
</div>





<div class="row post-panel">
<div class="col-sm-12">
<div class="result-block" id="post-list">

<?php if(is_array($info)) foreach($info AS $val) { ?>

<div class="row post-block post-block-highlight">
<div class="col-sm-12">
<div class="row">
<div class="col-sm-12 no-h-padding">
<span class="is_top" style="display: inline;">�ö�</span> 
<img src="templates/<?php echo $CFG['tplname'];?>/images/image24.png" height="24" id="img-icon" style="display: inline;">
<?php if($val[thumb]) { ?><img src="<?php echo $val['thumb'];?>" width=55 height=55/><?php } ?>
<a class="post-title" style="display: inline;" href="<?php echo $val['url'];?>" target="_blank"><?php echo $val['title'];?></a>
</div>
</div>
<div class="row">
<div class="col-sm-2 col-xs-4 post-info-item">
<span class="rental-value"><?php echo $val['areaname'];?></span>
</div>
<div class="col-sm-5 col-xs-8 post-info-item">
<span class="post-block-text"><?php echo $val['catname'];?></span>
</div>
<div class="col-sm-2 col-xs-4 post-info-item"
style="text-align: left;">
<span class="rental-value">900</span> <span class="rental-unit">/��</span>
</div>
<div class="col-sm-1 col-xs-2 post-info-item"
style="text-align: left;">
<span class="label label-success" style="display: inline;">����</span>
</div>
<div class="col-sm-2 col-xs-6 post-info-item"
style="text-align: right;">
<span class="post-block-text" style="display: inline; color: rgb(255, 114, 4); font-weight: bold; vertical-align: bottom;"><?php echo $val['postdate'];?></b>����</span>
<img src="templates/<?php echo $CFG['tplname'];?>/images/fire48.png" height="24" id="img-icon" style="display: inline;">
</div>
</div>
</div>
</div>


<?php } ?>


</div>
</div>
<div class="row loadmore-block" id="loadmore-block"
style="cursor: pointer;">
<div class="loadmore-content">
<img src="templates/<?php echo $CFG['tplname'];?>/images/indicator.gif" id="loading-indicator"
style="display: none"><span id="loading-text">����鿴���෿Դ</span>
</div>
</div>
</div>
</div>

<script type="text/javascript">
/* srings for post header loading */
var login_form_inprogress_str = "���ڵ�¼ ...";
var login_form_error_str = "�˺Ż�����������";
var login_form_correct_str = "��¼�ɹ�����ת�� ...";
var login_form_onetime_str = "ʹ��һ���������¼�ɹ����������޸���������";

var login_modal_favorite_msg = "ʹ���ղع�����Ҫ�ȵ�¼�����˺�";
var login_modal_np_msg = "���������Ҫ�ȵ�¼�����˺�";
var login_modal_normal_msg = "��ʹ���������������¼";

var register_form_inprogress_str = "����ע�� ...";
var register_form_email_exist_str = "email�ѱ�ռ�á�"
var register_form_username_exist_str = "�û����ѱ�ռ��"
var register_form_correct_str = "ע��ɹ������ڵ�½ ...";

var forgot_form_inprogress_str = "�����һ����� ...";
var forgot_form_nonexist_str = "�������email�����ڡ�";
var forgot_form_correct_str = "�����Ѿ����������䷢����һ���Ե�¼���루30��������Ч��";

var account_form_inprogress_str = "���ڱ��� ...";
var account_form_username_exist_str = "�û����ѱ�ռ��"
var account_form_correct_str = "�ѱ���";

var email_error_msg = "����������һ����Ч��email��ַ��";
var password_error_msg = "���������4��16���ַ�֮�䡣";
var password_match_error_msg = "���벻ƥ�䡣";
var username_error_msg = "�û���������4��16���ַ�֮�䡣";
var alert_name_error_msg = "�����붩�����ơ�";
var unknown_error_str = "����ʧ�ܡ�������Ļ���½ǵ�ͼ����ϵ���ǡ�";

var alert_form_inprogress_str = "���ڴ�������...";
var alert_form_overflow_str = "����ʧ�ܡ������ֻ���Դ���10������";
var alert_form_error_str = "����ʧ�ܡ�������Ļ���½ǵ�ͼ����ϵ���ǡ�";
var alert_form_correct_str = "�ʼ����ʹ����ɹ���"
var alert_name_str = "�ҵ����ͣ�"

var confirm_delete_str = "ȷ��ɾ��";

var USERNAME_MIN_LENGTH = 3;
var USERNAME_MAX_LENGTH = 16;
var PASSWORD_MIN_LENGTH = 4;
var PASSWORD_MAX_LENGTH = 16;

var login_modal_alert = "���͹��ܽ���ѷ��ϵ�ǰ�����ķ�Դͨ���ʼ����͸��������¼�Դ����ʼ����͡�";

var region_prefix = "����"
var mrt_prefix = "MRT: "

var loading_str = "������������";
</script>


<?php include template(footer); ?>

</body>
</html>
