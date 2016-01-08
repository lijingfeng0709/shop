<?php 
//$link = mysql_connect('127.0.0.1','root',''); 
$link = new mysqli('127.0.0.1','root','','test'); 
//mysql_select_db('test',$link);
//$sql = @mysql_query("select * from user");
//$rs=@mysql_fetch_array($sql);
$rs=$link->query('select * from user');
 echo '<table border="1"><tr><td>订单号</td><td>邮件</td><td>时间</td></tr>';
 
 while($row=$rs->fetch_assoc()){
	 echo '<tr><td>'.$row['orderid'].'</td>';
      echo '<td>'.$row['email'].'</td>';
	  echo '<td>'.$row['nowtime'].'</td></tr>';
	 }
?> 

<?php
  /* header('Content-type:text/html;charset=utf-8');
   $db = new mysqli('localhost','root','root','books');
   $rows = $db->query('SELECT * FROM customers');
   echo '<table border="1"><tr><td>姓名</td><td>年龄</td></tr>';
   while($row = $rows->fetch_assoc()){
      echo '<tr><td>'.$row['name'].'</td>';
      echo '<td>'.$row['address'].'</td></tr>';
   }*/
?>