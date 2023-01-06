<?php

use app\models\Protivop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProtivopSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Противопоказания';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protivop-index">

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
            'protCount',
            [
                'class' => ActionColumn::className(),
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, Protivop $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_contr' => $model->id_contr]);
                }
            ],
        ],
        'layout' => "{items}\n{summary}\n{pager}",
        'summary' => 'Показано {count} из {totalCount}',
        'summaryOptions' => [
            'tag' => 'span',
            'class' => 'my-summary'
        ],
        'pager' => [
            'firstPageLabel' => 'first ',
            'lastPageLabel' => ' last ',
            'nextPageLabel' => ' next ',
            'prevPageLabel' => ' previous ',
            'maxButtonCount' => 3,
        ],
    ]); ?>


</div>
