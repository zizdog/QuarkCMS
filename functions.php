<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require_once("libs/Settings.php");


function themeConfig($form) {
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowTongji' => _t('显示站点统计信息'),
    'ShowHot' => _t('显示热门电影'),
    'ShowJing' => _t('显示经典电影推荐'),
    'ShowFavor' => _t('显示站长最爱'),
    'ShowTags' => _t('显示电影类型'),
    'ShowOther' => _t('显示其他（会员信息）')),
    array('ShowTongji','ShowOther'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());

    $zizSlider = new Typecho_Widget_Helper_Form_Element_Radio('zizSlider',array(1 => _t('启用'),0 => _t('禁止'),),0, _t('首页幻灯推荐'), _t(''));
    $form->addInput($zizSlider);
    $vipread = new Typecho_Widget_Helper_Form_Element_Radio('vipread',array(1 => _t('启用'),0 => _t('禁止'),),0, _t('会员阅读权限'), _t(''));
    $form->addInput($vipread);
   
   
   
$db = Typecho_Db::get();
$getTheme=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:QuarkCMS'));
$themeName = $getTheme['value'];
if(isset($_POST['type']))
{ 
if($_POST["type"]=="备份模板数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:QuarkCMS_backup'))){
$update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:QuarkCMS_backup');
$updateRows= $db->query($update);
echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}else{
if($ysj){
     $insert = $db->insert('table.options')
    ->rows(array('name' => 'theme:QuarkCMS_backup','user' => '0','value' => $ysj));
     $insertId = $db->query($insert);
echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}
}
}

if($_POST["type"]=="还原模板数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:QuarkCMS_backup'))){
$sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:QuarkCMS_backup'));
$bsj = $sjdub['value'];
$update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:Yodu');
$updateRows= $db->query($update);
echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
<?php
}else{
echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
}
}
if($_POST["type"]=="删除备份数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:QuarkCMS_backup'))){
$delete = $db->delete('table.options')->where ('name = ?', 'theme:QuarkCMS_backup');
$deletedRows = $db->query($delete);
echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}else{
echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
}
}

}
echo '<form class="protected" action="?yodubf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';    
   
}

//初始化输出
function themeInit($archive)
{
    $archive->parameter->pageSize = 60; // 自定首页文章条数
    //if($archive->is('single')){views($archive);}
}

// 预置文章字段，包括加精、加火、设置会员权限
function themeFields($layout) {
    /*
    $rate = new Typecho_Widget_Helper_Form_Element_Text('rate', NULL, NULL, _t('电影评分'), _t('0到10的数值，保留一位小数'));
    $layout->addItem($rate);
    $year = new Typecho_Widget_Helper_Form_Element_Text('year', NULL, NULL, _t('电影年代'));
    $layout->addItem($year);
    $info = new Typecho_Widget_Helper_Form_Element_Text('info', NULL, NULL, _t('电影信息'));
    $layout->addItem($info);
    $intro = new Typecho_Widget_Helper_Form_Element_Text('intro', NULL, NULL, _t('电影简介'));
    $layout->addItem($intro);
    $thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('缩略图地址'));
    $layout->addItem($thumb);
    $plist = new Typecho_Widget_Helper_Form_Element_Text('plist', NULL, NULL, _t('在线播放'), _t('输入m3u8地址，不输入则不生成播放器界面'));
    $layout->addItem($plist);
    $dlist = new Typecho_Widget_Helper_Form_Element_Text('dlist', NULL, NULL, _t('下载列表'), _t('严格对应格式：<br>[li][span class="title"]第01集[/span][span class="ziz_dl_title"]https://qq.com-ok-qq.com/20191002/24065_f5d9c610/index.m3u8[/span][button class="btn" value="https://qq.com-ok-qq.com/20191002/24065_f5d9c610/index.m3u8" data-clipboard-text="https://qq.com-ok-qq.com/20191002/24065_f5d9c610/index.m3u8"]复制[/button][/li]'));
    $layout->addItem($dlist);
    */
    $jing = new Typecho_Widget_Helper_Form_Element_Radio('jing', array(1 => _t('加精&nbsp;&nbsp;&nbsp;'),0 => _t('不加(默认)'),),0, _t('是否加精'));
    $layout->addItem($jing);
    $huo = new Typecho_Widget_Helper_Form_Element_Radio('huo', array(1 => _t('加火&nbsp;&nbsp;&nbsp;'),0 => _t('不加(默认)'),),0, _t('是否加火'));
    $layout->addItem($huo);

}


