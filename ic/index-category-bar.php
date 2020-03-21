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