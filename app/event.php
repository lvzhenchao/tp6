<?php
// 事件定义文件
return [
    'bind'      => [
    ],

    'listen'    => [
        'AppInit'  => [],
        'HttpRun'  => [],
        'HttpEnd'  => [],
        'LogLevel' => [],
        'LogWrite' => [],
        'swoole.task' => [
            app\listener\SmsTask::class,
        ],
        'swoole.finish' => [
            app\listener\SmsTaskFinish::class,
        ],
    ],

    'subscribe' => [
    ],
];
