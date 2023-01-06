<?php

use app\models\Medicine;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Medicine $model */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="medicine-view">

    <h1 class="text-center mb-4" style="color: #1c7430;"><?= Html::encode($this->title) ?></h1>

    <?php echo \yii\helpers\Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-secondary']); ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-4">
                <img src="<?= Yii::$app->homeUrl . 'image/med/' . $model->foto; ?>" alt="<? $model->name ?>"
                     class="img-fluid">
            </div>
            <div class="row col-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'manufacture',
                        'form',
//                        'instruct',

                        [
                            'attribute' => 'Показания',
                            'value' => function (Medicine $data) {
                                return implode(', ', array_map(function ($array) {
                                    return $array['title'];
                                }, $data->getNaznMeds()->asArray()->all()));
                            },
                        ],
                        [
                            'attribute' => 'Противопоказания',
                            'value' => function (Medicine $data) {
                                return implode(', ', array_map(function ($array) {
                                    return $array['title'];
                                }, $data->getProtMeds()->asArray()->all()));
                            },
                        ],
                        [
                            'attribute' => 'Активные вещества',
                            'value' => function (Medicine $data) {
                                return implode(', ', array_map(function ($array) {
                                    return $array['title'];
                                }, $data->getVechMeds()->asArray()->all()));
                            },
                        ],
                    ],
                ]) ?>
            </div>
<!--            --><?php //echo Html::a('Назад', ['/site/index'], ['class' => 'btn btn-lg btn-outline-primary']); ?>
        </div>
    </div>
