<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><script type="text/template" id="post-template">
<div class="row post-block {1}">
<div class="col-sm-12">
<div class="row">
<div class="col-sm-12 no-h-padding">
<span class="is_top" style="display:{0};">�ö�</span>
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
<span class="rental-value">{7}</span> <span class="rental-unit">/��</span>
</div>
<div class="col-sm-1 col-xs-2 post-info-item" style="text-align:left;">
<span class="label label-{8}" style="display:inline;">{9}</span>
</div>
<div class="col-sm-2 col-xs-6 post-info-item" style="text-align: right;">
<span class="post-block-text" style="display: inline; color: rgb(255, 114, 4); font-weight: bold; vertical-align: bottom;"><?php echo $val['postdate'];?></b>����</span>
<img src="templates/<?php echo $CFG['tplname'];?>/images/fire48.png" height="24" id="img-icon" style="display: inline;">
</div>

</div>
</div>
</div>
</script>

<script type="text/javascript">
/* srings for post header loading */
var min_postfix = "����ǰ";
var hour_postfix = "Сʱǰ";
var hour_postfix_single = "Сʱǰ";
var day_postfix = "��ǰ";
var day_postfix_single = "��ǰ";
var term_day_str = "����";
var term_month_str = "����";
var price_day_postfix = "$/��";
var price_month_postfix = "$/��";
var rental_unknown_str = "����"

var share_str = "�";
var common_str = "��ͨ��";
var master_str = "���˷�";
var unit_str = "����";
var other_str = "����"

var owner_str = "����";
var agent_str = "�н�";

var search_normal_str = "����鿴���෿Դ";
var search_no_result_str = "�Ҳ������������ķ�Դ -_-";
var search_no_more_result_str = "�Ѿ�û���� -_-";

var sgc_str = "ʨ����̳";
var sgc_str_2 = "ʨ����̳";
var huasing_str = "������̳";
var roomsdb_str = "roomsdb";
var gumtree_str = "gumtree";
var sgyuan_str = "��Դ��";
var NZROOM_str = "NZROOM";
var zufang_str = "ʨ���ⷿ��";
var xinyu_str = "������̳";
var soufang_str = "�������ѷ���";
var shichengbbs_str = "ʨ��BBS";
var singxin_str = "������";
var singfang_str = "�·���";
var sgxin_str = "������";
var sofun_str = "�������ѷ���";

var no_title_str = "�ޱ���";

var loading_str = "������������";
var view_more_str = "����鿴���෿Դ"
</script>