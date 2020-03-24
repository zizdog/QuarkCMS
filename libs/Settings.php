<?php
//$options = Typecho_Widget::widget('Widget_Options');



// 0 带图输出文章！！多合一，未成功！！
//随机文章调用：<?php zizPosts(Rand(),300,5)
//热门文章调用：<?php zizPosts('viwes',60,4)
function zizPosts($type = 0 ,$days = 30,$num = 4){
    $options = Typecho_Widget::widget('Widget_Options');
    $dImg=$options->themeUrl. '/assets/img/df.png';

    if($type = 1){
        $type= "Rand()";
        $defaults = array(
        'before' => '<div class="post-list rand-post-list"><div class="post-list-inner">',
        'after' => '</div></div>',
        'xformat' => '<a class="item" target="_blank" href="{permalink}" title="{title}"><div class="thumb"><img src="{dImg}" data-src="{img}" alt="{title}"></div><p>{title}</p></a>'
        );
    }else{
        $type = 'views';
        $defaults = array(
        'before' => '',
        'after' => '<li><a href="http://blog.zizdog.com" target="_blank"><img src="http://link.zizdog.com/zizblog.jpg"/></a></li>',
        'xformat' => '<li><a target="_blank" href="{permalink}" title="{title}"><img src="{img}" alt="{title}"></a></li>'
        );
    
    }

    $time =time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();

    $sql = $db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->where('created >= ?', $time)
        ->limit($num)
        ->order($type);
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





//99,读取数据库配置
function ziz_db_typecho(){
    $configFile=realpath('config.inc.php');
    $zizDb=array();
        if(file_exists($configFile)){
            $configFile=file_get_contents($configFile);
            if($configFile){
                if(preg_match('/\s*new\s*Typecho_Db\s*\([^,\(\)]+,\s*[\'\"](?P<pre>[^\'\"]+)[\'\"]/i',$configFile,$prefix)){
                    //匹配前缀
                    $zizDb['db_prefix']=$prefix['pre'];
                }
                if(preg_match('/\$db->addServer\s*\((?P<db>[\s\S]+?)\)\s*,/i',$configFile,$db)){
                    //匹配数组
                    $db=$db['db'];
                    $dbKeys=array('db_host'=>'host','db_user'=>'user','db_pwd'=>'password','db_charset'=>'charset','db_port'=>'port','db_name'=>'database');
                    foreach($dbKeys as $k=>$v){
                        if(preg_match('/[\'\"]'.$v.'[\'\"]\s*=\s*>\s*[\'\"](?P<val>[^\'\"]+)[\'\"]/i',$db,$val)){
                            $zizDb[$k]=$val['val'];
                        }
                    }
                }
            }
        }
        echo $ajaxlink = '"'.$zizDb['db_user'].'","'.$zizDb['db_pwd'].'","'.$zizDb['db_name'].'"';
    }