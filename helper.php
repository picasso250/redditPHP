<?php

function cmt($cid)
{
    $redis = $GLOBALS['containner']->get('Redis');
    return json_decode($redis->get("c:$cid"));
}
function cmt_child($cid)
{
    $redis = $GLOBALS['containner']->get('Redis');
    return $redis->zRevRangeByScore("cmt_child:$cid", '+inf', 0, ['withscores' => TRUE]);
}