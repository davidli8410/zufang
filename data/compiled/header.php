<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><style>.form-in-modal{margin:20px 20px 20px 20px;}.form-title{margin-top:20px;margin-bottom:20px;position:relative;text-align:center;}.form-title .text{color:#999999;padding:0 10px;background-color:#FFFFFF;}.language-selection{font-weight:bold;color:red;line-height:46px;}.modal-message{margin:0 60px;text-align:right;}.post-ad-link{color:rgb(237,122,58);}.modal-row-title-div{padding:0 0 5px 15px;}.modal-row-title-text{color:#999999;}.modal-indicator{display:none;padding-right:4px;}.result-text-red{color:rgb(186,70,70);font-size:14px;background:url(/static/img/warning16.png) no-repeat top left;display:inline-block;padding-left:20px;}.result-text-green{color:rgb(70,136,70);font-size:14px;background:url(/static/img/accept16.png) no-repeat top left;display:inline-block;padding-left:20px;}#post_ad_link{color:#FF3333;font-weight:bold;}#post_ad_link:hover{cursor:pointer;}.bar-menu{font-size:16px;font-weight:bold;}</style>
<div class="navbar navbar-inverse navbar-fixed-top" style="z-index: 2;">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed"
data-toggle="collapse" data-target=".bs-navbar-collapse"
type="button">
<span class="icon-bar"></span> <span class="icon-bar"></span> <span
class="icon-bar"></span>
</button>
<div style="padding: 9px 10px 9px 0px;">
<a href="./inex_files/inex.html"><img
src="templates/<?php echo $CFG['tplname'];?>/images/logo.png"
style="height: 32px;" alt="�������ⷿ"></a>
</div>
</div>
<div class="navbar-collapse collapse bs-navbar-collapse">

<ul class="nav navbar-nav navbar-right" id="navbar-right-links">
<li><a href="<?php echo $CFG['postfile'];?>" id="post_ad_link"><span
class="glyphicon glyphicon-edit"></span>&nbsp;��ѷ���</a></li>

<?php if($_userid) { ?>
<li class="before-login-link"><a href="member.php">��ӭ�㣺<?php echo $_username;?></a></li>
<?php if($_status<=0) { ?>
<li class="before-login-link" id="login_link"><a
href="member.php?act=send_check_email">[��֤�ʼ�]</a></li> <?php } ?>
<li class="before-login-link"><a
href="member.php?act=logout&mid=<?php echo $_userid;?>">[�˳�]</a></li>
<?php } else { ?>
<li class="before-login-link" id="login_link">
<!--<a href="member.php?act=login&refer=<?php echo $PHP_URL;?>">��¼</a> -->
<a href="javascript:void(0)">��¼</a>
</li>
<li class="before-login-link" id="register_link">
<!-- <a href="member.php?act=register">ע��</a> -->
<a href="javascript:void(0)">ע��</a>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>

