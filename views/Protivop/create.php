<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Protivop $model */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Противопоказания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protivop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
