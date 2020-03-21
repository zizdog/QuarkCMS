<div id="sidebar" class="sidebar w3">
<div id="sidebar-inner" class="sidebar-inner w3-inner">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTongji', $this->options->sidebarBlock)): ?>
<div class="widget">
    <h2>资源发布</h2>
    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
    <div class="upDate"> <span class="thisW"><b><?php $this->widget('Widget_Contents_Post_Date@upDate','limit=1')->parse('<a href="{permalink}">{count}</a>'); ?></b><strong>本月更新</strong></span> <span><b><?php $stat->publishedPostsNum() ?></b><strong>资源总数</strong></span></div>
</div>
<?php endif; ?>

<?php if ($this->is('post')){?>
<div class="widget">
    <h2>最新<?php $this->category(',', false);?></h2>
	<ol>
	<?php $this->widget('Widget_Archive@index', 'pageSize=10&type=category', 'slug='.$this->category.'')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
	</ol>
	<ol>
</div>
<div class="widget">
	<h2>最近评论</h2>
	<ul class="rcl">
	<?php $this->widget('Widget_Comments_Recent@sidebarCML','pageSize=5')->parse('<li><div class="rcl_meta"><i class="iconfont icon-user"></i> 访客 在 <a href="{permalink}">{title}</a>里说</div><div class="rcl_txt">{text}</div></li>'); ?>
	</ul>
</div>
<?php } else { ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHot', $this->options->sidebarBlock)): ?>
	<div class="widget sideTabs">
	<input checked id="SideTabOne" name="tabs" type="radio"><label class="SideTabOne" for="SideTabOne">月度热门</label>
	<input id="SideTabTwo" name="tabs" type="radio"><label class="SideTabTwo" for="SideTabTwo">本站总榜</label>
	<div class="panels">
		<div class="panel"><ol><?php hotViews(30,8);?></ol></div>
		<div class="panel"><ol><?php hotViews(365,8);?></ol></div>
	</div></div>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowJing', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h2>经典高分<span><a href="<?php $this->options->siteUrl(); ?>jd.html">more></a></span></h2>
		<ul><?php $this->widget('Widget_Archive@sideJingDian', 'pageSize=8&type=tag', 'slug=jd') ->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?></ul>
	</div>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowFavor', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h2>站长最爱<span><a href="<?php $this->options->siteUrl(); ?>za.html">more></a></span></h2>
		<ul><?php $this->widget('Widget_Archive@sideFavourite', 'pageSize=8&type=tag', 'slug=za') ->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?></ul>
	</div>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTags', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h2>电影类型</h2>
		<?php $this->widget('Widget_Metas_Tag_Cloud@sidebarCloud', 'ignoreZeroCount=1&limit=20')->to($tags); ?>
		<ul class="tags-list">
		<?php while($tags->next()): ?>
		<li><a href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h2>其他</h2>
		<?php lognum();?>
	</div>
 	<?php endif; ?>

 <?php };?>
</div>
</div><!-- end sidebar-->
<div class="clear"></div> 