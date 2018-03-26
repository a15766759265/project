<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
		public function __construct()
	{
		parent::__construct();
		$this->article = M('article');
	}
    public function index(){





      
    	$article_list = $this->article->order('article_id')->find();
    	// var_dump($article_list);
    	// exit;
       $this->assign('article_list',$article_list);
       $this->display();
    }
}