<?php $this->need('header.php');?>
<!--页面面包屑分类&内容帅选栏-->
<!--内容帅选栏-->
<div class="topTags" id="topTags">
	<span>
	  <label>筛选：</label>
      <select  name="select" id="select"  onchange="self.location.href=options[selectedIndex].value">
      <option>发布月份</option>
      <?php $this->widget('Widget_Contents_Post_Date@topSelectOption', 'type=month&format=Y年m月')->parse('<option value="{permalink}">{date}：{count}部</option>'); ?>
      </select>
  	</span>
  	<span class="right">
  		<a href="<?php $this->options->siteUrl(); ?>">最新</a> ／ 
  		<a href="<?php $this->options->siteUrl(); ?>rm.html">热门</a>  ／ 
  		<a href="<?php $this->options->siteUrl(); ?>lx.html">类型</a>  ／ 
  		<a href="<?php $this->options->siteUrl(); ?>jd.html">精华</a>
  	</span>
</div>
<!--end-->
<div class="post-list">
<div class="post-list-inner">
<?php if ($this->have()): ?>
<?php while($this->next()): ?>

<?php if($this->user->hasLogin()): ?>
	<?php if ($this->user->group == 'subscriber'):?>
		<a class="item"><div class="thumb"><img src="<?php $this->options->themeUrl('assets/img/qx.png'); ?>" data-src="<?php $this->options->themeUrl('assets/img/qx.png'); ?>" alt="<?php $this->title();?>">  <p>
		<?php if(timeZone($this->date->timeStamp)) echo '<span class="new">新</span>';?>
		<?php if($this->fields->plist) echo '<span class="play">播</span> ';?>
		<?php $this->title() ?>
		  </p></div></a>
	<?php else : ?>
	<a class="item" href="<?php $this->permalink() ?>"><div class="thumb"><img src="<?php $this->options->themeUrl('assets/img/df.png'); ?>" data-src="<?php echo thumb($this); ?>" alt="<?php $this->title();?>"><p>
		<?php if(timeZone($this->date->timeStamp)) echo '<span class="new">新</span>';?>
		<?php if($this->fields->plist) echo '<span class="play">播</span> ';?>
		<?php $this->title() ?>
	</p></div></a>
	<?php endif; ?>
<?php else : ?>
	<a class="item"><div class="thumb"><img src="<?php $this->options->themeUrl('assets/img/dl.png'); ?>" data-src="<?php $this->options->themeUrl('assets/img/dl.png'); ?>" alt="<?php $this->title();?>"><p>
		<?php if(timeZone($this->date->timeStamp)) echo '<span class="new">新</span>';?>
		<?php if($this->fields->plist) echo '<span class="play">播</span> ';?>
		<?php $this->title() ?>
	</p></div></a>
<?php endif; ?>

<?php endwhile; ?>
<?php else: ?>
    <article class="post">
    <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
    </article>
<?php endif; ?>
</div>
</div>
<?php $this->need('footer.php'); ?>