//1 判断文章是否为最近更新
/*<?php if(timeZone($this->date->timeStamp)) echo '<span class="ziz-title-new">新</span>';?>*/
function timeZone($from){
$now = new Typecho_Date(Typecho_Date::gmtTime());
return $now->timeStamp - $from < 1*24*60*60 ? true : false;//1是天数
}

//2 前台用户统计
function lognum(){
    $time = time() - 14*24*60*60; //最近两周登陆的
    $db = Typecho_Db::get();
    $num0=0;$num1=0;$num2=0;$num3=0;$num4=0;$num5=0;
    $sql[0] = $db->select()->from('table.users');
    $sql[1] = $db->select()->from('table.users')->where('logged >= ?',$time);
    $sql[2] = $db->select()->from('table.users')->where('group =?','administrator');
    $sql[3] = $db->select()->from('table.users')->where('group =?','editor');
    $sql[4] = $db->select()->from('table.users')->where('group =?','contributor');
    /**/
        $result[0] = $db->fetchAll($sql[0]);        
        foreach($result[0] as $int){
            $num0=$num0+1;
        }; 
        $result[1] = $db->fetchAll($sql[1]);        
        foreach($result[1] as $int){
            $num1=$num1+1;
        }; 
        $result[2] = $db->fetchAll($sql[2]);        
        foreach($result[2] as $int){
            $num2=$num2+1;
        }; 
        $result[3] = $db->fetchAll($sql[3]);        
        foreach($result[3] as $int){
            $num3=$num3+1;
        };
        $result[4] = $db->fetchAll($sql[4]);        
        foreach($result[4] as $int){
            $num4=$num4+1;
        }; 

    
    $num0=$num0+1513;
    $num1=$num1+rand(5,10);
    $num2=$num2+1;
    $num3=$num2+9;
    $num4=$num4+12;
    $num5=$num0-$num2-$num3-$num4;

    echo '<i class="iconfont icon-users"></i> 会员总数 '.$num0.'人<br>其中：活跃 '.$num1.' 人;管理员'.$num2.'人,编辑'.$num3.'人,贡献者'.$num4.'人,普通会员'.$num5.'人。';
}



// 3 缩略图功能 

function thumb($widget){
$dImg = Typecho_Widget::widget('Widget_Options')->themeUrl. '/assets/img/df.png';
if($widget->fields->thumb){
    $ctu = $widget->fields->thumb;
}elseif (preg_match_all('/\<img.*?src\=\"(.*?)\"[^>]*>/i', $widget->content, $thumbUrl)) {
    $ctu = $thumbUrl[1][0];
}elseif (preg_match_all('/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i', $widget->content, $patternMD)) {
    $ctu = $patternMD[1][0];
}elseif (preg_match_all('/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i', $widget->content, $patternMDfoot)) {
    $ctu = $patternMDfoot[1][0];
}else{
    $ctu = $dImg;
}
echo $ctu;
}

//4 热评文章（N天内获得评论数量最多的内容）
/*调用<?php hotCommentPosts(60,5);?>*/
function hotCommentPosts($days = 30,$num = 5){
    $defaults = array(
        'before' => '',
        'after' => '',
        'xformat' => '<div class="p i"><div class="pt"><h1 style="border-left:2px solid #2085ca;padding-left:15px;"><a href="{permalink}">{title}</a></h1></div></div>'
    );
    $time = time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
            ->where('created >= ?', $time)
            ->where('type = ?', 'post')
            ->limit($num)
            ->order('commentsNum',Typecho_Db::SORT_DESC);
    $result = $db->fetchAll($sql);
        echo $defaults['before'];
        foreach($result as $val){
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
            echo str_replace(array('{permalink}', '{title}', '{commentsNum}'), array($val['permalink'], $val['title'], $val['commentsNum']), $defaults['xformat']);
        }
        echo $defaults['after'];
}

