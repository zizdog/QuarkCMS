<?php
/**
 * 福利视频
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
<p><i class="fa fa-book" aria-hidden="true"></i> 这是福利，真的福利哦</p>
<p style="border-top:1px dashed #ccc;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> 如果你不知道想看什么电影，这里也许会是不错的选择；如果你有好的推荐，请告诉站长。</p>
</blockquote>
</div>


<?php $this->widget('Widget_Archive@index', 'pageSize=10000&type=category', 'mid=204')->parse('

	<div class="p i">
	<div class="pt">
	<h1 style="border-left:2px solid #2085ca;padding-left:15px;"><a href="{permalink}" title="{title}">{title}</a> <span style="font-size:12px;color: #fff;background:#cd1612;border-radius: 50px;font-family:KaiTi;vertical-align: 5%;">精</span></h1>
	</div>
	</div>

'); ?>
<div class="clear"></div>
<br><hr><br>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>