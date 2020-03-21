<?php
/**
 * 热门电影
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>

<div class="p s">
<div class="pt">
<h2>热门电影排行</h2>
<div class="pm"><i class="iconfont icon-calendar"></i> <?php $this->date('Y-m-d'); ?> &nbsp; | &nbsp; <i class="iconfont icon-eye"></i> <?php views($this) ?></div>
</div>

<div class="clear"></div>
<br><hr><br>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>


