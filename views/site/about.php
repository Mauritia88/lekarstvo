<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О компании';
?>
<div class="site-about">
    <h1><em><?= Html::encode($this->title) ?></em></h1>
    <div class="row">
        <div class="col">
            <p class="fst-italic">
                Если Вы заметили неточность в описании, неподходящую картинку, или просто Вам что-то не нравится
                на нашем сайте, напишите нам об этом по адресу: <?= Yii::$app->params["senderEmail"] ?>
            </p>
            <p class="fst-italic">
                Наш адрес:<br>
                <?= Yii::$app->params["address"] ?>
            </p>
            <p class="fst-italic">
                С нами можно связаться
                <br>
                <?= Yii::$app->params["communication"] ?>:
                <?= Yii::$app->params["phone"] ?>
            </p>
            <p class="fst-italic">
                Мы работаем:
                <br>Пн.-Пт. с 10.00 до 18.00
                <br>Сб. c 12.00 до 15.00
                <br>Вс. - выходной
            </p>
        </div>
        <div class="col-5"><img src="/web/image/about/1.jpg" alt="Лекарство" class="img-fluid rounded float-left"></div>

    </div>

</div>
