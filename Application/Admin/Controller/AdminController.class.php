<?php
namespace Admin\Controller;
use Think\Controller;



class AdminController extends CommonController {


    public function __construct()
    {
        parent::__construct();
        $this->admin = M('admin');
    }


    public function index(){

        $count = $this->admin->count();   //统计总数

        $pageSize = 7;   //设置每页显示多少条

        $page = new \Think\Page($count,$pageSize);  //实例化分页类

        $show = $page->show();  //调用分页函数

        //获取数据
        $admin_list = $this->admin->order('admin_id')->limit($page->firstRow,$page->listRows)->select();
        // var_dump($admin_list);
        // exit;

        //赋值
        $this->assign('page_str',$show);
        $this->assign('admin_list',$admin_list);

        $this->display();
    }

    public function add()
    {
        $adminModel = D('admin');  

        if(IS_POST && $data = $adminModel->create()){  
              // var_dump( $data);exit;
              $adminModel->admin_pwd = md5($data['admin_pwd']);
            // $adminModel->admin_time = strtotime($data['admin_time']);
   //       if($_FILES['admin_img']['size'] && $filename = FileUpload())
   //       {
   //           $adminModel->admin_img = $filename;
   //       }

            if($adminModel->add())  
            {
                $this->success('插入设置成功',U('admin/index'));
                exit;
            }else{
                $this->error('插入设置失败',U('admin/add'));
                exit;
            }

        }

        $this->display();
    }


    public function delete()
    {
        $admin_id = I('get.admin_id',0);
        if(!$admin_id)
        {
            $this->error('该设置不存在',U('admin/index'));
            exit;
        }

        if($this->admin->delete($admin_id))
        {
            $this->success('删除成功',U('admin/index'));
            exit;
        }else{
            $this->error('删除失败',U('admin/index'));
            exit;
        }

        
    }


      public function edit()
    {
        $admin_id = I('get.admin_id',0);

        if(!$admin_id)
        {
            $this->error('该设置不存在',U('admin/index'));
            exit;
        }

        $admin_info = $this->admin->where("admin_id = $admin_id")->find();

        $adminModel = D('admin');  
        if(IS_POST && $data = $adminModel->create()){   
          

            $adminModel->admin_id = $admin_id;

            if($adminModel->save())   
            {
                $this->success('修改设置成功',U('admin/index'));
                exit;
            }else{
                $this->error('修改设置失败',U('admin/edit',array('admin_id'=>$admin_id)));
                exit;
            }

        }

        $this->assign('admin_info',$admin_info);

        $this->display();
    }

    
}