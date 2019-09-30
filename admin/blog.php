<?php
//程序的配置文件
	include('check.php');
	//*删除
	if($input->get('do') == 'delete'){
		$pid = $input->get('pid');
		$sql = "DELETE FROM page WHERE pid ='{$pid}'";
		$is=$db -> query($sql);
		if($is){
			header("location:blog.php");
		}else{
			die('删除失败');
		}
	}
	
	//*分页
	//定义每页显示数量
	//获取系统定义的每页数量
	$pageNum='';//每页显示条数
	forEach($setting as $row){
		var_dump($row);
		if($row['key']=='pagenum'){
			$pageNum=$row['value'];
		}
	}
	//获取并处理当前页码
	$page= (int)$input -> get('page');//将结果转化为整型
	$page=$page<1?1:$page;
	//获取数据总量
	$sql="SELECT count(*) AS total FROM page";//计算数据库数据总量，设置别名为total
	$total=$db->query($sql)->fetch_array(MYSQLI_ASSOC)['total'];//执行sql语句，得到result对象,执行fetch_array方法得到数组,用键值获取想要的值
	//计算偏移量
	$offset= ($page-1)*$pageNum;
	$maxPage=ceil($total / $pageNum );//向上取整
	//执行sql
	$sql="SELECT * FROM page ORDER BY pid DESC limit {$offset},{$pageNum} ";//从$offset开始，往后显示$pageNum条
	$result=$db -> query($sql);
	$rows=array();
	while($row=$result -> fetch_array(MYSQLI_ASSOC)){
		$rows[]=$row;
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
			<h1>博客管理 <small><a href="blog_add.php?" class="btn btn-default pull-right">添加博客</a></small></h1>
			<hr />
			<div class="rows">
				<table class="table table-striped">
				  	<thead>
						<tr>
							<th>PID</th>
							<th>标题</th>
							<th>作者</th>
							<th>创建时间</th>
							<th>修改时间</th>
							<th>操作</th>
						</tr>
				  	</thead>
				  	<tbody>
				  		<?php forEach($rows as $row):?>
						<tr>
						  	<th scope="row"><?php echo $row['pid'];?></th>
						  	<th scope="row"><?php echo $row['title'];?></th>
						  	<th scope="row"><?php echo $row['author'];?></th>
						  	<td><?php echo date('Y-m-d,H-i-m',$row['intime']);?></td>
						  	<td><?php echo date('Y-m-d,H-i-m',$row['uptime']);?></td>
						  	<td>
						  		<a href="blog_add.php?pid=<?php echo $row['pid'];?>">编辑</a>
						  		<a href="blog.php?do=delete&pid=<?php echo $row['pid'];?>">删除</a> 
						  		<!--传入2个参数，删除和aid-->
						  	</td>
						</tr>
						<?php endforeach;?>
				  	</tbody>
				  	
				</table>
					<nav aria-label="Page navigation pull-right">
					  <ul class="pagination">
					   	<?php 
							$hrefTpl="<li><a href='blog.php?page=%d'>%s</a></li>";
							for($i=1;$i<=$maxPage;$i++){
								echo sprintf($hrefTpl,$i,$i);
							}
						?>
						<!--sprintf(format,arg1,arg2,arg++)
						参数 format 是转换的格式，以百分比符号 ("%") 开始到转换字符结束。下面的可能的 format 值：
						arg1, arg2, ++ 等参数将插入到主字符串中的百分号 (%) 符号处。该函数是逐步执行的。在第一个 % 符号中，插入 arg1，在第二个 % 符号处，插入 arg2，依此类推。
						%d 带符号十进制数
						%s 字符串
						-->
					  </ul>
					</nav>
					
			</div>
		</div>

	</body>
</html> 	