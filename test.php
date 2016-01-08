<?php	
header("Content-type:text/html;charset=utf-8");
echo '<a data-type="0" biz-itemid="524584193616" data-style="2" data-tmpl="230x312" target="_blank">
淘点金_单品宝贝_直接展示230x312</a>	';	

include "tbksdk/TopSdk.php";
$c = new TopClient;
echo '123';
$c->appkey = "23197217";
$c->secretKey = "7868ef1b5807a78d309d4ea0661260b0";
$req = new TbkItemGetRequest;
$req->setFields("item_url");
$req->setQ("女装");
$req->setPageNo(1);
$req->setPageSize(40);

$resp = $c->execute($req);
print_r($resp);         
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
            appkey: "23278234",/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
            unid: "",/*自定义统计字段*/
            type: "click" /* click 组件的入口标志 （使用click组件必设）*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
</script>';
?>

