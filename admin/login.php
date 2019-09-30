<?php
	session_start();
	//连接服务器
	include('../config.php');
	//判断是否提交申请
	if($input->get('do')=='check'){
		$auser=$input->post('auser');
		$apass=$input->post('apass');
		//var_dump($auser,$apass);
		$sql="SELECT * FROM `admin` WHERE auser='{$auser}' and apass='{$apass}'";
		$mysqli_result=$db -> query($sql);
		var_dump($mysqli_result);
		$row=$mysqli_result ->fetch_array(MYSQLI_ASSOC);
		if(is_array($row)){
//			如果验证成功，将aid保存到$_SESSION
			$_SESSION['aid']=$row['aid'];
			header("location:home.php");
		}else{
			die("用户名和密码错误");
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8" />
		<title>管理员登录</title>
		<?php include(PATH.'/header.inc.php');?>
	</head>
	<body>
		<div class="container">
			<div class="row" style="margin-top:200px;">
				<div class="col-md-3" ></div>
				<div class="col-md-6" >
					<div class="panel panel-primary">
						<div class="panel-heading">管理员登录</div>
						<div class="panel-body">
							<form class="form-horizontal" action="login.php?do=check" method="post">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="auser" id="auser" placeholder="请输入用户名">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">密码</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" name="apass" id="apass" placeholder="请输入密码">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
									  <input type="submit" class="btn btn-primary" id="submit" value="点击登录">
									</div>
								</div>
							</form>
						   
						   
						</div>
						<div class="panel-footer text-right">版权所有，盗版必究</div>
					</div>

				</div>
				<div class="col-md-3" ></div>
			</div>
		</div>
	</body>
</html>
