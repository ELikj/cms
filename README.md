系统名称：[以厘php框架](https://eLiphp.com)  
官方网址：https://eLiphp.com  
版权所有：2009-2021 以厘科技 (https://eLikj.com) 并保留所有权利。   
代码协议：开源代码协议 Apache License 2.0 详见 http://www.apache.org/licenses/  

## 系统介绍

最大特色:云php框架,支持阿里云(函数计算),腾讯(函数计算),swoole(webserver模式) 自带管理后台方便快速开发后台管理系统  
前端以 layui , jquery 为基础 kindeditor 富文本编辑器,echarts 图表绘制!  
原创前端快速表单函数,jsfrom 快速生成表单修改新增数据!  
极简路由模式,根据url访问对应的类调用对应的函数!  
每个功能以插件形式集成,使得每个插件都是相互独立,又能相互关联,强大又灵活!  
特有的插件函数 Construct 没有找到的类函数,直接会调用这里,方便开发多功能系统!  
特有的url只能以小写函数名访问 , 大写函数名只能通过内部调用!  
总结:小巧,灵活,强大,方便,支持云的php框架  

## 视频教程

链接:https://pan.baidu.com/s/1gtARcr71LJmHIB-yzHmw_Q 
提取码:2n19 

## 系统注意

需要为静态支持 , php 7+ 系列
直接安装即可

## 阿里云部署

函数入口 aliyun.handler


## 腾讯云部署

执行方法 tencent.main_handler

## swool部署

shell 执行 php swoole.php

## 插件开发说明

插件开发注意 
插件所有公用功能建议写在插件类,方便其他插件调用!
插件存放目录 /ELikj/Controller/插件名字小写.Class.php 
插件的扩展 后台渲染和数据处理 存放到/Tpl/插件目录/ 
ELitpl函数,加载其他扩展
插件的扩展中,调用自己的函数 使用 $THIS 调用来调用

``` php
class ELikj_插件名字小写{
      //function Construct 通用执行函数
      //function Bat_Cli bat 定时任务
      //插件名字方便调用 
      public  $plugin = "admin";

      function tiaoshi($CANSHU,$features){  
            // $CANSHU url的参数 ,$features 插件的参数读取的数据库  
            //tiaoshi 全部小写可以直接通过http 调用

      }

      function Loginok($CANSHU,$features){ 
            // Loginok 包含大写不能通过http 直接调用 需要使用callELi 方能跨插件调用

      }

      //一些敏感操作 可以使用 ELix 设置敏感名字 和 ELiy     验证敏感名字 方可调用
      function yanzhen($CANSHU,$features){
            if(ELiy("woyao")){
                  return false;
            }
            //必须aix 过的函数才能执行到这里
      }

      function woyan($CANSHU,$features){
            ELix("woyao");
            $this -> yanzhen($CANSHU,$features);
      }

      function Bat_Cli($CANSHU,$features){
            if(ELiy('Bat_Cli')){
                  return echoapptoken([],-1,"Run Is No Bat","");
            }
            //需要bat 执行的 函数 用于日常 定时任务
            //这里写执行逻辑
      }

      //通用处理函数 没有找到 插件方法的使用默认调用这里 方便实现 cms 各种统一验证的地方
      function Construct($CANSHU,$features){
            // $CANSHU url的参数 ,$features 插件的参数读取的数据库 
            global $YHTTP;
            $ClassFunc = $CANSHU['-1'];
            unset($CANSHU['-1']);
            /*
            //$mode  管理后台的权限验证 方便插件判断 管理的权限 需要判断的地方才调用
            'get' 读取数据
            'add' 新增数据
            'put' 修改数据
            'del' 删除数据
            */
            //判断登陆和管理权限
            if( callELi("admin","loginok",[$YHTTP],[],false)){
                  return ;
            }

            try {
                  //分文件调用 函数太多的时候 推荐调用 
                  return ELitpl($this -> plugin,$ClassFunc,$this);
                  //自身class 调用 不区分大小写 只使用 api 模式 不使用渲染模式 推荐调用 
                  //return $this ->$ClassFunc($CANSHU,$features);
            } catch (\Throwable $th) {
                  return echoapptoken([],-1,$th->getmessage());
            }
      }

}
```

## 常用函数和类介绍

``` php
ltrimE("待去除得字符串" ,"需要去除得字符串");//去除左边字符
rtrimE("待去除得字符串" ,"需要去除得字符串");//去除右边字符
trimE ("待去除得字符串" ,"需要去除得字符串");//去除两边字符
Safeconversion("字符串");//安全转义
ELixss("字符串");//xss过滤
ELiSql("字符串");//mysql安全过滤

class ELicache{ // Memcache kv缓存系统
public function s( $key, $value, $time = 0);// 写入缓存（name，值，缓存时间）
public function g( $key) ;//  获取数据(name)
public function d( $key) ;//  删除数据(name)
public function f()     ;// 清空数据(name)
public function j( $key, $num=1,$time = 0) ;// 减法( name,减去的值,缓存时间)
public function ja( $key, $num=1,$time = 0) ;//  加法( name,加上的值,缓存时间)
} 
class Textcache{         ;// 文本 kv缓存系统 和 aicache 通用
public function s( $key, $value, $time = 0) ;//写入缓存（name，值，缓存时间）
public function g( $key)  ;//获取数据(name)
public function d( $key)  ;//删除数据(name)
public function f()     ;//清空数据(name)
public function j( $key, $num=1,$time = 0) ;//减法( name,减去的值,缓存时间)
public function ja( $key, $num=1,$time = 0)  ;//加法( name,加上的值,缓存时间)
} 
class ELimemsql{   //数据库kv 缓存系统  $CC = 已经链接驱动   $zhiding 指定数据库链接信息  $dbname 默认表名字 id,name,keval,atime
public function __construct( $CC = null, $zhiding = [], $dbname = 'memcached' )
public function s( $key, $value, $time = 0) //写入缓存（name，值，缓存时间）
public function g( $key)  //获取数据(name)
public function d( $key)  //删除数据(name)
public function f()     //清空数据(name)
public function j( $key, $num=1,$time = 0) //减法( name,减去的值,缓存时间)
public function ja( $key, $num=1,$time = 0)  //加法( name,加上的值,缓存时间)
}

########缓存K V类########

$Mem = new ELicache( array("127.0.0.1:11211"));  //Memcache 内存KV
$Mem = new Textcache($data); // $data 缓存的文件路径
$Mem = new ELimemsql($data); // $data 缓存的文件路径
$Mem ->s($key,$val,$time);   //设置key val 值  time 过期时间 0 或者空 不过期
$Mem ->g($key);  //获取 key的值 
$Mem ->d($key);  //删除 key的值 
$Mem ->ja($key,$val,$time);//key  加  val数字  time 过期时间
$Mem ->j($key,$val,$time); //key 减  val数字  time 过期时间

ELiError("字符串");//输出调试错误
ELiUri(); //获取url 路径 方便路由
ELisub("字符串", 0, 1) //截取(字符串,起始位置,截取长度)
p();  //调试函数 p(变量参数 ...);
azpaixu( $para);  //数组 array A-Z 排序
Limit( $page_size = 10, $page = 5); //数据库分页解析limit(每页条数,当前页数)
getarray( $para);  //数组get 形式组合 url(数组)
toget($string);  //geturl 转换成数组( get形式字符串)
ELiSecurity( "字符串");  //安全过滤(字符串)
ELiCreate( $dir, $zz = '');//创建目录(路径，为空去掉最后/ 否者直接创建目录)；
ELiRmdir( $dir , $virtual = false); //删除目录（路径）
ip() //获取用户ip
ELimm( $var = 'ELikj'); //变异密码(字符串)
uuid($hash = "");  //生成uuid（为空随机生成 不为空指定数据生成）
orderid($biaoqian = "ELi");//生成订单号
db($table="",$ELiDataBase_ = [] ); //设置表操作(表名字，指定数据库链接信息)
class ELiDatabaseDriver{ //数据库驱动
function limit($data='') ;//设置limit 数据
function wherezuhe($data='') ;//组合where条件(数组)
function zuheset($data='') ;// 组合更新数据(数组)
function charuset($data='')  ;//组合插入数据(数组)
function pqsql($DATA ,$woqu = 1) ;// 执行批量sql(数组，等于1 直接执行 等于其他返回sql)；
function psql($data='', $bfeifn = 1 ) ;//执行组合sql(数组，等于1 直接执行 等于其他安全过滤)；
function order($data='')  ;//排序（字符串）
function where($data='')  ;//传入where条件（数组）
function pwhere()  ;//设置输出 方便调试sql 错误
function find($data='')  ;//查询单挑数据（可以为查询条件）
function setshiwu($wo = 0)  ;//开启事务（1打开0关闭）
function zhicha($datasl)  ;//设置只查字段('字段1,字段2')
function paichu($datasl = '') ;// 排除的字段(排除的字段其他全部显示)
function total($data='') ;// 统计总数（可为查询条件）
function select($data='') ;// 查询多条数据(可为查询条件)
function qurey($data='',$moth='other')  ;//自定义查询(自定义sql, other|erwei|accse|shiwu) 返回 other一维数组 erwei多维数组 accse 成功失败  shiwu执行事务
function query($data='',$moth='other')  ;//自定义查询(自定义sql, other|erwei|accse|shiwu) 返回 other一维数组 erwei多维数组 accse 成功失败  shiwu执行事务
function delete($data='')  ;//删除数据(可为查询条件)
function biao()  ;//返回完整表
function insert($data='')  ;//插入数据库(需要插入的数据)
function joinwhere($data = '')  ;//join 条件组合(数据)
function join( $data = '' )  ;//执行join 查询(组合方式)
function fanhuijoin( $jsondate) ;// 返回join链接方式(字符串)
function setbiao( $data = '' )  ;//强行更改选择表(表名字) 同一个db 链接 处理其他表 减少链接
function shezhi($data='')  ;//设置选择(数据表)
function Safeconversion($data)  ;// sql安全过滤(安全过滤)
}
class ELiPdo extends ELiDatabaseDriver{ //ELiPdo 数据库pdo驱动
public function lianjie($data) //链接数据库(数据库配置)
public  function zhixing($moth='',$sql='') //执行sql(执行方式,备用)
        $moth {
            scjg  // 组合sql 结构字段
            find // 单条查询
            joinselect//  join 查询
            select //多条查询
            charu //插入数据
            shanchu //删除数据
            xiugai// 修改数据
            zongshu //获取总条数
            other //自定义sql 返回 一维数组
            erwei //自定义sql 返回 二维数组
            accse //自定义sql 返回 布尔值
            shiwu //自定义sql 执行事务
        }
}
$D = db('center'); 
$D    -> setshiwu(1)  //设置等于1 开启事务    
    -> zhicha("id,aitme") //只查询表的字段   
    -> paichu("id,atime") //排除这些字段其他全部显示
    -> order('id desc') //排序
    -> where(array(''=>'查询条件'))//条件
    -> limit('0,1') //读取条数
    -> pwhere()   //输出sql 语句调试 
    -> find(); //读取条数一条数据
    -> select();//读取多条数据
    -> delete();//删除数据
    -> update(array());//修改数据
    -> insert(array()); //插入数据
    -> total();//获得总的条数

$D -> biao(); //获得 表完整名字
$D -> setbiao( '表名字' ); //设置独立的表名字 可以使用$D 的一个连接 多次操作减少 I/O
$D -> qurey("sql 语句" ,'返回结果参数');//返回结果参数 other 一纬数组  erwei 二纬数组   accse 成功或者失败  shiwu 执行事务;

$wheres = $D  ->wherezuhe( array() );     //组合搜索条件where独立 处理
$fanh = str_replace('WHERE','',$wheres);  //得到qurey where部分
//where 条件的组和详见 index.php  wherezuhe 

########数据库操作类########
$db = db("");
$fan = $db ->joinwhere( array( "id,uid"=>"=") )->where(array()) ->limit(1)->join( array("left","user","currencylog"));
$fan = $db ->joinwhere( array( "id,uid"=>"=","id,adminuid"=>"=") )->where(array("id" => 1))->limit(1)->join( array("inner","user","currencylog","adminlog"));
$fan = $db ->joinwhere( array( "id,uid"=>"=") )->where(array()) ->limit(1)->join( array("inner","user","currencylog"));

ELipost( $url,  $para,$Extension = array(), $cacert_url = '') //post请求(网址,参数,curl扩展参数,指定证书);
ELiget( $url  ,  $para,$Extension = array(), $cacert_url = '')  //get请求(网址,参数,curl扩展参数,指定证书);
ELihhGet($k = "") //根据$SESSIONID 获得 session的值 $k 空获取全部 否者指定的值
ELihhSet($k ,$v = null ) //根据$SESSIONID 设置 $k $k可以为数组直接设置 $v 设置的值
ELihhDel($k = "") //根据$SESSIONID  $k 等于空删除全部  否者 删除指定的值 或者 数组多个指定的值
ELivcode($sizes='1',$code="0123456789",$shu =4,$width=100,$height=50,$zadian=100,$xiaos = 6) //图形验证码(字体,随机字符,数字个数,宽,高,杂点数量,间距)
pagec( $xsuu , $page_size = 10 , $nums , $sub_pages = 5 , $page , $qianzui , $houzui = '') //html 生成分页(语言数组，,每页数量,总数量,显示分页按钮数量,当前页数,分页号前面补足,分页号后面补足 )
upload() //上传图片 $_GET['uplx'] 控制 $_FILES 接受的 file 字段  [ image 图片,flash flash,media 媒体,file 文件,all 全部允许扩展]
callELi( $Plus = "", $ClassFunc = "", $CANSHU = array(),$features = array(),$fanhui = true ) //不区分函数名调用插件（插件名字，调用处理方式，插件传递的参数，
//插件的配置， true 返回插件this， false 返回函数 返回结果）
ELibug($shuju) //调试数据记录到 bug.txt(记录的数据)
Plusconfig( $name = "") //读取插件配置文件 $name 配置文件里面的参数
ELiplus($name ,$qx = 0,$db = null ) //读取插件配置( 读取名字，0 读取 1 强制读取 2 删除，传递数据库dbclass 同一个方便使用同一个链接读取数据)
ELiLink($plush ) //组合 url 链接（数组）
ELis($name = 'ELiSafety') //设置防跨文件标示（标示）
ELiy($name = 'ELiSafety') //验证防跨文件标示（标示）
uid( $uid ,$qx = 0 ,$db = null ) //读取用户信息( 用户uid，0 读取 1 强制读取 2 删除，传递数据库dbclass 同一个方便使用同一个链接读取数据)
jiaqian( $uid = 0 , $type = 0, $money = 0,$integral = 0,$currency = 0, $data = "" , $ip = "",$plugin ="", $sql = '' )
// 操作用户货币( 用户uid,方式类型,-+ 金额,-+积分,-+金币(货币),操作详情,操作类,需要同时执行事务的sql ) ；
ELishouji($anget)//判断手机
platform($anget) //根据浏览器信息返货操作平台（浏览器信息）
uuidc($uuid ,$fan = true) //检测uuid是否符合uuid(uuid，true 返回个新的uuid 否者返回 false)
ELiCmd($wezi = "") //cli 模式下的 输出(文字)
ELitpl($plugin,$file,$THIS) //读取tpl下的action 和 风格(插件目录,读取文件,插件的class 方便使用自己this的全局函数)； 调用自己的this 使用 $THIS
ELichar($canshu = array(),$data = []) //验证post get 数据使用(配置规则，验证的数据 默认$_POST)
apptoken( $data = array() ,  $code = '0' , $msg = '' , $apptoken = '',$kuozan = []) 
//返回json格式(数据，code类型 1 成功 -1 失败 99 没有登陆,错误提示，安全token 下次post过来验证,需要扩展的参数数组) 
echoapptoken( $data = array() ,  $code = '0' , $msg = '' , $apptoken = '',$kuozan = []) 
//调用这个即可 输出json格式(数据，code类型 1 成功 -1 失败 99 没有登陆,错误提示，安全token 下次post过来验证,需要扩展的参数数组)
tiaozhuan($eangzhan = "")//跳转到其它网址去
ELilog( $baio = "adminlog", $id = 0,$type = 0 , $data = "", $mode = ""  , $plugin = plugin , $ip = ELip ) 
//数据库日志(adminlog | userlog,用户uid，日志类型,日志数据，插件函数，插件，用户ip)；
adminid( $uid ,$qx = 0 ,$db = null )//读取管理员( 管理员uid，0 读取 1 强制读取 2 删除，传递数据库dbclass 同一个方便使用同一个链接读取数据) 
pichttp($pic)  //返回图片地址 可以更改函数配置成cdn 模式
SHA256_sign($content, $privateKey, $iimm = "SHA256")//生成SH256（值，证书数据，类型）
SHA256_verify($content, $sign, $publicKey, $iimm = "SHA256")//验证（值，签名，证书，类型）
```