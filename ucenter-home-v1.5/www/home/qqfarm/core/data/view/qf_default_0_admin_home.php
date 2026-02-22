<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Nông trại vui vẻ</title>
<link type="text/css" rel="stylesheet" href="view/qf_default/images/style.css" />
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
<?php $active[$mod_name] = ' class="active"'; ?>
<a<?php echo $active[home]; ?> href="admin.php?mod=home">Tổng quan</a>
<a<?php echo $active[quick]; ?> href="admin.php?mod=quick">Quản lý nhanh</a>
<a<?php echo $active[system]; ?> href="admin.php?mod=system">Hệ thống</a>
<a<?php echo $active[notice]; ?> href="admin.php?mod=notice">Thông báo</a>
<a<?php echo $active[user_list]; ?> href="admin.php?mod=user_list">Thành viên</a>
<a<?php echo $active[cropstype_list]; ?> href="admin.php?mod=cropstype_list">Hạt giống</a>
<a<?php echo $active[itemtype_list]; ?> href="admin.php?mod=itemtype_list">Trang trí</a>
<a<?php echo $active[toolstype_list]; ?> href="admin.php?mod=toolstype_list">Item NC</a>
<a<?php echo $active[animaltype_list]; ?> href="admin.php?mod=animaltype_list">Vật nuôi</a>
<a<?php echo $active[toolstype_list]; ?> href="admin.php?mod=mctoolstype_list">Item MC</a>
<a<?php echo $active[syncdata]; ?> href="admin.php?mod=syncdata">Cập nhật</a>
</div>
<div id="main_admin">
<div>
<strong>Tổng quan</strong>
<ul>
<li>Trồng trọt : <b> <FONT COLOR="#FF0000"><?php echo $nccount; ?></FONT> </b> người chơi</li>
<li>Chăn nuôi : <b> <FONT COLOR="#FF0000"><?php echo $mccount; ?></FONT> </b> người chơi
<li>Truy cập trong tuần : <b> <FONT COLOR="#FF0000"><?php echo $tcount; ?></FONT></b> người</li>
<li>Truy cập trong tháng : <b> <FONT COLOR="#FF0000"><?php echo $rcount; ?></FONT></b> người</li>
<br />
<li>Cây trồng: <b> <FONT COLOR="#FF0000"><?php echo count($cropstype); ?></FONT></b> loại</li>
<li>Item trang trí nông trại: <b> <FONT COLOR="#FF0000"><?php echo count($nc_itemtype)/4; ?></FONT></b></li>
<li>Nông cụ trồng trọt: <b> <FONT COLOR="#FF0000"><?php echo count($nc_toolstype); ?></FONT></b></li>
<br />
<li>Vật nuôi : <b> <FONT COLOR="#FF0000"><?php echo count($animaltype); ?></FONT></b> loại</li>
<li>Set trang trí nông trang : <b> <FONT COLOR="#FF0000"><?php echo count($mc_itemtype); ?></FONT></b></li>
<li>Vật phẩm chăn nuôi:<b> <FONT COLOR="#FF0000"><?php echo count($mc_toolstype); ?></FONT></b></li>
<ul>
<div>
<br /><br />
<div>
<strong>Thông số máy chủ</strong>
<ul>
<?php foreach($farmTest as $key=>$value) { ?>
<?php is_bool($value[0]) && $value[0] =  $value[0] ? 'Hỗ trợ' : 'Không hỗ trợ'; ?>
<?php $value[1] =  $value[1] ? '<span>'.$value[1].'</span>' : ''; ?>
<li> <?php echo $key; ?> : <?php echo $value[0]; ?> <?php echo $value[1]; ?> </li>
<?php } ?>
<ul>
<div>
<script type="text/javascript">
var qf_stable_version, qf_development_version;
var JsURL = "http://www.phpye.com/version.js?v" + Math.random();
document.write(unescape("%3Cscript src='" + JsURL + "' type='text/javascript'%3E%3C/script%3E"));
function check_version() {
try {
var msg = '';
if(qf_stable_version) {
msg += 'Phiên bản mới nhất:' + qf_stable_version + '\r\n';
}
if(qf_development_version) {
msg += 'Phiên bản thử nghiệm:' + qf_development_version + '\r\n';
}
alert(msg || 'Không thể truy xuất kết quả');
} catch(e) {
alert('Lỗi không xác định');
}
}
</script>
</div>
</div>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
