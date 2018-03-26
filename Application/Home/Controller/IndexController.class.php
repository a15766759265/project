<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
		public function __construct()
	{
		parent::__construct();
		$this->article = M('article');
		$this->contact = M('contact');
		$this->product = M('product');
	}
    public function index(){

        $count = $this->article->count();  
    	$pageSize = 6;   
    	$page = new \Think\Page($count,$pageSize);  
    	$show = $page->show();
        
        $count1 = $this->product->count();  
    	$pageSize1 = 6;   
    	$page1 = new \Think\Page($count1,$pageSize1);  
    	$show1 = $page1->show();



    	
    	$article_list = $this->article->order('article_id')->find();
    	$article_info = $this->article->order('article_id')->limit($page->firstRow,$page->listRows)->select();
    	// var_dump($article_list);
    	// exit;
    	 $contact_list = $this->contact->order('contact_id')->find();
    	 $product_info = $this->product->order('product_id')->limit($page1->firstRow,$page1->listRows)->select();
    	 // var_dump($product_info);exit;
       $this->assign('article_list',$article_list);
       $this->assign('article_info',$article_info);
       $this->assign('product_info',$product_info);

       $this->assign('page_str',$show);

        $this->assign('contact_list',$contact_list);
       $this->display();
    }
}