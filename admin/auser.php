<?php
	//程序的配置文件
	include('check.php');
	//*删除
	if($input->get('do') == 'delete'){
		$aid = $input->get('aid');
		if($session_aid==$aid){
			die('不能删除自己');
		}
		$sql = "DELETE FROM admin WHERE aid ='{$aid}'";
		$is=$db -> query($sql);
		if($is){
			header("location:auser.php");
		}else{
			die('删除失败');
		}
	}
	//*读取数据
	$sql="SELECT * FROM admin";
	$result=$db -> query($sql);
	//var_dump($result);
	$rows=array();
	while($row=$result -> fetch_array(MYSQLI_ASSOC)){
		$rows[]=$row;
	}
	//var_dump($rows);
	
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
			<h1>管理员管理 <small><a href="auser_add.php" class="btn btn-default pull-right">添加用户</a></small></h1>
			<hr />
			<div class="rows">
				<table class="table table-striped">
				  	<thead>
						<tr>
							<th>id</th>
							<th>用户名</th>
							<th>操作按钮</th>
						</tr>
				  	</thead>
				  	<tbody>
				  		<?php forEach($rows as $row):?>
						<tr>
						  	<th scope="row"><?php echo $row['aid'];?></th>
						  	<td><?php echo $row['auser'];?></td>
						  	<td>
						  		<a href="auser_add.php?aid=<?php echo $row['aid'];?>">编辑</a>
						  		<a href="auser.php?do=delete&aid=<?php echo $row['aid'];?>">删除</a> 
						  		<!--传入2个参数，删除和aid-->
						  	</td>
						</tr>
						<?php endforeach;?>
				  	</tbody>
				</table>
			</div>
		</div>

	</body>
</html> 	