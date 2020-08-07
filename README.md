```
/* phpFrame  Application
* ******************************************
* home: www.elikj.com
* Copyright  ELikj
* Trademark  ELikj
* ******************************************
* 云框架 快速开发 框架  集合大家的插件快速开发
*/
ELikjVER 9.1.2{


}
ELikjVER 9.0.0{
      增加数据库缓存类 kv 缓存
      用于不适合文本缓存的地方使用 阿里云函数计算
      修复阿里云函数计算 post 获取方式
      修复swoole 一些问题
      修改界面加载方式 强制返回数据 json  用于一些地方 不能强制head头问题
      修改 加载通信请求方式 每个信息强制带 apptoken 同一登陆token
      优化后台移除功能 插件显示 子菜单 （吧 某一个插件的 菜单后台设置成一级菜单 ）
      initialize.js    基础样式演示
      initialize.php   基础操作演示
}

ELikjVER 4.0.1{
      文档更新说明 
      调整代码 
      支持 阿里云  函数计算  aliyun.php 常驻内存
      支持 swoole 模式运行  swoole.php 常驻内存
      「    常驻内存可控制 参考aliyun  和 swoole文件
            可以改造函数 
                  echoapptoken  输出函数
                  upload  上传函数
                  ip  获取ip
            可以配置常量
                  ELikj  核心文件存放位置
                  ELiTempPath 缓存的目录
                  Residentmemory 启用 常驻内存服务
      」
      根据 $SESSIONID 处理session  函数增加 ELihhGet 读取session  ELihhSet 设置session ELihhDel清空火删除指定的
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
where 条件的组和详见 index.php  wherezuhe 

########数据库操作类########
$db = db("");
$fan = $db ->joinwhere( array( "id,uid"=>"=") )->where(array()) ->limit(1)->join( array("left","user","currencylog"));
$fan = $db ->joinwhere( array( "id,uid"=>"=","id,adminuid"=>"=") )->where(array("id" => 1))->limit(1)->join( array("inner","user","currencylog","adminlog"));
$fan = $db ->joinwhere( array( "id,uid"=>"=") )->where(array()) ->limit(1)->join( array("inner","user","currencylog"));

########缓存K V类########

$Mem = new ELicache( array("127.0.0.1:11211"));  //Memcache 内存KV
$Mem = new Textcache($data); // $data 缓存的文件路径
$Mem ->s($key,$val,$time);   //设置key val 值  time 过期时间 0 或者空 不过期
$Mem ->g($key);  //获取 key的值 
$Mem ->d($key);  //删除 key的值 
$Mem ->ja($key,$val,$time);//key  加  val数字  time 过期时间
$Mem ->j($key,$val,$time); //key 减  val数字  time 过期时间
程序目录结构
/ELikj/ 核心部件文件夹
/ELikj/Controller/ 插件文件夹
/ELikj/Controller/admin.Class.php 管理后台插件
/ELikj/Temp/  系统缓存目录
/ELikj/vendor/  composer包文件夹
/ELikj/ELiConfig.php 系统常用配置  正式环境可以直接放入index.php
/ELikj/ELiDataBase.php 数据库配置 正式环境可以直接放入index.php
/ELikj/bug.txt   系统调试信息
/attachment/  附件存放目录
/Tpl/admin/  管理后台存放位置 js 位段渲染 php 后段读取数据
/Tpl/Font/  验证码字体库
/Tpl/Lang/   语言包位置 目前cn 上传地方使用 后续自己扩展
/Tpl/layui/  核心css 样式 js 库
/Tpl/home.js  后台主界面样式
/Tpl/jquery.js  jquery
/Tpl/login.js  后台登陆样式
/Tpl/mian.js  后台登陆判断默认入口
/index.php  框架核心库入口
======== index.php 主函数说明
常量 ELikj  插件位置
常量 ELiTemp 临时文件夹
常量 ELip ip地址
常量 ELiTempPath 临时文件路径
常量 sessionpath session文件夹
常量 ELifenge url拆分符号
常量 DBprefix 数据表前缀
常量 WZHOST 网站url
$SESSIONID  sessindid 主要通信标示
$ELiConfig  系统配置变量
$ELiDataBase系统数据库变量
$ELiMem  txt缓存类变量
$ELiMemsession  session缓存类变量

function Safeconversion($data) sql addslashes 替换
function ELixss($data)  xss 防御过滤
function ELiSql($data)  sql 防注入过滤
function Plusconfig( $name = "") 读取插件配置文件 $name 配置文件里面的参数
class ELicache{          Memcache kv缓存系统
      public function s( $key, $value, $time = 0) 写入缓存（name，值，缓存时间）
      public function g( $key)  获取数据(name)
      public function d( $key)  删除数据(name)
      public function f()     清空数据(name)
      public function j( $key, $num=1,$time = 0) 减法( name,减去的值,缓存时间)
      public function ja( $key, $num=1,$time = 0)  加法( name,加上的值,缓存时间)
} 

class ELimemsql{   数据库kv 缓存系统  $CC = 已经链接驱动   $zhiding 指定数据库链接信息  $dbname 默认表名字 id,name,keval,atime
      public function __construct( $CC = null, $zhiding = [], $dbname = 'memcached' )
      public function s( $key, $value, $time = 0) 写入缓存（name，值，缓存时间）
      public function g( $key)  获取数据(name)
      public function d( $key)  删除数据(name)
      public function f()     清空数据(name)
      public function j( $key, $num=1,$time = 0) 减法( name,减去的值,缓存时间)
      public function ja( $key, $num=1,$time = 0)  加法( name,加上的值,缓存时间)
}

class Textcache{          文本 kv缓存系统 和 aicache 通用
      public function s( $key, $value, $time = 0) 写入缓存（name，值，缓存时间）
      public function g( $key)  获取数据(name)
      public function d( $key)  删除数据(name)
      public function f()     清空数据(name)
      public function j( $key, $num=1,$time = 0) 减法( name,减去的值,缓存时间)
      public function ja( $key, $num=1,$time = 0)  加法( name,加上的值,缓存时间)
} 
function ELiError( $ELiError) 输出错误信息
function ELiUri() 获取url 路径 方便路由
function ELisub($str, $start=0, $length=1) 截取(字符串,起始位置,截取长度)
function p()  调试函数 p(变量参数 ...);
function azpaixu( $para)  数组 array A-Z 排序
function Limit( $page_size = 10, $page = 5) 数据库分页解析limit(每页条数,当前页数)
function getarray( $para)  数组get 形式组合 url(数组)
function toget($string)  geturl 转换成数组( get形式字符串)
function ELiSecurity( $name)  安全过滤(字符串)
function ELiCreate( $dir, $zz = '') 创建目录(路径，为空去掉最后/ 否者直接创建目录)；
function ELiRmdir( $dir , $virtual = false) 删除目录（路径）
function ip() 获取用户ip
function ELimm( $var = 'ELikj') 变异密码(字符串)
function uuid($hash = "")  生成uuid（为空随机生成 不为空指定数据生成）
function db($table="",$ELiDataBase_ = [] ) 设置表操作(表名字，指定数据库链接信息)
class ELiDatabaseDriver{ 数据库驱动
      function limit($data='') 设置limit 数据
      function wherezuhe($data='') 组合where条件(数组)
      function zuheset($data='') 组合更新数据(数组)
      function charuset($data='') 组合插入数据(数组)
      function pqsql($DATA ,$woqu = 1) 执行批量sql(数组，等于1 直接执行 等于其他返回sql)；
      function psql($data='', $bfeifn = 1 )执行组合sql(数组，等于1 直接执行 等于其他安全过滤)；
      function order($data='') 排序（字符串）
      function where($data='') 传入where条件（数组）
      function pwhere() 设置输出 方便调试sql 错误
      function find($data='') 查询单挑数据（可以为查询条件）
      function setshiwu($wo = 0) 开启事务（1打开0关闭）
      function zhicha($datasl) 设置只查字段('字段1,字段2')
      function paichu($datasl = '') 排除的字段(排除的字段其他全部显示)
      function total($data='') 统计总数（可为查询条件）
      function select($data='') 查询多条数据(可为查询条件)
      function qurey($data='',$moth='other') 自定义查询(自定义sql, other|erwei|accse|shiwu) 返回 other一维数组 erwei多维数组 accse 成功失败  shiwu执行事务
      function query($data='',$moth='other') 自定义查询(自定义sql, other|erwei|accse|shiwu) 返回 other一维数组 erwei多维数组 accse 成功失败  shiwu执行事务
      function delete($data='') 删除数据(可为查询条件)
      function biao() 返回完整表
      function insert($data='') 插入数据库(需要插入的数据)
      function joinwhere($data = '') join 条件组合(数据)
      function join( $data = '' ) 执行join 查询(组合方式)
      function fanhuijoin( $jsondate) 返回join链接方式(字符串)
      function setbiao( $data = '' ) 强行更改选择表(表名字) 同一个db 链接 处理其他表 减少链接
      function shezhi($data='') 设置选择(数据表)
      function Safeconversion($data)  sql安全过滤(安全过滤)
}
class ELiPdo extends ELiDatabaseDriver{ //ELiPdo 数据库pdo驱动
      public function lianjie($data) 链接数据库(数据库配置)
      public  function zhixing($moth='',$sql='') 执行sql(执行方式,备用)
            $moth {
                  scjg  组合sql 结构字段
                  find  单条查询
                  joinselect  join 查询
                  select 多条查询
                  charu 插入数据
                  shanchu 删除数据
                  xiugai 修改数据
                  zongshu 获取总条数
                  other 自定义sql 返回 一维数组
                  erwei 自定义sql 返回 二维数组
                  accse 自定义sql 返回 布尔值
                  shiwu 自定义sql 执行事务
            }
}
function ELipost( $url,  $para,$Extension = array(), $cacert_url = '') post请求(网址,参数,curl扩展参数,指定证书);
function ELiget( $url  ,  $para,$Extension = array(), $cacert_url = '')  get请求(网址,参数,curl扩展参数,指定证书);

function ELivcode($sizes='1',$code="0123456789",$shu =4,$width=100,$height=50,$zadian=100,$xiaos = 6) 徒刑验证码(字体,随机字符,数字个数,宽,高,杂点数量,间距)
function pagec( $xsuu , $page_size = 10 , $nums , $sub_pages = 5 , $page , $qianzui , $houzui = '') html 生成分页(语言数组，,每页数量,总数量,显示分页按钮数量,当前页数,分页号前面补足,分页号后面补足 )
function upload() 上传图片 $_GET['uplx'] 控制 $_FILES 接受的 file 字段  [ image 图片,flash flash,media 媒体,file 文件,all 全部允许扩展]
function callELi( $Plus = "", $ClassFunc = "", $CANSHU = array(),$features = array(),$fanhui = true ) 不区分函数名调用插件（插件名字，调用处理方式，插件传递的参数，插件的配置， true 返回插件this， false 返回函数 返回结果） 
function ELibug($shuju) 调试数据记录到 bug.txt(记录的数据)
function ELicall( $Plus = "", $ClassFunc = "", $CANSHU = array(),$features = array(),$fanhui = true ) 区分函数名调用插件（插件名字，调用处理方式，插件传递的参数，插件的配置， true 返回插件this， false 返回函数 返回结果） 这里http 路由使用
function ELiLoad($plush) 加载插件calss 声明class(class名字)
function config($name ,$qx = 0,$db = null ) 读取数据库里面的 通用配置(配置名字，0 读取 1 强制读取 2 删除，传递数据库dbclass 同一个方便使用同一个链接读取数据)
function ELiplus($name ,$qx = 0,$db = null ) 读取插件配置( 读取名字，0 读取 1 强制读取 2 删除，传递数据库dbclass 同一个方便使用同一个链接读取数据)
function ELiLink($plush ) 组合 url 链接（数组）
function ELis($name = 'ELiSafety') 设置防跨文件标示（标示）
function ELiy($name = 'ELiSafety') 验证防跨文件标示（标示）
function uid( $uid ,$qx = 0 ,$db = null ) 读取用户信息( 用户uid，0 读取 1 强制读取 2 删除，传递数据库dbclass 同一个方便使用同一个链接读取数据)

function  jiaqian( $uid = 0 , $type = 0, $money = 0,$integral = 0,$currency = 0, $data = "" , $ip = "",$plugin ="", $sql = '' ) 操作用户货币( 用户uid,方式类型,-+ 金额,-+积分,-+金币(货币),操作详情,操作类,需要同时执行事务的sql ) ；
function platform($anget) 根据浏览器信息返货操作平台（浏览器信息）
function uuidc($uuid ,$fan = true) 检测uuid是否符合uuid(uuid，true 返回个新的uuid 否者返回 false)
function ELiCmd($wezi = "") cli 模式下的 输出(文字)
function ELitpl($plugin,$file,$THIS) 读取tpl下的action 和 风格(插件目录,读取文件,插件的class 方便使用自己this的全局函数)； 调用自己的this 使用 $THIS
function ELichar($canshu = array(),$data = []) 验证post get 数据使用(配置规则，验证的数据 默认$_POST)
function apptoken( $data = array() ,  $code = '0' , $msg = '' , $apptoken = '',$kuozan = []) 返回json格式(数据，code类型 1 成功 -1 失败 99 没有登陆,错误提示，安全token 下次post过来验证,需要扩展的参数数组) 
function echoapptoken( $data = array() ,  $code = '0' , $msg = '' , $apptoken = '',$kuozan = []) 调用这个即可 输出json格式(数据，code类型 1 成功 -1 失败 99 没有登陆,错误提示，安全token 下次post过来验证,需要扩展的参数数组)
function ELilog( $baio = "adminlog", $id = 0,$type = 0 , $data = "", $mode = ""  , $plugin = plugin , $ip = ELip ) 数据库日志(adminlog | userlog,用户uid，日志类型,日志数据，插件函数，插件，用户ip)；
function adminid( $uid ,$qx = 0 ,$db = null )读取管理员( 管理员uid，0 读取 1 强制读取 2 删除，传递数据库dbclass 同一个方便使用同一个链接读取数据)  
function ELihhGet($k = "") 根据$SESSIONID 获得 session的值 $k 空获取全部 否者指定的值
function ELihhSet($k ,$v = null ) 根据$SESSIONID 设置 $k $k可以为数组直接设置 $v 设置的值
function ELihhDel($k = "") 根据$SESSIONID  $k 等于空删除全部  否者 删除指定的值 或者 数组多个指定的值
function pichttp($pic)  返回图片地址 可以更改函数配置成cdn 模式
插件开发说明
插件存放目录 /ELikj/Controller/插件名字小写.Class.php 
class ELikj_插件名字小写{

      //function Construct 通用执行函数
      //function Bat_Cli bat 定时任务

      public  $plugin = "admin"; 插件名字方便调用 页可以不实用

      function tiaoshi($CANSHU,$features){  // $CANSHU url的参数 ,$features 插件的参数读取的数据库  tiaoshi 全部小写可以直接通过http 调用

      }

      function Loginok($CANSHU,$features){ // Loginok 包含大写不能通过http 直接调用 需要使用callELi 方能跨插件调用

      }

      //一些敏感操作 可以使用 ELix 和 ELiy  设置敏感名字   验证敏感名字 方可调用
      function yanzhen($CANSHU,$features){
            ELiy("woyao");
            //必须aix 过的函数才能执行到这里

      }
      function woyan($CANSHU,$features){
            ELix("woyao");
            $this -> yanzhen($CANSHU,$features);
      }

      function Bat_Cli($CANSHU,$features){
            ELiy('Bat_Cli');
            //需要bat 执行的 函数 用于日常 定时任务
            //这里写执行逻辑

      }

      //通用处理函数 没有找到 插件方法的使用默认调用这里 方便实现 cms 各种统一验证的地方
      function Construct($CANSHU,$features){
            $ClassFunc = $CANSHU['-1'];
            unset($CANSHU['-1']);
            // $CANSHU url的参数 ,$features 插件的参数读取的数据库 
            /*
                  //$mode  管理后台的权限验证 方便插件判断 管理的权限 需要判断的地方才调用
                  'get' 读取数据
                  'add' 新增数据
                  'put' 修改数据
                  'del' 删除数据
                  
                  $kongzhi = [
                        'get'=>0,
                        'add'=>1,
                        'put'=>2,
                        'del'=>3,
                    ];

                    $mode = isset($CANSHU['1'])?$CANSHU['1']:'get';
                    if(!isset( $kongzhi[$mode])){
                        $mode = 'get';
                    }
                    global $YHTTP;
                    if( callELi("admin","loginok",[$YHTTP,$mode],[],false)){
                        return ;
                    }
            */
            try {
                  //分文件调用 函数太多的时候 推荐调用 
                  ELitpl($this -> plugin,$ClassFunc,$this);
                  //自身class 调用 不区分大小写 只使用 api 模式 不使用渲染模式 推荐调用 
                  //$this ->$ClassFunc($CANSHU,$features);
            } catch (\Throwable $th) {
                  return echoapptoken([],-1,$th->getmessage());
            }
            

      }

}
插件开发注意 
      希望每个人开发的 主插件是一个文件 这里可以写入你常用的 函数 供其他插件调用或者 自己多个处理地方调用
      其他扩展 后台渲染和 数据处理 存放到/Tpl/插件目录/ 
      ELitpl 加载方式 插件目录下  调用自己 主插件的函数 使用 $THIS 调用
      方便云安装 自助下载插件

基础很多插件开发中
      登陆模块
      支付模块

```