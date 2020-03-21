<?php $this->need('header.php'); ?>
<div class="p s page">
	<div class="pt">
	<h1><?php $this->title() ?></h1>
	<div class="pm">
		<i class="iconfont icon-calendar"></i><?php $this->date('Y-m-d'); ?> &nbsp; 
		<i class="iconfont icon-eye"></i><?php views($this) ?>
		<?php if($this->user->hasLogin()):?>
		 &nbsp;  <a href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>" class="edit-link">  &nbsp; 
		 	<i class="iconfont icon-edit"></i></a>
		<?php endif;?>
	</div>
	</div>
	<div class="pp <?php echo $this->slug();?>">
		<?php //$this->content(); ?>
		<?php
		$db = Typecho_Db::get();
		$sql = $db->select()->from('table.comments')
		    ->where('cid = ?',$this->cid)
		    ->where('mail = ?', $this->remember('mail',true))
		    ->limit(1);
		$result = $db->fetchAll($sql);
		if($this->user->hasLogin() || $result) {
		    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view"><i class="iconfont icon-unlock"></i> $1</div>',$this->content);
		}
		else{
		    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view"><i class="iconfont icon-lock"></i> 此处内容需要评论回复后方可阅读。</div>',$this->content);
		}
		echo $content 
		?>
	</div>
<br><hr><br>
<div class="clear"></div>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>