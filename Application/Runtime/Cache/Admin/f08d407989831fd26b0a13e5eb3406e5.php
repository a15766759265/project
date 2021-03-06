<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="/GreenCMS/Public/admin/stylesheets/theme.css">
    <link rel="stylesheet" href="/GreenCMS/Public/admin/lib/font-awesome/css/font-awesome.css">

    <script src="/GreenCMS/Public/admin/lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
        /*page css*/
.Pagination a:hover,.current{background-color: #f54281;border: 1px solid #f54281;color: #ffffff; }
.Pagination{width:60%;margin:0 auto;float: right;height: auto;_height: 45px; line-height: 20px;margin-right: 15px;_margin-right: 5px; color:#565656;margin-top: 10px;_margin-top: 20px; clear:both;}
.Pagination a,.Pagination span{ font-size: 14px;text-decoration: none;display: block;float: left;color: #565656;border: 1px solid #ccc;height: 34px;line-height: 34px;margin: 0 2px;width: 34px;text-align: center;}
    </style>
  </head>


  <body class=""> 

    

    <div class="navbar">
    <div class="navbar-inner">
            <ul class="nav pull-right">
                <li>
                    <a href="#" role="button">
                        <i class="icon-user"></i> <?php echo (session('admin_name')); ?>
                    </a>
                </li>
                <li><a href="<?php echo U('login/logout',array('action'=>'logout'));?>" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
            </ul>
            <a class="brand" href="index.html"><span class="first">Blog</span> <span class="second">Admin</span></a>
    </div>
</div>

<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>控制面板</a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li><a href="<?php echo U('Index/index');?>">首页</a></li>
        <li ><a href="<?php echo U('Article/index');?>">文章管理</a></li>
        <li ><a href="<?php echo U('Product/index');?>">产品管理</a></li>
        <li ><a href="<?php echo U('Procate/index');?>">产品分类管理</a></li>
        <li ><a href="<?php echo U('config/index');?>">设置管理</a></li>
        <li ><a href="<?php echo U('Contact/index');?>">留言管理</a></li>
        <li ><a href="<?php echo U('admin/index');?>">管理员</a></li>
    </ul>
</div>
    <div class="content">
    <div class="header">
        <h1 class="page-title">发布留言</h1>
    </div>
            <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">发布留言</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                
            <div class="btn-toolbar">
                <button class="btn btn-primary" onClick="location='<?php echo U('contact/index');?>'"><i class="icon-list"></i> 留言列表</button>
              <div class="btn-group">
              </div>
            </div>
            <div class="well">
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane active in" id="home">
                    <form method="post">
                        <label>留言名称</label>
                        <input type="text" value="<?php echo ($contact_info["contact_name"]); ?>" name="contact_name" class="input-xxlarge">
                        <label>留言电话</label>
                        <input type="text" value="<?php echo ($contact_info["contact_phone"]); ?>" name="contact_phone" class="input-xxlarge">
                        <label>留言时间</label>
                        <input type="date" value="<?php echo (date('Y-m-d',$contact_info["contact_time"])); ?>" name="contact_time" class="input-xxlarge">
                        <label>邮箱</label>
                        <input type="email" value="<?php echo ($contact_info["contact_email"]); ?>" name="contact_email" class="input-xxlarge">
                        <label>审核状态</label>
                        <input type="radio" <?php echo ($contact_info['contact_state']?"checked":""); ?> name="contact_state" value="1" class="input-xxlarge">已审核
                        <input type="radio" <?php echo ($contact_info['contact_state']?"":"checked"); ?> name="contact_state" value="0" class="input-xxlarge">未审核
                        <label>留言内容</label>
                        <textarea value="Smith" name="contact_content" rows="3" class="input-xxlarge"><?php echo ($contact_info["contact_content"]); ?></textarea>
                        <label></label>
                        <input class="btn btn-primary" type="submit" value="提交" />
                    </form>
                  </div>
              </div>

            </div>

            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Delete Confirmation</h3>
              </div>
              <div class="modal-body">
                
                <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button class="btn btn-danger" data-dismiss="modal">Delete</button>
              </div>
            </div>



                
        </div>
    </div>
</div>
    

    <script src="/GreenCMS/Public/admin/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>