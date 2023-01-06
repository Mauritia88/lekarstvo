<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Medicine $model */
/** @var app\models\Naznachenie $model1 */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="medicine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manufacture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'form')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'instruct')->textInput(['maxlength' => true]) ?>

    <fieldset>
        <legend>Загрузить изображение</legend>
        <?= $form->field($model, 'foto')->fileInput(); ?>
        <?php
        if (!empty($model->foto)) {
            $img = Yii::getAlias('@webroot') . '/image/med/' . $model->foto;
            if (is_file($img)) {
                $url = Yii::getAlias('@web') . '/image/med/' . $model->foto;
                echo 'Уже загружено ', Html::a('изображение', $url, ['target' => '_blank']);
            }
        }
        ?>
    </fieldset>

    <?= $form->field($model, 'mnnaznachenie')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Naznachenie::find()->all(), 'id_nazn', 'title'),
        'options' => ['placeholder' => 'Выберите назначения ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear'=>true,
        ],
    ])->label('Выберите назначения'); ?>

    <?= $form->field($model, 'mnprotivopok')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Protivop::find()->all(), 'id_contr', 'title'),
        'options' => ['placeholder' => 'Выберите противопоказания ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear'=>true,
        ],
    ])->label('Выберите противопоказания'); ?>

    <?= $form->field($model, 'mnvechestvo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\modules\admin\models\Vechestvo::find()->all(), 'id_ves', 'title'),
        'options' => ['placeholder' => 'Выберите активные вещества ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear'=>true,
        ],
    ])->label('Выберите активные вещества'); ?>

    <!--    dropDownList(ArrayHelper::map(\app\models\Naznachenie::find()->all(), 'id_nazn', 'title'),-->
    <!--        ['prompt' => 'Укажите назначение'])->label(false); -->

<!--    <pre>--><?//= $ttt=ArrayHelper::map($model->getNaznMeds()->asArray()->all(), 'id_nazn', 'id_nazn');
//        print_r(count(array_keys($ttt)));
//        print_r('dsfsgsf')?><!--</pre>-->


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
