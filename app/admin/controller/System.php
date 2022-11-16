<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 16:53:20
 * @LastEditTime : 2022-11-13 17:11:33
 * @FilePath     : \personal\app\admin\controller\System.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Admin;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use think\facade\View;
use think\Request;

class System
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $info = Admin::where('id', 1)->find();
        return View::fetch('', ['data' => $info]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
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
    public function update()
    {
        $input = input();
        $old = Admin::where('id', 1)->find();
        if ($input['old_password'] != $old['password']) return showmsg(201, "原始密码不正确");
        if ($input['old_password'] == $input['confirm_password']) return showmsg(201, "不能与原密码一致");
        if ($input['new_password'] != $input['confirm_password']) return showmsg(201, "二次密码与一次密码不正确");
        if (empty($input['confirm_password'])) return showmsg(201, "密码不能为空");
        $data = [
            'username'     =>      $input['username'],
            'password'  =>      $input['new_password']
        ];
        $res = Admin::where('id', 1)->update($data);
        if ($res) {
            return showmsg(200, "修改成功");
        } else {
            return showmsg(201, "修改失败");
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
