<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 20:43:38
 * @LastEditTime : 2022-11-16 09:58:35
 * @FilePath     : \personal\app\admin\middleware\Auth.php
 */
declare (strict_types = 1);

namespace app\admin\middleware;
use think\facade\Session;
use think\facade\View;

class Auth
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        $action = $request->pathInfo();
        if ($action !== 'login') {
            if (Session::get('auth') == null) {
                // 判断是否为Ajax，，
                if (!$request->isAjax()) {
                    redirect('/admin/login')->send();
                    exit;
                }
            }
        }
        return $next($request);
    }
}
