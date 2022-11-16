<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-13 18:30:52
 * @LastEditTime : 2022-11-13 18:42:29
 * @FilePath     : \personal\app\admin\model\AdminLog.php
 */
declare (strict_types = 1);

namespace app\admin\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class AdminLog extends Model
{
    protected $name = 'admin_log';
}
