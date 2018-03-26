<?php
namespace Admin\Controller;



class ArticleController extends CommonController {


	public function __construct()
	{
		parent::__construct();
		$this->article = M('article');
	}


    public function index(){
        

    	$count = $this->article->count();   //统计总数

    	$pageSize = 7;   //设置每页显示多少条

    	$page = new \Think\Page($count,$pageSize);  //实例化分页类

    	$show = $page->show();  //调用分页函数
      

    	//获取数据
    	$article_list = $this->article->order('article_id')->limit($page->firstRow,$page->listRows)->select();
       /*批量删除*/

  


    	//赋值
    	$this->assign('page_str',$show);
    	$this->assign('article_list',$article_list);

    	$this->display();
    }

    public function add()
    {      

        // $articleModel = new \Admin\Model\ArticleModel;
    	$articleModel = D('Article');   //加载一个表单模型
        // show_bug($articleModel );
        // exit;
   //  	if(IS_POST && $data = $articleModel->create()){   //IS_POST 判断是否有post过来数据  判断表单验证是否成功
			// //判断是否有文件上传
			// $articleModel->article_time = strtotime($data['article_time']);
   //  		if($_FILES['article_img']['size'] && $filename = FileUpload('article_img'))
   //  		{
   //  			$articleModel->article_img = $filename;
   //  		}

   //  		if($articleModel->add())   //调用add这个方法就会直接插入到数据库里面
   //  		{
   //  			$this->success('插入文章成功',U('Article/index'));
   //  			exit;
   //  		}else{
   //  			$this->error('插入文章失败',U('Article/add'));
   //  			exit;
   //  		}
           if(!empty($_POST)){

            if(!empty($_FILES)){
              $upload = new \Think\Upload();

               $info   =   $upload->uploadOne($_FILES['article_img']);
               // var_dump($info);
               // exit;
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
    }else{// 上传成功 获取上传文件信息
      $_POST['article_img']= "Uploads/".$info['savepath'].$info['savename'];
    }
            }

          $data= $articleModel->create();
          // var_dump($data);exit;
            $articleModel->article_time = strtotime($data['article_time']);
        if (!$data){
            $this->error($articleModel->getError(),U('Article/add'));
         // exit($articleModel->getError());
       }else{
      $info=$articleModel->add();
           if($info){
              
              $this->success('插入文章成功',U('Article/index'));
             exit;
           } else{
            
              $this->error($articleModel->getError());
            // $this->error('插入文章失败',U('Article/add'));
             exit;
           }
   
}
         

           }
    	

    	$this->display();
    }


    public function delete()
    {
      /*单条删除*/
    	$article_id = I('get.article_id',0);
      // show_bug($article_id);exit;

    	if(!$article_id)
    	{
    		$this->error('该文章不存在',U('Article/index'));
    		exit;
    	}

    	if($this->article->delete($article_id))
    	{
    		$this->success('删除成功',U('Article/index'));
    		exit;
    	}else{
    		$this->error('删除失败',U('Article/index'));
    		exit;
    	}

   // $list=$this->article->where(array('article_id'=>array('in',$id)))->delete();



    }


    public function edit()
    {
    	$article_id = I('get.article_id',0);

    	if(!$article_id)
    	{
    		$this->error('该文章不存在',U('Article/index'));
    		exit;
    	}

    	$article_info = $this->article->where("article_id = $article_id")->find();

    	$articleModel = D('Article');   //加载一个表单模型
    	if(IS_POST && $data = $articleModel->create()){   //IS_POST 判断是否有post过来数据  判断表单验证是否成功
			//判断是否有文件上传
			$articleModel->article_time = strtotime($data['article_time']);
    		if($_FILES['article_img']['size'] && $filename = FileUpload('article_img'))
    		{
    			$articleModel->article_img = $filename;
    		}

    		$articleModel->article_id = $article_id;

    		if($articleModel->save())   //调用add这个方法就会直接插入到数据库里面
    		{
    			$this->success('修改文章成功',U('Article/index'));
    			exit;
    		}else{
    			$this->error('修改文章失败',U('Article/edit',array('article_id'=>$article_id)));
    			exit;
    		}

    	}

    	$this->assign('article_info',$article_info);

    	$this->display();
    }

    
}