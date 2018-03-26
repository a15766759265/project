<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>绿之宇</title>
<link rel="stylesheet" type="text/css" href="/GreenCMS/Public/home/css/style.css" />
<!--banner-->
<script type="text/javascript" src="/GreenCMS/Public/home/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="/GreenCMS/Public/home/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/GreenCMS/Public/home/js/index.js"></script>
<!--banner-->
</head>

<body>


	
<div style="height:95px; background-color:white;">
  <dl class="header">
    <dt></dt>
    <dd>
          <div class="lxwm"><ul><li><a href="#">&nbsp;</a></li></ul></div>
      <div class="tel"><span>4000-000-0000</span></div>
      <div class="search">
        <input type="text">
        <button>&nbsp;</button>
      </div>
    </dd>   
  </dl>
</div>

<!--nav-->
<div class="menu">
  <ul class="nav">
    <a href="<?php echo U('Index/index');?>"><li id="dangqian">首页</li></a>
    <a href="<?php echo U('Article/index');?>"><li>关于我们</li></a>
    <a href="<?php echo U('Product/index');?>"><li>产品展示</li></a>
    <a href="#"><li>案例展示</li></a>
    <a href="#"><li>新闻中心</li></a>
        <a href="#"><li>联系我们</li></a>
        <a href="#"><li>加盟优势</li></a>
        <li class="last">&nbsp;
          <ul class="lang">
              <li><a href="#">English</a></li>
                <li><a href="#">简体中文</a></li>
            </ul>
        </li>
  </ul>
</div>

<!--banner-->

<!--main-->

<div class="fullSlide">   
  <div class="bd">
    <ul>
      <li><a href="javascript:void();"><img src="/GreenCMS/Public/home/images/banner.png"></a></li>
      <li><a href="javascript:void();"><img src="/GreenCMS/Public/home/images/banner.png"></a></li>
      <li><a href="javascript:void();"><img src="/GreenCMS/Public/home/images/banner.png"></a></li>
    </ul>
  </div>
  <div class="hd"><ul></ul></div>
</div>
<script type="text/javascript">
    jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });
  </script>

<div  class="about">
  <div class="inner">
      <div class="left">
          <div class="head">
          <h1><?php echo ($article_list["article_title"]); ?></h1><small>ABOUT</small>
            </div>
            <div class="con">
              <img class="l_img" src="/GreenCMS/Public/home/images/about.png" />
              <p><?php echo ($article_list["article_desc"]); ?> </p>
                <div class="more1">
                  查看详情>>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="right">
          <div class="head">
          <h1>联系方式</h1><small>CONTACT</small>
            </div>
            <div class="con">
              <img src="/GreenCMS/Public/home/images/lxwm.png" />
              <dl>
                  <dt>地址：</dt><dd>广州市白云区江高镇泉溪工业区88号</dd>
                    <dt>手机：</dt><dd><?php echo ($contact_list["contact_phone"]); ?> 李小姐</dd>
                    <dt>手机：</dt><dd><?php echo ($contact_list["contact_phone"]); ?></dd>
                    <dt>电话：</dt><dd><?php echo ($contact_list["contact_phone"]); ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div >

<div  class="news">
  <div class="inner">
      <div class="left">
          <div class="head">
          <h1>新闻中心</h1><small>NEWS</small>
            </div>
            <div class="con">
              <div class="news_box">
                  <ul>
                  <?php if(is_array($article_info)): foreach($article_info as $key=>$item): ?><li><a href="#"><?php echo ($item["article_title"]); ?></a><span class="time"><?php echo (date('Y-m-d',$item["article_time"])); ?></span></li><?php endforeach; endif; ?>>  
                  </ul>
                </div>
                <div class="qh">
                  <span class="prev">&nbsp;</span>
                    <span class="next">&nbsp;</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="right">
          <div class="head">
          <h1>快捷入口</h1><small>&nbsp;</small>
            </div>
            <div class="con">
              <div class="tab">
                  <ul>
                      <li class="cur">留言板</li>
                        <li>计算机</li>
                        <li>产品</li>
                    </ul>
                    <span class="toright"></span>
                </div>
            </div>
        </div>
    </div>
</div >

<div class="yw">
  <div class="inner">
        <ul>

        <?php if(is_array($product_info)): foreach($product_info as $key=>$item): ?><li>
              <img src="/GreenCMS/Public/home/images/p1.png">
                <div class="name"><?php echo ($item["product_name"]); ?></div>
            </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>

<!--footer-->
<div class="bottom">
  <div class="inner">
      <ul class="ul1">
          <li class="li1">产品与服务
          ` <ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">案例展示
            <ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">新闻中心
            <ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">关于我们
            <ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">人才招聘
            <ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <div class="clear"></div>
      </ul>
  </div>
    <div class="ba"><div class="inner"><span class="left">版权所有2015深圳市绿之宇科技有限公司 all rights reserved. 粤icp备 0000000号</span><span class="right"><a href="#">联系我们</a>  |   <a href="#">网站地图</a></span></div></div>
</div> 
</body>
</html>