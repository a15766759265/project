<?php
namespace Admin\Model;

use Think\Model;


class ConfigModel extends Model{
	protected $_validate = array( 
         array('config_name','require','设置名称必填'), //默认情况下用正则进行验证
       
     );


	
}



 ?>