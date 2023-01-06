<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Protivop $model */

$this->title = 'Обновить: ';
$this->params['breadcrumbs'][] = ['label' => 'Противопоказания', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id_contr' => $model->id_contr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="protivop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
