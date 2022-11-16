<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 13:59:21
 * @LastEditTime : 2022-11-13 15:58:55
 * @FilePath     : \personal\app\admin\controller\Hobby.php
 */
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Hobby as ModelHobby;
use think\facade\View;
use think\Request;

class Hobby
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
        $rows = ModelHobby::select();
        $total = ModelHobby::count();
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
        $data = [
            'title'             =>      $input['title'],
            'name'              =>      $input['name'],
            'color'    =>      $input['color']
        ];
        $web = new ModelHobby();
        $web->save($data);
        if ($web) {
            showmsg(200,"修改成功");
        } else {
            showmsg(201,"更新失败");
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
        $res = ModelHobby::find($input['id']);
        $res->delete();
        if(!$res){
            showmsg(201,"删除失败");
        }else{
            showmsg(200,"删除成功");
        }
    }
}
