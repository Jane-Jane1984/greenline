<!DOCTYPE html>
<html>
<head>
    <title><?=$title;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/radius.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="menu_nav">
                <ul>
                    <li <?if($menuActive == 'main'):?>class="active"<?endif;?>><a href="index.php">Главная</a></li>
                </ul>
            </div>
            <div class="logo">
                <h1><a href="index.php">Green<span>Line</span></a> <small>put your slogan here</small></h1>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="content">
        <div class="content_resize">
            <div class="mainbar">
                <?=$content;?>

            </div>

            <div class="clr"></div>
        </div>
    </div>
    <div class="fbg">
        <div class="fbg_resize">
            <div class="col c1">
                <h2><span>Фото</span></h2>
                <a href="#"><img src="images/pix1.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix2.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix3.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix4.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix5.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix6.jpg" width="58" height="58" alt="" /></a>
            </div>
            <div class="col c2">
                <h2><span>Подписка на новости</span></h2>
                <p>Будь в курсе!<br />
                    На сайте представлена подборка самых свежих новостей науки, медицины, современных технологий и многого другого. Вы можете подписаться на нашу рассылку, чтобы всегда быть в курсе.</p>
                <div>
                    <div id="sub_mess"></div>
                    <form class="subscribe">
                        <input type="text" name="email" placeholder="Ваш email" />
                        <input type="button" id = "send_sub" class="button" value="Подписаться" />
                    </form>
                </div>
            </div>
            <div class="col c3">
                <h2><span>Контакты</span></h2>
                <p>Мы будем рады ответить на любые вопросы.</p>
                <p><a href="#"><?=SITE_EMAIL;?></a></p>
                <p><?=SITE_PHONE_1;?><br />
                    <?=SITE_PHONE_2;?></p>
                <p>Адрес: <?=ADRESS;?></p>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="footer">
        <div class="footer_resize">
            <p class="lf">Copyright &copy; <?= date("Y");?> <a href="#">SiteName</a> - All Rights Reserved</p>
            <p class="rf"><a href="/">Free CSS Templates</a></p>
            <div class="clr"></div>
        </div>
    </div>
</div>
<!-- END PAGE SOURCE -->
</body>
</html>
