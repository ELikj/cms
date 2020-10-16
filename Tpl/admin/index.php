<?php if( !defined( 'ELikj')){
    exit( 'Error ELikj'); 
}
$GLOBALS['head'] = "html";
/*
window.ATEST = ["第 1 个属性","第 2 个属性","第 3 个属性","第 4 个属性","第 5 个属性"];
window.UIMUI = Array();
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
  <title>管理后台</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <style>
 /** layui-v2.5.6 MIT License By https://www.layui.com */
 .layui-inline,img{display:inline-block;vertical-align:middle}h1,h2,h3,h4,h5,h6{font-weight:400}.layui-edge,.layui-header,.layui-inline,.layui-main{position:relative}.layui-body,.layui-edge,.layui-elip{overflow:hidden}.layui-btn,.layui-edge,.layui-inline,img{vertical-align:middle}.layui-btn,.layui-disabled,.layui-icon,.layui-unselect{-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none}.layui-elip,.layui-form-checkbox span,.layui-form-pane .layui-form-label{text-overflow:ellipsis;white-space:nowrap}.layui-breadcrumb,.layui-tree-btnGroup{visibility:hidden}blockquote,body,button,dd,div,dl,dt,form,h1,h2,h3,h4,h5,h6,input,li,ol,p,pre,td,textarea,th,ul{margin:0;padding:0;-webkit-tap-highlight-color:rgba(0,0,0,0)}a:active,a:hover{outline:0}img{border:none}li{list-style:none}table{border-collapse:collapse;border-spacing:0}h4,h5,h6{font-size:100%}button,input,optgroup,option,select,textarea{font-family:inherit;font-size:inherit;font-style:inherit;font-weight:inherit;outline:0}pre{white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word}body{line-height:24px;font:14px Helvetica Neue,Helvetica,PingFang SC,Tahoma,Arial,sans-serif}hr{height:1px;margin:10px 0;border:0;clear:both}a{color:#333;text-decoration:none}a:hover{color:#777}a cite{font-style:normal;*cursor:pointer}.layui-border-box,.layui-border-box *{box-sizing:border-box}.layui-box,.layui-box *{box-sizing:content-box}.layui-clear{clear:both;*zoom:1}.layui-clear:after{content:'\20';clear:both;*zoom:1;display:block;height:0}.layui-inline{*display:inline;*zoom:1}.layui-edge{display:inline-block;width:0;height:0;border-width:6px;border-style:dashed;border-color:transparent}.layui-edge-top{top:-4px;border-bottom-color:#999;border-bottom-style:solid}.layui-edge-right{border-left-color:#999;border-left-style:solid}.layui-edge-bottom{top:2px;border-top-color:#999;border-top-style:solid}.layui-edge-left{border-right-color:#999;border-right-style:solid}.layui-disabled,.layui-disabled:hover{color:#d2d2d2!important;cursor:not-allowed!important}.layui-circle{border-radius:100%}.layui-show{display:block!important}.layui-hide{display:none!important}@font-face{font-family:layui-icon;src:url(<?php echo WZHOST;?>Tpl/layui/font/iconfont.eot?v=256);src:url(<?php echo WZHOST;?>Tpl/layui/font/iconfont.eot?v=256#iefix) format('embedded-opentype'),url(<?php echo WZHOST;?>Tpl/layui/font/iconfont.woff2?v=256) format('woff2'),url(<?php echo WZHOST;?>Tpl/layui/font/iconfont.woff?v=256) format('woff'),url(<?php echo WZHOST;?>Tpl/layui/font/iconfont.ttf?v=256) format('truetype'),url(<?php echo WZHOST;?>Tpl/layui/font/iconfont.svg?v=256#layui-icon) format('svg')}.layui-icon{font-family:layui-icon!important;font-size:16px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.layui-icon-reply-fill:before{content:"\e611"}.layui-icon-set-fill:before{content:"\e614"}.layui-icon-menu-fill:before{content:"\e60f"}.layui-icon-search:before{content:"\e615"}.layui-icon-share:before{content:"\e641"}.layui-icon-set-sm:before{content:"\e620"}.layui-icon-engine:before{content:"\e628"}.layui-icon-close:before{content:"\1006"}.layui-icon-close-fill:before{content:"\1007"}.layui-icon-chart-screen:before{content:"\e629"}.layui-icon-star:before{content:"\e600"}.layui-icon-circle-dot:before{content:"\e617"}.layui-icon-chat:before{content:"\e606"}.layui-icon-release:before{content:"\e609"}.layui-icon-list:before{content:"\e60a"}.layui-icon-chart:before{content:"\e62c"}.layui-icon-ok-circle:before{content:"\1005"}.layui-icon-layim-theme:before{content:"\e61b"}.layui-icon-table:before{content:"\e62d"}.layui-icon-right:before{content:"\e602"}.layui-icon-left:before{content:"\e603"}.layui-icon-cart-simple:before{content:"\e698"}.layui-icon-face-cry:before{content:"\e69c"}.layui-icon-face-smile:before{content:"\e6af"}.layui-icon-survey:before{content:"\e6b2"}.layui-icon-tree:before{content:"\e62e"}.layui-icon-ie:before{content:"\e7bb"}.layui-icon-upload-circle:before{content:"\e62f"}.layui-icon-add-circle:before{content:"\e61f"}.layui-icon-download-circle:before{content:"\e601"}.layui-icon-templeate-1:before{content:"\e630"}.layui-icon-util:before{content:"\e631"}.layui-icon-face-surprised:before{content:"\e664"}.layui-icon-edit:before{content:"\e642"}.layui-icon-speaker:before{content:"\e645"}.layui-icon-down:before{content:"\e61a"}.layui-icon-file:before{content:"\e621"}.layui-icon-layouts:before{content:"\e632"}.layui-icon-rate-half:before{content:"\e6c9"}.layui-icon-add-circle-fine:before{content:"\e608"}.layui-icon-prev-circle:before{content:"\e633"}.layui-icon-read:before{content:"\e705"}.layui-icon-404:before{content:"\e61c"}.layui-icon-carousel:before{content:"\e634"}.layui-icon-help:before{content:"\e607"}.layui-icon-code-circle:before{content:"\e635"}.layui-icon-windows:before{content:"\e67f"}.layui-icon-water:before{content:"\e636"}.layui-icon-username:before{content:"\e66f"}.layui-icon-find-fill:before{content:"\e670"}.layui-icon-about:before{content:"\e60b"}.layui-icon-location:before{content:"\e715"}.layui-icon-up:before{content:"\e619"}.layui-icon-pause:before{content:"\e651"}.layui-icon-date:before{content:"\e637"}.layui-icon-layim-uploadfile:before{content:"\e61d"}.layui-icon-delete:before{content:"\e640"}.layui-icon-play:before{content:"\e652"}.layui-icon-top:before{content:"\e604"}.layui-icon-firefox:before{content:"\e686"}.layui-icon-friends:before{content:"\e612"}.layui-icon-refresh-3:before{content:"\e9aa"}.layui-icon-ok:before{content:"\e605"}.layui-icon-layer:before{content:"\e638"}.layui-icon-face-smile-fine:before{content:"\e60c"}.layui-icon-dollar:before{content:"\e659"}.layui-icon-group:before{content:"\e613"}.layui-icon-layim-download:before{content:"\e61e"}.layui-icon-picture-fine:before{content:"\e60d"}.layui-icon-link:before{content:"\e64c"}.layui-icon-diamond:before{content:"\e735"}.layui-icon-log:before{content:"\e60e"}.layui-icon-key:before{content:"\e683"}.layui-icon-rate-solid:before{content:"\e67a"}.layui-icon-fonts-del:before{content:"\e64f"}.layui-icon-unlink:before{content:"\e64d"}.layui-icon-fonts-clear:before{content:"\e639"}.layui-icon-triangle-r:before{content:"\e623"}.layui-icon-circle:before{content:"\e63f"}.layui-icon-radio:before{content:"\e643"}.layui-icon-align-center:before{content:"\e647"}.layui-icon-align-right:before{content:"\e648"}.layui-icon-align-left:before{content:"\e649"}.layui-icon-loading-1:before{content:"\e63e"}.layui-icon-return:before{content:"\e65c"}.layui-icon-fonts-strong:before{content:"\e62b"}.layui-icon-upload:before{content:"\e67c"}.layui-icon-dialogue:before{content:"\e63a"}.layui-icon-video:before{content:"\e6ed"}.layui-icon-headset:before{content:"\e6fc"}.layui-icon-cellphone-fine:before{content:"\e63b"}.layui-icon-add-1:before{content:"\e654"}.layui-icon-face-smile-b:before{content:"\e650"}.layui-icon-fonts-html:before{content:"\e64b"}.layui-icon-screen-full:before{content:"\e622"}.layui-icon-form:before{content:"\e63c"}.layui-icon-cart:before{content:"\e657"}.layui-icon-camera-fill:before{content:"\e65d"}.layui-icon-tabs:before{content:"\e62a"}.layui-icon-heart-fill:before{content:"\e68f"}.layui-icon-fonts-code:before{content:"\e64e"}.layui-icon-ios:before{content:"\e680"}.layui-icon-at:before{content:"\e687"}.layui-icon-fire:before{content:"\e756"}.layui-icon-set:before{content:"\e716"}.layui-icon-fonts-u:before{content:"\e646"}.layui-icon-triangle-d:before{content:"\e625"}.layui-icon-tips:before{content:"\e702"}.layui-icon-picture:before{content:"\e64a"}.layui-icon-more-vertical:before{content:"\e671"}.layui-icon-bluetooth:before{content:"\e689"}.layui-icon-flag:before{content:"\e66c"}.layui-icon-loading:before{content:"\e63d"}.layui-icon-fonts-i:before{content:"\e644"}.layui-icon-refresh-1:before{content:"\e666"}.layui-icon-rmb:before{content:"\e65e"}.layui-icon-addition:before{content:"\e624"}.layui-icon-home:before{content:"\e68e"}.layui-icon-time:before{content:"\e68d"}.layui-icon-user:before{content:"\e770"}.layui-icon-notice:before{content:"\e667"}.layui-icon-chrome:before{content:"\e68a"}.layui-icon-edge:before{content:"\e68b"}.layui-icon-login-weibo:before{content:"\e675"}.layui-icon-voice:before{content:"\e688"}.layui-icon-upload-drag:before{content:"\e681"}.layui-icon-login-qq:before{content:"\e676"}.layui-icon-snowflake:before{content:"\e6b1"}.layui-icon-heart:before{content:"\e68c"}.layui-icon-logout:before{content:"\e682"}.layui-icon-file-b:before{content:"\e655"}.layui-icon-template:before{content:"\e663"}.layui-icon-transfer:before{content:"\e691"}.layui-icon-auz:before{content:"\e672"}.layui-icon-console:before{content:"\e665"}.layui-icon-app:before{content:"\e653"}.layui-icon-prev:before{content:"\e65a"}.layui-icon-website:before{content:"\e7ae"}.layui-icon-next:before{content:"\e65b"}.layui-icon-component:before{content:"\e857"}.layui-icon-android:before{content:"\e684"}.layui-icon-more:before{content:"\e65f"}.layui-icon-login-wechat:before{content:"\e677"}.layui-icon-shrink-right:before{content:"\e668"}.layui-icon-spread-left:before{content:"\e66b"}.layui-icon-camera:before{content:"\e660"}.layui-icon-note:before{content:"\e66e"}.layui-icon-refresh:before{content:"\e669"}.layui-icon-female:before{content:"\e661"}.layui-icon-male:before{content:"\e662"}.layui-icon-screen-restore:before{content:"\e758"}.layui-icon-password:before{content:"\e673"}.layui-icon-senior:before{content:"\e674"}.layui-icon-theme:before{content:"\e66a"}.layui-icon-tread:before{content:"\e6c5"}.layui-icon-praise:before{content:"\e6c6"}.layui-icon-star-fill:before{content:"\e658"}.layui-icon-rate:before{content:"\e67b"}.layui-icon-template-1:before{content:"\e656"}.layui-icon-vercode:before{content:"\e679"}.layui-icon-service:before{content:"\e626"}.layui-icon-cellphone:before{content:"\e678"}.layui-icon-print:before{content:"\e66d"}.layui-icon-cols:before{content:"\e610"}.layui-icon-wifi:before{content:"\e7e0"}.layui-icon-export:before{content:"\e67d"}.layui-icon-rss:before{content:"\e808"}.layui-icon-slider:before{content:"\e714"}.layui-icon-email:before{content:"\e618"}.layui-icon-subtraction:before{content:"\e67e"}.layui-icon-mike:before{content:"\e6dc"}.layui-icon-light:before{content:"\e748"}.layui-icon-gift:before{content:"\e627"}.layui-icon-mute:before{content:"\e685"}.layui-icon-reduce-circle:before{content:"\e616"}.layui-icon-music:before{content:"\e690"}.layui-main{width:1140px;margin:0 auto}.layui-header{z-index:1000;height:60px}.layui-header a:hover{transition:all .5s;-webkit-transition:all .5s}.layui-side{position:fixed;left:0;top:0;bottom:0;z-index:999;width:200px;overflow-x:hidden}.layui-side-scroll{position:relative;width:220px;height:100%;overflow-x:hidden}.layui-body{position:absolute;left:200px;right:0;top:0;bottom:0;z-index:998;width:auto;overflow-y:auto;box-sizing:border-box}.layui-layout-body{overflow:hidden}.layui-layout-admin .layui-header{background-color:#23262E}.layui-layout-admin .layui-side{top:60px;width:200px;overflow-x:hidden}.layui-layout-admin .layui-body{position:fixed;top:60px;bottom:44px}.layui-layout-admin .layui-main{width:auto;margin:0 15px}.layui-layout-admin .layui-footer{position:fixed;left:200px;right:0;bottom:0;height:44px;line-height:44px;padding:0 15px;background-color:#eee}.layui-layout-admin .layui-logo{position:absolute;left:0;top:0;width:200px;height:100%;line-height:60px;text-align:center;color:#009688;font-size:16px}.layui-layout-admin .layui-header .layui-nav{background:0 0}.layui-layout-left{position:absolute!important;left:200px;top:0}.layui-layout-right{position:absolute!important;right:0;top:0}.layui-container{position:relative;margin:0 auto;padding:0 15px;box-sizing:border-box}.layui-fluid{position:relative;margin:0 auto;padding:0 15px}.layui-row:after,.layui-row:before{content:'';display:block;clear:both}.layui-col-lg1,.layui-col-lg10,.layui-col-lg11,.layui-col-lg12,.layui-col-lg2,.layui-col-lg3,.layui-col-lg4,.layui-col-lg5,.layui-col-lg6,.layui-col-lg7,.layui-col-lg8,.layui-col-lg9,.layui-col-md1,.layui-col-md10,.layui-col-md11,.layui-col-md12,.layui-col-md2,.layui-col-md3,.layui-col-md4,.layui-col-md5,.layui-col-md6,.layui-col-md7,.layui-col-md8,.layui-col-md9,.layui-col-sm1,.layui-col-sm10,.layui-col-sm11,.layui-col-sm12,.layui-col-sm2,.layui-col-sm3,.layui-col-sm4,.layui-col-sm5,.layui-col-sm6,.layui-col-sm7,.layui-col-sm8,.layui-col-sm9,.layui-col-xs1,.layui-col-xs10,.layui-col-xs11,.layui-col-xs12,.layui-col-xs2,.layui-col-xs3,.layui-col-xs4,.layui-col-xs5,.layui-col-xs6,.layui-col-xs7,.layui-col-xs8,.layui-col-xs9{position:relative;display:block;box-sizing:border-box}.layui-col-xs1,.layui-col-xs10,.layui-col-xs11,.layui-col-xs12,.layui-col-xs2,.layui-col-xs3,.layui-col-xs4,.layui-col-xs5,.layui-col-xs6,.layui-col-xs7,.layui-col-xs8,.layui-col-xs9{float:left}.layui-col-xs1{width:8.33333333%}.layui-col-xs2{width:16.66666667%}.layui-col-xs3{width:25%}.layui-col-xs4{width:33.33333333%}.layui-col-xs5{width:41.66666667%}.layui-col-xs6{width:50%}.layui-col-xs7{width:58.33333333%}.layui-col-xs8{width:66.66666667%}.layui-col-xs9{width:75%}.layui-col-xs10{width:83.33333333%}.layui-col-xs11{width:91.66666667%}.layui-col-xs12{width:100%}.layui-col-xs-offset1{margin-left:8.33333333%}.layui-col-xs-offset2{margin-left:16.66666667%}.layui-col-xs-offset3{margin-left:25%}.layui-col-xs-offset4{margin-left:33.33333333%}.layui-col-xs-offset5{margin-left:41.66666667%}.layui-col-xs-offset6{margin-left:50%}.layui-col-xs-offset7{margin-left:58.33333333%}.layui-col-xs-offset8{margin-left:66.66666667%}.layui-col-xs-offset9{margin-left:75%}.layui-col-xs-offset10{margin-left:83.33333333%}.layui-col-xs-offset11{margin-left:91.66666667%}.layui-col-xs-offset12{margin-left:100%}@media screen and (max-width:768px){.layui-hide-xs{display:none!important}.layui-show-xs-block{display:block!important}.layui-show-xs-inline{display:inline!important}.layui-show-xs-inline-block{display:inline-block!important}}@media screen and (min-width:768px){.layui-container{width:750px}.layui-hide-sm{display:none!important}.layui-show-sm-block{display:block!important}.layui-show-sm-inline{display:inline!important}.layui-show-sm-inline-block{display:inline-block!important}.layui-col-sm1,.layui-col-sm10,.layui-col-sm11,.layui-col-sm12,.layui-col-sm2,.layui-col-sm3,.layui-col-sm4,.layui-col-sm5,.layui-col-sm6,.layui-col-sm7,.layui-col-sm8,.layui-col-sm9{float:left}.layui-col-sm1{width:8.33333333%}.layui-col-sm2{width:16.66666667%}.layui-col-sm3{width:25%}.layui-col-sm4{width:33.33333333%}.layui-col-sm5{width:41.66666667%}.layui-col-sm6{width:50%}.layui-col-sm7{width:58.33333333%}.layui-col-sm8{width:66.66666667%}.layui-col-sm9{width:75%}.layui-col-sm10{width:83.33333333%}.layui-col-sm11{width:91.66666667%}.layui-col-sm12{width:100%}.layui-col-sm-offset1{margin-left:8.33333333%}.layui-col-sm-offset2{margin-left:16.66666667%}.layui-col-sm-offset3{margin-left:25%}.layui-col-sm-offset4{margin-left:33.33333333%}.layui-col-sm-offset5{margin-left:41.66666667%}.layui-col-sm-offset6{margin-left:50%}.layui-col-sm-offset7{margin-left:58.33333333%}.layui-col-sm-offset8{margin-left:66.66666667%}.layui-col-sm-offset9{margin-left:75%}.layui-col-sm-offset10{margin-left:83.33333333%}.layui-col-sm-offset11{margin-left:91.66666667%}.layui-col-sm-offset12{margin-left:100%}}@media screen and (min-width:992px){.layui-container{width:970px}.layui-hide-md{display:none!important}.layui-show-md-block{display:block!important}.layui-show-md-inline{display:inline!important}.layui-show-md-inline-block{display:inline-block!important}.layui-col-md1,.layui-col-md10,.layui-col-md11,.layui-col-md12,.layui-col-md2,.layui-col-md3,.layui-col-md4,.layui-col-md5,.layui-col-md6,.layui-col-md7,.layui-col-md8,.layui-col-md9{float:left}.layui-col-md1{width:8.33333333%}.layui-col-md2{width:16.66666667%}.layui-col-md3{width:25%}.layui-col-md4{width:33.33333333%}.layui-col-md5{width:41.66666667%}.layui-col-md6{width:50%}.layui-col-md7{width:58.33333333%}.layui-col-md8{width:66.66666667%}.layui-col-md9{width:75%}.layui-col-md10{width:83.33333333%}.layui-col-md11{width:91.66666667%}.layui-col-md12{width:100%}.layui-col-md-offset1{margin-left:8.33333333%}.layui-col-md-offset2{margin-left:16.66666667%}.layui-col-md-offset3{margin-left:25%}.layui-col-md-offset4{margin-left:33.33333333%}.layui-col-md-offset5{margin-left:41.66666667%}.layui-col-md-offset6{margin-left:50%}.layui-col-md-offset7{margin-left:58.33333333%}.layui-col-md-offset8{margin-left:66.66666667%}.layui-col-md-offset9{margin-left:75%}.layui-col-md-offset10{margin-left:83.33333333%}.layui-col-md-offset11{margin-left:91.66666667%}.layui-col-md-offset12{margin-left:100%}}@media screen and (min-width:1200px){.layui-container{width:1170px}.layui-hide-lg{display:none!important}.layui-show-lg-block{display:block!important}.layui-show-lg-inline{display:inline!important}.layui-show-lg-inline-block{display:inline-block!important}.layui-col-lg1,.layui-col-lg10,.layui-col-lg11,.layui-col-lg12,.layui-col-lg2,.layui-col-lg3,.layui-col-lg4,.layui-col-lg5,.layui-col-lg6,.layui-col-lg7,.layui-col-lg8,.layui-col-lg9{float:left}.layui-col-lg1{width:8.33333333%}.layui-col-lg2{width:16.66666667%}.layui-col-lg3{width:25%}.layui-col-lg4{width:33.33333333%}.layui-col-lg5{width:41.66666667%}.layui-col-lg6{width:50%}.layui-col-lg7{width:58.33333333%}.layui-col-lg8{width:66.66666667%}.layui-col-lg9{width:75%}.layui-col-lg10{width:83.33333333%}.layui-col-lg11{width:91.66666667%}.layui-col-lg12{width:100%}.layui-col-lg-offset1{margin-left:8.33333333%}.layui-col-lg-offset2{margin-left:16.66666667%}.layui-col-lg-offset3{margin-left:25%}.layui-col-lg-offset4{margin-left:33.33333333%}.layui-col-lg-offset5{margin-left:41.66666667%}.layui-col-lg-offset6{margin-left:50%}.layui-col-lg-offset7{margin-left:58.33333333%}.layui-col-lg-offset8{margin-left:66.66666667%}.layui-col-lg-offset9{margin-left:75%}.layui-col-lg-offset10{margin-left:83.33333333%}.layui-col-lg-offset11{margin-left:91.66666667%}.layui-col-lg-offset12{margin-left:100%}}.layui-col-space1{margin:-.5px}.layui-col-space1>*{padding:.5px}.layui-col-space2{margin:-1px}.layui-col-space2>*{padding:1px}.layui-col-space4{margin:-2px}.layui-col-space4>*{padding:2px}.layui-col-space5{margin:-2.5px}.layui-col-space5>*{padding:2.5px}.layui-col-space6{margin:-3px}.layui-col-space6>*{padding:3px}.layui-col-space8{margin:-4px}.layui-col-space8>*{padding:4px}.layui-col-space10{margin:-5px}.layui-col-space10>*{padding:5px}.layui-col-space12{margin:-6px}.layui-col-space12>*{padding:6px}.layui-col-space14{margin:-7px}.layui-col-space14>*{padding:7px}.layui-col-space15{margin:-7.5px}.layui-col-space15>*{padding:7.5px}.layui-col-space16{margin:-8px}.layui-col-space16>*{padding:8px}.layui-col-space18{margin:-9px}.layui-col-space18>*{padding:9px}.layui-col-space20{margin:-10px}.layui-col-space20>*{padding:10px}.layui-col-space22{margin:-11px}.layui-col-space22>*{padding:11px}.layui-col-space24{margin:-12px}.layui-col-space24>*{padding:12px}.layui-col-space25{margin:-12.5px}.layui-col-space25>*{padding:12.5px}.layui-col-space26{margin:-13px}.layui-col-space26>*{padding:13px}.layui-col-space28{margin:-14px}.layui-col-space28>*{padding:14px}.layui-col-space30{margin:-15px}.layui-col-space30>*{padding:15px}.layui-btn,.layui-input,.layui-select,.layui-textarea,.layui-upload-button{outline:0;-webkit-appearance:none;transition:all .3s;-webkit-transition:all .3s;box-sizing:border-box}.layui-elem-quote{margin-bottom:10px;padding:15px;line-height:22px;border-left:5px solid #009688;border-radius:0 2px 2px 0;background-color:#f2f2f2}.layui-quote-nm{border-style:solid;border-width:1px 1px 1px 5px;background:0 0}.layui-elem-field{margin-bottom:10px;padding:0;border-width:1px;border-style:solid}.layui-elem-field legend{margin-left:20px;padding:0 10px;font-size:20px;font-weight:300}.layui-field-title{margin:10px 0 20px;border-width:1px 0 0}.layui-field-box{padding:10px 15px}.layui-field-title .layui-field-box{padding:10px 0}.layui-progress{position:relative;height:6px;border-radius:20px;background-color:#e2e2e2}.layui-progress-bar{position:absolute;left:0;top:0;width:0;max-width:100%;height:6px;border-radius:20px;text-align:right;background-color:#5FB878;transition:all .3s;-webkit-transition:all .3s}.layui-progress-big,.layui-progress-big .layui-progress-bar{height:18px;line-height:18px}.layui-progress-text{position:relative;top:-20px;line-height:18px;font-size:12px;color:#666}.layui-progress-big .layui-progress-text{position:static;padding:0 10px;color:#fff}.layui-collapse{border-width:1px;border-style:solid;border-radius:2px}.layui-colla-content,.layui-colla-item{border-top-width:1px;border-top-style:solid}.layui-colla-item:first-child{border-top:none}.layui-colla-title{position:relative;height:42px;line-height:42px;padding:0 15px 0 35px;color:#333;background-color:#f2f2f2;cursor:pointer;font-size:14px;overflow:hidden}.layui-colla-content{display:none;padding:10px 15px;line-height:22px;color:#666}.layui-colla-icon{position:absolute;left:15px;top:0;font-size:14px}.layui-card{margin-bottom:15px;border-radius:2px;background-color:#fff;box-shadow:0 1px 2px 0 rgba(0,0,0,.05)}.layui-card:last-child{margin-bottom:0}.layui-card-header{position:relative;height:42px;line-height:42px;padding:0 15px;border-bottom:1px solid #f6f6f6;color:#333;border-radius:2px 2px 0 0;font-size:14px}.layui-bg-black,.layui-bg-blue,.layui-bg-cyan,.layui-bg-green,.layui-bg-orange,.layui-bg-red{color:#fff!important}.layui-card-body{position:relative;padding:10px 15px;line-height:24px}.layui-card-body[pad15]{padding:15px}.layui-card-body[pad20]{padding:20px}.layui-card-body .layui-table{margin:5px 0}.layui-card .layui-tab{margin:0}.layui-panel-window{position:relative;padding:15px;border-radius:0;border-top:5px solid #E6E6E6;background-color:#fff}.layui-auxiliar-moving{position:fixed;left:0;right:0;top:0;bottom:0;width:100%;height:100%;background:0 0;z-index:9999999999}.layui-form-label,.layui-form-mid,.layui-form-select,.layui-input-block,.layui-input-inline,.layui-textarea{position:relative}.layui-bg-red{background-color:#FF5722!important}.layui-bg-orange{background-color:#FFB800!important}.layui-bg-green{background-color:#009688!important}.layui-bg-cyan{background-color:#2F4056!important}.layui-bg-blue{background-color:#1E9FFF!important}.layui-bg-black{background-color:#393D49!important}.layui-bg-gray{background-color:#eee!important;color:#666!important}.layui-badge-rim,.layui-colla-content,.layui-colla-item,.layui-collapse,.layui-elem-field,.layui-form-pane .layui-form-item[pane],.layui-form-pane .layui-form-label,.layui-input,.layui-layedit,.layui-layedit-tool,.layui-quote-nm,.layui-select,.layui-tab-bar,.layui-tab-card,.layui-tab-title,.layui-tab-title .layui-this:after,.layui-textarea{border-color:#e6e6e6}.layui-timeline-item:before,hr{background-color:#e6e6e6}.layui-text{line-height:22px;font-size:14px;color:#666}.layui-text h1,.layui-text h2,.layui-text h3{font-weight:500;color:#333}.layui-text h1{font-size:30px}.layui-text h2{font-size:24px}.layui-text h3{font-size:18px}.layui-text a:not(.layui-btn){color:#01AAED}.layui-text a:not(.layui-btn):hover{text-decoration:underline}.layui-text ul{padding:5px 0 5px 15px}.layui-text ul li{margin-top:5px;list-style-type:disc}.layui-text em,.layui-word-aux{color:#999!important;padding:0 5px!important}.layui-btn{display:inline-block;height:38px;line-height:38px;padding:0 18px;background-color:#009688;color:#fff;white-space:nowrap;text-align:center;font-size:14px;border:none;border-radius:2px;cursor:pointer}.layui-btn:hover{opacity:.8;filter:alpha(opacity=80);color:#fff}.layui-btn:active{opacity:1;filter:alpha(opacity=100)}.layui-btn+.layui-btn{margin-left:10px}.layui-btn-container{font-size:0}.layui-btn-container .layui-btn{margin-right:10px;margin-bottom:10px}.layui-btn-container .layui-btn+.layui-btn{margin-left:0}.layui-table .layui-btn-container .layui-btn{margin-bottom:9px}.layui-btn-radius{border-radius:100px}.layui-btn .layui-icon{margin-right:3px;font-size:18px;vertical-align:bottom;vertical-align:middle\9}.layui-btn-primary{border:1px solid #C9C9C9;background-color:#fff;color:#555}.layui-btn-primary:hover{border-color:#009688;color:#333}.layui-btn-normal{background-color:#1E9FFF}.layui-btn-warm{background-color:#FFB800}.layui-btn-danger{background-color:#FF5722}.layui-btn-checked{background-color:#5FB878}.layui-btn-disabled,.layui-btn-disabled:active,.layui-btn-disabled:hover{border:1px solid #e6e6e6;background-color:#FBFBFB;color:#C9C9C9;cursor:not-allowed;opacity:1}.layui-btn-lg{height:44px;line-height:44px;padding:0 25px;font-size:16px}.layui-btn-sm{height:30px;line-height:30px;padding:0 10px;font-size:12px}.layui-btn-sm i{font-size:16px!important}.layui-btn-xs{height:22px;line-height:22px;padding:0 5px;font-size:12px}.layui-btn-xs i{font-size:14px!important}.layui-btn-group{display:inline-block;vertical-align:middle;font-size:0}.layui-btn-group .layui-btn{margin-left:0!important;margin-right:0!important;border-left:1px solid rgba(255,255,255,.5);border-radius:0}.layui-btn-group .layui-btn-primary{border-left:none}.layui-btn-group .layui-btn-primary:hover{border-color:#C9C9C9;color:#009688}.layui-btn-group .layui-btn:first-child{border-left:none;border-radius:2px 0 0 2px}.layui-btn-group .layui-btn-primary:first-child{border-left:1px solid #c9c9c9}.layui-btn-group .layui-btn:last-child{border-radius:0 2px 2px 0}.layui-btn-group .layui-btn+.layui-btn{margin-left:0}.layui-btn-group+.layui-btn-group{margin-left:10px}.layui-btn-fluid{width:100%}.layui-input,.layui-select,.layui-textarea{height:38px;line-height:1.3;line-height:38px\9;border-width:1px;border-style:solid;background-color:#fff;border-radius:2px}.layui-input::-webkit-input-placeholder,.layui-select::-webkit-input-placeholder,.layui-textarea::-webkit-input-placeholder{line-height:1.3}.layui-input,.layui-textarea{display:block;width:100%;padding-left:10px}.layui-input:hover,.layui-textarea:hover{border-color:#D2D2D2!important}.layui-input:focus,.layui-textarea:focus{border-color:#C9C9C9!important}.layui-textarea{min-height:100px;height:auto;line-height:20px;padding:6px 10px;resize:vertical}.layui-select{padding:0 10px}.layui-form input[type=checkbox],.layui-form input[type=radio],.layui-form select{display:none}.layui-form [lay-ignore]{display:initial}.layui-form-item{margin-bottom:15px;clear:both;*zoom:1}.layui-form-item:after{content:'\20';clear:both;*zoom:1;display:block;height:0}.layui-form-label{float:left;display:block;padding:9px 15px;width:80px;font-weight:400;line-height:20px;text-align:right}.layui-form-label-col{display:block;float:none;padding:9px 0;line-height:20px;text-align:left}.layui-form-item .layui-inline{margin-bottom:5px;margin-right:10px}.layui-input-block{margin-left:110px;min-height:36px}.layui-input-inline{display:inline-block;vertical-align:middle}.layui-form-item .layui-input-inline{float:left;width:190px;margin-right:10px}.layui-form-text .layui-input-inline{width:auto}.layui-form-mid{float:left;display:block;padding:9px 0!important;line-height:20px;margin-right:10px}.layui-form-danger+.layui-form-select .layui-input,.layui-form-danger:focus{border-color:#FF5722!important}.layui-form-select .layui-input{padding-right:30px;cursor:pointer}.layui-form-select .layui-edge{position:absolute;right:10px;top:50%;margin-top:-3px;cursor:pointer;border-width:6px;border-top-color:#c2c2c2;border-top-style:solid;transition:all .3s;-webkit-transition:all .3s}.layui-form-select dl{display:none;position:absolute;left:0;top:42px;padding:5px 0;z-index:899;min-width:100%;border:1px solid #d2d2d2;max-height:300px;overflow-y:auto;background-color:#fff;border-radius:2px;box-shadow:0 2px 4px rgba(0,0,0,.12);box-sizing:border-box}.layui-form-select dl dd,.layui-form-select dl dt{padding:0 10px;line-height:36px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.layui-form-select dl dt{font-size:12px;color:#999}.layui-form-select dl dd{cursor:pointer}.layui-form-select dl dd:hover{background-color:#f2f2f2;-webkit-transition:.5s all;transition:.5s all}.layui-form-select .layui-select-group dd{padding-left:20px}.layui-form-select dl dd.layui-select-tips{padding-left:10px!important;color:#999}.layui-form-select dl dd.layui-this{background-color:#5FB878;color:#fff}.layui-form-checkbox,.layui-form-select dl dd.layui-disabled{background-color:#fff}.layui-form-selected dl{display:block}.layui-form-checkbox,.layui-form-checkbox *,.layui-form-switch{display:inline-block;vertical-align:middle}.layui-form-selected .layui-edge{margin-top:-9px;-webkit-transform:rotate(180deg);transform:rotate(180deg);margin-top:-3px\9}:root .layui-form-selected .layui-edge{margin-top:-9px\0/IE9}.layui-form-selectup dl{top:auto;bottom:42px}.layui-select-none{margin:5px 0;text-align:center;color:#999}.layui-select-disabled .layui-disabled{border-color:#eee!important}.layui-select-disabled .layui-edge{border-top-color:#d2d2d2}.layui-form-checkbox{position:relative;height:30px;line-height:30px;margin-right:10px;padding-right:30px;cursor:pointer;font-size:0;-webkit-transition:.1s linear;transition:.1s linear;box-sizing:border-box}.layui-form-checkbox span{padding:0 10px;height:100%;font-size:14px;border-radius:2px 0 0 2px;background-color:#d2d2d2;color:#fff;overflow:hidden}.layui-form-checkbox:hover span{background-color:#c2c2c2}.layui-form-checkbox i{position:absolute;right:0;top:0;width:30px;height:28px;border:1px solid #d2d2d2;border-left:none;border-radius:0 2px 2px 0;color:#fff;font-size:20px;text-align:center}.layui-form-checkbox:hover i{border-color:#c2c2c2;color:#c2c2c2}.layui-form-checked,.layui-form-checked:hover{border-color:#5FB878}.layui-form-checked span,.layui-form-checked:hover span{background-color:#5FB878}.layui-form-checked i,.layui-form-checked:hover i{color:#5FB878}.layui-form-item .layui-form-checkbox{margin-top:4px}.layui-form-checkbox[lay-skin=primary]{height:auto!important;line-height:normal!important;min-width:18px;min-height:18px;border:none!important;margin-right:0;padding-left:28px;padding-right:0;background:0 0}.layui-form-checkbox[lay-skin=primary] span{padding-left:0;padding-right:15px;line-height:18px;background:0 0;color:#666}.layui-form-checkbox[lay-skin=primary] i{right:auto;left:0;width:16px;height:16px;line-height:16px;border:1px solid #d2d2d2;font-size:12px;border-radius:2px;background-color:#fff;-webkit-transition:.1s linear;transition:.1s linear}.layui-form-checkbox[lay-skin=primary]:hover i{border-color:#5FB878;color:#fff}.layui-form-checked[lay-skin=primary] i{border-color:#5FB878!important;background-color:#5FB878;color:#fff}.layui-checkbox-disbaled[lay-skin=primary] span{background:0 0!important;color:#c2c2c2}.layui-checkbox-disbaled[lay-skin=primary]:hover i{border-color:#d2d2d2}.layui-form-item .layui-form-checkbox[lay-skin=primary]{margin-top:10px}.layui-form-switch{position:relative;height:22px;line-height:22px;min-width:35px;padding:0 5px;margin-top:8px;border:1px solid #d2d2d2;border-radius:20px;cursor:pointer;background-color:#fff;-webkit-transition:.1s linear;transition:.1s linear}.layui-form-switch i{position:absolute;left:5px;top:3px;width:16px;height:16px;border-radius:20px;background-color:#d2d2d2;-webkit-transition:.1s linear;transition:.1s linear}.layui-form-switch em{position:relative;top:0;width:25px;margin-left:21px;padding:0!important;text-align:center!important;color:#999!important;font-style:normal!important;font-size:12px}.layui-form-onswitch{border-color:#5FB878;background-color:#5FB878}.layui-checkbox-disbaled,.layui-checkbox-disbaled i{border-color:#e2e2e2!important}.layui-form-onswitch i{left:100%;margin-left:-21px;background-color:#fff}.layui-form-onswitch em{margin-left:5px;margin-right:21px;color:#fff!important}.layui-checkbox-disbaled span{background-color:#e2e2e2!important}.layui-checkbox-disbaled:hover i{color:#fff!important}[lay-radio]{display:none}.layui-form-radio,.layui-form-radio *{display:inline-block;vertical-align:middle}.layui-form-radio{line-height:28px;margin:6px 10px 0 0;padding-right:10px;cursor:pointer;font-size:0}.layui-form-radio *{font-size:14px}.layui-form-radio>i{margin-right:8px;font-size:22px;color:#c2c2c2}.layui-form-radio>i:hover,.layui-form-radioed>i{color:#5FB878}.layui-radio-disbaled>i{color:#e2e2e2!important}.layui-form-pane .layui-form-label{width:110px;padding:8px 15px;height:38px;line-height:20px;border-width:1px;border-style:solid;border-radius:2px 0 0 2px;text-align:center;background-color:#FBFBFB;overflow:hidden;box-sizing:border-box}.layui-form-pane .layui-input-inline{margin-left:-1px}.layui-form-pane .layui-input-block{margin-left:110px;left:-1px}.layui-form-pane .layui-input{border-radius:0 2px 2px 0}.layui-form-pane .layui-form-text .layui-form-label{float:none;width:100%;border-radius:2px;box-sizing:border-box;text-align:left}.layui-form-pane .layui-form-text .layui-input-inline{display:block;margin:0;top:-1px;clear:both}.layui-form-pane .layui-form-text .layui-input-block{margin:0;left:0;top:-1px}.layui-form-pane .layui-form-text .layui-textarea{min-height:100px;border-radius:0 0 2px 2px}.layui-form-pane .layui-form-checkbox{margin:4px 0 4px 10px}.layui-form-pane .layui-form-radio,.layui-form-pane .layui-form-switch{margin-top:6px;margin-left:10px}.layui-form-pane .layui-form-item[pane]{position:relative;border-width:1px;border-style:solid}.layui-form-pane .layui-form-item[pane] .layui-form-label{position:absolute;left:0;top:0;height:100%;border-width:0 1px 0 0}.layui-form-pane .layui-form-item[pane] .layui-input-inline{margin-left:110px}@media screen and (max-width:450px){.layui-form-item .layui-form-label{text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.layui-form-item .layui-inline{display:block;margin-right:0;margin-bottom:20px;clear:both}.layui-form-item .layui-inline:after{content:'\20';clear:both;display:block;height:0}.layui-form-item .layui-input-inline{display:block;float:none;left:-3px;width:auto;margin:0 0 10px 112px}.layui-form-item .layui-input-inline+.layui-form-mid{margin-left:110px;top:-5px;padding:0}.layui-form-item .layui-form-checkbox{margin-right:5px;margin-bottom:5px}}.layui-layedit{border-width:1px;border-style:solid;border-radius:2px}.layui-layedit-tool{padding:3px 5px;border-bottom-width:1px;border-bottom-style:solid;font-size:0}.layedit-tool-fixed{position:fixed;top:0;border-top:1px solid #e2e2e2}.layui-layedit-tool .layedit-tool-mid,.layui-layedit-tool .layui-icon{display:inline-block;vertical-align:middle;text-align:center;font-size:14px}.layui-layedit-tool .layui-icon{position:relative;width:32px;height:30px;line-height:30px;margin:3px 5px;color:#777;cursor:pointer;border-radius:2px}.layui-layedit-tool .layui-icon:hover{color:#393D49}.layui-layedit-tool .layui-icon:active{color:#000}.layui-layedit-tool .layedit-tool-active{background-color:#e2e2e2;color:#000}.layui-layedit-tool .layui-disabled,.layui-layedit-tool .layui-disabled:hover{color:#d2d2d2;cursor:not-allowed}.layui-layedit-tool .layedit-tool-mid{width:1px;height:18px;margin:0 10px;background-color:#d2d2d2}.layedit-tool-html{width:50px!important;font-size:30px!important}.layedit-tool-b,.layedit-tool-code,.layedit-tool-help{font-size:16px!important}.layedit-tool-d,.layedit-tool-face,.layedit-tool-image,.layedit-tool-unlink{font-size:18px!important}.layedit-tool-image input{position:absolute;font-size:0;left:0;top:0;width:100%;height:100%;opacity:.01;filter:Alpha(opacity=1);cursor:pointer}.layui-layedit-iframe iframe{display:block;width:100%}#LAY_layedit_code{overflow:hidden}.layui-laypage{display:inline-block;*display:inline;*zoom:1;vertical-align:middle;margin:10px 0;font-size:0}.layui-laypage>a:first-child,.layui-laypage>a:first-child em{border-radius:2px 0 0 2px}.layui-laypage>a:last-child,.layui-laypage>a:last-child em{border-radius:0 2px 2px 0}.layui-laypage>:first-child{margin-left:0!important}.layui-laypage>:last-child{margin-right:0!important}.layui-laypage a,.layui-laypage button,.layui-laypage input,.layui-laypage select,.layui-laypage span{border:1px solid #e2e2e2}.layui-laypage a,.layui-laypage span{display:inline-block;*display:inline;*zoom:1;vertical-align:middle;padding:0 15px;height:28px;line-height:28px;margin:0 -1px 5px 0;background-color:#fff;color:#333;font-size:12px}.layui-flow-more a *,.layui-laypage input,.layui-table-view select[lay-ignore]{display:inline-block}.layui-laypage a:hover{color:#009688}.layui-laypage em{font-style:normal}.layui-laypage .layui-laypage-spr{color:#999;font-weight:700}.layui-laypage a{text-decoration:none}.layui-laypage .layui-laypage-curr{position:relative}.layui-laypage .layui-laypage-curr em{position:relative;color:#fff}.layui-laypage .layui-laypage-curr .layui-laypage-em{position:absolute;left:-1px;top:-1px;padding:1px;width:100%;height:100%;background-color:#009688}.layui-laypage-em{border-radius:2px}.layui-laypage-next em,.layui-laypage-prev em{font-family:Sim sun;font-size:16px}.layui-laypage .layui-laypage-count,.layui-laypage .layui-laypage-limits,.layui-laypage .layui-laypage-refresh,.layui-laypage .layui-laypage-skip{margin-left:10px;margin-right:10px;padding:0;border:none}.layui-laypage .layui-laypage-limits,.layui-laypage .layui-laypage-refresh{vertical-align:top}.layui-laypage .layui-laypage-refresh i{font-size:18px;cursor:pointer}.layui-laypage select{height:22px;padding:3px;border-radius:2px;cursor:pointer}.layui-laypage .layui-laypage-skip{height:30px;line-height:30px;color:#999}.layui-laypage button,.layui-laypage input{height:30px;line-height:30px;border-radius:2px;vertical-align:top;background-color:#fff;box-sizing:border-box}.layui-laypage input{width:40px;margin:0 10px;padding:0 3px;text-align:center}.layui-laypage input:focus,.layui-laypage select:focus{border-color:#009688!important}.layui-laypage button{margin-left:10px;padding:0 10px;cursor:pointer}.layui-table,.layui-table-view{margin:10px 0}.layui-flow-more{margin:10px 0;text-align:center;color:#999;font-size:14px}.layui-flow-more a{height:32px;line-height:32px}.layui-flow-more a *{vertical-align:top}.layui-flow-more a cite{padding:0 20px;border-radius:3px;background-color:#eee;color:#333;font-style:normal}.layui-flow-more a cite:hover{opacity:.8}.layui-flow-more a i{font-size:30px;color:#737383}.layui-table{width:100%;background-color:#fff;color:#666}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table th{text-align:left;font-weight:400}.layui-table tbody tr:hover,.layui-table thead tr,.layui-table-click,.layui-table-header,.layui-table-hover,.layui-table-mend,.layui-table-patch,.layui-table-tool,.layui-table-total,.layui-table-total tr,.layui-table[lay-even] tr:nth-child(even){background-color:#f2f2f2}.layui-table td,.layui-table th,.layui-table-col-set,.layui-table-fixed-r,.layui-table-grid-down,.layui-table-header,.layui-table-page,.layui-table-tips-main,.layui-table-tool,.layui-table-total,.layui-table-view,.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border-width:1px;border-style:solid;border-color:#e6e6e6}.layui-table td,.layui-table th{position:relative;padding:9px 15px;min-height:20px;line-height:20px;font-size:14px}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border-width:0 0 1px}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border-width:0 1px 0 0}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}.layui-table img{max-width:100px}.layui-table[lay-size=lg] td,.layui-table[lay-size=lg] th{padding:15px 30px}.layui-table-view .layui-table[lay-size=lg] .layui-table-cell{height:40px;line-height:40px}.layui-table[lay-size=sm] td,.layui-table[lay-size=sm] th{font-size:12px;padding:5px 10px}.layui-table-view .layui-table[lay-size=sm] .layui-table-cell{height:20px;line-height:20px}.layui-table[lay-data]{display:none}.layui-table-box{position:relative;overflow:hidden}.layui-table-view .layui-table{position:relative;width:auto;margin:0}.layui-table-view .layui-table[lay-skin=line]{border-width:0 1px 0 0}.layui-table-view .layui-table[lay-skin=row]{border-width:0 0 1px}.layui-table-view .layui-table td,.layui-table-view .layui-table th{padding:5px 0;border-top:none;border-left:none}.layui-table-view .layui-table th.layui-unselect .layui-table-cell span{cursor:pointer}.layui-table-view .layui-table td{cursor:default}.layui-table-view .layui-table td[data-edit=text]{cursor:text}.layui-table-view .layui-form-checkbox[lay-skin=primary] i{width:18px;height:18px}.layui-table-view .layui-form-radio{line-height:0;padding:0}.layui-table-view .layui-form-radio>i{margin:0;font-size:20px}.layui-table-init{position:absolute;left:0;top:0;width:100%;height:100%;text-align:center;z-index:110}.layui-table-init .layui-icon{position:absolute;left:50%;top:50%;margin:-15px 0 0 -15px;font-size:30px;color:#c2c2c2}.layui-table-header{border-width:0 0 1px;overflow:hidden}.layui-table-header .layui-table{margin-bottom:-1px}.layui-table-tool .layui-inline[lay-event]{position:relative;width:26px;height:26px;padding:5px;line-height:16px;margin-right:10px;text-align:center;color:#333;border:1px solid #ccc;cursor:pointer;-webkit-transition:.5s all;transition:.5s all}.layui-table-tool .layui-inline[lay-event]:hover{border:1px solid #999}.layui-table-tool-temp{padding-right:120px}.layui-table-tool-self{position:absolute;right:17px;top:10px}.layui-table-tool .layui-table-tool-self .layui-inline[lay-event]{margin:0 0 0 10px}.layui-table-tool-panel{position:absolute;top:29px;left:-1px;padding:5px 0;min-width:150px;min-height:40px;border:1px solid #d2d2d2;text-align:left;overflow-y:auto;background-color:#fff;box-shadow:0 2px 4px rgba(0,0,0,.12)}.layui-table-cell,.layui-table-tool-panel li{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.layui-table-tool-panel li{padding:0 10px;line-height:30px;-webkit-transition:.5s all;transition:.5s all}.layui-table-tool-panel li .layui-form-checkbox[lay-skin=primary]{width:100%;padding-left:28px}.layui-table-tool-panel li:hover{background-color:#f2f2f2}.layui-table-tool-panel li .layui-form-checkbox[lay-skin=primary] i{position:absolute;left:0;top:0}.layui-table-tool-panel li .layui-form-checkbox[lay-skin=primary] span{padding:0}.layui-table-tool .layui-table-tool-self .layui-table-tool-panel{left:auto;right:-1px}.layui-table-col-set{position:absolute;right:0;top:0;width:20px;height:100%;border-width:0 0 0 1px;background-color:#fff}.layui-table-sort{width:10px;height:20px;margin-left:5px;cursor:pointer!important}.layui-table-sort .layui-edge{position:absolute;left:5px;border-width:5px}.layui-table-sort .layui-table-sort-asc{top:3px;border-top:none;border-bottom-style:solid;border-bottom-color:#b2b2b2}.layui-table-sort .layui-table-sort-asc:hover{border-bottom-color:#666}.layui-table-sort .layui-table-sort-desc{bottom:5px;border-bottom:none;border-top-style:solid;border-top-color:#b2b2b2}.layui-table-sort .layui-table-sort-desc:hover{border-top-color:#666}.layui-table-sort[lay-sort=asc] .layui-table-sort-asc{border-bottom-color:#000}.layui-table-sort[lay-sort=desc] .layui-table-sort-desc{border-top-color:#000}.layui-table-cell{height:28px;line-height:28px;padding:0 15px;position:relative;box-sizing:border-box}.layui-table-cell .layui-form-checkbox[lay-skin=primary]{top:-1px;padding:0}.layui-table-cell .layui-table-link{color:#01AAED}.laytable-cell-checkbox,.laytable-cell-numbers,.laytable-cell-radio,.laytable-cell-space{padding:0;text-align:center}.layui-table-body{position:relative;overflow:auto;margin-right:-1px;margin-bottom:-1px}.layui-table-body .layui-none{line-height:26px;padding:15px;text-align:center;color:#999}.layui-table-fixed{position:absolute;left:0;top:0;z-index:101}.layui-table-fixed .layui-table-body{overflow:hidden}.layui-table-fixed-l{box-shadow:0 -1px 8px rgba(0,0,0,.08)}.layui-table-fixed-r{left:auto;right:-1px;border-width:0 0 0 1px;box-shadow:-1px 0 8px rgba(0,0,0,.08)}.layui-table-fixed-r .layui-table-header{position:relative;overflow:visible}.layui-table-mend{position:absolute;right:-49px;top:0;height:100%;width:50px}.layui-table-tool{position:relative;z-index:890;width:100%;min-height:50px;line-height:30px;padding:10px 15px;border-width:0 0 1px}.layui-table-tool .layui-btn-container{margin-bottom:-10px}.layui-table-page,.layui-table-total{border-width:1px 0 0;margin-bottom:-1px;overflow:hidden}.layui-table-page{position:relative;width:100%;padding:7px 7px 0;height:41px;font-size:12px;white-space:nowrap}.layui-table-page>div{height:26px}.layui-table-page .layui-laypage{margin:0}.layui-table-page .layui-laypage a,.layui-table-page .layui-laypage span{height:26px;line-height:26px;margin-bottom:10px;border:none;background:0 0}.layui-table-page .layui-laypage a,.layui-table-page .layui-laypage span.layui-laypage-curr{padding:0 12px}.layui-table-page .layui-laypage span{margin-left:0;padding:0}.layui-table-page .layui-laypage .layui-laypage-prev{margin-left:-7px!important}.layui-table-page .layui-laypage .layui-laypage-curr .layui-laypage-em{left:0;top:0;padding:0}.layui-table-page .layui-laypage button,.layui-table-page .layui-laypage input{height:26px;line-height:26px}.layui-table-page .layui-laypage input{width:40px}.layui-table-page .layui-laypage button{padding:0 10px}.layui-table-page select{height:18px}.layui-table-patch .layui-table-cell{padding:0;width:30px}.layui-table-edit{position:absolute;left:0;top:0;width:100%;height:100%;padding:0 14px 1px;border-radius:0;box-shadow:1px 1px 20px rgba(0,0,0,.15)}.layui-table-edit:focus{border-color:#5FB878!important}select.layui-table-edit{padding:0 0 0 10px;border-color:#C9C9C9}.layui-table-view .layui-form-checkbox,.layui-table-view .layui-form-radio,.layui-table-view .layui-form-switch{top:0;margin:0;box-sizing:content-box}.layui-table-view .layui-form-checkbox{top:-1px;height:26px;line-height:26px}.layui-table-view .layui-form-checkbox i{height:26px}.layui-table-grid .layui-table-cell{overflow:visible}.layui-table-grid-down{position:absolute;top:0;right:0;width:26px;height:100%;padding:5px 0;border-width:0 0 0 1px;text-align:center;background-color:#fff;color:#999;cursor:pointer}.layui-table-grid-down .layui-icon{position:absolute;top:50%;left:50%;margin:-8px 0 0 -8px}.layui-table-grid-down:hover{background-color:#fbfbfb}body .layui-table-tips .layui-layer-content{background:0 0;padding:0;box-shadow:0 1px 6px rgba(0,0,0,.12)}.layui-table-tips-main{margin:-44px 0 0 -1px;max-height:150px;padding:8px 15px;font-size:14px;overflow-y:scroll;background-color:#fff;color:#666}.layui-table-tips-c{position:absolute;right:-3px;top:-13px;width:20px;height:20px;padding:3px;cursor:pointer;background-color:#666;border-radius:50%;color:#fff}.layui-table-tips-c:hover{background-color:#777}.layui-table-tips-c:before{position:relative;right:-2px}.layui-upload-file{display:none!important;opacity:.01;filter:Alpha(opacity=1)}.layui-upload-drag,.layui-upload-form,.layui-upload-wrap{display:inline-block}.layui-upload-list{margin:10px 0}.layui-upload-choose{padding:0 10px;color:#999}.layui-upload-drag{position:relative;padding:30px;border:1px dashed #e2e2e2;background-color:#fff;text-align:center;cursor:pointer;color:#999}.layui-upload-drag .layui-icon{font-size:50px;color:#009688}.layui-upload-drag[lay-over]{border-color:#009688}.layui-upload-iframe{position:absolute;width:0;height:0;border:0;visibility:hidden}.layui-upload-wrap{position:relative;vertical-align:middle}.layui-upload-wrap .layui-upload-file{display:block!important;position:absolute;left:0;top:0;z-index:10;font-size:100px;width:100%;height:100%;opacity:.01;filter:Alpha(opacity=1);cursor:pointer}.layui-transfer-active,.layui-transfer-box{display:inline-block;vertical-align:middle}.layui-transfer-box,.layui-transfer-header,.layui-transfer-search{border-width:0;border-style:solid;border-color:#e6e6e6}.layui-transfer-box{position:relative;border-width:1px;width:200px;height:360px;border-radius:2px;background-color:#fff}.layui-transfer-box .layui-form-checkbox{width:100%;margin:0!important}.layui-transfer-header{height:38px;line-height:38px;padding:0 10px;border-bottom-width:1px}.layui-transfer-search{position:relative;padding:10px;border-bottom-width:1px}.layui-transfer-search .layui-input{height:32px;padding-left:30px;font-size:12px}.layui-transfer-search .layui-icon-search{position:absolute;left:20px;top:50%;margin-top:-8px;color:#666}.layui-transfer-active{margin:0 15px}.layui-transfer-active .layui-btn{display:block;margin:0;padding:0 15px;background-color:#5FB878;border-color:#5FB878;color:#fff}.layui-transfer-active .layui-btn-disabled{background-color:#FBFBFB;border-color:#e6e6e6;color:#C9C9C9}.layui-transfer-active .layui-btn:first-child{margin-bottom:15px}.layui-transfer-active .layui-btn .layui-icon{margin:0;font-size:14px!important}.layui-transfer-data{padding:5px 0;overflow:auto}.layui-transfer-data li{height:32px;line-height:32px;padding:0 10px}.layui-transfer-data li:hover{background-color:#f2f2f2;transition:.5s all}.layui-transfer-data .layui-none{padding:15px 10px;text-align:center;color:#999}.layui-nav{position:relative;padding:0 20px;background-color:#393D49;color:#fff;border-radius:2px;font-size:0;box-sizing:border-box}.layui-nav *{font-size:14px}.layui-nav .layui-nav-item{position:relative;display:inline-block;*display:inline;*zoom:1;vertical-align:middle;line-height:60px}.layui-nav .layui-nav-item a{display:block;padding:0 20px;color:#fff;color:rgba(255,255,255,.7);transition:all .3s;-webkit-transition:all .3s}.layui-nav .layui-this:after,.layui-nav-bar,.layui-nav-tree .layui-nav-itemed:after{position:absolute;left:0;top:0;width:0;height:5px;background-color:#5FB878;transition:all .2s;-webkit-transition:all .2s}.layui-nav-bar{z-index:1000}.layui-nav .layui-nav-item a:hover,.layui-nav .layui-this a{color:#fff}.layui-nav .layui-this:after{content:'';top:auto;bottom:0;width:100%}.layui-nav-img{width:30px;height:30px;margin-right:10px;border-radius:50%}.layui-nav .layui-nav-more{content:'';width:0;height:0;border-style:solid dashed dashed;border-color:#fff transparent transparent;overflow:hidden;cursor:pointer;transition:all .2s;-webkit-transition:all .2s;position:absolute;top:50%;right:3px;margin-top:-3px;border-width:6px;border-top-color:rgba(255,255,255,.7)}.layui-nav .layui-nav-mored,.layui-nav-itemed>a .layui-nav-more{margin-top:-9px;border-style:dashed dashed solid;border-color:transparent transparent #fff}.layui-nav-child{display:none;position:absolute;left:0;top:65px;min-width:100%;line-height:36px;padding:5px 0;box-shadow:0 2px 4px rgba(0,0,0,.12);border:1px solid #d2d2d2;background-color:#fff;z-index:100;border-radius:2px;white-space:nowrap}.layui-nav .layui-nav-child a{color:#333}.layui-nav .layui-nav-child a:hover{background-color:#f2f2f2;color:#000}.layui-nav-child dd{position:relative}.layui-nav .layui-nav-child dd.layui-this a,.layui-nav-child dd.layui-this{background-color:#5FB878;color:#fff}.layui-nav-child dd.layui-this:after{display:none}.layui-nav-tree{width:200px;padding:0}.layui-nav-tree .layui-nav-item{display:block;width:100%;line-height:45px}.layui-nav-tree .layui-nav-item a{position:relative;height:45px;line-height:45px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.layui-nav-tree .layui-nav-item a:hover{background-color:#4E5465}.layui-nav-tree .layui-nav-bar{width:5px;height:0;background-color:#009688}.layui-nav-tree .layui-nav-child dd.layui-this,.layui-nav-tree .layui-nav-child dd.layui-this a,.layui-nav-tree .layui-this,.layui-nav-tree .layui-this>a,.layui-nav-tree .layui-this>a:hover{background-color:#009688;color:#fff}.layui-nav-tree .layui-this:after{display:none}.layui-nav-itemed>a,.layui-nav-tree .layui-nav-title a,.layui-nav-tree .layui-nav-title a:hover{color:#fff!important}.layui-nav-tree .layui-nav-child{position:relative;z-index:0;top:0;border:none;box-shadow:none}.layui-nav-tree .layui-nav-child a{height:40px;line-height:40px;color:#fff;color:rgba(255,255,255,.7)}.layui-nav-tree .layui-nav-child,.layui-nav-tree .layui-nav-child a:hover{background:0 0;color:#fff}.layui-nav-tree .layui-nav-more{right:10px}.layui-nav-itemed>.layui-nav-child{display:block;padding:0;background-color:rgba(0,0,0,.3)!important}.layui-nav-itemed>.layui-nav-child>.layui-this>.layui-nav-child{display:block}.layui-nav-side{position:fixed;top:0;bottom:0;left:0;overflow-x:hidden;z-index:999}.layui-bg-blue .layui-nav-bar,.layui-bg-blue .layui-nav-itemed:after,.layui-bg-blue .layui-this:after{background-color:#93D1FF}.layui-bg-blue .layui-nav-child dd.layui-this{background-color:#1E9FFF}.layui-bg-blue .layui-nav-itemed>a,.layui-nav-tree.layui-bg-blue .layui-nav-title a,.layui-nav-tree.layui-bg-blue .layui-nav-title a:hover{background-color:#007DDB!important}.layui-breadcrumb{font-size:0}.layui-breadcrumb>*{font-size:14px}.layui-breadcrumb a{color:#999!important}.layui-breadcrumb a:hover{color:#5FB878!important}.layui-breadcrumb a cite{color:#666;font-style:normal}.layui-breadcrumb span[lay-separator]{margin:0 10px;color:#999}.layui-tab{margin:10px 0;text-align:left!important}.layui-tab[overflow]>.layui-tab-title{overflow:hidden}.layui-tab-title{position:relative;left:0;height:40px;white-space:nowrap;font-size:0;border-bottom-width:1px;border-bottom-style:solid;transition:all .2s;-webkit-transition:all .2s}.layui-tab-title li{display:inline-block;*display:inline;*zoom:1;vertical-align:middle;font-size:14px;transition:all .2s;-webkit-transition:all .2s;position:relative;line-height:40px;min-width:65px;padding:0 15px;text-align:center;cursor:pointer}.layui-tab-title li a{display:block}.layui-tab-title .layui-this{color:#000}.layui-tab-title .layui-this:after{position:absolute;left:0;top:0;content:'';width:100%;height:41px;border-width:1px;border-style:solid;border-bottom-color:#fff;border-radius:2px 2px 0 0;box-sizing:border-box;pointer-events:none}.layui-tab-bar{position:absolute;right:0;top:0;z-index:10;width:30px;height:39px;line-height:39px;border-width:1px;border-style:solid;border-radius:2px;text-align:center;background-color:#fff;cursor:pointer}.layui-tab-bar .layui-icon{position:relative;display:inline-block;top:3px;transition:all .3s;-webkit-transition:all .3s}.layui-tab-item{display:none}.layui-tab-more{padding-right:30px;height:auto!important;white-space:normal!important}.layui-tab-more li.layui-this:after{border-bottom-color:#e2e2e2;border-radius:2px}.layui-tab-more .layui-tab-bar .layui-icon{top:-2px;top:3px\9;-webkit-transform:rotate(180deg);transform:rotate(180deg)}:root .layui-tab-more .layui-tab-bar .layui-icon{top:-2px\0/IE9}.layui-tab-content{padding:10px}.layui-tab-title li .layui-tab-close{position:relative;display:inline-block;width:18px;height:18px;line-height:20px;margin-left:8px;top:1px;text-align:center;font-size:14px;color:#c2c2c2;transition:all .2s;-webkit-transition:all .2s}.layui-tab-title li .layui-tab-close:hover{border-radius:2px;background-color:#FF5722;color:#fff}.layui-tab-brief>.layui-tab-title .layui-this{color:#009688}.layui-tab-brief>.layui-tab-more li.layui-this:after,.layui-tab-brief>.layui-tab-title .layui-this:after{border:none;border-radius:0;border-bottom:2px solid #5FB878}.layui-tab-brief[overflow]>.layui-tab-title .layui-this:after{top:-1px}.layui-tab-card{border-width:1px;border-style:solid;border-radius:2px;box-shadow:0 2px 5px 0 rgba(0,0,0,.1)}.layui-tab-card>.layui-tab-title{background-color:#f2f2f2}.layui-tab-card>.layui-tab-title li{margin-right:-1px;margin-left:-1px}.layui-tab-card>.layui-tab-title .layui-this{background-color:#fff}.layui-tab-card>.layui-tab-title .layui-this:after{border-top:none;border-width:1px;border-bottom-color:#fff}.layui-tab-card>.layui-tab-title .layui-tab-bar{height:40px;line-height:40px;border-radius:0;border-top:none;border-right:none}.layui-tab-card>.layui-tab-more .layui-this{background:0 0;color:#5FB878}.layui-tab-card>.layui-tab-more .layui-this:after{border:none}.layui-timeline{padding-left:5px}.layui-timeline-item{position:relative;padding-bottom:20px}.layui-timeline-axis{position:absolute;left:-5px;top:0;z-index:10;width:20px;height:20px;line-height:20px;background-color:#fff;color:#5FB878;border-radius:50%;text-align:center;cursor:pointer}.layui-timeline-axis:hover{color:#FF5722}.layui-timeline-item:before{content:'';position:absolute;left:5px;top:0;z-index:0;width:1px;height:100%}.layui-timeline-item:last-child:before{display:none}.layui-timeline-item:first-child:before{display:block}.layui-timeline-content{padding-left:25px}.layui-timeline-title{position:relative;margin-bottom:10px}.layui-badge,.layui-badge-dot,.layui-badge-rim{position:relative;display:inline-block;padding:0 6px;font-size:12px;text-align:center;background-color:#FF5722;color:#fff;border-radius:2px}.layui-badge{height:18px;line-height:18px}.layui-badge-dot{width:8px;height:8px;padding:0;border-radius:50%}.layui-badge-rim{height:18px;line-height:18px;border-width:1px;border-style:solid;background-color:#fff;color:#666}.layui-btn .layui-badge,.layui-btn .layui-badge-dot{margin-left:5px}.layui-nav .layui-badge,.layui-nav .layui-badge-dot{position:absolute;top:50%;margin:-8px 6px 0}.layui-tab-title .layui-badge,.layui-tab-title .layui-badge-dot{left:5px;top:-2px}.layui-carousel{position:relative;left:0;top:0;background-color:#f8f8f8}.layui-carousel>[carousel-item]{position:relative;width:100%;height:100%;overflow:hidden}.layui-carousel>[carousel-item]:before{position:absolute;content:'\e63d';left:50%;top:50%;width:100px;line-height:20px;margin:-10px 0 0 -50px;text-align:center;color:#c2c2c2;font-family:layui-icon!important;font-size:30px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.layui-carousel>[carousel-item]>*{display:none;position:absolute;left:0;top:0;width:100%;height:100%;background-color:#f8f8f8;transition-duration:.3s;-webkit-transition-duration:.3s}.layui-carousel-updown>*{-webkit-transition:.3s ease-in-out up;transition:.3s ease-in-out up}.layui-carousel-arrow{display:none\9;opacity:0;position:absolute;left:10px;top:50%;margin-top:-18px;width:36px;height:36px;line-height:36px;text-align:center;font-size:20px;border:0;border-radius:50%;background-color:rgba(0,0,0,.2);color:#fff;-webkit-transition-duration:.3s;transition-duration:.3s;cursor:pointer}.layui-carousel-arrow[lay-type=add]{left:auto!important;right:10px}.layui-carousel:hover .layui-carousel-arrow[lay-type=add],.layui-carousel[lay-arrow=always] .layui-carousel-arrow[lay-type=add]{right:20px}.layui-carousel[lay-arrow=always] .layui-carousel-arrow{opacity:1;left:20px}.layui-carousel[lay-arrow=none] .layui-carousel-arrow{display:none}.layui-carousel-arrow:hover,.layui-carousel-ind ul:hover{background-color:rgba(0,0,0,.35)}.layui-carousel:hover .layui-carousel-arrow{display:block\9;opacity:1;left:20px}.layui-carousel-ind{position:relative;top:-35px;width:100%;line-height:0!important;text-align:center;font-size:0}.layui-carousel[lay-indicator=outside]{margin-bottom:30px}.layui-carousel[lay-indicator=outside] .layui-carousel-ind{top:10px}.layui-carousel[lay-indicator=outside] .layui-carousel-ind ul{background-color:rgba(0,0,0,.5)}.layui-carousel[lay-indicator=none] .layui-carousel-ind{display:none}.layui-carousel-ind ul{display:inline-block;padding:5px;background-color:rgba(0,0,0,.2);border-radius:10px;-webkit-transition-duration:.3s;transition-duration:.3s}.layui-carousel-ind li{display:inline-block;width:10px;height:10px;margin:0 3px;font-size:14px;background-color:#e2e2e2;background-color:rgba(255,255,255,.5);border-radius:50%;cursor:pointer;-webkit-transition-duration:.3s;transition-duration:.3s}.layui-carousel-ind li:hover{background-color:rgba(255,255,255,.7)}.layui-carousel-ind li.layui-this{background-color:#fff}.layui-carousel>[carousel-item]>.layui-carousel-next,.layui-carousel>[carousel-item]>.layui-carousel-prev,.layui-carousel>[carousel-item]>.layui-this{display:block}.layui-carousel>[carousel-item]>.layui-this{left:0}.layui-carousel>[carousel-item]>.layui-carousel-prev{left:-100%}.layui-carousel>[carousel-item]>.layui-carousel-next{left:100%}.layui-carousel>[carousel-item]>.layui-carousel-next.layui-carousel-left,.layui-carousel>[carousel-item]>.layui-carousel-prev.layui-carousel-right{left:0}.layui-carousel>[carousel-item]>.layui-this.layui-carousel-left{left:-100%}.layui-carousel>[carousel-item]>.layui-this.layui-carousel-right{left:100%}.layui-carousel[lay-anim=updown] .layui-carousel-arrow{left:50%!important;top:20px;margin:0 0 0 -18px}.layui-carousel[lay-anim=updown]>[carousel-item]>*,.layui-carousel[lay-anim=fade]>[carousel-item]>*{left:0!important}.layui-carousel[lay-anim=updown] .layui-carousel-arrow[lay-type=add]{top:auto!important;bottom:20px}.layui-carousel[lay-anim=updown] .layui-carousel-ind{position:absolute;top:50%;right:20px;width:auto;height:auto}.layui-carousel[lay-anim=updown] .layui-carousel-ind ul{padding:3px 5px}.layui-carousel[lay-anim=updown] .layui-carousel-ind li{display:block;margin:6px 0}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-this{top:0}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-prev{top:-100%}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-next{top:100%}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-next.layui-carousel-left,.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-carousel-prev.layui-carousel-right{top:0}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-this.layui-carousel-left{top:-100%}.layui-carousel[lay-anim=updown]>[carousel-item]>.layui-this.layui-carousel-right{top:100%}.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-next,.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-prev{opacity:0}.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-next.layui-carousel-left,.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-carousel-prev.layui-carousel-right{opacity:1}.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-this.layui-carousel-left,.layui-carousel[lay-anim=fade]>[carousel-item]>.layui-this.layui-carousel-right{opacity:0}.layui-fixbar{position:fixed;right:15px;bottom:15px;z-index:999999}.layui-fixbar li{width:50px;height:50px;line-height:50px;margin-bottom:1px;text-align:center;cursor:pointer;font-size:30px;background-color:#9F9F9F;color:#fff;border-radius:2px;opacity:.95}.layui-fixbar li:hover{opacity:.85}.layui-fixbar li:active{opacity:1}.layui-fixbar .layui-fixbar-top{display:none;font-size:40px}body .layui-util-face{border:none;background:0 0}body .layui-util-face .layui-layer-content{padding:0;background-color:#fff;color:#666;box-shadow:none}.layui-util-face .layui-layer-TipsG{display:none}.layui-util-face ul{position:relative;width:372px;padding:10px;border:1px solid #D9D9D9;background-color:#fff;box-shadow:0 0 20px rgba(0,0,0,.2)}.layui-util-face ul li{cursor:pointer;float:left;border:1px solid #e8e8e8;height:22px;width:26px;overflow:hidden;margin:-1px 0 0 -1px;padding:4px 2px;text-align:center}.layui-util-face ul li:hover{position:relative;z-index:2;border:1px solid #eb7350;background:#fff9ec}.layui-code{position:relative;margin:10px 0;padding:15px;line-height:20px;border:1px solid #ddd;border-left-width:6px;background-color:#F2F2F2;color:#333;font-family:Courier New;font-size:12px}.layui-rate,.layui-rate *{display:inline-block;vertical-align:middle}.layui-rate{padding:10px 5px 10px 0;font-size:0}.layui-rate li i.layui-icon{font-size:20px;color:#FFB800;margin-right:5px;transition:all .3s;-webkit-transition:all .3s}.layui-rate li i:hover{cursor:pointer;transform:scale(1.12);-webkit-transform:scale(1.12)}.layui-rate[readonly] li i:hover{cursor:default;transform:scale(1)}.layui-colorpicker{width:26px;height:26px;border:1px solid #e6e6e6;padding:5px;border-radius:2px;line-height:24px;display:inline-block;cursor:pointer;transition:all .3s;-webkit-transition:all .3s}.layui-colorpicker:hover{border-color:#d2d2d2}.layui-colorpicker.layui-colorpicker-lg{width:34px;height:34px;line-height:32px}.layui-colorpicker.layui-colorpicker-sm{width:24px;height:24px;line-height:22px}.layui-colorpicker.layui-colorpicker-xs{width:22px;height:22px;line-height:20px}.layui-colorpicker-trigger-bgcolor{display:block;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==);border-radius:2px}.layui-colorpicker-trigger-span{display:block;height:100%;box-sizing:border-box;border:1px solid rgba(0,0,0,.15);border-radius:2px;text-align:center}.layui-colorpicker-trigger-i{display:inline-block;color:#FFF;font-size:12px}.layui-colorpicker-trigger-i.layui-icon-close{color:#999}.layui-colorpicker-main{position:absolute;z-index:66666666;width:280px;padding:7px;background:#FFF;border:1px solid #d2d2d2;border-radius:2px;box-shadow:0 2px 4px rgba(0,0,0,.12)}.layui-colorpicker-main-wrapper{height:180px;position:relative}.layui-colorpicker-basis{width:260px;height:100%;position:relative}.layui-colorpicker-basis-white{width:100%;height:100%;position:absolute;top:0;left:0;background:linear-gradient(90deg,#FFF,hsla(0,0%,100%,0))}.layui-colorpicker-basis-black{width:100%;height:100%;position:absolute;top:0;left:0;background:linear-gradient(0deg,#000,transparent)}.layui-colorpicker-basis-cursor{width:10px;height:10px;border:1px solid #FFF;border-radius:50%;position:absolute;top:-3px;right:-3px;cursor:pointer}.layui-colorpicker-side{position:absolute;top:0;right:0;width:12px;height:100%;background:linear-gradient(red,#FF0,#0F0,#0FF,#00F,#F0F,red)}.layui-colorpicker-side-slider{width:100%;height:5px;box-shadow:0 0 1px #888;box-sizing:border-box;background:#FFF;border-radius:1px;border:1px solid #f0f0f0;cursor:pointer;position:absolute;left:0}.layui-colorpicker-main-alpha{display:none;height:12px;margin-top:7px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==)}.layui-colorpicker-alpha-bgcolor{height:100%;position:relative}.layui-colorpicker-alpha-slider{width:5px;height:100%;box-shadow:0 0 1px #888;box-sizing:border-box;background:#FFF;border-radius:1px;border:1px solid #f0f0f0;cursor:pointer;position:absolute;top:0}.layui-colorpicker-main-pre{padding-top:7px;font-size:0}.layui-colorpicker-pre{width:20px;height:20px;border-radius:2px;display:inline-block;margin-left:6px;margin-bottom:7px;cursor:pointer}.layui-colorpicker-pre:nth-child(11n+1){margin-left:0}.layui-colorpicker-pre-isalpha{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAADZF8uwAAAAGUlEQVQYV2M4gwH+YwCGIasIUwhT25BVBADtzYNYrHvv4gAAAABJRU5ErkJggg==)}.layui-colorpicker-pre.layui-this{box-shadow:0 0 3px 2px rgba(0,0,0,.15)}.layui-colorpicker-pre>div{height:100%;border-radius:2px}.layui-colorpicker-main-input{text-align:right;padding-top:7px}.layui-colorpicker-main-input .layui-btn-container .layui-btn{margin:0 0 0 10px}.layui-colorpicker-main-input div.layui-inline{float:left;margin-right:10px;font-size:14px}.layui-colorpicker-main-input input.layui-input{width:150px;height:30px;color:#666}.layui-slider{height:4px;background:#e2e2e2;border-radius:3px;position:relative;cursor:pointer}.layui-slider-bar{border-radius:3px;position:absolute;height:100%}.layui-slider-step{position:absolute;top:0;width:4px;height:4px;border-radius:50%;background:#FFF;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.layui-slider-wrap{width:36px;height:36px;position:absolute;top:-16px;-webkit-transform:translateX(-50%);transform:translateX(-50%);z-index:10;text-align:center}.layui-slider-wrap-btn{width:12px;height:12px;border-radius:50%;background:#FFF;display:inline-block;vertical-align:middle;cursor:pointer;transition:.3s}.layui-slider-wrap:after{content:"";height:100%;display:inline-block;vertical-align:middle}.layui-slider-wrap-btn.layui-slider-hover,.layui-slider-wrap-btn:hover{transform:scale(1.2)}.layui-slider-wrap-btn.layui-disabled:hover{transform:scale(1)!important}.layui-slider-tips{position:absolute;top:-42px;z-index:66666666;white-space:nowrap;display:none;-webkit-transform:translateX(-50%);transform:translateX(-50%);color:#FFF;background:#000;border-radius:3px;height:25px;line-height:25px;padding:0 10px}.layui-slider-tips:after{content:'';position:absolute;bottom:-12px;left:50%;margin-left:-6px;width:0;height:0;border-width:6px;border-style:solid;border-color:#000 transparent transparent}.layui-slider-input{width:70px;height:32px;border:1px solid #e6e6e6;border-radius:3px;font-size:16px;line-height:32px;position:absolute;right:0;top:-15px}.layui-slider-input-btn{display:none;position:absolute;top:0;right:0;width:20px;height:100%;border-left:1px solid #d2d2d2}.layui-slider-input-btn i{cursor:pointer;position:absolute;right:0;bottom:0;width:20px;height:50%;font-size:12px;line-height:16px;text-align:center;color:#999}.layui-slider-input-btn i:first-child{top:0;border-bottom:1px solid #d2d2d2}.layui-slider-input-txt{height:100%;font-size:14px}.layui-slider-input-txt input{height:100%;border:none}.layui-slider-input-btn i:hover{color:#009688}.layui-slider-vertical{width:4px;margin-left:34px}.layui-slider-vertical .layui-slider-bar{width:4px}.layui-slider-vertical .layui-slider-step{top:auto;left:0;-webkit-transform:translateY(50%);transform:translateY(50%)}.layui-slider-vertical .layui-slider-wrap{top:auto;left:-16px;-webkit-transform:translateY(50%);transform:translateY(50%)}.layui-slider-vertical .layui-slider-tips{top:auto;left:2px}@media \0screen{.layui-slider-wrap-btn{margin-left:-20px}.layui-slider-vertical .layui-slider-wrap-btn{margin-left:0;margin-bottom:-20px}.layui-slider-vertical .layui-slider-tips{margin-left:-8px}.layui-slider>span{margin-left:8px}}.layui-tree{line-height:22px}.layui-tree .layui-form-checkbox{margin:0!important}.layui-tree-set{width:100%;position:relative}.layui-tree-pack{display:none;padding-left:20px;position:relative}.layui-tree-iconClick,.layui-tree-main{display:inline-block;vertical-align:middle}.layui-tree-line .layui-tree-pack{padding-left:27px}.layui-tree-line .layui-tree-set .layui-tree-set:after{content:'';position:absolute;top:14px;left:-9px;width:17px;height:0;border-top:1px dotted #c0c4cc}.layui-tree-entry{position:relative;padding:3px 0;height:20px;white-space:nowrap}.layui-tree-entry:hover{background-color:#eee}.layui-tree-line .layui-tree-entry:hover{background-color:rgba(0,0,0,0)}.layui-tree-line .layui-tree-entry:hover .layui-tree-txt{color:#999;text-decoration:underline;transition:.3s}.layui-tree-main{cursor:pointer;padding-right:10px}.layui-tree-line .layui-tree-set:before{content:'';position:absolute;top:0;left:-9px;width:0;height:100%;border-left:1px dotted #c0c4cc}.layui-tree-line .layui-tree-set.layui-tree-setLineShort:before{height:13px}.layui-tree-line .layui-tree-set.layui-tree-setHide:before{height:0}.layui-tree-iconClick{position:relative;height:20px;line-height:20px;margin:0 10px;color:#c0c4cc}.layui-tree-icon{height:12px;line-height:12px;width:12px;text-align:center;border:1px solid #c0c4cc}.layui-tree-iconClick .layui-icon{font-size:18px}.layui-tree-icon .layui-icon{font-size:12px;color:#666}.layui-tree-iconArrow{padding:0 5px}.layui-tree-iconArrow:after{content:'';position:absolute;left:4px;top:3px;z-index:100;width:0;height:0;border-width:5px;border-style:solid;border-color:transparent transparent transparent #c0c4cc;transition:.5s}.layui-tree-btnGroup,.layui-tree-editInput{position:relative;vertical-align:middle;display:inline-block}.layui-tree-spread>.layui-tree-entry>.layui-tree-iconClick>.layui-tree-iconArrow:after{transform:rotate(90deg) translate(3px,4px)}.layui-tree-txt{display:inline-block;vertical-align:middle;color:#555}.layui-tree-search{margin-bottom:15px;color:#666}.layui-tree-btnGroup .layui-icon{display:inline-block;vertical-align:middle;padding:0 2px;cursor:pointer}.layui-tree-btnGroup .layui-icon:hover{color:#999;transition:.3s}.layui-tree-entry:hover .layui-tree-btnGroup{visibility:visible}.layui-tree-editInput{height:20px;line-height:20px;padding:0 3px;border:none;background-color:rgba(0,0,0,.05)}.layui-tree-emptyText{text-align:center;color:#999}.layui-anim{-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.layui-anim.layui-icon{display:inline-block}.layui-anim-loop{-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite}.layui-trans,.layui-trans a{transition:all .3s;-webkit-transition:all .3s}@-webkit-keyframes layui-rotate{from{-webkit-transform:rotate(0)}to{-webkit-transform:rotate(360deg)}}@keyframes layui-rotate{from{transform:rotate(0)}to{transform:rotate(360deg)}}.layui-anim-rotate{-webkit-animation-name:layui-rotate;animation-name:layui-rotate;-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-timing-function:linear;animation-timing-function:linear}@-webkit-keyframes layui-up{from{-webkit-transform:translate3d(0,100%,0);opacity:.3}to{-webkit-transform:translate3d(0,0,0);opacity:1}}@keyframes layui-up{from{transform:translate3d(0,100%,0);opacity:.3}to{transform:translate3d(0,0,0);opacity:1}}.layui-anim-up{-webkit-animation-name:layui-up;animation-name:layui-up}@-webkit-keyframes layui-upbit{from{-webkit-transform:translate3d(0,30px,0);opacity:.3}to{-webkit-transform:translate3d(0,0,0);opacity:1}}@keyframes layui-upbit{from{transform:translate3d(0,30px,0);opacity:.3}to{transform:translate3d(0,0,0);opacity:1}}.layui-anim-upbit{-webkit-animation-name:layui-upbit;animation-name:layui-upbit}@-webkit-keyframes layui-scale{0%{opacity:.3;-webkit-transform:scale(.5)}100%{opacity:1;-webkit-transform:scale(1)}}@keyframes layui-scale{0%{opacity:.3;-ms-transform:scale(.5);transform:scale(.5)}100%{opacity:1;-ms-transform:scale(1);transform:scale(1)}}.layui-anim-scale{-webkit-animation-name:layui-scale;animation-name:layui-scale}@-webkit-keyframes layui-scale-spring{0%{opacity:.5;-webkit-transform:scale(.5)}80%{opacity:.8;-webkit-transform:scale(1.1)}100%{opacity:1;-webkit-transform:scale(1)}}@keyframes layui-scale-spring{0%{opacity:.5;transform:scale(.5)}80%{opacity:.8;transform:scale(1.1)}100%{opacity:1;transform:scale(1)}}.layui-anim-scaleSpring{-webkit-animation-name:layui-scale-spring;animation-name:layui-scale-spring}@-webkit-keyframes layui-fadein{0%{opacity:0}100%{opacity:1}}@keyframes layui-fadein{0%{opacity:0}100%{opacity:1}}.layui-anim-fadein{-webkit-animation-name:layui-fadein;animation-name:layui-fadein}@-webkit-keyframes layui-fadeout{0%{opacity:1}100%{opacity:0}}@keyframes layui-fadeout{0%{opacity:1}100%{opacity:0}}.layui-anim-fadeout{-webkit-animation-name:layui-fadeout;animation-name:layui-fadeout}
 /** layui-v2.5.6 MIT License By https://www.layui.com */
 .layui-layer-imgbar,.layui-layer-imgtit a,.layui-layer-tab .layui-layer-title span,.layui-layer-title{text-overflow:ellipsis;white-space:nowrap}html #layuicss-layer{display:none;position:absolute;width:1989px}.layui-layer,.layui-layer-shade{position:fixed;_position:absolute;pointer-events:auto}.layui-layer-shade{top:0;left:0;width:100%;height:100%;_height:expression(document.body.offsetHeight+"px")}.layui-layer{-webkit-overflow-scrolling:touch;top:150px;left:0;margin:0;padding:0;background-color:#fff;-webkit-background-clip:content;border-radius:2px;box-shadow:1px 1px 50px rgba(0,0,0,.3)}.layui-layer-close{position:absolute}.layui-layer-content{position:relative}.layui-layer-border{border:1px solid #B2B2B2;border:1px solid rgba(0,0,0,.1);box-shadow:1px 1px 5px rgba(0,0,0,.2)}.layui-layer-load{background:url(loading-1.gif) center center no-repeat #eee}.layui-layer-ico{background:url(<?php echo WZHOST;?>Tpl/layui/css/modules/layer/default/icon.png) no-repeat}.layui-layer-btn a,.layui-layer-dialog .layui-layer-ico,.layui-layer-setwin a{display:inline-block;*display:inline;*zoom:1;vertical-align:top}.layui-layer-move{display:none;position:fixed;*position:absolute;left:0;top:0;width:100%;height:100%;cursor:move;opacity:0;filter:alpha(opacity=0);background-color:#fff;z-index:2147483647}.layui-layer-resize{position:absolute;width:15px;height:15px;right:0;bottom:0;cursor:se-resize}.layer-anim{-webkit-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-duration:.3s;animation-duration:.3s}@-webkit-keyframes layer-bounceIn{0%{opacity:0;-webkit-transform:scale(.5);transform:scale(.5)}100%{opacity:1;-webkit-transform:scale(1);transform:scale(1)}}@keyframes layer-bounceIn{0%{opacity:0;-webkit-transform:scale(.5);-ms-transform:scale(.5);transform:scale(.5)}100%{opacity:1;-webkit-transform:scale(1);-ms-transform:scale(1);transform:scale(1)}}.layer-anim-00{-webkit-animation-name:layer-bounceIn;animation-name:layer-bounceIn}@-webkit-keyframes layer-zoomInDown{0%{opacity:0;-webkit-transform:scale(.1) translateY(-2000px);transform:scale(.1) translateY(-2000px);-webkit-animation-timing-function:ease-in-out;animation-timing-function:ease-in-out}60%{opacity:1;-webkit-transform:scale(.475) translateY(60px);transform:scale(.475) translateY(60px);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}@keyframes layer-zoomInDown{0%{opacity:0;-webkit-transform:scale(.1) translateY(-2000px);-ms-transform:scale(.1) translateY(-2000px);transform:scale(.1) translateY(-2000px);-webkit-animation-timing-function:ease-in-out;animation-timing-function:ease-in-out}60%{opacity:1;-webkit-transform:scale(.475) translateY(60px);-ms-transform:scale(.475) translateY(60px);transform:scale(.475) translateY(60px);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}.layer-anim-01{-webkit-animation-name:layer-zoomInDown;animation-name:layer-zoomInDown}@-webkit-keyframes layer-fadeInUpBig{0%{opacity:0;-webkit-transform:translateY(2000px);transform:translateY(2000px)}100%{opacity:1;-webkit-transform:translateY(0);transform:translateY(0)}}@keyframes layer-fadeInUpBig{0%{opacity:0;-webkit-transform:translateY(2000px);-ms-transform:translateY(2000px);transform:translateY(2000px)}100%{opacity:1;-webkit-transform:translateY(0);-ms-transform:translateY(0);transform:translateY(0)}}.layer-anim-02{-webkit-animation-name:layer-fadeInUpBig;animation-name:layer-fadeInUpBig}@-webkit-keyframes layer-zoomInLeft{0%{opacity:0;-webkit-transform:scale(.1) translateX(-2000px);transform:scale(.1) translateX(-2000px);-webkit-animation-timing-function:ease-in-out;animation-timing-function:ease-in-out}60%{opacity:1;-webkit-transform:scale(.475) translateX(48px);transform:scale(.475) translateX(48px);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}@keyframes layer-zoomInLeft{0%{opacity:0;-webkit-transform:scale(.1) translateX(-2000px);-ms-transform:scale(.1) translateX(-2000px);transform:scale(.1) translateX(-2000px);-webkit-animation-timing-function:ease-in-out;animation-timing-function:ease-in-out}60%{opacity:1;-webkit-transform:scale(.475) translateX(48px);-ms-transform:scale(.475) translateX(48px);transform:scale(.475) translateX(48px);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}.layer-anim-03{-webkit-animation-name:layer-zoomInLeft;animation-name:layer-zoomInLeft}@-webkit-keyframes layer-rollIn{0%{opacity:0;-webkit-transform:translateX(-100%) rotate(-120deg);transform:translateX(-100%) rotate(-120deg)}100%{opacity:1;-webkit-transform:translateX(0) rotate(0);transform:translateX(0) rotate(0)}}@keyframes layer-rollIn{0%{opacity:0;-webkit-transform:translateX(-100%) rotate(-120deg);-ms-transform:translateX(-100%) rotate(-120deg);transform:translateX(-100%) rotate(-120deg)}100%{opacity:1;-webkit-transform:translateX(0) rotate(0);-ms-transform:translateX(0) rotate(0);transform:translateX(0) rotate(0)}}.layer-anim-04{-webkit-animation-name:layer-rollIn;animation-name:layer-rollIn}@keyframes layer-fadeIn{0%{opacity:0}100%{opacity:1}}.layer-anim-05{-webkit-animation-name:layer-fadeIn;animation-name:layer-fadeIn}@-webkit-keyframes layer-shake{0%,100%{-webkit-transform:translateX(0);transform:translateX(0)}10%,30%,50%,70%,90%{-webkit-transform:translateX(-10px);transform:translateX(-10px)}20%,40%,60%,80%{-webkit-transform:translateX(10px);transform:translateX(10px)}}@keyframes layer-shake{0%,100%{-webkit-transform:translateX(0);-ms-transform:translateX(0);transform:translateX(0)}10%,30%,50%,70%,90%{-webkit-transform:translateX(-10px);-ms-transform:translateX(-10px);transform:translateX(-10px)}20%,40%,60%,80%{-webkit-transform:translateX(10px);-ms-transform:translateX(10px);transform:translateX(10px)}}.layer-anim-06{-webkit-animation-name:layer-shake;animation-name:layer-shake}@-webkit-keyframes fadeIn{0%{opacity:0}100%{opacity:1}}.layui-layer-title{padding:0 80px 0 20px;height:42px;line-height:42px;border-bottom:1px solid #eee;font-size:14px;color:#333;overflow:hidden;background-color:#F8F8F8;border-radius:2px 2px 0 0}.layui-layer-setwin{position:absolute;right:15px;*right:0;top:15px;font-size:0;line-height:initial}.layui-layer-setwin a{position:relative;width:16px;height:16px;margin-left:10px;font-size:12px;_overflow:hidden}.layui-layer-setwin .layui-layer-min cite{position:absolute;width:14px;height:2px;left:0;top:50%;margin-top:-1px;background-color:#2E2D3C;cursor:pointer;_overflow:hidden}.layui-layer-setwin .layui-layer-min:hover cite{background-color:#2D93CA}.layui-layer-setwin .layui-layer-max{background-position:-32px -40px}.layui-layer-setwin .layui-layer-max:hover{background-position:-16px -40px}.layui-layer-setwin .layui-layer-maxmin{background-position:-65px -40px}.layui-layer-setwin .layui-layer-maxmin:hover{background-position:-49px -40px}.layui-layer-setwin .layui-layer-close1{background-position:1px -40px;cursor:pointer}.layui-layer-setwin .layui-layer-close1:hover{opacity:.7}.layui-layer-setwin .layui-layer-close2{position:absolute;right:-28px;top:-28px;width:30px;height:30px;margin-left:0;background-position:-149px -31px;*right:-18px;_display:none}.layui-layer-setwin .layui-layer-close2:hover{background-position:-180px -31px}.layui-layer-btn{text-align:right;padding:0 15px 12px;pointer-events:auto;user-select:none;-webkit-user-select:none}.layui-layer-btn a{height:28px;line-height:28px;margin:5px 5px 0;padding:0 15px;border:1px solid #dedede;background-color:#fff;color:#333;border-radius:2px;font-weight:400;cursor:pointer;text-decoration:none}.layui-layer-btn a:hover{opacity:.9;text-decoration:none}.layui-layer-btn a:active{opacity:.8}.layui-layer-btn .layui-layer-btn0{border-color:#1E9FFF;background-color:#1E9FFF;color:#fff}.layui-layer-btn-l{text-align:left}.layui-layer-btn-c{text-align:center}.layui-layer-dialog{min-width:260px}.layui-layer-dialog .layui-layer-content{position:relative;padding:20px;line-height:24px;word-break:break-all;overflow:hidden;font-size:14px;overflow-x:hidden;overflow-y:auto}.layui-layer-dialog .layui-layer-content .layui-layer-ico{position:absolute;top:16px;left:15px;_left:-40px;width:30px;height:30px}.layui-layer-ico1{background-position:-30px 0}.layui-layer-ico2{background-position:-60px 0}.layui-layer-ico3{background-position:-90px 0}.layui-layer-ico4{background-position:-120px 0}.layui-layer-ico5{background-position:-150px 0}.layui-layer-ico6{background-position:-180px 0}.layui-layer-rim{border:6px solid #8D8D8D;border:6px solid rgba(0,0,0,.3);border-radius:5px;box-shadow:none}.layui-layer-msg{min-width:180px;border:1px solid #D3D4D3;box-shadow:none}.layui-layer-hui{min-width:100px;background-color:#000;filter:alpha(opacity=60);background-color:rgba(0,0,0,.6);color:#fff;border:none}.layui-layer-hui .layui-layer-content{padding:12px 25px;text-align:center}.layui-layer-dialog .layui-layer-padding{padding:20px 20px 20px 55px;text-align:left}.layui-layer-page .layui-layer-content{position:relative;overflow:auto}.layui-layer-iframe .layui-layer-btn,.layui-layer-page .layui-layer-btn{padding-top:10px}.layui-layer-nobg{background:0 0}.layui-layer-iframe iframe{display:block;width:100%}.layui-layer-loading{border-radius:100%;background:0 0;box-shadow:none;border:none}.layui-layer-loading .layui-layer-content{width:60px;height:24px;background:url(loading-0.gif) no-repeat}.layui-layer-loading .layui-layer-loading1{width:37px;height:37px;background:url(loading-1.gif) no-repeat}.layui-layer-ico16,.layui-layer-loading .layui-layer-loading2{width:32px;height:32px;background:url(loading-2.gif) no-repeat}.layui-layer-tips{background:0 0;box-shadow:none;border:none}.layui-layer-tips .layui-layer-content{position:relative;line-height:22px;min-width:12px;padding:8px 15px;font-size:12px;_float:left;border-radius:2px;box-shadow:1px 1px 3px rgba(0,0,0,.2);background-color:#000;color:#fff}.layui-layer-tips .layui-layer-close{right:-2px;top:-1px}.layui-layer-tips i.layui-layer-TipsG{position:absolute;width:0;height:0;border-width:8px;border-color:transparent;border-style:dashed;*overflow:hidden}.layui-layer-tips i.layui-layer-TipsB,.layui-layer-tips i.layui-layer-TipsT{left:5px;border-right-style:solid;border-right-color:#000}.layui-layer-tips i.layui-layer-TipsT{bottom:-8px}.layui-layer-tips i.layui-layer-TipsB{top:-8px}.layui-layer-tips i.layui-layer-TipsL,.layui-layer-tips i.layui-layer-TipsR{top:5px;border-bottom-style:solid;border-bottom-color:#000}.layui-layer-tips i.layui-layer-TipsR{left:-8px}.layui-layer-tips i.layui-layer-TipsL{right:-8px}.layui-layer-lan[type=dialog]{min-width:280px}.layui-layer-lan .layui-layer-title{background:#4476A7;color:#fff;border:none}.layui-layer-lan .layui-layer-btn{padding:5px 10px 10px;text-align:right;border-top:1px solid #E9E7E7}.layui-layer-lan .layui-layer-btn a{background:#fff;border-color:#E9E7E7;color:#333}.layui-layer-lan .layui-layer-btn .layui-layer-btn1{background:#C9C5C5}.layui-layer-molv .layui-layer-title{background:#009f95;color:#fff;border:none}.layui-layer-molv .layui-layer-btn a{background:#009f95;border-color:#009f95}.layui-layer-molv .layui-layer-btn .layui-layer-btn1{background:#92B8B1}.layui-layer-iconext{background:url(icon-ext.png) no-repeat}.layui-layer-prompt .layui-layer-input{display:block;width:230px;height:36px;margin:0 auto;line-height:30px;padding-left:10px;border:1px solid #e6e6e6;color:#333}.layui-layer-prompt textarea.layui-layer-input{width:300px;height:100px;line-height:20px;padding:6px 10px}.layui-layer-prompt .layui-layer-content{padding:20px}.layui-layer-prompt .layui-layer-btn{padding-top:0}.layui-layer-tab{box-shadow:1px 1px 50px rgba(0,0,0,.4)}.layui-layer-tab .layui-layer-title{padding-left:0;overflow:visible}.layui-layer-tab .layui-layer-title span{position:relative;float:left;min-width:80px;max-width:260px;padding:0 20px;text-align:center;overflow:hidden;cursor:pointer}.layui-layer-tab .layui-layer-title span.layui-this{height:43px;border-left:1px solid #eee;border-right:1px solid #eee;background-color:#fff;z-index:10}.layui-layer-tab .layui-layer-title span:first-child{border-left:none}.layui-layer-tabmain{line-height:24px;clear:both}.layui-layer-tabmain .layui-layer-tabli{display:none}.layui-layer-tabmain .layui-layer-tabli.layui-this{display:block}.layui-layer-photos{-webkit-animation-duration:.8s;animation-duration:.8s}.layui-layer-photos .layui-layer-content{overflow:hidden;text-align:center}.layui-layer-photos .layui-layer-phimg img{position:relative;width:100%;display:inline-block;*display:inline;*zoom:1;vertical-align:top}.layui-layer-imgbar,.layui-layer-imguide{display:none}.layui-layer-imgnext,.layui-layer-imgprev{position:absolute;top:50%;width:27px;_width:44px;height:44px;margin-top:-22px;outline:0;blr:expression(this.onFocus=this.blur())}.layui-layer-imgprev{left:10px;background-position:-5px -5px;_background-position:-70px -5px}.layui-layer-imgprev:hover{background-position:-33px -5px;_background-position:-120px -5px}.layui-layer-imgnext{right:10px;_right:8px;background-position:-5px -50px;_background-position:-70px -50px}.layui-layer-imgnext:hover{background-position:-33px -50px;_background-position:-120px -50px}.layui-layer-imgbar{position:absolute;left:0;bottom:0;width:100%;height:32px;line-height:32px;background-color:rgba(0,0,0,.8);background-color:#000\9;filter:Alpha(opacity=80);color:#fff;overflow:hidden;font-size:0}.layui-layer-imgtit *{display:inline-block;*display:inline;*zoom:1;vertical-align:top;font-size:12px}.layui-layer-imgtit a{max-width:65%;overflow:hidden;color:#fff}.layui-layer-imgtit a:hover{color:#fff;text-decoration:underline}.layui-layer-imgtit em{padding-left:10px;font-style:normal}@-webkit-keyframes layer-bounceOut{100%{opacity:0;-webkit-transform:scale(.7);transform:scale(.7)}30%{-webkit-transform:scale(1.05);transform:scale(1.05)}0%{-webkit-transform:scale(1);transform:scale(1)}}@keyframes layer-bounceOut{100%{opacity:0;-webkit-transform:scale(.7);-ms-transform:scale(.7);transform:scale(.7)}30%{-webkit-transform:scale(1.05);-ms-transform:scale(1.05);transform:scale(1.05)}0%{-webkit-transform:scale(1);-ms-transform:scale(1);transform:scale(1)}}.layer-anim-close{-webkit-animation-name:layer-bounceOut;animation-name:layer-bounceOut;-webkit-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-duration:.2s;animation-duration:.2s}@media screen and (max-width:1100px){.layui-layer-iframe{overflow-y:auto;-webkit-overflow-scrolling:touch}}
 /** layui-v2.5.6 MIT License By https://www.layui.com */
 .laydate-set-ym,.layui-laydate,.layui-laydate *,.layui-laydate-list{box-sizing:border-box}html #layuicss-laydate{display:none;position:absolute;width:1989px}.layui-laydate *{margin:0;padding:0}.layui-laydate{position:absolute;z-index:66666666;margin:5px 0;border-radius:2px;font-size:14px;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-name:laydate-upbit;animation-name:laydate-upbit}.layui-laydate-main{width:272px}.layui-laydate-content td,.layui-laydate-header *,.layui-laydate-list li{transition-duration:.3s;-webkit-transition-duration:.3s}@-webkit-keyframes laydate-upbit{from{-webkit-transform:translate3d(0,20px,0);opacity:.3}to{-webkit-transform:translate3d(0,0,0);opacity:1}}@keyframes laydate-upbit{from{transform:translate3d(0,20px,0);opacity:.3}to{transform:translate3d(0,0,0);opacity:1}}.layui-laydate-static{position:relative;z-index:0;display:inline-block;margin:0;-webkit-animation:none;animation:none}.laydate-ym-show .laydate-next-m,.laydate-ym-show .laydate-prev-m{display:none!important}.laydate-ym-show .laydate-next-y,.laydate-ym-show .laydate-prev-y{display:inline-block!important}.laydate-time-show .laydate-set-ym span[lay-type=month],.laydate-time-show .laydate-set-ym span[lay-type=year],.laydate-time-show .layui-laydate-header .layui-icon,.laydate-ym-show .laydate-set-ym span[lay-type=month]{display:none!important}.layui-laydate-header{position:relative;line-height:30px;padding:10px 70px 5px}.laydate-set-ym span,.layui-laydate-header i{padding:0 5px;cursor:pointer}.layui-laydate-header *{display:inline-block;vertical-align:bottom}.layui-laydate-header i{position:absolute;top:10px;color:#999;font-size:18px}.layui-laydate-header i.laydate-prev-y{left:15px}.layui-laydate-header i.laydate-prev-m{left:45px}.layui-laydate-header i.laydate-next-y{right:15px}.layui-laydate-header i.laydate-next-m{right:45px}.laydate-set-ym{width:100%;text-align:center;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.laydate-time-text{cursor:default!important}.layui-laydate-content{position:relative;padding:10px;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none}.layui-laydate-content table{border-collapse:collapse;border-spacing:0}.layui-laydate-content td,.layui-laydate-content th{width:36px;height:30px;padding:5px;text-align:center}.layui-laydate-content td{position:relative;cursor:pointer}.laydate-day-mark{position:absolute;left:0;top:0;width:100%;height:100%;line-height:30px;font-size:12px;overflow:hidden}.laydate-day-mark::after{position:absolute;content:'';right:2px;top:2px;width:5px;height:5px;border-radius:50%}.layui-laydate-footer{position:relative;height:46px;line-height:26px;padding:10px 20px}.layui-laydate-footer span{margin-right:15px;display:inline-block;cursor:pointer;font-size:12px}.layui-laydate-footer span:hover{color:#5FB878}.laydate-footer-btns{position:absolute;right:10px;top:10px}.laydate-footer-btns span{height:26px;line-height:26px;margin:0 0 0 -1px;padding:0 10px;border:1px solid #C9C9C9;background-color:#fff;white-space:nowrap;vertical-align:top;border-radius:2px}.layui-laydate-list>li,.layui-laydate-range .layui-laydate-main{display:inline-block;vertical-align:middle}.layui-laydate-list{position:absolute;left:0;top:0;width:100%;height:100%;padding:10px;background-color:#fff}.layui-laydate-list>li{position:relative;width:33.3%;height:36px;line-height:36px;margin:3px 0;text-align:center;cursor:pointer}.laydate-month-list>li{width:25%;margin:17px 0}.laydate-time-list>li{height:100%;margin:0;line-height:normal;cursor:default}.laydate-time-list p{position:relative;top:-4px;line-height:29px}.laydate-time-list ol{height:181px;overflow:hidden}.laydate-time-list>li:hover ol{overflow-y:auto}.laydate-time-list ol li{width:130%;padding-left:33px;line-height:30px;text-align:left;cursor:pointer}.layui-laydate-hint{position:absolute;top:115px;left:50%;width:250px;margin-left:-125px;line-height:20px;padding:15px;text-align:center;font-size:12px}.layui-laydate-range{width:546px}.layui-laydate-range .laydate-main-list-0 .laydate-next-m,.layui-laydate-range .laydate-main-list-0 .laydate-next-y,.layui-laydate-range .laydate-main-list-1 .laydate-prev-m,.layui-laydate-range .laydate-main-list-1 .laydate-prev-y{display:none}.layui-laydate-range .laydate-main-list-1 .layui-laydate-content{border-left:1px solid #e2e2e2}.layui-laydate,.layui-laydate-hint{border:1px solid #d2d2d2;box-shadow:0 2px 4px rgba(0,0,0,.12);background-color:#fff;color:#666}.layui-laydate-header{border-bottom:1px solid #e2e2e2}.layui-laydate-header i:hover,.layui-laydate-header span:hover{color:#5FB878}.layui-laydate-content{border-top:none 0;border-bottom:none 0}.layui-laydate-content th{font-weight:400;color:#333}.layui-laydate-content td{color:#666}.layui-laydate-content td.laydate-selected{background-color:#00F7DE}.laydate-selected:hover{background-color:#00F7DE!important}.layui-laydate-content td:hover,.layui-laydate-list li:hover{background-color:#eaeaea;color:#333}.laydate-time-list li ol{margin:0;padding:0;border:1px solid #e2e2e2;border-left-width:0}.laydate-time-list li:first-child ol{border-left-width:1px}.laydate-time-list>li:hover{background:0 0}.layui-laydate-content .laydate-day-next,.layui-laydate-content .laydate-day-prev{color:#d2d2d2}.laydate-selected.laydate-day-next,.laydate-selected.laydate-day-prev{background-color:#f8f8f8!important}.layui-laydate-footer{border-top:1px solid #e2e2e2}.layui-laydate-hint{color:#FF5722}.laydate-day-mark::after{background-color:#5FB878}.layui-laydate-content td.layui-this .laydate-day-mark::after{display:none}.layui-laydate-footer span[lay-type=date]{color:#5FB878}.layui-laydate .layui-this{background-color:#009688!important;color:#fff!important}.layui-laydate .laydate-disabled,.layui-laydate .laydate-disabled:hover{background:0 0!important;color:#d2d2d2!important;cursor:not-allowed!important;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none}.laydate-theme-molv{border:none}.laydate-theme-molv.layui-laydate-range{width:548px}.laydate-theme-molv .layui-laydate-main{width:274px}.laydate-theme-molv .layui-laydate-header{border:none;background-color:#009688}.laydate-theme-molv .layui-laydate-header i,.laydate-theme-molv .layui-laydate-header span{color:#f6f6f6}.laydate-theme-molv .layui-laydate-header i:hover,.laydate-theme-molv .layui-laydate-header span:hover{color:#fff}.laydate-theme-molv .layui-laydate-content{border:1px solid #e2e2e2;border-top:none;border-bottom:none}.laydate-theme-molv .laydate-main-list-1 .layui-laydate-content{border-left:none}.laydate-theme-grid .laydate-month-list>li,.laydate-theme-grid .laydate-year-list>li,.laydate-theme-grid .layui-laydate-content td,.laydate-theme-grid .layui-laydate-content thead,.laydate-theme-molv .layui-laydate-footer{border:1px solid #e2e2e2}.laydate-theme-grid .laydate-selected,.laydate-theme-grid .laydate-selected:hover{background-color:#f2f2f2!important;color:#009688!important}.laydate-theme-grid .laydate-selected.laydate-day-next,.laydate-theme-grid .laydate-selected.laydate-day-prev{color:#d2d2d2!important}.laydate-theme-grid .laydate-month-list,.laydate-theme-grid .laydate-year-list{margin:1px 0 0 1px}.laydate-theme-grid .laydate-month-list>li,.laydate-theme-grid .laydate-year-list>li{margin:0 -1px -1px 0}.laydate-theme-grid .laydate-year-list>li{height:43px;line-height:43px}.laydate-theme-grid .laydate-month-list>li{height:71px;line-height:71px}


 .ke-inline-block{display:-moz-inline-stack;display:inline-block;vertical-align:middle;zoom:1;*display:inline}.ke-clearfix{zoom:1}.ke-clearfix:after{content:".";display:block;clear:both;font-size:0;height:0;line-height:0;visibility:hidden}.ke-shadow{box-shadow:1px 1px 3px #a0a0a0;-moz-box-shadow:1px 1px 3px #a0a0a0;-webkit-box-shadow:1px 1px 3px #a0a0a0;filter:progid:DXImageTransform.Microsoft.Shadow(color='#A0A0A0',Direction=135,Strength=3);background-color:#f0f0ee}.ke-menu a,.ke-menu a:hover,.ke-dialog a,.ke-dialog a:hover{color:#337fe5;text-decoration:none}.ke-icon-source{background-position:0 0;width:16px;height:16px}.ke-icon-preview{background-position:0 -16px;width:16px;height:16px}.ke-icon-print{background-position:0 -32px;width:16px;height:16px}.ke-icon-undo{background-position:0 -48px;width:16px;height:16px}.ke-icon-redo{background-position:0 -64px;width:16px;height:16px}.ke-icon-cut{background-position:0 -80px;width:16px;height:16px}.ke-icon-copy{background-position:0 -96px;width:16px;height:16px}.ke-icon-paste{background-position:0 -112px;width:16px;height:16px}.ke-icon-selectall{background-position:0 -128px;width:16px;height:16px}.ke-icon-justifyleft{background-position:0 -144px;width:16px;height:16px}.ke-icon-justifycenter{background-position:0 -160px;width:16px;height:16px}.ke-icon-justifyright{background-position:0 -176px;width:16px;height:16px}.ke-icon-justifyfull{background-position:0 -192px;width:16px;height:16px}.ke-icon-insertorderedlist{background-position:0 -208px;width:16px;height:16px}.ke-icon-insertunorderedlist{background-position:0 -224px;width:16px;height:16px}.ke-icon-indent{background-position:0 -240px;width:16px;height:16px}.ke-icon-outdent{background-position:0 -256px;width:16px;height:16px}.ke-icon-subscript{background-position:0 -272px;width:16px;height:16px}.ke-icon-superscript{background-position:0 -288px;width:16px;height:16px}.ke-icon-date{background-position:0 -304px;width:25px;height:16px}.ke-icon-time{background-position:0 -320px;width:25px;height:16px}.ke-icon-formatblock{background-position:0 -336px;width:25px;height:16px}.ke-icon-fontname{background-position:0 -352px;width:21px;height:16px}.ke-icon-fontsize{background-position:0 -368px;width:23px;height:16px}.ke-icon-forecolor{background-position:0 -384px;width:20px;height:16px}.ke-icon-hilitecolor{background-position:0 -400px;width:23px;height:16px}.ke-icon-bold{background-position:0 -416px;width:16px;height:16px}.ke-icon-italic{background-position:0 -432px;width:16px;height:16px}.ke-icon-underline{background-position:0 -448px;width:16px;height:16px}.ke-icon-strikethrough{background-position:0 -464px;width:16px;height:16px}.ke-icon-removeformat{background-position:0 -480px;width:16px;height:16px}.ke-icon-image{background-position:0 -496px;width:16px;height:16px}.ke-icon-flash{background-position:0 -512px;width:16px;height:16px}.ke-icon-media{background-position:0 -528px;width:16px;height:16px}.ke-icon-div{background-position:0 -544px;width:16px;height:16px}.ke-icon-formula{background-position:0 -576px;width:16px;height:16px}.ke-icon-hr{background-position:0 -592px;width:16px;height:16px}.ke-icon-emoticons{background-position:0 -608px;width:16px;height:16px}.ke-icon-link{background-position:0 -624px;width:16px;height:16px}.ke-icon-unlink{background-position:0 -640px;width:16px;height:16px}.ke-icon-fullscreen{background-position:0 -656px;width:16px;height:16px}.ke-icon-about{background-position:0 -672px;width:16px;height:16px}.ke-icon-plainpaste{background-position:0 -704px;width:16px;height:16px}.ke-icon-wordpaste{background-position:0 -720px;width:16px;height:16px}.ke-icon-table{background-position:0 -784px;width:16px;height:16px}.ke-icon-tablemenu{background-position:0 -768px;width:16px;height:16px}.ke-icon-tableinsert{background-position:0 -784px;width:16px;height:16px}.ke-icon-tabledelete{background-position:0 -800px;width:16px;height:16px}.ke-icon-tablecolinsertleft{background-position:0 -816px;width:16px;height:16px}.ke-icon-tablecolinsertright{background-position:0 -832px;width:16px;height:16px}.ke-icon-tablerowinsertabove{background-position:0 -848px;width:16px;height:16px}.ke-icon-tablerowinsertbelow{background-position:0 -864px;width:16px;height:16px}.ke-icon-tablecoldelete{background-position:0 -880px;width:16px;height:16px}.ke-icon-tablerowdelete{background-position:0 -896px;width:16px;height:16px}.ke-icon-tablecellprop{background-position:0 -912px;width:16px;height:16px}.ke-icon-tableprop{background-position:0 -928px;width:16px;height:16px}.ke-icon-checked{background-position:0 -944px;width:16px;height:16px}.ke-icon-code{background-position:0 -960px;width:16px;height:16px}.ke-icon-map{background-position:0 -976px;width:16px;height:16px}.ke-icon-baidumap{background-position:0 -976px;width:16px;height:16px}.ke-icon-lineheight{background-position:0 -992px;width:16px;height:16px}.ke-icon-clearhtml{background-position:0 -1008px;width:16px;height:16px}
.ke-icon-pagebreak{background-position:0 -1024px;width:16px;height:16px}.ke-icon-insertfile{background-position:0 -1040px;width:16px;height:16px}.ke-icon-quickformat{background-position:0 -1056px;width:16px;height:16px}.ke-icon-template{background-position:0 -1072px;width:16px;height:16px}.ke-icon-tablecellsplit{background-position:0 -1088px;width:16px;height:16px}.ke-icon-tablerowmerge{background-position:0 -1104px;width:16px;height:16px}.ke-icon-tablerowsplit{background-position:0 -1120px;width:16px;height:16px}.ke-icon-tablecolmerge{background-position:0 -1136px;width:16px;height:16px}.ke-icon-tablecolsplit{background-position:0 -1152px;width:16px;height:16px}.ke-icon-anchor{background-position:0 -1168px;width:16px;height:16px}.ke-icon-search{background-position:0 -1184px;width:16px;height:16px}.ke-icon-new{background-position:0 -1200px;width:16px;height:16px}.ke-icon-specialchar{background-position:0 -1216px;width:16px;height:16px}.ke-icon-multiimage{background-position:0 -1232px;width:16px;height:16px}.ke-container{display:block;border:1px solid #ccc;background-color:#FFF;overflow:hidden;margin:0;padding:0}.ke-toolbar{border-bottom:1px solid #CCC;background-color:#f0f0ee;padding:2px 5px;text-align:left;overflow:hidden;zoom:1}.ke-toolbar-icon{background-repeat:no-repeat;font-size:0;line-height:0;overflow:hidden;display:block}.ke-toolbar-icon-url{background-image:url(<?php echo WZHOST;?>Tpl/layui/themes/default/default.png)}.ke-toolbar .ke-outline{border:1px solid #f0f0ee;margin:1px;padding:1px 2px;font-size:0;line-height:0;overflow:hidden;cursor:pointer;display:block;float:left}.ke-toolbar .ke-on{border:1px solid #5690d2}.ke-toolbar .ke-selected{border:1px solid #5690d2;background-color:#e9eff6}.ke-toolbar .ke-disabled{cursor:default}.ke-toolbar .ke-separator{height:16px;margin:2px 3px;border-left:1px solid #a0a0a0;border-right:1px solid #fff;border-top:0;border-bottom:0;width:0;font-size:0;line-height:0;overflow:hidden;display:block;float:left}.ke-toolbar .ke-hr{overflow:hidden;height:1px;clear:both}.ke-edit{padding:0}.ke-edit-iframe,.ke-edit-textarea{border:0;margin:0;padding:0;overflow:auto}.ke-edit-textarea{font:12px/1.5 "Consolas","Monaco","Bitstream Vera Sans Mono","Courier New",Courier,monospace;color:#000;overflow:auto;resize:none}.ke-edit-textarea:focus{outline:0}.ke-statusbar{position:relative;background-color:#f0f0ee;border-top:1px solid #ccc;font-size:0;line-height:0;*height:12px;overflow:hidden;text-align:center;cursor:s-resize}.ke-statusbar-center-icon{background-position:-0px -754px;width:15px;height:11px;background-image:url(<?php echo WZHOST;?>Tpl/layui/themes/default/default.png)}.ke-statusbar-right-icon{position:absolute;right:0;bottom:0;cursor:se-resize;background-position:-5px -741px;width:11px;height:11px;background-image:url(<?php echo WZHOST;?>Tpl/layui/themes/default/default.png)}.ke-menu{border:1px solid #a0a0a0;background-color:#f1f1f1;color:#222;padding:2px;font-family:"sans serif",tahoma,verdana,helvetica;font-size:12px;text-align:left;overflow:hidden}.ke-menu-item{border:1px solid #f1f1f1;background-color:#f1f1f1;color:#222;height:24px;overflow:hidden;cursor:pointer}.ke-menu-item-on{border:1px solid #5690d2;background-color:#e9eff6}.ke-menu-item-left{width:27px;text-align:center;overflow:hidden}.ke-menu-item-center{width:0;height:24px;border-left:1px solid #e3e3e3;border-right:1px solid #fff;border-top:0;border-bottom:0}.ke-menu-item-center-on{border-left:1px solid #e9eff6;border-right:1px solid #e9eff6}.ke-menu-item-right{border:0;padding:0 0 0 5px;line-height:24px;text-align:left;overflow:hidden}.ke-menu-separator{margin:2px 0;height:0;overflow:hidden;border-top:1px solid #ccc;border-bottom:1px solid #fff;border-left:0;border-right:0}.ke-colorpicker{border:1px solid #a0a0a0;background-color:#f1f1f1;color:#222;padding:2px}.ke-colorpicker-table{border:0;margin:0;padding:0;border-collapse:separate}.ke-colorpicker-cell{font-size:0;line-height:0;border:1px solid #f0f0ee;cursor:pointer;margin:3px;padding:0}.ke-colorpicker-cell-top{font-family:"sans serif",tahoma,verdana,helvetica;font-size:12px;line-height:24px;border:1px solid #f0f0ee;cursor:pointer;margin:0;padding:0;text-align:center}.ke-colorpicker-cell-on{border:1px solid #5690d2}.ke-colorpicker-cell-selected{border:1px solid #2446ab}.ke-colorpicker-cell-color{width:14px;height:14px;margin:3px;padding:0;border:0}.ke-dialog{position:absolute;margin:0;padding:0}.ke-dialog .ke-header{width:100%;margin-bottom:10px}.ke-dialog .ke-header .ke-left{float:left}.ke-dialog .ke-header .ke-right{float:right}.ke-dialog .ke-header label{margin-right:0;cursor:pointer;font-weight:normal;display:inline;vertical-align:top}.ke-dialog-content{background-color:#FFF;width:100%;height:100%;color:#333;border:1px solid #a0a0a0}.ke-dialog-shadow{position:absolute;z-index:-1;top:0;left:0;width:100%;height:100%;box-shadow:3px 3px 7px #999;-moz-box-shadow:3px 3px 7px #999;-webkit-box-shadow:3px 3px 7px #999;filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='3',MakeShadow='true',ShadowOpacity='0.4');background-color:#f0f0ee}
.ke-dialog-header{border:0;margin:0;padding:0 10px;background:url(background.png) repeat scroll 0 0 #f0f0ee;border-bottom:1px solid #cfcfcf;height:24px;font:12px/24px "sans serif",tahoma,verdana,helvetica;text-align:left;color:#222;cursor:move}.ke-dialog-icon-close{display:block;background:url(<?php echo WZHOST;?>Tpl/layui/themes/default/default.png) no-repeat scroll 0 -688px;width:16px;height:16px;position:absolute;right:6px;top:6px;cursor:pointer}.ke-dialog-body{font:12px/1.5 "sans serif",tahoma,verdana,helvetica;text-align:left;overflow:hidden;width:100%}.ke-dialog-body textarea{display:block;overflow:auto;padding:0;resize:none}.ke-dialog-body textarea:focus,.ke-dialog-body input:focus,.ke-dialog-body select:focus{outline:0}.ke-dialog-body label{margin-right:10px;cursor:pointer;display:-moz-inline-stack;display:inline-block;vertical-align:middle;zoom:1;*display:inline}.ke-dialog-body img{display:-moz-inline-stack;display:inline-block;vertical-align:middle;zoom:1;*display:inline}.ke-dialog-body select{display:-moz-inline-stack;display:inline-block;vertical-align:middle;zoom:1;*display:inline;width:auto}.ke-dialog-body .ke-textarea{display:block;width:408px;height:260px;font-family:"sans serif",tahoma,verdana,helvetica;font-size:12px;border-color:#848484 #e0e0e0 #e0e0e0 #848484;border-style:solid;border-width:1px}.ke-dialog-body .ke-form{margin:0;padding:0}.ke-dialog-loading{position:absolute;top:0;left:1px;z-index:1;text-align:center}.ke-dialog-loading-content{background:url("../common/loading.gif") no-repeat;color:#666;font-size:14px;font-weight:bold;height:31px;line-height:31px;padding-left:36px}.ke-dialog-row{margin-bottom:10px}.ke-dialog-footer{font:12px/1 "sans serif",tahoma,verdana,helvetica;text-align:right;padding:0 0 5px 0;background-color:#FFF;width:100%}.ke-dialog-preview,.ke-dialog-yes{margin:5px}.ke-dialog-no{margin:5px 10px 5px 5px}.ke-dialog-mask{background-color:#FFF;filter:alpha(opacity=50);opacity:.5}.ke-button-common{background:url(background.png) no-repeat;cursor:pointer;height:23px;line-height:23px;overflow:visible;display:inline-block;vertical-align:top;cursor:pointer}.ke-button-outer{background-position:0 -25px;padding:0;display:-moz-inline-stack;display:inline-block;vertical-align:middle;zoom:1;*display:inline}.ke-button{background-position:right -25px;padding:0 14px 0 12px;margin:0 0 0 2px;font-family:"sans serif",tahoma,verdana,helvetica;border:0 none;color:#333;font-size:12px;text-decoration:none}.ke-input-text{background-color:#fff;font-family:"sans serif",tahoma,verdana,helvetica;font-size:12px;line-height:17px;height:17px;padding:2px 4px;border-color:#848484 #e0e0e0 #e0e0e0 #848484;border-style:solid;border-width:1px;display:-moz-inline-stack;display:inline-block;vertical-align:middle;zoom:1;*display:inline}.ke-input-number{width:50px}.ke-input-color{border:1px solid #a0a0a0;background-color:#fff;font-size:12px;width:60px;height:20px;line-height:20px;padding-left:5px;overflow:hidden;cursor:pointer;display:-moz-inline-stack;display:inline-block;vertical-align:middle;zoom:1;*display:inline}.ke-upload-button{position:relative}.ke-upload-area{position:relative;overflow:hidden;margin:0;padding:0;*height:25px}.ke-upload-area .ke-upload-file{position:absolute;font-size:60px;top:0;right:0;padding:0;margin:0;z-index:811212;border:0 none;opacity:0;filter:alpha(opacity=0)}.ke-tabs{font:12px/1 "sans serif",tahoma,verdana,helvetica;border-bottom:1px solid #a0a0a0;padding-left:5px;margin-bottom:20px}.ke-tabs-ul{list-style-image:none;list-style-position:outside;list-style-type:none;margin:0;padding:0}.ke-tabs-li{position:relative;border:1px solid #a0a0a0;background-color:#f0f0ee;margin:0 2px -1px 0;padding:0 20px;float:left;line-height:25px;text-align:center;color:#555;cursor:pointer}.ke-tabs-li-selected{background-color:#FFF;border-bottom:1px solid #FFF;color:#000;cursor:default}.ke-tabs-li-on{background-color:#FFF;color:#000}.ke-progressbar{position:relative;margin:0;padding:0}.ke-progressbar-bar{border:1px solid #6fa5db;width:80px;height:5px;margin:10px 10px 0 10px;padding:0}.ke-progressbar-bar-inner{width:0;height:5px;background-color:#6fa5db;overflow:hidden;margin:0;padding:0}.ke-progressbar-percent{position:absolute;top:0;left:40%;display:none}.ke-swfupload-top{position:relative;margin-bottom:10px;_width:608px}.ke-swfupload-button{height:23px;line-height:23px}.ke-swfupload-desc{padding:0 10px;height:23px;line-height:23px}.ke-swfupload-startupload{position:absolute;top:0;right:0}.ke-swfupload-body{overflow:scroll;background-color:#fff;border-color:#848484 #e0e0e0 #e0e0e0 #848484;border-style:solid;border-width:1px;width:auto;height:370px;padding:5px}.ke-swfupload-body .ke-item{width:100px;margin:5px}.ke-swfupload-body .ke-photo{position:relative;border:1px solid #ddd;background-color:#fff;padding:10px}.ke-swfupload-body .ke-delete{display:block;background:url(<?php echo WZHOST;?>Tpl/layui/themes/default/default.png) no-repeat scroll 0 -688px;width:16px;height:16px;position:absolute;right:0;top:0;cursor:pointer}
.ke-swfupload-body .ke-status{position:absolute;left:0;bottom:5px;width:100px;height:17px}.ke-swfupload-body .ke-message{width:100px;text-align:center;overflow:hidden;height:17px}.ke-swfupload-body .ke-error{color:red}.ke-swfupload-body .ke-name{width:100px;text-align:center;overflow:hidden;height:16px}.ke-swfupload-body .ke-on{border:1px solid #5690d2;background-color:#e9eff6}.ke-plugin-emoticons{position:relative}.ke-plugin-emoticons .ke-preview{position:absolute;text-align:center;margin:2px;padding:10px;top:0;border:1px solid #a0a0a0;background-color:#fff;display:none}.ke-plugin-emoticons .ke-preview-img{border:0;margin:0;padding:0}.ke-plugin-emoticons .ke-table{border:0;margin:0;padding:0;border-collapse:separate}.ke-plugin-emoticons .ke-cell{margin:0;padding:1px;border:1px solid #f0f0ee;cursor:pointer}.ke-plugin-emoticons .ke-on{border:1px solid #5690d2;background-color:#e9eff6}.ke-plugin-emoticons .ke-img{display:block;background-repeat:no-repeat;overflow:hidden;margin:2px;width:24px;height:24px;margin:0;padding:0;border:0}.ke-plugin-emoticons .ke-page{text-align:right;margin:5px;padding:0;border:0;font:12px/1 "sans serif",tahoma,verdana,helvetica;color:#333;text-decoration:none}.ke-plugin-plainpaste-textarea,.ke-plugin-wordpaste-iframe{display:block;width:408px;height:260px;font-family:"sans serif",tahoma,verdana,helvetica;font-size:12px;border-color:#848484 #e0e0e0 #e0e0e0 #848484;border-style:solid;border-width:1px}.ke-plugin-filemanager-header{width:100%;margin-bottom:10px}.ke-plugin-filemanager-header .ke-left{float:left}.ke-plugin-filemanager-header .ke-right{float:right}.ke-plugin-filemanager-body{overflow:scroll;background-color:#fff;border-color:#848484 #e0e0e0 #e0e0e0 #848484;border-style:solid;border-width:1px;width:auto;height:370px;padding:5px}.ke-plugin-filemanager-body .ke-item{width:100px;margin:5px}.ke-plugin-filemanager-body .ke-photo{border:1px solid #ddd;background-color:#fff;padding:10px}.ke-plugin-filemanager-body .ke-name{width:100px;text-align:center;overflow:hidden;height:16px}.ke-plugin-filemanager-body .ke-on{border:1px solid #5690d2;background-color:#e9eff6}.ke-plugin-filemanager-body .ke-table{width:95%;border:0;margin:0;padding:0;border-collapse:separate}.ke-plugin-filemanager-body .ke-table .ke-cell{margin:0;padding:0;border:0}.ke-plugin-filemanager-body .ke-table .ke-name{width:55%;text-align:left}.ke-plugin-filemanager-body .ke-table .ke-size{width:15%;text-align:left}.ke-plugin-filemanager-body .ke-table .ke-datetime{width:30%;text-align:center}
    
  .layui-layer-content{padding:20px;}
  .layui-form-label{width:60px;}
  .layui-input-block{margin-left:90px;}
  .layui-form-item .layui-input-inline{width:200px;}
  
    </style>
</head>
<body layadmin-themealias="ocean" class="layui-layout-body">
</div>
</body>
</html>
<script src="<?php echo WZHOST.'Tpl/';?>jquery.js"></script>
<script src="<?php echo WZHOST.'Tpl/';?>layui/layui.all.js"></script>
<script src="<?php echo WZHOST.'Tpl/';?>layui/kindeditor-all-min.js"></script>
<script>
window.VER = '<?php echo ELikjVER;?>';
window.UIMUI =[];
window.OPID = 0;
window.ELi = {
    DATA:{},
    TABLE:{}
};
function apptongxin( url ,canshu,hanshu,method){
    if(!method){
        method = "POST";
    }
    canshu.apptoken = APPTOKEN;
    $.ajax({
        type :method,
        url : url,
        data : canshu,
        dataType:"json",
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
        //window.localStorage.setItem('apptoken',token);
    }
}

window.APPTOKEN = "";//window.localStorage.getItem('apptoken');
window.TOKEN = "";
window.YTOKEN = "";
window.CDNHOST  = "<?php echo CDNHOST;?>";
window.WZHOST = "<?php echo WZHOST;?>";
window.dir = '<?php  echo WZHOST;?>';
window.FENGE = '<?php  echo $ELiConfig['fenge'];?>';
window.Plus = '<?php  echo $ELiConfig['Plus'];?>';
window.PLUG = '<?php echo WZHOST.$ELiConfig['Plus'].$ELiConfig['fenge'].$THIS->plugin.$ELiConfig['fenge'];?>';
window.UPFILE = PLUG;
window.p = console.log;
window.PAGEHOME = '<?php echo  trim(WZHOST,$ELiConfig['dir']).$GLOBALS['pluginurl'];?>';
window.TTTXUANCLASS = "";
$.post = apptongxin;

function pichttp(pic){
    if( typeof(pic) == "undefined" ||  pic == '' ){
        return WZHOST+'Tpl/noimg.png';
    }
    if(pic.indexOf("://") > -1){
        return pic;
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
    if( get!="" && get.substring(0,1)  =='?' ){
        get = get+'&apptoken='+APPTOKEN;
    }else{
        get = get+'?apptoken='+APPTOKEN;
    }
    return UPFILE+'upload/'+get;
}
function aitpl(str){
    var  reCommentContents = /\/\*!?(?:@aitpl)?[ \t]*(?:\r\n|\n)([\s\S]*?)(?:\r\n|\n)[ \t]*\*\//;
    var match = reCommentContents.exec(str.toString());
    if (!match) {
		return ('解析html失败');
	}
    return match[1];
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
        console.log(url);
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
    //loadjs(shuzu[0],shuzu[1]);
    //console.log($class,shuzu );
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
    $("."+TTTXUANCLASS+"textqunji_list_"+name).append( textcaidan(name,tazhi,candan,css,500) );
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
                            elem: '#'+TTTXUANCLASS+'upk_'+name 
                            ,field:"all"
                            ,url: uploadurl()
                            ,done: function(res){
                                if(res.code == 1){
                                    $("#"+TTTXUANCLASS+name).val(res.data);
                                
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
    html ='<div class="layui-input-inline" id="'+TTTXUANCLASS+'caidan_'+name+'X'+i+'" onclick="layer.tips(\''+zx+'\', \'#'+TTTXUANCLASS+'caidan_'+name+'X'+i+'\',{ time:2000,tips: 3,zIndex:9999})" style="margin-bottom:10px;" ><input type="text" name="'+name+'[]" value="" placeholder="请输入值" autocomplete="off" class="layui-input"></div>';
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
                    ,url:uploadurl('?uplx=image') //上传接口
                    ,multiple: true
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

        html +='<div class="layui-input-inline"><input type="hidden" value="'+moren+'" name="'+name+'" id="'+TTTXUANCLASS+'upv_'+name+'" style="float:left;width:80%;margin-right:5px;'+css+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input"> <button type="button" style="padding: 0 6px;" class="layui-btn" id="'+TTTXUANCLASS+'upk_'+name+'"><i class="layui-icon layui-icon-upload-drag"></i></button></div><div class="layui-clear"></div>';
        html +='<div class="layui-upload-list fujiguanxi'+name+'"> <img class="layui-upload-img" style="'+css+'" src="'+pichttp(moren)+'" id="'+TTTXUANCLASS+'upshou_'+name+'"> </div>';
        setTimeout(function(name,css){
            layui.upload.render({
                elem: '#'+TTTXUANCLASS+'upk_'+name //绑定元素
                ,field:"image"
                ,accept: 'images' //允许上传的文件类型
                ,url: uploadurl('?uplx=image') //上传接口
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

    }else if(type == 'update64'){
        html +='<div class="layui-input-inline"><input type="text" value="'+moren+'" name="'+name+'" id="'+TTTXUANCLASS+'upv_'+name+'" style="float:left;width:80%;margin-right:5px;display: inline-block;'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input"> <button type="button" style="float:left;padding: 0 6px;" class="layui-btn" id="'+TTTXUANCLASS+'upk_'+name+'"><i class="layui-icon layui-icon-upload-drag"></i></button> </div><div class="layui-clear"></div>';

        setTimeout(function(name){
            layui.upload.render({
                elem: '#'+TTTXUANCLASS+'upk_'+name //绑定元素
                ,field:"all"
                ,accept: 'file' //允许上传的文件类型
                ,url: uploadurl() //上传接口
                ,auto: false 
                ,choose:function(obj){
                    
                    obj.preview(function(index, file, result){
                        file = new File([result], file.name);
                        obj.upload(index, file);
                    });

                },done: function(res){
                    if(res.code == 1){
                        $('#'+TTTXUANCLASS+'upv_'+name).val(res.data);
                        layer.msg(res.msg,{offset: 'c',time: 1500});
                    }else{
                        layer.msg(res.msg,{offset: 'c'});
                    }
                }
            });
        },outtime,name);


    }else if(type == 'update'){

        html +='<div class="layui-input-inline"><input type="text" value="'+moren+'" name="'+name+'" id="'+TTTXUANCLASS+'upv_'+name+'" style="float:left;width:80%;margin-right:5px;display: inline-block;'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input"> <button type="button" style="float:left;padding: 0 6px;" class="layui-btn" id="'+TTTXUANCLASS+'upk_'+name+'"><i class="layui-icon layui-icon-upload-drag"></i></button> </div><div class="layui-clear"></div>';

        setTimeout(function(name){
            layui.upload.render({
                elem: '#'+TTTXUANCLASS+'upk_'+name //绑定元素
                ,field:"all"
                ,accept: 'file' //允许上传的文件类型
                ,url: uploadurl() //上传接口
               
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
        
        html+='<textarea name="'+name+'"  id="'+TTTXUANCLASS+'ui_'+name+'" style="'+css+'" lay-verify="'+verify+'" placeholder="'+tishi+'"  class="layui-textarea" style="display: none;">'+moren+'</textarea>';
        setTimeout(function(name,css){
           
           var kkkk = KindEditor.create('#'+TTTXUANCLASS+'ui_'+name, {
                ttttt:name
            });
            UIMUI.push(kkkk);

        },outtime,name,css);


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
               html +='<div class="layui-input-inline hhhdada" id="'+TTTXUANCLASS+'caidan_'+name+'X'+i+'" onclick="layer.tips(\''+zx+'\', \'#'+TTTXUANCLASS+'caidan_'+name+'X'+i+'\',{ zIndex:999999,time:2000,tips: 3})" style="margin-bottom:10px;" ><input type="text" name="'+name+'[]" value="'+$zhi[i]+'" placeholder="'+tishi+'" autocomplete="off" class="layui-input"></div>';
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
                xx['2']?xx['2']:"",
              '',
              $zhi[mx]
              
            ]);
        }

       // p(yuliuzhi,$zhi);


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
       // return "您编辑的信息尚未保存，您确定要离开吗？"
  };

</script>