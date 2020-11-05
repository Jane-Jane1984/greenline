
<div class="article">
   <h2><span>Support to</span> Company Name</h2>
   <div class="clr"></div>
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Suspendisse nulla ligula, blandit ultricies aliquet ac, lobortis in massa. Nunc dolor sem, tincidunt vitae viverra in, egestas sed lacus.</strong> Etiam in ullamcorper felis. Nulla cursus feugiat leo, ut dictum metus semper a. Vivamus euismod, arcu gravida sollicitudin vestibulum, quam sem tempus quam, quis ullamcorper erat nunc in massa. Donec aliquet ante non diam sollicitudin quis auctor velit sodales. Morbi neque est, posuere at fringilla non, mollis nec nibh.</p>
   <p><strong>Lorem ipsum dolor sit amet</strong></p>
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum tellus. Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.</p>

   <?if(!empty($arSupport)):?>
      
   <?foreach($arSupport as $support):?>

      <ul>
         <li class="block-question">
            <p class="question"><?=$support['question'];?></p>
            <p class="ans"><?=$support['answer'];?></p>
         </li>
      </ul>

   <?endforeach;?>
</div>
   
<?=$navigation;?>
   <?else:?>
      <p>Служба поддержки скоро начнёт свою работую</p>
   <?endif;?>
   