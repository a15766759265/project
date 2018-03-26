<?php
namespace Admin\Controller;
use Think\Controller;



class ProcateController extends CommonController {


	public function __construct()
	{
		parent::__construct();
		$this->procate = M('product_cate');
	}


    public function index(){

    	$count = $this->procate->count();   //统计总数

    	$pageSize = 7;   //设置每页显示多少条

    	$page = new \Think\Page($count,$pageSize);  //实例化分页类

    	$show = $page->show();  //调用分页函数

    	//获取数据
    	$procate_list = $this->procate->order('procate_id')->limit($page->firstRow,$page->listRows)->select();
        // var_dump($procate_list);
        // exit;

    	//赋值
    	$this->assign('page_str',$show);
    	$this->assign('procate_list',$procate_list);

    	$this->display();
    }

    public function add()
    {
    	$procateModel = D('product_cate');  

    	if(IS_POST && $data = $procateModel->create()){  
              // var_dump( $data);exit;
			// $procateModel->procate_time = strtotime($data['procate_time']);
   //  		if($_FILES['procate_img']['size'] && $filename = FileUpload())
   //  		{
   //  			$procateModel->procate_img = $filename;
   //  		}

    		if($procateModel->add())  
    		{
    			$this->success('插入设置成功',U('procate/index'));
    			exit;
    		}else{
    			$this->error('插入设置失败',U('procate/add'));
    			exit;
    		}

    	}

    	$this->display();
    }


    public function delete()
    {
    	$procate_id = I('get.procate_id',0);
    	if(!$procate_id)
    	{
    		$this->error('该设置不存在',U('procate/index'));
    		exit;
    	}

    	if($this->procate->delete($procate_id))
    	{
    		$this->success('删除成功',U('procate/index'));
    		exit;
    	}else{
    		$this->error('删除失败',U('procate/index'));
    		exit;
    	}

    	
    }


      public function edit()
    {
        $procate_id = I('get.procate_id',0);

        if(!$procate_id)
        {
            $this->error('该设置不存在',U('procate/index'));
            exit;
        }

        $procate_info = $this->procate->where("procate_id = $procate_id")->find();

        $procateModel = D('product_cate');  
        if(IS_POST && $data = $procateModel->create()){   
          

            $procateModel->procate_id = $procate_id;

            if($procateModel->save())   
            {
                $this->success('修改设置成功',U('procate/index'));
                exit;
            }else{
                $this->error('修改设置失败',U('procate/edit',array('procate_id'=>$procate_id)));
                exit;
            }

        }

        $this->assign('procate_info',$procate_info);

        $this->display();
    }

    
}