<?php
declare (strict_types = 1);

namespace app\listener;

class SmsTaskFinish
{
    /**
     * 事件监听处理
     *
     * @return mixed
     */
    public function handle($event)
    {
        echo "finish";

        print_r($event);
        print_r($event[2]);//第三个索引才是onTask传入的data数据

        return;
    }
}
