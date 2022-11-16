<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 13:59:21
 * @LastEditTime : 2022-11-13 16:37:05
 * @FilePath     : \personal\app\admin\controller\Language.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Language as AdminModelLanguage;
use think\facade\View;
use think\Request;

class Language
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
        $rows = AdminModelLanguage::select();
        $total = AdminModelLanguage::count();
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
        $input = input();
        if (!is_numeric($input['name'])) return showmsg(201,"程度输入的类型为数字");
        if ($input['name'] >=100) return showmsg(201,"请输入0到100范围值");
        $data = [
            'name'             =>      $input['title'],
            'degree'           =>      $input['name'],
            'color'            =>      $input['color']
        ];
        $web = new AdminModelLanguage();
        $web->save($data);
        if ($web) {
            showmsg(200, "创建成功");
        } else {
            showmsg(201, "创建失败");
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
    public function delete()
    {
        $input = input();
        $res = AdminModelLanguage::find($input['id']);
        $res->delete();
        if (!$res) {
            showmsg(201, "删除失败");
        } else {
            showmsg(200, "删除成功");
        }
    }
}
