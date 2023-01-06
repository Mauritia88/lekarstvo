<?php

use app\models\Medicine;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MedicineSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Лекарства';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'manufacture',
            'form',
//            'instruct',
            [
                'attribute'=>'foto',
                'format' => 'image',
                'value' => function($data) {
                    return Yii::$app->homeUrl . 'image/med/thumb/' . $data->foto;;
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Medicine $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_med' => $model->id_med]);
                 }
            ],
        ],
    ]); ?>


</div>
