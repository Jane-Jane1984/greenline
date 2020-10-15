<?php

/**
 *  $arNews - список новостей
 */

?>

<?if(!empty($arNews)):?>

  <?foreach($arNews as $news):?>
      <div class="article">
          <h2><?=$news['titlle'];?></h2>
          <div class="clr"></div>
          <p><span class="date"><?=$news['date'];?></span> Автор <a href="#">Admin</a> &nbsp;|&nbsp; Категория <a href="#"><?=$news['$news_cat'];?></a></p>
          <img src="images/<?=$news['image'];?>" width="625" height="205" alt="" />
          <p><?=$news['preview_text'];?></p>
          <p class="spec"><a href="/news_detail.php?id=<?=$news['id'];?>" class="rm">Читать далее &raquo;</a> <a href="#" class="com"><span><?=$news['comments_cnt'];?></span> Комментариев</a></p>
      </div>
  <?endforeach;?>

    <p class="pages">
      <small>Страница 1 из 2 &nbsp;&nbsp;&nbsp;</small> 
      <span>1</span> 
      <a href="#">2</a>
      <a href="#">&raquo;</a>
    </p>
<?else:?>
      <p>Новостей пока нет.</p>
<?endif;?>