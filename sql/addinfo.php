<?php 
//header('content-type:text/html;charset=charset=utf-8');
header("Content-Type:text/html;charset=utf-8"); 
$getorder=$_POST['order'];
$getcount=$_POST['count'];
//$link = new mysqli('127.0.0.1','root','','test'); 
if($getorder!=""&&$getorder!=null){
	if($getcount!=""&&$getcount!=null){
		$link=@mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
		mysql_select_db(app_115vip,$link);
		mysql_query("set names utf8");
		$sql = @mysql_query("insert into user values('$getorder','$getcount',now())");
		mysql_close($link);
		echo "<script>alert('添加成功,等待验证后通过')</script>";
		}else{
			echo '<script>alert("支付宝账户不能为空！")</script>';
			}
	
	}else{
			echo '<script>alert("订单号不能为空！")</script>';
			}

//$rs=$link->query('insert into time values('$getorder.','$getcount.',now())');
//$rs=$link->query('insert into time values('123123','123123132',now())');

?> 
