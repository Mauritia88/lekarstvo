<?php

/** @var yii\web\View $this */


use yii\helpers\Url;

$this->title = 'Справочник';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="text-uppercase" style="color: #26333d;">Справочник Лекарств</h1>

        <br>
        <div class="form-group row search-div justify-content-center">
            <form class="col-8" method="get" action="<?= Url:: to(['/medicine/search']) ?>">
                <input type="text" class="form-control" name="med-search" placeholder="Поиск">
            </form>
        </div>

        <div class="body-content">

            <div class="row pt-3">
                <div class="col-6 ml-n4 p-lg-0 mt-4">
                    <img src="/web/image/main.jpg" style="display:inline; width: 500px; ">
                </div>
                <div class="col-6 px-md-5 p-3">
                    <h2 style="color: #0056b3;">Основная информация:</h2>
                    <p class="text-justify" style="color: #1b3f5f;">Информация о препаратах, размещенная на сайте, предназначена только для специалистов.
                        Описания лекарственных средств не могут быть использованы пациентами для принятия самостоятельного решения об их применении.</p>
                </div>
            </div>


        </div>
    </div>
</div>