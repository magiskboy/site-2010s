<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Nông trại vui vẻ</title>
<link type="text/css" rel="stylesheet" href="view/qf_darkgreen/images/style.css" />
<script type="text/javascript" src="script.php?squery&common"></script>
<script type="text/javascript">
function fullWindow() {
try { window.parent.dlBox1_Show(); }
catch(e) {}
}
doParent("<?php echo FARM_VERSION; ?>", "<?php echo $_QSC['view']['player']; ?>");
</script>
</head>
<body>
<div id="wrap">
<div id="tabs" class="clearfix">
<ul>
<?php $active[$tab_name] = ' class="active"'; ?>
<li<?php echo $active['nc']; ?>><a href="nmc.php?type=nc"><span>Trồng trọt</span></a></li>
<li<?php echo $active['mc']; ?>><a href="nmc.php?appid=358"><span>Chăn nuôi</span></a></li>
<li<?php echo $active['market']; ?><?php echo $active['market_nc']; ?>><a href="tools.php?mod=market&act=nc"><span>Giao dịch</span></a></li>
<li<?php echo $active['vip']; ?>><a href="tools.php?mod=vip"><span>Hội viên</span></a></li>
<li<?php echo $active['exchange']; ?>><a href="tools.php?mod=exchange"><span>Đổi tiền</span></a></li>
<li<?php echo $active['setting']; ?>><a href="tools.php?mod=setting"><span>Thiết lập</span></a></li>
<li<?php echo $active['top']; ?>><a href="tools.php?mod=top"><span>Xếp hạng</span></a></li>
<li<?php echo $active['help']; ?>><a href="tools.php?mod=help"><span>Hướng dẫn</span></a></li>
<?php if(in_array($_QFG['uid'], $_QSC['adminer'])) { ?>
<li<?php echo $active['admin']; ?>><a href="admin.php"><span>Quản lý</span></a></li>
<?php } ?>
<li><a onclick="return fullWindow();" href="#"><span>Phóng lớn</span></a></li>
</ul>
</div>
<div id="info" class="clearfix">
<div id="info1">
<a href="#" target="_blank" id='msg_viewer'>Nhớ chú ý giữ gìn sức khỏe đấy nhé!</a>
</div>
<script type="text/javascript">
$.DomReady(function() {
var _msgs = eval('<?php echo qf_jsonCode($_NOTICE[main]); ?>');
var _timer, _curIndex = 0, _viewer = $('#msg_viewer');
var playMsg = function() {
if(_msgs.length > 1) {
clearInterval(_timer);
_viewer.innerHTML = _msgs[_curIndex].text;
_viewer.target = '_blank';
_timer = setInterval(function() {
_viewer.innerHTML = _msgs[_curIndex].text;
_viewer.href = _msgs[_curIndex].href;
if(++_curIndex == _msgs.length) {
_curIndex = 0;
}
_viewer.target = '_blank';
}, 5000);
}
else {
_viewer.innerHTML = _msgs[0].text;
_viewer.href = _msgs[0].href;
_viewer.target = '_blank';
}
};
if(typeof(_viewer) != 'undefined' && _viewer) {
playMsg();
}
});
</script>
<div id="info2">
<?php $credit = qf_userCredit(0); ?>
<?php list($money, $yb) = qf_getMoney(0); ?>
Vàng: <b id="qfmoney"><?php echo $money; ?></b>&nbsp;&nbsp; Xu: <b id="qfyb"><?php echo $yb; ?></b>&nbsp;&nbsp;GPoint:<b id="qfcredit"><?php echo $credit; ?></b>&nbsp;
</div>
</div>
<div id="main">
<div class="menu">
<?php $active[$mod_name.'_'.$type] = ' class="active"'; ?>
<a<?php echo $active[market_nc_index]; ?> href="tools.php?mod=market&act=nc&type=index">[Giao dịch] Trồng trọt</a>
<a<?php echo $active[market_nc_myitem]; ?> href="tools.php?mod=market&act=nc&type=myitem">Nông cụ</a>
<a<?php echo $active[market_nc_myproduct]; ?> href="tools.php?mod=market&act=nc&type=myproduct">Nông sản</a>
<a<?php echo $active[market_mc_index]; ?> href="tools.php?mod=market&act=mc&type=index">[Giao dịch] Chăn nuôi</a>
<a<?php echo $active[market_mc_myproduct]; ?> href="tools.php?mod=market&act=mc&type=myproduct">Sản phẩm</a>
</div>
<table class="list">
<tr>
<th width="80">Mã số</th>
<th width="50">Loại</th>
<th width="80">Tên</th>
<th width="30">Hình dáng</th>
<th width="40">Cấp</th>
<th width="100">Đơn vị</th>
<th width="100">Giá bán</th>
<th width="70">Số lượng</th>
<th width="80">Người bán</th>
<th width="100">Đã bán</th>
<th width="100"></th>
<th width="100"><font color="#ff0000">So giá</font></th>
</tr>
<?php foreach($list as $key=>$value) { ?>
<tr>
<td><?php echo $value[id]; ?></td>
<td><?php if($value[cid] > 10000) { ?><font color="#0000ff">Tất cả</font><?php } else { ?><font color="#ff00ff"><b>Nông sản</b></font><?php } ?></td>
<td><?php if($value[cid] > 10000 ) { ?><?php echo $animaltype[$value[cid]-10000]['cName']; ?><?php } else { ?><?php echo $animaltype[$value[cid]]['bName']; ?><?php } ?></td>
<?php if($value[cid] > 10000) { ?>
<td><img src="module/mc/farm/icon/a<?php echo $value[cid]-10000; ?>.png" height="24px" /></td> 
<?php } else { ?>
<td><img src="module/mc/farm/icon/p<?php echo $value[cid]; ?>.png" height="24px" /></td>
<?php } ?>
<td><?php if($value[cid] > 10000 ) { ?><?php echo $animaltype[$value[cid]-10000]['cLevel']; ?><?php } else { ?><?php echo $animaltype[$value[cid]]['cLevel']; ?><?php } ?></td>
<td><?php if($value[cid] > 10000 ) { ?><?php echo $animaltype[$value[cid]-10000]['productprice']; ?> Xu<?php } else { ?><?php echo $animaltype[$value[cid]]['byproductprice']; ?> Xu<?php } ?></td>
<td><font color="#ff0000"><?php echo $value[cprice]; ?></font> Xu</td>
<td><font color="#ff00ff"><?php echo $value[cnumber]; ?></font></td>
<td><font color="#0000ff"><?php echo $value[username]; ?></font></td>
<td><input type='text' id='number<?php echo $value[id]; ?>' size='10' value="<?php echo $value[cnumber]; ?>"/></td>
<?php if($_QFG['uid'] == $value[selluid]) { ?>
<td><input type="button" onclick='request("tools.php?mod=market&act=mc&type=cancelitem&id=<?php echo $value[id]; ?>", "state<?php echo $value[id]; ?>");' value='Hủy bỏ' /><span id="state<?php echo $value[id]; ?>"></span></td>
<?php } else { ?>
<td><input type="button" onclick='request("tools.php?mod=market&act=mc&type=buyitem&id=<?php echo $value[id]; ?>&number="+$("#number<?php echo $value[id]; ?>").value, "state<?php echo $value[id]; ?>");' value='Mua' /><span id="state<?php echo $value[id]; ?>"></span></td>
<?php } ?>
<?php if($value[cid] > 10000 ) { ?>
<?php if($animaltype[$value[cid]-10000]['productprice']-$value[cprice]<>0) { ?>
<?php if($animaltype[$value[cid]-10000]['productprice']-$value[cprice]>0) { ?>
<td>Rẻ hơn <font color=#0000ff><?php echo $animaltype[$value[cid]-10000]['productprice']-$value[cprice]; ?></font> Xu</td> 
<?php } else { ?>
<td>Đắt hơn  <font color="#ff0000"><?php echo $value[cprice]-$animaltype[$value[cid]-10000]['productprice']; ?></font> Xu</td>
<?php } ?>
<?php } else { ?>
<td><font color="#ff00ff">Cùng giá</font></td> 
<?php } ?>
<?php } else { ?>
<?php if($animaltype[$value[cid]]['byproductprice']-$value[cprice]<>0) { ?>
<?php if($animaltype[$value[cid]]['byproductprice']-$value[cprice]>0) { ?>
<td>Rẻ hơn <font color="#0000ff"><?php echo $animaltype[$value[cid]]['byproductprice']-$value[cprice]; ?></font> Xu</td> 
<?php } else { ?>
<td>Đắt hơn  <font color="#ff0000"><?php echo $value[cprice]-$animaltype[$value[cid]]['byproductprice']; ?></font> Xu</td> 
<?php } ?>
<?php } else { ?>
<td><font color="#ff00ff">Cùng giá</font></td> 
<?php } ?>
<?php } ?>
</tr>
<?php } ?>
</table>
<div id="pages" class="multiPage"></div>
</div>
<script type="text/javascript">
$('#pages').innerHTML = multiPage({pid:"<?php echo $pid; ?>",purl:"<?php echo $purl; ?>",psize:"<?php echo $psize; ?>",count:"<?php echo $count; ?>"});
</script>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
