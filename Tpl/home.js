ELi['home'] = {
  //每个步骤初始化
  init: function () {
    p("home init ok");

    var html = aitpl(function () {
      /*
                 <style>
                      html #layuicss-layuiAdmin{display:none;position:absolute;width:1989px}::-webkit-input-placeholder{color:#ccc}html{background-color:#f2f2f2;color:#666}.layadmin-tabsbody-item,[template]{display:none}[lay-href],[lay-tips],[layadmin-event]{cursor:pointer}.layui-layout-admin .layui-header{position:fixed;top:0;left:0;width:100%;height:50px}.layui-layout-admin .layui-header .layui-nav .layui-nav-child a{color:#333}.layui-layout-admin .layui-side{width:220px;top:0;z-index:1001}.layui-layout-admin .layui-header .layui-nav .layui-nav-item,.layui-layout-admin .layui-logo{height:50px;line-height:50px}.layui-layout-admin .layui-logo{position:fixed;left:0;top:0;z-index:1002;width:220px;height:49px;padding:0 15px;box-sizing:border-box;overflow:hidden;font-weight:300;background-repeat:no-repeat;background-position:center center}.layadmin-pagetabs,.layui-layout-admin .layui-body,.layui-layout-admin .layui-footer,.layui-layout-admin .layui-layout-left{left:220px}.layadmin-pagetabs{position:fixed;top:50px;right:0;z-index:999}.layadmin-pagetabs .layui-breadcrumb{padding:0 15px}.layui-layout-admin .layui-body{position:fixed;top:90px;bottom:0}.layui-layout-admin .layui-body .layadmin-tabsbody-item{position:absolute;top:0;bottom:0;left:0;right:0;overflow:hidden}.layui-layout-admin .layui-header .layui-nav-img{width:26px;height:26px}.layui-layout-admin .layui-header .layui-nav-child{top:55px}.layui-layout-admin .layui-header .layui-layout-right .layui-nav-child{left:auto;right:0}.layui-layout-admin .layui-header .layui-nav .layui-nav-child dd.layui-this,.layui-layout-admin .layui-header .layui-nav .layui-nav-child dd.layui-this a{background:0 0}.layadmin-pagetabs,.layui-layout-admin .layui-body,.layui-layout-admin .layui-footer,.layui-layout-admin .layui-header .layui-layout-right,.layui-layout-admin .layui-header .layui-nav .layui-nav-item,.layui-layout-admin .layui-layout-left,.layui-layout-admin .layui-logo,.layui-layout-admin .layui-side{transition:all .3s;-webkit-transition:all .3s}.layui-icon-login-qq{color:#3492ED}.layui-icon-login-wechat{color:#4DAF29}.layui-icon-login-weibo{color:#CF1900}.layui-form[wid100] .layui-form-label{width:100px}.layui-form[wid100] .layui-input-block{margin-left:130px}@media screen and (max-width:450px){.layui-form[wid100] .layui-form-item .layui-input-inline{margin-left:132px}.layui-form[wid100] .layui-form-item .layui-input-inline+.layui-form-mid{margin-left:130px}}.layui-form-item .layui-input-company{width:auto;padding-right:10px;line-height:38px}.layui-bg-white{background-color:#fff}.layadmin-loading{position:absolute;left:50%;top:50%;margin:-16px -15px;font-size:30px;color:#c2c2c2}.layadmin-fixed{position:fixed;left:0;top:0;z-index:999}.layadmin-link{color:#029789!important}.layadmin-link:hover{opacity:.8}.layui-layer-admin .layui-layer-title{height:50px;line-height:50px;border:0;background-color:#20222A;color:#fff}.layui-layer-admin i[close]{position:absolute;padding:5px;right:10px;top:12px;color:#fff;cursor:pointer}.layui-layer-admin .layui-layer-content{padding:20px;line-height:22px}.layui-layer-admin .layui-layer-content cite{font-style:normal;color:#FF5722}.layui-layer-adminRight{top:50px!important;bottom:0;box-shadow:1px 1px 10px rgba(0,0,0,.1);border-radius:0;overflow:auto}.layadmin-note .layui-layer-content{padding:0}.layadmin-note textarea{display:block;width:300px;height:132px;min-width:300px;min-height:132px;line-height:20px;padding:10px 20px;border:none;box-sizing:border-box;color:#666;word-wrap:break-word}.layui-layout-admin .layui-layout-left{padding:0 10px}.layui-layout-admin .layui-layout-left .layui-nav-item{margin:0 20px}.layui-layout-admin .layui-input-search{display:inline-block;vertical-align:middle;height:32px;border:none;cursor:text}.layui-layout-admin .layui-layout-left a,.layui-layout-admin .layui-layout-right{padding:0}.layui-header .layui-nav-item .layui-icon{position:relative;top:1px;font-size:16px}.layui-header .layui-layout-right .layui-badge-dot{margin-left:0}.layui-header .layui-nav .layui-this:after,.layui-layout-admin .layui-header .layui-nav-bar{top:0!important;bottom:auto;height:3px;background-color:#fff;background-color:rgba(255,255,255,.3)}.layadmin-body-shade{position:fixed;display:none;left:0;right:0;top:0;bottom:0;background-color:rgba(0,0,0,.3);z-index:1000}.layui-side-menu .layui-side-scroll{width:240px}.layui-side-menu .layui-nav{width:220px;margin-top:50px;background:0 0}.layui-side-menu .layui-nav .layui-nav-item a{height:30px;line-height:30px;padding-left:45px;padding-right:30px}.layui-side-menu .layui-nav .layui-nav-item>a{padding-top:3px;padding-bottom:3px}.layui-side-menu .layui-nav .layui-nav-item a:hover{background:0 0}.layui-side-menu .layui-nav .layui-nav-itemed>.layui-nav-child{padding:5px 0 5px 10px}.layui-side-menu .layui-nav .layui-nav-item .layui-icon{position:absolute;top:50%;left:20px;margin-top:-16px}.layui-side-menu .layui-nav .layui-nav-child .layui-nav-child{background:0 0!important}.layui-side-menu .layui-nav .layui-nav-child .layui-nav-child a{padding-left:60px}.layui-side-menu .layui-nav .layui-nav-more{right:15px}@media screen and (max-width:992px){.layui-layout-admin .layui-side{transform:translate3d(-220px,0,0);-webkit-transform:translate3d(-220px,0,0);width:220px}.layadmin-pagetabs,.layui-layout-admin .layui-body,.layui-layout-admin .layui-footer,.layui-layout-admin .layui-layout-left{left:0}}.layadmin-side-shrink .layui-layout-admin .layui-logo{width:60px;background-image:url(/Tpl/admin/logo.png)}.layadmin-side-shrink .layui-layout-admin .layui-logo span{display:none}.layadmin-side-shrink .layui-side{left:0;width:60px}.layadmin-side-shrink .layadmin-pagetabs,.layadmin-side-shrink .layui-layout-admin .layui-body,.layadmin-side-shrink .layui-layout-admin .layui-footer,.layadmin-side-shrink .layui-layout-admin .layui-layout-left{left:60px}.layadmin-side-shrink .layui-side-menu .layui-nav{position:static;width:60px}.layadmin-side-shrink .layui-side-menu .layui-nav-item{position:static}.layadmin-side-shrink .layui-side-menu .layui-nav-item>a{padding-right:0}.layadmin-side-shrink .layui-side-menu .layui-nav-item cite,.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-item>.layui-nav-child,.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-item>a .layui-nav-more{display:none;padding:8px 0;width:200px}.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-itemed>a{background:rgba(0,0,0,.3)}.layadmin-side-spread-sm .layadmin-pagetabs,.layadmin-side-spread-sm .layui-layout-admin .layui-body,.layadmin-side-spread-sm .layui-layout-admin .layui-footer,.layadmin-side-spread-sm .layui-layout-admin .layui-layout-left{left:0;transform:translate3d(220px,0,0);-webkit-transform:translate3d(220px,0,0)}.layadmin-side-spread-sm .layui-layout-admin .layui-layout-right{transform:translate3d(220px,0,0);-webkit-transform:translate3d(220px,0,0)}.layadmin-side-spread-sm .layui-side{transform:translate3d(0,0,0);-webkit-transform:translate3d(0,0,0)}.layadmin-side-spread-sm .layadmin-body-shade{display:block}.layui-tab-title li:first-child .layui-tab-close,.layadmin-tabs-select.layui-nav .layui-nav-bar,.layadmin-tabs-select.layui-nav .layui-nav-more{display:none}.layadmin-pagetabs{height:40px;line-height:40px;padding:0 10px 0 10px;background-color:#fff;box-sizing:border-box;box-shadow:0 1px 2px 0 rgba(0,0,0,.1)}.layadmin-pagetabs .layadmin-tabs-control{position:absolute;top:0;width:40px;height:100%;text-align:center;cursor:pointer;transition:all .3s;-webkit-transition:all .3s;box-sizing:border-box;border-left:1px solid #f6f6f6}.layadmin-pagetabs .layadmin-tabs-control:hover{background-color:#f6f6f6}.layadmin-pagetabs .layui-icon-prev{left:0;border-left:none;border-right:1px solid #f6f6f6}.layadmin-pagetabs .layui-icon-next{right:40px}.layadmin-pagetabs .layui-icon-down{right:0}.layadmin-tabs-select.layui-nav{position:absolute;left:0;top:0;width:100%;height:100%;padding:0;background:0 0}.layadmin-tabs-select.layui-nav .layui-nav-item{line-height:40px}.layadmin-tabs-select.layui-nav .layui-nav-item>a{height:40px}.layadmin-tabs-select.layui-nav .layui-nav-item a{color:#666}.layadmin-tabs-select.layui-nav .layui-nav-child{top:40px;left:auto;right:0}.layadmin-tabs-select.layui-nav .layui-nav-child dd.layui-this,.layadmin-tabs-select.layui-nav .layui-nav-child dd.layui-this a{background-color:#f2f2f2!important;color:#333}.layadmin-pagetabs .layui-tab{margin:0;overflow:hidden}.layadmin-pagetabs .layui-tab-title{height:40px;border:none}.layui-tab-title li{min-width:0;line-height:40px;max-width:160px;text-overflow:ellipsis;padding-right:40px;overflow:hidden;border-right:1px solid #f6f6f6;vertical-align:top}.layui-tab-title li:first-child{padding-right:15px}.layui-tab-title li .layui-tab-close{position:absolute;right:8px;top:50%;margin:-7px 0 0;width:16px;height:16px;line-height:16px;border-radius:50%;font-size:12px}.layui-tab-title li:after{content:'';position:absolute;top:0;left:0;width:0;height:2px;border-radius:0;background-color:#292B34;transition:all .3s;-webkit-transition:all .3s}.layui-tab-title li:hover:after{width:100%}.layui-tab-title li.layui-this,.layui-tab-title li:hover{background-color:#f6f6f6}.layui-tab-title li.layui-this:after{width:100%;border:none;height:2px;background-color:#292B34}.layadmin-tabspage-none .layui-layout-admin .layui-header{border-bottom:none;box-shadow:0 1px 2px 0 rgba(0,0,0,.05)}.layadmin-tabspage-none .layadmin-header{display:block}.layadmin-tabspage-none .layadmin-header .layui-breadcrumb{border-top:1px solid #f6f6f6}.layui-layout-admin .layui-header{border-bottom:1px solid #f6f6f6;box-sizing:border-box;background-color:#fff}.layui-layout-admin .layui-header a,.layui-layout-admin .layui-header a cite{color:#333}.layui-layout-admin .layui-header a:hover{color:#000}.layui-layout-admin .layui-header .layui-nav .layui-nav-more{border-top-color:#666}.layui-layout-admin .layui-header .layui-nav .layui-nav-mored{border-color:transparent transparent #666}.layui-layout-admin .layui-header .layui-nav .layui-this:after,.layui-layout-admin .layui-header .layui-nav-bar{height:2px;background-color:#20222A}.layui-layout-admin .layui-logo{background-color:#20222A;box-shadow:0 1px 2px 0 rgba(0,0,0,.15)}.layui-layout-admin .layui-logo,.layui-layout-admin .layui-logo a{color:#fff;color:rgba(255,255,255,.8)}.layui-side-menu{box-shadow:1px 0 2px 0 rgba(0,0,0,.05)}.layui-layout-admin .layui-footer{padding:10px 0;text-align:center;box-shadow:0 -1px 2px 0 rgba(0,0,0,.05)}.layadmin-setTheme-side,.layui-side-menu{background-color:#20222A;color:#fff}.layadmin-setTheme-header,.layui-layout-admin .layui-footer{background-color:#fff}.layui-tab-admin .layui-tab-title{background-color:#393D49;color:#fff}.layui-fluid{padding:15px}.layadmin-header{display:none;height:50px;line-height:50px;margin-bottom:0;border-radius:0}.layadmin-header .layui-breadcrumb{padding:0 15px}.layui-card-header{position:relative}.layui-card-header .layui-icon{line-height:initial;position:absolute;right:15px;top:50%;margin-top:-7px}.layadmin-iframe{position:absolute;width:100%;height:100%;left:0;top:0;right:0;bottom:0}.layadmin-carousel{height:185px!important;background-color:#fff}.layadmin-carousel .layui-carousel-ind li{background-color:#e2e2e2}.layadmin-carousel .layui-carousel-ind li:hover{background-color:#c2c2c2}.layadmin-carousel .layui-carousel-ind li.layui-this{background-color:#999}.layadmin-carousel .layui-carousel,.layadmin-carousel>[carousel-item]>*{background-color:#fff}.layadmin-carousel .layui-col-space10{margin:0}.layadmin-carousel .layui-carousel-ind{position:absolute;top:-41px;text-align:right}.layadmin-carousel .layui-carousel-ind ul{background:0 0}.layui-card .layui-tab-brief .layui-tab-title{height:42px;border-bottom-color:#f6f6f6}.layui-card .layui-tab-brief .layui-tab-title li{margin:0 15px;padding:0;line-height:42px}.layui-card .layui-tab-brief .layui-tab-title li.layui-this{color:#333}.layui-card .layui-tab-brief .layui-tab-title .layui-this:after{height:43px}.layui-card .layui-tab-brief .layui-tab-content{padding:15px}.layui-card .layui-table-view{margin:0}.layadmin-shortcut li{text-align:center}.layadmin-shortcut li .layui-icon{display:inline-block;width:100%;height:60px;line-height:60px;text-align:center;border-radius:2px;font-size:30px;background-color:#F8F8F8;color:#333;transition:all .3s;-webkit-transition:all .3s}.layadmin-shortcut li cite{position:relative;top:2px;display:block;color:#666;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;font-size:14px}.layadmin-shortcut li:hover .layui-icon{background-color:#f2f2f2}.layadmin-backlog .layadmin-backlog-body{display:block;padding:10px 15px;background-color:#f8f8f8;color:#999;border-radius:2px;transition:all .3s;-webkit-transition:all .3s}.layadmin-backlog-body h3{padding-bottom:10px;font-size:12px}.layadmin-backlog-body p cite{font-style:normal;font-size:30px;font-weight:300;color:#009688}.layadmin-backlog-body:hover{background-color:#f2f2f2;color:#888}.layadmin-dataview{height:332px!important}.layadmin-dataview>[carousel-item]:before{display:none}.layadmin-dataview>[carousel-item]>div{height:332px}.layadmin-takerates{padding-top:5px}.layadmin-takerates .layui-progress{margin:50px 0 60px}.layadmin-takerates .layui-progress:last-child{margin-bottom:10px}.layadmin-takerates .layui-progress h3{position:absolute;right:0;top:-35px;color:#999;font-size:14px}.layadmin-takerates .layui-progress-bar{text-align:left}.layadmin-takerates .layui-progress-text{top:-35px;line-height:26px;font-size:26px}.layadmin-news{height:60px!important;padding:5px 0}.layadmin-news a{display:block;line-height:60px;text-align:center}.layadmin-news .layui-carousel-ind{height:45px}.layadmin-list li{margin-bottom:6px;padding-bottom:6px;border-bottom-color:#f6f6f6;list-style-position:inside;list-style-type:disc;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.layadmin-list li a{color:#666}.layadmin-list li a:hover{color:#009688}.layadmin-list li:last-child{border:none;padding:0;margin:0}.layadmin-text p{margin-bottom:10px;text-indent:2em}.layadmin-text p:last-child{margin:0}.layadmin-font-em{font-size:13px;color:#758697}.layui-card-header .layui-a-tips{position:absolute;right:15px;color:#01AAED}.layuiadmin-card-text{background-color:#f8f8f8;color:#777;padding:24px}.layuiadmin-card-text .layui-text-top{padding-bottom:10px}.layuiadmin-card-text .layui-text-top i{margin-right:10px;font-size:24px;color:#009688}.layuiadmin-card-text .layui-text-top a{line-height:24px;font-size:16px;vertical-align:top}.layuiadmin-card-text .layui-text-center{height:44px;line-height:22px;margin-bottom:10px;overflow:hidden}.layuiadmin-card-text .layui-text-bottom{position:relative}.layuiadmin-card-text .layui-text-bottom a{color:#777;font-size:12px;text-overflow:ellipsis;word-break:break-all}.layuiadmin-card-text .layui-text-bottom span{color:#CCC;font-size:12px;position:absolute;right:0}.layuiadmin-badge,.layuiadmin-btn-group,.layuiadmin-span-color{position:absolute;right:15px}.layuiadmin-card-link a:hover,.layuiadmin-card-team li a:hover,.layuiadmin-card-text a:hover{color:#01AAED;transition:all .3s}.layuiadmin-card-status{padding:0 10px 10px}.layuiadmin-card-status dd{padding:15px 0;border-bottom:1px solid #EEE;display:-webkit-flex;display:flex}.layuiadmin-card-status dd:last-child{border:none}.layuiadmin-card-status dd div.layui-status-img,.layuiadmin-card-team .layui-team-img{width:32px;height:32px;border-radius:50%;background-color:#009688;margin-right:15px}.layuiadmin-card-status dd div.layui-status-img a{width:100%;height:100%;display:inline-block;text-align:center;line-height:32px}.layuiadmin-card-status dd div.layui-status-img img,.layuiadmin-card-team .layui-team-img img{width:50%;height:50%}.layuiadmin-card-status dd div a{color:#01AAED}.layuiadmin-card-status dd div span{color:#BBB}.layuiadmin-card-link{padding-left:10px;font-size:0}.layuiadmin-card-link a{display:inline-block;width:25%;color:#666;font-size:14px;margin-bottom:12px}.layuiadmin-card-link button{vertical-align:top}.layuiadmin-card-link button:hover{color:#009688}.layuiadmin-card-team li{padding:10px 0 10px 10px}.layuiadmin-card-team .layui-team-img{display:inline-block;margin-right:8px;width:24px;height:24px;text-align:center;line-height:24px}.layuiadmin-card-team span{color:#777}.layuiadmin-badge{top:50%;margin-top:-9px;color:#01AAED}.layuiadmin-card-list{padding:15px}.layuiadmin-card-list p.layuiadmin-big-font{font-size:36px;color:#666;line-height:36px;padding:5px 0 10px;overflow:hidden;text-overflow:ellipsis;word-break:break-all;white-space:nowrap}.layuiadmin-card-list p.layuiadmin-normal-font{padding-bottom:10px;font-size:20px;color:#666;line-height:24px}.layuiadmin-span-color{font-size:14px}.layuiadmin-span-color i{padding-left:5px}.layuiadmin-card-status li{position:relative;padding:10px 0;border-bottom:1px solid #EEE}.layuiadmin-card-status li h3{padding-bottom:5px;font-weight:700}.layuiadmin-card-status li p{padding-bottom:10px}.layuiadmin-card-status li>span{color:#999}.layuiadmin-home2-usernote .layuiadmin-reply{display:none;position:absolute;right:0;bottom:12px}.layuiadmin-home2-usernote li:hover .layuiadmin-reply{display:block}.layuiadmin-page-table td span{color:#2F4056}.layuiadmin-page-table td span.first{color:#FF5722}.layuiadmin-page-table td span.second{color:#FFB800}.layuiadmin-page-table td span.third{color:#5FB878}.layuiAdmin-msg-detail h1{font-size:16px}.layuiAdmin-msg-detail .layui-card-header{height:auto;line-height:30px;padding:15px}.layuiAdmin-msg-detail .layui-card-header span{padding:0 5px;color:#999}.layuiAdmin-msg-detail .layui-card-header span:first-child{padding-left:0}.layuiAdmin-msg-detail .layui-card-body{padding:15px}.layuiadmin-content-bread{padding-bottom:20px}.layuiadmin-order-progress{position:relative;top:12px}.layui-card-header.layuiadmin-card-header-auto{padding-top:15px;padding-bottom:15px;height:auto}.layuiadmin-card-header-auto i.layuiadmin-button-btn{position:relative;right:0;top:0;vertical-align:middle}.layuiadmin-card-header-auto .layui-form-item:last-child{margin-bottom:0}.layadmin-setTheme{padding:15px;overflow-x:hidden}.layadmin-setTheme>h5{padding:20px 0 10px;color:#000}.layadmin-setTheme>h5:first-child{padding-top:0}.layadmin-setTheme-color{width:330px;font-size:0}.layadmin-setTheme-color li{position:relative;display:inline-block;vertical-align:top;width:80px;height:50px;margin:0 15px 15px 0;background-color:#f2f2f2;cursor:pointer;font-size:12px;color:#666}.layadmin-setTheme-color li:after{content:'';position:absolute;z-index:20;top:50%;left:50%;width:1px;height:0;border:1px solid #f2f2f2;transition:all .3s;-webkit-transition:all .3s;opacity:0}.layadmin-setTheme-color li.layui-this:after,.layadmin-setTheme-color li:hover:after{width:100%;height:100%;padding:4px;top:-5px;left:-5px;border-color:#5FB878;opacity:1}.layadmin-setTheme-header{position:relative;z-index:10;height:10px;border-top:1px solid #f2f2f2;border-right:1px solid #f2f2f2}.layadmin-setTheme-side{position:absolute;left:0;top:0;width:20px;height:100%;z-index:11;box-shadow:1px 0 2px 0 rgba(0,0,0,.05)}.layadmin-setTheme-logo{position:absolute;left:0;top:0;width:100%;height:10px;box-shadow:0 1px 2px 0 rgba(0,0,0,.15)}.layadmin-form-right{text-align:right}.layadmin-about p{margin-bottom:10px}.layadmin-menu-list .layui-card-header{height:50px;line-height:50px;font-size:16px}.layadmin-menu-list .layui-card-header:active{background-color:#f2f2f2}.layadmin-menu-list .layui-card-header .layui-icon{position:relative;top:1px;left:0;display:inline-block;margin:0 10px;font-size:18px}@-webkit-keyframes layui-rl{from{-webkit-transform:translate3d(100%,0,0)}to{-webkit-transform:translate3d(0,0,0)}}@keyframes layui-rl{from{transform:translate3d(100%,0,0)}to{transform:translate3d(0,0,0)}}.layui-anim-rl{-webkit-animation-name:layui-rl;animation-name:layui-rl}@-webkit-keyframes layui-lr{from{-webkit-transform:translate3d(0 0,0);opacity:1}to{-webkit-transform:translate3d(100%,0,0);opacity:1}}@keyframes layui-lr{from{transform:translate3d(0,0,0)}to{transform:translate3d(100%,0,0)}}.layui-anim-lr,.layui-anim-rl.layer-anim-close{-webkit-animation-name:layui-lr;animation-name:layui-lr}.layadmin-tips{margin-top:30px;text-align:center}.layadmin-tips .layui-icon[face]{display:inline-block;font-size:300px;color:#393D49}.layadmin-tips .layui-text{width:500px;margin:30px auto;padding-top:20px;border-top:5px solid #009688;font-size:16px}.layadmin-tips h1{font-size:100px;line-height:100px;color:#009688}.layadmin-tips .layui-text .layui-anim{display:inline-block}@media screen and (max-width:768px){.layadmin-panel-selection{margin:0;width:auto}.layui-body .layui-nav .layui-nav-item{display:block}.layui-layout-admin .layui-body .layadmin-tabsbody-item{-webkit-overflow-scrolling:touch;overflow:auto}}

                      .layui-side-menu .layui-nav .airobt-main .layui-icon{top:40%;}
                   
                 </style>
                  <div id="LAY_app" class="layadmin-tabspage-none">
          <div class="layui-layout layui-layout-admin">
            <div class="layui-header">
              <!-- 头部区域 -->
              <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                  <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                    <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                  </a>
                </li>

                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                  <a href="/" target="_blank" title="前台">
                    <i class="layui-icon layui-icon-website"></i>
                  </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                  <a href="javascript:window.location.href='?';"  title="刷新">
                    <i class="layui-icon layui-icon-refresh-3"></i>
                  </a>
                </li>

                <li class="layui-nav-item" lay-unselect>
                  <a href="javascript:ELi['home'].closeall();" style="height:35px;line-height:35px;padding-top:6px;"  title="删除table">
                   
                    <i class="layui-icon layui-icon-delete" style="font-size:28px;color:green;"></i>
                  </a>
                </li>

              
                
              </ul>
              <ul class="layui-nav layui-layout-right"   lay-filter="layadmin-layout-right">
                
               
           
                <li class="layui-nav-item" lay-unselect>
                  <a href="javascript:;">
                    <cite id="username">admin</cite>
                  </a>
                  <dl class="layui-nav-child">
                    <dd><a  id="quanxianzu">admin</a></dd>
                  
                    <hr>
                    <dd layadmin-event="logout" style="text-align: center;"><a  id="quite"> 退出</a></dd>
                  </dl>
                </li>
                
              </ul>
            </div>
            
         
            <div class="layui-side layui-side-menu">
              <div class="layui-side-scroll">
                <div class="layui-logo" >
                  <span>以厘CMS管理后台</span>
                </div>
                
                <ul class="layui-nav layui-nav-tree woshitaidedan" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
                
                </ul>
              </div>
            </div>

            <!-- 页面标签 -->
          
              
              <div class="layui-tab " lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">

              
                
                 <ul class="layui-tab-title layadmin-pagetabs" id="LAY_app_tabsheader">
                 
                      <li class="layui-this home" id="morenhome" data="home/main@@首页">
                        <i class="layui-icon layui-icon-home"></i>
                      
                      </li>

                  </ul>
                  

                  <div class="layui-tab-content layui-body" id="LAY_app_body">
                    <div class="tashilisthha layui-tab-item home layui-show" id="myhomes">
                    
                    </div>
                     
                     
                  </div>

              </div>
            




            
            <div class="layadmin-body-shade" layadmin-event="shade"></div>
          </div>
        </div>
      */
    });
    $("body").html(html);


    $("#LAY_app_flexible").click(function () {


      if ($(window).width() > 720) {

        if ($('.layadmin-side-shrink').length > 0) {
          $("#LAY_app").removeClass('layadmin-side-shrink');
        } else {
          $("#LAY_app").addClass('layadmin-side-shrink');
        }

      } else {
        $(".layui-layout-admin .layui-side").css({
          left: 220
        });
        $(".layadmin-body-shade").show();
      }


    });

    $(".layadmin-body-shade").click(function () {
      $(".layui-layout-admin .layui-side").css({
        left: 0
      });
      $(".layadmin-body-shade").hide();
    });

    ELi['home'].xuanadmin();
    ELi['home'].xuancaidan();
    layui.element.render();

  },
  xuanadmin() {
    $("#username").html(ELi.DATA.user.admininame);
    $("#quanxianzu").html(ELi.DATA.user.admingroupsname);
    $("#quite").click(function () {
      //发送退出命令
      $.get(PLUG + "quite?apptoken="+APPTOKEN, {}, function (data) {

        if (data.token && data.token != "") {
          TOKEN = data.token;
        }


        loadjs("login");

      });



    });
  },
  closeall() {

    $("#LAY_app_tabsheader li").each(function () {
      if (!$(this).hasClass('home')) {
        $(this).remove();
      }

    });
    $("#LAY_app_tabsheader .home").addClass('layui-this');
    $("#LAY_app_body .tashilisthha").each(function () {
      if (!$(this).hasClass('home')) {
        $(this).remove();
      }
    });


    $("#LAY_app_body .home").addClass('layui-show');
    layer.msg("清空tab成功");




  },
  xuanhtml(zcaidan, ini) {
    var xhtml = '<dl class="layui-nav-child">';

    for (var men in zcaidan) {
      xhtml += '<dd data-name="' + zcaidan[men].name + '" >';
      if (zcaidan[men].typeico && zcaidan[men].typeico != "") {
        xhtml += '<i class="layui-icon ' + zcaidan[men].typeico + '"></i>';
      }
      if (zcaidan[men].link && zcaidan[men].link != "") {
        var jjj = 'loadurl(\'' + zcaidan[men].link + '\',\'' + zcaidan[men].name + '\')';
      } else {
        var jjj = 'loadjs(\'' + ini + FENGE + '' + men + '\',\'' + zcaidan[men].name + '\')';
      }

      if (zcaidan[men].men && zcaidan[men].men.length > 0) {
        jjj = 'void(0)';
        xhtml += '<a href="javascript:' + jjj + ';"> ' + zcaidan[men].name + '</a>';
        xhtml += ELi['home'].xuanhtml(zcaidan[men].men, ini + FENGE + '' + men);
      } else {
        xhtml += '<a href="javascript:' + jjj + ';">' + zcaidan[men].name + '</a>';
      }


    }
    xhtml += '</dl>';

    return xhtml;
  },
  xuancaidan() {

    var html = '';
    var caidan = ELi.DATA.user.adminmen;
    for (var ini in caidan) {

      if (caidan[ini].name == "") {
        continue;
      }



      html += '<li data-name="home" class="layui-nav-item '+( caidan[ini].main  !=0?'airobt-main':'')+'" lay-direction="2">';

        if( caidan[ini].main == 0){

        

          if (caidan[ini].men && caidan[ini].men.length != 0) {
            var jjj = 'void(0)';
          } else {
            var jjj = 'loadjs(\'' + ini + '\')';
          }

          html += '<a href="javascript:' + jjj + ';" lay-tips="' + caidan[ini].name + '" >';
          if (caidan[ini].typeico && caidan[ini].typeico != "") {
            html += '<i class="layui-icon ' + caidan[ini].typeico + '"></i>';
          }

          html += '<cite>' + (caidan[ini].name == "" ? ini : caidan[ini].name) + '</cite>';
          html += '</a>';

      }

 

        if (caidan[ini].men && caidan[ini].men.length != 0) {
          if( caidan[ini].main == 0){
            html += '<dl class="layui-nav-child">';
          }
          var zcaidan = caidan[ini].men;

          for (var men in zcaidan) {
            if( caidan[ini].main == 0){
              html += '<dd data-name="' + zcaidan[men].name + '" >';
            }else{
              html +='</li><li data-name="home" class="layui-nav-item  airobt-main" lay-direction="2">';

            }
            if (zcaidan[men].typeico && zcaidan[men].typeico != "") {
              html += '<i class="layui-icon ' + zcaidan[men].typeico + '"></i>';
            }
            if (zcaidan[men].link && zcaidan[men].link != "") {
              var jjj = 'loadurl(\'' + zcaidan[men].link + '\',\'' + zcaidan[men].name + '\')';
            } else {
              var jjj = 'loadjs(\'' + ini + FENGE + '' + men + '\',\'' + zcaidan[men].name + '\')';
            }
            if (zcaidan[men].men) {
              jjj = 'void(0)';
              html += '<a href="javascript:' + jjj + ';">' + zcaidan[men].name + '</a>';
              html += ELi['home'].xuanhtml(zcaidan[men].men, ini + FENGE + '' + men);

            } else {
              html += '<a href="javascript:' + jjj + ';">' + zcaidan[men].name + '</a>';
            }
            if( caidan[ini].main == 0){
              html += '</dd>';
            }
          }
          if( caidan[ini].main == 0){
             html += '</dl>';
          }
        }

      
      html += '</li>';
    }

    $(".woshitaidedan").html(html);

    setTimeout(function(){

      ELi['home'].tongji();
    
      

    },500);

  },tongji(){

    apptongxin( PLUG+'hometongji'+FENGE+TOKEN+FENGE+'get' ,{},function(data){

/** [TABLE_NAME] => ELi_admin
            [TABLE_COMMENT] => 管理员
            [TABLE_ROWS] => 1
            [AUTO_INCREMENT] => 2 */
      var htmlx = "";
      htmlx +=' <div class="layui-card">';
      htmlx +='<div class="layui-card-header">数据统计</div>';
      htmlx +='<div class="layui-card-body">';
      htmlx +='';
      htmlx +='    <div class="layadmin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%;">';

      htmlx +='        <ul class="layui-row layui-col-space10 layui-this">';

      if(data.data && typeof(data.data) != "string"){
        for(var ss in data.data){
          var linshi = data.data[ss];

          htmlx +='        <li class="layui-col-xs6  layui-col-md4">';
          htmlx +='            <a class="layadmin-backlog-body">';
          htmlx +='            <h3>'+linshi['TABLE_COMMENT']+' '+linshi['TABLE_NAME']+'</h3>';
          htmlx +='            <p><cite>'+linshi['TABLE_ROWS']+'</cite></p>';
          htmlx +='            </a>';
          htmlx +='        </li>';

        }

      }


      htmlx +='        </ul>';
      htmlx +='      ';
      htmlx +='    <div style="clear:both;"></div>';

      htmlx +='</div></div></div></div>';


      if(data.data  && typeof(data.data) != "string" ){
        $("#myhomes").html(htmlx);
      }
    },"get");


    setTimeout(function(){

      ELi['home'].tongji();
    
      

    },30000);

   
  }
};
ELi['home'].init();