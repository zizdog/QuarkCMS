</div><!--end .content-inner -->
</div><!--end .content -->
<?php $this->need('ic/sidebar.php'); ?>
</div><!--end #main-->
<?php if (!($this->is('single'))) {$this->pageNav('&laquo;', '&raquo;');}?>
<div id="footer" class="footer"><div class="footer-inner">
&copy; <?php echo date('Y');?> Powered by Typecho & Theme <a class="ziz-theme" href="http://ihua.win" target="_blank">QuarkCMS</a>
</div></div>
<div class="goTop"><a href="#header">顶</a></div>
<?php $this->footer(); ?>
</body>
</html>