<?php
namespace Admin\Model;

use Think\Model;


class ProductModel extends Model{
	protected $_validate = array( 
         array('product_title','require','产品标题必填'), 
         // array('article_author',"3,7",'填写文章作者',2,'length'), //默认情况下用正则进行验证
     );


	// protected $_auto = array(
	// 	array('article_title','require','文章标题必填'),
	// );
}



 ?>