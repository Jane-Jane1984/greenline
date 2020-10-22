<?php if(!empty($show)): ?>
    <p class="pages">
        <small>Страница <?=$curPage;?> из <?=$totalPage;?> &nbsp;&nbsp;&nbsp;</small>

        <?/*foreach ($arPage as $nPage):?>

            <?if($curPage == $nPage): //если это текущая страница?>
                <span><?=$nPage;?></span> <?//текущая страница?>
            <?else:?>
                <a href="?page=<?=$nPage;?>"><?=$nPage;?></a> <?//ормируем ссылки на другие страницы?>
            <?endif;?>

        <?endforeach;*/?>

        <?if ($curPage > 1):  //выводим ссылку на первую страницу, если она нужна?>
        <a href="?page=1">&laquo;</a>
        <?endif;?>

        <?if($prevPage != ''):  //выводим ссылку на предыдущую страницу?>
            <a href="?page=<?=$prevPage;?>"><?=$prevPage;?></a>
        <?endif;?>

            <span><?=$curPage;?></span> <?//текущая страница?>

        <?if($nextPage != ''):  //выводим ссылку на следующую страницу?>
             <a href="?page=<?=$nextPage;?>"><?=$nextPage;?></a>
        <?endif;?>
        <?if($curPage < $totalPage):  //выводим ссылку на последнюю страницу?>
        <a href="?page=<?=$totalPage;?>">&raquo;</a>
        <?endif;?>
    </p>
<?php endif;?>



<?php

//var_dump($prevPage);
//var_dump($nextPage);

?>