// 5 输出随机文章并输出文章的缩略图(thumb字段>HTML5图片>Markdown内联式图片>Markdown脚部式图片>默认图）
function randPosts(){
    $options = Typecho_Widget::widget('Widget_Options');
    $dImg = $options->themeUrl. '/assets/img/df.png';
    $defaults = array(
        'number' => 5,
        'before' => '<div class="post-list rand-post-list"><div class="post-list-inner">',
        'after' => '</div></div>',
        'xformat' => '<a class="item" target="_blank" href="{permalink}" title="{title}"><div class="thumb"><img src="{dImg}" data-src="{img}" alt="{title}"></div><p>{title}</p></a>'
    );
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit($defaults['number'])
        ->order('RAND()');
    $result = $db->fetchAll($sql);
    echo $defaults['before'];

    foreach($result as $val){
        //取对应cid对应的fields中的thumb值作为缩略图
        $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
        $cid = $val['cid'];
        $db1 = Typecho_Db::get();
        $sql1 = $db1->select()->from('table.fields')
            ->where('cid = ?',$cid)
            ->where('name = ?', 'thumb')
            ->limit(1);
        $result1 = $db1->fetchAll($sql1);
        $val1[0] = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($result1[0]);
        $img=$result1[0]['str_value'];
        //如果thumb为空，在文章内匹配
        if ($img == ''){
            preg_match_all('/\<img.*?src\=\"(.*?)\"[^>]*>/i', $val['text'], $thumbUrl);  //通过正则式获取图片地址
            preg_match_all('/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i', $val['text'], $patternMD);  //通过正则式获取图片地址
            preg_match_all('/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i', $val['text'], $patternMDfoot);  //通过正则式获取图片地址
            if(count($thumbUrl[0])>0){
                $img = $thumbUrl[1][0];  //当找到一个src地址的时候，输出缩略图
            }else if(count($patternMD[0])>0){
                $img = $patternMD[1][0];
            }else if(count($patternMDfoot[0])>0){
                $img = $patternMDfoot[1][0];
            }else{
                $img=$dImg;
            }
        }
        echo str_replace(array('{permalink}', '{title}','{img}','{dImg}'),array($val['permalink'], $val['title'],$img,$dImg), $defaults['xformat']);
    }
    echo $defaults['after'];
}


// 6 热门文章：并输出缩略图！！用作首页轮播推荐！！

function hotPosts($days = 30,$num = 4){
    $options = Typecho_Widget::widget('Widget_Options');
    $dImg=$options->themeUrl. '/assets/img/df.png';
    $defaults = array(
        'before' => '',
        'after' => '<li><a href="http://blog.zizdog.com" target="_blank"><img src="http://link.zizdog.com/zizblog.jpg"/></a></li>',
        'xformat' => '<li><a target="_blank" href="{permalink}" title="{title}"><img src="{img}" alt="{title}"></a></li>'
    );

    $time =time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();

    $sql = $db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->where('created >= ?', $time)
        ->limit($num)
        ->order('views',Typecho_Db::SORT_DESC);
    $result = $db->fetchAll($sql);

    echo $defaults['before'];
    foreach($result as $val){
        //取对应cid对应的fields中的thumb值作为缩略图
        $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
        $cid = $val['cid'];
        $db1 = Typecho_Db::get();
        $sql1 = $db1->select()->from('table.fields')
            ->where('cid = ?',$cid)
            ->where('name = ?', 'thumb')
            ->limit(1);
        $result1 = $db1->fetchAll($sql1);
        $val1[0] = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($result1[0]);
        $img=$result1[0]['str_value'];
        //如果thumb为空，在文章内匹配
        if ($img == ''){
            preg_match_all('/\<img.*?src\=\"(.*?)\"[^>]*>/i', $val['text'], $thumbUrl);  //通过正则式获取图片地址
            preg_match_all('/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i', $val['text'], $patternMD);  //通过正则式获取图片地址
            preg_match_all('/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i', $val['text'], $patternMDfoot);  //通过正则式获取图片地址
            if(count($thumbUrl[0])>0){
                $img = $thumbUrl[1][0];  //当找到一个src地址的时候，输出缩略图
            }else if(count($patternMD[0])>0){
                $img = $patternMD[1][0];
            }else if(count($patternMDfoot[0])>0){
                $img = $patternMDfoot[1][0];
            }else{
                $img=$dImg;
            }
        }
        echo str_replace(array('{permalink}', '{title}','{img}'),array($val['permalink'], $val['title'],$img), $defaults['xformat']);
    }
    echo $defaults['after'];
}

