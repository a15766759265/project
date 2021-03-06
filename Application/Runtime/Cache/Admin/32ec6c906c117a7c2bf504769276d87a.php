<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/GreenCMS/Public/admin/lib/bootstrap/css/bootstrap.css">
    
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
    </style>
  </head>


  <body class=""> 
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Blog</span> <span class="second">Admin</span></a>
        </div>
    </div>
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">登录</p>
            <div class="block-body">
                <form method="post" action="/GreenCMS/index.php/Admin/login/index.html">
                    <label><?php echo (L("USERNAME")); ?></label>
                    <input type="text" name="admin_name" class="span12">
                    <label>Password</label>
                    <input type="password" name="admin_pwd" class="span12">
                    <label>验证码</label>
                    <input type="text" name="admin_code" class="span12">
                    <img src="<?php echo U('login/imgcode');?>" onclick="this.src=this.src+'?'" />
                    <button class="btn btn-primary pull-right">登录</button>
                    
                    <div class="clearfix"></div>
                </form>
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