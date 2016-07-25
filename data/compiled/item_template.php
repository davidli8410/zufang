<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><script type="text/template" id="post-template">
<div class="row post-block {1}">
<div class="col-sm-12">
<div class="row">
<div class="col-sm-12 no-h-padding">
<span class="is_top" style="display:{0};">置顶</span>
<img src="templates/<?php echo $CFG['tplname'];?>/images/image24.png" height="24" id="img-icon" style="display:{12};">
                    <a class = "post-title" style="display:inline;" href="/web/post/{2}" target="_blank">{3}</a>
</div>
</div>
<div class="row">
<div class="col-sm-2 col-xs-4 post-info-item">
<span class="rental-value">{4}</span>
</div>
<div class="col-sm-5 col-xs-8 post-info-item">
<span class="post-block-text">{6}</span>
</div>
<div class="col-sm-2 col-xs-4 post-info-item" style="text-align:left;">
<span class="rental-value">{7}</span> <span class="rental-unit">/月</span>
</div>
<div class="col-sm-1 col-xs-2 post-info-item" style="text-align:left;">
<span class="label label-{8}" style="display:inline;">{9}</span>
</div>
<div class="col-sm-2 col-xs-6 post-info-item" style="text-align: right;">
<span class="post-block-text" style="display: inline; color: rgb(255, 114, 4); font-weight: bold; vertical-align: bottom;"><?php echo $val['postdate'];?></b>发布</span>
<img src="templates/<?php echo $CFG['tplname'];?>/images/fire48.png" height="24" id="img-icon" style="display: inline;">
</div>

</div>
</div>
</div>
</script>

<script type="text/javascript">
/* srings for post header loading */
var min_postfix = "分钟前";
var hour_postfix = "小时前";
var hour_postfix_single = "小时前";
var day_postfix = "天前";
var day_postfix_single = "天前";
var term_day_str = "短租";
var term_month_str = "长租";
var price_day_postfix = "$/天";
var price_month_postfix = "$/月";
var rental_unknown_str = "可商"

var share_str = "搭房";
var common_str = "普通房";
var master_str = "主人房";
var unit_str = "整套";
var other_str = "其它"

var owner_str = "房东";
var agent_str = "中介";

var search_normal_str = "点击查看更多房源";
var search_no_result_str = "找不到符合条件的房源 -_-";
var search_no_more_result_str = "已经没有了 -_-";

var sgc_str = "狮城论坛";
var sgc_str_2 = "狮城论坛";
var huasing_str = "华新论坛";
var roomsdb_str = "roomsdb";
var gumtree_str = "gumtree";
var sgyuan_str = "新源网";
var NZROOM_str = "NZROOM";
var zufang_str = "狮城租房网";
var xinyu_str = "心雨论坛";
var soufang_str = "新西兰搜房网";
var shichengbbs_str = "狮城BBS";
var singxin_str = "星星网";
var singfang_str = "新房网";
var sgxin_str = "新新网";
var sofun_str = "新西兰搜房网";

var no_title_str = "无标题";

var loading_str = "正在玩命加载";
var view_more_str = "点击查看更多房源"
</script>