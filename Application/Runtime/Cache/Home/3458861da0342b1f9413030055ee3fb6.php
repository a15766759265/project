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
<div class="main">
    <div class="inner">
        <!--菜单-->
        <div class="left_nav">
            <div class="head">
                <h1>产品展示<span class="icon"><img src="/GreenCMS/Public/home/images/jian1.png" /></span></h1>
            </div>
            <div class="con">
                <ul>
                 <?php if(is_array($procate_list)): foreach($procate_list as $key=>$item): ?><li class="cur">
                    <a href="<?php echo U('product/index',array('procate_id'=>$item['procate_id']));?>"><?php echo ($item["procate_name"]); ?></a><span class="icon"><img src="/GreenCMS/Public/home/images/plus.png" />
                    </li><?php endforeach; endif; ?> 
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
        <!--产品列表-->
        <div class="right_con">
            <h2><a href="#">首页><a href="#">产品展示></a><a class="cursite">钢化玻璃</a></h2>
            <div class="content">
                <h3>钢化玻璃</h3>
                <ul class="ul_prod">
                <?php if(is_array($product_info)): foreach($product_info as $key=>$item): ?><li>
                        <img src="/GreenCMS/Public/<?php echo ($item["product_img"]); ?>" />
                        <div class="tit"><?php echo ($item["product_name"]); ?></div>
                    </li><?php endforeach; endif; ?>
                </ul>
               <div class="clear"></div>
               <div class="fenye">
                <ul>
                   <?php echo ($page_str); ?>
                    <div class="clear"></div>
                </ul>
               </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
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