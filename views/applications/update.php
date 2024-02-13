<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Applications $model */

$this->title = 'Update Applications: ' . $model->id_application;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_application, 'url' => ['view', 'id_application' => $model->id_application]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="applications-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
