<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-14 07:53:56
 * @LastEditTime : 2022-11-16 08:22:36
 * @FilePath     : \personal\app\index\controller\Lmessage.php
 */
declare (strict_types = 1);

namespace app\index\controller;

use app\index\model\Lmessage as ModelLmessage;
use think\facade\View;
use think\Request;

class Lmessage
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
        $inp = input();
        $data = [
            'name'     =>      $inp['name'],
            'content'   =>      $inp['content'],
            'mail'      =>      $inp['mail'],
            'ip'        =>      $request->ip()
        ];
        $msg = new ModelLmessage;
        $msg->save($data);
        if (!$msg) {
            return showmsg(201,"发送失败");
        }else{
            return showmsg(200,"发送成功");
        }
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
    public function delete($id)
    {
        //
    }
}
