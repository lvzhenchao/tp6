<?php
namespace app\model;

use think\Model;

class User extends Model
{
    protected $pk = 'id';
    // 设置当前模型对应的完整数据表名称
    protected $table = 'qing_user';

    // 设置当前模型的数据库连接
//    protected $connection = 'db_config';

    public function index()
    {
        $user = $this->find(1);
        echo $user->getAttr('delete_time');
        echo $user->getAttr('name');
    }
}