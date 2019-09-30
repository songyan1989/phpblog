
<?php
	//
	session_start();
//	session_start();
//告诉服务器使用session。一般来说，php是不会主动使用session的。
//不过可以设置php.ini中的session.auto_start=1来自动对每个请求使用。
//而用了session_start()，或者自动开启session，
//服务器会根据请求头部传来的cookie中或url中的PHPSESSID来确认此sessionid对应的$_SESSION数组。
	//设置Content-Type
	header("Content-Type: text/html; charset=utf-8");
	//
	include('../config.php');
	$session_aid=$input->session('aid');
	//判断是否登录，看session中是否有值
	if($session_aid===false){
		header("location:login.php");//如果没登录，则跳转到登录页
	};
	$sql="SELECT * FROM admin WHERE aid='{$session_aid}'";
	$session_user_result=$db->query($sql);
	$session_user=$session_user_result->fetch_array(MYSQLI_ASSOC);
?>