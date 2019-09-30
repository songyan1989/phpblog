<?php
	//程序的配置文件
	include('check.php');
	//var_dump($_FILES);
	$key='file1';
	
	if(isset($_FILES[$key])){
		//利用$key这个键值找到上传的图片
		$file=$_FILES[$key];
		//暂存路径和图片名字
		$tmp_name=$file['tmp_name'];
		$name=$file['name'];
		//新路径
		$dir='../upfiles/'.$name;
		$url='http://localhost/blog/upfile/'.$name;
		if($file['error']==0){
			//将放在暂存文件夹下的图片转移到指定路径
			$is=move_uploaded_file($tmp_name, $dir);
			if(!$is){
				die('上传失败')
			};
			$json=array(
				'success'=>true,
				'msg'=>'',
				'url'=>$url
			);
			echo json_encode($json);
		}
	}
?>