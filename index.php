<?php
/* ******************************************
 * 系统名称：以厘建站系统
 * 版权所有：成都市以厘科技有限公司 www.eLikj.com
 * 代码协议：开源代码协议 Apache License 2.0 详见 http://www.apache.org/licenses/
 * 特别申明：本软件不得用于从事违反所在国籍相关法律所禁止的活动， 
 * 对于用户擅自使用本软件从事违法活动不承担任何责任
 * ******************************************
*/
ob_start();
define("ELikjVER", '10.0.6');
$ELiMem = $ELiMemsession = null;
$REQUEST = null;
$Composer = null;
$POSTBODY = null;
$ELiConfig = [];
$ELiDataBase = [];
$LANG = [];
$CANSHU = [];
$DATA = [];
$ZDATA = [];
$features = [];
$HTTP = [];
$YHTTP = [];
$ELiHttp  = "";
$SESSIONID = "";
$URI = "";
$Plus = "";
$ClassFunc  = "";
$GLOBALS['ELiys'] = [];

function ltrimE($nn ,$wenzi =""){
    if($wenzi == ""){
        return ltrim($nn,$wenzi);
    }
    $quanbu = substr($nn, 0, strlen($wenzi));
    if($quanbu== $wenzi){
        $canxx = explode($wenzi,$nn );
        unset($canxx['0']);
        return implode($wenzi,$canxx );
    }else{
        return $nn;
    }
}

function rtrimE($nn ,$wenzi=""){
    if($wenzi == ""){
        return rtrim($nn,$wenzi);
    }
    $quanbu = substr($nn, -strlen($wenzi));
    if($quanbu==$wenzi){
        $canxx = explode($wenzi,$nn );
        unset($canxx[count($canxx)-1]);
        return implode($wenzi,$canxx );
    }else{
        return $nn;
    }
}

function trimE($nn ,$wenzi=""){
    if($wenzi == ""){
        return trim($nn );
    }
    return rtrimE(ltrimE($nn,$wenzi),$wenzi);
}
//Safe conversion
function Safeconversion($data)
{
    if (!get_magic_quotes_gpc()) return addslashes($data);
    else return $data;
}
//xss defense
function ELixss($data)
{
    $guolv = array('<', '>', '=', '"', "'", 'script', '%', '\\', '&');
    $guoHO = array('', '', '', '', '', '', '', '', '');
    return str_ireplace($guolv, $guoHO, $data);
}
//sql Safe websocket
function ELiSql($data)
{
    global $ELiConfig;
    $guolv = array('<?php', 'create ', 'select ', 'update ', 'delete ', 'database ', DBprefix, 'show tables', 'drop ', 'insert ', 'alter ', '`');
    $guoHO = array('&#60;&#63;&#112;&#104;&#112;', 'crteea', 'secelt', 'upteda', 'detele', 'datbase', 'DBprefix', 'showw tbales', 'dorp', 'inesrt', 'atler', '');
    return str_ireplace($guolv, $guoHO, $data);
}
//Memcache
class ELicache
{
    function __construct($servers)
    {
        $md = new Memcache;
        if ($servers && is_array($servers[0])) {
            foreach ($servers as $server) call_user_func_array(array($md, 'addServer'), $server);
        } else call_user_func_array(array($md, 'addServer'), $servers);
        $this->md = $md;
    }
    public function s($key, $value, $time = 0)
    {
        return $this->md->set(md5($key), $value, MEMCACHE_COMPRESSED, $time);
    }
    public function g($key)
    {
        return $this->md->get(md5($key));
    }
    public function d($key)
    {
        return $this->md->delete(md5($key));
    }
    public function f($key = '')
    {
        return $this->md->flush();
    }
    public function j($key, $num = 1, $time = 0)
    {
        $shuju = $this->g($key);
        if (!$shuju) $shuju = 0;
        $shuju -= $num;
        $this->s($key, (float)$shuju, $time);
        return $shuju;
    }
    public function ja($key, $num = 1, $time = 0)
    {
        $shuju = $this->g($key);
        if (!$shuju) $shuju = $num;
        else           $shuju += $num;
        $this->s($key, (float)$shuju, $time);
        return $shuju;
    }
}
//Text file cache
class Textcache
{
    var $DB = null;
    function __construct($data = '')
    {
        if ($data == '') $this->DB = ELiTempPath;
        else $this->DB = $data;
    }
    public function ja($key, $num = 1, $time = 0)
    {
        if (!$this->DB) return false;
        $shuju = $this->g($key);

        if (!$shuju) $shuju = $num;
        else          $shuju += $num;
        if ($time > 0)
            $this->s($key, (float)$shuju, $time);
        else    $this->s($key, (float)$shuju);
        return  $shuju;
    }
    public function j($key, $num = 1, $time = 0)
    {
        if (!$this->DB) return false;
        $shuju = $this->g($key);
        if (!$shuju) $shuju = 0;
        $shuju -= $num;
        if ($time > 0)
            $this->s($key, (float)$shuju, $time);
        else    $this->s($key, (float)$shuju);
        return  $shuju;
    }
    public function g($key)
    {
        $pat = $this->DB . str_replace('..', '', $key) . '.php';
        if (!is_file($pat)) {
            return false;
        }
        $fp = fopen($pat, "r");

        $content = null;
        if (flock($fp, LOCK_EX)) {
            $content = stream_get_contents($fp);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
        if ($content  === false || $content == null) {
            @unlink($pat);
            return false;
        }
        $time = (int) substr($content, 8, 12);

        if ($time > 0 && $time < time()) {
            @unlink($pat);
            return false;
        }
        $content = substr($content, 44);
        return unserialize($content);
    }
    public function d($key)
    {
        $pat = $this->DB . str_replace('..', '', $key) . '.php';
        if (is_file($pat)) {
            @unlink($pat);
            return true;
        } else return false;
    }
    public function f($key = '')
    {
        if ($key == ''){
            $key = $this->DB;
        }else{
            $key = ELiTempPath.str_replace('..', '', $key);
        }
        return ELiRmdir($key);
    }
    public function s($key, $value, $time = 0)
    {
        $pat = $this->DB . str_replace('..', '', $key) . '.php';
        if (!$value) $value = '0';
        if ($time > 0) {
            $time += time();
        }
        ELiCreate($pat);
        if (file_put_contents($pat, "<?php #" . sprintf('%013d', $time) . "\nexit('Error ELikj');?>\n" . serialize($value), LOCK_EX) !== false) {
            clearstatcache();
            return true;
        }
        return false;
    }
}
//Error message
function ELiError($ELiError)
{
    $ELiError_ = "html";
    if (isset($_POST['Format'])) {
        $ELiError_ = $_POST['Format'];
    } else if (isset($_GET['Format'])) {
        $ELiError_ = $_GET['Format'];
    }

    return echoapptoken([], -1, $ELiError, "");
}
//Get route function
function ELiUri()
{
    if (isset($_SERVER['argv'])) {
        unset($_SERVER['argv']['0']);
        $ELiUri = $_SERVER['PHP_SELF'] . (empty($_SERVER['argv']) ? '' : (implode("", $_SERVER['argv'])));
        if ($_SERVER['argv']) {
            foreach ($_SERVER['argv'] as $vvv) {
                $_GET[] = $vvv;
            }
        }
    } else if (isset($_SERVER['QUERY_STRING'])) {
        $ELiUri = $_SERVER['PHP_SELF'] . (empty($_SERVER['QUERY_STRING']) ? '' : ('?' . $_SERVER['QUERY_STRING']));
    } else if (isset($_SERVER['REQUEST_URI'])) {
        $ELiUri = $_SERVER['REQUEST_URI'];
    } else {
        $ELiUri = $_SERVER['PHP_SELF'] . (empty($_SERVER['QUERY_STRING']) ? '' : ('?' . $_SERVER['QUERY_STRING']));
    }
    $_SERVER['REQUEST_URI'] = $ELiUri;
}
//Intercept string
function ELisub($str, $start = 0, $length = 1)
{
    if ($length == 0) return $str;
    $charset = "utf-8";
    if (function_exists("mb_substr")) {
        if (mb_strlen($str, $charset) <= $length) return $str;
        $slice = mb_substr($str, $start, $length, $charset);
    } else {
        $re['utf-8']   = "/[/x01-/x7f]|[/xc2-/xdf][/x80-/xbf]|[/xe0-/xef][/x80-/xbf]{2}|[/xf0-/xff][/x80-/xbf]{3}/";
        $re['gb2312'] = "/[/x01-/x7f]|[/xb0-/xf7][/xa0-/xfe]/";
        $re['gbk']          = "/[/x01-/x7f]|[/x81-/xfe][/x40-/xfe]/";
        $re['big5']          = "/[/x01-/x7f]|[/x81-/xfe]([/x40-/x7e]|/xa1-/xfe])/";
        preg_match_all($re[$charset], $str, $match);
        if (count($match[0]) <= $length) return $str;
        $slice = join("", array_slice($match[0], $start, $length));
    }
    return $slice;
}
//Output debugging
function p()
{
    $args = func_get_args();
    if (count($args) < 1) {
        echo ("<font color='red'> Debug </font>");
        return;
    }
    echo "<div style='width:100%;text-align:left'><pre>\n\n";
    foreach ($args as $arg) {

        if (is_array($arg)) {
            print_r($arg);
            echo "\n";
        } else if (is_string($arg)) {
            echo $arg . "\n";
        } else {
            var_dump($arg);
            echo "\n";
        }
    }
    echo "\n</pre></div>";
}
//Sorting an array A-Z
function azpaixu($para)
{
    ksort($para);
    reset($para);
    return $para;
}
//Database paging
function Limit($page_size = 10, $page = 5)
{
    $page = (int) ((int)($page) <= 0 ? 1 : $page);
    $page_size =  (int)((int)($page_size) <= 0 ? 1 : $page_size);
    return $pages = (($page - 1) * $page_size) . "," . $page_size;
}
//Group URL
function getarray($para)
{   $arg  = "";
    $zuhe = array();
    foreach ($para as $k => $v) {
        $zuhe[] = "$k=$v";
    }
    $arg = implode("&", $zuhe);
    if (get_magic_quotes_gpc()) {
        $arg = stripslashes($arg);
    }
    return $arg;
}
// to array
function toget($string)
{   
    $string = str_replace('&nbsp;',' ',$string);
    parse_str($string,$_GET_);
    return $_GET_;
    $wenzi = explode("&", $string);
    $canshu = array();
    foreach ($wenzi as $shujus) {
        $can = explode("=", $shujus);
        if (count($can) == 2) {
            $canshu[$can['0']] = isset($can['1']) ? $can['1'] : "";
        } else {
            if (isset($can['1'])) {
                $biaohao = $can['0'];
                unset($can['0']);
                $canshu[$biaohao] = implode("=", $can);
            } else {
                $canshu[$can['0']] = "";
            }
        }
    }
    foreach ($canshu as $k => $v) {
        if (strstr($k, '[') !== false  && strstr($k, ']') !== false) {
            $kx = str_replace(array('[', ']'), array('$@$', ''), $k);
            $kx_ = explode('$@$', $kx);
            unset($canshu[$k]);
            $linshi = [];
            $zuhe = [];
            $zongshu = count($kx_);
            if ($zongshu > 0) {
                if (!isset($canshu[$kx_[0]])) {
                    $canshu[$kx_[0]] = [];
                }
            }
            if ($zongshu > 1) {
                if ($zongshu == 2) {
                    if (!is_array($canshu[$kx_[0]])) {
                        $canshu[$kx_[0]] = [];
                    }
                    $canshu[$kx_[0]][$kx_[1]] = $v;
                } else if (!isset($canshu[$kx_[0]][$kx_[1]])) {
                    $canshu[$kx_[0]][$kx_[1]] = [];
                }
            }
            if ($zongshu > 2) {
                if ($zongshu == 3) {
                    if (!is_array($canshu[$kx_[0]][$kx_[1]])) {
                        $canshu[$kx_[0]][$kx_[1]] = [];
                    }
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]] = $v;
                } else if (!isset($canshu[$kx_[0]][$kx_[1]][$kx_[2]])) {
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]] = [];
                }
            }
            if ($zongshu > 3) {
                if ($zongshu == 4) {
                    if (!is_array($canshu[$kx_[0]][$kx_[1]][$kx_[2]])) {
                        $canshu[$kx_[0]][$kx_[1]][$kx_[2]] = [];
                    }
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]] = $v;
                } else if (!isset($canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]])) {
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]] = [];
                }
            }

            if ($zongshu > 4) {
                if ($zongshu == 5) {
                    if (!is_array($canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]])) {
                        $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]] = [];
                    }
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]]  = $v;
                } else if (!isset($canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]])) {
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]] = [];
                }
            }
            if ($zongshu > 5) {

                if ($zongshu == 6) {
                    if (!is_array($canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]])) {
                        $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]] = [];
                    }
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]][$kx_[5]]  = $v;
                } else if (!isset($canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]][$kx_[5]])) {
                    $canshu[$kx_[0]][$kx_[1]][$kx_[2]][$kx_[3]][$kx_[4]][$kx_[5]] = [];
                }
            }
        }
    }
    return $canshu;
}
//Safe replacement
function ELiSecurity($name)
{
    return str_replace(array('-', '#', '/', '，', '|', '、', '\\', '*', '?', '<', '>', '.', "\n", "\r", '【', '】', '(', ')', '：', '{', '}', '\'', '"', ':', ';', ' '), array('_', ''), strtolower(trimE($name)));
}
//Create a directory
function ELiCreate($dir, $zz = '')
{
    if (strstr($dir, "#")) {
        return;
    }
    if ($zz == '') {
        $dirs = substr(strrchr($dir, '/'), 1);
        if ($dirs != '') {
            $dir = str_replace($dirs, '', $dir);
        }
        $dir =  rtrimE($dir, '/');
    }
    if (!is_dir($dir)) {
        if (!ELiCreate(dirname($dir), $zz = 2)) return false;
        if (!mkdir($dir, 0777)) return false;
    }
    return true;
}
//Delete directory
function ELiRmdir($dir, $virtual = false)
{
    $ds = DIRECTORY_SEPARATOR;
    $dir = $virtual ? realpath($dir) : $dir;
    $dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
    if (is_dir($dir) && $handle = opendir($dir)) {
        while ($file = readdir($handle)) {
            if ($file == '.' || $file == '..') {
                continue;
            } elseif (is_dir($dir . $ds . $file)) {
                ELiRmdir($dir . $ds . $file);
            } else {
                unlink($dir . $ds . $file);
            }
        }
        closedir($handle);
        rmdir($dir);
        return true;
    }
    return false;
}
//Get ip address
if (!function_exists('ip')) {
    function ip()
    {   if (isset($GLOBALS['ip'])) {
            return $GLOBALS['ip'];
        }
        $ip1 = getenv("HTTP_CLIENT_IP") ? getenv("HTTP_CLIENT_IP") : "none";
        $ip2 = getenv("HTTP_X_FORWARDED_FOR") ? getenv("HTTP_X_FORWARDED_FOR") : "none";
        $ip3 = getenv("REMOTE_ADDR") ? getenv("REMOTE_ADDR") : "none";
        $ip4 = $_SERVER['REMOTE_ADDR'] ? $_SERVER['REMOTE_ADDR'] : "none";
        if (isset($ip3) && $ip3 != "none" && $ip3 != "unknown") $ip = $ip3;
        else if (isset($ip4) && $ip4 != "none" && $ip4 != "unknown") $ip = $ip4;
        else if (isset($ip2) && $ip2 != "none" && $ip2 != "unknown") $ip = $ip2;
        else if (isset($ip1) && $ip1 != "none" && $ip1 != "unknown") $ip = $ip1;
        else $ip = $_SERVER['REMOTE_ADDR'];
        if (strstr($ip, ",")) {
            $ip_ = explode(',', $ip);
            $ip = $ip_['0'];
        }
        return $ip;
    }
}
//Security Code
function ELimm($var = 'ELikj')
{
    if (!$var) {
        $var = time() . 'b891037e3d772605f56f8e9877d8593c';
    }
    $varstr = strlen($var);
    if ($varstr < 1) {
        $varstr = 32;
    }
    $hash = md5('@中国@' . base64_encode($var . '知者不惑，') . $var . '仁者不忧，' . sha1($var . '勇者不惧，') . '@制造@');
    return substr($hash, 1, $varstr * 3);
}

