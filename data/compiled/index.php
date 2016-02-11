<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>新西兰租房网,奥克兰租房网,新西兰搜房网,奥克兰租房</title>
<meta content="新西兰租房,新西兰出租,狮城租房,单间出租,HDB出租,公寓出租,短期租房,狮城论坛,狮城网,新新网"
name="keywords">
<meta content="新西兰最大的租房网站，免费发布、搜索新西兰出租信息。HDB出租、公寓出租、单间出租、整套出租。"
name="description">
<meta content="index,follow" name="robots">
<meta content="index,follow" name="GOOGLEBOT">
<meta content="新西兰租房" name="Author">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/css/bootstrap.min.css" type="text/css">
<!-- <link rel="shortcut icon" href="http://NZROOM.com/static/img/fav.ico"> -->
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/css/fang.css" type="text/css">

<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/e52a1e59defa.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/fang.js"></script>

</head>
<body style="padding-top: 55px;">

<?php include template(header); ?>


<?php include template(login); ?>


<div class="container main-shadow">
<div class="row search-block">
<div class="col-sm-12">
<div class="row search-tab-row">
<ul class="nav nav-tabs" id="searchTab">
<li class="active tab-ui search-tab"><a
href="http://localhost/zufang/#region-selection"
data-toggle="tab"><b>区域</b></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane two-level-selection-block active"
id="region-selection">
<div class="two-level-selection-header">
<div class="two-level-selection-item-selected" id="#central">奥克兰</div>
<?php if(is_array($area_arr)) foreach($area_arr AS $val) { ?>
<div class="two-level-selection-item" id="#area_<?php echo $val['id'];?>"><?php echo $val['areaname'];?></div>

<?php } ?>

</div>
<div class="two-level-selection-pane-inactive" id="east">
<div class="text-selection-block">
<div class="text-selection-item-selected all-selection"
id="all-region-east">全部</div>
<div class="text-selection-item" id="Bedok">勿洛</div>
<div class="text-selection-item" id="Changi">樟宜</div>
<div class="text-selection-item" id="Paya Lebar">巴耶利峇</div>
<div class="text-selection-item" id="Pasir Ris">巴西立</div>
<div class="text-selection-item" id="Tampines">淡滨尼</div>
</div>
</div>
<div class="two-level-selection-pane-inactive" id="northeast">
<div class="text-selection-block">
<div class="text-selection-item-selected all-selection"
id="all-region-northeast">全部</div>
<div class="text-selection-item" id="Ang Mo Kio">宏茂桥</div>
<div class="text-selection-item" id="Hougang">后港</div>
<div class="text-selection-item" id="Punggol">榜鹅</div>
<div class="text-selection-item" id="Seletar">实里达</div>
<div class="text-selection-item" id="Sengkang">盛港</div>
<div class="text-selection-item" id="Serangoon">实龙岗</div>
</div>
</div>
<div class="two-level-selection-pane-inactive" id="north">
<div class="text-selection-block">
<div class="text-selection-item-selected all-selection"
id="all-region-north">全部</div>
<div class="text-selection-item" id="Lim Chu Kang">林厝港</div>
<div class="text-selection-item" id="Mandai">万礼</div>
<div class="text-selection-item" id="Sembawang">三巴旺</div>
<div class="text-selection-item" id="Woodlands">兀兰</div>
<div class="text-selection-item" id="Yishun">义顺</div>
</div>
</div>
<div class="two-level-selection-pane-active" id="central">
<div class="text-selection-block">
<div class="all-selection text-selection-item-selected"
id="all-region-central">全部</div>
<div class="text-selection-item" id="Bishan">Penrose</div>
<div class="text-selection-item" id="Bukit Merah">One
tree hill</div>
<div class="text-selection-item" id="Bukit Timah">Mt
Wellington</div>
<div class="text-selection-item" id="Geylang">New lynn</div>
<div class="text-selection-item" id="Kallang">Mt eden</div>
<div class="text-selection-item" id="Marine Parade">Mt
eden</div>
<div class="text-selection-item" id="Novena">Mt eden</div>
<div class="text-selection-item" id="Queenstown">Mt eden</div>
<div class="text-selection-item" id="Tanglin">Silva Park</div>
<div class="text-selection-item" id="Toa Payoh">Mt eden</div>
<div class="text-selection-item" id="CBD">Mt eden</div>
<div class="text-selection-item" id="Newton">Mt eden</div>
<div class="text-selection-item" id="Orchard">Mt eden</div>
<div class="text-selection-item" id="Outram">Mt eden</div>
</div>
</div>
<div class="two-level-selection-pane-inactive" id="west">
<div class="text-selection-block">
<div class="text-selection-item-selected all-selection"
id="all-region-west">全部</div>
<div class="text-selection-item" id="Bukit Batok">武吉巴督</div>
<div class="text-selection-item" id="Bukit Panjang">武吉班让</div>
<div class="text-selection-item" id="Boon Lay">文礼</div>
<div class="text-selection-item" id="Choa Chu Kang">蔡厝港</div>
<div class="text-selection-item" id="Clementi">金文泰</div>
<div class="text-selection-item" id="Jurong East">裕廊东</div>
<div class="text-selection-item" id="Jurong West">裕廊西</div>
<div class="text-selection-item" id="Pioneer">先驱</div>
</div>
</div>
</div>
</div>
</div>
<div class="row search-condition-row">
<div class="col-sm-2 col-xs-2 row-title-div">
<span class="search-condition-row-title">租期</span>
</div>
<div
class="col-sm-10 col-xs-10 text-selection-block term-selection selection-block">
<div class="text-selection-item-selected" id="any">任意租期</div>
<div class="text-selection-item" id="month">长租</div>
<div class="text-selection-item" id="day">短租</div>
</div>
</div>
<div class="row search-condition-row">
<div class="col-sm-2 col-xs-2 row-title-div">
<span class="search-condition-row-title">价格</span>
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
id="negotiable-checkbox" checked=""> 可商
</label>
</div>
</form>
</div>
</div>
<div class="row search-condition-row">
<div class="col-sm-2 col-xs-2 row-title-div">
<span class="search-condition-row-title">房型</span>
</div>
<div
class="col-sm-10 col-xs-10 text-selection-block house-type-selection selection-block">
<div class="text-selection-item-selected" id="any">任意房型</div>
<div class="text-selection-item" id="share">搭房</div>
<div class="text-selection-item" id="common">普通房</div>
<div class="text-selection-item" id="master">主人房</div>
<div class="text-selection-item" id="unit">整套</div>
<div class="text-selection-item" id="other">其它</div>
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
<span class="is_top" style="display: inline;">置顶</span> 
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
<span class="rental-value">900</span> <span class="rental-unit">/月</span>
</div>
<div class="col-sm-1 col-xs-2 post-info-item"
style="text-align: left;">
<span class="label label-success" style="display: inline;">房东</span>
</div>
<div class="col-sm-2 col-xs-6 post-info-item"
style="text-align: right;">
<span class="post-block-text" style="display: inline; color: rgb(255, 114, 4); font-weight: bold; vertical-align: bottom;"><?php echo $val['postdate'];?></b>发布</span>
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
style="display: none"><span id="loading-text">点击查看更多房源</span>
</div>
</div>
</div>
</div>

