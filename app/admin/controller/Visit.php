<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 13:48:20
 * @LastEditTime : 2022-11-13 16:51:55
 * @FilePath     : \personal\app\admin\controller\Visit.php
 */
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Visit as ModelVisit;
use think\facade\View;
use think\Request;

class Visit
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
        $rows = ModelVisit::select();
        $total = ModelVisit::count();
        $data = [
            'rows'      =>      $rows,
            'total'     =>      $total
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
    public function delete()
    {
        $id = input();
        $res = ModelVisit::find($id['id']);
        $res->delete();
        if (!$res){
            return showmsg(201,"删除失败");
        }else{
            return showmsg(200,"删除成功");
        }
    }
}
