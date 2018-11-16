<?php
return [
    Redis::class => function () {
        $redis = new Redis;
        $redis->connect($_ENV['redis_host']);
        return $redis;
    },
];