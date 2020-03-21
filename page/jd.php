<?php
/**
 * 经典电影
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>


<div class="p s">
	<div class="pt">
	<h1><?php $this->title() ?></h1>
	<div class="pm"><i class="iconfont icon-calendar"></i> <?php $this->date('Y-m-d'); ?> &nbsp; | &nbsp; <i class="iconfont icon-eye"></i> <?php views($this) ?>
	</div>
	</div>


<div class="archive">
<blockquote>
<p><i class="iconfont icon-heartbeat"></i> 真正的经典，历久弥香，无论怎样品味都有新鲜感！</p>
<p style="border-top:1px dashed #ccc;"><i class="iconfont icon-send"></i> 如果你不知道想看什么电影，这里也许会是不错的选择；如果你有好的推荐，请告诉站长。</p>
</blockquote>
</div>

	<?php $this->widget('Widget_Archive@sideJingDian', 'pageSize=9999&type=tag', 'slug=jd') ->parse('
	<ul>
	<li><a href="{permalink}" title="{title}">{title}</a></li>
	</ul>
	'); ?>

<div class="clear"></div>
<br><hr><br>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>