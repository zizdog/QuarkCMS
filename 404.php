<?php $this->need('header.php'); ?>
<div class="p s">
	<div class="pt">
	<h1>抱歉，这部电影已删除！</h1>
	</div>
	<hr>
	<div class="pp" style="text-align: center;">
      <h2><span id="num">6</span>秒后自动回到主页</h2>
	</div>

</div>
<script type="text/javascript">
	var num=6;    
	function redirect(){    
		num--;    
		document.getElementById("num").innerHTML=num;    
		if(num<0){
			document.getElementById("num").innerHTML=0;    
			location.href="<?php $this->options->siteUrl(); ?>";    
 		}    
	}
	setInterval("redirect()", 1000);    
</script>
<?php $this->need('footer.php'); ?>

