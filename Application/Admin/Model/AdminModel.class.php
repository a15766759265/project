<?php
namespace Admin\Model;

use Think\Model;


class AdminModel extends Model{
	protected $_validate = array( 
         array('admin_name','require','管理员账号必填'), 
         array('admin_pwd','require','管理员密码必填'), 
     );


	// protected $_auto = array(
	// 	array('article_title','require','文章标题必填'),
	// );
}



 ?>