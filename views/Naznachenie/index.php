<?php

use app\models\Naznachenie;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NaznachenieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Показания';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="naznachenie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="form-group row">
        <div class="col-3">
            <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-9">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'nazCount',
            [
                'class' => ActionColumn::className(),
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',

                'urlCreator' => function ($action, Naznachenie $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_nazn' => $model->id_nazn]);
                }
            ],
        ],
        'showFooter' => false,
        'summary' => false,
    ]); ?>


</div>
