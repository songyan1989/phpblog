<?php
//程序的配置文件
	include('check.php');
	//*修改博客
	$pid=$input->get('pid');
	$page=array(
		'title'=>'',
		'content'=>'',
		'author'=>''
	);
	if(!empty($pid)){
		$sql="SELECT * FROM page WHERE pid='{$pid}'";
		$rel=$db->query($sql);
		$page=$rel->fetch_array(MYSQL_ASSOC);
	}
	//var_dump($page);
	//*添加博客
	if($input->get('do')=='add'){
		$title=$input -> post('title');
		$content=$input -> post('content');
		$author=$input -> post('author');
		//不能为空，只要有1个为空，则停止执行
		if(empty($title) || empty ($content) || empty($author)){
			die("名称、内容和作者不能为空");
		}
		//sql模板
		if(empty($pid)){
			//添加
			$intime=time();
			$sqlTpl="INSERT INTO page (title,content,author,intime,uptime) VALUES ('%s','%s','%s','%d','%d')";
			$sql=sprintf($sqlTpl,$title,$content,$author,$intime,0);
//			echo $sql;exit;
		}else{
			//修改
			$uptime=time();
			$sqlTpl="UPDATE page SET title='%s',content='%s',author='%s',uptime='%d' WHERE pid='%d'";
			$sql=sprintf($sqlTpl,$title,$content,$author,$uptime,$pid);
		}
		
		
		$is=$db->query($sql);
		if($is){
			header("location:blog.php");
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
		<link rel="stylesheet" type="text/css" href="../themes/simditor-2.3.5/styles/simditor.css" />
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/module.min.js"></script>
		<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/hotkeys.min.js"></script>
		<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/uploader.min.js"></script>
		<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/simditor.min.js"></script>

	</head>
	<body>
		<?php include('nav.inc.php');?>
		<div class="container">
			<h1>博客管理 <small><a href="blog.php" class="btn btn-default pull-right">返回</a></small></h1>
			<hr />
			<div class="rows">
				<form class="form-horizontal" action="blog_add.php?do=add" method="post">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  name="title" value="<?php echo $page['title'];?>"  placeholder="请输入标题" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">作者</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  name="author" value="<?php echo $page['author'];?>"  placeholder="请输入作者" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">内容</label>
				    <div class="col-sm-8">
				      <textarea type="text" id="content" class="form-control"  name="content"  placeholder="请输入用户名" ><?php echo $page['content'];?></textarea>
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
	<script>
		var editor = new Simditor({
	  	textarea: $('#content'),
	  	upload:{
	  		url:'blog_upload.php',
	  		fileKey:'file1'
	  	}
	  	//optional options
		});
	
	</script>
	</body>
</html> 	