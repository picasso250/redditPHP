<?php foreach ($child_lst as $id=>$score): $cmt = cmt($id); ?>
<div>
    <div><?=htmlspecialchars($cmt['author'])?> <?=show_date($cmt['created'])?></div>
    <div><?=$score?></div>
    <div><?=htmlspecialchars($cmt['content'])?></div>
    <div><?php $child_lst = cmt_child($id); include __FILE__; ?></div>
</div>
<?php endforeach ?>