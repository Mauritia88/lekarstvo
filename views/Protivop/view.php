<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Protivop $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Противопоказания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="protivop-view">

    <h1 class="text-center text-uppercase" style="color: #053c61;"><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 //           'title',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $prDataProvider,
        'summary' => false,
        'columns' => [
            [
                'attribute' => 'Лекарства:',
                'value' => function($model, $key) {
                    $result = '';
                    $result .= Html::a($model->name, ['medicine/view', 'id_med' => $model->id_med], ['class' => 'profile-link text-reset']) ;
                    return $result;
                },
                'format' => 'html',
            ],
        ],
    ]); ?>
    <?php echo Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-lg btn-outline-primary']); ?>

</div>
