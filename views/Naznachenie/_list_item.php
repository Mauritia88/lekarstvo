<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article class="item" data-key="<?= $model->id_nazn; ?>">
    <h2 class="text-justify">
        <?= Html::a(Html::encode($model->title), Url::toRoute(['/naznachenie/view', 'id_nazn' => $model->id_nazn]), ['title' => $model->title]) ?>
    </h2>

<!--    <div class="item-excerpt">-->
<!--        --><?//= Html::encode($model->excerpt); ?>
<!--    </div>-->
</article>