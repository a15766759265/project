<?php
namespace Admin\Controller;
use Think\Controller;



class ConfigController extends CommonController {


	public function __construct()
	{
		parent::__construct();
		$this->config = M('config');
	}


    public function index(){

    	$count = $this->config->count();   //统计总数

    	$pageSize = 7;   //设置每页显示多少条

    	$page = new \Think\Page($count,$pageSize);  //实例化分页类

    	$show = $page->show();  //调用分页函数

    	//获取数据
    	$config_list = $this->config->order('config_id')->limit($page->firstRow,$page->listRows)->select();
        // var_dump($config_list);
        // exit;

    	//赋值
    	$this->assign('page_str',$show);
    	$this->assign('config_list',$config_list);

    	$this->display();
    }

    public function add()
    {
    	$configModel = D('config');  

    	if(IS_POST && $data = $configModel->create()){  
              // var_dump( $data);exit;
			// $configModel->config_time = strtotime($data['config_time']);
   //  		if($_FILES['config_img']['size'] && $filename = FileUpload())
   //  		{
   //  			$configModel->config_img = $filename;
   //  		}

    		if($configModel->add())  
    		{
    			$this->success('插入设置成功',U('config/index'));
    			exit;
    		}else{
    			$this->error('插入设置失败',U('config/add'));
    			exit;
    		}

    	}

    	$this->display();
    }


    public function delete()
    {
    	$config_id = I('get.config_id',0);
    	if(!$config_id)
    	{
    		$this->error('该设置不存在',U('config/index'));
    		exit;
    	}

    	if($this->config->delete($config_id))
    	{
    		$this->success('删除成功',U('config/index'));
    		exit;
    	}else{
    		$this->error('删除失败',U('config/index'));
    		exit;
    	}

    	
    }


      public function edit()
    {
        $config_id = I('get.config_id',0);

        if(!$config_id)
        {
            $this->error('该设置不存在',U('config/index'));
            exit;
        }

        $config_info = $this->config->where("config_id = $config_id")->find();

        $configModel = D('config');  
        if(IS_POST && $data = $configModel->create()){   
          

            $configModel->config_id = $config_id;

            if($configModel->save())   
            {
                $this->success('修改设置成功',U('config/index'));
                exit;
            }else{
                $this->error('修改设置失败',U('config/edit',array('config_id'=>$config_id)));
                exit;
            }

        }

        $this->assign('config_info',$config_info);

        $this->display();
    }

    
}