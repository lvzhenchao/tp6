<?php
namespace app\index\controller;

use app\BaseController;
use think\facade\Db;

class Index extends BaseController
{
    public function index()
    {
//        $data = ['title' => 'title1', 'writer' => 'writer1'];
//        $res = Db::name('article')->save($data);
//        $res1 = Db::name('article')->strict(false)->insert($data);//如果不希望抛出异常 不存在字段的值将会直接抛弃。
//        $res1 = Db::name('article')->insertGetId($data);
//
//        $data = [
//            ['title' => 'bar', 'writer' => 'foo'],
//            ['title' => 'bar1', 'writer' => 'foo1'],
//            ['title' => 'bar2', 'writer' => 'foo2']
//        ];
//        Db::name('article')->insertAll($data);//多条插入
//        print_r($res);
//        print_r($res1);
//        return "index";

        $data = ['title' => 'title11', 'writer' => 'writer1'];
        $res = Db::name('article')->replace()->insert($data);//replace()对于有唯一索引的字段，会将其前面的数据删除掉，重新添加一条
        print_r($res);
    }

    public function hello($name = 'ThinkPHP6')
    {
//        $res = Db::table('qing_article')->where('id', 7)->find();
//        $res1 = Db::table('qing_article')->where('id', 71)->findOrEmpty();
//        $res1 = Db::table('qing_article')->where('id', 71)->findOrFail();
        $res1 = Db::table('qing_article')->where('id', 7)->select()->toArray();//二维数组
        halt($res1);
    }
}