function uuid($hash = "")
{
    if ($hash == "") {
        $hash = strtoupper(hash('ripemd128', rand(1, 9999999) . time() . md5(sha1(microtime()))));
    } else {
        $hash = strtoupper(md5(sha1($hash)));
    }
    return substr($hash,  0,  8) . '-' . substr($hash,  8,  4) . '-' . substr($hash, 12,  4) . '-' . substr($hash, 16,  4) . '-' . substr($hash, 20, 12);
}

function orderid($biaoqian = "ELi")
{
    usleep(1);
    return $biaoqian . date('Ymd' . rand(10, 99) . 'His') . mt_rand(100000, 999999);
}

function db($table = "", $ELiDataBase_ = [])
{
    global $ELiDataBase;
    if ($ELiDataBase_) {
        $ELiDataBase = $ELiDataBase_;
    }
    $ELiDatabaseDriver = new ELiPdo($ELiDataBase);
    return $ELiDatabaseDriver->shezhi($table);
}

class ELiDatabaseDriver
{
    var $DB = null;
    var $mysql = null;
    var $where = null;
    var $paixu = null;
    var $lismt = null;
    var $sql = null;
    var $table = null;
    var $tablejg = null;
    var $update = null;
    var $charu = null;
    var $bqdoq = null;
    var $SHIWU = 0;
    var $dqqz = null;
    var $JOIN = null;
    var $JOINtable = null;
    var $JOINwhere = null;
    var $yuanwhere = null;
    var $tiaoshi = false;
    var $PAICHU = null;
    var $ZHICHA = null;
    public function __construct($data = '')
    {
        $this->DB = $data;
        return $this;
    }
    function limit($data = '')
    {
        if ($data != '') {
            $this->lismt = ' LIMIT ' . $this->Safeconversion($data);
        }
        return $this;
    }
    function wherezuhe($data = '')
    {
        $x = '';
        if (is_array($data)) {
            $zhsss = count($data);
            if ($zhsss < 1) return;
            foreach ($data as $k => $v) {
                $k = $this->Safeconversion($k);
                if (!is_array($v)) {
                    $v = $this->Safeconversion($v);
                }
                if (strstr($k, '>=') !== false) {
                    $k = trimE(str_replace('>=', '', $k));
                    $x .= " and `$k` >= '$v'";
                } else if (strstr($k, '>') !== false) {
                    $k = trimE(str_replace('>', '', $k));
                    $x .= " and `$k` > '$v'";
                } else if (strstr($k, '(') !== false) {
                    if ($v == 'and') $v = 'and';
                    else            $v = 'OR';
                    $x .= " $v (";
                } else if (strstr($k, ')') !== false) {
                    $x .= " ) ";
                } else if (strstr($k, '<=') !== false) {
                    $k = trimE(str_replace('<=', '', $k));
                    $x .= " and `$k` <= '$v'";
                } else if (strstr($k, '<') !== false) {
                    $k = trimE(str_replace('<', '', $k));
                    $x .= " and `$k` < '$v'";
                } else if (strstr($k, '!=') !== false) {
                    $k = trimE(str_replace('!=', '', $k));
                    $x .= " and `$k` != '$v'";
                } else if (strstr($k, 'OLK') !== false) {
                    $k = trimE(str_replace('OLK', '', $k));
                    $x .= " OR `$k` LIKE '$v'";
                } else if (strstr($k, 'LIKE') !== false) {
                    $k = trimE(str_replace('LIKE', '', $k));
                    $x .= " and `$k` LIKE '$v'";
                } else if (strstr($k, 'OR') !== false) {
                    $k = trimE(str_replace('OR', '', $k));
                    $x .= " OR `$k` = '$v'";
                } else if (strstr($k, 'IN') !== false) {
                    $k = trimE(str_replace('IN', '', $k));
                    if (is_array($v))
                        $x .= " and `$k` IN(" . implode(',', $v) . ")";
                    else
                        $x .= " and `$k` IN($v)";
                } else if (strstr($k, 'DAYD') !== false) {
                    $k = trimE(str_replace('DAYD', '', $k));
                    $x .= " and $k >= $v";
                } else if (strstr($k, 'DAY') !== false) {
                    $k = trimE(str_replace('DAY', '', $k));
                    $x .= " and $k > $v";
                } else if (strstr($k, 'XIYD') !== false) {
                    $k = trimE(str_replace('XIYD', '', $k));
                    $x .= " and $k <= $v";
                } else if (strstr($k, 'XIY') !== false) {
                    $k = trimE(str_replace('XIY', '', $k));
                    $x .= " and $k < $v";
                } else if (strstr($k, 'DEY') !== false) {
                    $k = trimE(str_replace('DEY', '', $k));
                    $x .= " and $k = $v";
                } else
                    $x .= " and `$k`='$v'";
            }
            $x = str_replace(array('( OR ', '( and '), array('( ', '( '), $x);
            $x = (ltrimE(trimE($x), 'OR'));
        } else $x .= $data;
        return 'WHERE ' . (ltrimE(trimE($x), 'and'));
    }
    public function zuheset($data = '')
    {
        if (!is_array($data)) {
            return $data;
        }
        $chaxun = $this->tablejg[1];
        $x = array();
        foreach ($chaxun as $k => $v) {
            if (isset($data[$k]) && $v != 'auto_increment') {
                $x[] = "`$k` = '{$this->Safeconversion($data[$k])}'";
            } else if (isset($data[$k . ' +'])) {
                $x[] = "`$k` = $k + '{$this->Safeconversion($data[$k . ' +'])}'";
            } else if (isset($data[$k . ' -'])) {
                $x[] = "`$k` = $k - '{$this->Safeconversion($data[$k . ' -'])}'";
            }
        }
        return implode(',', $x);
    }
    public function charuset($data = '')
    {

        if (!is_array($data)) {
            return null;
        }
        $chaxun = $this->tablejg[1];
        $xv = array();
        foreach ($chaxun as $k => $v) {
            if (isset($data[$k]) && $data[$k] != '' && $v != 'auto_increment') {
                $xv[] = "'{$this->Safeconversion($data[$k])}'";
            } else {
                if ($v != 'auto_increment') {
                    $xv[] = "'" . str_replace($k . '_', '', $v) . "'";
                }
            }
        }
        $ndd = array();
        foreach ($this->tablejg[1] as $ttm => $vvv) {
            if ($vvv != 'auto_increment') {
                $ndd[] = '`' . $ttm . '`';
            }
        }
        return '(' . implode(',', $ndd) . ')VALUES (' . implode(',', $xv) . ')';
    }

