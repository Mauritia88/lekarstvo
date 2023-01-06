<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medicine $model */

$this->title = 'Обновить: ';
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_med' => $model->id_med]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<!--    <pre>--><?//= print_r($model->getNaznMeds()->asArray()->all());?><!--</pre>-->
</div>
