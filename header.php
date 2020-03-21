<!DOCTYPE html>
<html>
<head>
<title>
<?php $this->options->title(); ?><?php if($this->is('index')) echo' - 自由纯粹的电影资源站！';?>
<?php if($this->_currentPage>1) echo ' - 第 '.$this->_currentPage.' 页'; ?> 
<?php $this->archiveTitle(array('category'=>_t('分类 %s 的内容'),'search'=>_t('包含关键字 %s 的电影'),'tag' =>_t(' %s 相关电影'),'author'=>_t('%s 的主页')), ' - ', ''); ?>
</title>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link rel="shortcut icon" href="//v.zizdog.com/favicon.ico" />
<link rel="icon" type="image/x-icon" href="//v.zizdog.com/favicon.ico">
<link rel="apple-touch-icon" href="<?php $this->options->themeUrl('assets/img/icon.png'); ?>">
<link rel="icon" sizes="any" mask href="<?php $this->options->themeUrl('assets/img/dog.svg'); ?>">
<link rel="stylesheet" href="//at.alicdn.com/t/font_841517_1ql1j06l6x3.css">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>">
<link rel="<?php if($_COOKIE['night'] != '1'){echo 'alternate ';} ?>stylesheet" href="<?php $this->options->themeUrl('assets/css/dark.css'); ?>" title="dark">
<?php if ($this->is('post')) : ?>
<meta property="og:type" content="article"/>
<meta property="article:published_time" content="<?php $this->date('c'); ?>"/>
<meta property="article:author" content="<?php $this->author(); ?>" />
<meta property="article:published_first" content="<?php $this->options->title() ?>, <?php $this->permalink() ?>" />
<meta property="og:title" content="<?php $this->title() ?>" />
<meta property="og:url" content="<?php $this->permalink() ?>" />
<?php endif; ?>
<?php $this->header();?>
</head>
<body>
<?php include 'ic/login-bar.php';?>
<?php include 'ic/header.php';?>
<?php if ($this->is('index')&& $this->options->zizSlider){include 'ic/slider2.php';}?>
<?php if ($this->is('category','FuLi')&& $this->options->zizSlider){include 'ic/slider-fl.php';}?>
<div id="main" class="main w1">
<div id="content" class="content w2">
<div id="content-inner" class="content-inner w2-inner">