    function pqsql($DATA, $woqu = 1)
    {
        if (!is_array($DATA)) {
            return null;
        }
        $qian = "INSERT INTO   `{$this->table}` ({$this->tablejg[0]})VALUES";
        $sql = $qian;
        $i = 1;
        $num = count($DATA);
        $shuju = ceil($num / 10);
        if ($num > 1000 || $shuju < 100) {
            $shuju = 1000;
        }
        foreach ($DATA as $anyou) {
            if ($i % $shuju == 0) {
                $sql = rtrimE($sql, ',');
                $sql .= ';' . $qian . $anyou . ',';
            } else {
                $sql .= $anyou . ',';
            }
            $i++;
        }
        $sql = rtrimE($sql, ',');
        if ($woqu != '1') {
            return $sql;
        }
        if ($this->SHIWU == 1) {
            return  $this->qurey($sql, 'shiwu');
        } else {
            return  $this->qurey($sql, 'other');
        }
    }
    function psql($data = '', $bfeifn = 1)
    {
        if (!is_array($data)) return null;
        $chaxun = $this->tablejg[1];
        $xv = array();
        foreach ($chaxun as $k => $v) {
            if (isset($data[$k]) && $data[$k] != '' && $v != 'auto_increment') {
                $xv[] = "'{$this->Safeconversion($data[$k])}'";
            } else {
                if ($bfeifn != '1') {
                    $xv[] = "'{$this->Safeconversion($data[$k])}'";
                } else {
                    if ($v == 'auto_increment') $xv[] = 'NULL';
                    else $xv[] = "'" . str_replace($k . '_', '', $v) . "'";
                }
            }
        }
        return '(' . implode(',', $xv) . ')';
    }
    function order($data = '')
    {
        if ($data != '') {
            $this->paixu = ' ORDER BY ' . ELisql($data);
        }
        return $this;
    }
    function where($data = '')
    {
        if ($data != '') {
            $this->yuanwhere =   $data;
            $this->where = $this->wherezuhe($data);
        }
        return $this;
    }
    function pwhere()
    {
        $this->tiaoshi = true;
        return $this;
    }
    function find($data = '')
    {
        if ($data != '') {
            if (is_array($data)) {
                $this->where = $this->wherezuhe($data);
            } else {
                $chaxun = $this->tablejg[1];
                foreach ($chaxun as $k => $v) {
                    if ($v == 'auto_increment') {
                        $dataf[$k . ' IN'] = $data;
                        break;
                    }
                }
                $this->where = $this->wherezuhe($dataf);
            }
        }
        return  $this->zhixing('find');
    }
    function setshiwu($wo = 0)
    {
        $this->SHIWU = $wo;
        return $this;
    }

    function zhicha($datasl)
    {
        if ($datasl != '') {
            $zhiduan = $datasl;
            $hhx = explode(',', $zhiduan);
            $zuhe = [];
            foreach ($hhx as $zifu) {
                $zuhe[] = '`' . ELiSql($zifu) . '`';
            }
            
            $this->ZHICHA = implode(',', $zuhe);
        }
        return $this;
    }
    function paichu($datasl = '')
    {
        if ($datasl != '') {
            $hhx = array_flip(explode(',', $datasl));
            $zuhe = [];
            foreach ($this->tablejg['1']  as $k => $v) {
                if (!isset($hhx[$k])) {
                    $zuhe[] = '`' . ELiSql($k) . '`';
                }
            }
            $this->PAICHU = implode(',', $zuhe);
        }

        return $this;
    }
    function total($data = '')
    {
        if ($data != '') {
            $this->where = $this->wherezuhe($data);
        }
        return  $this->zhixing('zongshu');
    }
    function select($data = '')
    {
        if ($data != '') {
            $this->where = $this->wherezuhe($data);
        }
        return  $this->zhixing('select');
    }
    function qurey($data = '', $moth = 'other')
    {
        $this->sql = $data;
        return  $this->zhixing($moth);
    }
    function query($data = '', $moth = 'other')
    {
        $this->sql = $data;
        return  $this->zhixing($moth);
    }
    function update($data = '')
    {

        if ($data == '') {
            return false;
        }
        $this->update = $this->zuheset($data);
        return  $this->zhixing('xiugai');
    }

    function delete($data = '')
    {
        if ($data != '') {
            if (is_array($data)) {
                $this->where = $this->wherezuhe($data);
            } else {
                $chaxun = $this->tablejg[1];
                foreach ($chaxun as $k => $v) {
                    if ($v == 'auto_increment') {
                        $dataf[$k . ' IN'] = $data;
                        break;
                    }
                }
                $this->where = $this->wherezuhe($dataf);
            }
        }
        return  $this->zhixing('shanchu');
    }
    function biao()
    {
        return $this->table;
    }
    function insert($data = '')
    {
        $this->charu = $this->charuset($data);
        return  $this->zhixing('charu');
    }
    function joinwhere($data = '')
    {
        if ($data != '') {
            if (is_array($data)) {
                $this->JOINwhere = $data;
            } else {
                $this->JOINwhere = explode(",", $data);
            }
        }
        return $this;
    }
    function join($data = '')
    {
        if ($data != '') {
            $zhixing = true;
            if (is_array($data)) {
                $this->JOIN = $data;
            } else {
                $this->JOIN = explode(",", $data);
            }
            if (count($this->JOIN) > 2) {
                return $this->zhixing('joinselect');
            } else {
                p("join error");
            }
        }
    }
    function fanhuijoin($jsondate)
    {
        if( $jsondate == 'inner'){
            $jsondate = ' InNEr JOIN ';
        }else  if( $jsondate == 'left'){
            $jsondate = ' LeFt JOIN ';
        }else  if( $jsondate == 'right'){
            $jsondate = ' RiGHt JOIN ';
        }else  if( $jsondate == 'full'){
            $jsondate = ' FuLl JOIN ';
        }else{
            $jsondate = ' InNEr JOIN ';
        }
        return $jsondate;
    }
    function setbiao($data = '')
    {
        global $ELiConfig, $ELiMem;
        $suiji =  $this->dqqz;

        $qianzui = $this->DB[$suiji]['prefix'];
        if ($data != '') {
            $this->table =  $qianzui . $this->Safeconversion($data);
            $HASH = 'db/' . ELimm($this->table);
            $huanc = $ELiMem->g($HASH);
            if ($huanc && $ELiConfig['operatingmode'] == "1") {
                $this->tablejg = $huanc;
            } else {
                $qq = $this->zhixing('scjg');
                $zuhe = [];
                $mmmx = array_flip($qq);
                foreach ($mmmx as $zz) {
                    $zuhe[] = '`' . ELisql($zz) . '`';
                }
                $gege['0'] = $chaxun = implode(',', $zuhe);
                $gege['1'] = $qq;
                $this->tablejg = $gege;
                $ELiMem->s($HASH, $gege);
            }
        }
        return $this;
    }
    function shezhi($data = '')
    {
        global $ELiConfig;
        if (!isset($ELiConfig['dbselect']) || $ELiConfig['dbselect'] == '') {
            $this->bqdoq = 'write';
        } else {
            $this->bqdoq = $ELiConfig['dbselect'];
        }
        if ($ELiConfig['doku'] == '1') {
            $suiji = array_rand($this->DB, 1);
        } else {
            $suiji = $this->bqdoq;
        }
        $this->dqqz = $suiji;
        $this->lianjie($this->DB[$suiji]);
        if ($data != '') {
            $qianzui = $this->DB[$suiji]['prefix'];
            $this->table = $qianzui . $data;
            $HASH = 'db/' . ELimm($this->table);
            global $ELiMem;
            $huanc = $ELiMem->g($HASH);
            if ($huanc && $ELiConfig['operatingmode'] == "1") {
                $this->tablejg = $huanc;
            } else {
                $qq = $this->zhixing('scjg');
                $zuhe = [];
                $mmmx = array_flip($qq);
                foreach ($mmmx as $zz) {
                    $zuhe[] = '`' . ELisql($zz) . '`';
                }
                $gege['0'] = $chaxun = implode(',', $zuhe);
                $gege['1'] = $qq;
                $this->tablejg = $gege;
                $ELiMem->s($HASH, $gege);
            }
        }
        return $this;
    }
    public function Safeconversion($data)
    {
        if (!get_magic_quotes_gpc()) return ELiSql(addslashes($data));
        else return ELiSql($data);
    }
}

