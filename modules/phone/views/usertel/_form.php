<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use \yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model app\modules\phone\models\UserTel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-tel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nameLastName')->textInput(['maxlength' => true]) ?>
    <?php if($model->isNewRecord){ ?>
    <?= $form->field($model, 'country')->widget(Select2::classname(), [
        'data' => $country,
        'language' => 'ru',
        'options' => ['placeholder' => 'selectCountry'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label(false); ?>
    <?php } else{ ?>

        <?= Select2::widget([
            'name'=>'id',
            'value' => $dataCountry,
            'data' => $country,
            'options' => ['multiple' => true],
            'pluginOptions' => [
                'tags' => true,
            ],
        ]);?>
    <?php } ?>
    <?= $form->field($model, 'tel')->widget(MaskedInput::className(),[
        'mask' => '+9 (999) 999-99-99'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
