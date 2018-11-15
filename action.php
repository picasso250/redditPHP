<?php

function action_index()
{
    include ROOT_VIEW.'/welcome.php';
}
function action_r($name)
{
    $redis = $GLOBALS['containner']->get('Redis');
    $lst = $redis->zRevRangeByScore("r:$name", '+inf', 0, ['withscores' => TRUE]);
    include ROOT_VIEW.'/layout.php';
}
function action_comment()
{

    include ROOT_VIEW.'/layout.php';
}
