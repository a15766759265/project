<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
    public function __construct()
  {
    parent::__construct();

    $this->product = M('product');
    $this->procate = M('product_cate');
  }
    public function index(){
 $procate_id = I('get.procate_id',0);
 // var_dump($procate_id);exit;
        $count = $this->product->alias('produ')->where("produ.procate_id=$procate_id")->count();  
      $pageSize = 6;   
      $page = new \Think\Page($count,$pageSize);  
      $show = $page->show();
        
   


     
      // var_dump($product_info);exit;

       // $product_info = $this->product->order('product_id')->limit($page->firstRow,$page->listRows)->select();
       $product_info = $this->product->alias('pro')->where("pro.procate_id=$procate_id")->limit($page->firstRow,$page->listRows)->select();
       // var_dump($product_info);exit;
    
      $procate_list =$this->procate->limit(6)->where("procate_id >1")->select();
        // var_dump($procate_list);exit;
       $this->assign('product_info',$product_info);
       $this->assign('procate_list',$procate_list);
       $this->assign('page_str',$show);

      
       $this->display();
    }
}