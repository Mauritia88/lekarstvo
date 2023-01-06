<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vechestvo $model */

$this->title = 'Update Vechestvo: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vechestvos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id_ves' => $model->id_ves]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vechestvo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
