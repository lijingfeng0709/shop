<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>巴莱导购网</title><link rel="shortcut icon" href="../icon.png" >
<link href="css/goods.css" rel="stylesheet" type="text/css" />
</head>

<body style="margin:0px; padding:0px;">
    <?php
echo '<iframe src="top/index.php" name="ifrmname" width=100% height=225px frameborder="0" scrolling="no"    ></iframe>';
?>
<?php
set_time_limit(0);
	include "tbksdk/TopSdk.php";
	date_default_timezone_set('Asia/Shanghai'); 
	if(isset($_GET["page"])){
		$A=$_GET["page"];
		$B=$_GET["sap"];
		} 
			else{
				$A=1;
				$B=date('d');
				$C=date('h');
				$B=$B+$C;
				} 
				
$c = new TopClient;
$c->appkey = '23278234';
$c->secretKey = "56b7a5e146e8571fadbb060a5c9ea5c4";
$req = new TbkItemGetRequest;
$req->setFields("num_iid,title,pict_url,reserve_price,zk_final_price,item_url,volume");
$req->setQ("鞋 气质 女");
$req->setPageNo($A+$B);
$req->setPageSize(40);
$resp = $c->execute($req);
//print_r($resp);

//echo $n_tbk_item[2];
$dizhi=array();
$pic=array();
$title=array();
$volume1=array();
$volume=array();
$oriprice=array();
$finalprice=array();
$num_iid=array();
//echo "result:";
//print_r($resp->results->n_tbk_item[1]->item_url);
$req1 = new TbkItemsDetailGetRequest;
$req1->setFields("volume,num_iid");
for($i=0;$i<40;$i++){
	$dizhi[$i]=$resp->results->n_tbk_item[$i]->item_url;
	$pic[$i]=$resp->results->n_tbk_item[$i]->pict_url;
	$title[$i]=$resp->results->n_tbk_item[$i]->title;
	$oriprice[$i]=$resp->results->n_tbk_item[$i]->reserve_price;
	$finalprice[$i]=$resp->results->n_tbk_item[$i]->zk_final_price;
	$num_iid[$i]=$resp->results->n_tbk_item[$i]->num_iid;
	//$pre=strpos($arr[$i],"=");
	//$arr[$i]=substr($arr[$i],$pre+1);
	//echo $resp->results->n_tbk_item[$i]->item_url."  ".$resp->results->n_tbk_item[$i]->title;
	}
	for($i=0;$i<40;$i++){
					
		if($i==0){
			$num_iids=$num_iid[$i];
			}else{$num_iids=$num_iids.",".$num_iid[$i];}
		}
	$req1->setNumIids($num_iids);
	$resp1 = $c->execute($req1);
	//print_r($resp1);
	$temp=array();
	for($i=0;$i<40;$i++){
		$volume1[$i]=$resp1->tbk_items->tbk_item[$i]->volume;
		$temp[$i]=$resp1->tbk_items->tbk_item[$i]->num_iid;	
		}
	for($i=0;$i<40;$i++){
		$num1=(string)$num_iid[$i];
		for($j=0;$j<40;$j++){
			$num2=(string)$temp[$j];
			if($num1==$num2){
				$volume[$i]=$volume1[$j];
				break;
				}
			}
		}
//echo $text;
?>
<?php
/*echo '<table align="center">';
	for($i=0;$i<40;$i+=4){
		echo'<tr>
		<td><a data-type="0" biz-itemid="'.$arr[$i].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		<td><a data-type="0" biz-itemid="'.$arr[$i+1].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		<td><a data-type="0" biz-itemid="'.$arr[$i+2].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		<td><a data-type="0" biz-itemid="'.$arr[$i+3].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		</tr>';	
		}
		
	
		echo        '</table>';	*/
		
	echo'	<table align="center" cellspacing="10px">';
