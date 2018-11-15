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

<?php $child_lst = cmt_child($cid); include __DIR__.'/comment_.php'; ?>