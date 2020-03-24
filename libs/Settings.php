<?php
//$options = Typecho_Widget::widget('Widget_Options');
//17,读取数据库配置
function ziz_db_typecho(){
    //$options = Typecho_Widget::widget('Widget_Options');
    //$configFile=$options->rootUrl. '/config.inc.php';
    $configFile=realpath('config.inc.php');
        /**/
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