<?php
namespace Admin\Controller;


class ProductController extends CommonController {

	public function __construct()
	{
		parent::__construct();
		$this->product = M('product');
		$this->procate = M('product_cate');
	}


    public function index(){

    	$count = $this->product->count();
    	$pageSize = 7;
    	$page = new \Think\Page($count,$pageSize);  //实例化分页类
    	$show = $page->show();   //输出具体分页内容
    	//查询数据
    	$product_list = $this->product->alias('pro')->join('green_product_cate AS cate ON pro.procate_id = cate.procate_id','LEFT')->order('pro.product_id DESC')->limit($page->firstRow,$page->listRows)->select();
       //查询分组信息
       // $info=$this->product->field("procate_id")->group("procate_id")->select();
        // show_bug( $info);


    	$this->assign('page_str',$show);
    	$this->assign('product_list',$product_list);

    	$this->display();
    }


    public function add()
    {
    	$ProductModel = D('Product');

    	if(IS_POST && $data = $ProductModel->create())
    	{
    		$ProductModel->product_time = strtotime($data['product_time']);
    		if($_FILES['product_img']['size'] && $filename = FileUpload('product_img'))
    		{
    			$ProductModel->product_img = $filename;
    		}
            if($_FILES['product_pics'])
            {
               $product_pics=FileUpload('product_pics');
               $ProductModel->product_pics = $product_pics;
            }



    		if($ProductModel->add())
    		{
    			$this->success('产品产品成功',U('product/index'));
    			exit();
    		}else{
    			$this->error('产品插入失败',U('product/add'));
    			exit();
    		}


    	}

    	$procate = M('product_cate');
    	$procate_list = $procate->select();
    // var_dump($procate_list);exit;
    	$this->assign('procate_list',$procate_list);

    	$this->display();
    }

    public function edit()
    {

    	$product_id = I('get.product_id',0);
    	if(!$product_id)
    	{
    		redirect('index',1,'页面跳转中...');
    		exit;
    	}

    	$product_info = $this->product->alias('pro')->join('green_product_cate AS cate ON pro.procate_id = cate.procate_id')->where("pro.product_id = $product_id")->find();

    	$ProductModel = D('Product');

    	if(IS_POST && $data = $ProductModel->create())
    	{
    		$ProductModel->product_id = $product_id;
    		$ProductModel->product_time = strtotime($data['product_time']);
    		if($_FILES['product_img']['size'] && $filename = FileUpload('product_img'))
    		{
    			$ProductModel->product_img = $filename;
    		}

    		if($ProductModel->save())
    		{
    			$this->success('更新产品成功',U('product/index'));
    			exit();
    		}else{
    			$this->error('更新产品失败',U('product/edit',array('product_id'=>$product_id)));
    			exit();
    		}


    	}

    	$procate = M('product_cate');
    	$procate_list = $procate->select();

    	$this->assign('procate_list',$procate_list);
    	$this->assign('product_info',$product_info);

    	$this->display();
    }

    function delete()
    {
    	$product_id = I('get.product_id',0);
    	if(!$product_id)
    	{
    		redirect('index',1,'页面跳转中...');
    		exit;
    	}

    	if($this->product->delete($product_id))
    	{
    		$this->success('删除产品成功',U('product/index'));
    		exit;
    	}else{
    		$this->error('删除产品失败',U('product/index'));
    		exit;
    	}
    }

    
}