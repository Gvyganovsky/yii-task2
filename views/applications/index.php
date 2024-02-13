<?php

use app\models\Applications;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ApplicationsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php foreach ($applications as $model): ?>
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body">
                <h5 class="card-title">Номер машины: <?= Html::encode($model->carNumber) ?></h5>
                <p class="card-text">Описание: <?= Html::encode($model->description) ?></p>
                <p class="card-text">Статус: <?= Html::encode($model->Status) ?></p>
                <a href="/applications/<?= $model->id_application ?>" class="btn btn-primary">Просмотр заявки</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
