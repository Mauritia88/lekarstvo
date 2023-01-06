<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Vechestvo $model */

$this->title = 'Create Vechestvo';
$this->params['breadcrumbs'][] = ['label' => 'Vechestvos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vechestvo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
