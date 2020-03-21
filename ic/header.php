<div id="header" class="header">
<div class="logo"><a href="<?php $this->options->siteUrl(); ?>"><i class="iconfont icon-film"></i>ZiZDOG </a></div>
<ul id="menu" class="w1">
    <li class="zizico"><a href="<?php $this->options->siteUrl(); ?>"><i class="iconfont icon-film"></i>ZiZDOG </a></li>
    <?php $this->widget('Widget_Metas_Category_List@indexCatList')->to($categorys); ?>
    <?php while($categorys->next()): ?>
        <?php if ($categorys->levels === 0): ?>
        <?php $children = $categorys->getAllChildren($categorys->mid); ?>
        <?php if (empty($children)) { ?>
        <li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->description(); ?>"><?php $categorys->name(); ?></a>
        </li>
        <?php } else { ?>
          <li><a class="have-sub"><?php $categorys->name(); ?>▾</a>
          <ul>
            <?php foreach ($children as $mid) { ?>
            <?php $child = $categorys->getCategory($mid); ?>
              <li><a href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>"><?php echo $child['name']; ?></a></li>
            <?php } ?>
          </ul></li>
        <?php } ?>
      <?php endif; ?>
    <?php endwhile; ?>
    <li class="sub-page"><a>进站必读▾</a>
      <ul>
      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <?php while($pages->next()): ?>
        <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
      <?php endwhile; ?>
      </ul>
    </li>
    <li><a href="//blog.zizdog.com" target="_blank"><i class="iconfont icon-heartbeat"></i></a></li>
    <form id="search" onmouseover="document.getElementById('s-text').focus();"  method="post" action="./" role="search">
      <input type="text" name="s" class="s-text" id="s-text" required="true" />
      <button type="submit" id="s-button" class="s-button"  ><i class="iconfont icon-search"></i></button>
    </form>
</ul>
<span id='x' onclick='changeNavState()'><div><span class="t"></span><span class="m"></span><span class="b"></span></div></span>
</div>