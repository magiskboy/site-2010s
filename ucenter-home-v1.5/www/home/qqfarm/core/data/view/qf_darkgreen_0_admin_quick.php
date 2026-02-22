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
<div class="clearfix">
<div style="float:left;margin-right:15px;">
<table>
<tr><th colspan="2">Quản lý nhanh</th></tr>
<tr>
<td><span style="color:red">Xóa bộ nhớ Cache + Reset phông nền trang trí</span></td>
<td><input type="button" onclick='request("admin.php?mod=quick&go=cache_clean", "cache_clean_msg");' value="OK" /><span id="cache_clean_msg"></span></td>
</tr>
<tr>
<td>Xóa hết nhật ký ghi chép</td>
<td><input type="button" onclick='request("admin.php?mod=quick&go=exchange_clean", "exchange_clean_msg");' value="OK" /><span id="exchange_clean_msg"></span></td>
</tr>
<tr>
<td>Dọn sạch tất cả Phân + Muỗi</td>
<td><input type="button" onclick='request("admin.php?mod=quick&go=mc_clean", "mc_clean_msg");' value="OK"/><span id="mc_clean_msg"></span></td>
</tr>
<tr>
<td>Cập nhật lại dữ liệu</td>
<td><input type="button" onclick='request("admin.php?mod=quick&go=repertory_clean", "repertory_clean_msg");' value="OK" /><span id="repertory_clean_msg"></span></td>
</tr>
<tr>
<td>Sửa chữa các tham số</td>
<td><input type="button" onclick='request("admin.php?mod=quick&go=farmland", "farmland_msg");' value="OK" /><span id="farmland_msg"></span></td>
</tr>
<tr>
<td>Cập nhật chế độ bảo vệ VIP</td>
<td><input type="button" onclick='request("admin.php?mod=quick&go=healthmode", "healthmode_msg");' value="OK" /><span id="healthmode_msg"></span></td>
</tr>
<tr>
<td colspan="2">UID Người chơi:<input type="text" id="user_id" style="width:30px;"/> <input type="button" onclick='searchUser("user_id");' value="Truy vấn" /></td>
</tr>
<tr>
<td colspan="2">Tặng Vàng cho mọi người:<input type="text" id='add_yb' style="width:104px;"/> 
<input type="button" onclick='request("admin.php?mod=quick&go=add_yb&yb="+$("#add_yb").value, "add_money_msg");' value="OK" />
<span id="add_yb_msg"></span>
</td>
</tr>
<tr>
<td colspan="2">Tặng Xu cho mọi người:<input type="text" id='add_money' style="width:104px;"/> 
<input type="button" onclick='request("admin.php?mod=quick&go=add_money&money="+$("#add_money").value, "add_money_msg");' value="OK" />
<span id="add_money_msg"></span>
</td>
</tr>
<tr>
<td colspan="2">Tặng EXP cho mọi người:
Trồng trọt <input type="text" id='add_exp_nc' style="width:30px;"/> 
Chăn nuôi <input type="text" id='add_exp_mc' style="width:30px;"/>
<input type="button" onclick='request("admin.php?mod=quick&go=add_exp&nc="+$("#add_exp_nc").value+"&mc="+$("#add_exp_mc").value, "add_exp_msg");' value="OK" />
<span id="add_exp_msg"></span>
</td>
</tr>
</table>
</div>
<div>
<form id="sendgift_form" onsubmit="return sendgift_submit();">
<table>
<tr><th colspan="2">Tặng quà cho tất cả người chơi</th></tr>
<tr>
<td>Nông phẩm</td>
<td>
<select name='add_ncfrid'>
<option value="">---- Chọn ----</option>
<?php foreach($cropstype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['cName']; ?></option>
<?php } ?>
</select>Số lượng<input type="text" name='add_ncfrnum' style="width:50px;"/>
</td>
</tr>
<tr>
<td>Hạt giống</td>
<td>
<select name='add_ncpaid'>
<option value="">---- Chọn ----</option>
<?php foreach($cropstype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['cName']; ?></option>
<?php } ?>
</select>Số lượng<input type="text" name='add_ncpanum' style="width:50px;"/>
</td>
</tr>
<tr>
<td>Tặng nông cụ</td>
<td>
<select name='add_nctlid'>
<option value="">---- Chọn ----</option>
<?php foreach($toolstype as $key=>$value) { ?>
<?php if(!in_array($key,array(40001,40002,40003))) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['tName']; ?></option>
<?php } ?>
<?php } ?>
</select>Số lượng<input type="text" name='add_nctlnum' style="width:50px;"/>
</td>
</tr>
<tr>
<td>Item Trang trí nông trại</td>
<td>
<select name='add_nctlid2'>
<option value="">---- Chọn ----</option>
<?php foreach($nc_itemtype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['itemName']; ?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td>Con giống</td>
<td>
<select name='add_mcfrid'><option value="">---- Chọn ----</option>
<?php foreach($animaltype as $key=>$value) { ?>
<option value="<?php echo $key+10000; ?>"><?php echo $value['cName']; ?></option>
<?php } ?>
</select>Số lượng<input type="text" name='add_mcfrnum' style="width:50px;"/>
</td>
</tr>
<tr>
<td>Hộp thức ăn</td>
<td>
<select name='add_toolsid'><option value="">---- Chọn ----</option>
<option value="1">Loại vừa</option>
<option value="2">Loại lớn</option>
<option value="3">Cao cấp</option>
<option value="4">Loại nhỏ</option>
</select>Số lượng<input type="text" name='add_tools' style="width:50px;"/>
</td>
</tr>
<tr>
<td>Set Trang trí nông trang</td>
<td>
<select name='add_mctlid'>
<option value="">---- Chọn ----</option>
<?php foreach($mc_itemtype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['itemName']; ?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Xác nhận" /><span id="sendgift_state"></span></td>
</tr>
</table>
</form>
<script type="text/javascript">
function sendgift_submit() {
var sendgift_data = $.getForm('#sendgift_form', 1);
request('admin.php?mod=quick&go=sendgift', 'sendgift_state', sendgift_data);
return false;
}
</script>
</div>
</div>
<br /><br />
<div class="clearfix">
<table>
<tr><th colspan="2">Quản lý tin nhắn</th></tr>
<tr>
<td>Người gửi: </td>
<td><input type="text" id='sendmsg_name' style="width:90px;"/></td>
</tr>
<tr>
<td>Nội dung tin nhắn: </td>
<td><textarea id="sendmsg_text" style="width:300px;height:100px;"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="button" onclick='request("admin.php?mod=quick&go=sendmsg&name="+$("#sendmsg_name").value, "delmsg_state", "msg="+$("#sendmsg_text").value);' value="Gửi tin nhắn đến tất cả mọi người" /></td>
</tr>
<tr>
<td>Xóa hết tin nhắn của: </td>
<td><input type="text" id='delmsg_name' style="width:90px;"/> <input type="button" onclick='request("admin.php?mod=quick&go=delmsg&name="+$("#delmsg_name").value, "delmsg_state");' value="Xóa hết" /><span id="delmsg_state"></span></td>
</tr>
</table>
</div>
<script type="text/javascript">
function searchUser(inputId) {
var uid = parseInt($('#'+inputId).value);
if(uid > 0) {
var url = "admin.php?mod=user_edit&id=" + uid;
location.assign(url);
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
