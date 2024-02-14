<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Applications $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="applications-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Скрытое поле user_id -->
        <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
        
        <?= $form->field($model, 'carNumber')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        
    <?php ActiveForm::end(); ?>

</div>