<?php

use app\models\Applications;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ApplicationsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Админ панель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">
    <p><a href="/applications">Заявления</a></p>
    <p><a href="/users">Пользователи</a></p>
</div>
