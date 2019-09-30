<?php 
	include('config.php');
	
	//var_dump($settingarr);
	//获取文章
	$sql="SELECT * FROM page ORDER BY pid DESC LIMIT 0,10";
	$result=$db->query($sql);
	$blogs=array();
	while($row=$result->fetch_array(MYSQLI_ASSOC)){
		$blogs[]=$row;
	}
//	var_dump($blogs);
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
					  	<li><a href="#">首页</a></li>
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
						<?php forEach($blogs as $blog):;?>
						<div class="panel panel-default">
						  	<div class="panel-heading">
						    	<a href="read.php?pid=<?php echo $blog['pid'];?>"><h3 class="panel-title"><?php echo $blog['title'];?></h3></a>
						 	</div>
						  	<div class="panel-body">
						   		<?php echo mb_substr(strip_tags($blog['content']),0,100);?>...<!--清除html格式清除图片；限制显示字节数-->
						  	</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
		</div>
	</body>
</html>
