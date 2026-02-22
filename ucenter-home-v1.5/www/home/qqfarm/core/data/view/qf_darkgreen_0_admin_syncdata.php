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
<table class="list">
<tr>
<th colspan="2">Vui lòng điền số ID vật phẩm, hạt giống.. muốn cập nhật</th>
</tr>
<!-- <tr>
<td><a href="admin.php?mod=syncdata&sync=swf">点击同步module主要SWF文件</a></td>
<td>选择远程数据列表</td>
</tr> -->
<tr>
<td nowrap>
Nhập ID hạt giống mới 
<input id="nc_crop"> 
<input type="button" onClick="submits('nc_crop')" value="Xác nhận" />
</td>
<td>
<select id="ncsel" onChange="$('#nc_crop').value=$('#ncsel').options.value" >
<?php foreach($nID as $key=>$vn) { ?>
<option value="<?php echo $key; ?>"><?php echo $vn; ?></option>
<?php } ?>
</select>
<input type="button" onClick="submitss(1)" value="Chọn nhanh" />
</td>
</tr>
<tr>
<td>Nhập ID con giống mới 
<input id="mc_animal"> 
<input type="button" onClick="submits('mc_animal')" value="Xác nhận" />
</td>
<td>
<select id="mcsel" onChange="$('#mc_animal').value=$('#mcsel').options.value" >
<?php foreach($mID as $key=>$vm) { ?>
<option value="<?php echo $key; ?>"><?php echo $vm; ?></option>
<?php } ?>
</select>
<input type="button" onClick="submitss(2)" value="Chọn nhanh" />
</td>
<tr>
<td>ID Set trang trí nông trại <input id="nc_item"> <input type="button" onClick="submits('nc_item')" value="Xác nhận" /></td>
<td>4 Item trong mỗi bộ có cùng 1 nhóm ID</td>
</tr>
<tr>
<td>ID Set trang trí nông trang <input id="mc_item"> <input type="button" onClick="submits('mc_item')" value="Xác nhận" /></td>
<td>Mỗi bộ set trang trí có 1 số ID</td>
</tr>
<tr>
<td></td>
<td><span id="stat"></span></td>
</tr>
</table>
<script type="text/javascript">
function submitss(inputId){
request('admin.php?mod=syncdata&xmlid='+inputId, 'stat');
return false;
}
function submits(type) {
var sid = $('#'+type).value || 0;
if(sid) {
window.location='admin.php?mod=syncdata&sync='+type+'&sid='+sid;
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
