<?php if(!defined('IN_PHPMPS'))die('Access Denied'); ?>��<?php echo $pager['count'];?>��¼&nbsp;&nbsp;��ǰ<?php echo $pager['page'];?>/<?php echo $pager['page_count'];?>ҳ&nbsp;&nbsp;<?php echo $pager['size'];?>/ҳ  &nbsp;&nbsp;

<?php if($pager[first]) { ?>
<a href="<?php echo $pager['first'];?>">��һҳ  </a>
<?php } else { ?>��һҳ  <?php } ?>

<?php if($pager[prev]) { ?>
<a href="<?php echo $pager['prev'];?>">��һҳ  </a>
<?php } else { ?>��һҳ  <?php } ?>

<?php if($pager[next]) { ?>
<a href="<?php echo $pager['next'];?>">��һҳ  </a>
<?php } else { ?>��һҳ  <?php } ?>

<?php if($pager[last]) { ?>
<a href="<?php echo $pager['last'];?>">���ҳ  </a>
<?php } else { ?>���ҳ  <?php } ?>
