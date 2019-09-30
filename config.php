<?php
	define("PATH",dirname(__FILE__));
	include(PATH . '/core/db.class.php');
	$db=new db();
	include(PATH . '/core/input.class.php');
	$input=new input();
	//获取配置
	$sql='SELECT * FROM setting';
	$set_result=$db->query($sql);
	$setting=array();
	while($row = $set_result->fetch_array(MYSQLI_ASSOC)){
//		var_dump($row);
		$setting[]=$row;
		//将[{key:title,value:网站名称},{key:intro,value:网站简介},{key:pagenum,value:20}]
		//转化成[title:网站名称，intro：网站简介,pagenumj:20]
	}
//	var_dump($set_result);
	//转化
	$settingarr=array();
	forEach($setting as $row){
//		if($row['key']='title'){ echo $row['value'];}
		//var_dump($row);
		$settingarr[$row['key']]=$row['value'];
	}
?>