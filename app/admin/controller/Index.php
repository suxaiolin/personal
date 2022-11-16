<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-12 20:50:32
 * @LastEditTime : 2022-11-16 10:30:06
 * @FilePath     : \personal\app\admin\controller\Index.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Hobby;
use app\admin\model\Language;
use app\admin\model\Lmessage;
use app\admin\model\Visit;
use app\index\model\Visit as ModelVisit;
use think\facade\View;

class Index
{
    public function index()
    {
        $visits = Visit::count();
        $hobby = Hobby::count();
        $language = Language::count();
        $msg = Lmessage::count();
        $visit_total = [];
        $data_time = [];
        for ($i=0; $i <= 7; $i++) {
            $time = $i * 86400;
            $day = time() - $time;
            $start = date("Y-m-d",$day).' 00:00:00';
            $end = date("Y-m-d",$day).'23:59:59';
            $visit =ModelVisit::whereBetweenTime('create_time', $start, $end)->count();
            array_push($visit_total,$visit);
            $days = date("d",time() - $time);
            array_push($data_time,intval($days));
        }
        $msg_total = [];
        for ($i=0; $i <= 7; $i++) {
            $time = $i * 86400;
            $day = time() - $time;
            $start = date("Y-m-d",$day).' 00:00:00';
            $end = date("Y-m-d",$day).'23:59:59';
            $visit = Lmessage::whereBetweenTime('create_time', $start, $end)->count();
            array_push($msg_total,$visit);
        }
        $dynamic = Lmessage::limit(3)->order('id','desc')->select()->toArray();
        $data = [
            'visit'             =>      $visits,
            'hobby'             =>      $hobby,
            'language'          =>      $language,
            'msg'               =>      $msg,
            'dynamic'           =>      $dynamic,
            'visit_total'       =>      json_encode($visit_total),
            'msg_total'         =>      json_encode($msg_total),
            'data_time'         =>      json_encode($data_time)
        ];
        return View::fetch('', ['data' => $data]);
    }

    public function update()
    {
        // return showmsg(200,"请求成功");
        // $pa = [];
        // $request = send_post(config('os.host'),$pa);
        // $request = json_decode($request);
        // if (is_array($request)) return showmsg(201,"服务器链异常");
        // if ($request['version'] == config('os.version')) return showmsg(201,"暂无更新呢~");
        // return showmsg(200,"已有更新~\n请前往官网查看哟~");
    }
}
