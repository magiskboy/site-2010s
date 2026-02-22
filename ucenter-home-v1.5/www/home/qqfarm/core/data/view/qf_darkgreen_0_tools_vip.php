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
<div class="clearfix">
<div class="vip_info">
<p class="choose">Hội viên: <b> Cấp <?php echo $vipExt['level']; ?></b></p>
<p class="choose">Kinh nghiệm: <b> <?php echo $vip['exp']; ?></b></p>
<p class="choose">Mức tăng trưởng: <b> <?php echo $vipSpeed[$vip['status']]; ?></b> Exp/ngày</p>
<p class="choose">Loại thẻ: <b> <?php echo $vipExt['status']; ?></b></p>
<p class="choose">Thời hạn: <b> <?php echo $vipExt['valid']; ?></b></p>
</div>
<div class="vip_exp">
<p class="choose">Cấp độ</p>
<div class="vip_exp_signs">
<div class="item<?php echo $vip[status]; ?>" style="left:2px;" title="Exp: <?php echo $vipExps[1]; ?>"><span>1</span></div>
<div class="item<?php echo $vip[status]; ?>" style="left:<?php echo round($vipExps[2]/$vipExps[7]*90); ?>%;" title="Exp: <?php echo $vipExps[2]; ?>"><span>2</span></div>
<div class="item<?php echo $vip[status]; ?>" style="left:<?php echo round($vipExps[3]/$vipExps[7]*90); ?>%;" title="Exp: <?php echo $vipExps[3]; ?>"><span>3</span></div>
<div class="item<?php echo $vip[status]; ?>" style="left:<?php echo round($vipExps[4]/$vipExps[7]*90); ?>%;" title="Exp: <?php echo $vipExps[4]; ?>"><span>4</span></div>
<div class="item<?php echo $vip[status]; ?>" style="left:<?php echo round($vipExps[5]/$vipExps[7]*90); ?>%;" title="Exp: <?php echo $vipExps[5]; ?>"><span>5</span></div>
<div class="item<?php echo $vip[status]; ?>" style="left:<?php echo round($vipExps[6]/$vipExps[7]*90); ?>%;" title="Exp: <?php echo $vipExps[6]; ?>"><span>6</span></div>
<div class="item<?php echo $vip[status]; ?>" style="left:90%;" title="Exp: <?php echo $vipExps[7]; ?>"><span>7</span></div>
</div>
<div class="vip_exp_line clearfix">
<div class="l<?php echo $vip[status]; ?>"></div>
<div class="c<?php echo $vip[status]; ?> clearfix" title="EXP (Hiện tại/Thăng cấp): <?php echo $vip['exp']; ?>/<?php echo $vipExt['allExp']; ?>">
<div class="m<?php echo $vip[status]; ?>" style="width:<?php echo round($vip['exp']/$vipExps[7]*90); ?>%;"></div>
</div>
<div class="r<?php echo $vip[status]; ?>"></div>
</div>
<p class="choose">Hội viên theo tháng: <?php echo $vipSpeed[1]; ?> Exp/ngày</p>
<p class="choose">Hội viên theo năm: <?php echo $vipSpeed[2]; ?> Exp/ngày</p>
</div>
</div>
<form id="vip_pay" onsubmit="return submits();">
<dl class="clearfix">
<dt class="choose">Chọn loại thẻ hội viên:</dt>
<dd><input type="radio" name="payMonth" value="1" OnClick="ShowPayMsg(this);" />1 tháng</dd>
<dd><input type="radio" name="payMonth" value="3" OnClick="ShowPayMsg(this);" />3 tháng</dd>
<dd><input type="radio" name="payMonth" value="6" OnClick="ShowPayMsg(this);" />6 tháng</dd>
<dd><input type="radio" name="payMonth" value="12" OnClick="ShowPayMsg(this);" checked="true" />1 năm(<font color=red>Tiết kiệm nhất</font>)</dd><br /><br />
<dd id="paymsg"><b>Chi phí</b>: <font color=red><?php echo $vipCost[2]; ?></font> vàng, tiết kiệm được <font color=red><?php echo $vipCost[1]*12-$vipCost[2]; ?></font> vàng</dd>
</dl>
<div class='doPay'><input type="submit" value="Thanh toán" /> <span id="showmsg"></span></div>
</form>
</div>
<script type="text/javascript">
function ShowPayMsg(o) {
if(o.value == 12) {
$('#paymsg').innerHTML = "<b>Chi phí</b>: <font color=red><?php echo $vipCost[2]; ?></font> vàng, tiết kiệm được <font color=red><?php echo $vipCost[1]*12-$vipCost[2]; ?></font> vàng";
}
else {
$('#paymsg').innerHTML = "<b>Chi phí</b>: <font color=red>"+o.value*<?php echo $vipCost[1]; ?>+"</font> vàng";
}
}
function submits() {
request('tools.php?mod=vip', 'showmsg', $.getForm('#vip_pay', 1));
return false;
}
</script>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
