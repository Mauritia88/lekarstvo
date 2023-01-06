<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Naznachenie $model */

$this->title = 'Обновить: ';
$this->params['breadcrumbs'][] = ['label' => 'Показания', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id_nazn' => $model->id_nazn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="naznachenie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
