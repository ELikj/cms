<?php if( !defined( 'ELikj')){
    exit( 'Error ELikj'); 
}
$GLOBALS['head'] = "html";
if(isset($_GET['security']) && $_GET['security'] != ""){
    tiaozhuan($ELiConfig['dir'].$ELiConfig['Plus'].$ELiConfig['fenge'].$THIS -> plugin);
    return ;
}
/*
幻灯片-textqunji--名字@网址@update$图片-增加
扩展
window.ATEST = ["第 1 个属性","第 2 个属性","第 3 个属性","第 4 个属性","第 5 个属性"];
window.UIMUI = {};
  required 必填项不能为空
  phone 请输入正确的手机号
  email 邮箱格式不正确
  url  只能填写数字
  number  只能填写数字
  date  日期格式不正确
  identity  请输入正确的身份证号
var  html ='<form name="form" id="form" class="layui-form">';
'标签名字($$)显示名字($$)显示的类型($$)css样式($$)提示信息($$)默认值($$)verify模块需要验证的类型'
var BIAO = Array(
  [
    'textqunji',  //标签名字
    'textqunji',  //显示名字
    'textqunji',  //显示的类型
    'width:100%;',//css样式
    '连接,描述,update-图片',//提示信息 或者变量
    'http://www.baidu.com$wocaoni$tupian,http://www.baidu.com$wocaoni$tupian',//默认值
    '',//verify模块需要验证的类型  tjcz 的时候 from 表单标示
  ],
  'zicianda3($$)菜单3($$)caidan($$)width:100%;($$)($$)我是你大哥,去你大爷的,呵呵哒',
  'qdtime($$)单个上传($$)update($$)($$)ATEST($$)/attachment/all/202003/12_16fc6733650eb60df22db5223f915d4.png',
  'updateshow($$)单个图片($$)updateshow($$)width:100%;($$)ATEST($$)',
  'moreupdateshow($$)多个图片($$)moreupdateshow($$)width:100%;($$)ATEST($$)/attachment/all/202003/12_16fc6733650eb60df22db5223f915d4.png',
  'moreupdate($$)多个文件($$)moreupdate($$)width:100%;($$)ATEST($$)/attachment/all/202003/12_16fc6733650eb60df22db5223f915d4.png',
  'name($$)普通输入($$)text($$)color:red;($$)用户昵称($$)ddd($$)required',
  'tuid($$)不能输入只读数据($$)textgbi($$)($$)',
  'qdtime($$)输入显示文字($$)textshow($$)($$)($$)卧槽',
  'tijiao($$)select显示($$)selectshow($$)($$)ATEST($$)4',
  'qdtime($$)select($$)select($$)($$)ATEST($$)3',
  'qdtime($$)多选($$)checkbox($$)($$)ATEST($$)3',
  'qdtime($$)解析时间($$)time($$)($$)ATEST($$)1584005060',
  'qdtime($$)单选($$)radio($$)($$)ATEST($$)2',
  'qdtime($$)是否选择($$)switch($$)($$)ON|OFF($$)0',
  'laydata($$)时间选择($$)date($$)($$)yyyy-MM-dd HH:mm:ss($$)2010-01-02 08:05:30',
  'name($$)textarea($$)textarea($$)color:red;($$)用户昵称($$)ddd($$)required',
  'name($$)隐藏($$)hidden($$)color:red;($$)用户昵称($$)ddd($$)required',
  'name3($$)ui($$)ui($$)color:red;height:400px;($$)ui($$)ddd($$)',
  'name($$)提交按钮($$)submit($$)($$)tijiao($$)提交($$)tijiao',
);
*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>以厘php管理后台</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
 <style>
  .layui-inline,img{display:inline-block;vertical-align:middle}h1,h2,h3,h4,h5,h6{font-weight:400}a,body{color:#333}.layui-edge,.layui-header,.layui-inline,.layui-main{position:relative}.layui-edge,hr{height:0;overflow:hidden}.layui-layout-body,.layui-side,.layui-side-scroll{overflow-x:hidden}.layui-edge,.layui-Kuop,hr{overflow:hidden}.layui-btn,.layui-edge,.layui-inline,img{vertical-align:middle}.layui-btn,.layui-disabled,.layui-icon,.layui-unselect{-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none}blockquote,body,button,dd,div,dl,dt,form,h1,h2,h3,h4,h5,h6,input,li,ol,p,pre,td,textarea,th,ul{margin:0;padding:0;-webkit-tap-highlight-color:rgba(0,0,0,0)}a:active,a:hover{outline:0}img{border:none}li{list-style:none}table{border-collapse:collapse;border-spacing:0}h4,h5,h6{font-size:100%}button,input,optgroup,option,select,textarea{font-family:inherit;font-size:inherit;font-style:inherit;font-weight:inherit;outline:0}pre{white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word}body{line-height:1.6;color:rgba(0,0,0,.85);font:14px Helvetica Neue,Helvetica,PingFang SC,Tahoma,Arial,sans-serif}hr{line-height:0;margin:10px 0;padding:0;border:none!important;border-bottom:1px solid #eee!important;clear:both;background:0 0}a{text-decoration:none}a:hover{color:#777}a cite{font-style:normal;*cursor:pointer}.layui-border-box,.layui-border-box *{box-sizing:border-box}.layui-box,.layui-box *{box-sizing:content-box}.layui-clear{clear:both;*zoom:1}.layui-clear:after{content:'\20';clear:both;*zoom:1;display:block;height:0}.layui-inline{*display:inline;*zoom:1}.layui-btn,.layui-btn-group,.layui-edge{display:inline-block}.layui-edge{width:0;border-width:6px;border-style:dashed;border-color:transparent}.layui-edge-top{top:-4px;border-bottom-color:#999;border-bottom-style:solid}.layui-edge-right{border-left-color:#999;border-left-style:solid}.layui-edge-bottom{top:2px;border-top-color:#999;border-top-style:solid}.layui-edge-left{border-right-color:#999;border-right-style:solid}.layui-Kuop{text-overflow:ellipsis;white-space:nowrap}.layui-disabled,.layui-disabled:hover{color:#d2d2d2!important;cursor:not-allowed!important}.layui-circle{border-radius:100%}.layui-show{display:block!important}.layui-hide{display:none!important}.layui-show-v{visibility:visible!important}.layui-hide-v{visibility:hidden!important}@font-face{font-family:layui-icon;src:url(<?php echo CDNHOST; ?>Tpl/layui/font/iconfont.eot?v=256);src:url(<?php echo CDNHOST; ?>Tpl/layui/font/iconfont.eot?v=256#iefix) format('embedded-opentype'),url(<?php echo CDNHOST; ?>Tpl/layui/font/iconfont.woff2?v=256) format('woff2'),url(<?php echo CDNHOST; ?>Tpl/layui/font/iconfont.woff?v=256) format('woff'),url(<?php echo CDNHOST; ?>Tpl/layui/font/iconfont.ttf?v=256) format('truetype'),url(<?php echo CDNHOST; ?>Tpl/layui/font/iconfont.svg?v=256#layui-icon) format('svg')}.layui-icon{font-family:layui-icon!important;font-size:16px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.layui-icon-reply-fill:before{content:"\e611"}.layui-icon-set-fill:before{content:"\e614"}.layui-icon-menu-fill:before{content:"\e60f"}.layui-icon-search:before{content:"\e615"}.layui-icon-share:before{content:"\e641"}.layui-icon-set-sm:before{content:"\e620"}.layui-icon-engine:before{content:"\e628"}.layui-icon-close:before{content:"\1006"}.layui-icon-close-fill:before{content:"\1007"}.layui-icon-chart-screen:before{content:"\e629"}.layui-icon-star:before{content:"\e600"}.layui-icon-circle-dot:before{content:"\e617"}.layui-icon-chat:before{content:"\e606"}.layui-icon-release:before{content:"\e609"}.layui-icon-list:before{content:"\e60a"}.layui-icon-chart:before{content:"\e62c"}.layui-icon-ok-circle:before{content:"\1005"}.layui-icon-layim-theme:before{content:"\e61b"}.layui-icon-table:before{content:"\e62d"}.layui-icon-right:before{content:"\e602"}.layui-icon-left:before{content:"\e603"}.layui-icon-cart-simple:before{content:"\e698"}.layui-icon-face-cry:before{content:"\e69c"}.layui-icon-face-smile:before{content:"\e6af"}.layui-icon-survey:before{content:"\e6b2"}.layui-icon-tree:before{content:"\e62e"}.layui-icon-ie:before{content:"\e7bb"}.layui-icon-upload-circle:before{content:"\e62f"}.layui-icon-add-circle:before{content:"\e61f"}.layui-icon-download-circle:before{content:"\e601"}.layui-icon-templeate-1:before{content:"\e630"}.layui-icon-util:before{content:"\e631"}.layui-icon-face-surprised:before{content:"\e664"}.layui-icon-edit:before{content:"\e642"}.layui-icon-speaker:before{content:"\e645"}.layui-icon-down:before{content:"\e61a"}.layui-icon-file:before{content:"\e621"}.layui-icon-layouts:before{content:"\e632"}.layui-icon-rate-half:before{content:"\e6c9"}.layui-icon-add-circle-fine:before{content:"\e608"}.layui-icon-prev-circle:before{content:"\e633"}.layui-icon-read:before{content:"\e705"}.layui-icon-404:before{content:"\e61c"}.layui-icon-carousel:before{content:"\e634"}.layui-icon-help:before{content:"\e607"}.layui-icon-code-circle:before{content:"\e635"}.layui-icon-windows:before{content:"\e67f"}.layui-icon-water:before{content:"\e636"}.layui-icon-username:before{content:"\e66f"}.layui-icon-find-fill:before{content:"\e670"}.layui-icon-about:before{content:"\e60b"}.layui-icon-location:before{content:"\e715"}.layui-icon-up:before{content:"\e619"}.layui-icon-pause:before{content:"\e651"}.layui-icon-date:before{content:"\e637"}.layui-icon-layim-uploadfile:before{content:"\e61d"}.layui-icon-delete:before{content:"\e640"}.layui-icon-play:before{content:"\e652"}.layui-icon-top:before{content:"\e604"}.layui-icon-firefox:before{content:"\e686"}.layui-icon-friends:before{content:"\e612"}.layui-icon-refresh-3:before{content:"\e9aa"}.layui-icon-ok:before{content:"\e605"}.layui-icon-layer:before{content:"\e638"}.layui-icon-face-smile-fine:before{content:"\e60c"}.layui-icon-dollar:before{content:"\e659"}.layui-icon-group:before{content:"\e613"}.layui-icon-layim-download:before{content:"\e61e"}.layui-icon-picture-fine:before{content:"\e60d"}.layui-icon-link:before{content:"\e64c"}.layui-icon-diamond:before{content:"\e735"}.layui-icon-log:before{content:"\e60e"}.layui-icon-key:before{content:"\e683"}.layui-icon-rate-solid:before{content:"\e67a"}.layui-icon-fonts-del:before{content:"\e64f"}.layui-icon-unlink:before{content:"\e64d"}.layui-icon-fonts-clear:before{content:"\e639"}.layui-icon-triangle-r:before{content:"\e623"}.layui-icon-circle:before{content:"\e63f"}.layui-icon-radio:before{content:"\e643"}.layui-icon-align-center:before{content:"\e647"}.layui-icon-align-right:before{content:"\e648"}.layui-icon-align-left:before{content:"\e649"}.layui-icon-loading-1:before{content:"\e63e"}.layui-icon-return:before{content:"\e65c"}.layui-icon-fonts-strong:before{content:"\e62b"}.layui-icon-upload:before{content:"\e67c"}.layui-icon-dialogue:before{content:"\e63a"}.layui-icon-video:before{content:"\e6ed"}.layui-icon-headset:before{content:"\e6fc"}.layui-icon-cellphone-fine:before{content:"\e63b"}.layui-icon-add-1:before{content:"\e654"}.layui-icon-face-smile-b:before{content:"\e650"}.layui-icon-fonts-html:before{content:"\e64b"}.layui-icon-screen-full:before{content:"\e622"}.layui-icon-form:before{content:"\e63c"}.layui-icon-cart:before{content:"\e657"}.layui-icon-camera-fill:before{content:"\e65d"}.layui-icon-tabs:before{content:"\e62a"}.layui-icon-heart-fill:before{content:"\e68f"}.layui-icon-fonts-code:before{content:"\e64e"}.layui-icon-ios:before{content:"\e680"}.layui-icon-at:before{content:"\e687"}.layui-icon-fire:before{content:"\e756"}.layui-icon-set:before{content:"\e716"}.layui-icon-fonts-u:before{content:"\e646"}.layui-icon-triangle-d:before{content:"\e625"}.layui-icon-tips:before{content:"\e702"}.layui-icon-picture:before{content:"\e64a"}.layui-icon-more-vertical:before{content:"\e671"}.layui-icon-bluetooth:before{content:"\e689"}.layui-icon-flag:before{content:"\e66c"}.layui-icon-loading:before{content:"\e63d"}.layui-icon-fonts-i:before{content:"\e644"}.layui-icon-refresh-1:before{content:"\e666"}.layui-icon-rmb:before{content:"\e65e"}.layui-icon-addition:before{content:"\e624"}.layui-icon-home:before{content:"\e68e"}.layui-icon-time:before{content:"\e68d"}.layui-icon-user:before{content:"\e770"}.layui-icon-notice:before{content:"\e667"}.layui-icon-chrome:before{content:"\e68a"}.layui-icon-edge:before{content:"\e68b"}.layui-icon-login-weibo:before{content:"\e675"}.layui-icon-voice:before{content:"\e688"}.layui-icon-upload-drag:before{content:"\e681"}.layui-icon-login-qq:before{content:"\e676"}.layui-icon-snowflake:before{content:"\e6b1"}.layui-icon-heart:before{content:"\e68c"}.layui-icon-logout:before{content:"\e682"}.layui-icon-file-b:before{content:"\e655"}.layui-icon-template:before{content:"\e663"}.layui-icon-transfer:before{content:"\e691"}.layui-icon-auz:before{content:"\e672"}.layui-icon-console:before{content:"\e665"}.layui-icon-app:before{content:"\e653"}.layui-icon-prev:before{content:"\e65a"}.layui-icon-website:before{content:"\e7ae"}.layui-icon-next:before{content:"\e65b"}.layui-icon-component:before{content:"\e857"}.layui-icon-android:before{content:"\e684"}.layui-icon-more:before{content:"\e65f"}.layui-icon-login-wechat:before{content:"\e677"}.layui-icon-shrink-right:before{content:"\e668"}.layui-icon-spread-left:before{content:"\e66b"}.layui-icon-camera:before{content:"\e660"}.layui-icon-note:before{content:"\e66e"}.layui-icon-refresh:before{content:"\e669"}.layui-icon-female:before{content:"\e661"}.layui-icon-male:before{content:"\e662"}.layui-icon-screen-restore:before{content:"\e758"}.layui-icon-password:before{content:"\e673"}.layui-icon-senior:before{content:"\e674"}.layui-icon-theme:before{content:"\e66a"}.layui-icon-tread:before{content:"\e6c5"}.layui-icon-praise:before{content:"\e6c6"}.layui-icon-star-fill:before{content:"\e658"}.layui-icon-rate:before{content:"\e67b"}.layui-icon-template-1:before{content:"\e656"}.layui-icon-vercode:before{content:"\e679"}.layui-icon-service:before{content:"\e626"}.layui-icon-cellphone:before{content:"\e678"}.layui-icon-print:before{content:"\e66d"}.layui-icon-cols:before{content:"\e610"}.layui-icon-wifi:before{content:"\e7e0"}.layui-icon-export:before{content:"\e67d"}.layui-icon-rss:before{content:"\e808"}.layui-icon-slider:before{content:"\e714"}.layui-icon-email:before{content:"\e618"}.layui-icon-subtraction:before{content:"\e67e"}.layui-icon-mike:before{content:"\e6dc"}.layui-icon-light:before{content:"\e748"}.layui-icon-gift:before{content:"\e627"}.layui-icon-mute:before{content:"\e685"}.layui-icon-reduce-circle:before{content:"\e616"}.layui-icon-music:before{content:"\e690"}.layui-main{width:1140px;margin:0 auto}.layui-header{z-index:1000;height:60px}.layui-header a:hover{transition:all .5s;-webkit-transition:all .5s}.layui-side{position:fixed;left:0;top:0;bottom:0;z-index:999;width:200px}.layui-side-scroll{position:relative;width:220px;height:100%}.layui-body{position:relative;left:200px;right:0;top:0;bottom:0;z-index:900;width:auto;box-sizing:border-box;    overflow-y: auto;}.layui-layout-admin .layui-header{position:fixed;top:0;left:0;right:0;background-color:#23262E}.layui-layout-admin .layui-side{top:60px;width:200px;overflow-x:hidden}.layui-layout-admin .layui-body{position:absolute;top:60px;padding-bottom:44px}.layui-layout-admin .layui-main{width:auto;margin:0 15px}.layui-layout-admin .layui-footer{position:fixed;left:200px;right:0;bottom:0;z-index:990;height:44px;line-height:44px;padding:0 15px;box-shadow:-1px 0 4px rgb(0 0 0 / 12%);background-color:#FAFAFA}.layui-layout-admin .layui-logo{position:absolute;left:0;top:0;width:200px;height:100%;line-height:60px;text-align:center;color:#009688;font-size:16px;box-shadow:0 1px 2px 0 rgb(0 0 0 / 15%)}.layui-layout-admin .layui-header .layui-nav{background:0 0}.layui-layout-left{position:absolute!important;left:200px;top:0}.layui-layout-right{position:absolute!important;right:0;top:0}.layui-container{position:relative;margin:0 auto;padding:0 15px;box-sizing:border-box}.layui-fluid{position:relative;margin:0 auto;padding:0 15px}.layui-row:after,.layui-row:before{content:"";display:block;clear:both}.layui-col-lg1,.layui-col-lg10,.layui-col-lg11,.layui-col-lg12,.layui-col-lg2,.layui-col-lg3,.layui-col-lg4,.layui-col-lg5,.layui-col-lg6,.layui-col-lg7,.layui-col-lg8,.layui-col-lg9,.layui-col-md1,.layui-col-md10,.layui-col-md11,.layui-col-md12,.layui-col-md2,.layui-col-md3,.layui-col-md4,.layui-col-md5,.layui-col-md6,.layui-col-md7,.layui-col-md8,.layui-col-md9,.layui-col-sm1,.layui-col-sm10,.layui-col-sm11,.layui-col-sm12,.layui-col-sm2,.layui-col-sm3,.layui-col-sm4,.layui-col-sm5,.layui-col-sm6,.layui-col-sm7,.layui-col-sm8,.layui-col-sm9,.layui-col-xs1,.layui-col-xs10,.layui-col-xs11,.layui-col-xs12,.layui-col-xs2,.layui-col-xs3,.layui-col-xs4,.layui-col-xs5,.layui-col-xs6,.layui-col-xs7,.layui-col-xs8,.layui-col-xs9{position:relative;display:block;box-sizing:border-box}.layui-col-xs1,.layui-col-xs10,.layui-col-xs11,.layui-col-xs12,.layui-col-xs2,.layui-col-xs3,.layui-col-xs4,.layui-col-xs5,.layui-col-xs6,.layui-col-xs7,.layui-col-xs8,.layui-col-xs9{float:left}.layui-col-xs1{width:8.33333333%}.layui-col-xs2{width:16.66666667%}.layui-col-xs3{width:25%}.layui-col-xs4{width:33.33333333%}.layui-col-xs5{width:41.66666667%}.layui-col-xs6{width:50%}.layui-col-xs7{width:58.33333333%}.layui-col-xs8{width:66.66666667%}.layui-col-xs9{width:75%}.layui-col-xs10{width:83.33333333%}.layui-col-xs11{width:91.66666667%}.layui-col-xs12{width:100%}.layui-col-xs-offset1{margin-left:8.33333333%}.layui-col-xs-offset2{margin-left:16.66666667%}.layui-col-xs-offset3{margin-left:25%}.layui-col-xs-offset4{margin-left:33.33333333%}.layui-col-xs-offset5{margin-left:41.66666667%}.layui-col-xs-offset6{margin-left:50%}.layui-col-xs-offset7{margin-left:58.33333333%}.layui-col-xs-offset8{margin-left:66.66666667%}.layui-col-xs-offset9{margin-left:75%}.layui-col-xs-offset10{margin-left:83.33333333%}.layui-col-xs-offset11{margin-left:91.66666667%}.layui-col-xs-offset12{margin-left:100%}@media screen and (max-width:768px){.layui-hide-xs{display:none!important}.layui-show-xs-block{display:block!important}.layui-show-xs-inline{display:inline!important}.layui-show-xs-inline-block{display:inline-block!important}}@media screen and (min-width:768px){.layui-container{width:750px}.layui-hide-sm{display:none!important}.layui-show-sm-block{display:block!important}.layui-show-sm-inline{display:inline!important}.layui-show-sm-inline-block{display:inline-block!important}.layui-col-sm1,.layui-col-sm10,.layui-col-sm11,.layui-col-sm12,.layui-col-sm2,.layui-col-sm3,.layui-col-sm4,.layui-col-sm5,.layui-col-sm6,.layui-col-sm7,.layui-col-sm8,.layui-col-sm9{float:left}.layui-col-sm1{width:8.33333333%}.layui-col-sm2{width:16.66666667%}.layui-col-sm3{width:25%}.layui-col-sm4{width:33.33333333%}.layui-col-sm5{width:41.66666667%}.layui-col-sm6{width:50%}.layui-col-sm7{width:58.33333333%}.layui-col-sm8{width:66.66666667%}.layui-col-sm9{width:75%}.layui-col-sm10{width:83.33333333%}.layui-col-sm11{width:91.66666667%}.layui-col-sm12{width:100%}.layui-col-sm-offset1{margin-left:8.33333333%}.layui-col-sm-offset2{margin-left:16.66666667%}.layui-col-sm-offset3{margin-left:25%}.layui-col-sm-offset4{margin-left:33.33333333%}.layui-col-sm-offset5{margin-left:41.66666667%}.layui-col-sm-offset6{margin-left:50%}.layui-col-sm-offset7{margin-left:58.33333333%}.layui-col-sm-offset8{margin-left:66.66666667%}.layui-col-sm-offset9{margin-left:75%}.layui-col-sm-offset10{margin-left:83.33333333%}.layui-col-sm-offset11{margin-left:91.66666667%}.layui-col-sm-offset12{margin-left:100%}}@media screen and (min-width:992px){.layui-container{width:970px}.layui-hide-md{display:none!important}.layui-show-md-block{display:block!important}.layui-show-md-inline{display:inline!important}.layui-show-md-inline-block{display:inline-block!important}.layui-col-md1,.layui-col-md10,.layui-col-md11,.layui-col-md12,.layui-col-md2,.layui-col-md3,.layui-col-md4,.layui-col-md5,.layui-col-md6,.layui-col-md7,.layui-col-md8,.layui-col-md9{float:left}.layui-col-md1{width:8.33333333%}.layui-col-md2{width:16.66666667%}.layui-col-md3{width:25%}.layui-col-md4{width:33.33333333%}.layui-col-md5{width:41.66666667%}.layui-col-md6{width:50%}.layui-col-md7{width:58.33333333%}.layui-col-md8{width:66.66666667%}.layui-col-md9{width:75%}.layui-col-md10{width:83.33333333%}.layui-col-md11{width:91.66666667%}.layui-col-md12{width:100%}.layui-col-md-offset1{margin-left:8.33333333%}.layui-col-md-offset2{margin-left:16.66666667%}.layui-col-md-offset3{margin-left:25%}.layui-col-md-offset4{margin-left:33.33333333%}.layui-col-md-offset5{margin-left:41.66666667%}.layui-col-md-offset6{margin-left:50%}.layui-col-md-offset7{margin-left:58.33333333%}.layui-col-md-offset8{margin-left:66.66666667%}.layui-col-md-offset9{margin-left:75%}.layui-col-md-offset10{margin-left:83.33333333%}.layui-col-md-offset11{margin-left:91.66666667%}.layui-col-md-offset12{margin-left:100%}}@media screen and (min-width:1200px){.layui-container{width:1170px}.layui-hide-lg{display:none!important}.layui-show-lg-block{display:block!important}.layui-show-lg-inline{display:inline!important}.layui-show-lg-inline-block{display:inline-block!important}.layui-col-lg1,.layui-col-lg10,.layui-col-lg11,.layui-col-lg12,.layui-col-lg2,.layui-col-lg3,.layui-col-lg4,.layui-col-lg5,.layui-col-lg6,.layui-col-lg7,.layui-col-lg8,.layui-col-lg9{float:left}.layui-col-lg1{width:8.33333333%}.layui-col-lg2{width:16.66666667%}.layui-col-lg3{width:25%}.layui-col-lg4{width:33.33333333%}.layui-col-lg5{width:41.66666667%}.layui-col-lg6{width:50%}.layui-col-lg7{width:58.33333333%}.layui-col-lg8{width:66.66666667%}.layui-col-lg9{width:75%}.layui-col-lg10{width:83.33333333%}.layui-col-lg11{width:91.66666667%}.layui-col-lg12{width:100%}.layui-col-lg-offset1{margin-left:8.33333333%}.layui-col-lg-offset2{margin-left:16.66666667%}.layui-col-lg-offset3{margin-left:25%}.layui-col-lg-offset4{margin-left:33.33333333%}.layui-col-lg-offset5{margin-left:41.66666667%}.layui-col-lg-offset6{margin-left:50%}.layui-col-lg-offset7{margin-left:58.33333333%}.layui-col-lg-offset8{margin-left:66.66666667%}.layui-col-lg-offset9{margin-left:75%}.layui-col-lg-offset10{margin-left:83.33333333%}.layui-col-lg-offset11{margin-left:91.66666667%}.layui-col-lg-offset12{margin-left:100%}}.layui-col-space1{margin:-.5px}.layui-col-space1>*{padding:.5px}.layui-col-space2{margin:-1px}.layui-col-space2>*{padding:1px}.layui-col-space4{margin:-2px}.layui-col-space4>*{padding:2px}.layui-col-space5{margin:-2.5px}.layui-col-space5>*{padding:2.5px}.layui-col-space6{margin:-3px}.layui-col-space6>*{padding:3px}.layui-col-space8{margin:-4px}.layui-col-space8>*{padding:4px}.layui-col-space10{margin:-5px}.layui-col-space10>*{padding:5px}.layui-col-space12{margin:-6px}.layui-col-space12>*{padding:6px}.layui-col-space14{margin:-7px}.layui-col-space14>*{padding:7px}.layui-col-space15{margin:-7.5px}.layui-col-space15>*{padding:7.5px}.layui-col-space16{margin:-8px}.layui-col-space16>*{padding:8px}.layui-col-space18{margin:-9px}.layui-col-space18>*{padding:9px}.layui-col-space20{margin:-10px}.layui-col-space20>*{padding:10px}.layui-col-space22{margin:-11px}.layui-col-space22>*{padding:11px}.layui-col-space24{margin:-12px}.layui-col-space24>*{padding:12px}.layui-col-space25{margin:-12.5px}.layui-col-space25>*{padding:12.5px}.layui-col-space26{margin:-13px}.layui-col-space26>*{padding:13px}.layui-col-space28{margin:-14px}.layui-col-space28>*{padding:14px}.layui-col-space30{margin:-15px}.layui-col-space30>*{padding:15px}.layui-btn,.layui-input,.layui-select,.layui-textarea,.layui-upload-button{outline:0;-webkit-appearance:none;transition:all .3s;-webkit-transition:all .3s;box-sizing:border-box}.layui-elem-quote{margin-bottom:10px;padding:15px;line-height:1.6;border-left:5px solid #5FB878;border-radius:0 2px 2px 0;background-color:#FAFAFA}.layui-quote-nm{border-style:solid;border-width:1px 1px 1px 5px;background:0 0}.layui-elem-field{margin-bottom:10px;padding:0;border-width:1px;border-style:solid}.layui-elem-field legend{margin-left:20px;padding:0 10px;font-size:20px;font-weight:300}.layui-field-title{margin:10px 0 20px;border-width:1px 0 0}.layui-field-box{padding:15px}.layui-field-title .layui-field-box{padding:10px 0}.layui-progress{position:relative;height:6px;border-radius:20px;background-color:#eee}.layui-progress-bar{position:absolute;left:0;top:0;width:0;max-width:100%;height:6px;border-radius:20px;text-align:right;background-color:#5FB878;transition:all .3s;-webkit-transition:all .3s}.layui-progress-big,.layui-progress-big .layui-progress-bar{height:18px;line-height:18px}.layui-progress-text{position:relative;top:-20px;line-height:18px;font-size:12px;color:#666}.layui-progress-big .layui-progress-text{position:static;padding:0 10px;color:#fff}.layui-collapse{border-width:1px;border-style:solid;border-radius:2px}.layui-colla-content,.layui-colla-item{border-top-width:1px;border-top-style:solid}.layui-colla-item:first-child{border-top:none}.layui-colla-title{position:relative;height:42px;line-height:42px;padding:0 15px 0 35px;color:#333;background-color:#FAFAFA;cursor:pointer;font-size:14px;overflow:hidden}.layui-colla-content{display:none;padding:10px 15px;line-height:1.6;color:#666}.layui-colla-icon{position:absolute;left:15px;top:0;font-size:14px}.layui-card-body,.layui-card-header,.layui-form-label,.layui-form-mid,.layui-form-select,.layui-input-block,.layui-input-inline,.layui-panel,.layui-textarea{position:relative}.layui-card{margin-bottom:15px;border-radius:2px;background-color:#fff;box-shadow:0 1px 2px 0 rgba(0,0,0,.05)}.layui-form-select dl,.layui-panel{box-shadow:1px 1px 4px rgb(0 0 0 / 8%)}.layui-card:last-child{margin-bottom:0}.layui-card-header{height:42px;line-height:42px;padding:0 15px;border-bottom:1px solid #f6f6f6;color:#333;border-radius:2px 2px 0 0;font-size:14px}.layui-card-body{padding:10px 15px;line-height:24px}.layui-card-body[pad15]{padding:15px}.layui-card-body[pad20]{padding:20px}.layui-card-body .layui-table{margin:5px 0}.layui-card .layui-tab{margin:0}.layui-panel{border-width:1px;border-style:solid;border-radius:2px;background-color:#fff;color:#666}.layui-bg-black,.layui-bg-blue,.layui-bg-cyan,.layui-bg-green,.layui-bg-orange,.layui-bg-red{color:#fff!important}.layui-panel-window{position:relative;padding:15px;border-radius:0;border-top:5px solid #eee;background-color:#fff}.layui-border,.layui-border-black,.layui-border-blue,.layui-border-cyan,.layui-border-green,.layui-border-orange,.layui-border-red{border-width:1px;border-style:solid}.layui-auxiliar-moving{position:fixed;left:0;right:0;top:0;bottom:0;width:100%;height:100%;background:0 0;z-index:9999999999}.layui-bg-red{background-color:#FF5722!important}.layui-bg-orange{background-color:#FFB800!important}.layui-bg-green{background-color:#009688!important}.layui-bg-cyan{background-color:#2F4056!important}.layui-bg-blue{background-color:#1E9FFF!important}.layui-bg-black{background-color:#393D49!important}.layui-bg-gray{background-color:#FAFAFA!important;color:#666!important}.layui-badge-rim,.layui-border,.layui-colla-content,.layui-colla-item,.layui-collapse,.layui-elem-field,.layui-form-pane .layui-form-item[pane],.layui-form-pane .layui-form-label,.layui-input,.layui-layedit,.layui-layedit-tool,.layui-panel,.layui-quote-nm,.layui-select,.layui-tab-bar,.layui-tab-card,.layui-tab-title,.layui-tab-title .layui-this:after,.layui-textarea{border-color:#eee}.layui-border{color:#666!important}.layui-border-red{border-color:#FF5722!important;color:#FF5722!important}.layui-border-orange{border-color:#FFB800!important;color:#FFB800!important}.layui-border-green{border-color:#009688!important;color:#009688!important}.layui-border-cyan{border-color:#2F4056!important;color:#2F4056!important}.layui-border-blue{border-color:#1E9FFF!important;color:#1E9FFF!important}.layui-border-black{border-color:#393D49!important;color:#393D49!important}.layui-timKuone-item:before{background-color:#eee}.layui-text{line-height:1.6;font-size:14px;color:#666}.layui-text h1,.layui-text h2,.layui-text h3{font-weight:500;color:#333}.layui-text h1{font-size:30px}.layui-text h2{font-size:24px}.layui-text h3{font-size:18px}.layui-text a:not(.layui-btn){color:#01AAED}.layui-text a:not(.layui-btn):hover{text-decoration:underline}.layui-text ul{padding:5px 0 5px 15px}.layui-text ul li{margin-top:5px;list-style-type:disc}.layui-text em,.layui-word-aux{color:#999!important;padding-left:5px!important;padding-right:5px!important}.layui-text p{margin:10px 0}.layui-text p:first-child{margin-top:0}.layui-font-12{font-size:12px!important}.layui-font-14{font-size:14px!important}.layui-font-16{font-size:16px!important}.layui-font-18{font-size:18px!important}.layui-font-20{font-size:20px!important}.layui-font-red{color:#FF5722!important}.layui-font-orange{color:#FFB800!important}.layui-font-green{color:#009688!important}.layui-font-cyan{color:#2F4056!important}.layui-font-blue{color:#01AAED!important}.layui-font-black{color:#000!important}.layui-font-gray{color:#c2c2c2!important}.layui-btn{height:38px;line-height:38px;border:1px solid transparent;padding:0 18px;background-color:#009688;color:#fff;white-space:nowrap;text-align:center;font-size:14px;border-radius:2px;cursor:pointer}.layui-btn:hover{opacity:.8;filter:alpha(opacity=80);color:#fff}.layui-btn:active{opacity:1;filter:alpha(opacity=100)}.layui-btn+.layui-btn{margin-left:10px}.layui-btn-container{font-size:0}.layui-btn-container .layui-btn{margin-right:10px;margin-bottom:10px}.layui-btn-container .layui-btn+.layui-btn{margin-left:0}.layui-table .layui-btn-container .layui-btn{margin-bottom:9px}.layui-btn-radius{border-radius:100px}.layui-btn .layui-icon{padding:0 2px;vertical-align:middle\9;vertical-align:bottom}.layui-btn-primary{border-color:#d2d2d2;background:0 0;color:#666}.layui-btn-primary:hover{border-color:#009688;color:#333}.layui-btn-normal{background-color:#1E9FFF}.layui-btn-warm{background-color:#FFB800}.layui-btn-danger{background-color:#FF5722}.layui-btn-checked{background-color:#5FB878}.layui-btn-disabled,.layui-btn-disabled:active,.layui-btn-disabled:hover{border-color:#eee!important;background-color:#FBFBFB!important;color:#d2d2d2!important;cursor:not-allowed!important;opacity:1}.layui-btn-lg{height:44px;line-height:44px;padding:0 25px;font-size:16px}.layui-btn-sm{height:30px;line-height:30px;padding:0 10px;font-size:12px}.layui-btn-xs{height:22px;line-height:22px;padding:0 5px;font-size:12px}.layui-btn-xs i{font-size:12px!important}.layui-btn-group{vertical-align:middle;font-size:0}.layui-btn-group .layui-btn{margin-left:0!important;margin-right:0!important;border-left:1px solid rgba(255,255,255,.5);border-radius:0}.layui-btn-group .layui-btn-primary{border-left:none}.layui-btn-group .layui-btn-primary:hover{border-color:#d2d2d2;color:#009688}.layui-btn-group .layui-btn:first-child{border-left:none;border-radius:2px 0 0 2px}.layui-btn-group .layui-btn-primary:first-child{border-left:1px solid #d2d2d2}.layui-btn-group .layui-btn:last-child{border-radius:0 2px 2px 0}.layui-btn-group .layui-btn+.layui-btn{margin-left:0}.layui-btn-group+.layui-btn-group{margin-left:10px}.layui-btn-fluid{width:100%}.layui-input,.layui-select,.layui-textarea{height:38px;line-height:1.3;line-height:38px\9;border-width:1px;border-style:solid;background-color:#fff;color:rgba(0,0,0,.85);border-radius:2px}.layui-input::-webkit-input-placeholder,.layui-select::-webkit-input-placeholder,.layui-textarea::-webkit-input-placeholder{line-height:1.3}.layui-input,.layui-textarea{display:block;width:100%;padding-left:10px}.layui-input:hover,.layui-textarea:hover{border-color:#eee!important}.layui-input:focus,.layui-textarea:focus{border-color:#d2d2d2!important}.layui-textarea{min-height:100px;height:auto;line-height:20px;padding:6px 10px;resize:vertical}.layui-select{padding:0 10px}.layui-form input[type=checkbox],.layui-form input[type=radio],.layui-form select{display:none}.layui-form [lay-ignore]{display:initial}.layui-form-item{margin-bottom:15px;clear:both;*zoom:1}.layui-form-item:after{content:'\20';clear:both;*zoom:1;display:block;height:0}.layui-form-label{float:left;display:block;padding:9px 15px;width:80px;font-weight:400;line-height:20px;text-align:right}.layui-form-label-col{display:block;float:none;padding:9px 0;line-height:20px;text-align:left}.layui-form-item .layui-inline{margin-bottom:5px;margin-right:10px}.layui-input-block{margin-left:110px;min-height:36px}.layui-input-inline{display:inline-block;vertical-align:middle}.layui-form-item .layui-input-inline{float:left;width:190px;margin-right:10px}.layui-form-text .layui-input-inline{width:auto}.layui-form-mid{float:left;display:block;padding:9px 0!important;line-height:20px;margin-right:10px}.layui-form-danger+.layui-form-select .layui-input,.layui-form-danger:focus{border-color:#FF5722!important}.layui-form-select .layui-input{padding-right:30px;cursor:pointer}.layui-form-select .layui-edge{position:absolute;right:10px;top:50%;margin-top:-3px;cursor:pointer;border-width:6px;border-top-color:#c2c2c2;border-top-style:solid;transition:all .3s;-webkit-transition:all .3s}.layui-form-select dl{display:none;position:absolute;left:0;top:42px;padding:5px 0;z-index:899;min-width:100%;border:1px solid #eee;max-height:300px;overflow-y:auto;background-color:#fff;border-radius:2px;box-sizing:border-box}.layui-form-select dl dd,.layui-form-select dl dt{padding:0 10px;line-height:36px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.layui-form-select dl dt{font-size:12px;color:#999}.layui-form-select dl dd{cursor:pointer}.layui-form-select dl dd:hover{background-color:#F6F6F6;-webkit-transition:.5s all;transition:.5s all}.layui-form-select .layui-select-group dd{padding-left:20px}.layui-form-select dl dd.layui-select-tips{padding-left:10px!important;color:#999}.layui-form-select dl dd.layui-this{background-color:#5FB878;color:#fff}.layui-form-checkbox,.layui-form-select dl dd.layui-disabled{background-color:#fff}.layui-form-selected dl{display:block}.layui-form-checkbox,.layui-form-checkbox *,.layui-form-switch{display:inline-block;vertical-align:middle}.layui-form-selected .layui-edge{margin-top:-9px;-webkit-transform:rotate(180deg);transform:rotate(180deg);margin-top:-3px\9}:root .layui-form-selected .layui-edge{margin-top:-9px\0/IE9}.layui-form-selectup dl{top:auto;bottom:42px}.layui-select-none{margin:5px 0;text-align:center;color:#999}.layui-select-disabled .layui-disabled{border-color:#eee!important}.layui-select-disabled .layui-edge{border-top-color:#d2d2d2}.layui-form-checkbox{position:relative;height:30px;line-height:30px;margin-right:10px;padding-right:30px;cursor:pointer;font-size:0;-webkit-transition:.1s linear;transition:.1s linear;box-sizing:border-box}.layui-form-checkbox span{padding:0 10px;height:100%;font-size:14px;border-radius:2px 0 0 2px;background-color:#d2d2d2;color:#fff;overflow:hidden;white-space:nowrap;text-overflow:ellipsis}.layui-form-checkbox:hover span{background-color:#c2c2c2}.layui-form-checkbox i{position:absolute;right:0;top:0;width:30px;height:28px;border:1px solid #d2d2d2;border-left:none;border-radius:0 2px 2px 0;color:#fff;font-size:20px;text-align:center}.layui-form-checkbox:hover i{border-color:#c2c2c2;color:#c2c2c2}.layui-form-checked,.layui-form-checked:hover{border-color:#5FB878}.layui-form-checked span,.layui-form-checked:hover span{background-color:#5FB878}.layui-form-checked i,.layui-form-checked:hover i{color:#5FB878}.layui-form-item .layui-form-checkbox{margin-top:4px}.layui-form-checkbox[lay-skin=primary]{height:auto!important;line-height:normal!important;min-width:18px;min-height:18px;border:none!important;margin-right:0;padding-left:28px;padding-right:0;background:0 0}.layui-form-checkbox[lay-skin=primary] span{padding-left:0;padding-right:15px;line-height:18px;background:0 0;color:#666}.layui-form-checkbox[lay-skin=primary] i{right:auto;left:0;width:16px;height:16px;line-height:16px;border:1px solid #d2d2d2;font-size:12px;border-radius:2px;background-color:#fff;-webkit-transition:.1s linear;transition:.1s linear}.layui-form-checkbox[lay-skin=primary]:hover i{border-color:#5FB878;color:#fff}.layui-form-checked[lay-skin=primary] i{border-color:#5FB878!important;background-color:#5FB878;color:#fff}.layui-checkbox-disabled[lay-skin=primary] span{background:0 0!important;color:#c2c2c2!important}.layui-checkbox-disabled[lay-skin=primary]:hover i{border-color:#d2d2d2}.layui-form-item .layui-form-checkbox[lay-skin=primary]{margin-top:10px}.layui-form-switch{position:relative;height:22px;line-height:22px;min-width:35px;padding:0 5px;margin-top:8px;border:1px solid #d2d2d2;border-radius:20px;cursor:pointer;background-color:#fff;-webkit-transition:.1s linear;transition:.1s linear}.layui-form-switch i{position:absolute;left:5px;top:3px;width:16px;height:16px;border-radius:20px;background-color:#d2d2d2;-webkit-transition:.1s linear;transition:.1s linear}.layui-form-switch em{position:relative;top:0;width:25px;margin-left:21px;padding:0!important;text-align:center!important;color:#999!important;font-style:normal!important;font-size:12px}.layui-form-onswitch{border-color:#5FB878;background-color:#5FB878}.layui-checkbox-disabled,.layui-checkbox-disabled i{border-color:#eee!important}.layui-form-onswitch i{left:100%;margin-left:-21px;background-color:#fff}.layui-form-onswitch em{margin-left:5px;margin-right:21px;color:#fff!important}.layui-checkbox-disabled span{background-color:#eee!important}.layui-checkbox-disabled em{color:#d2d2d2!important}.layui-checkbox-disabled:hover i{color:#fff!important}[lay-radio]{display:none}.layui-form-radio,.layui-form-radio *{display:inline-block;vertical-align:middle}.layui-form-radio{line-height:28px;margin:6px 10px 0 0;padding-right:10px;cursor:pointer;font-size:0}.layui-form-radio *{font-size:14px}.layui-form-radio>i{margin-right:8px;font-size:22px;color:#c2c2c2}.layui-form-radio:hover *,.layui-form-radioed,.layui-form-radioed>i{color:#5FB878}.layui-radio-disabled>i{color:#eee!important}.layui-radio-disabled *{color:#c2c2c2!important}.layui-form-pane .layui-form-label{width:110px;padding:8px 15px;height:38px;line-height:20px;border-width:1px;border-style:solid;border-radius:2px 0 0 2px;text-align:center;background-color:#FAFAFA;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;box-sizing:border-box}.layui-form-pane .layui-input-inline{margin-left:-1px}.layui-form-pane .layui-input-block{margin-left:110px;left:-1px}.layui-form-pane .layui-input{border-radius:0 2px 2px 0}.layui-form-pane .layui-form-text .layui-form-label{float:none;width:100%;border-radius:2px;box-sizing:border-box;text-align:left}.layui-form-pane .layui-form-text .layui-input-inline{display:block;margin:0;top:-1px;clear:both}.layui-form-pane .layui-form-text .layui-input-block{margin:0;left:0;top:-1px}.layui-form-pane .layui-form-text .layui-textarea{min-height:100px;border-radius:0 0 2px 2px}.layui-form-pane .layui-form-checkbox{margin:4px 0 4px 10px}.layui-form-pane .layui-form-radio,.layui-form-pane .layui-form-switch{margin-top:6px;margin-left:10px}.layui-form-pane .layui-form-item[pane]{position:relative;border-width:1px;border-style:solid}.layui-form-pane .layui-form-item[pane] .layui-form-label{position:absolute;left:0;top:0;height:100%;border-width:0 1px 0 0}.layui-form-pane .layui-form-item[pane] .layui-input-inline{margin-left:110px}@media screen and (max-width:450px){.layui-form-item .layui-form-label{text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.layui-form-item .layui-inline{display:block;margin-right:0;margin-bottom:20px;clear:both}.layui-form-item .layui-inline:after{content:'\20';clear:both;display:block;height:0}.layui-form-item .layui-input-inline{display:block;float:none;left:-3px;width:auto!important;margin:0 0 10px 112px}.layui-form-item .layui-input-inline+.layui-form-mid{margin-left:110px;top:-5px;padding:0}.layui-form-item .layui-form-checkbox{margin-right:5px;margin-bottom:5px}}.layui-layedit{border-width:1px;border-style:solid;border-radius:2px}.layui-layedit-tool{padding:3px 5px;border-bottom-width:1px;border-bottom-style:solid;font-size:0}.layedit-tool-fixed{position:fixed;top:0;border-top:1px solid #eee}.layui-layedit-tool .layedit-tool-mid,.layui-layedit-tool .layui-icon{display:inline-block;vertical-align:middle;text-align:center;font-size:14px}.layui-layedit-tool .layui-icon{position:relative;width:32px;height:30px;line-height:30px;margin:3px 5px;color:#777;cursor:pointer;border-radius:2px}.layui-layedit-tool .layui-icon:hover{color:#393D49}.layui-layedit-tool .layui-icon:active{color:#000}.layui-layedit-tool .layedit-tool-active{background-color:#eee;color:#000}.layui-layedit-tool .layui-disabled,.layui-layedit-tool .layui-disabled:hover{color:#d2d2d2;cursor:not-allowed}.layui-layedit-tool .layedit-tool-mid{width:1px;height:18px;margin:0 10px;background-color:#d2d2d2}.layedit-tool-html{width:50px!important;font-size:30px!important}.layedit-tool-b,.layedit-tool-code,.layedit-tool-help{font-size:16px!important}.layedit-tool-d,.layedit-tool-face,.layedit-tool-image,.layedit-tool-unlink{font-size:18px!important}.layedit-tool-image input{position:absolute;font-size:0;left:0;top:0;width:100%;height:100%;opacity:.01;filter:Alpha(opacity=1);cursor:pointer}.layui-layedit-iframe iframe{display:block;width:100%}#LAY_layedit_code{overflow:hidden}.layui-laypage{display:inline-block;*display:inline;*zoom:1;vertical-align:middle;margin:10px 0;font-size:0}.layui-laypage>a:first-child,.layui-laypage>a:first-child em{border-radius:2px 0 0 2px}.layui-laypage>a:last-child,.layui-laypage>a:last-child em{border-radius:0 2px 2px 0}.layui-laypage>:first-child{margin-left:0!important}.layui-laypage>:last-child{margin-right:0!important}.layui-laypage a,.layui-laypage button,.layui-laypage input,.layui-laypage select,.layui-laypage span{border:1px solid #eee}.layui-laypage a,.layui-laypage span{display:inline-block;*display:inline;*zoom:1;vertical-align:middle;padding:0 15px;height:28px;line-height:28px;margin:0 -1px 5px 0;background-color:#fff;color:#333;font-size:12px}.layui-flow-more a *,.layui-laypage input,.layui-table-view select[lay-ignore]{display:inline-block}.layui-laypage a:hover{color:#009688}.layui-laypage em{font-style:normal}.layui-laypage .layui-laypage-spr{color:#999;font-weight:700}.layui-laypage a{text-decoration:none}.layui-laypage .layui-laypage-curr{position:relative}.layui-laypage .layui-laypage-curr em{position:relative;color:#fff}.layui-laypage .layui-laypage-curr .layui-laypage-em{position:absolute;left:-1px;top:-1px;padding:1px;width:100%;height:100%;background-color:#009688}.layui-laypage-em{border-radius:2px}.layui-laypage-next em,.layui-laypage-prev em{font-family:Sim sun;font-size:16px}.layui-laypage .layui-laypage-count,.layui-laypage .layui-laypage-limits,.layui-laypage .layui-laypage-refresh,.layui-laypage .layui-laypage-skip{margin-left:10px;margin-right:10px;padding:0;border:none}.layui-laypage .layui-laypage-limits,.layui-laypage .layui-laypage-refresh{vertical-align:top}.layui-laypage .layui-laypage-refresh i{font-size:18px;cursor:pointer}.layui-laypage select{height:22px;padding:3px;border-radius:2px;cursor:pointer}.layui-laypage .layui-laypage-skip{height:30px;line-height:30px;color:#999}.layui-laypage button,.layui-laypage input{height:30px;line-height:30px;border-radius:2px;vertical-align:top;background-color:#fff;box-sizing:border-box}.layui-laypage input{width:40px;margin:0 10px;padding:0 3px;text-align:center}.layui-laypage input:focus,.layui-laypage select:focus{border-color:#009688!important}.layui-laypage button{margin-left:10px;padding:0 10px;cursor:pointer}.layui-table,.layui-table-view{margin:10px 0}.layui-flow-more{margin:10px 0;text-align:center;color:#999;font-size:14px}.layui-flow-more a{height:32px;line-height:32px}.layui-flow-more a *{vertical-align:top}.layui-flow-more a cite{padding:0 20px;border-radius:3px;background-color:#eee;color:#333;font-style:normal}.layui-flow-more a cite:hover{opacity:.8}.layui-flow-more a i{font-size:30px;color:#737383}.layui-table{width:100%;background-color:#fff;color:#666}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table th{text-align:left;font-weight:400}.layui-table tbody tr:hover,.layui-table thead tr,.layui-table-click,.layui-table-header,.layui-table-hover,.layui-table-mend,.layui-table-patch,.layui-table-tool,.layui-table-total,.layui-table-total tr,.layui-table[lay-even] tr:nth-child(even){background-color:#FAFAFA}.layui-table td,.layui-table th,.layui-table-col-set,.layui-table-fixed-r,.layui-table-grid-down,.layui-table-header,.layui-table-page,.layui-table-tips-main,.layui-table-tool,.layui-table-total,.layui-table-view,.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border-width:1px;border-style:solid;border-color:#eee}.layui-table td,.layui-table th{position:relative;padding:9px 15px;min-height:20px;line-height:20px;font-size:14px}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border-width:0 0 1px}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border-width:0 1px 0 0}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}.layui-table img{max-width:100px}.layui-table[lay-size=lg] td,.layui-table[lay-size=lg] th{padding:15px 30px}.layui-table-view .layui-table[lay-size=lg] .layui-table-cell{height:40px;line-height:40px}.layui-table[lay-size=sm] td,.layui-table[lay-size=sm] th{font-size:12px;padding:5px 10px}.layui-table-view .layui-table[lay-size=sm] .layui-table-cell{height:20px;line-height:20px}.layui-table[lay-data]{display:none}.layui-table-box{position:relative;overflow:hidden}.layui-table-view .layui-table{position:relative;width:auto;margin:0}.layui-table-view .layui-table[lay-skin=line]{border-width:0 1px 0 0}.layui-table-view .layui-table[lay-skin=row]{border-width:0 0 1px}.layui-table-view .layui-table td,.layui-table-view .layui-table th{padding:5px 0;border-top:none;border-left:none}.layui-table-view .layui-table th.layui-unselect .layui-table-cell span{cursor:pointer}.layui-table-view .layui-table td{cursor:default}.layui-table-view .layui-table td[data-edit=text]{cursor:text}.layui-table-view .layui-form-checkbox[lay-skin=primary] i{width:18px;height:18px}.layui-table-view .layui-form-radio{line-height:0;padding:0}.layui-table-view .layui-form-radio>i{margin:0;font-size:20px}.layui-table-init{position:absolute;left:0;top:0;width:100%;height:100%;text-align:center;z-index:110}.layui-table-init .layui-icon{position:absolute;left:50%;top:50%;margin:-15px 0 0 -15px;font-size:30px;color:#c2c2c2}.layui-table-header{border-width:0 0 1px;overflow:hidden}.layui-table-header .layui-table{margin-bottom:-1px}.layui-table-tool .layui-inline[lay-event]{position:relative;width:26px;height:26px;padding:5px;line-height:16px;margin-right:10px;text-align:center;color:#333;border:1px solid #ccc;cursor:pointer;-webkit-transition:.5s all;transition:.5s all}.layui-table-tool .layui-inline[lay-event]:hover{border:1px solid #999}.layui-table-tool-temp{padding-right:120px}.layui-table-tool-self{position:absolute;right:17px;top:10px}.layui-table-tool .layui-table-tool-self .layui-inline[lay-event]{margin:0 0 0 10px}.layui-table-tool-panel{position:absolute;top:29px;left:-1px;padding:5px 0;min-width:150px;min-height:40px;border:1px solid #d2d2d2;text-align:left;overflow-y:auto;background-color:#fff;box-shadow:0 2px 4px rgba(0,0,0,.12)}.layui-table-cell,.layui-table-tool-panel li{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.layui-table-tool-panel li{padding:0 10px;line-height:30px;-webkit-transition:.5s all;transition:.5s all}.layui-menu li,.layui-menu-body-title a:hover,.layui-menu-body-title>.layui-icon:hover{transition:all .3s}.layui-table-tool-panel li .layui-form-checkbox[lay-skin=primary]{width:100%;padding-left:28px}.layui-table-tool-panel li:hover{background-color:#F6F6F6}.layui-table-tool-panel li .layui-form-checkbox[lay-skin=primary] i{position:absolute;left:0;top:0}.layui-table-tool-panel li .layui-form-checkbox[lay-skin=primary] span{padding:0}.layui-table-tool .layui-table-tool-self .layui-table-tool-panel{left:auto;right:-1px}.layui-table-col-set{position:absolute;right:0;top:0;width:20px;height:100%;border-width:0 0 0 1px;background-color:#fff}.layui-table-sort{width:10px;height:20px;margin-left:5px;cursor:pointer!important}.layui-table-sort .layui-edge{position:absolute;left:5px;border-width:5px}.layui-table-sort .layui-table-sort-asc{top:3px;border-top:none;border-bottom-style:solid;border-bottom-color:#b2b2b2}.layui-table-sort .layui-table-sort-asc:hover{border-bottom-color:#666}.layui-table-sort .layui-table-sort-desc{bottom:5px;border-bottom:none;border-top-style:solid;border-top-color:#b2b2b2}.layui-table-sort .layui-table-sort-desc:hover{border-top-color:#666}.layui-table-sort[lay-sort=asc] .layui-table-sort-asc{border-bottom-color:#000}.layui-table-sort[lay-sort=desc] .layui-table-sort-desc{border-top-color:#000}.layui-table-cell{height:28px;line-height:28px;padding:0 15px;position:relative;box-sizing:border-box}.layui-table-cell .layui-form-checkbox[lay-skin=primary]{top:-1px;padding:0}.layui-table-cell .layui-table-link{color:#01AAED}.laytable-cell-checkbox,.laytable-cell-numbers,.laytable-cell-radio,.laytable-cell-space{padding:0;text-align:center}.layui-table-body{position:relative;overflow:auto;margin-right:-1px;margin-bottom:-1px}.layui-table-body .layui-none{line-height:26px;padding:30px 15px;text-align:center;color:#999}.layui-table-fixed{position:absolute;left:0;top:0;z-index:101}.layui-table-fixed .layui-table-body{overflow:hidden}.layui-table-fixed-l{box-shadow:1px 0 8px rgba(0,0,0,.08)}.layui-table-fixed-r{left:auto;right:-1px;border-width:0 0 0 1px;box-shadow:-1px 0 8px rgba(0,0,0,.08)}.layui-table-fixed-r .layui-table-header{position:relative;overflow:visible}.layui-table-mend{position:absolute;right:-49px;top:0;height:100%;width:50px}.layui-table-tool{position:relative;z-index:890;width:100%;min-height:50px;line-height:30px;padding:10px 15px;border-width:0 0 1px}.layui-table-tool .layui-btn-container{margin-bottom:-10px}.layui-table-page,.layui-table-total{border-width:1px 0 0;margin-bottom:-1px;overflow:hidden}.layui-table-page{position:relative;width:100%;padding:7px 7px 0;height:41px;font-size:12px;white-space:nowrap}.layui-table-page>div{height:26px}.layui-table-page .layui-laypage{margin:0}.layui-table-page .layui-laypage a,.layui-table-page .layui-laypage span{height:26px;line-height:26px;margin-bottom:10px;border:none;background:0 0}.layui-table-page .layui-laypage a,.layui-table-page .layui-laypage span.layui-laypage-curr{padding:0 12px}.layui-table-page .layui-laypage span{margin-left:0;padding:0}.layui-table-page .layui-laypage .layui-laypage-prev{margin-left:-7px!important}.layui-table-page .layui-laypage .layui-laypage-curr .layui-laypage-em{left:0;top:0;padding:0}.layui-table-page .layui-laypage button,.layui-table-page .layui-laypage input{height:26px;line-height:26px}.layui-table-page .layui-laypage input{width:40px}.layui-table-page .layui-laypage button{padding:0 10px}.layui-table-page select{height:18px}.layui-table-patch .layui-table-cell{padding:0;width:30px}.layui-table-edit{position:absolute;left:0;top:0;width:100%;height:100%;padding:0 14px 1px;border-radius:0;box-shadow:1px 1px 20px rgba(0,0,0,.15)}.layui-table-edit:focus{border-color:#5FB878!important}select.layui-table-edit{padding:0 0 0 10px;border-color:#d2d2d2}.layui-table-view .layui-form-checkbox,.layui-table-view .layui-form-radio,.layui-table-view .layui-form-switch{top:0;margin:0;box-sizing:content-box}.layui-colorpicker-alpha-slider,.layui-colorpicker-side-slider,.layui-menu,.layui-menu *,.layui-nav{box-sizing:border-box}.layui-table-view .layui-form-checkbox{top:-1px;height:26px;line-height:26px}.layui-table-view .layui-form-checkbox i{height:26px}.layui-table-grid .layui-table-cell{overflow:visible}.layui-table-grid-down{position:absolute;top:0;right:0;width:26px;height:100%;padding:5px 0;border-width:0 0 0 1px;text-align:center;background-color:#fff;color:#999;cursor:pointer}.layui-table-grid-down .layui-icon{position:absolute;top:50%;left:50%;margin:-8px 0 0 -8px}.layui-table-grid-down:hover{background-color:#fbfbfb}body .layui-table-tips .layui-layer-content{background:0 0;padding:0;box-shadow:0 1px 6px rgba(0,0,0,.12)}.layui-table-tips-main{margin:-44px 0 0 -1px;max-height:150px;padding:8px 15px;font-size:14px;overflow-y:scroll;background-color:#fff;color:#666}.layui-table-tips-c{position:absolute;right:-3px;top:-13px;width:20px;height:20px;padding:3px;cursor:pointer;background-color:#666;border-radius:50%;color:#fff}.layui-table-tips-c:hover{background-color:#777}.layui-table-tips-c:before{position:relative;right:-2px}.layui-upload-file{display:none!important;opacity:.01;filter:Alpha(opacity=1)}.layui-upload-drag,.layui-upload-form,.layui-upload-wrap{display:inline-block}.layui-upload-list{margin:10px 0}.layui-upload-choose{max-width:200px;padding:0 10px;color:#999;font-size:14px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.layui-upload-drag{position:relative;padding:30px;border:1px dashed #e2e2e2;background-color:#fff;text-align:center;cursor:pointer;color:#999}.layui-upload-drag .layui-icon{font-size:50px;color:#009688}.layui-upload-drag[lay-over]{border-color:#009688}.layui-upload-iframe{position:absolute;width:0;height:0;border:0;visibility:hidden}.layui-upload-wrap{position:relative;vertical-align:middle}.layui-upload-wrap .layui-upload-file{display:block!important;position:absolute;left:0;top:0;z-index:10;font-size:100px;width:100%;height:100%;opacity:.01;filter:Alpha(opacity=1);cursor:pointer}.layui-btn-container .layui-upload-choose{padding-left:0}.layui-menu{position:relative;margin:5px 0;background-color:#fff}.layui-menu li,.layui-menu-body-title a{padding:5px 15px}.layui-menu li{position:relative;margin:1px 0;width:calc(100% + 1px);line-height:26px;color:rgba(0,0,0,.8);font-size:14px;white-space:nowrap;cursor:pointer}.layui-menu li:hover{background-color:#F6F6F6}.layui-menu-item-parent:hover>.layui-menu-body-panel{display:block;animation-name:layui-fadein;animation-duration:.3s;animation-fill-mode:both;animation-delay:.2s}.layui-menu-item-group .layui-menu-body-title,.layui-menu-item-parent .layui-menu-body-title{padding-right:25px}.layui-menu .layui-menu-item-divider:hover,.layui-menu .layui-menu-item-group:hover,.layui-menu .layui-menu-item-none:hover{background:0 0;cursor:default}.layui-menu .layui-menu-item-group>ul{margin:5px 0 -5px}.layui-menu .layui-menu-item-group>.layui-menu-body-title{color:rgba(0,0,0,.35);user-select:none}.layui-menu .layui-menu-item-none{color:rgba(0,0,0,.35);cursor:default;text-align:center}.layui-menu .layui-menu-item-divider{margin:5px 0;padding:0;height:0;line-height:0;border-bottom:1px solid #eee;overflow:hidden}.layui-menu .layui-menu-item-down:hover,.layui-menu .layui-menu-item-up:hover{cursor:pointer}.layui-menu .layui-menu-item-up>.layui-menu-body-title{color:rgba(0,0,0,.8)}.layui-menu .layui-menu-item-up>ul{visibility:hidden;height:0;overflow:hidden}.layui-menu .layui-menu-item-down:hover>.layui-menu-body-title>.layui-icon,.layui-menu .layui-menu-item-up>.layui-menu-body-title:hover>.layui-icon{color:rgba(0,0,0,1)}.layui-menu .layui-menu-item-down>ul{visibility:visible;height:auto}.layui-breadcrumb,.layui-tree-btnGroup{visibility:hidden}.layui-menu .layui-menu-item-checked,.layui-menu .layui-menu-item-checked2{background-color:#F6F6F6!important;color:#5FB878}.layui-menu .layui-menu-item-checked a,.layui-menu .layui-menu-item-checked2 a{color:#5FB878}.layui-menu .layui-menu-item-checked:after{position:absolute;right:0;top:0;bottom:0;border-right:3px solid #5FB878;content:""}.layui-menu-body-title{position:relative;overflow:hidden;text-overflow:ellipsis}.layui-menu-body-title a{display:block;margin:-5px -15px;color:rgba(0,0,0,.8)}.layui-menu-body-title>.layui-icon{position:absolute;right:0;top:0;font-size:14px}.layui-menu-body-title>.layui-icon-right{right:-1px}.layui-menu-body-panel{display:none;position:absolute;top:-7px;left:100%;z-index:1000;margin-left:13px;padding:5px 0}.layui-menu-body-panel:before{content:"";position:absolute;width:20px;left:-16px;top:0;bottom:0}.layui-menu-body-panel-left{left:auto;right:100%;margin:0 13px}.layui-menu-body-panel-left:before{left:auto;right:-16px}.layui-menu-lg li{line-height:32px}.layui-menu-lg .layui-menu-body-title a:hover,.layui-menu-lg li:hover{background:0 0;color:#5FB878}.layui-menu-lg li .layui-menu-body-panel{margin-left:14px}.layui-menu-lg li .layui-menu-body-panel-left{margin:0 15px}.layui-dropdown{position:absolute;left:-999999px;top:-999999px;z-index:66666666;margin:5px 0;min-width:100px}.layui-dropdown:before{content:"";position:absolute;width:100%;height:6px;left:0;top:-6px}.layui-nav{position:relative;padding:0 20px;background-color:#393D49;color:#fff;border-radius:2px;font-size:0}.layui-nav *{font-size:14px}.layui-nav .layui-nav-item{position:relative;display:inline-block;*display:inline;*zoom:1;vertical-align:middle;line-height:60px}.layui-nav .layui-nav-item a{display:block;padding:0 20px;color:#fff;color:rgba(255,255,255,.7);transition:all .3s;-webkit-transition:all .3s}.layui-nav .layui-this:after,.layui-nav-bar{content:"";position:absolute;left:0;top:0;width:0;height:5px;background-color:#5FB878;transition:all .2s;-webkit-transition:all .2s;pointer-events:none}.layui-nav-bar{z-index:1000}.layui-nav[lay-bar=disabled] .layui-nav-bar{display:none}.layui-nav .layui-nav-item a:hover,.layui-nav .layui-this a{color:#fff}.layui-nav .layui-this:after{top:auto;bottom:0;width:100%}.layui-nav-img{width:30px;height:30px;margin-right:10px;border-radius:50%}.layui-nav .layui-nav-more{position:absolute;top:0;right:3px;left:auto!important;margin-top:0;font-size:12px;cursor:pointer;transition:all .2s;-webkit-transition:all .2s}.layui-nav .layui-nav-mored,.layui-nav-itemed>a .layui-nav-more{transform:rotate(180deg)}.layui-nav-child{display:none;position:absolute;left:0;top:65px;min-width:100%;line-height:36px;padding:5px 0;box-shadow:0 2px 4px rgba(0,0,0,.12);border:1px solid #eee;background-color:#fff;z-index:100;border-radius:2px;white-space:nowrap}.layui-nav .layui-nav-child a{color:#666;color:rgba(0,0,0,.8)}.layui-nav .layui-nav-child a:hover{background-color:#F6F6F6;color:rgba(0,0,0,.8)}.layui-nav-child dd{margin:1px 0;position:relative}.layui-nav-child dd.layui-this{background-color:#F6F6F6;color:#000}.layui-nav-child dd.layui-this:after{display:none}.layui-nav-child-r{left:auto;right:0}.layui-nav-child-c{text-align:center}.layui-nav-tree{width:200px;padding:0}.layui-nav-tree .layui-nav-item{display:block;width:100%;line-height:40px}.layui-nav-tree .layui-nav-item a{position:relative;height:40px;line-height:40px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.layui-nav-tree .layui-nav-item>a{padding-top:5px;padding-bottom:5px}.layui-nav-tree .layui-nav-more{right:15px}.layui-nav-tree .layui-nav-item>a .layui-nav-more{padding:5px 0}.layui-nav-tree .layui-nav-bar{width:5px;height:0;background-color:#009688}.layui-side .layui-nav-tree .layui-nav-bar{width:2px}.layui-nav-tree .layui-nav-child dd.layui-this,.layui-nav-tree .layui-nav-child dd.layui-this a,.layui-nav-tree .layui-this,.layui-nav-tree .layui-this>a,.layui-nav-tree .layui-this>a:hover{background-color:#009688;color:#fff}.layui-nav-tree .layui-this:after{display:none}.layui-nav-itemed>a,.layui-nav-tree .layui-nav-title a,.layui-nav-tree .layui-nav-title a:hover{color:#fff!important}.layui-nav-tree .layui-nav-child{position:relative;z-index:0;top:0;border:none;box-shadow:none}.layui-nav-tree .layui-nav-child dd{margin:0}.layui-nav-tree .layui-nav-child a{color:#fff;color:rgba(255,255,255,.7)}.layui-nav-tree .layui-nav-child,.layui-nav-tree .layui-nav-child a:hover{background:0 0;color:#fff}.layui-nav-itemed>.layui-nav-child{display:block;background-color:rgba(0,0,0,.3)!important}.layui-nav-itemed>.layui-nav-child>.layui-this>.layui-nav-child{display:block}.layui-nav-side{position:fixed;top:0;bottom:0;left:0;overflow-x:hidden;z-index:999}.layui-breadcrumb{font-size:0}.layui-breadcrumb>*{font-size:14px}.layui-breadcrumb a{color:#999!important}.layui-breadcrumb a:hover{color:#5FB878!important}.layui-breadcrumb a cite{color:#666;font-style:normal}.layui-breadcrumb span[lay-separator]{margin:0 10px;color:#999}.layui-tab{margin:10px 0;text-align:left!important}.layui-tab[overflow]>.layui-tab-title{overflow:hidden}.layui-tab-title{position:relative;left:0;height:40px;white-space:nowrap;font-size:0;border-bottom-width:1px;border-bottom-style:solid;transition:all .2s;-webkit-transition:all .2s}.layui-tab-title li{display:inline-block;*display:inline;*zoom:1;vertical-align:middle;font-size:14px;transition:all .2s;-webkit-transition:all .2s;position:relative;line-height:40px;min-width:65px;padding:0 15px;text-align:center;cursor:pointer}.layui-tab-title li a{display:block;padding:0 15px;margin:0 -15px}.layui-tab-title .layui-this{color:#000}.layui-tab-title .layui-this:after{position:absolute;left:0;top:0;content:"";width:100%;height:41px;border-width:1px;border-style:solid;border-bottom-color:#fff;border-radius:2px 2px 0 0;box-sizing:border-box;pointer-events:none}.layui-tab-bar{position:absolute;right:0;top:0;z-index:10;width:30px;height:39px;line-height:39px;border-width:1px;border-style:solid;border-radius:2px;text-align:center;background-color:#fff;cursor:pointer}.layui-tab-bar .layui-icon{position:relative;display:inline-block;top:3px;transition:all .3s;-webkit-transition:all .3s}.layui-tab-item{display:none}.layui-tab-more{padding-right:30px;height:auto!important;white-space:normal!important}.layui-tab-more li.layui-this:after{border-bottom-color:#eee;border-radius:2px}.layui-tab-more .layui-tab-bar .layui-icon{top:-2px;top:3px\9;-webkit-transform:rotate(180deg);transform:rotate(180deg)}:root .layui-tab-more .layui-tab-bar .layui-icon{top:-2px\0/IE9}.layui-tab-content{padding:15px 0}.layui-tab-title li .layui-tab-close{position:relative;display:inline-block;width:18px;height:18px;line-height:20px;margin-left:8px;top:1px;text-align:center;font-size:14px;color:#c2c2c2;transition:all .2s;-webkit-transition:all .2s}.layui-tab-title li .layui-tab-close:hover{border-radius:2px;background-color:#FF5722;color:#fff}.layui-tab-brief>.layui-tab-title .layui-this{color:#009688}.layui-tab-brief>.layui-tab-more li.layui-this:after,.layui-tab-brief>.layui-tab-title .layui-this:after{border:none;border-radius:0;border-bottom:2px solid #5FB878}.layui-tab-brief[overflow]>.layui-tab-title .layui-this:after{top:-1px}.layui-tab-card{border-width:1px;border-style:solid;border-radius:2px;box-shadow:0 2px 5px 0 rgba(0,0,0,.1)}.layui-tab-card>.layui-tab-title{background-color:#FAFAFA}.layui-tab-card>.layui-tab-title li{margin-right:-1px;margin-left:-1px}.layui-tab-card>.layui-tab-title .layui-this{background-color:#fff}.layui-tab-card>.layui-tab-title .layui-this:after{border-top:none;border-width:1px;border-bottom-color:#fff}.layui-tab-card>.layui-tab-title .layui-tab-bar{height:40px;line-height:40px;border-radius:0;border-top:none;border-right:none}.layui-tab-card>.layui-tab-more .layui-this{background:0 0;color:#5FB878}.layui-tab-card>.layui-tab-more .layui-this:after{border:none}.layui-timKuone{padding-left:5px}.layui-timKuone-item{position:relative;padding-bottom:20px}.layui-timKuone-axis{position:absolute;left:-5px;top:0;z-index:10;width:20px;height:20px;line-height:20px;background-color:#fff;color:#5FB878;border-radius:50%;text-align:center;cursor:pointer}.layui-timKuone-axis:hover{color:#FF5722}.layui-timKuone-item:before{content:"";position:absolute;left:5px;top:0;z-index:0;width:1px;height:100%}.layui-timKuone-item:first-child:before{display:block}.layui-timKuone-item:last-child:before{display:none}.layui-timKuone-content{padding-left:25px}.layui-timKuone-title{position:relative;margin-bottom:10px;line-height:22px}.layui-badge,.layui-badge-dot,.layui-badge-rim{position:relative;display:inline-block;padding:0 6px;font-size:12px;text-align:center;background-color:#FF5722;color:#fff;border-radius:2px}.layui-badge{height:18px;line-height:18px}.layui-badge-dot{width:8px;height:8px;padding:0;border-radius:50%}.layui-badge-rim{height:18px;line-height:18px;border-width:1px;border-style:solid;background-color:#fff;color:#666}.layui-btn .layui-badge,.layui-btn .layui-badge-dot{margin-left:5px}.layui-nav .layui-badge,.layui-nav .layui-badge-dot{position:absolute;top:50%;margin:-5px 6px 0}.layui-nav .layui-badge{margin-top:-10px}.layui-tab-title .layui-badge,.layui-tab-title .layui-badge-dot{left:5px;top:-2px}.layui-carousel{position:relative;left:0;top:0;background-color:#f8f8f8}.layui-carousel>[carousel-item]{position:relative;width:100%;height:100%;overflow:hidden}.layui-carousel>[carousel-item]:before{position:absolute;content:'\e63d';left:50%;top:50%;width:100px;line-height:20px;margin:-10px 0 0 -50px;text-align:center;color:#c2c2c2;font-family:layui-icon!important;font-size:30px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.layui-carousel>[carousel-item]>*{display:none;position:absolute;left:0;top:0;width:100%;height:100%;background-color:#f8f8f8;transition-duration:.3s;-webkit-transition-duration:.3s}.layui-carousel-updown>*{-webkit-transition:.3s ease-in-out up;transition:.3s ease-in-out up}.layui-carousel-arrow{display:none\9;opacity:0;position:absolute;left:10px;top:50%;margin-top:-18px;width:36px;height:36px;line-height:36px;text-align:center;font-size:20px;border:0;border-radius:50%;background-color:rgba(0,0,0,.2);color:#fff;-webkit-transition-duration:.3s;transition-duration:.3s;cursor:pointer}.layui-carousel-arrow[lay-type=add]{left:auto!important;right:10px}.layui-carousel:hover .layui-carousel-arrow[lay-type=add],.layui-carousel[lay-arrow=always] .layui-carousel-arrow[lay-type=add]{right:20px}.layui-carousel[lay-arrow=always] .layui-carousel-arrow{opacity:1;left:20px}.layui-carousel[lay-arrow=none] .layui-carousel-arrow{display:none}.layui-carousel-arrow:hover,.layui-carousel-ind ul:hover{background-color:rgba(0,0,0,.35)}.layui-carousel:hover .layui-carousel-arrow{display:block\9;opacity:1;left:20px}.layui-carousel-ind{position:relative;top:-35px;width:100%;line-height:0!important;text-align:center;font-size:0}.layui-carousel[lay-indicator=outside]{margin-bottom:30px}.layui-carousel[lay-indicator=outside] .layui-carousel-ind{top:10px}.layui-carousel[lay-indicator=outside] .layui-carousel-ind ul{background-color:rgba(0,0,0,.5)}.layui-carousel[lay-indicator=none] .layui-carousel-ind{display:none}.layui-carousel-ind ul{display:inline-block;padding:5px;background-color:rgba(0,0,0,.2);border-radius:10px;-webkit-transition-duration:.3s;transition-duration:.3s}.layui-carousel-ind li{display:inline-block;width:10px;height:10px;margin:0 3px;font-size:14px;background-color:#eee;background-color:rgba(255,255,255,.5);border-radius:50%;cursor:pointer;-webkit-transition-duration:.3s;transition-duration:.3s}.layui-carousel-ind li:hover{background-color:rgba(255,255,255,.7)}.layui-carousel-ind li.layui-this{background-color:#fff}.layui-carousel>[carousel-item]>.layui-carousel-next,.layui-carousel>[carousel-item]>.layui-carousel-prev,.layui-carousel>[carousel-item]>.layui-this{display:block}.layui-carousel>[carousel-item]>.layui-this{left:0}.layui-carousel>[carousel-item]>.layui-carousel-prev{left:-100%}.layui-carousel>[carousel-item]>.layui-carousel-next{left:100%}.layui-carousel>[carousel-item]>.layui-carousel-next.layui-carousel-left,.layui-carousel>[carousel-item]>.layui-carousel-prev.layui-carousel-right{left:0}.layui-carousel>[carousel-item]>.layui-this.layui-carousel-left{left:-100%}.layui-carousel>[carousel-item]>.layui-this.layui-carousel-right{left:100%}.layui-carousel[lay-anim=updown] .layui-carousel-arrow{left:50%!important;top:20px;margin:0 0 0 -18px}.layui-carousel[lay-anim=updown]>[carousel-item]>*,.layui-carousel[lay-anim=fade]>[carousel-item]>*{left:0!important}.layui-carousel[lay-anim=updown] .layui-carousel-arrow[lay-type=add]{top:auto!important;bottom:20px}.layui-carousel[lay-anim=updown] .layui-carousel-ind{position:absolute;top:50%;right:20px;width:auto;height:auto}.layui-carousel[lay-anim=updown] .layui-carousel-ind ul{padding:3px 5px}.layui-carousel[lay-anim=updown] .layui-carousel-ind li{display:block;margin:6px 0}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-this{top:0}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-prev{top:-100%}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-next{top:100%}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-next.layui-carousel-left,.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-prev.layui-carousel-right{top:0}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-this.layui-carousel-left{top:-100%}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-this.layui-carousel-right{top:100%}.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-next,.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-prev{opacity:0}.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-next.layui-carousel-left,.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-prev.layui-carousel-right{opacity:1}.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-this.layui-carousel-left,.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-this.layui-carousel-right{opacity:0}.layui-fixbar{position:fixed;right:15px;bottom:15px;z-index:999999}.layui-fixbar li{width:50px;height:50px;line-height:50px;margin-bottom:1px;text-align:center;cursor:pointer;font-size:30px;background-color:#9F9F9F;color:#fff;border-radius:2px;opacity:.95}.layui-fixbar li:hover{opacity:.85}.layui-fixbar li:active{opacity:1}.layui-fixbar .layui-fixbar-top{display:none;font-size:40px}body .layui-util-face{border:none;background:0 0}body .layui-util-face .layui-layer-content{padding:0;background-color:#fff;color:#666;box-shadow:none}.layui-util-face .layui-layer-TipsG{display:none}.layui-transfer-active,.layui-transfer-box{display:inline-block;vertical-align:middle}.layui-util-face ul{position:relative;width:372px;padding:10px;border:1px solid #D9D9D9;background-color:#fff;box-shadow:0 0 20px rgba(0,0,0,.2)}.layui-util-face ul li{cursor:pointer;float:left;border:1px solid #e8e8e8;height:22px;width:26px;overflow:hidden;margin:-1px 0 0 -1px;padding:4px 2px;text-align:center}.layui-util-face ul li:hover{position:relative;z-index:2;border:1px solid #eb7350;background:#fff9ec}.layui-code{position:relative;margin:10px 0;padding:15px;line-height:20px;border:1px solid #eee;border-left-width:6px;background-color:#FAFAFA;color:#333;font-family:Courier New;font-size:12px}.layui-transfer-box,.layui-transfer-header,.layui-transfer-search{border-width:0;border-style:solid;border-color:#eee}.layui-transfer-box{position:relative;border-width:1px;width:200px;height:360px;border-radius:2px;background-color:#fff}.layui-transfer-box .layui-form-checkbox{width:100%;margin:0!important}.layui-transfer-header{height:38px;line-height:38px;padding:0 10px;border-bottom-width:1px}.layui-transfer-search{position:relative;padding:10px;border-bottom-width:1px}.layui-transfer-search .layui-input{height:32px;padding-left:30px;font-size:12px}.layui-transfer-search .layui-icon-search{position:absolute;left:20px;top:50%;margin-top:-8px;color:#666}.layui-transfer-active{margin:0 15px}.layui-transfer-active .layui-btn{display:block;margin:0;padding:0 15px;background-color:#5FB878;border-color:#5FB878;color:#fff}.layui-transfer-active .layui-btn-disabled{background-color:#FBFBFB;border-color:#eee;color:#d2d2d2}.layui-transfer-active .layui-btn:first-child{margin-bottom:15px}.layui-transfer-active .layui-btn .layui-icon{margin:0;font-size:14px!important}.layui-transfer-data{padding:5px 0;overflow:auto}.layui-transfer-data li{height:32px;line-height:32px;padding:0 10px}.layui-transfer-data li:hover{background-color:#F6F6F6;transition:.5s all}.layui-transfer-data .layui-none{padding:15px 10px;text-align:center;color:#999}.layui-rate,.layui-rate *{display:inline-block;vertical-align:middle}.layui-rate{padding:10px 5px 10px 0;font-size:0}.layui-rate li i.layui-icon{font-size:20px;color:#FFB800;margin-right:5px;transition:all .3s;-webkit-transition:all .3s}.layui-rate li i:hover{cursor:pointer;transform:scale(1.12);-webkit-transform:scale(1.12)}.layui-rate[readonly] li i:hover{cursor:default;transform:scale(1)}.layui-colorpicker{width:26px;height:26px;border:1px solid #eee;padding:5px;border-radius:2px;line-height:24px;display:inline-block;cursor:pointer;transition:all .3s;-webkit-transition:all .3s}.layui-colorpicker:hover{border-color:#d2d2d2}.layui-colorpicker.layui-colorpicker-lg{width:34px;height:34px;line-height:32px}.layui-colorpicker.layui-colorpicker-sm{width:24px;height:24px;line-height:22px}.layui-colorpicker.layui-colorpicker-xs{width:22px;height:22px;line-height:20px}.layui-colorpicker-trigger-bgcolor{display:block;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==);border-radius:2px}.layui-colorpicker-trigger-span{display:block;height:100%;box-sizing:border-box;border:1px solid rgba(0,0,0,.15);border-radius:2px;text-align:center}.layui-colorpicker-trigger-i{display:inline-block;color:#FFF;font-size:12px}.layui-colorpicker-trigger-i.layui-icon-close{color:#999}.layui-colorpicker-main{position:absolute;left:-999999px;top:-999999px;z-index:66666666;width:280px;margin:5px 0;padding:7px;background:#FFF;border:1px solid #d2d2d2;border-radius:2px;box-shadow:0 2px 4px rgba(0,0,0,.12)}.layui-colorpicker-main-wrapper{height:180px;position:relative}.layui-colorpicker-basis{width:260px;height:100%;position:relative}.layui-colorpicker-basis-white{width:100%;height:100%;position:absolute;top:0;left:0;background:linear-gradient(90deg,#FFF,hsla(0,0%,100%,0))}.layui-colorpicker-basis-black{width:100%;height:100%;position:absolute;top:0;left:0;background:linear-gradient(0deg,#000,transparent)}.layui-colorpicker-basis-cursor{width:10px;height:10px;border:1px solid #FFF;border-radius:50%;position:absolute;top:-3px;right:-3px;cursor:pointer}.layui-colorpicker-side{position:absolute;top:0;right:0;width:12px;height:100%;background:linear-gradient(red,#FF0,#0F0,#0FF,#00F,#F0F,red)}.layui-colorpicker-side-slider{width:100%;height:5px;box-shadow:0 0 1px #888;background:#FFF;border-radius:1px;border:1px solid #f0f0f0;cursor:pointer;position:absolute;left:0}.layui-colorpicker-main-alpha{display:none;height:12px;margin-top:7px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==)}.layui-colorpicker-alpha-bgcolor{height:100%;position:relative}.layui-colorpicker-alpha-slider{width:5px;height:100%;box-shadow:0 0 1px #888;background:#FFF;border-radius:1px;border:1px solid #f0f0f0;cursor:pointer;position:absolute;top:0}.layui-colorpicker-main-pre{padding-top:7px;font-size:0}.layui-colorpicker-pre{width:20px;height:20px;border-radius:2px;display:inline-block;margin-left:6px;margin-bottom:7px;cursor:pointer}.layui-colorpicker-pre:nth-child(11n+1){margin-left:0}.layui-colorpicker-pre-isalpha{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==)}.layui-colorpicker-pre.layui-this{box-shadow:0 0 3px 2px rgba(0,0,0,.15)}.layui-colorpicker-pre>div{height:100%;border-radius:2px}.layui-colorpicker-main-input{text-align:right;padding-top:7px}.layui-colorpicker-main-input .layui-btn-container .layui-btn{margin:0 0 0 10px}.layui-colorpicker-main-input div.layui-inline{float:left;margin-right:10px;font-size:14px}.layui-colorpicker-main-input input.layui-input{width:150px;height:30px;color:#666}.layui-slider{height:4px;background:#eee;border-radius:3px;position:relative;cursor:pointer}.layui-slider-bar{border-radius:3px;position:absolute;height:100%}.layui-slider-step{position:absolute;top:0;width:4px;height:4px;border-radius:50%;background:#FFF;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.layui-slider-wrap{width:36px;height:36px;position:absolute;top:-16px;-webkit-transform:translateX(-50%);transform:translateX(-50%);z-index:10;text-align:center}.layui-slider-wrap-btn{width:12px;height:12px;border-radius:50%;background:#FFF;display:inline-block;vertical-align:middle;cursor:pointer;transition:.3s}.layui-slider-wrap:after{content:"";height:100%;display:inline-block;vertical-align:middle}.layui-slider-wrap-btn.layui-slider-hover,.layui-slider-wrap-btn:hover{transform:scale(1.2)}.layui-slider-wrap-btn.layui-disabled:hover{transform:scale(1)!important}.layui-slider-tips{position:absolute;top:-42px;z-index:66666666;white-space:nowrap;display:none;-webkit-transform:translateX(-50%);transform:translateX(-50%);color:#FFF;background:#000;border-radius:3px;height:25px;line-height:25px;padding:0 10px}.layui-slider-tips:after{content:"";position:absolute;bottom:-12px;left:50%;margin-left:-6px;width:0;height:0;border-width:6px;border-style:solid;border-color:#000 transparent transparent}.layui-slider-input{width:70px;height:32px;border:1px solid #eee;border-radius:3px;font-size:16px;line-height:32px;position:absolute;right:0;top:-14px}.layui-slider-input-btn{position:absolute;top:0;right:0;width:20px;height:100%;border-left:1px solid #eee}.layui-slider-input-btn i{cursor:pointer;position:absolute;right:0;bottom:0;width:20px;height:50%;font-size:12px;line-height:16px;text-align:center;color:#999}.layui-slider-input-btn i:first-child{top:0;border-bottom:1px solid #eee}.layui-slider-input-txt{height:100%;font-size:14px}.layui-slider-input-txt input{height:100%;border:none}.layui-slider-input-btn i:hover{color:#009688}.layui-slider-vertical{width:4px;margin-left:33px}.layui-slider-vertical .layui-slider-bar{width:4px}.layui-slider-vertical .layui-slider-step{top:auto;left:0;-webkit-transform:translateY(50%);transform:translateY(50%)}.layui-slider-vertical .layui-slider-wrap{top:auto;left:-16px;-webkit-transform:translateY(50%);transform:translateY(50%)}.layui-slider-vertical .layui-slider-tips{top:auto;left:2px}@media \0screen{.layui-slider-wrap-btn{margin-left:-20px}.layui-slider-vertical .layui-slider-wrap-btn{margin-left:0;margin-bottom:-20px}.layui-slider-vertical .layui-slider-tips{margin-left:-8px}.layui-slider>span{margin-left:8px}}.layui-tree{line-height:22px}.layui-tree .layui-form-checkbox{margin:0!important}.layui-tree-set{width:100%;position:relative}.layui-tree-pack{display:none;padding-left:20px;position:relative}.layui-tree-iconClick,.layui-tree-main{display:inline-block;vertical-align:middle}.layui-tree-line .layui-tree-pack{padding-left:27px}.layui-tree-line .layui-tree-set .layui-tree-set:after{content:"";position:absolute;top:14px;left:-9px;width:17px;height:0;border-top:1px dotted #c0c4cc}.layui-tree-entry{position:relative;padding:3px 0;height:20px;white-space:nowrap}.layui-tree-entry:hover{background-color:#eee}.layui-tree-line .layui-tree-entry:hover{background-color:rgba(0,0,0,0)}.layui-tree-line .layui-tree-entry:hover .layui-tree-txt{color:#999;text-decoration:underline;transition:.3s}.layui-tree-main{cursor:pointer;padding-right:10px}.layui-tree-line .layui-tree-set:before{content:"";position:absolute;top:0;left:-9px;width:0;height:100%;border-left:1px dotted #c0c4cc}.layui-tree-line .layui-tree-set.layui-tree-setLineShort:before{height:13px}.layui-tree-line .layui-tree-set.layui-tree-setHide:before{height:0}.layui-tree-iconClick{position:relative;height:20px;line-height:20px;margin:0 10px;color:#c0c4cc}.layui-tree-icon{height:12px;line-height:12px;width:12px;text-align:center;border:1px solid #c0c4cc}.layui-tree-iconClick .layui-icon{font-size:18px}.layui-tree-icon .layui-icon{font-size:12px;color:#666}.layui-tree-iconArrow{padding:0 5px}.layui-tree-iconArrow:after{content:"";position:absolute;left:4px;top:3px;z-index:100;width:0;height:0;border-width:5px;border-style:solid;border-color:transparent transparent transparent #c0c4cc;transition:.5s}.layui-tree-btnGroup,.layui-tree-editInput{position:relative;vertical-align:middle;display:inline-block}.layui-tree-spread>.layui-tree-entry>.layui-tree-iconClick>.layui-tree-iconArrow:after{transform:rotate(90deg) translate(3px,4px)}.layui-tree-txt{display:inline-block;vertical-align:middle;color:#555}.layui-tree-search{margin-bottom:15px;color:#666}.layui-tree-btnGroup .layui-icon{display:inline-block;vertical-align:middle;padding:0 2px;cursor:pointer}.layui-tree-btnGroup .layui-icon:hover{color:#999;transition:.3s}.layui-tree-entry:hover .layui-tree-btnGroup{visibility:visible}.layui-tree-editInput{height:20px;line-height:20px;padding:0 3px;border:none;background-color:rgba(0,0,0,.05)}.layui-tree-emptyText{text-align:center;color:#999}.layui-anim{-webkit-animation-duration:.3s;-webkit-animation-fill-mode:both;animation-duration:.3s;animation-fill-mode:both}.layui-anim.layui-icon{display:inline-block}.layui-anim-loop{-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite}.layui-trans,.layui-trans a{transition:all .2s;-webkit-transition:all .2s}@-webkit-keyframes layui-rotate{from{-webkit-transform:rotate(0)}to{-webkit-transform:rotate(360deg)}}@keyframes layui-rotate{from{transform:rotate(0)}to{transform:rotate(360deg)}}.layui-anim-rotate{-webkit-animation-name:layui-rotate;animation-name:layui-rotate;-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-timing-function:linear;animation-timing-function:linear}@-webkit-keyframes layui-up{from{-webkit-transform:translate3d(0,100%,0);opacity:.3}to{-webkit-transform:translate3d(0,0,0);opacity:1}}@keyframes layui-up{from{transform:translate3d(0,100%,0);opacity:.3}to{transform:translate3d(0,0,0);opacity:1}}.layui-anim-up{-webkit-animation-name:layui-up;animation-name:layui-up}@-webkit-keyframes layui-upbit{from{-webkit-transform:translate3d(0,15px,0);opacity:.3}to{-webkit-transform:translate3d(0,0,0);opacity:1}}@keyframes layui-upbit{from{transform:translate3d(0,15px,0);opacity:.3}to{transform:translate3d(0,0,0);opacity:1}}.layui-anim-upbit{-webkit-animation-name:layui-upbit;animation-name:layui-upbit}@keyframes layui-down{0%{opacity:.3;transform:translate3d(0,-100%,0)}100%{opacity:1;transform:translate3d(0,0,0)}}.layui-anim-down{animation-name:layui-down}@keyframes layui-downbit{0%{opacity:.3;transform:translate3d(0,-5px,0)}100%{opacity:1;transform:translate3d(0,0,0)}}.layui-anim-downbit{animation-name:layui-downbit}@-webkit-keyframes layui-scale{0%{opacity:.3;-webkit-transform:scale(.5)}100%{opacity:1;-webkit-transform:scale(1)}}@keyframes layui-scale{0%{opacity:.3;-ms-transform:scale(.5);transform:scale(.5)}100%{opacity:1;-ms-transform:scale(1);transform:scale(1)}}.layui-anim-scale{-webkit-animation-name:layui-scale;animation-name:layui-scale}@-webkit-keyframes layui-scale-spring{0%{opacity:.5;-webkit-transform:scale(.5)}80%{opacity:.8;-webkit-transform:scale(1.1)}100%{opacity:1;-webkit-transform:scale(1)}}@keyframes layui-scale-spring{0%{opacity:.5;transform:scale(.5)}80%{opacity:.8;transform:scale(1.1)}100%{opacity:1;transform:scale(1)}}.layui-anim-scaleSpring{-webkit-animation-name:layui-scale-spring;animation-name:layui-scale-spring}@keyframes layui-scalesmall{0%{opacity:.3;transform:scale(1.5)}100%{opacity:1;transform:scale(1)}}.layui-anim-scalesmall{animation-name:layui-scalesmall}@keyframes layui-scalesmall-spring{0%{opacity:.3;transform:scale(1.5)}80%{opacity:.8;transform:scale(.9)}100%{opacity:1;transform:scale(1)}}.layui-anim-scalesmall-spring{animation-name:layui-scalesmall-spring}@-webkit-keyframes layui-fadein{0%{opacity:0}100%{opacity:1}}@keyframes layui-fadein{0%{opacity:0}100%{opacity:1}}.layui-anim-fadein{-webkit-animation-name:layui-fadein;animation-name:layui-fadein}@-webkit-keyframes layui-fadeout{0%{opacity:1}100%{opacity:0}}@keyframes layui-fadeout{0%{opacity:1}100%{opacity:0}}.layui-anim-fadeout{-webkit-animation-name:layui-fadeout;animation-name:layui-fadeout}
.layui-layer-content{padding:20px;}
.layui-form-label{width:60px;}
.layui-input-block{margin-left:90px;}
.layui-form-item .layui-input-inline{width:200px;}
</style>
</head>
<body layadmin-themealias="ocean" class="layui-layout-body">
</body>
</html>
<script src="<?php echo WZHOST.'Tpl/';?>jquery.js"></script>
<script src="<?php echo WZHOST.'Tpl/';?>layui/layui.js"></script>
<script>
window.VER = '<?php echo ELikjVER;?>';
window.UIMUI ={};
window.OPID = 0;
window.ELi = {
    DATA:{},
    TABLE:{}
};
function apptongxin( url ,canshu,hanshu,method){
    if(!method){
        method = "POST";
    }
    var request = new FormData();                   
    $.each(canshu, function(i, obj) { request.append(i, obj); });    
    request.append('apptoken', APPTOKEN);
    $.ajax({
        type :method,
        url : url,
        data : request,
        processData : false,
        contentType : false, 
        success : function(result) {
            hanshu(result);
        },
        error : function(e){
            layer.msg(e.statusText,{offset: 'c'});
        }
    });
}
function setapptoken(token){
    if(token && token !="" && token.length == 64){
        window.APPTOKEN = token;
    }
}
window.APPTOKEN = "";
window.TOKEN = "";
window.YTOKEN = "";
window.CDNHOST  = "<?php echo CDNHOST;?>";
window.WZHOST = "<?php echo WZHOST;?>";
window.dir = '<?php  echo WZHOST;?>';
window.FENGE = '<?php  echo $ELiConfig['fenge'];?>';
window.Plus = '<?php  echo $ELiConfig['Plus'];?>';
window.PLUG = '<?php echo WZHOST.'index.php/'.$ELiConfig['Plus'].$ELiConfig['fenge'].$THIS->plugin.$ELiConfig['fenge'];?>';
window.UPFILE = PLUG;
window.p = console.log;
window.PAGEHOME = '<?php echo  trim(WZHOST,$ELiConfig['dir']).$GLOBALS['pluginurl'];?>';
window.TTTXUANCLASS = "";
$.post = apptongxin;
window.BASEUP = false; //开启base64上传
window.kindURL = WZHOST+"Tpl/layui/";
function pichttp(pic){
    if( typeof(pic) == "undefined" ||  pic == '' ){
        return WZHOST+'Tpl/noimg.png';
    }
    if(pic.indexOf("://") > -1){
        return pic;
    }else if(pic.indexOf("/") <= -1 && pic.indexOf(".") <= -1){
        return WZHOST+'Tpl/noimg.png';
    }else{
        var zifu = pic.substr(0,1);
        if(zifu == '/'){
            return CDNHOST+pic.substr(1);
        }else{
            return CDNHOST+pic;
        }
    }
}
function uploadurl(get){
    if(typeof(get) == "undefined"){
        get = "";
    }
    if( get !="" ){
        get = "?&"+get+'&apptoken='+APPTOKEN;
    }else{
        get = '?&apptoken='+APPTOKEN;
    }
    return UPFILE+'upload/'+get;
}
function aitpl(str){
    var  reCommentContents = /\/\*!?(?:@aitpl)?[ \t]*(?:\r\n|\n)([\s\S]*?)(?:\r\n|\n)[ \t]*\*\//;
    var match = reCommentContents.exec(str.toString());
    if (!match) {
		return ('解析html失败');
	}
    return layui.laytpl(match[1]).render([]);
}
function WEIYI(){
    return  new Date().getTime();
}
function time(times){
    if(times < 1) return 'Unknown';
    var date = new Date(times*1000);
    return layui.util.toDateString(date, "yyyy-MM-dd HH:mm:ss");
}
function loadurl(url,name){
    var isopen = false;
    if(url.indexOf("OPEN:")>-1){
        url = url.replace("OPEN:","");
        isopen = true;
    }
    if(url.indexOf("://")>-1){
    }else if(url.substr(0,1) == '/'){
        url=dir+Plus+url;
    }else{
        url=dir+Plus+FENGE+url;
    }
    if(isopen){
        layer.open({
        type: 2,
        title: "<span style='font-size:20px;display:block;text-align:center;color:#1E9FFF;font-weight:bold;'>"+name+"</span>",
        fixed: false, //不固定
        area: ['100%', '100%'],
        maxmin: false,
        content: url,
        success: function(layero, index){
            }
        });
        return ;
    }
    $(".layui-layout-admin .layui-side").css({left:0});
    $(".layadmin-body-shade").hide();
    $class = "ELi"+hex_md5(url);
    TTTXUANCLASS = $class;
    ELi.TABLE[$class] = url;
    addhtml( $class ,url,name,'<div class="layui-tab-item '+$class+'"><iframe frameborder="0" class="layadmin-iframe onciframe"></iframe></div>');
    $("."+$class+' iframe.onciframe').attr({src:url});
    layui.element.render();
}
function cilicktabel(tlbale){
    var shuzu = tlbale.split("@@");
    $class = "ELi"+hex_md5(shuzu['0']);
    TTTXUANCLASS = $class;
}
function addhtml($class,name,xname,htmlx){
    TTTXUANCLASS = $class;
    ELi.TABLE[$class] = name;
    if($("#LAY_app_body ."+$class).length > 0){
        $("#LAY_app_body .layui-tab-item").removeClass('layui-show');
        $("#LAY_app_body ."+$class).addClass('layui-show');
        $("#LAY_app_tabsheader li").removeClass('layui-this');
        $("#LAY_app_tabsheader ."+$class).addClass('layui-this');
    }else{
        $("#LAY_app_tabsheader").append('<li class="'+$class+'" data="'+name+'@@'+xname+'">'+xname+'</li>');
        $("#LAY_app_tabsheader li").removeClass('layui-this');
        $("#LAY_app_tabsheader ."+$class).addClass('layui-this');
        $("#LAY_app_body").append(htmlx);
        $("#LAY_app_body .layui-tab-item").removeClass('layui-show');
        $("#LAY_app_body ."+$class).addClass('layui-show');
    }
    $("#LAY_app_tabsheader li").unbind();
    $("#LAY_app_tabsheader li").click(function(){
        cilicktabel($(this).attr('data'));
    });
    layui.element.render('layadmin-layout-tabs');
}
function loadjs(name,xname){
    $(".layui-layout-admin .layui-side").css({left:0});
    $(".layadmin-body-shade").hide();
    if(typeof(xname) != "undefined"){
        $class = "ELi"+hex_md5(name);
        
        addhtml( $class ,name,xname,'<div class="tashilisthha layui-tab-item '+$class+'"></div>');
    }
    if(typeof( ELi[name] ) == "undefined"){
        jQuery.getScript(PAGEHOME+'../'+name+'.js').done(function(){
            layer.msg('加载 '+name+" ok",{offset: 'b',time: 1500});

        }).fail(function() {
            layer.alert("加载 "+name+" 失败", {title:"错误提示",icon: 2});
        });
    }else{
        ELi[name].init();
    }
}
function outhtml(html,title){
    $("#LAY_app_body ."+$class).html('<div class="layui-fluid"><div class="layui-card"><div class="layui-card-header">'+title+'</div><div class="layui-card-body" style="padding: 15px;">'+html+'</div></div></div>');
}
function xinzengtext(hhhh){
    var name = hhhh.attr('name');
    var tishi = hhhh.attr('data');
    var  candan = tishi.split(',');
    var css= hhhh.attr('css');
    var tazhi = {};
    var chandgu = $("#"+TTTXUANCLASS+"idx_"+name+ " tr").length;
    for(var mm in candan){
        if(!tazhi[chandgu]){
            tazhi[chandgu] = [];
        }
        tazhi[chandgu].push('');
    }
    $("."+TTTXUANCLASS+" .textqunji_list_"+name).append( textcaidan(name,tazhi,candan,css,500) );
}
function textcaidan(name,$zhi,candan,css,outtime){
    var html = "";
    for( var x in $zhi){
        html += '<tr id="'+TTTXUANCLASS+'textqunji_'+name+'X'+x+'">';
        if(typeof($zhi[x]) == 'string') {
            var  dage = $zhi[x].split('$');
        }else{
            var  dage = $zhi[x];
        } 
        if(dage.length != candan.length){
            continue ;
        }
        for(var zx in candan){
            var mmm = candan[zx];
            var huo = mmm.split('-');
            if(huo.length > 1){

                if(huo[0] == 'update'){
                    var zuid = TTTXUANCLASS+'textqunji_'+name+'X'+x+'b'+zx;
                    html += '<td><input type="text" value="'+(dage[zx]?dage[zx]:"")+'" title="'+huo[1]+'" placeholder="'+huo[1]+'"   name="'+name+'['+x+'][]" id="'+zuid+'" style="float:left;width:80%;margin-right:5px;display: inline-block;" autocomplete="off" class="layui-input"> <button type="button" style="float:left;padding: 0 6px;" class="layui-btn" title="'+huo[1]+'" id="upk_'+zuid+'"><i class="layui-icon layui-icon-upload-drag"></i></button></td>';
                    setTimeout(function(name){
                        layui.upload.render({
                            elem: '#'+'upk_'+name 
                            ,field:"all"
                            ,url: uploadurl()
                            ,auto: !BASEUP 
                            ,choose:function(obj){
                                if(BASEUP){
                                    obj.preview(function(index, file, result){
                                        file = new File([result], file.name);
                                        obj.upload(index, file);
                                    });
                                }
                            }
                            ,done: function(res){
                                if(res.code == 1){
                                    $("#"+name).val(res.data);
                                
                                }else{
                                    layer.msg(res.msg,{offset: 'c'});
                                }
                            }
                        });
                    },outtime,zuid);
                }else{
                    html+='<td><textarea name="'+name+'['+x+'][]"  style="'+css+'" title="'+huo[0]+'" placeholder="'+huo[0]+'"  class="layui-textarea" >'+(dage[zx]?dage[zx]:"")+'</textarea></td>';
                }
            }else{
                html +='<td><input type="text" name="'+name+'['+x+'][]" value="'+(dage[zx]?dage[zx]:"")+'" style="'+css+'"  title="'+huo[0]+'" placeholder="'+huo[0]+'"  autocomplete="off" class="layui-input"></td>';
            }
        }
        html += '<td> <a href="javascript:$(\'#'+TTTXUANCLASS+'textqunji_'+name+'X'+x+'\').remove()" style="color:red;">删除</a></td>';
        html += '</tr>';
    }
    return html;
}

function ncaidan(name){
    $("#"+TTTXUANCLASS+"idx_"+name).find('.zengjian').remove();
    var i = WEIYI();
    var  zx= "<a style=\\'color:#fff;cursor:pointer;\\' class=\\'caidan_ashanchu\\' data=\\'"+TTTXUANCLASS+"caidan_"+name+'X'+i+"\\'>点击我删除</a>";
    html ='<div class="layui-input-inline" id="'+TTTXUANCLASS+'caidan_'+name+'X'+i+'" onclick="layer.tips(\''+zx+'\', \'#'+TTTXUANCLASS+'caidan_'+name+'X'+i+'\',{ time:2000,tips: 3,zIndex:9999})" style="margin-bottom:10px;" ><textarea type="text" name="'+name+'[]" value="" placeholder="请输入值" autocomplete="off" class="layui-input"></textarea></div>';
    html +='<div class="layui-input-inline zengjian" style="margin-bottom:10px;" ><a href="javascript:ncaidan(\''+name+'\')" class="layui-btn">增加菜单</a></div>';
    $("#"+TTTXUANCLASS+"idx_"+name).append(html);
    $('#'+TTTXUANCLASS+'caidan_'+name+'X'+i).click(function(){
        $(".caidan_ashanchu").click(function(){
            iid = $(this).attr('data');
            $("#"+iid).remove();
            layer.close(layer.index);
        });
    });
}

function jsfrom(zifu){
    /*'标签名字#显示名字#输入的类型#css样式#提示信息#默认值#verify模块需要验证的类型'*/
    if(!zifu){
        return "";
    }
    if(typeof(zifu) == 'string') {
        if(zifu == ""){
            return "";
        }
        zifu = zifu.split("($$)"); 
    }
    var outtime = 600;
    var name  = typeof(zifu['0']) != "undefined" ?zifu['0']:'';
    var title = typeof(zifu['1']) != "undefined" ?zifu['1']:'';
    var type  = typeof(zifu['2']) != "undefined" ?zifu['2']:'';
    var  css  = typeof(zifu['3']) != "undefined" ?zifu['3']:'';
    var tishi = typeof(zifu['4']) != "undefined" ?zifu['4']:'';
    var moren = typeof(zifu['5']) != "undefined" ?zifu['5']:'';
    var verify = typeof(zifu['6']) != "undefined" ?zifu['6']:'';
    var $class = typeof(zifu['7']) != "undefined" ?zifu['7']:'';
    var $zhi = null;
    if(moren === null){
        moren = '';
    }
    var html = '<div class="layui-form-item '+TTTXUANCLASS+'idx_'+name+'"><label class="layui-form-label">'+title+'</label><div class="layui-input-block" id="'+TTTXUANCLASS+'idx_'+name+'">';
    if(type == 'hidden'){
        return '<input type="hidden" value="'+moren+'" name="'+name+'" >';
    }else if(type == 'text'){
        html +='<input type="text" value="'+moren+'" name="'+name+'" style="'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input">';
    }else if(type == 'textgbi'){
        html +='<input type="text" value="'+moren+'" name="'+name+'" style="'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'" autocomplete="off" readonly="readonly" class="layui-input layui-disabled">';
    }else if(type == 'textshow'){
        html +='<div class="layui-form-mid layui-word-aux">'+moren+'</div>';
    }else if(type == 'selectshow'){
        if(typeof(tishi) == 'string') {
            $zhi = eval(tishi);
        }else{
            $zhi = tishi;
        }
        if($zhi && $zhi[moren] ){ 
            html +='<div class="layui-form-mid layui-word-aux">'+$zhi[moren]+'</div>';
        }else{
            html +='<div class="layui-form-mid layui-word-aux">'+moren+'</div>';
        }
    }else if(type == 'time'){
        html +='<div class="layui-form-mid layui-word-aux">'+time(moren)+'</div>';
    }else if(type == 'select'){
       var gg = '<option value=""></option>';
        if(typeof(tishi) == 'string') {
            var szu = eval(tishi);
        }else{
            var szu = tishi;
        }
        if(szu && typeof(szu) != "undefined" && szu != '' ){
            gg = '';
            for(var k in szu){
                if( k == moren){
                    gg+= '<option value="'+k+'" selected="selected">'+szu[k]+'</option>';
                }else{
                    gg+= '<option value="'+k+'">'+szu[k]+'</option>';
                }
            }
        }
        html+='<select name="'+name+'">'+gg+'</select>';
    }else if(type == 'checkbox'){
        if(typeof(tishi) == 'string') {
            var szu = eval(tishi);
        }else{
            var szu = tishi;
        }
        var xuanzhong = {};
        if(moren){
            var hhh =  moren.split(",");
            for( var mm in hhh){
                xuanzhong[hhh[mm]] = hhh[mm];
            }
        }
        if(  typeof(szu) != "undefined" && szu  && szu != '' ){
            for(var k in szu){
                if(xuanzhong[k] ){
                    html+= '<input type="checkbox" checked="checked" name="'+name+'['+k+']" class="'+$class+k+'" value="'+k+'"  style="'+css+'" title="'+szu[k]+'">';
                }else{
                    html+= '<input type="checkbox" name="'+name+'['+k+']" value="'+k+'" class="'+$class+k+'"  style="'+css+'" title="'+szu[k]+'">';
                }
            }
        }
    }else if(type == 'radio'){
        if(typeof(tishi) == 'string') {
            var szu = eval(tishi);
        }else{
            var szu = tishi;
        }
        if(  typeof(szu) != "undefined" && szu  && szu != '' ){
            for(var k in szu){
                if(moren == k ){
                    html+= '<input type="radio"  checked="checked"  name="'+name+'" value="'+k+'" style="'+css+'" title="'+szu[k]+'">';
                }else{
                    html+= '<input type="radio" name="'+name+'" value="'+k+'" style="'+css+'" title="'+szu[k]+'">';
                }
            }
        }

    }else if(type == 'switch'){
        html+= '<input type="checkbox" '+(moren == 1?'checked="checked"':"")+' name="'+name+'" lay-skin="switch"  style="'+css+'" lay-text="'+tishi+'">';
    }else if(type == 'date'){
        html+='<input type="text" value="'+moren+'" id="'+TTTXUANCLASS+'date_'+name+'" name="'+name+'" style="'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input" />';
        setTimeout(function(x,nn){
            var  $type = 'datetime';
            if(nn.indexOf("-") > -1 && nn.indexOf(":") > -1){
                $type = 'datetime';
            }else if(nn.indexOf("-") > -1){
                $type = 'date';
            }else if(nn.indexOf(":") > -1){
                $type = 'time';
            }
            layui.laydate.render({
                 elem: "#"+TTTXUANCLASS+"date_"+x
                ,type: $type
                ,format: nn
            });
            
        },outtime,name,tishi);
    }else if(type == 'moreupdate'){
        html +='<div class="layui-input-inlinex"><div class="layui-upload">';
        html +='<textarea style="display:none;" name="'+name+'" id="'+TTTXUANCLASS+'upv_'+name+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input">'+moren+'</textarea>  <button type="button" class="layui-btn layui-btn-normal" id="'+TTTXUANCLASS+'anList'+name+'">选择多文件</button> ';
        html +='<div class="layui-upload-list"> <table class="layui-table"><thead><tr><th>文件名</th><th>状态</th><th>操作</th></tr></thead><tbody id="'+TTTXUANCLASS+'nrList'+name+'">';
        var TTT = 0;
        if(moren && moren != "" && moren != "null" && moren != null){
            var dage = moren.split(',');
            TTT = dage.length;
            for(var xx in dage){
                if(dage[xx] ==""){
                    continue ;
                }
                html+= ['<tr id="'+TTTXUANCLASS+'upload-'+name+'_'+ xx +'">'
                    ,'<td>'+ dage[xx] +'</td>'
                
                    ,'<td><span style="color: #5FB878;">上传成功</span></td>'
                    ,'<td>'
                        ,'<button class="layui-btn layui-btn-xs demo-reload layui-hide">重传</button>'
                        ,'<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete" data="'+TTTXUANCLASS+'upload-'+name+'_'+ xx +'" urlx="'+dage[xx]+'" >删除</button>'
                    ,'</td>'
                    ,'</tr>'].join('');
            }
        }
        html +='</tbody> </table></div><button type="button" class="layui-btn" id="'+TTTXUANCLASS+'tjList'+name+'">开始上传</button>';
        html +='</div> </div>';
        setTimeout(function(name,css,TTT){
        //多文件列表示例
            $('#'+TTTXUANCLASS+'nrList'+name+" tr .demo-delete") .on('click', function(){
                var urlx =  $(this).attr("urlx");
                if( typeof(urlx) != "undefined" && urlx  !="" ){

                    var neirong = $("#"+TTTXUANCLASS+"upv_"+name).html();
                    neirong = neirong.replace(urlx+',',"");
                    neirong = neirong.replace(urlx,"");
                    $("#"+TTTXUANCLASS+"upv_"+name).html(neirong);
                    $("#"+$(this).attr("data")).remove();
                    
                }
            });
            var demoListView = $('#'+TTTXUANCLASS+'nrList'+name)
            ,uploadListIns = layui.upload.render({
                elem: '#'+TTTXUANCLASS+'anList'+name
                ,url: uploadurl() //上传接口
                ,field:"all"
                ,multiple: true
                ,auto: false
                ,bindAction: '#'+TTTXUANCLASS+'tjList'+name
                ,choose: function(obj){   
                var files = this.files = obj.pushFile();
                obj.preview(function(index, file, result){
                    var tr = $(['<tr id="'+TTTXUANCLASS+'upload-'+name+'_'+ index +'">'
                    ,'<td>'+ file.name +'</td>'
                
                    ,'<td>等待上传</td>'
                    ,'<td>'
                        ,'<button class="layui-btn layui-btn-xs demo-reload layui-hide">重传</button>'
                        ,'<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete">删除</button>'
                    ,'</td>'
                    ,'</tr>'].join(''));

                    if(BASEUP){
                        files[index] = new File([result], file.name);
                    }
                    tr.find('.demo-reload').on('click', function(){
                        obj.upload(index, file);
                    });
                    tr.find('.demo-delete').on('click', function(){
                        delete files[index];
                        var urlx =  $(this).attr("urlx");
                        if( typeof(urlx) != "undefined" && urlx  !="" ){
                            var neirong = $("#"+TTTXUANCLASS+"upv_"+name).html();
                            neirong = neirong.replace(urlx+',',"");
                            neirong = neirong.replace(urlx,"");
                            $("#"+TTTXUANCLASS+"upv_"+name).html(neirong);
                        }
                        tr.remove();
                        uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                    });
                    
                    demoListView.append(tr);
                });
                }
                ,done: function(res, index, upload){
                    if(res.code == 1){ //上传成功
                        var shngge = $("#"+TTTXUANCLASS+"upv_"+name).html();
                        $("#"+TTTXUANCLASS+"upv_"+name).html(shngge+res.data+',');
                        var tr = demoListView.find('tr#'+TTTXUANCLASS+'upload-'+name+'_'+ index)
                        ,tds = tr.children();
                        tr.find('.demo-delete').attr({urlx:res.data});
                        tds.eq(1).html('<span style="color: #5FB878;">上传成功</span>');
                        return delete this.files[index];
                    }
                    this.error(index, upload);
                }
                ,error: function(index, upload){
                    var tr = demoListView.find('tr#'+TTTXUANCLASS+'upload-'+name+'_'+ index)
                    ,tds = tr.children();
                    tds.eq(1).html('<span style="color: #FF5722;">上传失败</span>');
                    tds.eq(2).find('.demo-reload').removeClass('layui-hide');
                }
            });

        },outtime,name,css,TTT);

    }else if(type == 'moreupdateshow'){

            html +='<div class="layui-input-inline"><textarea style="display:none;" name="'+name+'" id="'+TTTXUANCLASS+'upv_'+name+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input">'+moren+'</textarea> <button type="button" style="padding: 0 6px;" class="layui-btn" id="'+TTTXUANCLASS+'upk_'+name+'"><i class="layui-icon layui-icon-upload-drag"></i></button></div><div class="layui-clear"></div>';
            html +='<div class="layui-upload-list" id="'+TTTXUANCLASS+'ups_'+name+'">'
            var TTT = 0;
            if(moren && moren != "" && moren != null && moren != "null"){
                var dage = moren.split(',');
                TTT = dage.length;
                for(var xx in dage){
                    if(dage[xx] && dage[xx] !="" && dage[xx] !="/" && dage[xx] !="//"){
                        html +='<img src="'+pichttp(dage[xx])+'" style="'+css+'" alt="'+name+xx+'" class="layui-upload-img tupian">';
                    }
                }
            }
            html +='</div>';
            setTimeout(function(name,css,TTT){
                var  jishu =TTT;
                layui.upload.render({
                    elem: '#'+TTTXUANCLASS+'upk_'+name //绑定元素
                    ,field:"image"
                    ,accept: 'images' //允许上传的文件类型
                    ,url:uploadurl('uplx=image') //上传接口
                    ,multiple: true
                    ,auto: !BASEUP 
                    ,choose:function(obj){
                        if(BASEUP){
                            obj.preview(function(index, file, result){
                                file = new File([result], file.name);
                                obj.upload(index, file);
                            });
                        }
                    }
                    ,done: function(res){
                        if(res.code == 1){
                            jishu++;
                            var  zuclass = "upv_"+name+"_"+jishu;
                            var shngge = $("#"+TTTXUANCLASS+"upv_"+name).html();
                            $("#"+TTTXUANCLASS+"upv_"+name).html(shngge+res.data+',');
                            $('#'+TTTXUANCLASS+'ups_'+name).append('<img src="'+ pichttp(res.data) +'" style="'+css+'" alt="'+name+jishu+'" class="layui-upload-img '+zuclass+'">');
                            $('#'+TTTXUANCLASS+'ups_'+name+' img.'+zuclass).dblclick(function(){
                                var src = $(this).attr('src');
                                src = src.replace(CDNHOST,"");
                                src = src.replace(WZHOST,"");
                                var neirong = $("#"+TTTXUANCLASS+"upv_"+name).html();
                                neirong = neirong.replace(src+',',"");
                                neirong = neirong.replace(src,"");
                                
                                $("#"+TTTXUANCLASS+"upv_"+name).html(neirong);
                                $(this).remove();
                                if($('#'+TTTXUANCLASS+'ups_'+name+' img').length < 1){
                                    $("#"+TTTXUANCLASS+"upv_"+name).html("");
                                }
                            });

                        }else{
                             layer.msg(res.msg,{offset: 'c'});
                        }
                    }
                });
                $('#'+TTTXUANCLASS+'ups_'+name+' img').dblclick(function(){
                    var src = $(this).attr('src');
                    src = src.replace(CDNHOST,"");
                    src = src.replace(WZHOST,"");
                    
                    var neirong = $("#"+TTTXUANCLASS+"upv_"+name).html();
                    neirong = neirong.replace(src+',',"");
                    neirong = neirong.replace(src,"");
                   ;
                    $("#"+TTTXUANCLASS+"upv_"+name).html(neirong);
                    $(this).remove();
                    if($('#'+TTTXUANCLASS+'ups_'+name+' img').length < 1){
                        $("#"+TTTXUANCLASS+"upv_"+name).html("");
                    }
                    
                });
            },outtime,name,css,TTT);

    }else if(type == 'updateshow'){

        html +='<div class="layui-input-inline" style="'+(tishi=='show'?'width:80%;':'')+'"><input type="'+(tishi=='show'?'text':'hidden')+'" value="'+moren+'" name="'+name+'" id="'+TTTXUANCLASS+'upv_'+name+'" style="float:left;width:80%;margin-right:5px;'+css+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input"> <button type="button" style="padding: 0 6px;" class="layui-btn" id="'+TTTXUANCLASS+'upk_'+name+'"><i class="layui-icon layui-icon-upload-drag"></i></button></div><div class="layui-clear"></div>';
        html +='<div class="layui-upload-list fujiguanxi'+name+'"> <img class="layui-upload-img" style="'+css+'" src="'+pichttp(moren)+'" id="'+TTTXUANCLASS+'upshou_'+name+'"> </div>';
        setTimeout(function(name,css){
            layui.upload.render({
                elem: '#'+TTTXUANCLASS+'upk_'+name //绑定元素
                ,field:"image"
                ,accept: 'images' //允许上传的文件类型
                ,url: uploadurl('uplx=image') //上传接口
                ,auto: !BASEUP 
                ,choose:function(obj){
                    if(BASEUP){
                        obj.preview(function(index, file, result){
                            file = new File([result], file.name);
                            obj.upload(index, file);
                        });
                    }
                }
                ,done: function(res){
                    if(res.code == 1){
                        $("#"+TTTXUANCLASS+"upv_"+name).val(res.data);
                        $("#"+TTTXUANCLASS+"upshou_"+name).attr({"src":pichttp(res.data) });
                        layer.msg(res.msg,{offset: 'c',time: 1500});
                    }else{
                        layer.msg(res.msg,{offset: 'c'});
                    }
                }
            });
            var hhht = function(){
    
                $(this).parents('.fujiguanxi'+name).append('<img class="layui-upload-img" style="'+css+'"  id="'+TTTXUANCLASS+'upshou_'+name+'"> </div>');
                $(this).remove();
                $("#"+TTTXUANCLASS+"upv_"+name).val('');
                $('#'+TTTXUANCLASS+'upshou_'+name).dblclick(hhht);
            };
            $('#'+TTTXUANCLASS+'upshou_'+name).dblclick(hhht);
        },outtime,name,css);

    }else if(type == 'update'){

        html +='<div class="layui-input-inline"><input type="text" value="'+moren+'" name="'+name+'" id="'+TTTXUANCLASS+'upv_'+name+'" style="float:left;width:80%;margin-right:5px;display: inline-block;'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input"> <button type="button" style="float:left;padding: 0 6px;" class="layui-btn" id="'+TTTXUANCLASS+'upk_'+name+'"><i class="layui-icon layui-icon-upload-drag"></i></button> </div><div class="layui-clear"></div>';
        setTimeout(function(name){
            layui.upload.render({
                elem: '#'+TTTXUANCLASS+'upk_'+name //绑定元素
                ,field:"all"
                ,accept: 'file' //允许上传的文件类型
                ,url: uploadurl() //上传接口
                ,auto: !BASEUP 
                ,choose:function(obj){
                    if(BASEUP){
                        obj.preview(function(index, file, result){
                            file = new File([result], file.name);
                            obj.upload(index, file);
                        });
                    }
                }
                ,done: function(res){
                    if(res.code == 1){
                        $('#'+TTTXUANCLASS+'upv_'+name).val(res.data);
                        layer.msg(res.msg,{offset: 'c',time: 1500});
                    }else{
                        layer.msg(res.msg,{offset: 'c'});
                    }
                }
            });
        },outtime,name);
    }else if(type == 'ui'){
        var xxxname = hex_md5(name);
        html+='<textarea name="'+name+'"  id="'+TTTXUANCLASS+'ui_'+xxxname+'" style="'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'"  class="layui-textarea" style="display: none;">'+moren+'</textarea>';
        var gaodu = 200;
        if(css.indexOf('height') >-1){
            let x = css.split(":");
            x = x[1].split("px");
            gaodu = x[0]*1;
        }
        setTimeout(function(name,css,xxxname){
            if($('[textarea="'+TTTXUANCLASS+'ui_'+xxxname+'"]').length < 1){
                var  index = layui.layedit.build(TTTXUANCLASS+'ui_'+xxxname, 
                    {height:gaodu,
                    uploadImage:{url: uploadurl('uplx=image'),field:"image" } ,
                    uploadFile:{url: uploadurl('uplx=all'),field:"all" }
                });
                UIMUI[TTTXUANCLASS+'ui_'+xxxname]= index;
            }

        },outtime,name,css,xxxname);
    }else if(type == 'textarea'){
        html+='<textarea name="'+name+'" style="'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'"  class="layui-textarea">'+moren+'</textarea>';
    }else if(type == 'submit'){
        if(moren == ''){
            if(verify == 'nojs'){
                html +='<button type="button" class="layui-btn layui-btn-danger" onclick="'+tishi+'">返回</button>';
            }else{
                html +='<button type="button" class="layui-btn layui-btn-danger" onclick="layer.close(OPID);return false;">返回</button>';
            }
        }else{
            if(verify == 'nojs'){
                html +='<button class="layui-btn" type="submit" lay-submit name="'+name+'" style="'+css+'" lay-filter="'+name+'" >'+moren+'</button>';
                html +='<button type="button" class="layui-btn layui-btn-danger" onclick="'+tishi+'">返回</button>';
            }else{
                html +='<button class="layui-btn" type="submit" lay-submit name="'+name+'" style="'+css+'" lay-filter="'+name+'" >'+moren+'</button>';
                html +='<button  type="button"  class="layui-btn layui-btn-primary  layui-btn-small" onclick="layer.close(OPID);return false;">返回</button>';
            }
        }
    }else if(type == 'textqunji'){
        if(typeof(moren) == 'string') {
            $zhi = moren.split(',');
        }else{
            $zhi = moren;
        }
        var  candan = tishi.split(',');
        html +='<table class="layui-table"><thead><tr>';
        for(var xbb in candan){
            html +='<th>'+candan[xbb]+'</th>';
        }
        html +='<th>操作</th></tr></thead><tbody  class="textqunji_list_'+name+'">';
        html += textcaidan(name,$zhi,candan,css,outtime);
        html +='</tbody></table>';
        html +='<table class="layui-table"><tbody><tr class="endhh"><td colspan="'+(candan.length+1)+'" > <button onclick="xinzengtext($(this))"; type="button" data="'+tishi+'" name="'+name+'" css="'+css+'" style="margin: 0 auto;display: block;" class="layui-btn" >'+verify+'</button> </td></tr>';
        html +='</tbody></table>';
    }else if(type == 'caidan'){

        if(typeof(moren) == 'string') {
            $zhi = moren.split(',');
        }else{
            $zhi = moren;
        }
        if($zhi){
           for(var i in $zhi){
               var  zx= "<a style=\\'color:#fff;cursor:pointer;\\' class=\\'caidan_ashanchu\\' data=\\'"+TTTXUANCLASS+"caidan_"+name+'X'+i+"\\'>点击我删除</a>";
               html +='<div class="layui-input-inline hhhdada" id="'+TTTXUANCLASS+'caidan_'+name+'X'+i+'" onclick="layer.tips(\''+zx+'\', \'#'+TTTXUANCLASS+'caidan_'+name+'X'+i+'\',{ zIndex:999999,time:2000,tips: 3})" style="margin-bottom:10px;" ><textarea type="text" name="'+name+'[]"  placeholder="'+tishi+'" autocomplete="off" class="layui-input">'+$zhi[i]+'</textarea></div>';
           }
           setTimeout(function(name){
               $("#"+TTTXUANCLASS+"idx_"+name+" .hhhdada").click(function(){
                       $(".caidan_ashanchu").click(function(){
                           iid = $(this).attr('data');
                           $("#"+iid).remove();
                           layer.close(layer.index);
                       });
               });
           },outtime,name);
       }
       html +='<div class="layui-input-inline zengjian" style="margin-bottom:10px;" ><a href="javascript:ncaidan(\''+name+'\')" class="layui-btn">增加菜单</a></div>';

    }else  if( type =="expansion" ){
        
        if(typeof(tishi) == 'string') {
            var   yuliuzhi = tishi.split(',');
        }else{
            var  yuliuzhi = tishi;
        }
        if(typeof(moren) == 'string') {
            $zhi = moren.split('(_$$_)');
        }else{
            $zhi = moren;
        }
        for( var mx in yuliuzhi){
            var  xx = yuliuzhi[mx].split('-');
            html += jsfrom([
                name+'_'+xx['0'],
                xx['0'],
                xx['1'],
                xx['2']?   xx['2'].replace(/\@/g,",").replace(/\$/g,"-")   :"",
                xx['3']?   xx['3'].replace(/\@/g,",").replace(/\$/g,"-")   :"",
                $zhi[mx],
                xx['4']?  xx['4']:""
              
            ]);
        }

    }else{
        html +='<input type="'+type+'" value="'+moren+'" name="'+name+'" style="'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input">';
    }

    html +='</div></div>';
    return html;
}

$(function(){
   
    loadjs('mian');
});
window.onbeforeunload = function(event) {
    
};
</script>