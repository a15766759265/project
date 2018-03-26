<?php
namespace Admin\Model;

use Think\Model;


class ContactModel extends Model{
	protected $_validate = array( 
         array('contact_title','require','留言名称必填'),
          array('contact_time','require','留言时间必填'),
           array('contact_email','email','留言邮箱必填'),
            array('contact_content','require','留言内容必填'), 
            // array('contact_phone','/^1[34578]{1}\d{9}$/','留言号码填写'),
     );
 

    protected function checkPhone()
    {
    $contact_phone=trim(I('post.contact_phone',0));
    	preg_match('/^1[34578]{1}\d{9}$/',$contact_phone,$result);
    	if(!empty($result)){
    		return true;
    	}else{
    		return false;
    	}
    }

	// protected $_auto = array(
	// 	array('contact_title','require','文章标题必填'),
	// );
}



 ?>