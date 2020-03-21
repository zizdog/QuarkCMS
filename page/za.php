<?php
/**
 * 站长最爱
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>


<div class="p s">
<div class="pt">
<h2>站长最爱</h2>
<div class="pm">发表于 <?php $this->date('Y-m-d'); ?> &nbsp; <?php if ($this->is('post')){echo " | &nbsp; 分类于 ";$this->category(' , ');} ?> | &nbsp; <?php $this->viewsNum(); ?> views</div>
</div>
</div>

<div class="archive">
<blockquote>
<h3>个人喜好</h3>
<p>真正的经典，历久弥香，无论怎样品味都有新鲜感！</p>
<p>如果你不知道想看什么电影，这里也许会是不错的选择；如果你有好的推荐，请告诉站长。</p>
</blockquote>
</div>

	<?php $this->widget('Widget_Archive@sideJingDian', 'pageSize=8&type=tag', 'slug=za') ->parse('
	<div class="p i">
	<div class="pt">
	<h1 style="border-left:2px solid #2085ca;padding-left:15px;"><a href="{permalink}" title="{title}">{title}</a> <span style="font-size:12px;color: #fff;background:#cd1612;border-radius: 50px;padding:2px;font-family:KaiTi;vertical-align: 5%;">精</span></h1>
	</div>
	</div>
	'); ?>

<div class="clear"></div>
<br><hr><br>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>