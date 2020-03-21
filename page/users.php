<?php
/**
 * 会员列表
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>
<div class="p s">
	<div class="pt">
	<h1><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	<div class="pm">发表于 <?php $this->date('Y-m-d'); ?> &nbsp; <?php if ($this->is('post')){echo " | &nbsp; 分类于 ";$this->category(' , ');} ?></div>
	</div>
    <style type="text/css">
    .table-users {background: #f8f8f8}
    .table-users th{padding: 5px 0}.table-users td{padding: 3px 0}
    .table-users td{border-bottom: 1px dashed #ddd}
    </style>
	<div class="pp">
 <table class="table-users" border="0" cellspacing="0" cellpadding="0" width="100%">
                        <thead>
                            <tr style="background: #e3e3e3;padding: 4px 0">

                                <th style="padding-left: 2em;"><?php _e('用户名'); ?></th>
                                <th><?php _e('昵称'); ?></th>
                                <th><?php _e('电子邮件'); ?></th>
                                <th style="text-align:center;"><?php _e('用户组'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php Typecho_Widget::widget('Widget_Users_Admin')->to($users); ?>
                            <?php while($users->next()): ?>
                            <tr id="user-<?php $users->uid(); ?>">
                                
                             
                                <td style="width: 20%;padding-left: 2em;"><?php $users->name(); ?> 
                                </td>
                                <td style="width: 20%"><?php $users->screenName(); ?></td>
                                <td style="width: 40%"><?php if($users->mail): ?><a href="mailto:<?php $users->mail(); ?>"><?php $users->mail(); ?></a><?php else: _e('暂无'); endif; ?></td>
                                <td style="text-align: center;width: 20%"><?php switch ($users->group) {
                                    case 'administrator':
                                        _e('管理员');
                                        break;
                                    case 'editor':
                                        _e('编辑');
                                        break;
                                    case 'contributor':
                                        _e('贡献者');
                                        break;
                                    case 'subscriber':
                                        _e('关注者');
                                        break;
                                    case 'visitor':
                                        _e('访问者');
                                        break;
                                    default:
                                        break;
                                } ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table><!-- end .typecho-list-table -->
	</div>
</div>
<div class="clear"></div>
<br><hr><br>
<?php if($this->allow('comment')){$this->need('ic/comments.php');}?>
</div>
<?php $this->need('footer.php'); ?>


