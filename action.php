<?php

function action_index()
{
    $redis = $GLOBALS['container']->get('Redis');
    $lst = $redis->zRevRangeByScore("index", '+inf', 0, ['withscores' => TRUE]);
    $_inner_tpl = ROOT_VIEW."/index.php";
    include ROOT_VIEW.'/layout.php';
}
function action_r($name)
{
    $redis = $GLOBALS['container']->get('Redis');
    $lst = $redis->zRevRangeByScore("r:$name", '+inf', 0, ['withscores' => TRUE]);
    $_inner_tpl = ROOT_VIEW."/r.php";
    include ROOT_VIEW.'/layout.php';
}
function action_comment($r, $id)
{
    $redis = $GLOBALS['container']->get('Redis');
    $score = $redis->zScore("r:$r", $id);
    $_inner_tpl = ROOT_VIEW."/comment.php";
    include ROOT_VIEW.'/layout.php';
}
