<?php $this->need('header.php');?>

<div class="archive">
<!--页面面包屑分类-->
<div class="bread_nav">
<a href="<?php $this->options->siteUrl(); ?>"><i class="iconfont icon-home"></i>首页</a> »  用户中心 »  <?php $this->user->name() ?>
<div class="clear"></div>
</div>
<!--end-->

<?php if($this->user->hasLogin()): ?>
<blockquote>
<!--Author_meta-->
<p><i class="iconfont icon-user"></i>昵称: <?php $this->user->name() ?> 、登录名:<?php $this->user->name() ?>、户组等级:<?php //$this->user->group() ?>
<?php switch ($this->user->group) {case 'administrator':_e('牛掰站长');break;case 'editor': _e('特约编辑');break;case 'contributor': _e('初级编辑');break;case 'subscriber':_e('初级用户');break; default: break;} ?>
</p>
<p style="border-top:1px dashed #ccc;">
<i class="iconfont icon-link"></i>个人主页：<a target="_blank" href="<?php $this->user->url() ?>"><?php $this->user->url() ?></a>；共发表过内容:<?php Typecho_Widget::widget('Widget_Users_Admin')->to($users); ?> <?php while($users->next()): ?><?php if( $users->uid == $this->author->uid){$users->postsNum(); } ?><?php endwhile; ?>篇。
</p>
</blockquote>
<div class="edit-profile">
<div calss="profileAvatar"></div>
    <a href="http://gravatar.com/emails/" title="在 Gravatar 上修改头像" target="_blank"><img class="profile-avatar" src="<?php echo 'https://secure.gravatar.com/avatar/' . md5(strtolower($this->user->mail)) . '?s=220&r=X&d=' ?>" alt="zizdog"></a>

<div class="change-doc-pwd">
<h3>用户资料修改</h3>
<?php Typecho_Widget::widget('Widget_Users_Profile')->profileForm()->render(); ?>
<br>
<h3>登陆密码修改</h3>
<?php Typecho_Widget::widget('Widget_Users_Profile')->passwordForm()->render(); ?>
</sction>
<?php Typecho_Widget::widget('Widget_Users_Profile')->personalFormList(); ?>
<?php endif; ?>
</div>
</div><div class="clear"></div>
</div><!--end .archive --><div class="clear"></div>

</div><!--end .content-inner -->
</div><!--end .content -->
<?php $this->need('ic/sidebar.php'); ?>
</div><!--end #main-->
<?php if (!($this->is('single'))) {$this->pageNav('&laquo;', '&raquo;');}?>
<div id="footer" class="footer"><div class="footer-inner">
&copy; <?php echo date('Y');?> Powered by Typecho & Theme <a class="ziz-theme" href="http://blog.zizdog.com/Quark.html" target="_blank">QuarkCMS</a><br>
<?php echo "页面加载耗时 " .timer_stop();?> &nbsp;&nbsp; 本站已持续运行 <?php getBuildTime(); ?><br>
免责声明：本站所有资源均收集自互联网，没有提供影片资源存储，也未参与录制、上传。若本站收录的资源涉及您的版权或知识产权或其他利益，请附上版权证明邮件告知，我们会尽快确认后作出删除等处理措施。联系邮箱：i#zizdog.com(#=@)
</div></div>
<div class="goTop"><a href="#header">顶</a></div>
<script src="<?php $this->options->themeUrl('assets/js/QuarkCMS.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>
