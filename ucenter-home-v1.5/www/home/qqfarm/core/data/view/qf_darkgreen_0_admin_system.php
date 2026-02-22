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
<table border='0' cellspacing='10'>
<form id="system_config" onsubmit="return submits();">
<tr>
<td width=20% align="right"><b>Nhân viên quản lý</b></td>
<td><input type="text" name="adminer" value="<?php echo implode($_QSC['adminer'], ','); ?>" style="width:300px;" /> [Định dạng: 1,2,3,4...]</td>
</tr>
<tr>
<td align="right"><b>Enable gzip</b></td><td><input type="radio" name="gzipcompress" value="1" <?php if($_QSC['gzipcompress']==1) { ?>checked="checked"<?php } ?>/>Bật<input type="radio" name="gzipcompress" value="0" <?php if($_QSC['gzipcompress']==0) { ?>checked="checked"<?php } ?>/>Tắt (Tạo XML)</td>
</tr>
<tr>
<td align="right"><b>Danh sách bạn bè</b></td><td><input type="radio" name="friendType" value="1" <?php if($_QSC['friendType']==1) { ?>checked="checked"<?php } ?>/>Chỉ bạn bè <input type="radio" name="friendType" value="2" <?php if($_QSC['friendType']==2) { ?>checked="checked"<?php } ?>/>Tất cả mọi người</td>
</tr>
<tr>
<td align="right"><b>Số bạn bè tối đa</b></td>
<td><input type="text" name="friendNumber" value="<?php echo $_QSC['friendNumber']; ?>" style="width:50px;" /> [Nên ít hơn 1000 người]</td>
</tr>
<tr>
<td align="right"><b>Loại tiền</b></td>
<td><input type="text" name="creditType" value="<?php echo $_QSC['creditType']; ?>" style="width:200px;" /> </td>
</tr>
<tr>
<td align="right"><b>Đổi tiền ngược</b></td><td><input type="radio" name="redeem" value="0" <?php if($_QSC['redeem']==0) { ?>checked="checked"<?php } ?>/>Đóng<input type="radio" name="redeem" value="1" <?php if($_QSC['redeem']==1) { ?>checked="checked"<?php } ?>/>Mở</td>
</tr>
<tr>
<td align="right"><b>Ăn trộm thức ăn VI</b></td><td><input type="radio" name="vip" value="0" <?php if($_QSC['vip']==0) { ?>checked="checked"<?php } ?>/>Đóng<input type="radio" name="vip" value="1" <?php if($_QSC['vip']==1) { ?>checked="checked"<?php } ?>/>Mở</td>
</tr>
<tr>
<td align="left"><b>Cấp độ tặng Set VIP</b></td>
<td><input type="text" name="diyLimitYDLevel" value="<?php echo $_QSC['diyLimitYDLevel']; ?>" style="width:50px;" /> VIP[1,2……7]</td>
</tr>
<tr>
<td align="left"><b>Avatar</b></td><td><input type="radio" name="avatarStatic" value="0" <?php if($_QSC['avatarStatic']==0) { ?>checked="checked"<?php } ?>/>Động<input type="radio" name="avatarStatic" value="1" <?php if($_QSC['avatarStatic']==1) { ?>checked="checked"<?php } ?>/>Tĩnh</td>
</tr>
<tr>
<td align="left"><b>Tổ chức sự kiện</b></td>
<td><input type="text" name="missionName" value="<?php echo $_QSC['missionName']; ?>" style="width:50px;" /> [Tham khảo QFarm/source/nc/mission/]</td>
</tr>
<tr>
<td align="right"><b>Giao diện</b></td>
<td>
<select name='view_tplId'>
<?php foreach($views as $v) { ?>
<option value="<?php echo $v; ?>"<?php if($v==$_QSC['view']['tplId']) { ?> selected<?php } ?>><?php echo $v; ?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td align="left"><b>Music Player</b></td>
<td><input type="radio" name="view_player" value="0" <?php if($_QSC['view']['player']==0) { ?>checked="checked"<?php } ?>/>Tắt <input type="radio" name="view_player" value="1" <?php if($_QSC['view']['player']==1) { ?>checked="checked"<?php } ?>/>Bật</td>
</tr>
<tr>
<td align="left"><b>Số xu ban đầu</b></td>
<td><input type="text" name="init_money" value="<?php echo $_INIT['money']; ?>" style="width:300px;" /></td>
</tr>
<tr>
<td align="left"><b>Số vàng ban đầu</b></td>
<td><input type="text" name="init_yb" value="<?php echo $_INIT['yb']; ?>" style="width:300px;" /></td>
</tr>
<tr>
<td align="left"><b>EXP Trồng trọt ban đầu</b></td>
<td><input type="text" name="init_nc_exp" value="<?php echo $_INIT['nc_exp']; ?>" style="width:300px;" /></td>
</tr>
<tr>
<td align="left"><b>EXP Chăn nuôi ban đầu</b></td>
<td><input type="text" name="init_mc_exp" value="<?php echo $_INIT['mc_exp']; ?>" style="width:300px;" /></td>
</tr>
<tr>
<td align="left"><b>Hạt giống ẩn</b><br>[Định dạng: 1,2,3,4...]</td>
<td><textarea name="hide_seed" style="width:500px;height:100px;"><?php echo implode($_HIDE['seed'], ','); ?></textarea> </td>
</tr>
<tr>
<td align="left"><b>Vật phẩm ẩn</b><br>[Định dạng: 1,2,3,4...]</td>
<td><textarea name="hide_item" style="width:500px;height:100px;"><?php echo implode($_HIDE['item'], ','); ?></textarea> </td>
</tr>
<tr>
<td align="left"><b>Con giống ẩn</b><br>[Định dạng: 1,2,3,4...]</td>
<td><textarea name="hide_animal" style="width:500px;height:100px;"><?php echo implode($_HIDE['animal'], ','); ?></textarea> </td>
</tr>
<tr>
<td align="left"><b>Item trang trí ẩn</b><br>[Định dạng: 1,2,3,4...]</td>
<td><textarea name="hide_mcitem" style="width:500px;height:100px;"><?php echo implode($_HIDE['mcitem'], ','); ?></textarea> </td>
</tr>
<tr>
<td align="left"><b>Tạm ngưng hoạt động</b></td>
<td><input type="radio" name="closefarm" value="0" <?php if($_QSC['closefarm']==0) { ?> checked="checked"<?php } ?> />Đóng <input type="radio" name="closefarm" value="1" <?php if($_QSC['closefarm']==1) { ?> checked="checked"<?php } ?>/>Mở</td>
</tr>
<tr>
<td align="left"><b>Thông báo tạm ngưng hoạt động</b></td>
<td><textarea name="closeinfo" style="width:500px;height:100px;"><?php echo $_QSC['closeinfo'] ; ?></textarea></td>
</tr>			
<tr>
<td colspan="2" align="center"><input type="submit" value="Xác nhận"><span id="state"></span></td>
</tr>
</form>
</table>
<script type="text/javascript">
function submits(inputId) {
param = $.getForm('#system_config', 1);
request('admin.php?mod=system&submit=1', 'state', param);
return false;
}
</script>
</div>
</div>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
