<?php
namespace Admin\Controller;



class ContactController extends CommonController {

	public function __construct()
	{
		parent::__construct();
		$this->contact = M('contact');
	}



    public function index(){

    	$count = $this->contact->count();

    	$pageSize = 8;

    	$page = new \Think\Page($count,$pageSize);

    	$show = $page->show();

    	$contact_list = $this->contact->order('contact_id','DESC')->limit($page->firstRow,$page->listRows)->select();

    	$this->assign('page_str',$show);
    	$this->assign('contact_list',$contact_list);


    	$this->display();
    }


    public function add()
    {
    	$ContactModel = D('Contact');


         if(!empty($_POST)){

          $data= $ContactModel->create();
          // var_dump($data);exit;
           $ContactModel->contact_time = strtotime($data['contact_time']);
        if (!$data){
            $this->error($ContactModel->getError(),U('Contact/add'));
         // exit($ContactModel->getError());
       }else{
      $info=$ContactModel->add();
           if($info){
              
              $this->success('添加留言成功',U('Contact/index'));
             exit;
           } else{
            
              $this->error($ContactModel->getError());
            // $this->error('插入文章失败',U('Contact/add'));
             exit;
           }
   
}

    	
    		// $ContactModel->contact_time = strtotime($data['contact_time']);
    		// if($ContactModel->add())
    		// {
    		// 	$this->success('添加留言成功',U('contact/index'));
    		// 	exit;
    		// }else{
    		// 	$this->error('添加留言失败',U('contact/add'));
    		// 	exit;
    		// }
    	}

    	$this->display();
    }


    public function delete()
    {
    	$contact_id = I('get.contact_id',0);

    	if(!$contact_id)
    	{
    		redirect('index/',1,'正在跳转');
    		exit;
    	}

    	if($this->contact->delete($contact_id))
    	{
    		$this->success('删除成功',U('contact/index'));
    		exit;
    	}else{
    		$this->error('删除失败',U('contact/index'));
    		exit;
    	}
    }

    public function edit()
    {
    	$contact_id = I('get.contact_id',0);

    	if(!$contact_id)
    	{
    		redirect('index/',1,'正在跳转');
    		exit;
    	}

    	$contact_info = $this->contact->where("contact_id = $contact_id")->find();

    	$ContactModel = D('Contact');

    	if(IS_POST && $data = $ContactModel->create())
    	{
            // var_dump($data);exit;
    		$ContactModel->contact_time = strtotime($data['contact_time']);
    		$ContactModel->contact_id = $contact_id;
    		if($ContactModel->save())
    		{
    			$this->success('更新留言成功',U('contact/index'));
    			exit;
    		}else{
    			
    			$this->error('更新留言失败',U('contact/edit',array('contact_id'=>$contact_id)));
    			exit;
    		}
    	}
     //    else if(!empty($ContactModel->getError())){
    	// 	$this->error($ContactModel->getError(),U('contact/edit',array('contact_id'=>$contact_id)));
    	// 	exit;
    	// }

    	$this->assign('contact_info',$contact_info);

    	$this->display();
    }

    
}