</div><!--end .content-inner -->
</div><!--end .content -->
<?php $this->need('ic/sidebar.php'); ?>
</div><!--end #main-->
<?php if (!($this->is('single'))) {$this->pageNav('&laquo;', '&raquo;');}?>
<div id="footer" class="footer"><div class="footer-inner">
&copy; <?php echo date('Y');?> Powered by <a href="http://typecho.org" target="_blank">Typecho</a> & Theme <a class="ziz-theme" href="http://blog.zizdog.com/Quark.html" target="_blank">QuarkCMS</a><br>
<?php echo "页面加载耗时 " .timer_stop();?> &nbsp;&nbsp; 本站已持续运行 <?php getBuildTime(); ?><br>
免责声明：本站所有资源均收集自互联网，没有提供影片资源存储，也未参与录制、上传。若本站收录的资源涉及您的版权或知识产权或其他利益，请附上版权证明邮件告知，我们会尽快确认后作出删除等处理措施。联系邮箱：i#zizdog.com(#=@)
</div></div>
<div class="goTop"><a href="#header">顶</a></div>
<script src="<?php $this->options->themeUrl('assets/js/QuarkCMS.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>