<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php
    if (!Yii::$app->user->isGuest) {
        echo '
            <h1 class="text-center mt-5">Добро пожаловать на сайт "Нарушениям.Нет"</h1>
            <p class="lead text-center">Отправьте заявку с правонарушением</p>
            <div class="text-center mt-3">
                <a href="/applications/create" class="btn btn-primary btn-lg">Отправить заявку</a>
            </div>
        ';
    } else {
        echo '
        <h1 class="text-center mt-5">Добро пожаловать на сайт "Нарушениям.Нет"</h1>
        <p class="lead text-center">Прежде чем отправлять заявку, зарегистируйтесь</p>
        <div class="text-center mt-3">
            <a href="/users/create" class="btn btn-primary btn-lg">Зарегистрироваться</a>
            <a href="/site/login" class="btn btn-primary btn-lg">Авторизация</a>
        </div>
        ';
    }
    ?>
</div>
