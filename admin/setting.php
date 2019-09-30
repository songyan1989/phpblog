<?php
	include('check.php');
	//获取网站配置
	
	//var_dump($setting);
	
	if($input->get('do')=='edit'){
		$setting_result=$input->post();
		//var_dump($setting_result);
		forEach($setting_result as $key=>$value){
			$sql="UPDATE setting SET `value`='{$value}' WHERE `key`='{$key}'";
			//echo $sql;
			$is=$db->query($sql);
			if($is){
				header("location:setting.php");
			}else{
				die('设置失败');
			}
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
			<h1>系统管理 <small><a href="auser.php" class="btn btn-default pull-right">返回</a></small></h1>
			<hr />
			<div class="rows">
				<form class="form-horizontal" action="setting.php?do=edit" method="post">
					<?php forEach($setting as $row):;?><!--$setting是一个数组，-->
					  	<div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $row['cnname'];?></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control"  name="<?php echo  $row['key'];?>" value="<?php echo $row['value'];?>" placeholder="请输入用户名" >
						    </div>
					 	 </div>
					<?php endforeach;?>
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