class ELiPdo extends ELiDatabaseDriver
{
    public function lianjie($data)
    {
        try {
            $pdo = new PDO("mysql:host={$data['hostname']};port={$data['hostport']};dbname={$data['database']}", $data['username'], $data['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$data['charset']}"));
        } catch (PDOException $e) {
            global $ELiConfig;
            if ($ELiConfig['debugging'] != 0) {
                p($e->getMessage());
            }
            $pdo = new PDO("mysql:host={$data['hostname']};port={$data['hostport']};dbname={$data['database']}", $data['username'], $data['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$data['charset']}"));
        }

        $this->mysql = $pdo;
        return $pdo;
    }

    public  function zhixing($moth = '', $sql = '')
    {

        global $ELiConfig;
        $DATA = array();
        if ($moth == 'scjg') {
            $sql = "desc `{$this->table}`";
            $qq = $this->mysql->prepare($sql);
            $qq->execute();
            while ($row = $qq->fetch(PDO::FETCH_ASSOC)) {
                $DATA["{$row['Field']}"] = $row['Extra'] == '' ? $row['Field'] . '_' . $row['Default'] : $row['Extra'];
            }
            return  $DATA;
        } else if ($moth == 'find') {
            if($this-> ZHICHA ){
                $chaxun =$this-> ZHICHA;
            }else if($this-> PAICHU ){
                $chaxun =$this-> PAICHU;
            }else{
                $chaxun = $this->tablejg[0];
            }
            $sql = "SELECT $chaxun FROM  `{$this->table}` {$this->where} {$this->paixu} LIMIT 0 , 1";
            $this-> PAICHU = $this-> ZHICHA = $this->where = $this->paixu = null;
            if ($this->tiaoshi) {
                p($sql);
                $this->tiaoshi = false;
            }
            $qq = $this->mysql->prepare($sql);
            $qq->execute();
            $row = $qq->fetch(PDO::FETCH_ASSOC);
            if (!$row) return false;
            else return $row;
        } else if ($moth == 'joinselect') {
            $jsondate =  $k = $this->Safeconversion($this->JOIN['0']);
            $diyitable = $k = $this->Safeconversion($this->JOIN['1']);
            unset($this->JOIN['0']);
            unset($this->JOIN['1']);
            $jsondate = $this->fanhuijoin($jsondate);
            $this->shezhi($diyitable);
            $diyitable = $this->biao();
            $xingdian = "*";
            if($this-> ZHICHA ){
                $baiojiegou =$this-> ZHICHA;
            }else if($this-> PAICHU ){
                $baiojiegou =$this-> PAICHU;
            }else{
                $baiojiegou = $this->tablejg[0];
            }
            if ($baiojiegou != "") {
                $biaogou = explode(",", $baiojiegou);
                $zuhede = array();
                foreach ($biaogou as $zhis) {
                    $zuhede[] = $diyitable . '.' . $zhis;
                }
                $xingdian = implode(",", $zuhede);
            }
            $wheresd = array();
            $i = 0;
            foreach ($this->JOINwhere as $k => $shuju) {
                $tashiz = explode(',', $k);
                $wheresd[$i] =  $diyitable . '.' . $tashiz['0'] . ' ' . $shuju . ' @@.' . $tashiz['1'];
                $i++;
            }
            $onhouxu = "";
            $i = 0;
            foreach ($this->JOIN as $shujude) {
                $tdexiabiao = "";
                if (strpos($shujude, ',')  !== false) {
                    $fancanshu = explode(',', $shujude);
                    $shujude = $fancanshu[1];
                    $tdexiabiao = $this->fanhuijoin($fancanshu[0]);
                }
                if ($tdexiabiao == "") {
                    $tdexiabiao = $jsondate;
                }
                $shujude = $this->Safeconversion($shujude);
                $this->shezhi($shujude);
                $shujude = $this->biao();
                if($this-> ZHICHA ){
                    $baiojiegou =$this-> ZHICHA;
                }else if($this-> PAICHU ){
                    $baiojiegou =$this-> PAICHU;
                }else{
                    $baiojiegou = $this->tablejg[0];
                }
                if(isset($wheresd[$i])){
                    $wheresd[$i] = str_replace(" ","",$wheresd[$i]);
                }else{
                    $wheresd[$i] =  "";
                }
                if ($i < 1) {
                    $onhouxu .=  $shujude . " ON " . str_replace('@@', $shujude, $wheresd[$i]);
                } else {
                    $onhouxu .= $tdexiabiao . $shujude . " ON " . str_replace('@@', $shujude, $wheresd[$i]);
                }
                if ($baiojiegou != "") {
                    $biaogou = explode(",", $baiojiegou);
                    $zuhede = array();
                    foreach ($biaogou as $zhis) {
                        $zuhede[] = $shujude . '.' . $zhis;
                    }
                    $xingdian .= ',' . implode(",", $zuhede);
                }
                $i++;
            }
            if ($this->where) {
                foreach ($this->yuanwhere as  $k => $v) {
                    $k = $this->Safeconversion($k);
                    $this->where = str_replace("`$k`", "`$diyitable`.`$k`", $this->where);
                }
            }
            $onhouxu = ltrimE($onhouxu, $jsondate);
            $sql = "SELECT $xingdian FROM $diyitable $jsondate $onhouxu {$this->where} {$this->paixu} {$this->lismt}";
            $this-> PAICHU = $this-> ZHICHA = $this->yuanwhere = $this->JOINwhere = $this->JOIN = $this->JOINtable = $this->where = $this->paixu = $this->lismt = null;
            if ($this->tiaoshi) {
                p($sql);
                $this->tiaoshi = false;
            }
            $qq = $this->mysql->prepare($sql);
            $qq->execute();
            $row = $qq->fetchAll(PDO::FETCH_ASSOC);
            if (!$row) return false;
            else return $row;
        } else if ($moth == 'select') {
            if($this-> ZHICHA ){
                $chaxun =$this-> ZHICHA;
            }else if($this-> PAICHU ){
                $chaxun =$this-> PAICHU;
            }else{
                $chaxun = $this->tablejg[0];
            }
            $sql = "SELECT $chaxun FROM  `{$this->table}` {$this->where} {$this->paixu} {$this->lismt}";
            $this-> PAICHU = $this-> ZHICHA = $this->where = $this->paixu = $this->lismt = null;
            $qq = $this->mysql->prepare($sql);
            if ($this->tiaoshi) {
                p($sql);
                $this->tiaoshi = false;
            }
            $qq->execute();
            $row = $qq->fetchAll(PDO::FETCH_ASSOC);
            if (!$row) return false;
            else return $row;
        } else if ($moth == 'charu') {
            $sql = "INSERT INTO  `{$this->table}` {$this->charu}";
            $this->charu = null;
            if ($this->SHIWU == 1) return $sql . ';@;';
            if ($ELiConfig['doku'] == '1' && $this->bqdoq !=  $this->dqqz)
                $this->lianjie($this->DB[$this->bqdoq]);
            if ($this->tiaoshi) {
                p($sql);
                $this->tiaoshi = false;
            }
            $qq = $this->mysql->prepare($sql);
            $qq->execute();
            $id = $this->mysql->lastInsertId();
            if ($id) return $id;
            else return false;
        } else if ($moth == 'shanchu') {
            $sql = "DELETE FROM  `{$this->table}` {$this->where}  {$this->lismt}";
            $this->where = $this->lismt = null;
            if ($this->SHIWU == 1) return $sql . ';@;';
            if ($ELiConfig['doku'] == '1' && $this->bqdoq !=  $this->dqqz)
                $this->lianjie($this->DB[$this->bqdoq]);
            if ($this->tiaoshi) {
                p($sql);
                $this->tiaoshi = false;
            }
            $qq = $this->mysql->prepare($sql);
            $qq->execute();
            if ($qq->rowCount()) return true;
            else return false;
        } else if ($moth == 'xiugai') {
            $sql = "UPDATE   `{$this->table}` SET {$this->update}  {$this->where}  {$this->lismt}";
            $this-> PAICHU = $this-> ZHICHA = $this->where = $this->update = $this->lismt = null;
            if ($this->SHIWU == 1) return $sql . ';@;';
            if ($ELiConfig['doku'] == '1' && $this->bqdoq !=  $this->dqqz)
                $this->lianjie($this->DB[$this->bqdoq]);
            if ($this->tiaoshi) {
                p($sql);
                $this->tiaoshi = false;
            }
            $qq = $this->mysql->prepare($sql);
            $qq->execute();
            if ($qq->rowCount()) return true;
            else return false;
        } else if ($moth == 'zongshu') {
            $chaxun = $this->tablejg[0];
            $sql = "SELECT count(*) as count FROM  `{$this->table}` {$this->where} {$this->paixu} {$this->lismt}";
            $this-> PAICHU = $this-> ZHICHA = $this->where = $this->paixu = $this->lismt = null;
            $qq = $this->mysql->prepare($sql);
            if ($this->tiaoshi) {
                p($sql);
                $this->tiaoshi = false;
            }
            $qq->execute();
            $row = $qq->fetch(PDO::FETCH_ASSOC);
            return $row['count'];
        } else if ($moth == 'other') {
            if ($ELiConfig['doku'] == '1' && $this->bqdoq !=  $this->dqqz)
                $this->lianjie($this->DB[$this->bqdoq]);
            $qq = $this->mysql->prepare($this->sql);
            if ($this->tiaoshi) {
                p($this->sql);
                $this->tiaoshi = false;
            }
            $qq->execute();
            $row = $qq->fetch(PDO::FETCH_ASSOC);
            if (!$row) return false;
            else return $row;
        } else if ($moth == 'erwei') {
            if ($ELiConfig['doku'] == '1' && $this->bqdoq !=  $this->dqqz)
                $this->lianjie($this->DB[$this->bqdoq]);
            $qq = $this->mysql->prepare($this->sql);
            if ($this->tiaoshi) {
                p($this->sql);
                $this->tiaoshi = false;
            }
            $qq->execute();
            $row = $qq->fetchAll(PDO::FETCH_ASSOC);
            if (!$row) return false;
            else return $row;
        } else if ($moth == 'accse') {
            if ($ELiConfig['doku'] == '1' && $this->bqdoq !=  $this->dqqz)
                $this->lianjie($this->DB[$this->bqdoq]);
            $qq = $this->mysql->prepare($this->sql);
            if ($this->tiaoshi) {
                p($this->sql);
                $this->tiaoshi = false;
            }
            $row = $qq->execute();
            if (!$row) return false;
            else return true;
        } else if ($moth == 'shiwu') {
            if ($ELiConfig['doku'] == '1' && $this->bqdoq !=  $this->dqqz)
                $this->lianjie($this->DB[$this->bqdoq]);
            $this->mysql->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
            if ($this->tiaoshi) {
                p($this->sql);
                $this->tiaoshi = false;
            }
            try {
                $this->mysql->beginTransaction();
                $zhiss =  explode(';@;', $this->sql);
                foreach ($zhiss as $tsss) {
                    if ($tsss == '') continue;
                    $woud = $this->mysql->exec($tsss . ';');
                    if (!$woud) {
                        $wodw = new Textcache;
                        $wodw->s('sqlerror/' . time() . '_' . rand(1, 9999999), $tsss . ' @@@@@ ' . $this->sql);
                        $this->mysql->rollback();
                        $this->sql = NULL;
                        $this->mysql->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
                        return false;
                    }
                }
                $fanhui =  $this->mysql->commit();
                $this->sql = NULL;
                $this->mysql->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
                return  $fanhui;
            } catch (PDOExecption $e) {
                $wodw = new Textcache;
                $wodw->s('sqlerror/' . time() . '_' . rand(1, 9999999), $this->sql);
                $this->mysql->rollback();
                $this->sql = NULL;
                $this->mysql->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
                return false;
            }
        }
    }
}
//request post
function ELipost($url,  $para, $Extension = array(), $cacert_url = '')
{
    $curl = curl_init($url);
    if (strpos($url, "s://") !== false) {
        if ($cacert_url != '') {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
            curl_setopt($curl, CURLOPT_CAINFO, $cacert_url);
        } else {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
    }
    curl_setopt($curl, CURLOPT_TIMEOUT, 240);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $para);
    if ($Extension) {
        foreach ($Extension as $k => $v) {
            curl_setopt($curl, $k, $v);
        }
    }
    $responseText = curl_exec($curl);
    curl_close($curl);
    return $responseText;
}
//request get
function ELiget($url, $Extension = array(), $cacert_url = '')
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 240);
    if (strpos($url, "s://") !== false) {
        if ($cacert_url != '') {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
            curl_setopt($curl, CURLOPT_CAINFO, $cacert_url);
        } else {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
    }
    if ($Extension) {
        foreach ($Extension as $k => $v) {
            curl_setopt($curl, $k, $v);
        }
    }
    $responseText = curl_exec($curl);
    curl_close($curl);
    return $responseText;
}

function ELihhGet($k = "")
{
    global $ELiConfig, $SESSIONID, $ELiMemsession;
    $session_data = $ELiMemsession->g(sessionpath . $SESSIONID);
    if (!$session_data || !is_array($session_data)) {
        $session_data = [];
    }
    if ($k != "") {
        if (isset($session_data[$k])) {
            return $session_data[$k];
        } else {
            return  false;
        }
    }
    return $session_data;
}

function ELihhSet($k, $v = null)
{
    global $ELiConfig, $SESSIONID, $ELiMemsession;
    $session_data = $ELiMemsession->g(sessionpath . $SESSIONID);
    if (!$session_data || !is_array($session_data)) {
        $session_data = [];
    }
    if ($k) {
        if (is_array($k)) {
            foreach ($k as $tt => $xxx) {
                $session_data[$tt] = $xxx;
            }
        } else {
            $session_data[$k] = $v;
        }
        $ELiMemsession->s(sessionpath . $SESSIONID, $session_data, $ELiConfig['sessiontime']);
    }
    return $session_data;
}
function ELihhDel($k = "")
{
    global $ELiConfig, $SESSIONID, $ELiMemsession;
    if ($k == "") {
        return $ELiMemsession->d(sessionpath . $SESSIONID);
    }
    $session_data = $ELiMemsession->g(sessionpath . $SESSIONID);
    if (!$session_data || !is_array($session_data)) {
        $session_data = [];
    }
    if (is_array($k)) {
        foreach ($k as $tt => $xxx) {
            if (isset($session_data[$tt])) {
                unset($session_data[$tt]);
            }
        }
    } else {
        if (isset($session_data[$k])) {
            unset($session_data[$k]);
        }
    }
    $ELiMemsession->s(sessionpath . $SESSIONID, $session_data, $ELiConfig['sessiontime']);
    return $session_data;
}

class ELimemsql
{
    function __construct($CC = null, $zhiding = [], $dbname = 'memcached')
    {
        global $ELiMem, $ELiDataBase;
        if (!$ELiMem) $ELiMem = new Textcache;
        if (!$zhiding) $zhiding = $ELiDataBase;
        if (!$CC) $CC  = db($dbname, $zhiding);
        else  $CC->setbiao($dbname);
        $this->mysql = $CC->setshiwu('0');
        return $this->mysql;
    }
    public function s($key, $value, $time = 0)
    {
        if ($time > 0) $time = time() + $time;
        $sqlx = "('" . $this->mysql->Safeconversion($key) . "','" . Safeconversion(serialize($value)) . "','" . ((int)$time) . "')"; // '(." ,".
        $fan = $this->mysql->qurey(" INSERT INTO `" . $this->mysql->biao() . "` (`name`,`keval`,`atime`) VALUES " . $sqlx, 'accse');
        if (!$fan) {
            $this->mysql->qurey("UPDATE  `" . $this->mysql->biao() . "` SET `atime` = " . ((int)$time) . " ,`keval` = '" . Safeconversion(serialize($value)) . "' " . $this->mysql->wherezuhe(array('name' => $key)), 'accse');
        }
        return true;
    }
    public function g($key)
    {
        $data = $this->mysql->where(array('name' => $key))->find();
        if ($data) {
            if ($data['atime'] > 0) {
                if ($data['atime'] < time()) {
                    $this->d($key);
                    return false;
                }
            }
            return unserialize($data['keval']);
        } else return false;
    }
    public function d($key)
    {
        return $this->mysql->delete(array('name' => $key));
    }
    public function f($key = "" )
    {   $where = [];
        if($key != ""){
            $where['name LIKE'] = '%'.ELixss($key).'%';
        }
        return $this->mysql->delete($where);
    }
    public function j($key, $num = 1, $time = 0)
    {
        $shuju = (float)$this->g($key);
        if (!$shuju) $shuju = 0;
        $shuju -= $num;
        $this->s($key, $shuju, $time);
        return $shuju;
    }
    public function ja($key, $num = 1, $time = 0)
    {
        $shuju = (float)$this->g($key);
        if (!$shuju) $shuju = $num;
        else           $shuju += $num;
        $this->s($key, $shuju, $time);
        return $shuju;
    }
}
//Captcha
function ELivcode($sizes = '1', $code = "0123456789", $shu = 4, $width = 100, $height = 50, $zadian = 100, $xiaos = 6)
{
    ob_clean();
    $GLOBALS['head'] = "png";
    if (!defined("Residentmemory")) {
        header("Content-type: image/png");
    }
    global $ELiConfig;
    $width *= 2;
    if ($code == '') $code = "0123456789";
    preg_match_all("/./u", $code, $arr);
    $CODE = $arr[0];
    $ascii = '';
    if ($sizes == '0') $ZITI = rand(1, 10);
    else              $ZITI = $sizes;
    $size = rand(30, 40);
    $code1 = "ABCDEFGHIJKLMOPQRSTUVWXYZabcdefghijklmopqrstuvwxyz~!@#$%^&*()_+-=.";
    $mkqian = [];
    $code = str_split($code);
    $code1 = str_split($code1);
    for ($i = 0; $i < $shu; $i++) {
        $mkqian[] = $code[array_rand($code,1)];
    }
    for ($i = 0; $i < $shu; $i++) {
        $mkqian[] = $code1[array_rand($code1,1)];
    }
    shuffle($mkqian);

    $mofont = ELikj . '../Tpl/Font/' . $ZITI . '.ttf';
    $zhufu = explode(',', $ELiConfig['vcode']);
    $shu *= 2;
    $zzzz = rand(30, 60);
    if (class_exists('Imagick')) {
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $image = new Imagick();
        $draw = new ImagickDraw();
        $color = '#' . $rand[rand(5, 15)] . $rand[rand(5, 15)] . $rand[rand(5, 15)] . $rand[rand(5, 15)] . $rand[rand(5, 15)] . $rand[rand(5, 15)];
        $pixel = new ImagickPixel($color);
        $image->newImage($width, $height, $pixel);
        $draw->setFontSize($size);
        $draw->setFont($mofont);
        $image->addNoiseImage(imagick::NOISE_POISSON, imagick::CHANNEL_OPACITY);
        $color = '#' . $rand[rand(0, 8)] . $rand[rand(0, 8)] . $rand[rand(0, 8)] . $rand[rand(0, 8)] . $rand[rand(0, 8)] . $rand[rand(0, 8)];
        $draw->setfillcolor($color);
        for ($i = 0; $i < $shu; $i++) {
            if ($sizes < 0) {
                $ZITI = rand(1, 10);
                $draw->setFont(ELikj . '../Tpl/Font/' . $ZITI . '.ttf');
            }
            if ($sizes == -2) {
                $char = $zhufu[$i] . '                                ....__-$%#$^^6634' . rand(1, 999999);
                $ZITI = 11;
                $draw->setFont(ELikj . '../Tpl/Font/' . $ZITI . '.ttf');
            } else {
                $char = $mkqian[$i];
            }
            $shus = $i * ($width / $height) * $xiaos;
            $tux = $shus + rand(5, 10);
            $tuy =  (int)($height / 2) + rand(5, $size);
            $image->annotateImage($draw, $tux,  $height * 0.7, 0, $char);
            $ascii .= $char;
        }
    } else {
        $image = imagecreatetruecolor($width, $height);
        imagefill($image, 0, 0, imagecolorallocate($image, rand(155, 255), rand(155, 255), rand(155, 255)));
        for ($i = 0; $i < $shu; $i++) {
            if ($sizes < 0) {
                $ZITI = rand(1, 10);
            }
            if ($sizes == -2) {
                $char = $zhufu[$i] . '                                ....__-$%#$^^6634' . rand(1, 999999);
                $ZITI = 11;
            } else {
                $char = $mkqian[$i];
            }
            $COLOR = imagecolorallocate($image, rand(0, 80), rand(0, 80), rand(0, 80));
            $shus = $i * ($width / $height) * $xiaos;
            $tux = $shus + rand(5, 10);
            $tuy =  (int)($height / 2) + rand(5, $size);
            $coordinates = imagefttext($image, $size, 0, $tux, $height * 0.7, $COLOR, ELikj . '../Tpl/Font/' . $ZITI . '.ttf', $char, array('character_spacing' => 20));
            $ascii .= $char;
        }
    }
    if ($sizes != -2) {
        $ascii = '';
        foreach ($mkqian as $zicu) {
            if (is_numeric($zicu)) {
                $ascii .= '' . $zicu;
            }
        }
    }
    $_SESSION['code'] = isset($ELiConfig['sicode']) && $ELiConfig['sicode'] == 1 ? $ascii : strtolower($ascii);
    $_SESSION['codetime'] = time();
    ELihhSet(['code' => $_SESSION['code'], 'codetime' => $_SESSION['codetime']]);
    if (class_exists('Imagick')) {
        $image->setImageFormat('png');
        echo $image;
        return;
    } else {
        imagepng($image);
        imagedestroy($image);
    }
}

function pagec($xsuu, $page_size = 10, $nums, $sub_pages = 5, $page, $qianzui, $houzui = '')
{
    $xx = ceil($nums / $page_size);
    if ($page > $xx) return '';
    $subPages = new SubPages($xsuu, $page_size, $nums, $page, $sub_pages, $qianzui, $houzui, 2);
    return ($subPages->subPageCss2());
}
class SubPages
{
    private  $each_disNums;
    private  $nums;
    private  $current_page;
    private  $sub_pages;
    private  $pageNums;
    private  $page_array = array();
    private  $subPage_link;
    private  $subPage_type;
    private  $houzui;
    private  $arrays;
    function __construct($fenye, $each_disNums, $nums, $current_page, $sub_pages, $subPage_link, $houzui, $subPage_type)
    {
        $this->each_disNums = intval($each_disNums);
        $this->nums = intval($nums);
        $this->houzui = $houzui;
        if (!isset($fenye['dqdi'])) {
            $fenye = array(
                'dqdi' => 'The',
                'ye' => 'Page',
                'home' => 'home',
                'last' => 'Previous',
                'next' => 'next',
                'weiye' => 'end',
            );
        }
        $this->arrays = $fenye;
        if (!$current_page)  $this->current_page = 1;
        else  $this->current_page = intval($current_page);
        $this->sub_pages = intval($sub_pages);
        $this->pageNums = ceil($nums / $each_disNums);
        $this->subPage_link = $subPage_link;
        $this->subPageCss2();
    }
    function __destruct()
    {
        unset($each_disNums);
        unset($nums);
        unset($current_page);
        unset($sub_pages);
        unset($pageNums);
        unset($page_array);
        unset($subPage_link);
        unset($subPage_type);
        unset($subPage_type);
    }
    function initArray()
    {
        for ($i = 0; $i < $this->sub_pages; $i++) $this->page_array[$i] = $i;
        return $this->page_array;
    }
    function construct_num_Page()
    {
        if ($this->pageNums < $this->sub_pages) {
            $current_array = array();
            for ($i = 0; $i < $this->pageNums; $i++) $current_array[$i] = $i + 1;
        } else {
            $current_array = $this->initArray();
            if ($this->current_page <= 3) {
                for ($i = 0; $i < count($current_array); $i++) $current_array[$i] = $i + 1;
            } else if ($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1) {
                for ($i = 0; $i < count($current_array); $i++) $current_array[$i] = ($this->pageNums) - ($this->sub_pages) + 1 + $i;
            } else {
                for ($i = 0; $i < count($current_array); $i++) $current_array[$i] = $this->current_page - 2 + $i;
            }
        }
        return $current_array;
    }
    function subPageCss2()
    {

    
        $subPageCss2Str = "";

        if($this->sub_pages > 0 ){  
            $subPageCss2Str .= " <span>" . $this->arrays['dqdi'] . $this->current_page . "/" . $this->pageNums . $this->arrays['ye'] . "</span>";
        }

       
       
        if ($this->current_page > 1) {

            if (PAGEtrimE == 1)
                $dangqian = rtrimE($this->subPage_link, ELifenge);

            else $dangqian = $this->subPage_link . '1';

            $firstPageUrl = $dangqian . $this->houzui;
            $prewPageUrl = $this->subPage_link . ($this->current_page - 1) . $this->houzui;

            if($this->sub_pages > 0 ){  
                $subPageCss2Str .= "<a href=\"$firstPageUrl\">" . $this->arrays['home'] . "</a> ";
            }
            if ($this->current_page <= 2) $prewPageUrl = $firstPageUrl;
            $subPageCss2Str .= "<a href=\"$prewPageUrl\">" . $this->arrays['last'] . "</a> ";
        } else {

            if($this->sub_pages > 0 ){
                $subPageCss2Str .= " <span>" . $this->arrays['home'] . "</span>";
            }
            $subPageCss2Str .= " <span>" . $this->arrays['last'] . "</span>";
        }

        $a = $this->construct_num_Page();
        for ($i = 0; $i < count($a); $i++) {
            $s = $a[$i];
            if ($s == $this->current_page){
                $subPageCss2Str .= "<span class='hover'>" . $s . "</span>";
            }else {
                $url = $this->subPage_link . $s . $this->houzui;
                if ($s < 2 && PAGEtrimE == 1) $url = rtrimE($this->subPage_link, ELifenge) . $this->houzui;
                $subPageCss2Str .= " <a href=\"$url\">" . $s . "</a>";
            }
        }

        if ($this->current_page < $this->pageNums) {
            $lastPageUrl = $this->subPage_link . $this->pageNums . $this->houzui;
            $nextPageUrl = $this->subPage_link . ($this->current_page + 1) . $this->houzui;
            $subPageCss2Str .= " <a href=\"$nextPageUrl\">" . $this->arrays['next'] . "</a>";
            if($this->sub_pages > 0 ){
                $subPageCss2Str .= " <a href=\"$lastPageUrl\">" . $this->arrays['weiye'] . "</a> ";
            }

        } else {

            $subPageCss2Str .= " <span>" . $this->arrays['next'] . "</span>";
            if($this->sub_pages > 0 ){
                $subPageCss2Str .= " <span>" . $this->arrays['weiye'] . "</span>";
            }
        }

        if (PAGEtrimE == 1 && $this->houzui != "" && $this->houzui != ELifenge) {
            $subPageCss2Str = str_replace(ELifenge . $this->houzui, $this->houzui, $subPageCss2Str);
        }

        return $sss[] =  $subPageCss2Str;
    }
}
//upload picture
if (!function_exists('upload')) {
    function upload()
    {
        ob_clean();
        $ext_arr = array(
            'friend' => array('gif', 'jpg', 'jpeg', 'png', 'bmp', 'mp4'),
            'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'flash' => array('swf', 'flv'),
            'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb', 'mp4'),
            'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2', '7z'),
            'all' => array('gif', 'bmp', 'jpg', 'jpeg', 'png', 'swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2', '7z', 'mp4')
        );
        if (isset($_GET['uplx']) && isset($ext_arr[$_GET['uplx']])) $LX = $_GET['uplx'];
        else  $LX = 'all';
        global $ELiConfig, $LANG;
        $max_size = isset($_GET['maxsize']) && $ELiConfig['maxsize'] >= $_GET['maxsize'] &&  $_GET['maxsize'] > 10 ? $_GET['maxsize'] : $ELiConfig['maxsize'];
        if (!isset($_FILES[$LX])) {
            return  array('code' => '0', 'msg' => $LANG['update']['meiwenjian']);
        }
        if (!empty($_FILES[$LX]['error'])) {

            switch ($_FILES[$LX]['error']) {
                case '1':
                    $error = $LANG['update']['error1'];
                    break;
                case '2':
                    $error = $LANG['update']['error2'];
                    break;
                case '3':
                    $error = $LANG['update']['error3'];
                    break;
                case '4':
                    $error = $LANG['update']['error4'];
                    break;
                case '6':
                    $error = $LANG['update']['error6'];
                    break;
                case '7':
                    $error = $LANG['update']['error7'];
                    break;
                case '8':
                    $error = $LANG['update']['error8'];
                    break;
                case '999':
                default:
                    $error =  $LANG['update']['error999'];
            }
            return  array('code' => '0', 'msg' => $error);
        }
        $qianzui = 'attachment/' . $LX . '/' . date('Ym') . '/';
        $files =  $ELiConfig['dir'] . $qianzui;
        $WJIAN =  ELikj . '../' . ltrimE($qianzui, '/');
        ELiCreate($WJIAN);
        if (empty($_FILES) === false) {
            $file_name = $_FILES[$LX]['name'];
            $tmp_name  = $_FILES[$LX]['tmp_name'];
            $file_size = $_FILES[$LX]['size'];
            if (!$file_name) return  array('code' => '0', 'msg' => $LANG['update']['meiwenjian']);
            if (@is_dir($WJIAN) === false) return array('code' => '0', 'msg' => $LANG['update']['meimulu']);
            if (@is_writable($WJIAN) === false) return array('code' => '0', 'msg' => $LANG['update']['meixieru']);
            if (@is_uploaded_file($tmp_name) === false) return array('code' => '0', 'msg' => $LANG['update']['chuanshibai']);
            if ($file_size > $max_size) return array('code' => '0', 'msg' => $LANG['update']['maxsizeda']);
            $temp_arr = explode(".", $file_name);
            $file_ext = array_pop($temp_arr);
            $file_ext = trimE($file_ext);
            $file_ext = strtolower($file_ext);
            $expa = array_flip($ext_arr[$LX]);
            if (!isset($expa[$file_ext])) {
                return  array('code' => '0', 'msg' => $LANG['update']['shangchuanyun'] . implode(',', $ext_arr[$LX]));
            }
            $Nfile =  date('d') . '_' . ELimm(time() . rand(1, 9999999)) . '.' . $file_ext;
            $returnfile = $files . $Nfile;
            $tmpneirong = file_get_contents($tmp_name);
            if (strpos(strtolower($tmpneirong), '<?php') !== false) {
                return  array('code' => 0, 'msg' => $LANG['update']['meiwenjian']);
            }

            if (strpos(substr($tmpneirong, 0, 50), ';base64,') !== false) {
                $nnn = explode(';base64,', $tmpneirong);
                file_put_contents($tmp_name, base64_decode($nnn['1']));
            }

            $CDN = '';
            if (move_uploaded_file($tmp_name, $WJIAN . $Nfile) === false) return array('code' => '0', 'msg' => $LANG['update']['chuanshibai']);
            @chmod($WJIAN . $Nfile, 0644);
            if (is_file($tmp_name)) {
                @unlink($tmp_name);
            }
            if (!defined("Residentmemory")) {
                if (strpos($_SERVER["HTTP_USER_AGENT"]??"", "MSIE")) header('Content-type:text/html; charset=UTF-8');
                else  header('Content-type:application/json ;charset=UTF-8');
            }
            return  array('code' => 1, 'content' =>  array('pic' => $returnfile, 'size' => $file_size, 'houzui' => $file_ext));
        } else  return  array('code' => 0, 'msg' => $LANG['update']['meiwenjian']);
    }
}
//nternal call
function callELi($Plus = "", $ClassFunc = "", $CANSHU = array(), $features = array(), $fanhui = true)
{
    $className = 'ELikj_' . $Plus;
    if (!class_exists($className, false)) {
        ELiLoad($Plus);
    }
    if (!class_exists($className, false)) {
        return "Plugin does not exist $Plus";
    }
    $ClassFunc = strtolower($ClassFunc);
    $class = new $className();
    $get_class = get_class_methods($class);
    $cls_methods = array_flip($get_class);
    foreach ($get_class as $v) {
        $cls_methods[strtolower($v)] = $v;
    }
    if (!isset($cls_methods[$ClassFunc])) {
        //Default processing
        $ClassFunc_ = $ClassFunc;
        $ClassFunc = 'Construct';
        if (!isset($cls_methods[$ClassFunc])) {
            return "Plugin $Plus function $ClassFunc_ and $ClassFunc not exist";
        }
        $CANSHU['-1'] = $ClassFunc_;
    }
    $fan = $class->$ClassFunc($CANSHU, $features);
    if ($fanhui === true) {
        return $class;
    }
    if ($fanhui === false) {
        return $fan;
    }
    ob_clean();
    $GLOBALS['isend'] = false;
    return ;
}
//Execute plugin
function ELibug($shuju)
{
    if (is_array($shuju)) {
        $shuju = json_encode($shuju);
    }
    file_put_contents(ELikj . 'bug.txt', date('Y-m-d H:i:s') . ' ' . $shuju . "\n", FILE_APPEND);
}
function ELicall($Plus = "", $ClassFunc = "", $CANSHU = array(), $features = array(), $fanhui = true)
{
    $className = 'ELikj_' . $Plus;
    if (!class_exists($className, false)) {
        ELiLoad($Plus);
    }
    if (!class_exists($className, false)) {
        return ELiError("Plugin does not exist $Plus");
    }
    $class = new $className();
    $cls_methods = array_flip(get_class_methods($class));

    if (!isset($cls_methods[$ClassFunc])) {
        //Default processing
        $ClassFunc_ = $ClassFunc;
        $ClassFunc = 'Construct';
        if (!isset($cls_methods[$ClassFunc])) {
            return  ELiError("Plugin $Plus function $ClassFunc_ and $ClassFunc not exist");
        }
        $CANSHU['-1'] = $ClassFunc_;
    }
    $class->$ClassFunc($CANSHU, $features);
    if ($fanhui) {
        return $class;
    }
    return false;
}
//Read plugin
function ELiLoad($plush)
{
    if (is_array($plush)) {
        foreach ($plush as $shuju) {
            $className = 'ELikj_' . $shuju;
            if (!class_exists($className, false)) {
                $file = ELikj . 'Controller/' . $shuju . '.Class.php';
                if (file_exists($file)) {
                    require_once $file;
                } else {
                    ELiError("Plugin File not exist $shuju ");
                    return false;
                }
            }
        }
    } else {
        $className = 'ELikj_' . $plush;
        if (!class_exists($className, false)) {
            $file = ELikj . 'Controller/' . $plush . '.Class.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                ELiError("Plugin File not exist $plush");
                return false;
            }
        }
    }
    return true;
}
//Read Plusconfig
function Plusconfig($name = "")
{
    global $features;
    if ($name == "") {
        return $features['configure'];
    }
    if ($features['configure']) {
        if (isset($features['configure'][$name])) {
            if (count($features['configure'][$name]) == 1) {
                return  reset($features['configure'][$name]);
            } else {
                return $features['configure'][$name];
            }
        }
    }
    return false;
}

