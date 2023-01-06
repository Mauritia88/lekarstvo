<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Vechestvo $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vechestvo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vechestvo-view">

    <h1 class="text-center" style="color: #1a1a1a;"><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //           'title',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $vesDataProvider,
        'summary' => false,
        'columns' => [
            [
                'attribute' => 'Лекарства:',
                'value' => function($model, $key) {
                    $result = '';
                    $result .= Html::a($model->name, ['/medicine/view', 'id_med' => $model->id_med], ['class' => 'profile-link text-reset']) ;
                    return $result;
                },
                'format' => 'html',
            ],
        ],
    ]); ?>
    <?php echo Html::a('Назад',['/admin/vechestvo/index'], ['class' => 'btn btn-lg btn-outline-primary']); ?>

</div>
