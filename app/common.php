<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-12 20:49:12
 * @LastEditTime : 2022-11-16 09:43:19
 * @FilePath     : \personal\app\common.php
 */
// 应用公共文件

use think\facade\Session;

/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showmsg($code, $message = '', $data = array())
{
    header('Content-type: application/json');
    $result = array(
        'code' => $code,
        'msg' => $message,
        'data' => $data
    );
    echo json_encode($result);
    exit;
    // return json_encode($result);
}

/**
 * 获取一串字符串
 * @return str
 */
function key_code()
{
    $str = md5(uniqid(md5(microtime(true)), true));
    $str = sha1($str); //加密
    return $str;
}

/**
 * 客户端IP地址获取
 * @return 1.1.1.1
 */
function getip()
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknow")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknow")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknow")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER["REMOTE_ADDR"]) && $_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknow")) {
        $ip = $_SERVER["REMOTE_ADDR"];
    } else {
        $ip = "unknow";
    }
    return $ip;
}


/**
 * 发送一个post请求到远程主机上，当无需参数时刻使用[]进行占位符
 */
function send_post($url, $param)
{
    if (!is_array($param)) {
        return '参数必须为array';
    }
    $httph = curl_init($url);
    curl_setopt($httph, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($httph, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($httph, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($httph, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");
    curl_setopt($httph, CURLOPT_POST, 1); //设置为POST方式 
    curl_setopt($httph, CURLOPT_POSTFIELDS, $param);
    curl_setopt($httph, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($httph, CURLOPT_HEADER, 1);
    $rst = curl_exec($httph);
    curl_close($httph);
    return $rst;
}

function auth($data)
{
    Session::get('auth_token',$data);
}