function config($name, $qx = 0, $db = null)
{
    $name =  trimE($name);
    global $ELiMem;
    $hash = 'config/' . md5($name);
    if ($qx == 2) {
        $ELiMem->d($hash);
        return false;
    }
    $data = $ELiMem->g($hash);
    if ($data == -1 && $qx === 0) {
        return false;
    }
    if ($data && $qx === 0) {
        return $data;
    }
    if (!$db) {
        $db = db('config');
    } else {
        $db->setbiao('config');
    }
    $dbc = $db->where(array('type' => $name))->find();
    if ($dbc) {
        if ($dbc['data'] != '') {
            $DATA = explode(',', $dbc['data']);
            if (count($DATA) == 1) {
                $DATA = reset($DATA);
            }
            $ELiMem->s($hash, $DATA);
            return $DATA;
        }
    }
    $ELiMem->s($hash, -1, 10);
    return false;
}
//Plugin parameters
function ELiplus($name, $qx = 0, $db = null)
{
    $name =  trimE($name);
    global $ELiMem;

    $hash = 'ELiplus/' . md5($name);
    if ($qx == 2) {
        $ELiMem->d($hash);
        return false;
    }
    $data = $ELiMem->g($hash);
    if ($data == -1 && $qx === 0) {
        return false;
    }
    if ($data && $qx === 0) {
        return $data;
    }
    if (!$db) {
        $db = db('features');
    } else {
        $db->setbiao('features');
    }
    $dbc = $db->where(array('pluginid' => $name))->find();
    if ($dbc) {
        if ($dbc['configure'] != "") {
            $dbc['configure']  = json_decode($dbc['configure'], true);
        } else {
            $dbc['configure'] = array();
        }
        if ($dbc['menuconfig'] != "") {
            $dbc['menuconfig']  = json_decode($dbc['menuconfig'], true);
        } else {
            $dbc['menuconfig'] = array();
        }
        $ELiMem->s($hash, $dbc);
        return $dbc;
    }
    $ELiMem->s($hash, -1, 10);
    return false;
}
//url link
function ELiLink($plush,$PAGE = 1)
{
    global $ELiConfig;
    $urlpath = "";
    if ($ELiConfig['urlpath'] == 1 || $ELiConfig['urlpath'] == -1) {
        $urlpath = "index.php/";
    } elseif ($ELiConfig['urlpath'] == 2 || $ELiConfig['urlpath'] == -2) {
        $urlpath = "index.php?";
    } elseif ($ELiConfig['urlpath'] == 3 || $ELiConfig['urlpath'] == -3) {
        $urlpath = "?";
    } elseif ($ELiConfig['urlpath'] == 4 || $ELiConfig['urlpath'] == -4) {
        $urlpath = "?/";
    } else if ($ELiConfig['urlpath'] == 5 || $ELiConfig['urlpath'] == -5) {
        $urlpath = "";
    }
    $houzui = $ELiConfig['houzui'];
    if ($ELiConfig['urlpath'] <= 0) {
        $houzui  = "/";
    }
    if (!$plush) {
        return WZHOST . $urlpath;
    }
    if ($ELiConfig['iscms'] == '1' && $plush['0'] == $ELiConfig['object']) {
        unset($plush['0']);
    }
    if($PAGE >  1){
        $plush[]="";
        $houzui = "";
    }
    return WZHOST . $urlpath . implode($ELiConfig['fenge'], $plush) . $houzui;
}
//Safety statement
function ELis($name = 'ELiSafety')
{
    $GLOBALS['ELiys'][$name] = $name;
}
//Security Indication Verification
function ELiy($name = 'ELiSafety')
{
    if(!isset($GLOBALS['ELiys'][$name] )){
        return true;
    }else{
        return false;
    }
}
//Read user id
function uid($uid, $qx = 0, $db = null)
{
    $uid = (int) trimE($uid);
    if ($uid < 1) {
        return false;
    }
    global $ELiMem;
    $hash = 'uid/' . $uid;
    if ($qx == 2) {
        $ELiMem->d($hash);
        return false;
    }
    $data = $ELiMem->g($hash);
    if ($data == -1 && $qx === 0) {
        return false;
    }
    if ($data && $qx === 0) {
        return $data;
    }
    if (!$db) {
        $db = db('user');
    } else {
        $db->setbiao('user');
    }
    $dbc = $db->where(array('id' => $uid))->find();
    if ($dbc) {
        $ELiMem->s($hash, $dbc);
        return $dbc;
    }
    $ELiMem->s($hash, -1, 10);
    return false;
}
//Money management
function  jiaqian($uid = 0, $type = 0, $money = 0, $integral = 0, $currency = 0, $data = "", $ip = "", $plugin = "", $sql = '')
{
    $D = db('user');
    $uid = (int)$uid;
    if ($money  != 0) {
        $where = array('id' => $uid);
        if ($money < 0) {
            $where['money >='] = -$money;
        }
        $sql .= $D->setshiwu(1)->setbiao('user')->where($where)->update(array('money +' => $money));
        $sql .= $D->setshiwu(1)->setbiao('moneylog')->insert(array(
            'uid' => $uid,
            'type' => $type,
            'num' => $money,
            'pluginid' => $plugin == "" ? $GLOBALS['plugin'] : $plugin,
            'data' => $data,
            'ip' => $ip == '' ? ip() : $ip,
            'atime' => time()
        ));
    }
    if ($integral  != 0) {
        $where = array('id' => $uid);
        if ($integral < 0) {
            $where['integral >='] = -$integral;
        }
        $sql .= $D->setshiwu(1)->setbiao('user')->where($where)->update(array('integral +' => $integral));
        $sql .= $D->setshiwu(1)->setbiao('integrallog')->insert(array(
            'uid' => $uid,
            'type' => $type,
            'num' => $integral,
            'pluginid' => $plugin == "" ? $GLOBALS['plugin'] : $plugin,
            'data' => $data,
            'ip' => $ip == '' ? ip() : $ip,
            'atime' => time()
        ));
    }
    if ($currency  != 0) {
        $where = array('id' => $uid);
        if ($currency < 0) {
            $where['currency >='] = -$currency;
        }
        $sql .= $D->setshiwu(1)->setbiao('user')->where($where)->update(array('currency +' => $currency));
        $sql .= $D->setshiwu(1)->setbiao('currencylog')->insert(array(
            'uid' => $uid,
            'type' => $type,
            'num' => $currency,
            'pluginid' => $plugin == "" ? $GLOBALS['plugin'] : $plugin,
            'data' => $data,
            'ip' => $ip == '' ? ip() : $ip,
            'atime' => time()
        ));
    }
    if ($sql == "") {
        return false;
    }
    $fan = $D->qurey($sql, 'shiwu');
    if ($fan) {
        return uid($uid, 1, $D);
    } else return false;
}
//Browser Information Judgement Platform
function ELishouji($anget)
{
    $anget = platform($anget);
    if (strpos(strtolower($anget), "android") !== false) {
        return 'Android';
    } else if (strpos($anget, "iOS") !== false) {
        return "iOS ";
    } else if (strpos($anget, "ISAPP") !== false) {
        return "APP";
    }
    return false;
}
function platform($anget)
{
    $anget = trimE($anget);
    if ($anget == "") {
        return "未知";
    }
    $xitong = "";
    $hj = " web";
    $shuju = [];
    $xotp = [];
    $system = [];
    $shuju =  explode(')', $anget);
    if ($shuju) {
        $xotp = explode('(', $shuju['0']);
    }
    if ($xotp && isset($xotp['1'])) {
        $system = explode(';', $xotp['1']);
    }
    if (strpos($anget, "ISAPP") !== false) {
        $hj = "APP";
    }
    if (strpos(strtolower($anget), "android") !== false) {
        $xitong = "Android ";
    } else if (strpos($anget, "iOS") !== false) {
        $xitong = "iOS ";
    } else {
        if ($system && count($system) > 1) {
            $xitong = $system['1'];
        } else {
            $xitong = "其他 ";
        }
    }
    $sj = "";
    if ($system && isset($system['2'])) {
        $sj = " " . $system['2'];
    }
    return  $xitong . $hj . $sj;
}

