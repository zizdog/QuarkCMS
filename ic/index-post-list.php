<div class="post-list">
<div class="post-list-inner">
<?php if ($this->have()): ?>
<?php while($this->next()): ?>
<a class="item" href="<?php $this->permalink() ?>">
  <div class="thumb"><img src="<?php $this->options->themeUrl('assets/img/df.png'); ?>" data-src="<?php echo $this->fields->thumb;?>" alt="<?php $this->title();?>"></div>
  <p>
   <?php if(timeZone($this->date->timeStamp)) echo '<span class="new">新</span>';?>
   <?php if(($this->fields->plist)||($this->fields->plist2)) echo '<span class="play">播</span> ';?>
   <?php $this->title() ?>
  </p>
</a>
<?php endwhile; ?>
<?php else: ?>
    <strong>尚未发布内容</strong>
<?php endif; ?>
</div>
</div>
<?php $this->need('footer.php'); ?>