<?php
	//程序的配置文件
	include('check.php');
	//*修改用户信息
	$aid=$input->get('aid');
	$row=array(
		'auser'=>'',//添加初始值
		'apass'=>'',
	);
	
	if(!empty($aid)){//aid不为空时，找到该条数据，显示在form中
		$sql="SELECT * FROM admin WHERE aid='{$aid}'";
		$rel=$db -> query($sql);
		$row=$rel -> fetch_array(MYSQL_ASSOC);
	}
	//*添加用户信息
	if($input->get('do')=='add'){
		$auser=$input -> post('auser');
		$apass=$input -> post('apass');
		//不能为空，只要有1个为空，则停止执行
		if(empty($auser) || empty ($apass)){
			die("账户和用户名不能为空");
		}
		//检查用户名是否重复
		
		$sql="select * from admin where auser = '{$auser}' and aid <> '{$aid}'";//<>不等于，排序当前传进来的id
		$rel=$db -> query($sql);
		//如果有值，则重复
		if($rel -> fetch_array() ){
			die('用户名不能重复');
		}
		//添加用户名
		if(empty($aid)){//aid为空时,添加新数据
			//插入数据
			$sql="insert into admin (auser,apass) values ('{$auser}','{$apass}')";
		}else{//aid不为空时,修改传进来的数据
			//修改数据
			$sql="update admin set auser='{$auser}',apass='{$apass}' where aid='{$aid}' ";
		}
		$is=$db->query($sql);
		if($is){
			header("location:auser.php");
		}else{
			die('添加失败');
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
		<?php include('nav.inc.php');?>
		<div class="container">
			<h1>管理员管理 <small><a href="auser.php" class="btn btn-default pull-right">返回</a></small></h1>
			<hr />
			<div class="rows">
				<form class="form-horizontal" action="auser_add.php?do=add&&aid=<?php echo $aid;?>" method="post">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control"  name="auser" value="<?php echo $row['auser'];?>" placeholder="请输入用户名" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label" >密码</label>
				    <div class="col-sm-6">
				      <input type="password" class="form-control" name="apass" value="<?php echo $row['apass'];?>"  placeholder="请输入密码"> 
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-6">
				      <button type="submit" class="btn btn-default">提交</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>

	</body>
</html> 	