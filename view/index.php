<?php foreach ($lst as $id=>$score): $cmt = cmt($id); ?>
<div><?=$score?></div>
<div>
    <div><?=htmlspecialchars($cmt['author'])?>发表于<?=show_date($cmt['created'])?></div>
    <h2><?=htmlspecialchars($cmt['title'])?></h2>
    <?php if($cmt['link']): ?>
    <a href="<?=htmlentities($cmt['link'])?>"><?=htmlspecialchars($cmt['link'])?></a>
    <?php endif ?>
    <div><?=htmlspecialchars($cmt['content'])?></div>
    <div><?=$cmt['comment_num']?>个评论</div>
</div>
<?php endforeach ?>