//uuid detection
function uuidc($uuid, $fan = true)
{
    $uuid = trimE(str_replace(array("\r\n", "\r", "\n"), array('', '', ''), trimE($uuid)));
    $cahifen = explode('-', $uuid);
    if (count($cahifen) != 5) {
        if ($fan) {
            return uuid();
        }
        return false;
    }
    $zu = [8, 4, 4, 4, 12];
    foreach ($cahifen as $k => $cdu) {
        $z = strlen($cdu);
        if ($zu[$k] != $z) {
            if ($fan) {
                return uuid();
            }
            return false;
        }
    }
    return $uuid;
}
//debugging under the shell
function ELiCmd($wezi = "")
{
    ob_flush();
    echo date("Y-m-d H:i:s : ") . $wezi . "\n";
    //usleep(rand(50000,1000000));
}

//Read template
function ELitpl($plugin, $file, $THIS)
{
    $file_ = ELikj . '../Tpl/' . str_replace('..', '', $plugin . '/' . $file) . '.php';
    if (file_exists($file_)) {
        global $ELiConfig, $ELiMem, $CANSHU, $features, $SESSIONID, $LANG;
        return  include $file_;
    } else {
        return echoapptoken([], -1, $plugin .' '.$file. ' file does not exist');
    }
}
//Verification post
function ELichar($canshu = array(), $data = [])
{
    if (!$data) {
        $data = $_POST;
    }
    if ($canshu) {
        foreach ($canshu as $ong) {
            list($name, $type, $zhi, $wenzi, $end) = explode('#', $ong);
            if (!isset($data[$name])) return array('code' => '0', 'biao' => $name, 'msg' => $wenzi . $zhi . $end);
            $data[$name] = trimE($data[$name]);
            if ($type == 'len') {
                if ($data[$name] == '') return array('code' => '0', 'biao' => $name, 'msg' => $wenzi . $zhi . $end);
                list($XI, $DA) = explode('-', $zhi . '-');
                $zlen = strlen($data[$name]);
                if ($DA != '') {
                    if ($zlen < $XI || $zlen > $DA) {
                        return array('code' => '0', 'biao' => $name, 'msg' => $wenzi . $XI . '-' . $DA . $end);
                    }
                } else if ($zlen != $XI) {
                    return array('code' => '0', 'biao' => $name, 'msg' => $wenzi . $XI . $end);
                }
            } else if ($type == '=') {
                if ($data[$name] != $zhi) {
                    return array('code' => '0', 'biao' => $name, 'msg' => $wenzi);
                }
            }
        }
    }
    return  array('code' => '1', 'biao' => 'all', 'msg' => '');
}
//json communication
function apptoken($data = array(),  $code = '0', $msg = '', $apptoken = '', $kuozan = [])
{    //ob_clean();
    //header("Content-Type:application/json; charset=utf-8"); 
    $zhuju = array(
        'code'  => $code,
        'data' => $data,
        'msg' => $msg,
        'token' => $apptoken
    );
    if ($kuozan) {
        foreach ($kuozan  as $k => $v) {
            $zhuju[$k] = $v;
        }
    }
    return json_encode($zhuju, JSON_UNESCAPED_UNICODE);
}

