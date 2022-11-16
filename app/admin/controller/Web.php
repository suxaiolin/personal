<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 13:59:11
 * @LastEditTime : 2022-11-16 10:30:39
 * @FilePath     : \personal\app\admin\controller\Web.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Web as ModelWeb;
use think\facade\View;
use think\Request;

class Web
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
    public function update(Request $request)
    {
        $input = input();
        $data = [
            'title'             =>      $input['title'],
            'name'              =>      $input['name'],
            'main_introduce'    =>      $input['main_introduce'],
            'introduce'         =>      $input['introduce'],
            'source_introduce'  =>      $input['source_introduce'],
            'source_url'        =>      $input['source_url'],
            'email'             =>      $input['email']
        ];
        $web = ModelWeb::find(1);
        $web->where('id','1');
        $web->save($data);
        if ($web) {
            showmsg(200,"修改成功");
        } else {
            showmsg(201,"更新失败");
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