// 7 浏览统计，cookie版本
/*调用：<?php views($this) ?>*/
function views($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 1;');//默认1起步
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
        if(!in_array($cid,$views)){
        $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
        array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    $vn=$row['views'];
    echo $vn;
}


// 8 热门文章（N天内点击最多的内容）结合7浏览统计：轻松实现，月度、年度、总热门文章
/*调用<?php zizHotViews(60,5);?>*/
function hotViews($days = 30,$num = 5){
    $defaults = array(
        'before' => '',
        'after' => '',
        'xformat' => '<li><a href="{permalink}">{title}</a></li>'
    );
    $time =time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
            ->where('created >= ?', $time)
            ->where('type = ?', 'post')
            ->limit($num)
            ->order('views',Typecho_Db::SORT_DESC);
    $result = $db->fetchAll($sql);
        echo $defaults['before'];
        foreach($result as $val){
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
            echo str_replace(array('{permalink}', '{title}'), array($val['permalink'], $val['title']), $defaults['xformat']);
        }
        echo $defaults['after'];
}

 // 9 加载时间(调用  echo timer_stop();

    function timer_start() {
        global $timestart;
        $mtime     = explode( ' ', microtime() );
        $timestart = $mtime[1] + $mtime[0];
        return true;
    }
    timer_start();
    function timer_stop( $display = 0, $precision = 3 ) {
        global $timestart, $timeend;
        $mtime     = explode( ' ', microtime() );
        $timeend   = $mtime[1] + $mtime[0];
        $timetotal = number_format( $timeend - $timestart, $precision );
        $r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
        if ( $display ) {
            echo $r;
        }
        return $r;
    }
    
// 10 网站运行时间
date_default_timezone_set('Asia/Shanghai');//设置时区
/**
 * 秒转时间，格式 年 月 日 时 分 秒
 * 
 * @author Roogle
 * @return html
 */
function getBuildTime(){
    // 在下面按格式输入本站创建的时间
    $site_create_time = strtotime('2012-12-12 00:00:00');
    $time = time() - $site_create_time;
    if(is_numeric($time)){
        $value = array(
            "years" => 0, "days" => 0, "hours" => 0,
            "minutes" => 0, "seconds" => 0,
        );
        if($time >= 31556926){
            $value["years"] = floor($time/31556926);
            $time = ($time%31556926);
        }
        if($time >= 86400){
            $value["days"] = floor($time/86400);
            $time = ($time%86400);
        }
        if($time >= 3600){
            $value["hours"] = floor($time/3600);
            $time = ($time%3600);
        }
        if($time >= 60){
            $value["minutes"] = floor($time/60);
            $time = ($time%60);
        }
        $value["seconds"] = floor($time);
        
        echo ''.$value['years'].'年'.$value['days'].'天'.$value['hours'].'小时'.$value['minutes'].'分';
    }else{
        echo '';
    }
}
