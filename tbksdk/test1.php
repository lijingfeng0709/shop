<?php
set_time_limit(0);
header("Content-Type: text/html; charset=utf-8");
echo '<iframe src="../top/index.php" name="ifrmname" width=100% height=225px frameborder="0" scrolling="no"    ></iframe>';
	include "TopSdk.php";
	date_default_timezone_set('Asia/Shanghai'); 
	if(isset($_GET["page"]))$A=$_GET["page"]; 
			else $A=1;
$c = new TopClient;
$c->appkey = '23197217';
$c->secretKey = "7868ef1b5807a78d309d4ea0661260b0";
$req = new TbkItemGetRequest;
$req->setFields("item_url,title");
$req->setQ("女装");
$req->setCat("16,18");
$req->setPageNo($A);
$req->setPageSize(40);
$resp = $c->execute($req);
print_r($resp);
$number=$resp->total_results;
echo $number;
//echo $n_tbk_item[2];
$arr=array();
//echo "result:";
//print_r($resp->results->n_tbk_item[1]->item_url);

for($i=0;$i<40;$i++){
	$arr[$i]=$resp->results->n_tbk_item[$i]->item_url;
	$pre=strpos($arr[$i],"=");
	$arr[$i]=substr($arr[$i],$pre+1);
	//echo $resp->results->n_tbk_item[$i]->item_url."  ".$resp->results->n_tbk_item[$i]->title;
	}
//echo $text;
?>
<?php
echo '<table align="center">';
	for($i=0;$i<40;$i+=4){
		echo'<tr>
		<td><a data-type="0" biz-itemid="'.$arr[$i].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		<td><a data-type="0" biz-itemid="'.$arr[$i+1].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		<td><a data-type="0" biz-itemid="'.$arr[$i+2].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		<td><a data-type="0" biz-itemid="'.$arr[$i+3].'" data-style="2" data-tmpl="230x312" target="_blank"></a></td>
		</tr>';	
		}
		echo        '</table>';		
?>
<?php
	if($number>400){
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
            <a style="color:#000;font-size:15px;" href="test1.php?page=<?php echo $i;?>" 
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
	}
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
            pid: "mm_16381314_8700286_38814372",/*推广单元ID，用于区分不同的推广渠道*/
            appkey: "23197217",/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
            unid: "",/*自定义统计字段*/
            type: "click" /* click 组件的入口标志 （使用click组件必设）*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
    </script>';
?>