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
                                    return Html::a($array['title'], ['/naznachenie/view', 'id_nazn' => $array['id_nazn']], ['class' => 'profile-link text-reset']);
                                }, $data->getNaznMeds()->asArray()->all()));
                            },
                            'format'=>'html',
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
            <hr size=5px width="100%" align="center">

            <br>
            <div class="container">
                <h1 class="text-center">Другие лекарства:</h1>

                <div class="analogs row">

                    <?php foreach ($leks as $lek): ?>
                        <div class="film col-4">
                            <img src="<?= Yii::$app->homeUrl . 'image/med/' . $lek->foto; ?>" alt="Постер" width="300px"
                                 height="200px">
                            <br>
                            <p class="film-link text-center">
                                <?= Html::a($lek->name, ['view', 'id_med' => $lek->id_med], ['class' => 'profile-link']) ?>
                            </p>

                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
    </div>
</div>
