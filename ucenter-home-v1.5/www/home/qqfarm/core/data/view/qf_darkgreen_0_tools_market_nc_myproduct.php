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
<?php if($fruit) { ?>
<table class="list">
<tr>
<th width="40">ID</th>
<th width="100">Tên</th>
<th width="70">Hình dáng</th>
<th width="40">Cấp</th>
<th width="100">Giá gốc</th>
<th width="100">Số lượng</th>
<th width="100">Giá bán</th>
<th width="100"></th>
</tr>
<?php foreach($fruit as $key => $value) { ?>
<tr>
<td><?php echo $key; ?></td>
<td><?php echo $cropstype[$key]['cName']; ?></td>
<td><img src="module/ui/farm/icon/<?php echo $key; ?>.png" height="24px" /></td> 
<td><?php echo $cropstype[$key]['cLevel']; ?></td>
<td><font color="ff0000"><?php echo $cropstype[$key]['sale']; ?></font>Xu</td>
<td><input type='text' id='number<?php echo $key; ?>' size='10' value="<?php echo $value; ?>"/></td>
<td><input type='text' id='price<?php echo $key; ?>' size='15' value="<?php echo $cropstype[$key]['sale']; ?>"/></td>
<td>
<input type="button" onclick='request("tools.php?mod=market&act=nc&type=saleitem&mclass=3&cid=<?php echo $key; ?>&number="+$("#number<?php echo $key; ?>").value+"&price="+$("#price<?php echo $key; ?>").value, "state<?php echo $key; ?>");' value='Bán' /><span id="state<?php echo $key; ?>"></span>
</td>
</tr>
<?php } ?>
</table>
<div id="pages" class="multiPage"></div>
<?php } else { ?>
<div class="no_hpinfo">Chưa có</div>
<?php } ?>
</div>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
