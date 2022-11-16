<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-12 20:49:12
 * @LastEditTime : 2022-11-16 09:39:07
 * @FilePath     : \personal\app\middleware.php
 */
// 全局中间件定义文件
return [
    // 全局请求缓存
    // \think\middleware\CheckRequestCache::class,
    // 多语言加载
    // \think\middleware\LoadLangPack::class,
    
    // Session初始化
    \think\middleware\SessionInit::class
];
