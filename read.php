<?php
	include('config.php');//加引号
	$pid=$input->get('pid');
	$sql="SELECT * FROM page WHERE pid='{$pid}'";
	$blog=$db->query($sql)->fetch_array(MYSQL_ASSOC);
	var_dump($blog);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo $settingarr['title'];?></title>
		<?php include('header.inc.php');?>
	</head>
	<body>
		<div class="container">
			<div class="row">
					<div class="jumbotron">
						<h3><?php echo $settingarr['title'];?></h3>
						<p><?php echo $settingarr['intro'];?></p>
					</div>
					<ol class="breadcrumb">
					  	<li><a href="../blog/index.php">首页</a></li>
					  	<li><?php echo $blog['title'];?></li>
					</ol>
					<div class="col-md-3">
						<div class="panel panel-default">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">博主介绍</h3>
						 	</div>
						  	<div class="panel-body">
						   		我是一个设计师
						  	</div>
						</div>
						<div class="panel panel-default">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">博客概况</h3>
						 	</div>
						  	<div class="panel-body">
						   		查看数据
						  	</div>
						  	
						</div>
						
					</div>
					<div class="col-md-9">
						<div class="panel panel-default">
						  	<div class="panel-heading">
						    	<h3 class="panel-title"><?php echo $blog['title'];?></h3>
						 	</div>
						  	<div class="panel-body">
						   		<?php echo $blog['content'];?>
						  	</div>
						</div>
					</div>
				</div>
		</div>
	</body>
</html>
