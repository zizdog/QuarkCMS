<?php $this->need('header.php'); ?>
<div class="bread_nav">
<a href="<?php $this->options->siteUrl(); ?>"><i class="iconfont icon-home"></i>首页</a>&nbsp;&raquo;&nbsp;<?php $this->category(' , ');?>&nbsp;&raquo;&nbsp;《<?php $this->title() ?>》&nbsp;&raquo;&nbsp;正文<?php if($this->user->uid==$this->author->uid && $this->user->hasLogin()): ?><i class="iconfont icon-eye"></i><?php views($this) ?>
      <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>">&nbsp;<i class="iconfont icon-edit"></i></a>
    <?php endif;?>
</div>
<div class="p s">
<div class="pp">

<div class="intro">
<p class="title">
<?php $this->title() ?><span> (<?php echo $this->fields->year;?>)</span>
<span> (<?php echo $this->fields->rate;?>)</span>
<span><?php views($this) ?></span>
</p>

<img class="thumbnail" src="<?php echo $this->fields->thumb;?>">
<p><?php echo $this->fields->info;?></p>
<div class="introduction"><?php echo $this->fields->intro;?></div>
<?php //$this->content(); ?>
</div>

<div class="clear"></div>
<?php if($this->options->vipread):?>
<?php if($this->user->hasLogin()): ?>
<?php if ($this->user->group == 'subscriber'){include 'ic/group.php';}else{include 'ic/post.php';}?>
<?php else : ?>
<h3><i class="iconfont icon-download"></i>下载链接</h3>
<div class="user-level-0"><i class="iconfont icon-lock"></i>您尚未登陆！没有权限访问当前内容！</div>
<h3><i class="iconfont icon-film"></i>在线播放</h3>
<div class="play-block"><div class="play-block-inner"><div><i class="iconfont icon-exclamation"></i>无权访问！</div></div></div>
<?php endif; ?>
<?php else : ?>
<?php include 'ic/post.php'; ?>
<?php endif; ?>
<h3><i class="iconfont icon-gittip"></i>下载提示</h3>
<div class="prompt">
1. 本站建议下载使用专业BT软件，分享(破解版迅雷、百度云)请访问<a href="<?php $this->options->siteUrl('/help.html'); ?>">睿智狗下载</a>.<br>
2. m3u8 下载推荐：安卓系统<a href="https://pan.baidu.com/s/1Gl4BvdAeKMvq6gCtg2_M6w" target="_blank">m3u8loader</a>，Mac系统<a href="https://pan.baidu.com/s/1UVO_Xv_p901cYQmb5n8RGQ" target="_blank">Downie Mac</a>，win系统 <a href="https://pan.baidu.com/s/1VI9AdfnDZfMZF1TKSZKXvQ" target="_blank">Allavsoft</a>.
</div>
<br>
<p><i class="iconfont icon-clock"></i> 最后更新时间为：<?php echo gmdate('Y-m-d', $this->modified + Typecho_Widget::widget('Widget_Options')->timezone); ?>
</p>
</div>

<h3><i class="iconfont icon-random"></i>随机推荐</h3>
<?php randPosts();?>
<div class="clear"></div>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>