<?php

use app\models\Medicine;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MedicineSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Лекарства по запросу ' . $sea;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?php echo \yii\helpers\Html::a('Назад',  ['/site/index'], ['class' => 'btn btn-outline-secondary']); ?>

    <div class="row col-8 ml-auto mt-4">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            [
                'attribute' => 'foto',
                'format' => 'image',
                'value' => function ($data) {
                    return Yii::$app->homeUrl . 'image/med/thumb/' . $data->foto;
                },

            ],
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->name, ['view', 'id_med' => $data->id_med], ['class' => 'profile-link text-reset']);
                },
            ],
        ],
        'layout' => "{items}\n{summary}\n{pager}",
        'emptyText' => 'Нам не удалось найти, то что вы искали : )',
        'showHeader' => false,

    ]); ?>
    </div>

</div>
