<?php if($_SESSION['is_admin'] == '1'):?>
<?php //форма добавления новости?>
Пpивет, админ.
Добавляй новости.

<form method="post">
    Заголовок: <textarea cols="50" name="title"/></textarea><br>
    Новость: <textarea cols = "100" rows="50" name="detail_text"/></textarea><br>
    <input type="submit" value="Добавить новость"/>
</form>


<?php else:?>
    <form method="post">
        Login: <input type="text" name="login"/><br>
        Password: <input type="password" name="pass"/><br>
        <input type="submit" value="Login"/>
    </form>


<?php endif;?>