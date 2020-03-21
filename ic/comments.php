<?php
function threadedComments($comments, $options) {
    $cby = $comments->authorId == $comments->ownerId ? '<span class="cby">admin</span>' : '<span class="cby">Guest</span>';
    $clevel = $comments->levels > 0 ? 'c_c' : 'c_p';
    $author = $comments->url ? '<a href="' . $comments->url . '"'.'" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>' : $comments->author;
?>
<li id="<?php $comments->theId(); ?>" class="<?php echo $clevel;?>">
<?php
    $t = 1209600*8;
    $a = Helper::options()->siteUrl . 'usr/uploads/' . md5(strtolower($comments->mail)) . '.jpg';
    $e = __TYPECHO_ROOT_DIR__ . '/' . 'usr/uploads/' . md5(strtolower($comments->mail)) . '.jpg';
    if ( !is_file($e) || (time() - filemtime($e)) > $t ){
    $a = 'https://secure.gravatar.com/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d=';
    copy($a, $e);
        if (!is_file($e)){
            copy($d, $e);
        };
    };
    //if ( filesize($e) < 900 ) copy($d, $e);
?>
    <img class="avatar" src="<?php echo $a ?>" alt="<?php echo $comments->author; ?>" />
    <div class="cp">
    <?php $comments->content(); ?>
        <div class="cm"><span class="ca"><?php echo $author ?></span>&nbsp;<?php echo $cby;?>&nbsp;<?php $comments->date(); ?><div class="comment-reply"><?php $comments->reply(); ?></div></div>
    </div>
<?php if ($comments->children){ ?><div class="children"><?php $comments->threadedComments($options); ?></div><?php } ?>
</li>
<?php } ?>

<div id="comments">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
    <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?> </h3>
    <?php $comments->listComments(); ?><?php $comments->pageNav('&laquo;', '&raquo;'); ?>
<?php endif; ?>
<div id="<?php $this->respondId(); ?>" class="respond">
    <div class="ccr"><?php $comments->cancelReply(); ?></div>
    <h3 class="response" id="response"><i class="iconfont icon-comment"></i>发表新评论</h3>
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
<?php if($this->user->hasLogin()): ?>
    <span><i class="fa fa-user-circle-o" aria-hidden="true"></i> 已登入<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出 &raquo;</a></span>
<?php else: ?>
    <?php if($this->remember('author',true) != "" && $this->remember('mail',true) != "") : ?>
        <p><i class="iconfont icon-user"></i> 欢迎【<?php $this->remember('author'); ?>】的归来 | <button style="background:green;color:#fff;border:0;padding:0 4px;border-radius:3px;" onclick="toggleClass('authorInfo','show');"> 编辑资料</button></p>
        <div id="authorInfo" class="hide">
        <?php else : ?>
        <div class="show">
        <?php endif ; ?>
        <div class="input-group">
        <span class="input-group-addon" style="border-top-left-radius: 4px;border-bottom-left-radius: 4px;"><i class="iconfont icon-user"></i> </span>
        <input type="text" name="author" id="author" class="comment-input" placeholder="你的昵称*必须" value="" required>
        </div>

        <div class="input-group">
        <span class="input-group-addon"><i class="iconfont icon-mail"></i></span>
        <input type="email" name="mail" id="mail" class="comment-input" placeholder="你的邮箱*必须" value="" required>
        </div>

        <div class="input-group">
        <span class="input-group-addon"><i class="iconfont icon-link"></i></span>
        <input type="url" name="url" id="url" class="comment-input" style="border-right: 1px solid #ccc;border-top-right-radius: 4px;border-bottom-right-radius: 4px;" placeholder="http://" value="">
        </div>
        <script type="text/javascript">
        function getCookie(name){
            var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
            if(arr=document.cookie.match(reg))
                return unescape(decodeURI(arr[2]));
            else
                return null;
            }
        function adduser(){
            document.getElementById('author').value = getCookie('<?php echo md5($this->request->getUrlPrefix()); ?>__typecho_remember_author');
            document.getElementById('mail').value = getCookie('<?php echo md5($this->request->getUrlPrefix()); ?>__typecho_remember_mail');
            document.getElementById('url').value = getCookie('<?php echo md5($this->request->getUrlPrefix()); ?>__typecho_remember_url');
        }
        adduser();
        </script>
        <div class="clear"></div>
        </div>
    <?php endif; ?>
    <div class="tbox"><textarea name="text" id="textarea" class="textarea" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="在这里输入你的评论" required ><?php $this->remember('text',false); ?></textarea></div>
    <button type="submit" class="submit" id="submit" data-no-instant><i class="iconfont icon-send"></i>&nbsp;&nbsp;提交评论</button>
</form>
</div>
</div>
