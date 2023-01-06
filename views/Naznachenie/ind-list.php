<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\NaznachenieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Показания к применению';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="naznachenie-index-list">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{items}\n{summary}\n{pager}",
        'summary' => 'Показано {count} из {totalCount}',
        'summaryOptions' => [
            'tag' => 'span',
            'class' => 'my-summary'
        ],

        'emptyText' => '<p>Список пуст</p>',
        'emptyTextOptions' => [
            'tag' => 'p'
        ],

        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item', ['model' => $model]);

            // or just do some echo
            // return $model->title . ' posted by ' . $model->author;
        },
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 5,
        ],
    ]); ?>


</div>