if (!function_exists("tiaozhuan")) {
    function tiaozhuan($eangzhan = "")
    {
        if (isset($GLOBALS['isend']) && $GLOBALS['isend']) {
            return true;
        }
        if (!defined("Residentmemory")) {

            header('HTTP/1.1 302 Moved Permanently');
            header("Location: " . $eangzhan);
            exit();
        }
        $GLOBALS['isend'] = true;
        return true;
    }
}
//echo json communication
if (!function_exists("echoapptoken")) {
    function echoapptoken($data = array(),  $code = '0', $msg = '', $apptoken = '', $kuozan = [])
    {
        if (isset($GLOBALS['isend']) && $GLOBALS['isend']) {
            return true;
        }
        if (!defined("Residentmemory")) {
            header("Content-Type:application/json;charset=utf-8");
        }
        if (isset($GLOBALS['Plugincall']) && $GLOBALS['Plugincall'] == "YES") {
            $GLOBALS['Plugincall'] = "NO";
            return apptoken($data,  $code, $msg, $apptoken, $kuozan);
        }
        echo apptoken($data,  $code, $msg, $apptoken, $kuozan);
        $GLOBALS['isend'] = true;
        return true;
    }
}
//start funciton Extension
function ELilog($baio = "adminlog", $id = 0, $type = 0, $data = "", $mode = "", $plugin = "", $ip = "")
{
    if ($baio == "") {
        $baio = "adminlog";
    }
    $db = db($baio);
    return $db->insert([
        'uid' => (int)$id,
        'type' => (int)$type,
        'data' => is_string($data) ? $data : json_encode($data),
        'controller' => $plugin == "" ? $GLOBALS['plugin'] : $plugin,
        'mode' => $mode,
        'atime' => time(),
        'ip' => $ip == "" ? ip() : $ip
    ]);
}
function adminid($uid, $qx = 0, $db = null)
{
    $uid = (int) trimE($uid);
    if ($uid < 1) {
        return false;
    }
    global $ELiMem;
    $hash = 'adminid/' . $uid;
    if ($qx == 2) {
        $ELiMem->d($hash);
        return false;
    }
    $data = $ELiMem->g($hash);
    if ($data == -1 && $qx === 0) {
        return false;
    }
    if ($data && $qx === 0) {
        return $data;
    }
    if (!$db) {
        $db = db('admin');
    } else {
        $db->setbiao('admin');
    }
    $dbc = $db->where(array('id' => $uid))->find();
    if ($dbc) {
        $ELiMem->s($hash, $dbc);
        return $dbc;
    }
    $ELiMem->s($hash, -1, 10);
    return false;
}
function pichttp($pic)
{
    if ($pic == "") {
        return CDNHOST . 'Tpl/noimg.png';
    } else  if (strstr($pic, "://") !== false) {
        return $pic;
    } else {
        return CDNHOST . ltrimE($pic, '/');
    }
}

