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
<div id="main_nmc"><div id="flashMain"></div></div>
</div>
<!--Trigger Job-->
<img src="index.php?mod=cron" style="width:0;height:0;" />
</body>
</html>
<script type="text/javascript" src="script.php?qzfl_lite&appclientlib&c1"></script>
<script type="text/javascript">
var APP_ID = 358; //Current APPID
var NO_FLASH = 0; //If you do not show flash, set to 1
var HIGH_LIGHT = 1; //Highlight the current tag
C.config.setFullFlag(false); //Whether a large window to set the current
C.config.setTitle('Xứ sở thần tiên'); //Set Title
//Need to canvas the output
var FLASH_VARS = {
config_url_xy:"<?php echo $xml; ?>mc_main_<?php echo FARM_DAY; ?>.xml",
animalConfig_url_xy:"<?php echo $xml; ?>mc_data_<?php echo FARM_DAY; ?>.xml",
cardConfig_url_xy:"<?php echo $xml; ?>mc_card_<?php echo FARM_DAY; ?>.xml",
pasture_friend_list_mod_xy:"1000",
pasture_friend_list_xy:"1001-1002",
resolve_url:"",
snowslide:"3",
loadingUrl:"module/loading2_v_1.swf",
//mill:"appid=376",
//millLimitYDLevel:8,
pasture_enter:"1000",
pasture_enter_mod:"1000",
pasture_steal:"1000",
pasture_steal_mod:"1000",
pasture_steal_tips:"",
pasture_friend_list_tips:"",
pasture_enter_tips:"Xứ sở thần tiên tạm ngưng hoạt động để tiến hành nâng cấp & bảo trì!",
qixiPrepareTime:"2010-9-19 00:00:00",
qixiBeginTime:"2010-9-19 23:35:00",
qixiEndTime:"2010-9-26 00:05:00",
missionPrepareTime:"2010-9-8 02:00:00",
missionAutumnBeginTime:"2010-9-20 00:00:00",
missionNationalBeginTime:"2010-9-26 00:00:00",
missionEndTime:"2010-10-9 00:10:00",
filterUrl:"",
addon:"",
useflag:"11111111",
usercheck:"587440f4bc889bfaf96150160b95ac73"
};
FLASH_VARS.mode = SwfAppLib.platform.isQzone ? 1 : 2;
//@dante Part of the need to canvas cgi output
var FLASH_PARAMS = {
id:"swfAppObject",
width:"100%",
height:"560",
menu:"false",
scale:"noScale",
allowFullscreen:"true",
allowScriptAccess:"always",
bgcolor:"#FFFFFF",
wmode:"opaque",
src:"module/mcloader_v_0.swf"	
,flashvars: C.util.convertFlashVars(FLASH_VARS)
};
</script>