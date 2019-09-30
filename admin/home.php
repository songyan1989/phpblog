<?php
	//程序的配置文件
	include('check.php');
	$sql="SELECT * FROM admin";
	$result=$db -> query($sql);//查询结果
//	var_dump($result);
	$rows=array();
	while($row=$result -> fetch_array(MYSQLI_ASSOC)){
		$rows[]=$row;
	}
//	var_dump($rows);
	
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8" />
		<title>后台管理首页</title>
		<?php include(PATH.'/header.inc.php');?>
	</head>
	<body>
		<?php include('nav.inc.php');?>
		<div class="container">
			<h1>用户管理 <small><a href="#" class="btn btn-default pull-right">添加用户</a></small></h1>
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
						  		<a href="#">编辑</a>
						  		<a href="home.php?do=delete&aid=<?php echo $row['aid'];?>">删除</a>
						  	</td>
						</tr>
						<?php endforeach;?>
				  	</tbody>
				</table>
			</div>
		</div>

	</body>
</html> 	