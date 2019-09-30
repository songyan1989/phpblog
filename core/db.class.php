<?php
	class db{
		function __construct(){
			$this->mysqli=new mysqli("127.0.0.1","root","123456","blog");
			if( $this->mysqli -> connect_error ){
//				echo "连接失败";
//			 	echo $mysqli->error_list;
//			 	exit；
//.代表连接符
				die('链接错误('.$this -> mysqli ->connect_error.')');
			}
			$this -> query("SET NAMES UTF8");//设置字符集，解决乱码问题
		}
		function query($sql){
			return $this->mysqli->query($sql);
		}
	}
?>