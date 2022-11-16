<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-12 20:50:35
 * @LastEditTime : 2022-11-13 16:48:31
 * @FilePath     : \personal\app\index\controller\Index.php
 */
declare (strict_types = 1);

namespace app\index\controller;

use app\index\model\Hobby;
use app\index\model\Language;
use app\index\model\Visit;
use app\index\model\Web;
use think\Request;
use think\facade\View;

class Index
{
    public function index(Request $request)
    {
        $ip = [
            'ip' => $request->ip()
        ];
        $visit = new Visit;
        $visit->save($ip);
        $hobby = Hobby::select();
        $language = Language::select();
        $web = Web::where('id','1')->find();
        $visits = Visit::count();
        $data = [
            'visits'    =>      $visits,
            'hobby'     =>      $hobby,
            'language'  =>      $language,
            'web'       =>      $web
        ];
        return View::fetch('',['data'=>$data]);
    }
}
