

	<?php if ($this->fields->dlist):?>
		<?php if ($this->fields->plist):?>
			
			<hr id="post-title-play">
			<h3><i class="iconfont icon-film"></i>在线播放</h3>
			<p>手机观看如果无法加载视频，请尝试用电脑观看，或下载后观看。</p>
			<div id="ziz-video"></div>
			<script src="<?php $this->options->themeUrl('assets/js/cyberplayer.js'); ?>"></script>
			<script type="text/javascript">
			    var player = cyberplayer("ziz-video").setup({
                    playlist: [
                        <?php $this->fields->plist(); ?>
                    ],
			        image: "",
			        autostart: false,
			        stretching: "uniform",
			        repeat: false,
			        volume: 100,
			        controls: true,
					logo: {
			            linktarget: "_blank",
			            margin: 8,
			            hide: true,
			            position: "top-right",
			            file: "<?php $this->options->themeUrl('assets/img/dog.svg'); ?>"
			        },
			        rightclick: [ // 右键配置
				            {
				                title: "睿智狗电影", 
				                link: "#"
				            }
				        ],
			        ak: '88013622d4dc4f5da7956a517cee8cb9'
			    });
				var ziz_v_w = document.getElementById('ziz-video').offsetWidth;
				var ziz_v_h = ziz_v_w/16*9;
				player.resize(ziz_v_w, ziz_v_h);
			</script>
			<div id="player-next"></div>
			<script src="<?php $this->options->themeUrl('assets/js/play.js'); ?>" async="async"></script>

			<h3><i class="iconfont icon-download"></i>下载链接</h3>
			<p>下载软件的选择请参考下面的下载提示</p>
			<div class="dlist"><?php $this->fields->dlist();?></div>

		<?php else: ?>
			<?php if ($this->fields->plist2):?>
				<h3><i class="iconfont icon-film"></i>在线播放</h3>
				<p>手机观看如果无法加载视频，请尝试用电脑观看，或下载后观看。</p>
				<div id="ziz-video">
				<?php $this->fields->plist2(); ?>
				</div>
				<script type="text/javascript">
					var ziz_v_w = document.getElementById('ziz-video').offsetWidth;
					var ziz_v_h = ziz_v_w/16*9;
					document.getElementById("ziz-video").style.height=ziz_v_h;
				</script>
			<?php endif;?>
			<h3><i class="iconfont icon-download"></i>下载链接</h3>
			<script src="<?php $this->options->themeUrl('ic/ajax/dlist.js'); ?>"></script>
			<script>var isLTL=true;</script>
			<div id="DList">
			    <button id="DListButton" onclick="if(isLTL){showDList(<?php $this->cid(); ?>);isLTL=false;}">点此显示下载链接</button>
			</div>
		<?php endif;?>
	<?php endif;?>









