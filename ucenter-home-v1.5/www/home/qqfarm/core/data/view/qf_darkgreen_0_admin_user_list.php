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
<?php if($user_list) { ?>
<table class="list">
<tr style=" font-size:12px; height:20px">
<th>Tài khoản (UID)</th>
<th>Xu</th>
<th>Vàng</th>
<th>EXP VIP</th>
<th>Hội viên</th>
<th>Thửa đất</th>
<th>Đất đỏ</th>
<th>Trồng trọt</th>
<th>Chăn nuôi</th>
<th>Đăng nhập</th>
<th></th>
</tr>
<?php foreach($user_list as $key=>$value) { ?>
<tr style=" font-size:12px; height:20px">
<td><?php echo $value[username]; ?>(<?php echo $value[uid]; ?>)</td>
<td><?php echo $value[yb]; ?></td>
<td><?php echo $value[money]; ?></td>
<td><?php echo $value[vip][exp]; ?></td>
<td>Cấp <?php echo $value[vip][level]; ?></td>
<td><?php echo $value[reclaim]; ?></td>
<td><?php echo $value[redland]; ?></td>
<td>Cấp <?php echo $value[level_nc]; ?></td>
<td>Cấp <?php echo $value[level_mc]; ?></td>
<td><?php echo $value[visittime]; ?></td>
<td>
<a href="admin.php?mod=user_edit&id=<?php echo $value[uid]; ?>">Sửa</a>&nbsp;
<a href='javascript:delUser("<?php echo $value[uid]; ?>","Bạn có muốn xóa tài khoản <?php echo $value[username]; ?> không?");'>Xóa</a>
</td>
</tr>
<?php } ?>
</table>
<div id="pages" class="multiPage"></div>
<?php } else { ?>
<div class="no_hpinfo">Chưa có</div>
<?php } ?>
<script type="text/javascript">
$('#pages').innerHTML = multiPage({pid:"<?php echo $pid; ?>",purl:"<?php echo $purl; ?>",psize:"<?php echo $psize; ?>",count:"<?php echo $count; ?>"});
function delUser(uid, msg) {
if(confirm(msg)) {
request(
'admin.php?mod=user_delete&id='+uid, null, null, 
function(data){ alert(data[1]); }
);
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
