<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-12 20:50:32
 * @LastEditTime : 2022-11-16 10:50:43
 * @FilePath     : \personal\app\admin\middleware.php
 */
// 这是系统自动生成的middleware定义文件


return [
    // Session初始化
    \think\middleware\SessionInit::class,
    // login 
    \app\admin\middleware\Auth::class
];
