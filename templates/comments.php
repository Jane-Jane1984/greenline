<?php
if(!empty($arComments)):
?>
<?php
foreach ($arComments as $comment):?>

    <div class="comment"> 
      <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
      <p><a href="#"><?=$comment['author'];?></a> Says:<br /><?=$comment['date'];?></p>
      <p><?=$comment['text'];?></p>
    </div>
<?php endforeach;?>

<?php else:?>

<p>Комментариев пока нет.</p>

<?php endif;?>

