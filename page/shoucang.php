<?php
/**
 * 收藏
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>


<div class="p s">
	<div class="pt">
	<h1><?php $this->title() ?></h1>
	<div class="pm">
		<i class="fa fa-calendar" aria-hidden="true"></i> <?php $this->date('Y-m-d'); ?> &nbsp; 
		<i class="fa fa-eye" aria-hidden="true"></i> <?php $this->viewsNum(); ?>
	</div>
	</div>
</div>

<div class="archive">
<blockquote>
<p><i class="fa fa-book" aria-hidden="true"></i> 真正的经典，历久弥香，无论怎样品味都有新鲜感！</p>
<p style="border-top:1px dashed #ccc;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> 如果你不知道想看什么电影，这里也许会是不错的选择；如果你有好的推荐，请告诉站长。</p>
</blockquote>
</div>

	<?php Collection_Plugin::render();?>

<div class="clear"></div>
<br><hr><br>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>