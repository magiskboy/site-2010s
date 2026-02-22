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
<strong>Bạn sẽ nói gì? (12 từ)</strong>
<ul>
<li>
<p>Khi người khác giúp bạn tưới cây</p>
<input id="water_b" type="text" value="<?php echo $Tips[water_b]; ?>" size="50"  maxlength="12" />
<input type="button" onclick="setUpdate('water_b');" value="Lưu lại" />
<input type="button" onclick="setUpdate('water_b',1);" value="Mặc định" />
<span id="state_water_b"></span>
</li>
<li>
<p>Khi người khác giúp bạn nhổ cỏ</p>
<input id="weed_b" type="text" value="<?php echo $Tips[weed_b]; ?>" size="50"  maxlength="12" />
<input type="button" onclick="setUpdate('weed_b');" value="Lưu lại" />
<input type="button" onclick="setUpdate('weed_b',1);" value="Mặc định" />
<span id="state_weed_b"></span>
</li>
<li>
<p>Khi người khác giúp bạn bắt sâu</p>
<input id="pest_b" type="text" value="<?php echo $Tips[pest_b]; ?>" size="50"  maxlength="12" />
<input type="button" onclick="setUpdate('pest_b');" value="Lưu lại" />
<input type="button" onclick="setUpdate('pest_b',1);" value="Mặc định" />
<span id="state_pest_b"></span>
</li>
<li>
<p>Nếu người khác trồng cỏ hại cây nhà bạn</p>
<input id="weed_a" type="text" value="<?php echo $Tips[weed_a]; ?>" size="50"  maxlength="12" />
<input type="button" onclick="setUpdate('weed_a');" value="Lưu lại" />
<input type="button" onclick="setUpdate('weed_a',1);" value="Mặc định" />
<span id="state_weed_a"></span>
</li>
<li>
<p>Nếu người khác thả sâu hại cây nhà bạn</p>
<input id="pest_a" type="text" value="<?php echo $Tips[pest_a]; ?>" size="50"  maxlength="12" />
<input type="button" onclick="setUpdate('pest_a');" value="Lưu lại" />
<input type="button" onclick="setUpdate('pest_a',1);" value="Mặc định" />
<span id="state_pest_a"></span>
</li>
</ul>
</div>
<script type="text/javascript">
function setUpdate(type, reset) {
value = reset ? '' : $("#"+type).value;
request(
'tools.php?mod=setting&do=save', 'state_'+type,
'type='+type+'&value='+value,
function(data) {
if(data[0] == '1' && data[3]) {
//alert(data);
$("#"+type).value = data[3];
}
}
);
}
</script>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
