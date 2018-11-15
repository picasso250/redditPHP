<?php

function action_index()
{
    include ROOT_VIEW.'/welcome.php';
}
function action_r($name)
{
    $redis = $GLOBALS['containner']->get('Redis');
    $lst = $redis->zRevRangeByScore("r:$name", '+inf', 0, ['withscores' => TRUE]);
    $_inner_tpl = "r.php";
    include ROOT_VIEW.'/layout.php';
}
function action_comment($r, $id)
{
    $redis = $GLOBALS['containner']->get('Redis');
    $score = $redis->zScore("r:$r", $id);
    $_inner_tpl = "comment.php";
    include ROOT_VIEW.'/layout.php';
}
