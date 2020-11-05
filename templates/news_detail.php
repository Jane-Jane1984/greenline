
<div class="article">
    <h2><?=$arNews['title'];?></h2>
    <div class="clr"></div>
    <p>Автор <a href="#">Admin</a> <span>&nbsp;&bull;&nbsp;</span> Категории <a href="#"><?=$arNews['news_cat'];?></a></p>
    <img src="images/<?=$arNews['image'];?>" width="625" height="205" alt="" />
    <p>
        <?=$arNews['detail_text'];?>
    </p>


    <?if(!empty($arTags)):?>
    
    <p>Tagged:
        <?
            $cntTags = count($arTags);
            $c = 1;
        ?>
        <?foreach ($arTags as $tag):?>
        <a href="#"><?=$tag['tag'];?></a><?if($cntTags > $c):?>, <?endif;?>
        <?
            $c++;
            ?>
       <?endforeach;?>
    <?endif;?>
    <p><a href="#"><strong>Комментариев (<span id = "cc"><?=$arNews['comments_cnt'];?></span>)</strong></a> <span>&nbsp;&bull;&nbsp;</span><?=$arNews['date_detail'];?><span>&nbsp;&bull;&nbsp;</span> <a href="#"><strong>Edit</strong></a></p>
</div>
<div class="article">
    <h2>Комментарии к новости</h2>
    <div id ="comments"><?=$comments;?></div>
</div>
<div class="article">
    <h2><span>Оставьте</span> комментарий</h2>
    <div class="clr"></div>
    <div class = "error" id = "form_error"></div>
    <form action="#" method="post" id="form">
        <input type="hidden" name="news_id" value ="<?=$arNews['id'];?>"/>
        <ol>
            <li>
                <label for="name">Ваше имя (required)</label>
                <input id="name" name="name" class="text" />
            </li>
            <li>
                <label for="email">Ваш Email (required)</label>
                <input id="email" name="email" class="text" />
            </li>
            <li>
                <label for="message">Ваше сообщение</label>
                <textarea id="message" name="message" rows="8" cols="50"></textarea>
            </li>
            <li>
                <input type="button" name="send" id="send_comment" value="Отправить" class="send button" />
                <div class="clr"></div>
            </li>
        </ol>
    </form>
</div>
