<?php $this->need('header.php');?>
<div class="archive">
<!--页面面包屑分类-->
<div class="bread_nav">
<a href="<?php $this->options->siteUrl(); ?>"><i class="iconfont icon-home"></i>首页</a>&nbsp;&raquo;&nbsp;
<?php $this->archiveTitle(array(
            'category'  =>  _t('分类&nbsp;&raquo;&nbsp; %s &nbsp;&raquo;&nbsp;影片列表'),
            'date'  =>  _t('日期归档&nbsp;&raquo;&nbsp;[%s] 发布的内容'),
            'search'    =>  _t('搜索页面&nbsp;&raquo;&nbsp;关键字 [%s]'),
            'tag'       =>  _t('电影类型&nbsp;&raquo;&nbsp;[%s]类电影'),
            'author'    =>  _t('作者页面&nbsp;&raquo;&nbsp;[<a href="'.$this->author->url.'" target=_blank title="点击访问作者 '.$this->author->name.' 的个人主页">%s</a>] 发布的内容')
        ),'',''); ?>
</div>
<div class="clear"></div>
<!--end-->
<blockquote>
<!--Author_meta-->
<?php if ($this->is('author')){?>
<p><i class="iconfont icon-user"></i>作者简介：昵称 <?php $this->author(); ?> 、所属用户组：<?php switch ($this->author->group) {case 'administrator':_e('站长');break;case 'editor': _e('特约编辑');break;case 'contributor': _e('贡献者');break; default: break;} ?></p>
<p style="border-top:1px dashed #ccc;">
<i class="iconfont icon-link"></i>个人主页：<a target="_blank" href="<?php $this->author->url(); ?>"><?php $this->author->url(); ?></a>；共发表过内容:<?php Typecho_Widget::widget('Widget_Users_Admin')->to($users); ?> <?php while($users->next()): ?><?php if( $users->uid == $this->author->uid){$users->postsNum(); } ?><?php endwhile; ?>  篇。
</p>

<!--Category_meta-->
<?php }elseif ($this->is('category')){?>
<p>
<i class="iconfont icon-category"></i><?php $this->category(',', false); ?>：分类中共有 <?php $this->widget('Widget_Metas_Category_List@archiveCategory')->to($category); ?>
<?php while ($category->next()): ?>
<?php if(($this->is('category'))&($this->category == $category->slug)): ?><?php $category->count(); ?><?php endif; ?> 
<?php endwhile; ?> 篇内容。
</p>
<p style="border-top:1px dashed #ccc;">
<i class="iconfont icon-intro"></i>分类简介：<?php echo $this->getDescription(); ?>
</p>

<!--Search_meta-->
<?php } elseif ($this->is('search')){ ?>
<p><i class="iconfont icon-key"></i>当前关键字为：[<?php $this->keywords();?>]
共找到 <strong><?php if($this->have()){$outnum=0;while ($this->next()) {$outnum = $outnum+1;}if($outnum==25){$outnum="25+";}echo $outnum;}?></strong> 条相关结果。
<p style="border-top:1px dashed #ccc;"><i class="iconfont icon-send"></i>如果对搜索结果不满意，请更换搜索关键词，或通知网站管理员。</p>

<!--Tag_meta-->
<?php } elseif ($this->is('tag')){ ?>
<!--<h3>当前标签为：<?php $this->keywords();?></h3>-->
<p><i class="iconfont icon-category"></i>相关类型：<span class="tag"><?php $this->tags('</span><span class="tag">', true, 'none'); ?></span></p>
<p style="border-top:1px dashed #ccc;"><i class="iconfont icon-send"></i>如果对推荐结果不满意，请通知网站管理员更新内容。</p>

<!--Date_data-->
<?php } elseif ($this->is('date')) { ?>
<p><i class="iconfont icon-calendar"></i> 本站多数电影的发布时间与其上映时间并非一致，望悉知。</p>
<p style="border-top:1px dashed #ccc;"><i class="iconfont icon-send"></i> 如果对推荐结果不满意，请通知网站管理员更新内容；或注册成为本站编辑，分享你所喜欢的。</p>
<?php } else { ?>
<p>NOTHING IS HERE</p>
<?php };?>
</blockquote>
</div>
<!--文章内容输出-->
<?php include 'ic/index-post-list.php';?>