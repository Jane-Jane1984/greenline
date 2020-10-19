<?php if(!empty($arPage)): ?>
    <p class="pages">
        <small>Страница <?=$curPage;?> из <?=$totalPage;?> &nbsp;&nbsp;&nbsp;</small>

        <?foreach ($arPage as $nPage):?>

            <?if($curPage == $nPage): //если это текущая страница?>
                <span><?=$nPage;?></span> <?//текущая страница?>
            <?else:?>
                <a href="?page=<?=$nPage;?>"><?=$nPage;?></a> <?//ормируем ссылки на другие страницы?>
            <?endif;?>

        <?endforeach;?>

        <a href="?page=<?=$totalPage;?>">&raquo;</a>
    </p>
<?php endif;?>



