<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 13:47:54
 * @LastEditTime : 2022-11-16 11:05:32
 * @FilePath     : \personal\app\admin\controller\Login.php
 */
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 13:47:54
 * @LastEditTime : 2022-11-13 17:58:16
 * @FilePath     : \personal\app\admin\controller\Login.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Admin;
use app\admin\model\AdminLog;
use think\facade\Session;
use think\facade\View;
use think\Request;

class Login
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return View::fetch();
    }

    /**
     * 登录验证
     * 
     * @return \think\Response
     */
    public function login(Request $request)
    {
        // $input = input();
        // $time = time() - 300;
        // $a = AdminLog::whereBetweenTime('create_time', date("Y-m-d H:i:s", $time), date("Y-m-d H:i:s", time()))->where('ip', $request->ip())->count();
        // if ($a > 6) return showmsg(201, "登录过于频繁请十分钟后再尝试");
        // $input = Admin::where(['username' => $input['username'], 'password' => $input['password']])->find();
        // if (empty($input)) {
        //     $admin = new AdminLog();
        //     $admin->ip = $request->ip();
        //     $admin->save();
        //     return showmsg(201, "用户名或密码有误");
        // }
        // $log_data = [
        //     'ip' => getip(),
        //     'time' => time(),
        //     'type' => '登录'
        // ];
        // session::clear();
        // session::set('token', $log_data);
        // return showmsg(200, "登录成功");
    }

    public function logins(Request $request)
    {
        $input = input();
        $time = time() - 300;
        $a = AdminLog::whereBetweenTime('create_time', date("Y-m-d H:i:s", $time), date("Y-m-d H:i:s", time()))->where('ip', $request->ip())->count();
        if ($a > 6) return showmsg(201, "登录过于频繁请十分钟后再尝试");
        $input = Admin::where(['username' => $input['username'], 'password' => $input['password']])->find();
        if (empty($input)) {
            $admin = new AdminLog();
            $admin->ip = $request->ip();
            $admin->save();
            return showmsg(201, "用户名或密码有误");
        }
        $log_data = [
            'ip' => getip(),
            'time' => time(),
            'type' => '登录'
        ];
        Session::clear();
        Session::set('auth', $log_data);
        return json(Session::all());
        return showmsg(200, "登录成功",json(Session::all()));
    }

    public function test()
    {
        return dump(Session::all());
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function logout()
    {
        Session::clear();
        return redirect('../../admin/login');
    }
}
