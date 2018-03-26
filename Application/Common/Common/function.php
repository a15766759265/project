<?php





function FileUpload($input_name)
{
	$upload = new \Think\Upload();// 实例化上传类    
	$upload->maxSize   =     3145728324324;// 设置附件上传大小    
	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
	//$upload->savePath  =     C('TMPL_PARSE_STRING.__UPLOAD__'); // 设置附件上传目录    // 上传文件    
	$info   =   $upload->upload();   
	// var_dump($info ) ;
	// exit;
	if(!$info) {// 上传错误提示错误信息        
		// $this->error($upload->getError());      
		return false;
	}else{// 上传成功 
		return "Uploads/".$info[$input_name]['savepath'].$info[$input_name]['savename'];
	}
}

function FileUploads($input_name)
{
	$upload = new \Think\Upload();// 实例化上传类    
	$upload->maxSize   =     3145728324324;// 设置附件上传大小    
	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
	//$upload->savePath  =     C('TMPL_PARSE_STRING.__UPLOAD__'); // 设置附件上传目录    // 上传文件    
	$info   =   $upload->upload(array($_FIlES[$input_name]));    
	if(!$info) {// 上传错误提示错误信息        
		$this->error($upload->getError());    
		return false;
	}else{// 上传成功 
		$str="";
		foreach( $info as $item ){
		$srt.="Uploads/".$item['savepath'].$item['savename'].",";
	}
	return rtrim($str,",");
}
}






?>