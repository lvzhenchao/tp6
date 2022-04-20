<?php
declare (strict_types = 1);

namespace app\listener;

class SmsTask
{
    /**
     * 事件监听处理
     *
     * @return mixed
     */
    public function handle($event)
    {
        print_r($event->data);//server->task()传入的数据

        echo "开始发送短信：".time().PHP_EOL;
        sleep(3);
        echo "短信发送成功：".time().PHP_EOL;

        $event->finish($event->data);
        return;
    }
}
