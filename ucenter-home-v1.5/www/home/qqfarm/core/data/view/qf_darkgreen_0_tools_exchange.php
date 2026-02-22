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
<br />
<p>
<p><FONT COLOR="#FF0000"><b>10 GP</b></FONT> có thể đổi lấy <FONT COLOR="#FF0000"><b>1 Vàng</b></FONT></p>
Tôi muốn đổi lấy <input type='text' id='yb' size='15' /> <b>Vàng</b>
<input type="button" onclick='request("tools.php?mod=exchange&do=save&type=yb&number="+$("#yb").value, "state1");' value='Quy đổi' />
<span id="state1"></span>
</p>
<br />
<p>
<p><FONT COLOR="#FF0000"><b>1 GP</b></FONT> có thể đổi lấy <FONT COLOR="#FF0000"><b>100 Xu</b></FONT></p>
Tôi muốn đổi lấy <input type='text' id='jb' size='15' /> <b>x100 Xu</b>
<input type="button" onclick='request("tools.php?mod=exchange&do=save&type=jb&number="+$("#jb").value, "state2");' value='Quy đổi' />
<span id="state2"></span>
</p>
<?php if($_QSC[redeem]==1) { ?>	
<br />
<p>
<p><FONT COLOR="#FF0000"><b>1 Vàng</b></FONT> có thể đổi lấy <FONT COLOR="#FF0000"><b>8 GP</b></FONT></p>
Tôi muốn đổi lấy <input type='text' id='enyb' size='15' /> <b>x8 GP</b>
<input type="button" onclick='request("tools.php?mod=exchange&do=save&type=enyb&number="+$("#enyb").value, "state3");' value='Quy đổi' />
<span id="state3"></span>
</p>
<br />
<p>
<p><FONT COLOR="#FF0000"><b>120 Xu</b></FONT> có thể đổi lấy <FONT COLOR="#FF0000"><b>1 GP</b></FONT> </p>
Tôi muốn đổi lấy <input type='text' id='enjb' size='15' /> <b>GP</b>
<input type="button" onclick='request("tools.php?mod=exchange&do=save&type=enjb&number="+$("#enjb").value, "state4");' value='Quy đổi' />
<span id="state4"></span>
</p>
<?php } ?>
</div>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
