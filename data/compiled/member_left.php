<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?><li <?php if($act=='index') { ?>class="current"<?php } ?>><a href="member.php">��Ա��ҳ</a></li>
<li <?php if($act=='modify') { ?>class="current"<?php } ?>><a href="member.php?act=modify">��������</a> <a href="member.php?act=avatar" class="small">ͷ��</a></li>
<li <?php if($act=='edit_password') { ?>class="current"<?php } ?>><a href="member.php?act=edit_password">�޸�����</a></li>
<li <?php if($act=='payonline') { ?>class="current"<?php } ?>><a href="member.php?act=payonline">���߳�ֵ</a></li>
<li <?php if($act=='gold') { ?>class="current"<?php } ?>><a href="member.php?act=gold">������Ϣ��</a></li>
<li <?php if($act=='exchange') { ?>class="current"<?php } ?>><a href="member.php?act=exchange">��������</a></li>
<li <?php if($act=='info') { ?>class="current"<?php } ?>><a href="member.php?act=info">�ҵ���Ϣ</a> <a href="<?php echo $CFG['postfile'];?>" class="small">����</a></li>
<li <?php if($act=='info_comment') { ?>class="current"<?php } ?>><a href="member.php?act=info_comment">��Ϣ����</a> </li>
<li <?php if($act=='com') { ?>class="current"<?php } ?>><a href="member.php?act=com">��ҵ��ҳ</a> <a href="postcom.php" class="small">����</a></li>
<li><a href="member.php?act=logout">�˳�ϵͳ</a></li>