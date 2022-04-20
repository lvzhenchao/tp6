<?php
namespace app\admin\controller;

use app\BaseController;

class Register extends BaseController
{
    public function register()
    {
        //异步模拟发送短信
        $manager = app('\think\swoole\Manager');
        $data = [
            'task' => 'sendSms',
            'mobile' => '152****6268',
        ];
        //传递参数
        $manager->getServer()->task($data);
        return "注册成功！".time();
    }

    public function doRegister()
    {
        $server = app('swoole.server');
        $server->task(\app\listener\SmsTask::class);
        return "注册成功";
    }

    public function doRegister1(\think\swoole\Manager $manager)
    {
        $server = $manager->getServer();
        $server->task(\app\listener\SmsTask::class);
        return "注册成功";
    }
    public function doRegister2(\Swoole\Server $server)
    {
        $data = [
            'task' => 'sendSms',
            'mobile' => '152****6268',
        ];
        $server->task($data,null,\app\listener\SmsTask::class);
        return "注册成功";
    }

}