<script type="text/javascript">
/* srings for post header loading */
var login_form_inprogress_str = "正在登录 ...";
var login_form_error_str = "账号或者密码有误。";
var login_form_correct_str = "登录成功。跳转中 ...";
var login_form_onetime_str = "使用一次性密码登录成功。请马上修改您的密码";

var login_modal_favorite_msg = "使用收藏功能需要先登录您的账号";
var login_modal_np_msg = "发布广告需要先登录您的账号";
var login_modal_normal_msg = "请使用你的邮箱和密码登录";

var register_form_inprogress_str = "正在注册 ...";
var register_form_email_exist_str = "email已被占用。"
var register_form_username_exist_str = "用户名已被占用"
var register_form_correct_str = "注册成功。正在登陆 ...";

var forgot_form_inprogress_str = "正在找回密码 ...";
var forgot_form_nonexist_str = "您输入的email不存在。";
var forgot_form_correct_str = "我们已经往您的邮箱发送了一次性登录密码（30分钟内有效）";

var account_form_inprogress_str = "正在保存 ...";
var account_form_username_exist_str = "用户名已被占用"
var account_form_correct_str = "已保存";

var email_error_msg = "您必须输入一个有效的email地址。";
var password_error_msg = "密码必须在4到16个字符之间。";
var password_match_error_msg = "密码不匹配。";
var username_error_msg = "用户名必须在4到16个字符之间。";
var alert_name_error_msg = "请输入订阅名称。";
var unknown_error_str = "操作失败。请点击屏幕右下角的图标联系我们。";

var alert_form_inprogress_str = "正在创建推送...";
var alert_form_overflow_str = "创建失败。您最多只可以创建10个推送";
var alert_form_error_str = "操作失败。请点击屏幕右下角的图标联系我们。";
var alert_form_correct_str = "邮件推送创建成功！"
var alert_name_str = "我的推送："

var confirm_delete_str = "确认删除";

var USERNAME_MIN_LENGTH = 3;
var USERNAME_MAX_LENGTH = 16;
var PASSWORD_MIN_LENGTH = 4;
var PASSWORD_MAX_LENGTH = 16;

var login_modal_alert = "推送功能将会把符合当前搜索的房源通过邮件发送给您。请登录以创建邮件推送。";

var region_prefix = "区域："
var mrt_prefix = "MRT: "
</script>


<?php include template(footer); ?>

</body>
</html>
