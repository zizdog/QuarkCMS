
<div class="login-bar"><div class="w1"><div class="login-inner" data-no-instant>

<a onclick="switchNightMode();" id="snm"><i id="snm-ico" class="iconfont"></i><i id="snm-text">夜间模式</i></a>
<?php if ($this->user->hasLogin()): ?> | 
<a href="<?php $this->options->siteUrl('author/'); ?><?php echo $this->user->uid;?>/" rel="author"><i class="iconfont icon-category"></i>用户中心</a>
<?php endif; ?>
<!--[if lt IE 9]><span style="color:#d00;">本站不支持ie9以下版本浏览器！</span><![endif]-->
<span class="login right">
<?php if($this->user->hasLogin()): ?>
<a onclick="toggleClass('loginPanel','show1');"><i class="iconfont icon-sliders"></i>管理</a> | <a href="<?php $this->options->logoutUrl(); ?>"><i class="iconfont icon-logout"></i>退出</a>
<ul id="loginPanel">
<?php if ($this->user->group == 'subscriber'):?>
<li><a target="_blank" href="<?php $this->options->siteUrl('author/'); ?><?php echo $this->user->uid;?>/"><i class="iconfont icon-home"></i> 个人中心</a></li>
<?php else: ?>
<li><a href="<?php $this->options->adminUrl('write-post.php'); ?>"><i class="iconfont icon-edit"></i> 发布内容</a></li>
<li><a href="<?php $this->options->adminUrl('manage-comments.php'); ?>"><i class="iconfont icon-comment"></i> 评论管理</a></li>
<li><a href="<?php $this->options->adminUrl(); ?>"><i class="iconfont icon-sliders"></i> 后台管理</a></li>
<?php endif; ?>
</ul>
<?php else: ?>
<a onclick="toggleClass('loginForm','show1');"><i class="iconfont icon-login"></i>登录</a> | 
<a onclick="toggleClass('registerForm','show1')"><i class="iconfont icon-id-card"></i>注册</a>
</span>
<form id="loginForm" action="<?php $this->options->loginaction(); ?>" method="post">
<input type="text" id="name" name="name" value="" placeholder="用户名">
<input type="password" id="password" name="password" placeholder="密码">
<button type="submit" class="Login_button">登录</button>
<input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>"> 
</form>
<form id="registerForm" action="<?php $this->options->registerAction();?>" method="post">
<input type="hidden" name="_" value="<?php echo $this->security->getToken($this->request->getRequestUrl());?>">
<input type="text" id="re_name" name="name" placeholder="用户名">
<input type="email" id="re_mail" name="mail" placeholder="邮箱">
<button type="submit" class="Register_button">注册</button>
</form>
<?php endif; ?>
</div></div></div>