<?php
namespace Admin\Model;

use Think\Model;


class ArticleModel extends Model{
	// protected $patchValidate = true;
	protected $_validate = array( 
         array('article_title','require','文章标题必填'), //默认情况下用正则进行验证
         array('article_author',"3,7",'填写文章正确作者长度',2,'length'), //默认情况下用正则进行验证
     );


	// protected $_auto = array(
	// 	array('article_title','require','文章标题必填'),
	// );
}



 ?>