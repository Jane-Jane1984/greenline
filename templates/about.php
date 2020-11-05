<div class="article">
   <?if(!empty($arAbout)):?>

      <?foreach($arAbout as $about):?>
      <h2><?=$about['title'];?></h2>
      <div class="clr"></div>
      <p><strong><?=$about['short_text'];?></strong></p>
      <p><?=$about['descript_text'];?></p>

      <?endforeach;?>
</div>
      <?else:?>
         <p>Информация обновляется и скоро будет доступна.</p>
   <?endif;?>
