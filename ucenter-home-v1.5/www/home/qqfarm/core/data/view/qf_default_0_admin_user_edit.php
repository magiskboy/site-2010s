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
<form id="myform" onsubmit="return submits();">
<table class="edit">
<tr>
<td width="80px">Tài khoản</td>
<td><?php echo $value[username]; ?></td>
</tr>
<tr>
<td width="80px">EXP Trồng trọt</td>
<td><input type="text" name="nc_exp" value="<?php echo $value[exp_nc]; ?>" />  <?php echo $value['level_nc']; ?> cấp</td>
</tr>
<tr>
<td width="80px">EXP Chăn nuôi</td>
<td><input type="text" name="mc_exp" value="<?php echo $value[exp_mc]; ?>" />  <?php echo $value['level_mc']; ?> cấp</td>
</tr>
<tr>
<td width="80px">Số thửa đất</td>
<td><input type="text" name="nc_reclaim" value="<?php echo $value[reclaim]; ?>" /></td>
</tr>
<tr>
<td width="80px">Số đất đỏ</td>
<td><input type="text" name="nc_redland" value="<?php echo $value[redland]; ?>" /></td>
</tr>
<tr>
<td width="80px">Xu</td>
<td><input type="text" name="money" value="<?php echo $value[money]; ?>" /></td>
</tr>
<tr>
<td width="80px">Vàng</td>
<td><input type="text" name="yb" value="<?php echo $value[yb]; ?>" /></td>
</tr>
<tr>
<td width="80px">Exp VIP</td>
<td><input type="text" name="vip" value="<?php echo $value[vip][exp]; ?>" /> Cấp độ: <?php echo $value[vip][level]; ?> (Cấp1=0,Cấp2=300,Cấp3=700,Cấp4=1200,Cấp5=1800,Cấp6=2500,Cấp7=3300</td>
</tr>
<tr>
<td width="80px">Loại VIP</td>
<td><input type="text" name="vipstatus" value="<?php echo $value[vip][status]; ?>" /> -1=>Hết hạn,0=>Chưa mở, 1=>Theo tháng, 2=>Theo năm</td>
</tr>
<tr>
<td width="80px">Thời hạn VIP</td>
<td><input type="text" name="vipvalid" value="<?php echo $value[vip][valid]; ?>" /> Định dạng: yyyy-mm-dd</td>
</tr>
</table>
<input type="submit" value="Xác nhận" /><span id="state"></span>
</form>
<script type="text/javascript">
function submits(inputId) {
request('admin.php?mod=user_edit&submit=1&id=<?php echo $id; ?>', 'state', $.getForm('#myform', 1));
return false;
}
</script>
<div>Thay đổi thông tin vật phẩm</div>
<?php if($package || $tools) { ?>
<table class="list">
<tr style=" font-size:12px; height:20px">
<th width="40">ID</th>
<th width="50">Loại</th>
<th width="100">Tên</th>
<th width="40">Cấp</th>
<th width="80">Số lượng</th>
<th width="80">Giá trị mới</th>
<th width="100"></th>
</tr>
<?php foreach($package as $key => $value) { ?>
<tr style=" font-size:12px; height:20px">
<td><?php echo $key; ?></td>
<td><font color="blue">Hạt giống</font></td>
<td><?php echo $cropstype[$key]['cName']; ?></td>
<td><?php echo $cropstype[$key]['cLevel']; ?></td>
<td><?php echo $value; ?></td>
<td><input type='text' id='number<?php echo $key; ?>' size='10' value="<?php echo $value; ?>"/></td>
<td>
<input type="button" onclick='request("admin.php?mod=user_edit&type=edititem&id=<?php echo $id; ?>&mclass=1&cid=<?php echo $key; ?>&number="+$("#number<?php echo $key; ?>").value, "state<?php echo $key; ?>");' value='Sửa' /><span id="state<?php echo $key; ?>"></span>
</td>
</tr>
<?php } ?>
<?php foreach($tools as $key => $value) { ?>
<tr style=" font-size:12px; height:20px">
<td><?php echo $key; ?></td>
<td><font color="ff00ff"><b>Props</b></font></td>
<td><?php echo $toolstype[30000+$key]['tName']; ?></td>
<td>0</td>
<td><?php echo $value; ?></td>
<td><input type='text' id='number<?php echo 30000+$key; ?>' size='10' value="<?php echo $value; ?>"/></td>
<td>
<input type="button" onclick='request("admin.php?mod=user_edit&type=edititem&id=<?php echo $id; ?>&mclass=2&cid=<?php echo $key; ?>&number="+$("#number<?php echo $key+30000; ?>").value, "state<?php echo $key+30000; ?>");' value='Sửa' /><span id="state<?php echo $key+30000; ?>"></span>
</td>
</tr>
<?php } ?>
<?php foreach($fruit as $key => $value) { ?>
<tr style=" font-size:12px; height:20px">
<td><?php echo $key; ?></td>
<td><font color="ff0000">Sản phẩm</font></td>
<td><?php echo $cropstype[$key]['cName']; ?></td>
<td><?php echo $cropstype[$key]['cLevel']; ?></td>
<td><?php echo $value; ?></td>
<td><input type='text' id='number<?php echo $key; ?>' size='10' value="<?php echo $value; ?>"/></td>
<td>
<input type="button" onclick='request("admin.php?mod=user_edit&type=edititem&id=<?php echo $id; ?>&mclass=3&cid=<?php echo $key; ?>&number="+$("#number<?php echo $key; ?>").value, "state<?php echo $key; ?>");' value='Sửa' /><span id="state<?php echo $key; ?>"></span>
</td>
</tr>
<?php } ?>
<?php foreach($fruit2 as $key => $value) { ?>
<?php if($key != 1506 ) { ?>
<tr style=" font-size:12px; height:20px">
<td><?php echo $key; ?></td>
<td><?php if($key > 10000 ) { ?><font color=black>Tất cả</font><?php } else { ?><font color=blue>Sản phẩm</font><?php } ?></td>
<td><?php if($key > 10000 ) { ?><?php echo $animaltype[$key-10000]['cName']; ?><?php } else { ?><?php echo $animaltype[$key]['bName']; ?><?php } ?></td>
<td><?php if($key > 10000 ) { ?><?php echo $animaltype[$key-10000]['cLevel']; ?><?php } else { ?><?php echo $animaltype[$key]['cLevel']; ?><?php } ?></td>
<td><?php echo $value; ?></td>
<td>
<input type='text' id='number<?php echo $key; ?>' size='10' value="<?php echo $value; ?>"/>
</td>
<td>
<input type="button" onclick='request("admin.php?mod=user_edit&type=edititem&id=<?php echo $id; ?>&mclass=4&cid=<?php echo $key; ?>&number="+$("#number<?php echo $key; ?>").value, "state<?php echo $key; ?>");' value='Sửa' /><span id="state<?php echo $key; ?>"></span> 
</td>
</tr>
<?php } ?>
<?php } ?>
</table>
<form id="myadd" onsubmit="return submits3();">
<ul class="edit">
<li>
Giving the user farms:
<select name='add_ncfrid'>
<option value="">---- Chọn ----</option>
<?php foreach($cropstype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['cName']; ?></option>
<?php } ?>
</select>
&nbsp;Số lượng<input type="text" name='add_ncfrnum' style="width:30px;" />
</li>
<li>
Tặng hạt giống
<select name='add_ncpaid'>
<option value="">---- Chọn ----</option>
<?php foreach($cropstype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['cName']; ?></option>
<?php } ?>
</select>
&nbsp;Số lượng<input type="text" name='add_ncpanum' style="width:30px;" />
</li>
<li>
Tặng nông sản
<select name='add_nctlid'>
<option value="">---- Chọn ----</option>
<?php foreach($toolstype as $key=>$value) { ?>
<?php if(!in_array($key,array(40001,40003))) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['tName']; ?></option>
<?php } ?>
<?php } ?>
</select>
&nbsp;Số lượng<input type="text" name='add_nctlnum' style="width:30px;" />
</li>
<li>Tặng sản phẩm chăn nuôi
<select name='add_mcfrid'>
<option value="">---- Chọn ----</option>
<?php foreach($animaltype as $key=>$value) { ?>
<option value="<?php echo $key+10000; ?>"><?php echo $value['cName']; ?></option>
<?php } ?>
</select>
&nbsp;Số lượng<input type="text" name='add_mcfrnum' style="width:30px;" />
</li> 
<li>Tặng con giống
<select name='add_mcbb'>
<option value="">---- Chọn ----</option>
<?php foreach($animaltype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['cName']; ?></option>
<?php } ?>
</select>
&nbsp;Số lượng<input type="text" name='add_mcbbnum' style="width:30px;" />
</li> 
<li>
Tặng bộ trang trí nông trại
<select name='add_nctlid2'>
<option value="">---- Chọn ----</option>
<?php foreach($nc_itemtype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['itemName']; ?></option>
<?php } ?>
</select>
</li>
<li>
Tặng bộ trang trí nông trang
<select name='add_mctlid'>
<option value="">---- Chọn ----</option>
<?php foreach($mc_itemtype as $key=>$value) { ?>
<option value="<?php echo $key; ?>"><?php echo $value['itemName']; ?></option>
<?php } ?>
</select>
</li>
<li>
<input type="submit" value="Xác nhận" /><span id="state3"></span>
</li>
</ul>
</form>
<script type="text/javascript">
function submits3(inputId) {
request('admin.php?mod=user_edit&type=additem&submit=1&id=<?php echo $id; ?>', 'state3', $.getForm('#myadd', 1));
return false;
}
</script>
<div id="pages" class="multiPage"></div>
<?php } else { ?>
<div class="no_hpinfo">Chưa có</div>
<?php } ?>
</div>
</div>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
