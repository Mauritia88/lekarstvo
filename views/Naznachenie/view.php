<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Naznachenie $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Naznachenies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="naznachenie-view">

    <h1 class="text-center text-uppercase"><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //           'title',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $naznDataProvider,
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
