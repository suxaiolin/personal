<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 21:23:55
 * @LastEditTime : 2022-11-13 21:28:11
 * @FilePath     : \personal\app\admin\controller\Lmessage.php
 */
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Lmessage as ModelLmessage;
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
        $rows = ModelLmessage::select();
        $total = ModelLmessage::count();
        $data = [
            'rows' => $rows,
            'total'=>$total
        ];
        return $data;
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
    public function delete($id)
    {
        //
    }
}
