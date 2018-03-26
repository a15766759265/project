<?php
namespace Admin\Controller;
use Think\Controller;



class CommonController extends Controller {

    public function __construct()
    {
        parent::__construct();
        session('[start]');
        $admin_name = session('admin_name');
        if(empty($admin_name))
        {
            $this->error('请重新登录',U('login/index'));
            exit;
        }
    }
    
}