//sha256WithRSA 签名
function SHA256_sign($content, $privateKey, $iimm = "SHA256")
{
    $privateKey = "-----BEGIN RSA PRIVATE KEY-----\n" .
        wordwrap($privateKey, 64, "\n", true) .
        "\n-----END RSA PRIVATE KEY-----";
    $key = openssl_get_privatekey($privateKey);
    openssl_sign($content, $signature, $key, $iimm);
    openssl_free_key($key);
    $sign = base64_encode($signature);
    return $sign;
}

//验证 sha256WithRSA 签名
function SHA256_verify($content, $sign, $publicKey, $iimm = "SHA256")
{
    $publicKey = "-----BEGIN PUBLIC KEY-----\n" .
        wordwrap($publicKey, 64, "\n", true) .
        "\n-----END PUBLIC KEY-----";
    $key = openssl_get_publickey($publicKey);
    $ok = openssl_verify($content, base64_decode($sign), $key, $iimm);
    openssl_free_key($key);
    return $ok;
}
//end funciton Extension
#######################end funciton Extension####################################
//Load configuration
$ELiConfig = array(
    'debugging' => '1', // 调试 1 打开 0
    'timezone'  => 'PRC', //时区
    'doku' => '0', //多库读取
    'dbselect' => 'write', //选择默认读取数据库
    'operatingmode' => '1', //0 开发模式 1 正式模式
    'sessiontime' => '36000', //session缓存时间
    'sessionpath' => 'mysqseeion/', //session存放z自定义位置
    'sessionSafety' => true, //关闭过期安全true  false 刷新就过期; 
    'vcode' => 'e,L,i,k,j', //默认图形验证阿么
    'sicode' => 1, //1验证大小写 0 小写
    'fenge' => '/', //分割
    'pagetrimE' => 1, //开启替换
    'maxsize' => '100000000', //上传尺寸
    'dir' => '###ELiConfig_dir###', //二级目录
    'houzui' => '', //后缀
    'host' => '###ELiConfig_host###', //开启https
    'cdnhost' => '###ELiConfig_host######ELiConfig_dir###', //图片资源cdn 资源
    'lang' => 'cn', //语言包
    'Plus' => '@', //强行读取插件标示
    'urlpath' => '0', // url 模式
    'Composer' => 0, //Composer 启用
    'security'=> '',//管理后台安全验证 ?security=
    'whitelist' => 'admin', //白名单不用判断插件开关|
    'iscms' => 0, //只使用cms
    'object' => 'admin', //默认控制器
    'behavior' => 'index', //默认行为
    'superior' => '2',
);
//Load the database qqqqaaaa A123Ff3589!~

$ELiDataBase = array(
    "write" => array(
        'numbering' => '主数据库',
        'hostname' => '###ELiDataBase_hostname###',
        'database' => '###ELiDataBase_database###',
        'username' => '###ELiDataBase_username###',
        'password' => '###ELiDataBase_password###',
        'hostport' => '###ELiDataBase_hostport###',
        'charset'  => 'utf8mb4',
        'prefix'   => '###ELiDataBase_prefix###'
    )
);

//Frame path
if (!defined('ELikj')) {
    define('ELikj', dirname(__FILE__) . '/ELikj/');
}
if (!defined('ELiTempPath')) {
    define('ELiTempPath', ELikj . 'ELiTemp/');
}
//debugging
if (isset($ELiConfig['debugging']) && $ELiConfig['debugging'] == '0') {
    error_reporting(!E_ALL);
}
//Set time zone
if (isset($ELiConfig['timezone']) && $ELiConfig['timezone'] != '') {
    @date_default_timezone_set($ELiConfig['timezone']);
}
//Setting the cache directory
define('sessionpath', $ELiConfig['sessionpath']);
//PAGEtrimE  ELifenge
define('PAGEtrimE', $ELiConfig['pagetrimE']);
define('ELifenge', $ELiConfig['fenge']);
define('DBprefix', $ELiDataBase[$ELiConfig['dbselect']]['prefix']);
define('WZHOST', $ELiConfig['host'] . $ELiConfig['dir']);
define('CDNHOST', $ELiConfig['cdnhost']);
//Language pack
//$LangFile =  ELikj.'../Tpl/Lang/'. ELiSecurity($ELiConfig['lang']).'.php';
$LANG = array(

    'update' => array(
        'error1' => '超过php.ini允许的大小。',
        'error2' => '超过表单允许的大小。',
        'error3' => '图片只有部分被上传。',
        'error4' => '请选择图片。',
        'error6' => '找不到临时目录。',
        'error7' => '写文件到硬盘出错。',
        'error8' => 'File upload stopped by extension。',
        'error999' => '未知错误。',
        'meiwenjian' => '请选择文件。',
        'meimulu' => '上传目录不存在。',
        'meixieru' => '上传目录没有写权限。',
        'chuanshibai' => '上传失败。',
        'maxsizeda' => '上传超过限制',
        'shangchuanyun' => "上传文件扩展名是不允许的扩展名。只允许"
    ),
    'PAGE'  => array(
        'dqdi' => '当前',
        'ye' => '页',
        'home' => '首页',
        'last' => '上一页',
        'next' => '下一页',
        'weiye' => '尾页',
    )

);
//if(file_exists($LangFile)){
// $LANG = include  $LangFile;
//}
//Composer Load switch
if ($ELiConfig['Composer'] && $ELiConfig['Composer'] == 1) {
    $Composer = include ELikj . "vendor/autoload.php";
}
$ELiMem = $ELiMemsession =  new Textcache;
//Get route
######################################################################
if (!defined("Residentmemory")) {

    if ( strstr($ELiConfig['host'],"ELiConfig_host" ) === false  && isset($_SERVER['HTTP_HOST']) && strstr($ELiConfig['host'], '://' . $_SERVER['HTTP_HOST']) === false) {
        header('HTTP/1.1 302 Moved Permanently');
        header("Location: " . $ELiConfig['host']);
        return;
    }
    $GLOBALS['header'] = [];
    foreach ($_SERVER as $k => $v) {
        $k =  strtolower($k);
        if (strstr($k, 'http_') !== false) {
            $GLOBALS['header'][str_replace('http_', '', $k)] = $v;
        }
    }
    $POSTBODY = $GLOBALS['HTTP_RAW_POST_DATA'] ?? (file_get_contents('php://input')??"");
    //Header encoding
    header("Access-Control-Allow-Origin: * ");
    header("Access-Control-Allow-Methods: * ");
    ELiUri();
    $ELiHttp = ltrimE(rawurldecode(trimE($_SERVER["REQUEST_URI"])), '/');

    //install
    if ( strstr($ELiConfig['host'],"ELiConfig_host" ) !== false ){
        ELicall("admin", "INSTALL", [], [], false);
        return ;
    }

    //POST Security filtering
    if ($_POST) {
        if (strstr(strtolower(json_encode($_POST)), DBprefix) !== false) {
            return ELiError("ELikj: Security filtering");
        }
    }
    //GET Security filtering
    if (php_sapi_name() != "cli") {
        $Filter = array('<', '>', '..', '(', ')', '"', "'", "*", '[', ']', DBprefix, '{', '}', '$');
        foreach ($Filter  as $Filter_) {
            if (strpos(strtolower($ELiHttp), $Filter_) !== false) {
                return ELiError("ELikj: Security filtering " . $Filter_);
            }
        }

    } else {
        ELis('Bat_Cli');
    }
    $SESSIONIDMK = false;
    if (isset($_GET['apptoken']) && strlen($_GET['apptoken']) > 63) {
        $SESSIONID = $_GET['apptoken'];
    } else if (isset($_POST['apptoken']) && strlen($_POST['apptoken']) > 63) {
        $SESSIONID = $_POST['apptoken'];
    } else if (isset($_COOKIE['apptoken']) && strlen($_COOKIE['apptoken']) > 63) {
        $SESSIONID = $_COOKIE['apptoken'];
        $SESSIONIDMK = true;
    } else {
        $SESSIONIDMK = true;
        $SESSIONID = md5(rand(1, 9999999) . microtime()) . md5(rand(1, 9999999) . sha1(microtime()));
    }
    if ($SESSIONIDMK && $ELiConfig['sessionSafety']) {
        setcookie('apptoken', $SESSIONID, time() + $ELiConfig['sessiontime'], '/', null, null, TRUE);
    }


    if (strstr($ELiHttp, $ELiConfig['houzui'] . '&') !== false) {
        $URI = str_replace($ELiConfig['houzui'] . '&', $ELiConfig['houzui'] . '?', $ELiHttp);
    } else {
        $URI = $ELiHttp;
    }
    $URI  = ltrimE(str_replace(array('//', trimE($_SERVER['SCRIPT_NAME'], '/')), array('/', ''), $URI), $ELiConfig['dir']);
    $TURI = explode('?', ltrimE($URI, '?'));
    $URI  = trimE($TURI['0'], '/');
    $URI = str_replace( '..','', $URI);
    $URI = rtrimE($URI,$ELiConfig['houzui']);
    if ($URI == '' && $ELiConfig['iscms'] != 1) {
        $URI = $ELiConfig['object'];
    }
    $URI = str_replace('&', '?', $URI);
    $HTTP = explode($ELiConfig['fenge'], $URI);
    $YHTTP = $HTTP;
    if ($HTTP['0'] == $ELiConfig['Plus']) {
        unset($HTTP['0']);
        unset($YHTTP['0']);
        $Plus = isset($HTTP['1']) ? ELiSecurity($HTTP['1']) : ELiSecurity($ELiConfig['object']);
        $ClassFunc = isset($HTTP['2']) ? $HTTP['2'] : $ELiConfig['behavior'];
        if (isset($HTTP['1'])) {
            unset($HTTP['1']);
        }
        if (isset($HTTP['2'])) {
            unset($HTTP['2']);
        }
    }else if ($ELiConfig['iscms'] == 1) {

        if (!isset($HTTP['0']) || $HTTP['0'] == "") {
            $Plus = ELiSecurity($ELiConfig['object']);
            $ClassFunc = $ELiConfig['behavior'];
        } else {
            $Plus = ELiSecurity($ELiConfig['object']);
            $ClassFunc = $HTTP['0'];
            unset($HTTP['0']);
        }
    } else {

        if (!isset($HTTP['0'])) {
            $HTTP['0'] = ELiSecurity($ELiConfig['object']);
        } else  if (strstr($HTTP['0'], '?') !== false) {
            $fan = explode('?', $HTTP['0']);
            $HTTP['0'] = $fan['0'];
            $HTTP['1'] = $ELiConfig['behavior'];
        }
        if (!isset($HTTP['1'])) {
            $HTTP['1'] = $ELiConfig['behavior'];
        } else  if (strstr($HTTP['1'], '?') !== false) {
            $fan = explode('?', $HTTP['1']);
            $HTTP['1'] = $fan['0'];
        }
        $Plus = ELiSecurity($HTTP['0']);
        $ClassFunc = $HTTP['1'];
        unset($HTTP['0']);
        unset($HTTP['1']);
    }
    $CANSHU = array();
    foreach ($HTTP as $qita) {
        $CANSHU[] = $qita;
    }
    $Plus = strtolower($Plus);
    $ClassFunc = strtolower($ClassFunc);
    ELiLoad($Plus);
    $GLOBALS['plugin'] = $Plus;
    $GLOBALS['pluginurl'] = $ELiConfig['dir'] . "Tpl/" . $Plus . '/';
    $features = [];
    try {
        $features = ELiplus($Plus);
    } catch (Exception $e) {
        $features = [];
    }
    if (strstr($ELiConfig['whitelist'], $Plus) === false) {
        if ($ELiConfig['object']  != $Plus && (!$features || $features['off'] == "0")) {
            ELiError("Plugin closed");
        }
    }
    ELicall($Plus, $ClassFunc, $CANSHU, $features, false);
}