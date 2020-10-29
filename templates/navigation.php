<?php if($show): ?>
    <p class="pages">

        <small>Страница <?=$curPage;?> из <?=$totalPage;?> &nbsp;&nbsp;&nbsp;</small>

        <?if ($curPage > 1):  //выводим ссылку на первую страницу, если она нужна?>
        <a href="?<?=setPageParam('page', 1);?>">&laquo;</a>
        <?endif;?>

        <?if($prevPage != ''):  //выводим ссылку на предыдущую страницу?>
            <a href="?<?=setPageParam('page', $prevPage);?>"><?=$prevPage;?></a>
        <?endif;?>

            <span><?=$curPage;?></span> <?//текущая страница?>

        <?if($nextPage != ''):  //выводим ссылку на следующую страницу?>
             <a href="?<?=setPageParam('page', $nextPage);?>"><?=$nextPage;?></a>
        <?endif;?>

        <?if($curPage < $totalPage):  //выводим ссылку на последнюю страницу?>
        <a href="?<?=setPageParam('page', $totalPage);?>">&raquo;</a>
        <?endif;?>
    </p>
<?php endif;?>



<?php

//var_dump($prevPage);
//var_dump($nextPage);

?>

