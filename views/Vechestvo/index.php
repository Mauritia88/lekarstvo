<?php

use app\models\Vechestvo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VechestvoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vechestvos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vechestvo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vechestvo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'vCount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vechestvo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_ves' => $model->id_ves]);
                 }
            ],
        ],
    ]); ?>


</div>
