<?php
namespace Admin\Controller;
use Think\Controller;



class LoginController extends Controller {

	function __construct()
	{
		parent::__construct();
		$res = C('LAYOUT_ON',false);
		$this->admin = M('admin');
		session('[start]');   //开启session 
		$this->Verify = new \Think\Verify();
	}

    public function index(){

    	$adminModel = D('Admin');
       

    	if(IS_POST && $data = $adminModel->create())
    	{
            if(!$data) {
        $this->error($adminModel->getError());
        exit;
    }

            $code = I('post.admin_code');

    		if(!$this->Verify->check($code,''))
    		{
    			redirect('index',1,'验证码失败');
    			exit;
    		}

    		$where = array('admin_name'=>$data['admin_name'],'admin_pwd'=>md5($data['admin_pwd']));
    		$admin_info = $this->admin->where($where)->find();
    		if(!$admin_info){
    			redirect('index',3,'登录失败，请重新登录');
    			exit;
    		}

    		session('admin_name',$admin_info['admin_name']);  //赋值到session里面
    		$this->success('登录成功',U('index/index'));
    		exit;

$res=$adminModel->getError();

    	}else if($res="")
    	{
    		$this->error($adminModel->getError(),U('login/index'));
    	}

    	$this->display();
    }

    public function logout()
    {
    	$action = I('get.action','');

    	if($action == 'logout')
    	{
    		session('[destroy]');
    		$this->success('退出成功',U('login/index'));
    		exit;
    	}
    }

    public function imgcode()
    {
    	// 验证码字体使用 ThinkPHP/Library/Think/Verify/ttfs/5.ttf
    	$this->Verify->fontttf = 'msyh.ttf'; 
    	// $this->Verify->useZh = true; 
    	$this->Verify->useImgBg = true; 
    	$this->Verify->entry();
    }

    
}