for($i=0;$i<40;$i+=4){
	echo '<tr>
<td><a href="'.$dizhi[$i+0].'" target="_blank"><img src="'.$pic[$i+0].'" alt="" name="" width="210" height="210" class="pic" /></a>
<p class="bt"><a href="'.$dizhi[$i+0].'" target="_blank">'.$title[$i+0].'</a></p>
<span class="jiage">¥'.$finalprice[$i+0].'</span><span class="jiage y">¥'.$oriprice[$i+0].'</span>
<p class="xiaoliang">销量：'.$volume[$i+0].'件</p></td>

<td><a href="'.$dizhi[$i+1].'" target="_blank"><img src="'.$pic[$i+1].'" alt="" name="" width="210" height="210" class="pic" /></a>
<p class="bt"><a href="'.$dizhi[$i+1].'" target="_blank">'.$title[$i+1].'</a></p>
<span class="jiage">¥'.$finalprice[$i+1].'</span><span class="jiage y">¥'.$oriprice[$i+1].'</span>
<p class="xiaoliang">销量：'.$volume[$i+1].'件</p></td>

<td><a href="'.$dizhi[$i+2].'" target="_blank"><img src="'.$pic[$i+2].'" alt="" name="" width="210" height="210" class="pic" /></a>
<p class="bt"><a href="'.$dizhi[$i+2].'" target="_blank">'.$title[$i+2].'</a></p>
<span class="jiage">¥'.$finalprice[$i+2].'</span><span class="jiage y">¥'.$oriprice[$i+2].'</span>
<p class="xiaoliang">销量：'.$volume[$i+2].'件</p></td>

<td><a href="'.$dizhi[$i+3].'" target="_blank"><img src="'.$pic[$i+3].'" alt="" name="" width="210" height="210" class="pic" /></a>
<p class="bt"><a href="'.$dizhi[$i+3].'" target="_blank">'.$title[$i+3].'</a></p>
<span class="jiage">¥'.$finalprice[$i+3].'</span><span class="jiage y">¥'.$oriprice[$i+3].'</span>
<p class="xiaoliang">销量：'.$volume[$i+3].'件</p></td>
</tr>';
	}
echo '


</table>	';
?>
 <?php
	echo '<div align="center" style="color:#f5f5f5;padding-bottom:50px;padding-top:10px; bgcolor:#FAFAFA">';
	for ($i=1;$i<=10;$i++) {  //循环显示出页面
	?>
    <?php
	if($A==$i){
		?>
	<?php 
	//echo '<span>';
	echo '<button style="width:30px;border:solid;border-width:thin;border-color:#999;background-color:transparent;width:40px;height:34px;background-color:#F33;color:#f5f5f5;cursor:default;"' 
	?>
	<?php
    echo '>';
	?>
    <?php
	echo $i ;
	echo '</button>';
	//echo '</span>';
	?>
        <?php
		}else{
			?>
            <a style="color:#000;font-size:15px;" href="index.php?page=<?php echo $i;?>&sap=<?php echo $B;?>" 
	<?php 
	echo '<span>';
	echo '<button style="width:30px;border:solid;border-width:thin;border-color:#999;background-color:transparent;width:40px;height:34px; color:#000"' 
	?>
	 onmouseover="this.style.background='#F33';this.style.color='#f5f5f5'" onmouseout="this.style.background='#FAFAFA';this.style.color='#000'"
	<?php
    echo '>';
	?>
    <?php
	echo $i ;
	echo '</button>';
	echo '</span>';
	?></a>
			<?php
			}
    ?>
	<?php
	}
	echo '</div>';
	?>
   <?php           
echo    '<script type="text/javascript">
    (function(win,doc){
        var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0];
        if (!win.alimamatk_show) {
            s.charset = "gbk";
            s.async = true;
            s.src = "http://a.alimama.cn/tkapi.js";
            h.insertBefore(s, h.firstChild);
        };
        var o = {
            pid: "mm_16381314_11942500_43636969",/*推广单元ID，用于区分不同的推广渠道*/
            appkey: "",/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
            unid: "",/*自定义统计字段*/
            type: "click" /* click 组件的入口标志 （使用click组件必设）*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
</script>
';
?>
        <?php
echo '
</body>
</html>';
        ?>
