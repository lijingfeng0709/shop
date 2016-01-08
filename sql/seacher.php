<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../icon.jpg" >

<!--爱淘宝css样式-->

  <link rel="stylesheet" href="http://a.tbcdn.cn/??p/global/1.0/global-min.css,apps/e/brix/1.0/gallery/dropdown/dropdown-min.css,apps/e/brix/1.0/gallery/dialog/dialog-min.css,apps/e/brix/1.0/gallery/tooltip/tooltip-min.css,apps/e/brix/1.0/gallery/form/form-min.css" /> 
<body bgcolor="#FAFAFA">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="baidu_union_verify" content="c4f0bb534c9778475e7f5a56127f1b82">
<title>巴莱导购网</title>
<style type="text/css">
.shadow-inside{
     border: 1px solid #30261E;
    box-shadow: 2px 2px 5px #000 inset;
}
a:link {color: #FF0000} /* 未访问的链接 */
a:visited {color: #900} /* 已访问的链接 */
a:hover {color: #FF00FF} /* 鼠标移动到链接上 */
a:active {color: #0000FF} /* 选定的链接 */
</style>
<body bgcolor="#FAFAFA"><iframe src="../top/index.php" width=100% height=185px frameborder="0" scrolling="no" style=" top:0px; left:0;"   ></iframe>
<div align="center">
<!-- 文本框-->
 
<br>
<div align="center">
<p style="font-size:20px">查询结果：</p>
<br>
<?php 
//$getseacher=$_POST['order'];
$link=@mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(app_115vip,$link);
//$link = new mysqli('127.0.0.1','root','','test'); 
mysql_select_db('test',$link);
mysql_query("set names utf8");
	$perNumber=25; //每页显示的记录数
	if(isset($_GET["page"]))$page=$_GET["page"]; 
	else $page=1; 
	mysql_query('set names utf8');
	$count=mysql_query("select count(*) from test"); //获得记录总数
	$rs=mysql_fetch_array($count); 
	$totalNumber=$rs[0];
	$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
	$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录
	$result=mysql_query("select * from user order by nowtime desc limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数
//$sql = @mysql_query("select * from user where orderid='".$getseacher."' ORDER BY  `nowtime` DESC");
if(isset($_POST['order'])){
	$getseacher=$_POST['order'];
	$sql = @mysql_query("select * from test where clue='".$getseacher."' ORDER BY  `date` DESC limit $startCount,$perNumber");
	}
	else $sql = @mysql_query("select * from test where clue='115' ORDER BY  `date` DESC limit $startCount,$perNumber");

 echo '<table align="center" width="35%" border="1"><tr align="center"><td>名称</td><td>礼包码</td><td>加入时间</td></tr>';
 while($row=mysql_fetch_array($sql)){
	 echo '<tr align="center"><td>'.$row['name'].'</td>';
      echo '<td><a href="http://115.com/lb/'.$row['code'].'"';
	  ?>
	  <?php	  
	  echo 'target="_blank">'.$row['code'].'</a></td>';
	  ?>
      <?php
	  echo '<td>'.$row['date'].'</td></tr>';
	 }
	 echo '</table>';
	 if ($page != 1) { //页数不等于1
	?>
	<a href="seacher.php?page=<?php echo $page - 1;?>">上一页</a> <!--显示上一页-->
	<?php
	}
	for ($i=1;$i<=$totalPage&&$i<=25;$i++) {  //循环显示出页面
	?>
	<a href="seacher.php?page=<?php echo $i;?>"><?php echo $i ;?></a>
	<?php
	}
	if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
	?>
	<a href="seacher.php?page=<?php echo $page + 1;?>">下一页</a>
	<?php
	} 
	 mysql_free_result($sql);
	 mysql_close($link);	 
	?>
</div>
<br>
</body>
</html>

 

