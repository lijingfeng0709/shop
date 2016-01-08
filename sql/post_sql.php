<?php 
header("Content-Type:text/html;charset=utf-8"); 
$link = mysql_connect('127.0.0.1','root',''); 
	mysql_select_db('test',$link);
	$name=$_POST['name'];
	$code=$_POST['code'];
	//$addsql="insert into postdate values('115','."$name".','."$code".',curdate())";
	//INSERT INTO `postdata`(`clue`, `name`, `code`, `date`) VALUES ([value-1],[value-2],[value-3],[value-4]);
	if($name!=""&&$name!=null){
	if($code!=""&&$code!=null){
		$link=@mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
		mysql_select_db(app_115vip,$link);
		mysql_query("set names utf8");
		$sql = @mysql_query("insert into postdata values('115','$name','$code',curdate())");
		mysql_close($link);
		echo "<script>alert('添加成功，等待验证后显示，谢谢您的分享')</script>";
		}else{
			echo '<script>alert("礼包码不能为空！")</script>';
			}
	
	}else{
			echo '<script>alert("礼包码名称不能为空！")</script>';
			}
	@mysql_close($link);
	?>