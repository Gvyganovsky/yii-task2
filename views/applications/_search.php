<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ApplicationsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="applications-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_application') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'carNumber') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
