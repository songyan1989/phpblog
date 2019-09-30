<?php
	class input{
		function post($key=false){//默认为false
			if($key === false){
				return $_POST;
			}
			if(isset($_POST[$key])){//检查变量是否设置，并且不为null
				return $_POST[$key];
			}else{
				return false;
			}
		}
		function get($key=false){//默认为false，但是也可以传值，封装$_GET方法
			if($key === false){
				return $_GET;
			}
			if(isset($_GET[$key])){
				return $_GET[$key];
			}else{
				return false;
			}
		}
		function session($key=false){//默认为false
			if($key === false){
				return $_SESSION;
			}
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}else{
				return false;
			}
		}
	}
?>