<?php
/**
 * 电影类型
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>


<div class="p s">
	<div class="pt">
	<h1>剧情内容分类</h1>
	<div class="pm">
		<i class="fa fa-calendar" aria-hidden="true"></i> <?php $this->date('Y-m-d'); ?> &nbsp; 
		<i class="fa fa-eye" aria-hidden="true"></i> <?php $this->viewsNum(); ?>
	</div>
	</div>

<div class="archive">
<blockquote>
<p><i class="fa fa-random" aria-hidden="true"></i> 类型比较乱，全凭自己喜好而已！</p>
<p style="border-top:1px dashed #ccc;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> 如果你不知道想看什么电影，随便点一个喜欢的类型试试吧；如果你有好的推荐，请告诉站长。</p>
</blockquote>
</div>

<ul class="page-tags-list"><?php //showTagCloud();?></ul>
<div class="clear"></div>
<br><hr><br>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>